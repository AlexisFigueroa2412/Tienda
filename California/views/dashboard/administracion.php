<?php
include("../../app/helpers/private_page.php");
Dashboard_Page::headerTemplate('California', 'California');
?>

<head>
    <div class="container Texto">
        <div class="row">
            <h1>Administración</h1><br><br>
            <h5>Gestión administrativa</h5>
        </div>
    </div>
</head>
<section>
    <br><br>
    <div class="container Texto">
        <div class="row">

            <!-- Dropdown Structure -->
            <ul id='dropdowncategoria' class='dropdown-content center'>
                <!--Boton de editar-->
                <li><a class="black-text Texto modal-trigger" href="#editcat">
                        <i class="material-icons center">edit</i>Editar</a></li>
                <!--Boton de archivar-->
                <li><a class="black-text Texto modal-trigger" href="#modal3">
                        <i class="material-icons center">delete</i>Archivar</a></li>
            </ul>

            <!-- Dropdown Structure -->
            <ul id='dropdownsubcategoria' class='dropdown-content center'>
                <!--Boton de editar-->
                <li><a class="black-text Texto modal-trigger" href="#editsubcat">
                        <i class="material-icons center">edit</i>Editar</a></li>
                <!--Boton de archivar-->
                <li><a class="black-text Texto modal-trigger" href="#modal3">
                        <i class="material-icons center">delete</i>Archivar</a></li>
            </ul>

            <!-- Dropdown Structure -->
            <ul id='dropdownnoticia' class='dropdown-content center'>
                <!--Boton de ver-->
                <li><a class="black-text Texto modal-trigger" href="noticia.php">
                        <i class="material-icons center">call_made</i>Ver</a></li>
                <!--Boton de editar-->
                <li><a class="black-text Texto modal-trigger" href="#editnew">
                        <i class="material-icons center">edit</i>Editar</a></li>
                <!--Boton de archivar-->
                <li><a class="black-text Texto modal-trigger" href="#modal3">
                        <i class="material-icons center">delete</i>Archivar</a></li>
            </ul>

            <div class="col s12 m12 l12">
                <div class="card rad">
                    <div class="card-content Texto">
                        <h6 class="Texto flow-text black-text">Categorias<br><br></h6>
                        <form method="post" id="search-form">
                            <div class="input-field col s8 m8 l10">
                                <i class="material-icons prefix">search</i>
                                <input placeholder="Buscar Noticia por Titular" id="search" type="text" name="search" class="validate" required>
                                <label for="new-titulo">Buscar Categoría</label>                                
                            </div>
                            <div class="input-field col s4 m4 l2">
                                <button type="submit" class="btn col s12 waves-effect black tooltipped" data-tooltip="Buscar">Buscar</button>
                            </div>
                        </form>
                        <div class="row">
                            <div class="col s12 m12 l12">
                                <a href="#" onclick="openCreateDialog()"  data-tooltip="Crear" class="modal-trigger waves-effect waves-light col s12 black btn"><i class="material-icons left">add_box</i>Añadir una nueva categoria</a>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col s12 m12 l12">
                                <table class="striped white black-text">
                                    <!-- Cabeza de la tabla para mostrar los títulos de las columnas -->
                                    <thead>
                                        <tr>
                                            <th>N°</th>
                                            <th>Categoria</th>
                                        </tr>
                                    </thead>
                                    <!-- Cuerpo de la tabla para mostrar un registro por fila -->
                                    <tbody id="tbody-rows">
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col s12 m12 l12">
                <div class="card rad">
                    <div class="card-content Texto">
                        <h6 class="Texto flow-text black-text">Subcategorías<br><br></h6>
                        <div class="row">
                            <div class="input-field col s8 m8 l8">
                                <i class="material-icons prefix">search</i>
                                <input placeholder="Subcategoría" id="first_name" type="text" class="validate">
                                <label for="first_name">Buscar por nombre</label>
                            </div>
                            <div class="col s4 m4 l4">
                                <label>Categorías</label><br>
                                <select class="browser-default">
                                    <option value="1" selected>Categoría</option>
                                    <option value="2">Tabla</option>
                                    <option value="3">Outfit</option>
                                    <option value="4">Utilidad</option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col s12 m12 l12">
                                <a href="#addsubcat" class="modal-trigger waves-effect waves-light col s12 black btn"><i class="material-icons left">add_box</i>Añadir nueva Subcategoría</a>
                            </div>
                        </div>
                        <div class="row">
                            <form class="col s12 m12 l12">
                                <table class="striped white black-text">
                                    <thead>
                                        <tr>
                                            <th>N°</th>
                                            <th>Categoría</th>
                                            <th>Subcategoría</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td>Tablas</td>
                                            <td>Skateboard</td>
                                            <td>
                                                <a href='#' data-target='dropdownsubcategoria' class="dropdown-trigger right btn-floating btn-large waves-effect waves-dark transparent z-depth-0">
                                                    <i class="large material-icons black-text hoverable">more_vert</i></a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>2</td>
                                            <td>Tablas</td>
                                            <td>Longboard</td>
                                            <td>
                                                <a href='#' data-target='dropdownsubcategoria' class="dropdown-trigger right btn-floating btn-large waves-effect waves-dark transparent z-depth-0">
                                                    <i class="large material-icons black-text hoverable">more_vert</i></a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>3</td>
                                            <td>Outfits</td>
                                            <td>Ropa</td>
                                            <td>
                                                <a href='#' data-target='dropdownsubcategoria' class="dropdown-trigger right btn-floating btn-large waves-effect waves-dark transparent z-depth-0">
                                                    <i class="large material-icons black-text hoverable">more_vert</i></a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>4</td>
                                            <td>Outfits</td>
                                            <td>Zapatillas</td>
                                            <td>
                                                <a href='#' data-target='dropdownsubcategoria' class="dropdown-trigger right btn-floating btn-large waves-effect waves-dark transparent z-depth-0">
                                                    <i class="large material-icons black-text hoverable">more_vert</i></a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>3</td>
                                            <td>Utilidad</td>
                                            <td>Complementos</td>
                                            <td>
                                                <a href='#' data-target='dropdownsubcategoria' class="dropdown-trigger right btn-floating btn-large waves-effect waves-dark transparent z-depth-0">
                                                    <i class="large material-icons black-text hoverable">more_vert</i></a>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col s12 m12 l12">
                <div class="card rad">
                    <div class="card-content Texto">
                        <h6 class="Texto flow-text black-text">Noticias<br><br></h6>
                        <div class="row">
                            <div class="input-field col s8 m8 l8">
                                <i class="material-icons prefix">search</i>
                                <input placeholder="Buscar Noticia por Titular" id="new-titulo" type="text" class="validate">
                                <label for="new-titulo">Buscar Título</label>
                            </div>
                            <div class="col s4 m4 l4">
                                <label>Mostrar por fecha</label>
                                <input type="date" name="" class="datepicker" id="fecha">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col s12 m12 l12">
                                <a href="#addnew" class="modal-trigger waves-effect waves-light col s12 black btn"><i class="material-icons left">add_box</i>Añadir nueva Noticia</a>
                            </div>
                        </div>
                        <div class="row">
                            <form class="col s12 m12 l12">
                                <table class="striped white black-text">
                                    <thead>
                                        <tr>
                                            <th>N°</th>
                                            <th>Titulo</th>
                                            <th>Creador</th>
                                            <th>Fecha Publicación</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td>Vans</td>
                                            <td>Steve Caballero</td>
                                            <td>Viernes</td>
                                            <td>
                                                <a href='#' data-target='dropdownnoticia' class="dropdown-trigger right btn-floating btn-large waves-effect waves-dark transparent z-depth-0">
                                                    <i class="large material-icons black-text hoverable">more_vert</i></a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>2</td>
                                            <td>Element</td>
                                            <td>Mauricio</td>
                                            <td>Viernes</td>
                                            <td>
                                                <a href='#' data-target='dropdownnoticia' class="dropdown-trigger right btn-floating btn-large waves-effect waves-dark transparent z-depth-0">
                                                    <i class="large material-icons black-text hoverable">more_vert</i></a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>3</td>
                                            <td>California</td>
                                            <td>Sergio Perez</td>
                                            <td>Ayer</td>
                                            <td>
                                                <a href='#' data-target='dropdownnoticia' class="dropdown-trigger right btn-floating btn-large waves-effect waves-dark transparent z-depth-0">
                                                    <i class="large material-icons black-text hoverable">more_vert</i></a>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--Categoria-->
    <!--Agregar-->
    <div id="addcat" class="modal Texto rad">
        <div class="modal-content black-text">
            <h5>Agregar Categoría</h5>
            <br>
            <div class="row">
                <form class="col s12">
                    <div class="row valign-wrapper">
                        <div class="col s12 m12 l12">
                            <div class="input-field col s12 m12 l12">
                                <input id="newcat" type="text" class="validate">
                                <label for="newcat">Categoría</label>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="modal-footer">
            <a href="#!" class="modal-close waves-effect waves-black btn-flat">Cancelar</a>
            <a class="btn-flat modal-close" type="submit" name="action">Agregar</a>
        </div>
    </div>
    <!--Agregar-->
    <div id="editcat" class="modal Texto rad">
        <div class="modal-content black-text">
            <h5>Editar Categoría</h5>
            <br>
            <div class="row">
                <form class="col s12">
                    <div class="row valign-wrapper">
                        <div class="col s12 m12 l12">
                            <div class="input-field col s12 m12 l12">
                                <input id="newcat" type="text" class="validate">
                                <label for="newcat">Categoría</label>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="modal-footer">
            <a href="#!" class="modal-close waves-effect waves-black btn-flat">Cancelar</a>
            <a class="btn-flat modal-close" type="submit" name="action">Agregar</a>
        </div>
    </div>

    <!--Subcategoria-->
    <!--Agregar-->
    <div id="addsubcat" class="modal Texto rad">
        <div class="modal-content black-text">
            <h5>Agregar Subcategoría</h5>
            <br>
            <div class="row">
                <form class="col s12">
                    <div class="row valign-wrapper">
                        <div class="input-field col s8 m8 l8">
                            <input id="newcat" type="text" class="validate">
                            <label for="newcat">Subcategoría</label>
                        </div>
                        <div class="col s4 m4 l4">
                            <label>Categorías</label><br>
                            <select class="browser-default">
                                <option value="1" selected>Categoría</option>
                                <option value="2">Tabla</option>
                                <option value="3">Outfit</option>
                                <option value="4">Utilidad</option>
                            </select>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="modal-footer">
            <a href="#!" class="modal-close waves-effect waves-black btn-flat">Cancelar</a>
            <a class="btn-flat modal-close" type="submit" name="action">Agregar</a>
        </div>
    </div>
    <!--Agregar-->
    <div id="editsubcat" class="modal Texto rad">
        <div class="modal-content black-text">
            <h5>Editar Subcategoría</h5>
            <br>
            <div class="row">
                <form class="col s12">
                    <div class="row valign-wrapper">
                        <div class="input-field col s8 m8 l8">
                            <input id="newcat" type="text" class="validate">
                            <label for="newcat">Subcategoría</label>
                        </div>
                        <div class="col s4 m4 l4">
                            <label>Categorías</label><br>
                            <select class="browser-default">
                                <option value="1" selected>Categoría</option>
                                <option value="2">Tabla</option>
                                <option value="3">Outfit</option>
                                <option value="4">Utilidad</option>
                            </select>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="modal-footer">
            <a href="#!" class="modal-close waves-effect waves-black btn-flat">Cancelar</a>
            <a class="btn-flat modal-close" type="submit" name="action">Agregar</a>
        </div>
    </div>

    <!--Noticias-->
    <!--Agregar-->
    <div id="addnew" class="modal Texto rad">
        <div class="modal-content black-text">
            <h5>Redactar Noticia</h5>
            <br>
            <div class="row">
                <form class="col s12">
                    <div class="row">
                        <div class="input-field col s12 m12 l12">
                            <form action="#">
                                <div class="file-field input-field">
                                    <div class="btn black">
                                        <span><i class="large material-icons">add_a_photo</i></span>
                                        <input type="file">
                                    </div>
                                    <div class="file-path-wrapper">
                                        <input placeholder="Imagen del encabezado" class="file-path validate" type="text">
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="input-field col s12 m12 l12">
                            <input id="addnewtitulo" type="text" class="validate">
                            <label for="addnewtitulo">Titular</label>
                        </div>
                        <div class="input-field col s12 m12 l12">
                            <textarea id="addnewresumen" class="materialize-textarea"></textarea>
                            <label for="addnewresumen">Resumen</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12 m12 l12">
                            <textarea id="addnewcuerpo" class="materialize-textarea"></textarea>
                            <label for="addnewcuerpo">Cuerpo</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12 m12 l12">
                            <textarea id="addnewlink" class="materialize-textarea"></textarea>
                            <label for="addnewlink">Link</label>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="modal-footer">
            <a href="#!" class="modal-close waves-effect waves-black btn-flat">Cancelar</a>
            <a class="btn-flat modal-close" type="submit" name="action">Agregar</a>
        </div>
    </div>
    <!--Actualizar-->
    <div id="editnew" class="modal Texto rad">
        <div class="modal-content black-text">
            <h5>Editar Noticia</h5>
            <br>
            <div class="row">
                <form class="col s12">
                    <div class="row">
                        <div class="input-field col s12 m12 l12">
                            <form action="#">
                                <div class="file-field input-field">
                                    <div class="btn black">
                                        <span><i class="large material-icons">add_a_photo</i></span>
                                        <input type="file">
                                    </div>
                                    <div class="file-path-wrapper">
                                        <input placeholder="Imagen del encabezado" class="file-path validate" type="text">
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="input-field col s12 m12 l12">
                            <input id="addnewtitulo" type="text" class="validate">
                            <label for="addnewtitulo">Titular</label>
                        </div>
                        <div class="input-field col s12 m12 l12">
                            <textarea id="addnewresumen" class="materialize-textarea"></textarea>
                            <label for="addnewresumen">Resumen</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12 m12 l12">
                            <textarea id="addnewcuerpo" class="materialize-textarea"></textarea>
                            <label for="addnewcuerpo">Cuerpo</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12 m12 l12">
                            <textarea id="addnewlink" class="materialize-textarea"></textarea>
                            <label for="addnewlink">Link</label>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="modal-footer">
            <a href="#!" class="modal-close waves-effect waves-black btn-flat">Cancelar</a>
            <a class="btn-flat modal-close" type="submit" name="action">Agregar</a>
        </div>
    </div>
    <!-- Componente Modal para mostrar una caja de dialogo -->
    <div id="save-modal" class="modal">
        <div class="modal-content">
            <!-- Título para la caja de dialogo -->
            <h4 id="modal-title" class="center-align"></h4>
            <!-- Formulario para crear o actualizar un registro -->
            <form method="post" id="save-form" enctype="multipart/form-data">
                <!-- Campo oculto para asignar el id del registro al momento de modificar -->
                <input class="hide" type="number" id="id_producto" name="id_producto" />
                <div class="row">
                    <div class="input-field col s12 m6">
                        <i class="material-icons prefix">note_add</i>
                        <input id="nombre_producto" type="text" name="nombre_producto" class="validate" required />
                        <label for="nombre_producto">Nombre de la categoria</label>
                    </div>

                </div>
                <div class="row center-align">
                    <a href="#" class="btn waves-effect grey tooltipped modal-close" data-tooltip="Cancelar"><i class="material-icons">cancel</i></a>
                    <button type="submit" class="btn waves-effect blue tooltipped" data-tooltip="Guardar"><i class="material-icons">save</i></button>
                </div>
            </form>
        </div>
    </div>
</section>

<?php
//Se imprime la plantilla del pie y se envía el nombre del controlador para la página web
Dashboard_Page::footerTemplate('categorias.js');
?>