<?php
require_once('../../helpers/database.php');
require_once('../../helpers/validator.php');
require_once('../../models/pedidos.php');

// Se comprueba si existe una acción a realizar, de lo contrario se finaliza el script con un mensaje de error.
if (isset($_GET['action'])) {
    // Se crea una sesión o se reanuda la actual para poder utilizar variables de sesión en el script.
    session_start();
    // Se instancia la clase correspondiente.
    $pedido = new Pedidos;
    // Se declara e inicializa un arreglo para guardar el resultado que retorna la API.
    $result = array('status' => 0, 'session' => 0, 'message' => null, 'exception' => null);
    // Se verifica si existe una sesión iniciada como cliente para realizar las acciones correspondientes.
    if (isset($_SESSION['id_cliente'])) {
        $result['session'] = 1;
        // Se compara la acción a realizar cuando un cliente ha iniciado sesión.
        switch ($_GET['action']) {
            //Accion para crear el detalle
            case 'createDetail':
                //Se envian los datos
                if ($pedido->setCliente($_SESSION['id_cliente'])) {
                    if ($pedido->readOrder()) {
                        $_POST = $pedido->validateForm($_POST);
                        if ($pedido->setProducto($_POST['id_producto'])) {
                            if ($pedido->setCantidad($_POST['cantidad_producto'])) {
                                if ($pedido->setPrecio($_POST['precio_producto'])) {
                                    //Se ejecuta el crear
                                    if ($pedido->createDetail()) {
                                        //Se resta la cantidad en inventario
                                        if ($pedido->restarCatalogo()) {
                                            $result['status'] = 1;
                                            $result['message'] = 'Producto agregado correctamente';
                                        } else {
                                            $result['exception'] = 'El producto se agregó correctamente pero no pudo restarse del inventario';
                                        }
                                    } else {
                                        $result['exception'] = 'Ocurrió un problema al agregar el producto';
                                    }
                                } else {
                                    $result['exception'] = 'Precio incorrecto';
                                }
                            } else {
                                $result['exception'] = 'Cantidad incorrecta';
                            }
                        } else {
                            $result['exception'] = 'Producto incorrecto';
                        }
                    } else {
                        $result['exception'] = 'Ocurrió un problema al obtener el pedido';
                    }
                } else {
                    $result['exception'] = 'Cliente incorrecto';
                }
                break;
            //Se lee el carrito    
            case 'readCart':
                if ($pedido->setCliente($_SESSION['id_cliente'])) {
                    if ($pedido->readOrder()) {
                        if ($result['dataset'] = $pedido->readCart()) {
                            $result['status'] = 1;
                            $_SESSION['id_pedido'] = $pedido->getIdPedido();
                        } else {
                            if (Database::getException()) {
                                $result['exception'] = Database::getException();
                            } else {
                                $result['exception'] = 'No tiene productos en el carrito';
                            }
                        }
                    } else {
                        $result['exception'] = 'Debe agregar un producto al carrito';
                    }
                } else {
                    $result['exception'] = 'Cliente incorrecto';
                }
                break;
            //Se lee el carrito    
            case 'readFact':
                if ($result['dataset'] = $pedido->readFact()) {
                    $result['status'] = 1;
                } else {
                    if (Database::getException()) {
                        $result['exception'] = Database::getException();
                    } else {
                        $result['exception'] = 'No hay facturas';
                    }
                }
                break;
             //Se actualiza el detalle   
            case 'updateDetail':
                //Se envian los datos
                if ($pedido->setIdPedido($_SESSION['id_pedido'])) {
                    $_POST = $pedido->validateForm($_POST);
                    if ($pedido->setIdDetalle($_POST['id_detalle'])) {
                        if ($pedido->setCantidad($_POST['cantidad_producto'])) {
                            if ($pedido->setAnterior($_POST['anterior'])) {
                                //Se actualiza
                                if ($pedido->updateDetail()) {
                                    $result['message'] = 'Cantidad modificada correctamente';
                                    //Se modifica la cantidad en el inventario
                                    if ($pedido->cambioCatalogo()) {
                                        $result['status'] = 1;
                                        $result['message'] = 'Cantidad en inventario modificada correctamente';
                                    } else {
                                        $result['exception'] = 'Ocurrió un problema al modificar la cantidad en inventario';
                                    }
                                } else {
                                    $result['exception'] = 'Ocurrió un problema al modificar la cantidad';
                                }
                            } else {
                                $result['exception'] = 'Cantidad anterior incorrecta';
                            }
                        } else {
                            $result['exception'] = 'Cantidad incorrecta';
                        }
                    } else {
                        $result['exception'] = 'Detalle incorrecto';
                    }
                } else {
                    $result['exception'] = 'Pedido incorrecto';
                }
                break;
            //Borrar detalle    
            case 'deleteDetail':
                if ($pedido->setIdPedido($_SESSION['id_pedido'])) {
                    if ($pedido->setIdDetalle($_POST['id_detalle'])) {
                        //Se devuelven los productos al inventario
                        if ($pedido->devolverCatalogo()) {
                            $result['message'] = 'Producto devuelto correctamente';
                            //Se borra el detalle
                            if ($pedido->deleteDetail()) {
                                $result['status'] = 1;
                                $result['message'] = 'Producto removido correctamente';
                            } else {
                                $result['exception'] = 'El producto se devolvió correctamente pero no pudo removerse su registro';
                            }
                        } else {
                            $result['exception'] = 'Ocurrió un problema al remover el producto';
                        }
                    } else {
                        $result['exception'] = 'Detalle incorrecto';
                    }
                } else {
                    $result['exception'] = 'Pedido incorrecto';
                }
                break;
            //Finaliza la orden    
            case 'finishOrder':
                if ($pedido->setIdPedido($_SESSION['id_pedido'])) {
                    if ($pedido->finishOrder()) {
                        $result['status'] = 1;
                        $result['message'] = 'Pedido finalizado correctamente';
                    } else {
                        $result['exception'] = 'Ocurrió un problema al finalizar el pedido';
                    }
                } else {
                    $result['exception'] = 'Pedido incorrecto';
                }
                break;
            default:
                $result['exception'] = 'Acción no disponible dentro de la sesión';
        }
    } else {
        // Se compara la acción a realizar cuando un cliente no ha iniciado sesión.
        switch ($_GET['action']) {
            case 'createDetail':
                $result['exception'] = 'Debe iniciar sesión para agregar el producto al carrito';
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
