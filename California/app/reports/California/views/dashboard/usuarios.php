<?php
include("../../app/helpers/private_page.php");
Dashboard_Page::headerTemplate('California');
?>
<header>
    <div class="container">
        <div class="row">
            <h1>Usuarios</h1>
            <h6>Gestión de Usuarios de Empleados</h6>
        </div>
    </div>
</header>
<section>
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
                                <label for="icon_prefix2">Buscar Empleado</label>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col s4 m4 l4">
                <!--Combobox Tipo del producto-->
                <label class="Texto">Estado</label>
                <select class="browser-default Texto">
                    <option class="Texto" value=""selected>Activo</option>
                    <option class="Texto" value=""selected>Inactivo</option>
                </select>
            </div>
        </div>
        <div class="row">
            <div class="col s12 m12 l12">
                <a href="#adduser" class="modal-trigger btn col s12 black waves-effect waves-light">Agregar Nuevo Usuario<i
                    class="material-icons left">add</i></a>
            </div>
        </div>
        <div class="row">

            <!-- Dropdown Structure -->
            <ul id='dropdownmas' class='dropdown-content center'>
                <!--Boton de editar-->
                <li><a class="black-text Texto modal-trigger" href="#edituser">
                        <i class="material-icons center">edit</i>Editar</a></li>
                <!--Boton de archivar-->
                <li><a class="black-text Texto modal-trigger" href="#modal3">
                        <i class="material-icons center">delete</i>Archivar</a></li>
            </ul>

            <form class="col s12">
                <table class="responsive-table striped white black-text">
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Apellidos</th>
                            <th>Usuario</th>
                            <th>DUI</th>
                            <th>Dirección</th>
                            <th>Tipo</th>
                            <th>Email</th>
                            <th>Estado</th>
                        </tr>
                    </thead>

                    <tbody>
                        <tr>
                            <td>Daniel</td>
                            <td>Delgado</td>
                            <td>Nimja19</td>
                            <td>1345678-9</td>
                            <td>Centro Penal La Esperanza</td>
                            <td>Administrador</td>
                            <td>daniel.delgado.carcamo@gmail.com</td>
                            <td>Activo</td>
                            <td>
                                <a href='#' data-target='dropdownmas'
                                    class="dropdown-trigger right btn-floating btn-large waves-effect waves-dark transparent z-depth-0">
                                    <i class="large material-icons black-text hoverable">more_vert</i></a>
                            </td>
                        </tr>
                        <tr>
                            <td>Angel</td>
                            <td>Fuentes</td>
                            <td>McQueen95</td>
                            <td>8563247-9</td>
                            <td>Las Margaritas Casa 18</td>
                            <td>Empleado</td>
                            <td>angelinvi@gmail.com</td>
                            <td>Activo</td>
                            <td>
                                <a href='#' data-target='dropdownmas'
                                    class="dropdown-trigger right btn-floating btn-large waves-effect waves-dark transparent z-depth-0">
                                    <i class="large material-icons black-text hoverable">more_vert</i></a>
                            </td>
                        </tr>
                        <tr>
                            <td>Alexis</td>
                            <td>Figueroa</td>
                            <td>Alepo</td>
                            <td>95736285-9</td>
                            <td>Comunidad El Zapote</td>
                            <td>Repartidor</td>
                            <td>thekingalepo@gmail.com</td>
                            <td>Inactivo</td>
                            <td>
                                <a href='#' data-target='dropdownmas'
                                    class="dropdown-trigger right btn-floating btn-large waves-effect waves-dark transparent z-depth-0">
                                    <i class="large material-icons black-text hoverable">more_vert</i></a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </form>
        </div>
    </div>
    <!--Agregar-->
    <div id="adduser" class="modal Texto rad">a
        <div class="modal-content black-text">
            <h5>Agregar nuevo usuario</h5>
            <br>
            <div class="row">
                <form class="col s12">
                    <div class="row">
                        <div class="input-field col s6">
                            <input id="first_name" type="text" class="validate white">
                            <label for="first_name">Nombres</label>
                        </div>
                        <div class="input-field col s6">
                            <input id="last_name" type="text" class="validate white">
                            <label for="last_name">Apellidos</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s6">
                            <input id="user" type="text" class="validate white">
                            <label for="user">Usuario</label>
                        </div>
                        <div class="input-field col s6">
                            <input id="password" type="password" class="validate white">
                            <label for="password">Clave</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s6">
                            <input id="dui" type="text" class="validate white">
                            <label for="dui">DUI</label>
                        </div>
                        <div class="input-field col s6">
                            <input id="direccion" type="text" class="validate white">
                            <label for="direccion ">Dirección</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12">
                            <input id="email" type="email" class="validate white">
                            <label for="email">Email</label>
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
    <div id="edituser" class="modal Texto rad">a
        <div class="modal-content black-text">
            <h5>Editar nuevo usuario</h5>
            <br>
            <div class="row">
                <form class="col s12">
                    <div class="row">
                        <div class="input-field col s6">
                            <input id="first_name" type="text" class="validate white">
                            <label for="first_name">Nombres</label>
                        </div>
                        <div class="input-field col s6">
                            <input id="last_name" type="text" class="validate white">
                            <label for="last_name">Apellidos</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s6">
                            <input id="user" type="text" class="validate white">
                            <label for="user">Usuario</label>
                        </div>
                        <div class="input-field col s6">
                            <input id="password" type="password" class="validate white">
                            <label for="password">Clave</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s6">
                            <input id="dui" type="text" class="validate white">
                            <label for="dui">DUI</label>
                        </div>
                        <div class="input-field col s6">
                            <input id="direccion" type="text" class="validate white">
                            <label for="direccion ">Dirección</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12">
                            <input id="email" type="email" class="validate white">
                            <label for="email">Email</label>
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
</section>

<?php
  //Se imprime la plantilla del pie y se envía el nombre del controlador para la página web
  Dashboard_Page::footerTemplate();
?>