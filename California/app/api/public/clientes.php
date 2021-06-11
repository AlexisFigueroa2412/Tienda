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
            case 'register':
                $_POST = $cliente->validateForm($_POST);
                        if ($cliente->setNombres($_POST['nombre'])) {
                            if ($cliente->setApellidos($_POST['apellido'])) {
                                if ($cliente->setCorreo($_POST['email'])) {
                                    if ($cliente->setTelefono($_POST['telefono'])) {
                                        if ($_POST['clave'] == $_POST['clave2']) {
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
                if (session_destroy()) {
                    $result['status'] = 1;
                    $result['message'] = 'Sesión eliminada correctamente';
                } else {
                    $result['exception'] = 'Ocurrió un problema al cerrar la sesión';
                }
                break;
                case 'logIn':
                    $_POST = $cliente->validateForm($_POST);
                    if ($cliente->checkUser($_POST['usuario'])) {
                            if ($cliente->checkPassword($_POST['clave'])) {
                                $_SESSION['id_cliente'] = $cliente->getId();
                                $_SESSION['correo_cliente'] = $cliente->getCorreo();
                                $result['status'] = 1;
                                $result['message'] = 'Autenticación correcta';
                            } else {
                                if (Database::getException()) {
                                    $result['exception'] = Database::getException();
                                } else {
                                    $result['exception'] = 'Clave incorrecta';
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
                $result['exception'] = 'Acción no disponible dentro de la sesión';
        }
    } else {
        // Se compara la acción a realizar cuando el cliente no ha iniciado sesión.
        switch ($_GET['action']) {
            case 'register':
                $_POST = $cliente->validateForm($_POST);
                        if ($cliente->setNombres($_POST['nombre'])) {
                            if ($cliente->setApellidos($_POST['apellido'])) {
                                if ($cliente->setCorreo($_POST['email'])) {
                                    if ($cliente->setTelefono($_POST['telefono'])) {
                                        if ($_POST['clave'] == $_POST['clave2']) {
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
            case 'logIn':
                $_POST = $cliente->validateForm($_POST);
                if ($cliente->checkUser($_POST['usuario'])) {
                        if ($cliente->checkPassword($_POST['clave'])) {
                            $_SESSION['id_cliente'] = $cliente->getId();
                            $_SESSION['correo_cliente'] = $cliente->getCorreo();
                            $result['status'] = 1;
                            $result['message'] = 'Autenticación correcta';
                        } else {
                            if (Database::getException()) {
                                $result['exception'] = Database::getException();
                            } else {
                                $result['exception'] = 'Clave incorrecta';
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