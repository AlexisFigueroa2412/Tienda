<?php
require_once('../../helpers/database.php');
require_once('../../helpers/validator.php');
require_once('../../models/comentarios.php');

// Se comprueba si existe una acción a realizar, de lo contrario se finaliza el script con un mensaje de error.
if (isset($_GET['action'])) {
    // Se crea una sesión o se reanuda la actual para poder utilizar variables de sesión en el script.
    session_start();
    // Se instancia la clase correspondiente.
    $comentario = new Comentarios;
    // Se declara e inicializa un arreglo para guardar el resultado que retorna la API.
    $result = array('status' => 0, 'session' => 0, 'message' => null, 'exception' => null);
    // Se verifica si existe una sesión iniciada como cliente para realizar las acciones correspondientes.
    if (isset($_SESSION['idcliente'])) {
       $result['session'] = 1;
        // Se compara la acción a realizar cuando un cliente ha iniciado sesión.
        switch ($_GET['action']) {
            case 'createCommentary':
                    $_POST = $comentario->validateForm($_POST);
                    if ($comentario->setProducto($_POST['txtC'])) {
                        if ($comentario->setComentario($_POST['comentario'])) {
                            if($comentario->setCalificacion($_POST['calificacion'])){
                               
                                    if($comentario->StartCommentary()){
                                        if ($comentario->CreateRow()) {
                                            $result['status'] = 1;
                                            $result['message'] = 'Comentario agregado correctamente';
                                        } else {
                                            
                                            $result['exception'] = Database::getException();
                                        }
                                    }else{
                                            $result['exception'] = 'Solo puede comentar en productos adquiridos';
                                            $result['session'] = 1;
                                        }
                               
                            }else{
                                $result['exception'] = 'Calificacion incorrecta';
                            }
                        } else {
                            $result['exception'] = 'Comentario incorrecto';
                        }
                    } else {
                        $result['exception'] = 'Producto incorrecto';
                    }
                
                break;
            case 'readComents':
                if ($comentario->setProducto($_POST['id'])) {
                    if ($result['dataset'] = $comentario->readComents()) {
                        $result['status'] = 1;                       
                    } else {
                        if (Database::getException()) {
                            $result['exception'] = Database::getException();
                        } else {
                            $result['exception'] = 'No hay comentarios';
                        }
                    }
                } else {
                    $result['exception'] = 'Producto incorrecto';
                }
                break;
            
           
            
            default:
                $result['exception'] = 'Acción no disponible dentro de la sesión';
        }
   } else {
        // Se compara la acción a realizar cuando un cliente no ha iniciado sesión.
        switch ($_GET['action']) {
            case 'createCommentary':
                $result['exception'] = 'Debe iniciar sesión para agregar Comentario';
                break;
            case 'readComents':
               if ($comentario->setProducto($_POST['id'])) {
                    if ($result['dataset'] = $comentario->readComents()) {
                         $result['status'] = 1;                       
                    } else {
                       if (Database::getException()) {
                               $result['exception'] = Database::getException();
                       } else {
                              $result['exception'] = 'No hay comentarios';
                              }
                     }
                } else {
                     $result['exception'] = 'Articulo incorrecto';
                }
                    break;  
            default:
                $result['exception'] = 'Acción no disponible fuera de la sesión';
        
    }}
    // Se indica el tipo de contenido a mostrar y su respectivo conjunto de caracteres.
    header('content-type: application/json; charset=utf-8');
    // Se imprime el resultado en formato JSON y se retorna al controlador.
    print(json_encode($result));
}else {
    print(json_encode('Recurso no disponible'));
}
