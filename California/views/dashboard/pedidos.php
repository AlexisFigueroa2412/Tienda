<?php
include("../../app/helpers/private_page.php");
Dashboard_Page::headerTemplate('California','California');
Dashboard_Page::controlTime();
?>
?>

<section>
    <div class="container">
        <div class="row">
            <h1>Pedidos</h1><br><br>
            <h5>Gestión de pedidos</h5><br><br>
        </div>
    </div>
</section>
<section>

    <!-- Dropdown Structure -->
    <ul id='dropdownmas' class='dropdown-content center'>
        <!--Boton de editar-->
        <li><a class="black-text Texto modal-trigger" href="#modal1">
                <i class="material-icons center">edit</i>Editar
            </a></li>
        <!--Boton de archivar-->
        <li><a class="black-text Texto modal-trigger" href="#modal3">
                <i class="material-icons center">assignment_turned_in</i>Marcar entrega
            </a></li>
    </ul>

    <div class="container Texto">
        <div class="row">
            <form class="col s12">
                <div class="row">
                    <div class="col s4 m4 l4">
                        <label>Mostrar pedidos del empleado</label>
                        <select>
                            <option value="" disabled selected>Sin Asignar</option>
                            <option value="1">Angel</option>
                            <option value="2">Daniel</option>
                            <option value="3">Alexis</option>
                        </select>
                    </div>
                    <div class="col s4 m4 l4">
                        <label>Mostrar pedidos por fecha</label>
                        <input type="date" name="" class="datepicker" id="fecha">
                    </div>
                    <div class="col s4 m4 l4">
                        <!--Combobox Tipo del producto-->
                        <label class="Texto">Mostrar pedidos por Estado</label>
                        <select class="browser-default Texto">
                            <option class="Texto" value="" selected>Pendiente</option> 
                            <option class="Texto" value="">Entregado</option>                           
                        </select>
                    </div>
                    <div class="input-field col s1 m1 l1">
                    <a href="../../app/reports/dashboard/pedidos.php" target="_blank" class="btn waves-effect black tooltiped" data-tooltip="Imprimir reporte"><i class="material-icons">assignment</i></a>
                </div>
                </div>
            </form>
        </div>
        <div class="row">
            <form class="col s12">
                <table class="responsive-table striped white black-text">
                    <thead>
                        <tr>
                            <th>N° Pedido</th>
                            <th>Cliente</th>
                            <th>Usuario</th>
                            <th>Carrito</th>
                            <th>Dirección</th>
                            <th>Ciudad</th>
                            <th>Estado</th>
                            <th>Fecha</th>
                            <th>Opciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>Carlos Valladares</td>
                            <td>Nimja19</td>
                            <td>326541</td>
                            <td>Boulevar de los Héroes</td>
                            <td>San Salvador</td>
                            <td>Entregado</td>
                            <td>Mar 02, 2021</td>
                            <td>
                                <a href='#' data-target='dropdownmas'
                                    class="dropdown-trigger btn-floating btn-large waves-effect waves-dark transparent z-depth-0">
                                    <i class="large material-icons black-text hoverable">more_vert</i></a>
                            </td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Katherine Durán</td>
                            <td>Nimja19</td>
                            <td>895211</td>
                            <td>Calle a Mariona</td>
                            <td>San Salvador</td>
                            <td>Pendiente</td>
                            <td>Mar 29, 2021</td>
                            <td>
                                <a href='#' data-target='dropdownmas'
                                    class="dropdown-trigger btn-floating btn-large waves-effect waves-dark transparent z-depth-0">
                                    <i class="large material-icons black-text hoverable">more_vert</i></a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </form>
        </div>
    </div>

    <!--Empleado-->
    <div id="modal1" class="modal Texto rad">
        <div class="modal-content black-text">
            <h5>Editar Pedidos</h5>
            <br>
            <div class="row">
                <form class="col s12">
                    <div class="row">
                        <div class="col s6 m6 l6">
                            <p class="left">N° del pedido: pedido[i]</p>
                        </div>
                        <div class="col s6 m6 l6">
                            <p class="left">N° de carrito: carrito[i]</p>
                        </div>
                    </div>
                    <div class="row valign-wrapper">
                        <div class="col s8 m8 l8">
                            <select>
                                <option value="" disabled selected>Seleccionar</option>
                                <option value="1">Angel</option>
                                <option value="2">Daniel</option>
                                <option value="3">Alexis</option>
                            </select>
                        </div>
                        <div class="col s4 m4 l4">
                            <a href="#!" class="waves-effect waves-light col s12 black btn">Asignar a este Usuario</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="modal-footer">
            <a class="btn-flat modal-close" type="submit" name="action">Aceptar</a>
        </div>
    </div>

</section>
<?php
  //Se imprime la plantilla del pie y se envía el nombre del controlador para la página web
  Dashboard_Page::footerTemplate();
?>