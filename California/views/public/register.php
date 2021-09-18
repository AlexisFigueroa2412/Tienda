<?php
// Se incluye la clase con las plantillas del documento.
require_once('../../app/helpers/public_page.php');
// Se imprime la plantilla del encabezado enviando el título de la página web.
Public_Page::headerTemplate('Registro','california');
?>  	
<nav>
	<div class="nav-wrapper black">
		<div class="col s12 pad-nav">
			<a href="index.php" class="breadcrumb">Página de Inicio</a>
			<a href="login.php" class="breadcrumb">Iniciar Sesión</a>
			<!--Link del producto-->
			<a href="#!" class="breadcrumb" id="bread"></a>
		</div>
	</div>
</nav>
<section>
    <div>
        <br>
    </div>
    <div class="container z-depth-0 hide-on-small-only" id="container">        
        <div class="container">
            <div class="row">
                <div class="col s12 m12 l12 center">
                    <form method="post" id="register-form">
                        <!-- Campo oculto para asignar el token del reCAPTCHA -->
                        <input type="hidden" id="g-recaptcha-response" name="g-recaptcha-response"/>
                        <div class="card-content Texto">
                            <h5 class="Titulos">Registrate</h5>
                            <p class="Texto">Ingresa tus datos.</p>
                            <div class="input-field col s12">
                                <input autocomplete="off" id="nombre" name="nombre" type="text" class="validate" required>
                                <label for="nombre">Nombre</label>
                            </div>
                            <div class="input-field col s12">
                                <input autocomplete="off" id="apellido" name="apellido" type="text" class="validate" required>
                                <label for="apellido">Apellidos</label>
                            </div>
                            <div class="input-field col s12">
                                <input autocomplete="off" id="email" name="email" type="email"  class="validate" required>
                                <label for="email">Correo</label>
                            </div>
                            <div class="input-field col s12">
                                <input autocomplete="off" id="telefono" name="telefono" type="text" class="validate" required>
                                <label for="telefono">Número de Teléfono</label>
                            </div>
                            <div class="input-field col s6">
                                <input autocomplete="off" id="clave" name="clave" type="password" class="validate" required>
                                <label for="clave">Contraseña</label>
                            </div>
                            <div class="input-field col s6">
                                <input autocomplete="off" id="clave2" name="clave2" type="password" class="validate" required>
                                <label for="clave2">Confirma tu Contraseña</label>
                            </div>
                            <div class="col s12 m12 l12 center">
                                <a href="!#" class="link black-text modal-trigger" data-target="terminos">Al registrarte estas
                                    aceptando los terminos y condiciones</a>
                            </div>
                            <div class="col s12 m6">
                                <p>
                                <div class="switch">
                                    <span>Segundo Factor de Autenticación:</span>
                                    <label>
                                        <i class="material-icons">cancel</i>
                                        <input id="factor" type="checkbox" name="factor" class="validate" checked />
                                        <span class="lever"></span>
                                        <i class="material-icons">check_box</i>
                                    </label>
                                </div>
                                </p>
                            </div>
                            <div class="col s12 m12 l12 center">
                                <br>
                                <button type="submit" class="btn black waves-effect waves-light hoverable">Registrarme</button>                               
                            </div>
                            <div class="col s12 m12 l12 center">
                                <br>                             
                            </div>
                        </div>
                    </form>
                </div>
				<div class="col s12 m12 l12">
					<div class="divider"></div>
					<br><br>
					<h5 class="Titulos">Recordatorio:</h5>
					<p class="Texto">Acá te dejamos las medidas que debes seguir para Aumentar la SEGURIDAD de tus datos.</p>
					<p class="Texto">- Tu Correo Electrónico debe de tener el siguiente formato: ejemplo@correo.com</p>
					<p class="Texto">- Tu Número Telefónico debe de tener el siguiente formato: 0000-0000</p>
					<p class="Texto">- Tu contraseña debe de contener letras mayúsculas, minúsculas y números.</p>	
					<p class="Texto">- No utilíces tu alias, correo electrónico o teléfono como contraseña.</p>
					<p class="Texto">- La contraseña debe de ser mayor o igual a 8 caracteres.</p>
				</div>
            </div>
        </div>
    </div>
    <!-- Modal Terminos -->
    <div id="terminos" class="modal rad">
        <div class="modal-content">
            <h4 class="Texto">Terminos y condiciones</h4>
            <p class="Texto">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quis ipsam, vero adipisci corrupti
                dolores, accusamus odit incidunt aperiam expedita saepe id blanditiis vitae quisquam pariatur in ea nisi
                et. Iste animi quo pariatur, veritatis ipsa debitis, dolorum doloremque rerum quia voluptatibus aliquam
                sit! Nemo dolorem consequatur, adipisci accusantium incidunt, dignissimos quasi sapiente expedita, illum
                corporis aliquam sed ratione labore reprehenderit mollitia optio? Voluptatum voluptatem fugiat
                repellendus facere quas culpa similique sunt excepturi delectus dignissimos mollitia nisi illo,
                aspernatur incidunt nam vitae! Accusamus nesciunt reprehenderit magnam maxime odio adipisci ipsam sunt
                ex qui iste dignissimos tempore, molestiae autem mollitia illo perferendis modi rem dolore
                necessitatibus cupiditate dolores laborum. Eius repellendus quae amet incidunt perspiciatis eum cumque
                iusto doloribus itaque totam iste quos molestias similique deserunt saepe animi accusamus fuga esse
                obcaecati, quibusdam harum praesentium ullam libero consequuntur. Veniam assumenda aliquam a similique
                consectetur sunt cupiditate voluptatum, harum omnis soluta doloribus quis dicta aut reprehenderit libero
                sapiente saepe quos perspiciatis explicabo temporibus nesciunt? Dolor repellendus iure laboriosam, quasi
                nisi et atque? Reprehenderit, rem! Reiciendis, dolorem iusto. Incidunt adipisci nobis provident
                voluptatibus nihil minus quaerat earum aperiam facilis, corporis rem, natus pariatur assumenda delectus
                sint fuga consequatur perspiciatis asperiores itaque modi. Tempora, quibusdam?</p>
        </div>
        <div class="modal-footer">
            <a href="#!" class="modal-close waves-effect waves-green btn-flat">Ok</a>
        </div>
    </div>
</section>

<!--Login Telefonos-->

<section class="hide-on-med-and-up">
    

    <!-- Modal 2 -->
    <div id="modal2" class="modal rad">
        <div class="modal-content">
            <h5 class="Titulos">Registrate</h5>
            <p class="Texto">Ingresa tus datos.</p>
            <div class="input-field col s12">
                <input id="nombre_registro_mobile" type="text" autocomplete="off" class="validate">
                <label for="nombre_registro_mobile">Nombre</label>
            </div>
            <div class="input-field col s12">
                <input id="apellidos_registro_mobile" type="text" autocomplete="off" class="validate">
                <label for="apellidos_registro_mobile">Apellidos</label>
            </div>
            <div class="input-field col s12">
                <input id="email_registro_mobile" type="email" autocomplete="off" class="validate">
                <label for="email_registro_mobile">Correo</label>
            </div>
            <div class="input-field col s12">
                <input id="tel_registro_mobile" type="tel" autocomplete="off" class="validate">
                <label for="tel_registro_mobile">Teléfono</label>
            </div>
            <div class="input-field col s12">
                <input id="psw_registro_mobile" type="password" autocomplete="off" class="validate">
                <label for="psw_registro_mobile">Contraseña</label>
            </div>
        </div>
        <div class="modal-footer">
            <a class="btn white z-depth-0 black-text modal-trigger" data-target="terminos2">Al registrarte estas
                aceptando los terminos y condiciones</a>
            <a href="#!" class="modal-close waves-effect waves-black btn-flat">Cancelar</a>
            <a href="#!" class="modal-close waves-effect waves-green btn-flat">Guardar</a>
        </div>
    </div>
    <!-- Modal Terminos2 -->
    <div id="terminos2" class="modal rad">
        <div class="modal-content">
            <h4 class="Texto">Terminos y condiciones</h4>
            <p class="Texto">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quis ipsam, vero adipisci corrupti
                dolores, accusamus odit incidunt aperiam expedita saepe id blanditiis vitae quisquam pariatur in ea nisi
                et. Iste animi quo pariatur, veritatis ipsa debitis, dolorum doloremque rerum quia voluptatibus aliquam
                sit! Nemo dolorem consequatur, adipisci accusantium incidunt, dignissimos quasi sapiente expedita, illum
                corporis aliquam sed ratione labore reprehenderit mollitia optio? Voluptatum voluptatem fugiat
                repellendus facere quas culpa similique sunt excepturi delectus dignissimos mollitia nisi illo,
                aspernatur incidunt nam vitae! Accusamus nesciunt reprehenderit magnam maxime odio adipisci ipsam sunt
                ex qui iste dignissimos tempore, molestiae autem mollitia illo perferendis modi rem dolore
                necessitatibus cupiditate dolores laborum. Eius repellendus quae amet incidunt perspiciatis eum cumque
                iusto doloribus itaque totam iste quos molestias similique deserunt saepe animi accusamus fuga esse
                obcaecati, quibusdam harum praesentium ullam libero consequuntur. Veniam assumenda aliquam a similique
                consectetur sunt cupiditate voluptatum, harum omnis soluta doloribus quis dicta aut reprehenderit libero
                sapiente saepe quos perspiciatis explicabo temporibus nesciunt? Dolor repellendus iure laboriosam, quasi
                nisi et atque? Reprehenderit, rem! Reiciendis, dolorem iusto. Incidunt adipisci nobis provident
                voluptatibus nihil minus quaerat earum aperiam facilis, corporis rem, natus pariatur assumenda delectus
                sint fuga consequatur perspiciatis asperiores itaque modi. Tempora, quibusdam?</p>
        </div>
        <div class="modal-footer">
            <a href="#!" class="modal-close waves-effect waves-green btn-flat">Ok</a>
        </div>
    </div>
</section>
<!-- Importación del archivo para que funcione el reCAPTCHA. Para más información https://developers.google.com/recaptcha/docs/v3 -->
    <script type="text/javascript" src="https://www.google.com/recaptcha/api.js?render=6LeVm2QcAAAAAE1X1ZaWWBREF2vXsK6RFLhNcnK7"></script>
<?php
// Se imprime la plantilla del pie enviando el nombre del controlador para la página web.
Public_Page::footerTemplate('register.js',null);
?>