<?php
require_once("../../app/helpers/private_page.php");
Dashboard_Page::headerTemplate('California','California');
?>
<header>
    <div class="container">
        <div class="row">
            <h1>Usuarios</h1>
            <h6>Gestión de Usuarios/Empleados</h6>
        </div>
    </div>
</header>


<section>
    <div class="container">

        <div class="row">
            <form method="post" id="search-form">

                <div class="input-field col s6">
                    <i class="material-icons prefix">search</i>
                    <!--TextBox Producto-->
                    <input id="search" type="text" name="search" required />
                    <label for="search">Buscador</label>
                </div>
                <div class="input-field col s6 m4">
                    <button type="submit" class="btn waves-effect green tooltipped" data-tooltip="Buscar">
                        <i class="material-icons">check_circle</i></button>
                </div>

            </form>
            <div class="input-field center-align col s6 m2">
                <!-- Enlace para abrir la caja de dialogo (modal) al momento de crear un nuevo registro -->
                <a href="#" onclick="openCreateDialog()" class="btn waves-effect indigo tooltipped"
                    data-tooltip="Crear"><i class="material-icons">add_circle</i></a>
            </div>
        </div>


        <table class="higlight">
            <thead>
                <tr>
                    <th>NOMBRES</th>
                    <th>APELLIDOS</th>
                    <th>EMAIL</th>
                    <th>NICK</th>
                    <th>DUI</th>
                    <th>DIRECCION</th>
                    <th>TIPO</th>
                    <th>ESTADO</th>
                    <th class="actions-column">ACCIONES</th>
                </tr>
            </thead>

            <tbody id="tbody-rows">
            </tbody>
        </table>

    </div>

    <!-- Componente Modal para mostrar una caja de dialogo -->
    <div id="save-modal" class="modal">
        <div class="modal-content">
            <!-- Título para la caja de dialogo -->
            <h4 id="modal-title" class="center-align"></h4>
            <!-- Formulario para crear o actualizar un registro -->
            <form method="post" id="save-form">
                <!-- Campo oculto para asignar el id del registro al momento de modificar -->
                <input class="hide" type="number" id="id_usuario" name="id_usuario" />
                <div class="row">
                    <div class="input-field col s12 m6">
                        <i class="material-icons prefix">person</i>
                        <input id="nombres_usuario" type="text" name="nombres_usuario" class="validate" required />
                        <label for="nombres_usuario">Nombres</label>
                    </div>
                    <div class="input-field col s12 m6">
                        <i class="material-icons prefix">person</i>
                        <input id="apellidos_usuario" type="text" name="apellidos_usuario" class="validate" required />
                        <label for="apellidos_usuario">Apellidos</label>
                    </div>
                    <div class="input-field col s12 m6">
                        <i class="material-icons prefix">email</i>
                        <input id="correo_usuario" type="email" name="correo_usuario" class="validate" required />
                        <label for="correo_usuario">Correo</label>
                    </div>
                    <div class="input-field col s12 m6">
                        <i class="material-icons prefix">person_pin</i>
                        <input id="alias_usuario" type="text" name="alias_usuario" class="validate" required />
                        <label for="alias_usuario">Alias</label>
                    </div>
                    <div class="input-field col s12 m6">
                        <i class="material-icons prefix">security</i>
                        <input id="clave_usuario" type="password" name="clave_usuario" class="validate" required />
                        <label for="clave_usuario">Clave</label>
                    </div>
                    <div class="input-field col s12 m6">
                        <i class="material-icons prefix">security</i>
                        <input id="confirmar_clave" type="password" name="confirmar_clave" class="validate" required />
                        <label for="confirmar_clave">Confirmar clave</label>
                    </div>
                    <div class="input-field col s12 m6">
                        <i class="material-icons prefix">apps</i>
                        <input id="dui_usuario" type="text" name="dui_usuario" class="validate" required />
                        <label for="dui_usuario">DUI</label>
                    </div>
                    <div class="input-field col s12 m6">
                        <i class="material-icons prefix">apps</i>
                        <input id="tipo_usuario" type="text" name="tipo_usuario" class="validate" required />
                        <label for="tipo_usuario">Tipo de usuario</label>
                    </div>
                    <div class="input-field col s12 m6">
                        <i class="material-icons prefix">border_color</i>
                        <input id="direccion_usuario" type="text" name="direccion_usuario" class="validate" required />
                        <label for="direccion_usuario">Direccion</label>
                    </div>
                    <div class="col s12 m6">
                        <p>
                        <div class="switch">
                            <span>Estado:</span>
                            <label>
                                <i class="material-icons">cancel</i>
                                <input id="estado_usuario" type="checkbox" name="estado_usuario" class="validate" checked />
                                <span class="lever"></span>
                                <i class="material-icons">check_box</i>
                            </label>
                        </div>
                        </p>
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
  Dashboard_Page::footerTemplate("usuarios.js");
?>