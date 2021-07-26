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
                            <div class="input-field col s7 m9 l9">
                                <i class="material-icons prefix">search</i>
                                <input placeholder="Buscar Categoria por nombre" id="search" type="text" name="search" class="validate" required>
                                <label for="search">Buscar Categoría</label>                                
                            </div>
                            <div class="input-field col s4 m2 l2">
                                <button type="submit" class="btn col s12 waves-effect black">Buscar</button>
                            </div>
                            <div class="input-field col s1 m1 l1">
                                <a href="../../app/reports/dashboard/categorias.php" target="_blank"  class="btn waves-effect black tooltiped" data-tooltip="Imprimir reporte"><i class="material-icons">assignment</i></a>
                            </div>
                        </form>
                        <div class="row">
                            <div class="col s12 m12 l12">
                                <a onclick="openCreateDialogCat()" class="waves-effect waves-light col s12 black btn"><i class="material-icons left">add_box</i>Añadir una nueva categoria</a>
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

    

<?php
//Se imprime la plantilla del pie y se envía el nombre del controlador para la página web
Dashboard_Page::footerTemplate('categorias.js');
?>