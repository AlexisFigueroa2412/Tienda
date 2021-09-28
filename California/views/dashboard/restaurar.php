<?php
// Se incluye la clase con las plantillas del documento.
require_once('../../app/helpers/private_page.php');
// Se imprime la plantilla del encabezado enviando el título de la página web.
Dashboard_Page::headerTemplate('California','California');
?>
<body>
    <div class="row login">
        <div class="col s12 m14 offset-s14">
            <div class="card ">
                <div class="card-action center-align">
                    <h4>Recuperación por medio de correo</h4>
                </div>
                <div class="card-content">
                    <form method="post" id="email-form">
                        <div class="form-field">
                            <label for="correo">Correo electrónico</label>
                            <input id="correo" type="text" name="correo" class="validate" autocomplete="off" required>
                        </div><br>
                        <div class="form-field">
                            <label for="codigo">Código</label>
                            <input id="codigo" type="number" name="codigo" class="validate" autocomplete="off" disabled required>
                        </div><br>
                    </form>
                    <div class="form-field center-align">
                        <button onclick="enviarCorreo()" class="button"><span>Enviar código</span></button>
                    </div> 
                    <div class="container white-text">
                        <center><br><a href="index.php">¿Desea regresar al login?</a><br><br></center>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</body>
<?php
// Se imprime la plantilla del pie enviando el nombre del controlador para la página web.
Dashboard_Page::footerTemplate('restaurar.js');
?>