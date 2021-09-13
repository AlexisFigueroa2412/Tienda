<?php
require_once('../../helpers/database.php');
require_once('../../helpers/validator.php');
require_once('../../models/clientes.php');

// Se comprueba si existe una acción a realizar, de lo contrario se finaliza el script con un mensaje de error.
if (isset($_GET['action'])) {
    // Se crea una sesión o se reanuda la actual para poder utilizar variables de sesión en el script.
    session_start();
    // Se instancia la clase correspondiente.
    $cliente = new Clientes;
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
                                                        if ($cliente->register()) {
                                                            $result['status'] = 1;
                                                            $result['message'] = 'Registro exitoso';
                                                        } else {
                                                            $result['exception'] = Database::getException();
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
                    unset($_SESSION['id_cliente'],$_SESSION['correo_cliente'],$_SESSION['tiempopb']);
                    if (isset($_SESSION['id_cliente']) && isset($_SESSION['correo_cliente']) && isset($_SESSION['tiempopb'])) {
                        $result['exception'] = 'Ocurrió un problema al cerrar la sesión';
                    } else {
                        $result['status'] = 1;
                        $result['message'] = 'Sesión eliminada correctamente';
                    }
                break;
                case 'controlTime':   
                    if (isset($_SESSION['tiempopb'])) {
                        $_SESSION['tiempopb'] = time();
                        $result['status'] = 1;
                    }else {
                        $result['exception'] = 'Ocurrió un problema al renovar la sesión';
                    }
                break;
            default:
                $result['exception'] = 'Acción no disponible dentro de la sesión';
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
                                                        if ($cliente->register()) {
                                                            $result['status'] = 1;
                                                            $result['message'] = 'Registro exitoso';
                                                        } else {
                                                            $result['exception'] = Database::getException();
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
            case 'logIn':
                $_POST = $cliente->validateForm($_POST);
                if ($cliente->checkUser($_POST['usuario'])) {
                    if ($cliente->checkIntentos()) {
                        if ($cliente->checkPassword($_POST['clave'])) {
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
    // Se indica el tipo de contenido a mostrar y su respectivo conjunto de caracteres.
    header('content-type: application/json; charset=utf-8');
    // Se imprime el resultado en formato JSON y se retorna al controlador.
    print(json_encode($result));
} else {
    print(json_encode('Recurso no disponible'));
}