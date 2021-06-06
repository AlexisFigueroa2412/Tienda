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
            <div class="col s12 m12 l12">
                <div class="card rad">
                    <div class="card-content Texto">
                        <h6 class="Texto flow-text black-text">Categorias<br><br></h6>
                        <form method="post" id="search-form">
                            <div class="input-field col s8 m10 l10">
                                <i class="material-icons prefix">search</i>
                                <input placeholder="Buscar Categoria por nombre" id="search" type="text" name="search" class="validate" required>
                                <label for="search">Buscar Categoría</label>                                
                            </div>
                            <div class="input-field col s4 m2 l2">
                                <button type="submit" class="btn col s12 waves-effect black">Buscar</button>
                            </div>
                        </form>
                        <div class="row">
                            <div class="col s12 m12 l12">
                                <a  onclick="openCreateDialogCat()" class="modal-trigger waves-effect waves-light col s12 black btn"><i class="material-icons left">add_box</i>Añadir una nueva categoria</a>
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
                            <form method="post" id="search-form-2">
                                <div class="input-field col s8 m10 l10">
                                    <i class="material-icons prefix">search</i>
                                    <input placeholder="Buscar Categoria por nombre" id="searchsub" type="text" name="searchsub" class="validate" required>
                                    <label for="new-titulo">Buscar Subcategoría</label>                                
                                </div>
                                <div class="input-field col s4 m2 l2">
                                    <button type="submit" class="btn col s12 waves-effect black">Buscar</button>
                                </div>
                            </form>
                        </div>
                        <div class="row">
                            <div class="col s12 m12 l12">
                                <a onclick="openCreateDialogSub()" class="modal-trigger waves-effect waves-light col s12 black btn"><i class="material-icons left">add_box</i>Añadir nueva Subcategoría</a>
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
                                    <tbody id="tbody-rows-sub">
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
                                <a onclick="openCreateDialogNew()" class="modal-trigger waves-effect waves-light col s12 black btn"><i class="material-icons left">add_box</i>Añadir nueva Noticia</a>
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
                                    <tbody id="tbody-rows-new">
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

    <div id="save-modal" class="modal Texto rad">
        <div class="modal-content black-text">
            <h5 id="modal-title"></h5>
            <br>
            <form method="post" id="save-form" enctype="multipart/form-data">            
                <div class="row">
                    <input class="hide" type="number" id="id_categoria" name="id_categoria" />
                    <div class="input-field col s12">
                  	    <input id="txtCategoria" type="text" name="txtCategoria" class="validate" required/>
                  	    <label for="txtCategoria">Categoria</label>
                    </div>    
                </div>
                <div class="row">
                    <a href="#!" class="modal-close waves-effect waves-black btn-flat">Cancelar</a>
                    <button type="submit" class="btn-flat">Guardar</button>
                </div>
            </form>
        </div>
    </div>

    <!--Subcategoria-->
    
    <div id="save-modal-sub" class="modal Texto rad">
        <div class="modal-content black-text">
            <h5 id="modal-title-sub"></h5>
            <br>
            <div class="row">
                <form method="post" id="save-form-sub" enctype="multipart/form-data">
                    <div class="col s12">
                        <input class="hide" type="number" id="id_tipo_producto" name="id_tipo_producto" />
                        <div class="row valign-wrapper">
                            <div class="input-field col s8 m8 l8">
                                <input id="txtTipo" name="txtTipo" type="text" class="validate" required>
                                <label for="txtTipo">Subcategoría</label>
                            </div>
                            <div class="col s4 m4 l4">
                                <label>Categorías</label><br>
                                <select class="browser-default" id="cmbCategoria" name="cmbCategoria" required>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <a href="#!" class="modal-close waves-effect waves-black btn-flat">Cancelar</a>
                            <button type="submit" class="btn-flat">Guardar</button>
                        </div>
                    </div>                    
                </form>
            </div>
        </div>
    </div>
    

    <!--Noticias-->
    <!--Agregar-->
    <div id="save-modal-new" class="modal Texto rad">
        <div class="modal-content black-text">
            <h5 id="modal-title-new"></h5>
            <br>
            <div class="row">
                <form method="post" id="save-form-new" enctype="multipart/form-data">
                    <div class="col s12">
                        <input class="hide" type="number" id="id_noticia" name="id_noticia" />
                        <div class="row">                            
                            <div class="input-field col s12 m12 l12">
                                <input id="titular" name="titular" type="text" class="validate">
                                <label for="titular">Titular</label>
                            </div>
                            <div class="input-field col s12 m12 l12">
                                <textarea id="resumen" name="resumen" class="materialize-textarea"></textarea>
                                <label for="resumen">Resumen</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s12 m12 l12">
                                <textarea id="cuerpo" name="cuerpo" class="materialize-textarea"></textarea>
                                <label for="cuerpo">Cuerpo</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s12 m12 l12">
                                <textarea id="link" name="link" class="materialize-textarea"></textarea>
                                <label for="link">Referencia</label>
                            </div>
                        </div>
                        <div class="row">
                            <a href="#!" class="modal-close waves-effect waves-black btn-flat">Cancelar</a>
                            <button type="submit" class="btn-flat">Guardar</button>
                        </div>
                    </div>                    
                </form>
            </div>
        </div>
    </div>
</section>

<?php
//Se imprime la plantilla del pie y se envía el nombre del controlador para la página web
Dashboard_Page::footerTemplate('categorias.js');
?>