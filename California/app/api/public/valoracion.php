<?php
require_once('../../helpers/database.php');
require_once('../../helpers/validator.php');
require_once('../../models/productos.php');

// Se comprueba si existe una acción a realizar, de lo contrario se finaliza el script con un mensaje de error.
if (isset($_GET['action'])) {
    // Se crea una sesión o se reanuda la actual para poder utilizar variables de sesión en el script.
    session_start();
    // Se instancia la clase correspondiente.
    $producto = new Productos;
    // Se declara e inicializa un arreglo para guardar el resultado que retorna la API.
    $result = array('status' => 0, 'message' => null, 'exception' => null);
    // Se verifica si existe una sesión iniciada como administrador, de lo contrario se finaliza el script con un mensaje de error.
    if (isset($_SESSION['id_usuario'])) {
        // Se compara la acción a realizar cuando un administrador ha iniciado sesión.
        switch ($_GET['action']) { 
            //Llamar categoria en especifico
            case 'averageOne':
                if ($producto->setId($_POST['id_producto'])) {
                    if ($result['dataset'] = $producto->averageOne()) {
                        $result['status'] = 1;
                    } else {
                        if (Database::getException()) {
                            $result['exception'] = Database::getException();
                        } else {
                            $result['exception'] = 'No hay valoraciones';
                        }
                    }
                } else {
                    $result['exception'] = 'Acción incorrecta';
                }
                break;
            case 'verify':
                if ($producto->setId($_POST['id_producto'])) {
                    if ($result['dataset'] = $producto->verify()) {
                        $result['status'] = 1;
                    } else {
                        if (Database::getException()) {
                            $result['exception'] = Database::getException();
                        } else {
                            $result['exception'] = 'No puedes comentar';
                        }
                    }
                } else {
                    $result['exception'] = 'Acción incorrecta';
                }
                break;
            case 'Coments':
                if ($producto->setId($_POST['id_producto'])) {
                    if ($result['dataset'] = $producto->Coments()) {
                        $result['status'] = 1;
                    } else {
                        if (Database::getException()) {
                            $result['exception'] = Database::getException();
                        } else {
                             $result['exception'] = 'No hay comentarios de este producto';
                        }
                    }
                } else {
                    $result['exception'] = 'Acción incorrecta';
                }
                break;    
            default:
                $result['exception'] = 'Acción no disponible dentro de la sesión';
        }
        // Se indica el tipo de contenido a mostrar y su respectivo conjunto de caracteres.
        header('content-type: application/json; charset=utf-8');
        // Se imprime el resultado en formato JSON y se retorna al controlador.
        print(json_encode($result));
    } else {
        print(json_encode('Acceso denegado'));
    }
} else {
    print(json_encode('Recurso no disponible'));
}
