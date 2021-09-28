<?php
require_once('../../helpers/database.php');
require_once('../../helpers/validator.php');
require_once('../../models/clientes.php');
require_once('../../helpers/correo.php');

// Se comprueba si existe una acción a realizar, de lo contrario se finaliza el script con un mensaje de error.
if (isset($_GET['action'])) {
    // Se crea una sesión o se reanuda la actual para poder utilizar variables de sesión en el script.
    session_start();
    // Se instancian las clases correspondientes.
    $cliente = new Clientes;
    $email = new Correo;
    // Se declara e inicializa un arreglo para guardar el resultado que retorna la API.
    $result = array('status' => 0, 'recaptcha' => 0, 'message' => null, 'exception' => null);
    // Se verifica si existe una sesión iniciada como cliente para realizar las acciones correspondientes.
    if (isset($_SESSION['id_cliente'])) {
        // Se compara la acción a realizar cuando un cliente ha iniciado sesión.
        switch ($_GET['action']) {
            case 'viewSession':
                if (isset($_SESSION['id_cliente'])) {
                    $result['status'] = 1;
                    $result['message'] = $_SESSION['id_cliente'];
                } else {
                    $result['exception'] = $_SESSION['id_cliente'];
                }
                break;
            case 'register':
                $_POST = $cliente->validateForm($_POST);
                if ($cliente->setNombres($_POST['nombre'])) {
                    if ($cliente->setApellidos($_POST['apellido'])) {
                        if ($cliente->setCorreo($_POST['email'])) {
                            if ($cliente->setTelefono($_POST['telefono'])) {
                                if ($_POST['clave'] == $_POST['clave2']) {
                                    if ($_POST['clave'] != $_POST['email']) {
                                        if ($_POST['clave'] != $_POST['telefono']) {
                                            if ($cliente->setClave($_POST['clave'])) {
                                                if($cliente->setFactor(isset($_POST['factor']) ? 1 : 0)){
                                                    if ($cliente->register()) {
                                                        $result['status'] = 1;
                                                        $result['message'] = 'Registro exitoso';
                                                    } else {
                                                        $result['exception'] = Database::getException();
                                                    }
                                                } else {
                                                $result['exception'] = 'Estado incorrecto';
                                                } 
                                            } else {
                                                $result['exception'] = $cliente->getPasswordError();
                                            }
                                        } else {
                                            $result['exception'] = 'Claves diferentes';
                                        }
                                    } else {
                                        $result['exception'] = 'Claves diferentes';
                                    }
                                } else {
                                    $result['exception'] = 'Claves diferentes';
                                }
                            } else {
                                $result['exception'] = 'Teléfono incorrecto';
                            }
                        } else {
                            $result['exception'] = 'Correo incorrecto';
                        }
                    } else {
                        $result['exception'] = 'Apellidos incorrectos';
                    }
                } else {
                    $result['exception'] = 'Nombres incorrectos';
                }
                break;
            case 'logOut':
                unset($_SESSION['id_cliente'], $_SESSION['correo_cliente'], $_SESSION['tiempopb']);
                if (isset($_SESSION['id_cliente']) && isset($_SESSION['correo_cliente']) && isset($_SESSION['tiempopb'])) {
                    $result['exception'] = 'Ocurrió un problema al cerrar la sesión';
                } else {
                    $result['status'] = 1;
                    $result['message'] = 'Sesión eliminada correctamente';
                }
                break;
            case 'changePassword':
                if ($cliente->setId($_SESSION['id_cliente'])) {
                    $_POST = $cliente->validateForm($_POST);
                    if ($cliente->checkPassword($_POST['clave_actual'])) {
                        if ($_POST['clave_nueva_1'] == $_POST['clave_nueva_2']) {
                            if ($_POST['clave_nueva_1'] != $_POST['clave_actual']) {
                                if ($cliente->setClave($_POST['clave_nueva_1'])) {
                                    if ($cliente->changePassword()) {
                                        $result['status'] = 1;
                                        $result['message'] = 'Contraseña cambiada correctamente';
                                    } else {
                                        $result['exception'] = Database::getException();
                                    }
                                } else {
                                    $result['exception'] = $cliente->getPasswordError();
                                }
                            } else {
                                $result['exception'] = 'Claves nuevas diferentes';
                            }
                        } else {
                            $result['exception'] = 'Claves nuevas diferentes';
                        }
                    } else {
                        $result['exception'] = 'Clave actual incorrecta';
                    }
                } else {
                    $result['exception'] = 'Usuario incorrecto';
                }
                break;
            case 'controlTime':
                if (isset($_SESSION['tiempopb'])) {
                    $_SESSION['tiempopb'] = time();
                    $result['status'] = 1;
                } else {
                    $result['exception'] = 'Ocurrió un problema al renovar la sesión';
                }
                break;
            case 'checkIntervalo':
                if ($cliente->checkIntervalo()) {
                    $result['status'] = 1;
                    $result['message'] = 'Autenticación correcta';
                } else {
                    if (Database::getException()) {
                        $result['exception'] = Database::getException();
                    } else {
                        $result['exception'] = 'Autenticación correcta. Por seguridad debes cambiar tu clave de acceso';
                    }
                }
                break;
            default:
                $result['exception'] = 'Acción no disponible dentro de la sesión';
        }
    } else {
        if (isset($_SESSION['factorpb'])) {   
            switch ($_GET['action']) {
                case 'checkFactor':
                    if ($cliente->setId($_SESSION['factorpb'])) {
                        if ($cliente->checkFactor()) {
                            $result['status'] = 1;
                            $result['message'] = 'Segundo factor de autenticacion';
                        } else {
                            if (Database::getException()) {
                                $result['exception'] = Database::getException();
                            } else {
                                $result['exception'] = 'Puedes continuar';
                            }
                        }
                    } else {
                        $result['exception'] = 'Hubo un error';
                    }
                break;
                case 'logCode':
                    $_POST = $cliente->validateForm($_POST);
                    if ($cliente->setId($_SESSION['factorpb'])) {
                        if ($cliente->checkIntentos()) {
                            if ($cliente->setCode($_POST['codigo'])) {
                                if ($cliente->checkCode()) {
                                    if ($cliente->registerSession()) {
                                        if ($cliente->unregisterFailedSession()) {
                                            if ($cliente->resetCode()) {
                                                //Se guardan los datos del usuario
                                                $_SESSION['id_cliente'] = $cliente->getId();
                                                $_SESSION['correo_cliente'] = $cliente->getCorreo();
                                                //Se inicia el tiempo de la sesión
                                                $_SESSION['tiempopb'] = time();
                                                unset($_SESSION['factorpb']);
                                                if (isset($_SESSION['factorpb'])) {
                                                    $result['exception'] = 'Autenticación correcta---';
                                                } else {
                                                    $result['status'] = 1;
                                                    $result['message'] = 'Autenticación correcta';
                                                }
                                            } else {
                                                if (Database::getException()) {
                                                    $result['exception'] = Database::getException();
                                                } else {
                                                    $result['exception'] = 'No se resetear el código';
                                                }
                                            }
                                        } else {
                                            if (Database::getException()) {
                                                $result['exception'] = Database::getException();
                                            } else {
                                                $result['exception'] = 'No se pudo registrar la sesión';
                                            }
                                        }
                                    } else {
                                        if (Database::getException()) {
                                            $result['exception'] = Database::getException();
                                        } else {
                                            $result['exception'] = 'No se pudo registrar la sesión';
                                        }
                                    }
                                } else {
                                    if (Database::getException()) {
                                        $result['exception'] = Database::getException();
                                    } else {
                                        if ($cliente->registerSession()) {
                                            $result['exception'] = 'Clave incorrecta';
                                        } else {
                                            if (Database::getException()) {
                                                $result['exception'] = Database::getException();
                                            } else {
                                                $result['exception'] = 'No se pudo registrar la sesión';
                                            }
                                        }
                                    }
                                }
                            } else {
                                $result['exception'] = 'Los códigos están compuestos unicamente por números';
                            }
                        } else {
                            if (Database::getException()) {
                                $result['exception'] = Database::getException();
                            } else {
                                $result['exception'] = 'Has excedido el limite de intentos. Prueba ingresar mañana';
                            }
                        }
                    } else {
                        $result['exception'] = 'Usuario incorrecto';
                    }
                    break;
                case 'sendCode':
                    if ($cliente->readCode($_SESSION['factorpb'])) {
                        if ($cliente->setId($_SESSION['factorpb'])) {
                            if ($result['dataset'] = $cliente->readOne()) {
                                $result['status'] = 1;
                                $result['message'] = 'Ya hay un código en tu correo';
                            } else {
                                if (Database::getException()) {
                                    $result['exception'] = Database::getException();
                                } else {
                                    $result['exception'] = 'Usuario inexistente 1';
                                }
                            }
                        } else {
                            $result['exception'] = 'Usuario incorrecto';
                        }
                    } else {
                        if (Database::getException()) {
                            $result['exception'] = Database::getException();
                        } else {
                            if ($cliente->setId($_SESSION['factorpb'])) {
                                if ($cliente->createCode()) {
                                    if ($result['dataset'] = $cliente->readOne()) {
                                        $result['status'] = 1;
                                        $result['message'] = 'Generamos tu código';
                                    } else {
                                        if (Database::getException()) {
                                            $result['exception'] = Database::getException();
                                        } else {
                                            $result['exception'] = 'Usuario inexistente 2';
                                        }
                                    }
                                } else {
                                    if (Database::getException()) {
                                        $result['exception'] = Database::getException();
                                    } else {
                                        $result['exception'] = 'No se pudo enviar el código de seguridad';
                                    }
                                }
                            } else {
                                $result['exception'] = 'Usuario incorrecto';
                            }
                        }
                    }
                break;
                case 'resetCode':
                    if ($cliente->setId($_SESSION['factorpb'])) {
                        if ($cliente->resetCode()) {
                            unset($_SESSION['factorpb']);
                            if (isset($_SESSION['factorpb'])) {
                                $result['exception'] = 'Error al volver';
                            } else {
                                $result['status'] = 1;
                                $result['message'] = 'El tiempo de espera se agotó. Por favor vuelve a iniciar sesión';
                            }
                        } else {
                            if (Database::getException()) {
                                $result['exception'] = Database::getException();
                            } else {
                                $result['exception'] = 'No se pudo resetear';
                            }
                        }
                    } else {
                        $result['exception'] = 'Hubo un error';
                    }
                break;
                default:
                $result['exception'] = 'Acción no disponible dentro de la sesión';
                //$_SESSION['factor'] = false;
            }
        } else {
            // Se compara la acción a realizar cuando el cliente no ha iniciado sesión.
            switch ($_GET['action']) {
                case 'viewSession':
                    if (isset($_SESSION['id_cliente'])) {
                        $result['status'] = 1;
                        $result['message'] = 'Existe una Sesión';
                    } else {
                        $result['exception'] = 'No existe una Sesión';
                    }
                    break;
                case 'register':
                    $_POST = $cliente->validateForm($_POST);
                    // Se sanea el valor del token para evitar datos maliciosos.
                    $token = filter_input(INPUT_POST, 'g-recaptcha-response', FILTER_SANITIZE_STRING);
                    if ($token) {
                        $secretKey = '6LeVm2QcAAAAAPc3jgpJaSWskO6Vrlme19bj6X3Y';
                        $ip = $_SERVER['REMOTE_ADDR'];

                        $data = array(
                            'secret' => $secretKey,
                            'response' => $token,
                            'remoteip' => $ip
                        );

                        $options = array(
                            'http' => array(
                                'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
                                'method'  => 'POST',
                                'content' => http_build_query($data)
                            ),
                            'ssl' => array(
                                'verify_peer' => false,
                                'verify_peer_name' => false
                            )
                        );

                        $url = 'https://www.google.com/recaptcha/api/siteverify';
                        $context  = stream_context_create($options);
                        $response = file_get_contents($url, false, $context);
                        $captcha = json_decode($response, true);

                        if ($captcha['success']) {
                            $_POST = $cliente->validateForm($_POST);
                            if ($cliente->setNombres($_POST['nombre'])) {
                                if ($cliente->setApellidos($_POST['apellido'])) {
                                    if ($cliente->setCorreo($_POST['email'])) {
                                        if ($cliente->setTelefono($_POST['telefono'])) {
                                            if ($_POST['clave'] == $_POST['clave2']) {
                                                if ($_POST['clave'] != $_POST['email']) {
                                                    if ($_POST['clave'] != $_POST['telefono']) {
                                                        if ($cliente->setClave($_POST['clave'])) {
                                                            if($cliente->setFactor(isset($_POST['factor']) ? 1 : 0)){
                                                                if ($cliente->register()) {
                                                                    $result['status'] = 1;
                                                                    $result['message'] = 'Registro exitoso';
                                                                } else {
                                                                    $result['exception'] = Database::getException();
                                                                }
                                                            } else {
                                                            $result['exception'] = 'EStado incorrecto';
                                                            } 
                                                        } else {
                                                            $result['exception'] = $cliente->getPasswordError();
                                                        }
                                                    } else {
                                                        $result['exception'] = 'Por seguridad no utilíces tu telefono como contraseña';
                                                    }
                                                } else {
                                                    $result['exception'] = 'Por seguridad no utilíces tu correo como contraseña';
                                                }
                                            } else {
                                                $result['exception'] = 'Claves diferentes';
                                            }
                                        } else {
                                            $result['exception'] = 'Teléfono incorrecto';
                                        }
                                    } else {
                                        $result['exception'] = 'Correo incorrecto';
                                    }
                                } else {
                                    $result['exception'] = 'Apellidos incorrectos';
                                }
                            } else {
                                $result['exception'] = 'Nombres incorrectos';
                            }
                        } else {
                            $result['recaptcha'] = 1;
                            $result['exception'] = 'No eres un humano';
                        }
                    } else {
                        $result['exception'] = 'Ocurrió un problema al cargar el reCAPTCHA';
                    }
                    break;
                    case 'sendEmail':
                        $_POST = $cliente->validateForm($_POST);
                        // Generamos el codigo de seguridad 
                        $code = rand(999999, 111111);
                        // Concatenamos el codigo generado dentro del mensaje a enviar
                        $message = "Has solicitado recuperar tu contraseña por medio de correo electrónico, su código de seguridad es: $code";
                        // Colocamos el asunto del correo a enviar
                        $asunto = "Recuperación de contraseña California";
                        // Validmos el formato del mensaje que se enviara en el correo
                        if ($email->setMensaje($message)) {
                            // Validamos si el correo ingresado tiene formato correcto
                            if ($email->setCorreo($_POST['correo'])) {
                                if ($email->validarCorreo()) {
                                    // Validamos si el correo ingresado tiene formato correcto
                                    if ($email->setAsunto($asunto)) {
                                        // Ejecutamos la funcion para enviar el correo electronico
                                        if ($email->enviarCorreo()) {
                                            $result['status'] = 1;
                                            // Colocamos el mensaje de exito 
                                            $result['message'] = 'Código enviado correctamente';
                                            // Guardamos el correo al que se envio el código
                                            $_SESSION['mail'] = $email->getCorreo();
                                            // Ejecutamos funcion para obtener el usuario del correo ingresado
                                            //$usuario->obtenerUsuario($_SESSION['mail']);
                                            // Ejecutamos funcion para actualizar el codigo de recuperacion del usuario en la base de datos
                                            $email->actualizarCodigo($code);
                                        } else {
                                            // En caso que el correo no se envie mostramos el error
                                            $result['exception'] = $_SESSION['error'];
                                        }
                                    } else {
                                        $result['exception'] = 'Asunto incorrecto';
                                    }
                                } else {
                                    $result['exception'] = 'El correo ingresado no esta registrado';
                                }
                            } else {
                                $result['exception'] = 'Correo incorrecto';
                            }
                        } else {
                            $result['exception'] = 'Mensaje incorrecto';
                        }
                        break;
                        case 'verifyCode':
                            $_POST = $cliente->validateForm($_POST);
                            // Validmos el formato del mensaje que se enviara en el correo
                            if ($email->setCodigo($_POST['codigo'])) {
                                // Validamos si el correo ingresado tiene formato correcto
                                if ($email->setCorreo($_SESSION['mail'])) {
                                    // Ejecutamos la funcion para validar el codigo de seguridad
                                    if ($email->validarCodigo()) {
                                        $result['status'] = 1;
                                        // Colocamos el mensaje de exito 
                                        $result['message'] = 'El código ingresado es correcto';
                                    } else {
                                        // En caso que el correo no se envie mostramos el error
                                        $result['exception'] = 'El código ingresado no es correcto';
                                    }
                                } else {
                                    $result['exception'] = 'Correo incorrecto';
                                }
                            } else {
                                $result['exception'] = 'Mensaje incorrecto';
                            }
                        break;
                        case 'changePassword':
                            // Obtenemos el form con los inputs para obtener los datos
                            $_POST = $cliente->validateForm($_POST);
                            if ($cliente->setCorreo($_SESSION['mail'])) {
                                if ($cliente->setClave($_POST['clave1'])) {
                                    // Ejecutamos la funcion para actualizar al usuario
                                    if ($cliente->updatePass()) {
                                        $result['status'] = 1;
                                        $result['message'] = 'Clave actualizada correctamente';
                                    } else {
                                        $result['exception'] = Database::getException();
                                    }
                                } else {
                                    $result['exception'] = $cliente->getPasswordError();
                                }
                            } else {
                                $result['exception'] = 'Correo incorrecto';
                            }
                            break;
                case 'logIn':
                    $_POST = $cliente->validateForm($_POST);
                    if ($cliente->checkUser($_POST['usuario'])) {
                        if ($cliente->checkIntentos()) {
                            if ($cliente->checkPassword($_POST['clave'])) {
                                if ($cliente->checkFactor()) {
                                    $result['status'] = 1;
                                    $_SESSION['factorpb'] = $cliente->getId();
                                } else {
                                    if (Database::getException()) {
                                        $result['exception'] = Database::getException();
                                    } else {
                                        if ($cliente->registerSession()) {
                                            if ($cliente->unregisterFailedSession()) {
                                                $_SESSION['id_cliente'] = $cliente->getId();
                                                $_SESSION['correo_cliente'] = $cliente->getCorreo();
                                                $_SESSION['tiempopb'] = time();
                                                $result['status'] = 1;
                                                $result['message'] = 'Autenticación correcta';
                                            } else {
                                                if (Database::getException()) {
                                                    $result['exception'] = Database::getException();
                                                } else {
                                                    $result['exception'] = 'No se pudieron resetar los intentos fallidos';
                                                }
                                            }
                                        } else {
                                            if (Database::getException()) {
                                                $result['exception'] = Database::getException();
                                            } else {
                                                $result['exception'] = 'No se pudo registrar la sesión';
                                            }
                                        }
                                    }
                                }
                            } else {
                                if (Database::getException()) {
                                    $result['exception'] = Database::getException();
                                } else {
                                    if ($cliente->registerSession()) {
                                        $result['exception'] = 'Clave incorrecta';
                                    } else {
                                        if (Database::getException()) {
                                            $result['exception'] = Database::getException();
                                        } else {
                                            $result['exception'] = 'No se pudo registrar la sesión';
                                        }
                                    }
                                }
                            }
                        } else {
                            if (Database::getException()) {
                                $result['exception'] = Database::getException();
                            } else {
                                $result['exception'] = 'Has excedido el limite de intentos para ingresar sesión. Por seguridad tu cuenta ha sido inhanilitada. Prueba ingresar mañana';
                            }
                        }
                    } else {
                        if (Database::getException()) {
                            $result['exception'] = Database::getException();
                        } else {
                            $result['exception'] = 'Alias incorrecto';
                        }
                    }
                    break;
                default:
                    $result['exception'] = 'Acción no disponible fuera de la sesión';
            }
        }
    }
    // Se indica el tipo de contenido a mostrar y su respectivo conjunto de caracteres.
    header('content-type: application/json; charset=utf-8');
    // Se imprime el resultado en formato JSON y se retorna al controlador.
    print(json_encode($result));
} else {
    print(json_encode('Recurso no disponible'));
}
