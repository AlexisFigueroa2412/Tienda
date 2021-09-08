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
  
        // Se compara la acción a realizar cuando un administrador ha iniciado sesión.
        switch ($_GET['action']) {

            //Esta accion sirve para leer todos los productos
            case 'readAll':
                if ($result['dataset'] = $producto->readAll()) {
                    $result['status'] = 1;
                } else {
                    if (Database::getException()) {
                        $result['exception'] = Database::getException();
                    } else {
                        $result['exception'] = 'No hay productos registrados';
                    }
                }
                break;

            //Esta accion lee los productos por categoria     
            case 'readProductosCategoria':
                if ($categoria->setId($_POST['id_categoria'])) {
                    if ($result['dataset'] = $categoria->readProductosCategoria()) {
                        $result['status'] = 1;
                    } else {
                    if (Database::getException()) {
                        $result['exception'] = Database::getException();
                    } else {
                        $result['exception'] = 'No existen productos para mostrar';
                    }
                }
                } else {
                    $result['exception'] = 'Categoría incorrecta';
                }
                break;
            //Esta accion busca en los productos
            case 'search':
                //Se valida el formulario
                $_POST = $producto->validateForm($_POST);
                //Se verifica que el campo no este vacio
                if ($_POST['search'] != '') {
                    //Se envia el dato y se ejecuta la accion
                    if ($result['dataset'] = $producto->searchRows($_POST['search'])) {
                        $result['status'] = 1;
                        //se cuentan los resultados obtenidos
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
                //Se crea el producto

                if (is_uploaded_file($_FILES['foto']['tmp_name'])) {
                    if ($producto->setImagen($_FILES['foto'])) {
                        if ($producto->createRow()) {
                            $result['status'] = 1;
                            if ($producto->saveFile($_FILES['foto'], $producto->getRuta(), $producto->getImagen())) {
                                $result['message'] = 'Producto creado correctamente';
                            } else {
                                $result['message'] = 'Producto creado pero no se guardó la imagen';
                            }
                        } else {
                            $result['exception'] = Database::getException();;
                        }
                    } else {
                        $result['exception'] = $producto->getImageError();
                    }
                } else {
                    $result['exception'] = 'Seleccione una imagen';
                }

            case 'create':
                $_POST = $producto->validateForm($_POST);
                if ($producto->setNombre($_POST['nombre'])) {
                    if ($producto->setEstado($_POST['estado'] ? 1 : 0)) {
                        if ($producto->setDescripcion($_POST['decripcion'])) {
                            if ($producto->setPrecio($_POST['precio'])) {
                                if ($producto->setCantidad($_POST['cantidad_total'])) {
                                    if ($producto->setMarca($_POST['marca'])) {
                                        if (isset($_POST['tipo_producto'])) {
                                            if ($producto->setTipo($_POST['tipo_producto'])) {     
                                                if (is_uploaded_file($_FILES['foto']['tmp_name'])) {
                                                    if ($producto->setImagen($_FILES['foto'])) {
                                                        if ($producto->createRow()) {
                                                            $result['status'] = 1;
                                                            if ($producto->saveFile($_FILES['foto'], $producto->getRuta(), $producto->getImagen())) {
                                                                $result['message'] = 'Producto creado correctamente';
                                                            } else {
                                                                $result['message'] = 'Producto creado pero no se guardó la imagen';
                                                            }
                                                        } else {
                                                            $result['exception'] = Database::getException();;
                                                        }
                                                    } else {
                                                        $result['exception'] = $producto->getImageError();
                                                    }
                                                } else {
                                                    $result['exception'] = 'Seleccione una imagen';
                                                }
                                            } else {
                                                $result['exception'] = 'Categoría incorrecta';
                                            }
                                        } else {
                                            $result['exception'] = 'Seleccione una categoría';
                                        }
                                    } else {
                                        $result['exception'] = 'Marca incorrecta';
                                    }
                                } else {
                                    $result['exception'] = 'Cantidad incorrecta';
                                }
                            } else {
                                $result['exception'] = 'Precio incorrecto';
                            }
                        } else {
                            $result['exception'] = 'Descripción incorrecta';
                        }   
                    } else {
                        $result['exception'] = 'Estado incorrecto';
                    }                
                } else {
                    $result['exception'] = 'Nombre incorrecto';
                }
                break;
            case 'readOne':
                if ($producto->setId($_POST['id_producto'])) {
                    if ($result['dataset'] = $producto->readOne()) {
                        $result['status'] = 1;
                    } else {
                        if (Database::getException()) {
                            $result['exception'] = Database::getException();
                        } else {
                            $result['exception'] = 'Producto inexistente';
                        }
                    }
                } else {
                    $result['exception'] = 'Producto incorrecto';
                }
                break;
            case 'update':
                $_POST = $producto->validateForm($_POST);
                if ($producto->setId($_POST['id_producto'])) {
                    if ($data = $producto->readOne()) {
                        if ($producto->setNombre($_POST['nombre_producto'])) {
                            if ($producto->setDescripcion($_POST['descripcion_producto'])) {
                                if ($producto->setPrecio($_POST['precio_producto'])) {
                                    if ($producto->setCategoria($_POST['categoria_producto'])) {
                                        if ($producto->setEstado(isset($_POST['estado_producto']) ? 1 : 0)) {
                                            if (is_uploaded_file($_FILES['archivo_producto']['tmp_name'])) {
                                                if ($producto->setImagen($_FILES['archivo_producto'])) {
                                                    if ($producto->updateRow($data['imagen_producto'])) {
                                                        $result['status'] = 1;
                                                        if ($producto->saveFile($_FILES['archivo_producto'], $producto->getRuta(), $producto->getImagen())) {
                                                            $result['message'] = 'Producto modificado correctamente';
                                                        } else {
                                                            $result['message'] = 'Producto modificado pero no se guardó la imagen';
                                                        }
                                                    } else {
                                                        $result['exception'] = Database::getException();
                                                    }
                                                } else {
                                                    $result['exception'] = $producto->getImageError();
                                                }
                                            } else {
                                                if ($producto->updateRow($data['imagen_producto'])) {
                                                    $result['status'] = 1;
                                                    $result['message'] = 'Producto modificado correctamente';
                                                } else {
                                                    $result['exception'] = Database::getException();
                                                }
                                            }
                                        } else {
                                            $result['exception'] = 'Estado incorrecto';
                                        }
                                    } else {
                                        $result['exception'] = 'Seleccione una categoría';
                                    }
                                } else {
                                    $result['exception'] = 'Precio incorrecto';
                                }
                            } else {
                                $result['exception'] = 'Descripción incorrecta';
                            }
                        } else {
                            $result['exception'] = 'Nombre incorrecto';
                        }
                    } else {
                        $result['exception'] = 'Producto inexistente';
                    }
                } else {
                    $result['exception'] = 'Producto incorrecto';
                }
                break;
            case 'delete':
                if ($producto->setId($_POST['id_producto'])) {
                    if ($data = $producto->readOne()) {
                        if ($producto->deleteRow()) {
                            $result['status'] = 1;
                            if ($producto->deleteFile($producto->getRuta(), $data['imagen_producto'])) {
                                $result['message'] = 'Producto eliminado correctamente';
                            } else {
                                $result['message'] = 'Producto eliminado pero no se borró la imagen';
                            }
                        } else {
                            $result['exception'] = Database::getException();
                        }
                    } else {
                        $result['exception'] = 'Producto inexistente';
                    }
                } else {
                    $result['exception'] = 'Producto incorrecto';
                }
                break;
                case 'cantidadProductosCategoria':
                    if ($result['dataset'] = $producto->cantidadProductosCategoria()) {
                        $result['status'] = 1;
                    } else {
                        if (Database::getException()) {
                            $result['exception'] = Database::getException();
                        } else {
                            $result['exception'] = 'No hay datos disponibles';
                        }
                    }
                    break;
                case 'cantidadPedidosxCliente':
                    if ($result['dataset'] = $producto->cantidadPedidosxCliente()) {
                        $result['status'] = 1;
                    } else {
                        if (Database::getException()) {
                            $result['exception'] = Database::getException();
                        } else {
                            $result['exception'] = 'No hay datos disponibles';
                        }
                    }
                    break;    
                case 'valoracionesxproducto':
                    if ($result['dataset'] = $producto->valoracionesxproducto()) {
                        $result['status'] = 1;
                    } else {
                        if (Database::getException()) {
                            $result['exception'] = Database::getException();
                        } else {
                            $result['exception'] = 'No hay datos disponibles';
                        }
                    }
                    break;
                case 'clienteconmascomentarios':
                    if ($result['dataset'] = $producto->clienteconmascomentarios()) {
                        $result['status'] = 1;
                    } else {
                        if (Database::getException()) {
                            $result['exception'] = Database::getException();
                        } else {
                            $result['exception'] = 'No hay datos disponibles';
                        }
                    }
                    break;  
                case 'productomaspedido':
                    if ($result['dataset'] = $producto->productomaspedido()) {
                        $result['status'] = 1;
                    } else {
                        if (Database::getException()) {
                            $result['exception'] = Database::getException();
                        } else {
                            $result['exception'] = 'No hay datos disponibles';
                        }
                    }
                    break;
    
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
            case 'Coments':
                if ($producto->setId($_POST['id_producto'])) {
                    if ($result['dataset'] = $producto->ComentsReport()) {
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
                             $result['exception'] = 'No hay comentarios de este producto';
                        }
                    }
                } else {
                    $result['exception'] = 'Acción incorrecta';
                }
                break;       
            case 'verify':
                if ($producto->setCliente($_SESSION['id_cliente'])) {
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
                } else {
                    $result['exception'] = 'Cliente incorrecto';
                }
               break;   
            case 'createComent':
                $_POST = $producto->validateForm($_POST);
                if ($producto->setCliente($_SESSION['id_cliente'])) {
                    if ($producto->setId($_POST['id_producto_coment'])) {
                        if ($producto->setComentario($_POST['comentario'])) {
                            if ($producto->setValor($_POST['calificacion'])) {
                                if ($result['dataset'] = $producto->createComent()) {
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
                        } else {
                               $result['exception'] = 'Acción incorrecta';
                        }
                    } else {
                           $result['exception'] = 'Acción incorrecta';
                    }
                } else {
                    $result['exception'] = 'Cliente incorrecto';
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
    print(json_encode('Recurso no disponible'));
}