<?php
include("../../app/helpers/private_page.php");
Dashboard_Page::headerTemplate('California','California');
Dashboard_Page::controlTime();
?>


<head class="Texto">
    <div class="container">
        <div class="row">
            <h1>Inventario</h1><br><br>
            <h5>Gestión de Productos</h5><br><br>
        </div>
    </div>
</head>
<section class="Texto">
    <div class="container">
        <div class="row">
            <form method="post" id="search-form">
                <div class="input-field col s7 m9 l9">
                    <i class="material-icons prefix">search</i>
                    <input placeholder="Buscar Categoria por nombre" id="search" type="text" name="search" class="validate" required>
                    <label for="search">Buscar Categoría</label>                                
                </div>
                <div class="input-field col s4 m2 l2">
                    <button type="submit" class="btn col s12 waves-effect black">Buscar</button>
                </div>
            </form>
            <div class="input-field col s1 m1 l1">
                <a href="../../app/reports/dashboard/productos.php" target="_blank"  class="btn waves-effect black tooltiped" data-tooltip="Imprimir reporte"><i class="material-icons">assignment</i></a>
            </div>
        </div>
    </div>
</section>
<section>
    <div class="container Texto">
        <div class="row">            
            <div id="tbody-rows">
            <div>
        </div>
    </div>
    <div id="save-modal" class="modal Texto rad">
        <div class="modal-content black-text">
            <h5 id="modal-title"></h5>
            <br>
            <div class="row">
                <form method="post" id="save-form" enctype="multipart/form-data" class="col s12">
                <input class="hide" type="number" id="id_producto" name="id_producto"/>
                    <div class="row">
                        <div class="input-field col s12 m12 l12">
                            <input id="nombre" name="nombre" type="text" class="validate" required>
                            <label for="nombre">Nombre del producto</label>
                        </div>                          
                        <div class="input-field col s6 m6 l6 center">
                            <span>Estado:</span>
                            <p>
                                <div class="switch">                                    
                                    <label>
                                        Off
                                        <input id="estado" type="checkbox" name="estado" checked/>
                                        <span class="lever"></span>
                                        On
                                    </label>
                                </div>
                            </p>
                        </div>
                        <div class="input-field col s6 m6 l6">
                            <select id="tipo_producto" name="tipo_producto">
                            </select>
                            <label>Tipo</label>
                        </div>                                
                        <div class="input-field col s12 m12 l12">
                            <textarea id="decripcion" name="decripcion" class="materialize-textarea" required></textarea>
                            <label for="decripcion">Descripcion</label>
                        </div>
                        <div class="input-field col s12 m12 l12">
                            <input id="marca" name="marca" type="text" class="validate" required>
                            <label for="marca">Marca</label>
                        </div><div class="input-field col s6 m6 l6">
                            <input id="cantidad_total" name="cantidad_total" type="text" class="validate" required>
                            <label for="cantidad_total">Cantidad Disponible</label>
                        </div>
                        <div class="input-field col s12 m6 l6">
                            <input id="precio" name="precio" type="number" min="1" max="90" step="any" class="validate" required>
                            <label for="precio">Precio $</label>
                        </div>
                        <div class="input-field col s12 m12 l12">
                        <div class="file-field input-field">
                                    <div class="btn black">
                                        <span><i class="large material-icons">add_a_photo</i></span>
                                        <input id="foto" type="file" name="foto" accept=".gif, .jpg, .png">
                                    </div>
                                    <div class="file-path-wrapper">
                                        <input placeholder="Imagen" id="imagen" class="file-path validate" type="text">
                                    </div>
                                </div>
                        </div>
                        <div class="col s12 modal-footer">
                            <a href="#!" class="modal-close waves-effect waves-black btn-flat">Cancelar</a>
                            <button class="btn-flat modal-close" type="submit">Agregar</button></div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<?php
  //Se imprime la plantilla del pie y se envía el nombre del controlador para la página web
  Dashboard_Page::footerTemplate('productos.js');
?>