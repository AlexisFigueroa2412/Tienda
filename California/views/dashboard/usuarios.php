<?php
require_once("../../app/helpers/private_page.php");
Dashboard_Page::headerTemplate('California', 'California');
?>
<header>
    <div class="container Texto">
        <div class="row">
            <h1>Usuarios</h1>
            <h6>Gestión de Usuarios/Empleados</h6>
        </div>
    </div>
</header>


<section>
    <div class="container Texto">

        <div class="row">
            <form method="post" id="search-form">

                <div class="input-field col s7 m9 l9">
                    <i class="material-icons prefix">search</i>
                    <!--TextBox Producto-->
                    <input id="search" type="text" name="search" required />
                    <label for="search">Buscador</label>
                </div>
                <div class="input-field col s4 m2 l2">
                    <button type="submit" class="btn waves-effect black col s12 tooltipped" data-tooltip="Buscar">buscar</button>
                </div>
                <div class="input-field col s1 m1 l1">
                    <a href="../../app/reports/dashboard/usuarios.php" target="_blank" class="btn waves-effect black tooltiped" data-tooltip="Imprimir reporte"><i class="material-icons">assignment</i></a>
                </div>

            </form>
        </div>
        <div class="row">
            <div class="center-align col s12 m12">
                <!-- Enlace para abrir la caja de dialogo (modal) al momento de crear un nuevo registro -->
                <a onclick="openCreateDialog()" class="waves-effect waves-light col s12 black btn"><i class="material-icons left">add_box</i>Añadir un nuevo Usuario</a>
            </div>
        </div>
        <div class="row">
            <div class="col s12 m12 l12">
                <table class="striped white black-text">
                    <thead>
                        <tr>
                            <th>Nombres</th>
                            <th>Apellidos</th>
                            <th>Correo Electrónico</th>
                            <th>Nombre de Usuario</th>
                            <th>Estado</th>
                        </tr>
                    </thead>

                    <tbody id="tbody-rows">
                    </tbody>
                </table>
            </div>
        </div>
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
                        <input id="nombre_usuario" type="text" name="nombre_usuario" class="validate" required />
                        <label for="nombre_usuario">Nombres</label>
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