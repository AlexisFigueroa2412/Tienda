<?php
require_once('../../helpers/database.php');
require_once('../../helpers/validator.php');
require_once('../../models/categorias.php');

// Se comprueba si existe una acción a realizar, de lo contrario se finaliza el script con un mensaje de error.
if (isset($_GET['action'])) {
    // Se crea una sesión o se reanuda la actual para poder utilizar variables de sesión en el script.
    session_start();
    // Se instancia la clase correspondiente.
    $categoria = new Categorias;
    // Se instancia la clase correspondiente.
    $Subcategoria = new SubCategorias;
    // Se declara e inicializa un arreglo para guardar el resultado que retorna la API.
    $result = array('status' => 0, 'message' => null, 'exception' => null);
    // Se verifica si existe una sesión iniciada como administrador, de lo contrario se finaliza el script con un mensaje de error.
    if (isset($_SESSION['id_usuario'])) {
        // Se compara la acción a realizar cuando un administrador ha iniciado sesión.
        switch ($_GET['action']) {
            

            //---------Leer datos


            //Leer datos de las categorias
            case 'readAll':
                if ($result['dataset'] = $categoria->readAll()) {
                    $result['status'] = 1;
                } else {
                    if (Database::getException()) {
                        $result['exception'] = Database::getException();
                    } else {
                        $result['exception'] = 'No hay categorías registradas';
                    }
                }
                break;
            //Leer datos de las Subcategorias
            case 'readAllSub':
                if ($result['dataset'] = $Subcategoria->readAll()) {
                    $result['status'] = 1;
                } else {
                    if (Database::getException()) {
                        $result['exception'] = Database::getException();
                    } else {
                        $result['exception'] = 'No hay Subcategorías registradas';
                    }
                }
                break;
            


            //---------Busquedas

            //Busqueda filtrada de categorias
            case 'search':
                $_POST = $categoria->validateForm($_POST);
                if ($_POST['search'] != '') {
                    if ($result['dataset'] = $categoria->searchRows($_POST['search'])) {
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

                //Busqueda filtrada de Subcategorias
            case 'searchSub':
                $_POST = $Subcategoria->validateForm($_POST);
                if ($_POST['searchsub'] != '') {
                    if ($result['dataset'] = $Subcategoria->searchRows($_POST['searchsub'])) {
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


            
            //---------Inserts

            //Crear categoria
            case 'create':
                $_POST = $categoria->validateForm($_POST);
                if ($categoria->setCategoria($_POST['txtCategoria'])) { 
                    if ($categoria->createRow()) {
                        $result['status'] = 1;
                        $result['message'] = 'Categoría creada correctamente';                        
                    } else {
                        $result['exception'] = Database::getException();
                    }
                } else {
                    $result['message'] = 'Error al guardar los datos';
                }
                break;

            //Crear Subcategoria
            case 'createSub':
                $_POST = $Subcategoria->validateForm($_POST);
                if ($Subcategoria->setSubCategoria($_POST['txtTipo'])) { 
                    if (isset($_POST['cmbCategoria'])) {
                        if ($Subcategoria->setIdCategoria($_POST['cmbCategoria'])) {     
                            if ($Subcategoria->createRow()) {
                                $result['status'] = 1;
                                $result['message'] = 'Categoría creada correctamente';                        
                            } else {
                                $result['exception'] = Database::getException();
                            }
                        } else {
                            $result['exception'] = 'Categoría incorrecta';
                        }
                    } else {
                        $result['exception'] = 'Seleccione una categoría';
                    }                    
                } else {
                    $result['message'] = 'Error al guardar los datos';
                }
                break;    


            //---------Busquedas específica
                
            //Llamar categoria en especifico
            case 'readOne':
                if ($categoria->setIdCategoria($_POST['id_categoria'])) {
                    if ($result['dataset'] = $categoria->readOne()) {
                        $result['status'] = 1;
                    } else {
                        if (Database::getException()) {
                            $result['exception'] = Database::getException();
                        } else {
                            $result['exception'] = 'Categoría inexistente';
                        }
                    }
                } else {
                    $result['exception'] = 'Categoría incorrecta';
                }
                break;

            //Llamar Subcategoria en especifico
            case 'readOneSub':
                if ($Subcategoria->setIdSub($_POST['id_tipo_producto'])) {
                    if ($result['dataset'] = $Subcategoria->readOne()) {
                        $result['status'] = 1;
                    } else {
                        if (Database::getException()) {
                            $result['exception'] = Database::getException();
                        } else {
                            $result['exception'] = 'Categoría inexistente';
                        }
                    }
                } else {
                    $result['exception'] = 'Categoría incorrecta';
                }
                break;
            //Editar categoria
            case 'update':
                if ($categoria->setIdCategoria($_POST['id_categoria'])) {
                    if ($categoria->setCategoria($_POST['txtCategoria'])) { 
                        if ($categoria->updateRow()) {
                            $result['status'] = 1;
                            $result['message'] = 'Categoría editada correctamente';                        
                        } else {
                            $result['exception'] = Database::getException();
                        }
                    } else {
                        $result['message'] = 'Error al guardar los datos';
                    }
                } else {
                    $result['exception'] = 'Categoría incorrecta';
                }       
                break;
            //Editar categoria
            case 'updateSub':
                if ($Subcategoria->setIdSub($_POST['id_tipo_producto'])) {
                    if ($Subcategoria->setSubCategoria($_POST['txtTipo'])) { 
                        if (isset($_POST['cmbCategoria'])) {
                            if ($Subcategoria->setIdCategoria($_POST['cmbCategoria'])) {     
                                if ($Subcategoria->updateRow()) {
                                    $result['status'] = 1;
                                    $result['message'] = 'Categoría editada correctamente';                        
                                } else {
                                    $result['exception'] = Database::getException();
                                }
                            } else {
                                $result['exception'] = 'Categoría incorrecta';
                            }
                        } else {
                            $result['exception'] = 'Seleccione una categoría';
                        }     
                    } else {
                        $result['message'] = 'Error al guardar los datos';
                    }
                } else {
                    $result['exception'] = 'Categoría incorrecta';
                }       
                break;    

            //Eliminar categoria
            case 'delete':
                if ($categoria->setIdCategoria($_POST['id_categoria'])) {
                    if ($data = $categoria->readOne()) {
                        if ($categoria->deleteRow()) {
                            $result['status'] = 1;
                            $result['message'] = 'Categoría eliminada correctamente';
                        } else {
                            $result['exception'] = Database::getException();
                        }
                    } else {
                        $result['exception'] = 'Categoría inexistente';
                    }
                } else {
                    $result['exception'] = 'Categoría incorrecta';
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
