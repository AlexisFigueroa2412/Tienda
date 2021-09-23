<?php
// Se incluye la clase con las plantillas del documento.
require_once('../../app/helpers/private_page.php');
// Se imprime la plantilla del encabezado enviando el título de la página web.
Dashboard_Page::headerTemplate('California','California');
?>
<main class="container">  <!-- Abre contenedor para incluir el contenido de la pagina -->
    <head>  <!-- Manda a llamar el css de la pagina -->
        <link type="text/css" rel="stylesheet" href="../../resources/css/styles.css" />
    </head>                                                                                                                                                                                                                                         <br>
    <h3 class="center-align">Actualización de contraseña de su usuario</h3><br>
    <!-- Formulario para registrar al primer usuario del dashboard -->
    <form method="post" id="session-form">
        <div class="row">
            <?php 
            print'
                <div class="input-field offset-s3 col s6">
                    <i class="material-icons prefix ">person_pin</i>
                    <input id="alias" type="text" name="alias" autocomplete="off" value="'.$_SESSION['mail']. '" class="validate" required disabled />
                    <label for="alias">Usuario</label>
                </div>'
            ?>
            <div class="input-field offset-s3 col s6">
                <i class="material-icons prefix">security</i>
                <input id="clave1" type="password" name="clave1" autocomplete="off" class="validate" autocomplete="off"/>
                <label for="clave1">Clave</label>
                <span class="helper-text">Tu nueva debe ser diferente a la clave actual.</span>
            </div>
            <div class="input-field offset-s3 col s6">
                <i class="material-icons prefix">security</i>
                <input id="clave2" type="password" name="clave2" autocomplete="off" class="validate"  autocomplete="off"/>
                <label for="clave2">Confirmar clave</label>
                <span class="helper-text">Debe confirmar su nueva clave.</span>
            </div>
        </div>
        </form>
        <div class="row">
            <div class="col l7 m7 push-m5 push-l5 s7 push-s3">
                <button onclick="cambiarClave()" class="button2"><i class="material-icons">cached</i>.. Actualizar clave</button>
            </div>
        </div>
    
    <?php
// Se imprime la plantilla del pie enviando el nombre del controlador para la página web.
Dashboard_Page::footerTemplate('password.js');
?>