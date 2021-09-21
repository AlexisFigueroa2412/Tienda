<?php
require_once('../../helpers/database.php');
require_once('../../helpers/validator.php');
require_once('../../models/usuarios.php');

// Se comprueba si existe una acción a realizar, de lo contrario se finaliza el script con un mensaje de error.
if (isset($_GET['action'])) {
    // Se crea una sesión o se reanuda la actual para poder utilizar variables de sesión en el script.
    session_start();
    // Se instancia la clase correspondiente.
    $usuario = new Usuarios;
    // Se declara e inicializa un arreglo para guardar el resultado que retorna la API.
    $result = array('status' => 0, 'error' => 0, 'message' => null, 'exception' => null);
    // Se verifica si existe una sesión iniciada como administrador, de lo contrario se finaliza el script con un mensaje de error.
    if (isset($_SESSION['id_usuario'])) {
        // Se compara la acción a realizar cuando un administrador ha iniciado sesión.
        switch ($_GET['action']) {
            case 'viewSession':
                if (isset($_SESSION['id_usuario'])) {
                    $result['status'] = 1;
                    $result['message'] = $_SESSION['id_usuario'];
                } else {
                    $result['exception'] = $_SESSION['id_usuario'];
                }
            break;
            case 'logOut':
                unset($_SESSION['id_usuario'],$_SESSION['alias_usuario'],$_SESSION['tiempopv']);
                    if (isset($_SESSION['id_usuario'])) {
                        $result['exception'] = 'Ocurrió un problema al cerrar la sesión';
                    } else {
                        $result['status'] = 1;
                        $result['message'] = 'Sesión eliminada correctamente';
                    }
                break;
                case 'changePassword':
                    if ($usuario->setId($_SESSION['id_usuario'])) {
                        $_POST = $usuario->validateForm($_POST);
                        if ($usuario->checkPassword($_POST['clave_actual'])) {
                            if ($_POST['clave_nueva_1'] == $_POST['clave_nueva_2']) {
                                if ($_POST['clave_nueva_1'] != $_POST['clave_actual']) {
                                    if ($usuario->setClave($_POST['clave_nueva_1'])) {
                                        if ($usuario->changePassword()) {
                                            $result['status'] = 1;
                                            $result['message'] = 'Contraseña cambiada correctamente';
                                        } else {
                                            $result['exception'] = Database::getException();
                                        }
                                    } else {
                                        $result['exception'] = $usuario->getPasswordError();
                                    }
                                } else {
                                    $result['exception'] = 'Tu Clave debe de ser distinta a la anterior';
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
                if (isset($_SESSION['tiempopv'])) {
                    $_SESSION['tiempopv'] = time();
                    $result['status'] = 1;
                }else {
                    $result['exception'] = 'Ocurrió un problema al renovar la sesión';
                }
                break;
            case 'readAll':
                if ($result['dataset'] = $usuario->readAll()) {
                    $result['status'] = 1;
                } else {
                    if (Database::getException()) {
                        $result['exception'] = Database::getException();
                    } else {
                        $result['exception'] = 'No hay usuarios registrados';
                    }
                }
                break;
            case 'checkIntervalo':
                if ($usuario->checkIntervalo()) {
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
            case 'search':
                $_POST = $usuario->validateForm($_POST);
                if ($_POST['search'] != '') {
                    if ($result['dataset'] = $usuario->searchRows($_POST['search'])) {
                        $result['status'] = 1;
                        $rows = count($result['dataset']);
                        if ($rows > 1) {
                            $result['message'] = 'Se encontraron ' . $rows . ' coincidencias';
                        } else {
                            $result['message'] = 'Solo existe una coincidencia';
                        }
                    } else {
                        if (Database::getException()) {
                            $result['exception'] = Database::getException();
                        } else {
                            $result['exception'] = 'No hay coincidencias';
                        }
                    }
                } else {
                    $result['exception'] = 'Ingrese un valor para buscar';
                }
                break;
            case 'create':
                $_POST = $usuario->validateForm($_POST);
                if ($usuario->setNombres($_POST['nombre_usuario'])) {
                    if ($usuario->setApellidos($_POST['apellidos_usuario'])) {
                        if ($usuario->setCorreo($_POST['correo_usuario'])) {
                            if ($usuario->setAlias($_POST['alias_usuario'])) {         
                                if ($_POST['clave_usuario'] == $_POST['confirmar_clave']) {
                                    if ($_POST['clave_usuario'] != $_POST['alias_usuario']) {
                                        if ($_POST['clave_usuario'] != $_POST['correo_usuario']) {
                                            if ($usuario->setClave($_POST['clave_usuario'])) {
                                                if($usuario->setEstado(isset($_POST['estado_usuario']) ? 1 : 0)){
                                                    if($usuario->setFactor(isset($_POST['factor']) ? 1 : 0)){
                                                        if ($usuario->createRow()) {
                                                            $result['status'] = 1;
                                                            $result['message'] = 'Usuario creado correctamente';
                                                        } else {
                                                            $result
                                                            ['exception'] = Database::getException();
                                                        }
                                                    } else {
                                                    $result['exception'] = 'Estado incorrecto';
                                                    } 
                                                } else {
                                                $result['exception'] = 'Estado incorrecto';
                                                } 
                                            } else {
                                                $result['exception'] = $usuario->getPasswordError();
                                            }
                                        } else {
                                            $result['exception'] = 'La contraseña debe de ser distinta a alias que ingresaste';
                                        }
                                    } else {
                                        $result['exception'] = 'La contraseña debe de ser distinta a alias que ingresaste';
                                    } 
                                } else {
                                    $result['exception'] = 'Claves diferentes';
                                } 
                            } else {
                                $result['exception'] = 'Alias incorrecto';
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
            case 'readOne':
                if ($usuario->setId($_POST['id_usuario'])) {
                    if ($result['dataset'] = $usuario->readOne()) {
                        $result['status'] = 1;
                    } else {
                        if (Database::getException()) {
                            $result['exception'] = Database::getException();
                        } else {
                            $result['exception'] = 'Usuario inexistente';
                        }
                    }
                } else {
                    $result['exception'] = 'Usuario incorrecto';
                }
                break;
            case 'update':
                $_POST = $usuario->validateForm($_POST);
                if ($usuario->setId($_POST['id_usuario'])) {
                    if ($usuario->readOne()) {
                        if ($usuario->setNombres($_POST['nombre_usuario'])) {
                            if ($usuario->setApellidos($_POST['apellidos_usuario'])) {
                                if ($usuario->setCorreo($_POST['correo_usuario'])) {
                                    if($usuario->setEstado(isset($_POST['estado_usuario']) ? 1 : 0)){
                                        if($usuario->setFactor(isset($_POST['factor']) ? 1 : 0)){
                                            if ($usuario->updateRow()) {
                                                $result['status'] = 1;
                                                $result['message'] = 'Usuario actualizado correctamente';
                                            } else {
                                                $result
                                                ['exception'] = Database::getException();
                                            }
                                        } else {
                                        $result['exception'] = 'Estado incorrecto';
                                        } 
                                    } else {
                                    $result['exception'] = 'Estado incorrecto';
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
                        $result['exception'] = 'Usuario inexistente';
                    }
                }else {
                        $result['exception'] = 'Nombres incorrectos';
                    }
                break;
            case 'delete':
                if ($_POST['id_usuario'] != $_SESSION['id_usuario']) {
                    if ($usuario->setId($_POST['id_usuario'])) {
                        if ($usuario->readOne()) {
                            if ($usuario->deleteRow()) {
                                $result['status'] = 1;
                                $result['message'] = 'Usuario eliminado correctamente';
                            } else {
                                $result['exception'] = Database::getException();
                            }
                        } else {
                            $result['exception'] = 'Usuario inexistente';
                        }
                    } else {
                        $result['exception'] = 'Usuario incorrecto';
                    }
                } else {
                    $result['exception'] = 'No se puede eliminar a sí mismo';
                }
                break;
            default:
                $result['exception'] = 'Acción no disponible dentro de la sesión';
        } 
    } else {
        // Se compara la acción a realizar cuando el administrador no ha iniciado sesión.
        if (isset($_SESSION['factorpv'])) {
            switch ($_GET['action']) {
                case 'checkFactor':
                    if ($usuario->setId($_SESSION['factorpv'])) {
                        if ($usuario->checkFactor()) {
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
                    $_POST = $usuario->validateForm($_POST);
                    if ($usuario->setId($_SESSION['factorpv'])) {
                        if ($usuario->checkIntentos()) {
                            if ($usuario->setCode($_POST['codigo'])) {
                                if ($usuario->checkCode()) {
                                    if ($usuario->registerSession()) {
                                        if ($usuario->unregisterFailedSession()) {
                                            if ($usuario->resetCode()) {
                                                //Se guardan los datos del usuario
                                                $_SESSION['id_usuario'] = $usuario->getId();
                                                $_SESSION['alias_usuario'] = $usuario->getAlias();
                                                //Se inicia el tiempo de la sesión
                                                $_SESSION['tiempopv'] = time();
                                                unset($_SESSION['factorpv']);
                                                if (isset($_SESSION['factorpv'])) {
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
                                        if ($usuario->registerSession()) {
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
                    if ($usuario->readCode($_SESSION['factorpv'])) {
                        if ($usuario->setId($_SESSION['factorpv'])) {
                            if ($result['dataset'] = $usuario->readOne()) {
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
                            if ($usuario->setId($_SESSION['factorpv'])) {
                                if ($usuario->createCode()) {
                                    
                                    if ($result['dataset'] = $usuario->readOne()) {
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
                    if ($usuario->setId($_SESSION['factorpv'])) {
                        if ($usuario->resetCode()) {
                            unset($_SESSION['factorpv']);
                            if (isset($_SESSION['factorpv'])) {
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
            switch ($_GET['action']) {
                case 'viewSession':
                    if (isset($_SESSION['id_usuario'])) {
                        $result['status'] = 1;
                        $result['message'] = 'Existe una Sesión';
                    } else {
                        $result['exception'] = 'No existe una Sesión';
                    }
                break;
                case 'readAll':
                    if ($usuario->readAll()) {
                        $result['status'] = 1;
                        $result['message'] = 'Existe al menos un usuario registrado';
                    } else {
                        if (Database::getException()) {
                            $result['exception'] = Database::getException();
                        } else {
                            $result['exception'] = 'No existen usuarios registrados';
                        }
                    }
                    break;
                case 'register':
                    //Se verifica que no hayan usuarios antes
                    if (!$usuario->readAll()) {
                        //Se valida el formulario
                        $_POST = $usuario->validateForm($_POST);
                        //Se validan los datos enviados desde el formulario
                        if ($usuario->setNombres($_POST['nombres'])) {
                            if ($usuario->setApellidos($_POST['apellidos'])) {
                                if ($usuario->setCorreo($_POST['correo'])) {
                                    if ($usuario->setAlias($_POST['alias'])) {
                                        //Se valida que las claves sean iguales
                                        if ($_POST['clave1'] == $_POST['clave2']) {
                                            //Se valida que la clave sea distinta al alias del usuario
                                            if ($_POST['clave1'] != $_POST['alias']) {
                                                //Se valida que la clave sea distinta al correo
                                                if ($_POST['clave1'] != $_POST['correo']) {
                                                    if ($usuario->setClave($_POST['clave1'])) {
                                                        if($usuario->setFactor(isset($_POST['factorpv']) ? 1 : 0)){
                                                            if ($usuario->createRow()) {
                                                                $result['status'] = 1;
                                                                $result['message'] = 'Usuario creado correctamente';
                                                               } else {
                                                                $result
                                                                ['exception'] = Database::getException();
                                                            }
                                                        } else {
                                                        $result['exception'] = 'EStado incorrecto';
                                                        } 
                                                    } else {
                                                        $result['exception'] = $usuario->getPasswordError();
                                                    }
                                                } else {
                                                    $result['exception'] = 'La clave debe de ser dista al correo';
                                                }
                                            } else {
                                                $result['exception'] = 'La clave debe de ser dinstinta al alias';
                                            }
                                        } else {
                                            $result['exception'] = 'Claves diferentes';
                                        }
                                    } else {
                                        $result['exception'] = 'Alias incorrecto';
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
                        if (Database::getException()) {
                            $result['exception'] = Database::getException();
                        } else {
                            $result['exception'] = 'Existe al menos un usuario registrado';
                       }
                    }
                    break;
                case 'logIn':
                    $_POST = $usuario->validateForm($_POST);
                    if ($usuario->checkUser($_POST['alias'])) {
                        if ($usuario->checkIntentos()) {
                            if ($usuario->checkPassword($_POST['clave'])) {
                                if ($usuario->checkFactor()) {
                                    $result['status'] = 1;
                                    $_SESSION['factorpv'] = $usuario->getId();
                                } else {
                                    if (Database::getException()) {
                                        $result['exception'] = Database::getException();
                                    } else {
                                        if ($usuario->registerSession()) {
                                            if ($usuario->unregisterFailedSession()) {
                                                $result['status'] = 1;
                                                $result['message'] = 'Autenticación correcta';
                                                //Se guardan los datos del usuario
                                                $_SESSION['id_usuario'] = $usuario->getId();
                                                $_SESSION['alias_usuario'] = $usuario->getAlias();
                                                //Se inicia el tiempo de la sesión
                                                $_SESSION['tiempopv'] = time();
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
                                    }
                                }
                            } else {
                                if (Database::getException()) {
                                    $result['exception'] = Database::getException();
                                } else {
                                    if ($usuario->registerSession()) {
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
                                $result['exception'] = 'Has excedido el limite de intentos. Prueba ingresar mañana';
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