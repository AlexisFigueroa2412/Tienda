<?php
include("../../app/helpers/private_page.php");
Dashboard_Page::headerTemplate('California','California');
?>

<!--Contenedor para mostrar el div contenedor a la card en la cual se muestra:-->
<!--el formulario de recuperar contraseña.-->
<br>
<br>
<br>
<div class="row container" id="ocultable">
    <div class="col s12">
        <div class="card white rad">
             <!--Defiendo el contenido de la card que contendrá el formulario-->
            <div class="card-content black-text">
                <a class="waves-effect black darken-3 white-text btn" href="../views/index.php">
                    <i class="material-icons left">arrow_back</i>Login
                </a>
                <br>
                <br>
                <!--Colocamos el titulo de la card-->
                <span class="card-title center-align">Recuperación de contraseña</span>
                <br>
                <!--Estableciendo el tamaño de cada div correspondiente-->
                <!--Creamos la estructura del formulario respectivo-->
                <div class="row">
                    <form class="col-md-4" method="post" id="user" name="user" enctype="multipart/form-data">
                        <div class="row">
                            <!--Estableciendo el tamaño del que tomará el Input field-->
                            <div class="input-field col s12 m6">
                                <input id="correo" name="correo" type="text" class="validate">
                                <label for="correo">Ingrese su correo:</label>
                            </div>
                        </div>
                        <div class="row">
                            <!--Estableciendo el tamaño del que tomará el Input field-->
                            <div class="input-field col s12 m6">
                                <button class="btn waves-effect black darken-3 white-text" type="submit" name="action" data-tooltip="Guardar">Enviar código
                                    <i class="material-icons right">send</i>
                                </button>
                            </div>
                        </div>
					</form>
                        <div class="row">
                            <!--Estableciendo el tamaño del que tomará el Input field-->
                            <div class="input-field col s12">
                                <p class="justificado">Se ha enviado un código de confirmación al correo electrónico
                                    asociado a esta cuenta, por favor revisa tu bandeja de entrada y procede a cambiar
                                    tu contraseña.
                                </p>
                            </div>
                        </div>
                        <div class="row">
                            <!--Estableciendo el tamaño del que tomará el Input field-->
                            <div class="input-field col s12 m6">
                                <input id="codigoc" type="text" class="validate">
                                <label for="codigoc">Ingrese el código de confirmación:</label>
                            </div>
							<div class="input-field col s12 m6">
							<button class="btn waves-effect black darken-3 white-text disabled" type="submit" name="action">Comprobar Código
                                    <i class="material-icons right">send</i>
                                </button>
                            </div>
                        </div>
                        <div class="row">
                            <!--Estableciendo el tamaño del que tomará el Input field-->
                            <div class="input-field col s12 m6">
                                <input id="new" type="text" class="validate">
                                <label for="new">Nueva contraseña:</label>
                            </div>
                            <!--Estableciendo el tamaño del que tomará el Input field-->
                            <div class="input-field col s12 m6">
                                <input id="confi" type="text" class="validate">
                                <label for="confi">Confirmar contraseña:</label>
                            </div>
                            <!--Estableciendo el tamaño del que tomará el Input field-->
                            <div class="input-field col s12 m6">
                                <button class="btn waves-effect black accent-2 disabled" type="submit" name="action">Cambiar
                                    contraseña
                                    <i class="material-icons right">edit</i>
                                </button>
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>
<br>
<br>
<br>
<?php
  //Se imprime la plantilla del pie y se envía el nombre del controlador para la página web
  Dashboard_Page::footerTemplate('main.js');
?>
