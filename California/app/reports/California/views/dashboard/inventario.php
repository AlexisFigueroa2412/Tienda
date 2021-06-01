<?php
include("../../app/helpers/private_page.php");
Dashboard_Page::headerTemplate('California');
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
            <div class="col s8 m8 l8">
                <div class="row">
                    <form class="col s12">
                        <div class="row">
                            <div class="input-field col s12">
                                <i class="material-icons prefix">search</i>
                                <!--TextBox Producto-->
                                <textarea id="icon_prefix2" class="materialize-textarea z-depth-1 rad"></textarea>
                                <label for="icon_prefix2">Buscar Producto</label>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col s4 m4 l4">
                <!--Combobox Tipo del producto-->
                <label class="Texto">Tipo del Producto</label>
                <select class="browser-default Texto">
                    <option class="Texto" value="" disabled selected>Todos</option>
                    <optgroup class="Texto grey-text text-darken-1" label="Boards">
                        <option id="comboSkt" class="black-text" value="1">Skateboards</option>
                        <option id="comboLgb" class="black-text" value="2">Longboards</option>
                    </optgroup>
                    <optgroup class="Texto grey-text text-darken-1" label="Outfits">
                        <option id="comboRp" class="black-text" value="3">Ropa</option>
                        <option id="comboZp" class="black-text" value="4">Zapatillas</option>
                        <option id="comboCmp" class="black-text" value="4">Complementos</option>
                    </optgroup>
                </select>
            </div>
        </div>
    </div>
</section>
<section>
    <div class="container Texto">
        <div class="row">

            <!-- Dropdown Structure -->
            <ul id='dropdownmas' class='dropdown-content center'>
                <!--Boton de editar-->
                <li><a class="black-text Texto modal-trigger" href="#modal2">
                        <i class="material-icons center">edit</i>Editar</a></li>
                <!--Boton de archivar-->
                <li><a class="black-text Texto modal-trigger" href="#modal3">
                        <i class="material-icons center">delete</i>Archivar</a></li>
            </ul>

            <div class="col l4 s12 m6">
                <div class="card small z-depth-0 hoverable">
                    <div class="card-image center"><br><br><br>
                        <a href="#modal1" class="modal-trigger center"><svg xmlns="http://www.w3.org/2000/svg" x="0px"
                                y="0px" width="50" height="50" viewBox="0 0 172 172" style=" fill:#000000;">
                                <g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt"
                                    stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray=""
                                    stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none"
                                    text-anchor="none" style="mix-blend-mode: normal">
                                    <path d="M0,172v-172h172v172z" fill="none"></path>
                                    <g fill="#000000">
                                        <path
                                            d="M68.8,13.76c-0.91228,0.00018 -1.78715,0.36269 -2.43219,1.00781l-5.87219,5.87219h-28.20531c-6.3882,0 -11.97418,4.43656 -13.41063,10.66266l-7.85422,34.05734h-4.14547c-3.76014,0 -6.88,3.11986 -6.88,6.88v13.76c0,3.76014 3.11986,6.88 6.88,6.88h1.64609l18.39594,63.79453c0.8428,2.90336 3.98637,5.00547 7.47797,5.00547h69.72047c-1.548,-2.15 -2.89653,-4.44792 -4.0111,-6.88h-65.70937c-0.49536,0 -0.92176,-0.24671 -0.86672,-0.04031l-17.83828,-61.87969h140.61l-2.00219,6.9875c2.16032,0.95976 4.22749,2.07921 6.17453,3.37953l2.98984,-10.36703h1.65281c3.76014,0 6.88,-3.11986 6.88,-6.88v-13.76c0,-3.76014 -3.11986,-6.88 -6.88,-6.88h-4.14547l-7.86094,-34.05734c-1.43608,-6.22454 -7.01571,-10.66266 -13.40391,-10.66266h-28.20531l-5.87219,-5.87219c-0.64504,-0.64512 -1.5199,-1.00764 -2.43219,-1.00781zM70.22437,20.64h31.55125l5.87219,5.87219c0.64504,0.64512 1.5199,1.00764 2.43219,1.00781h29.62969c3.22317,0 5.98107,2.19555 6.70531,5.33469l7.49813,32.50531h-135.82625l7.49813,-32.50531c0.72388,-3.13758 3.48215,-5.33469 6.70531,-5.33469h29.62969c0.91228,-0.00018 1.78715,-0.36269 2.43219,-1.00781zM6.88,72.24h158.24v13.76h-158.24zM58.48,103.2c-1.89888,0 -3.44,1.54456 -3.44,3.44v34.13797c0,1.89544 1.54112,3.44 3.44,3.44c1.89888,0 3.44,-1.54456 3.44,-3.44v-34.13797c0,-1.89544 -1.54112,-3.44 -3.44,-3.44zM85.99328,103.2c-1.89888,0 -3.44,1.54456 -3.44,3.44l0.00672,34.13797c0,1.89544 1.54112,3.44 3.44,3.44c1.89888,0 3.44,-1.54456 3.44,-3.44l-0.00672,-34.13797c0,-1.89544 -1.54112,-3.44 -3.44,-3.44zM137.6,103.2c-18.92,0 -34.4,15.48 -34.4,34.4c0,18.92 15.48,34.4 34.4,34.4c18.92,0 34.4,-15.48 34.4,-34.4c0,-18.92 -15.48,-34.4 -34.4,-34.4zM137.6,110.08c15.136,0 27.52,12.384 27.52,27.52c0,15.136 -12.384,27.52 -27.52,27.52c-15.136,0 -27.52,-12.384 -27.52,-27.52c0,-15.136 12.384,-27.52 27.52,-27.52zM137.6,117.30265c-2.064,0 -3.44,1.376 -3.44,3.44v13.41735h-13.41735c-2.064,0 -3.44,1.376 -3.44,3.44c0,2.064 1.376,3.44 3.44,3.44h13.41735v13.41735c0,2.064 1.376,3.44 3.44,3.44c2.064,0 3.44,-1.376 3.44,-3.44v-13.41735h13.41735c2.064,0 3.44,-1.376 3.44,-3.44c0,-2.064 -1.376,-3.44 -3.44,-3.44h-13.41735v-13.41735c0,-2.064 -1.376,-3.44 -3.44,-3.44z">
                                        </path>
                                    </g>
                                </g>
                            </svg></a>
                    </div>
                    <div class="card-content black-text">
                        <span class="card-title Texto center">Agregar nuevo producto</span>
                    </div>
                </div>
                <br>
                <br>
            </div>
            <div class="col l4 s12 m6">
                <div class="card small z-depth-0">
                    <div class="card-image">
                        <img src="../../resources/multimedia/image6.jpg">
                    </div>
                    <a href='#' data-target='dropdownmas'
                        class="dropdown-trigger btn-floating right btn-large waves-effect waves-dark transparent z-depth-0">
                        <i class="large material-icons black-text hoverable">more_vert</i>
                    </a>
                    <div class="card-content black-text">
                        <span class="card-title black-text">Banco de skate</span>
                        <p>$45.00</p>
                    </div>
                </div>
                <br>
                <br>
            </div>
            <div class="col l4 s12 m6">
                <div class="card small z-depth-0">
                    <div class="card-image">
                        <img src="../../resources/multimedia/image4.jpg">
                    </div>                    
                    <a href='#' data-target='dropdownmas'
                        class="dropdown-trigger btn-floating right btn-large waves-effect waves-dark transparent z-depth-0">
                        <i class="large material-icons black-text hoverable">more_vert</i>
                    </a>
                    <div class="card-content black-text">
                        <span class="card-title black-text">LongBoard Rustica</span>
                        <p>$80.00</p>
                    </div>
                </div>
                <br>
                <br>
            </div>
            <div class="col l4 s12 m6">
                <div class="card small z-depth-0">
                    <div class="card-image">
                        <img src="../../resources/multimedia/image2.jpg">
                    </div>                    
                    <a href='#' data-target='dropdownmas'
                        class="dropdown-trigger btn-floating right btn-large waves-effect waves-dark transparent z-depth-0">
                        <i class="large material-icons black-text hoverable">more_vert</i>
                    </a>
                    <div class="card-content black-text">
                        <span class="card-title black-text">Skate Personalizado</span>
                        <p>$65.00</p>
                    </div>
                </div>
                <br>
                <br>
            </div>
            <div class="col l4 s12 m6">
                <div class="card small z-depth-0">
                    <div class="card-image ">
                        <img src="../../resources/multimedia/image1.jpg">
                    </div>
                    <a href='#' data-target='dropdownmas'
                        class="dropdown-trigger btn-floating right btn-large waves-effect waves-dark transparent z-depth-0">
                        <i class="large material-icons black-text hoverable">more_vert</i>
                    </a>
                    <div class="card-content black-text">
                        <span class="card-title black-text">Skate Clasico</span>
                        <p>$70.00</p>
                    </div>
                </div>
                <br>
                <br>
            </div>
            <div class="col l4 s12 m6">
                <div class="card small z-depth-0">
                    <div class="card-image ">
                        <img src="../../resources/multimedia/image3.jpg">
                    </div>
                    <a href='#' data-target='dropdownmas'
                        class="dropdown-trigger btn-floating right btn-large waves-effect waves-dark transparent z-depth-0">
                        <i class="large material-icons black-text hoverable">more_vert</i>
                    </a>
                    <div class="card-content black-text">
                        <span class="card-title black-text">Skateboarding</span>
                        <p>$50.00</p>
                    </div>
                </div>
                <br>
                <br>
            </div>
        </div>
    </div>
    <br><br><br>
    <!--Modals-->

    <!--Agregar-->
    <div id="modal1" class="modal Texto rad">
        <div class="modal-content black-text">
            <h5>Agregar nuevo producto</h5>
            <br>
            <div class="row">
                <form class="col s12">
                    <div class="row">
                        <div class="input-field col s12 m6 l6">
                            <input id="nombre" type="text" class="validate">
                            <label for="nombre">Nombre del producto</label>
                        </div>
                        <div class="input-field col s12 m6 l6">
                            <select>
                                <optgroup label="team 1">
                                    <option value="1">Accesorios</option>
                                    <option value="2">Ropa</option>
                                </optgroup>
                            </select>
                            <label>Categoria</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12 m6 l6">
                            <textarea id="textarea1" class="materialize-textarea"></textarea>
                            <label for="textarea1">Descripcion</label>
                        </div>
                        <div class="input-field col s12 m6 l6">
                            <select>
                                <optgroup label="team 1">
                                    <option value="1">Disponible </option>
                                    <option value="2">Pendiente</option>
                                </optgroup>
                            </select>
                            <label>Estado</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12 m6 l6">
                            <input id="entrada" type="number" class="validate">
                            <label for="entrada">Precio $</label>
                        </div>
                        <div class="input-field col s12 m6 l6">
                            <input id="publico" type="number" min="1" max="90" class="validate">
                            <label for="publico">Descuento %</label>
                        </div>
                        <div class="input-field col s12 m12 l12">
                            <form action="#">
                                <div class="file-field input-field">
                                    <div class="btn black">
                                        <span><i class="large material-icons">add_a_photo</i></span>
                                        <input type="file" accept="image/*">
                                    </div>
                                    <div class="file-path-wrapper">
                                        <input placeholder="Imagen" id="imagen" class="file-path validate" type="text">
                                    </div>
                                </div>
                            </form>
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
    <div id="modal2" class="modal Texto rad">
        <div class="modal-content black-text">
            <h5>Actualizar producto</h5>
            <br>
            <div class="row">
                <form class="col s12">
                    <div class="row">
                        <div class="input-field col s12 m6 l6">
                            <input id="first_name" type="text" class="validate">
                            <label for="first_name">Nombre</label>
                        </div>
                        <div class="input-field col s12 m6 l6">
                            <select>
                                <optgroup label="team 1">
                                    <option value="1">Accesorios</option>
                                    <option value="2">Ropa</option>
                                </optgroup>
                            </select>
                            <label>Categoria</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12 m6 l6">
                            <textarea id="textarea1" class="materialize-textarea"></textarea>
                            <label for="textarea1">Descripcion</label>
                        </div>
                        <div class="input-field col s12 m6 l6">
                            <select>
                                <optgroup label="team 1">
                                    <option value="1">Disponible </option>
                                    <option value="2">Pendiente</option>
                                </optgroup>
                            </select>
                            <label>Estado</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12 m6 l6">
                            <input id="first_name" type="number" max="100" min="1" class="validate">
                            <label for="first_name">Precio $</label>
                        </div>
                        <div class="input-field col s12 m6 l6">
                            <input id="edit-descuento" type="number" max="100" min="1" class="validate">
                            <label for="edit-descuento">Descuento %</label>
                        </div>
                        <div class="input-field col s12 m12 l12">
                            <form action="#">
                                <div class="file-field input-field">
                                    <div class="btn black">
                                        <span><i class="large material-icons">add_a_photo</i></span>
                                        <input type="file">
                                    </div>
                                    <div class="file-path-wrapper">
                                        <input placeholder="Imagen" class="file-path validate" type="text">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="modal-footer">
            <a href="#!" class="modal-close waves-effect waves-black btn-flat">Cancelar</a>
            <button class="btn-flat waves-effect waves-light blue-grey darken-4 white-text modal-close" type="submit"
                name="action">Enviar
                <i class="material-icons right">send</i>
            </button>
        </div>
    </div>

    <!--Eliminar-->
    <div id="modal3" class="modal rad">
        <div class="modal-content black-text center Texto">
            <h4>Archivar producto</h4><br>
            <h6>¿Está seguro que desea archivar el producto?</h6>
        </div>
        <div class="modal-footer">
            <a href="#!" class="modal-close waves-effect waves-black btn-flat">Cancelar</a>
            <button class="btn waves-effect waves-light red modal-close" type="submit" name="action">Archivar
                <i class="material-icons right">delete</i>
            </button>
        </div>
    </div>
</section>
<?php
  //Se imprime la plantilla del pie y se envía el nombre del controlador para la página web
  Dashboard_Page::footerTemplate();
?>