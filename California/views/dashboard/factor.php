<?php
// Se incluye la clase con las plantillas del documento.
require_once('../../app/helpers/private_page.php');
// Se imprime la plantilla del encabezado enviando el título de la página web.
Dashboard_Page::headerTemplate('Login','california');
?>
<section>
	<div>
		<br>
	</div>
	<div class="container z-depth-0 hide-on-small-only" id="container">
		<div class="container">
			<div class="row">
				<div class="col s12 m12 l12 center">
                    <div class="card-content Texto">
						<h5 class="Titulos">Iniciar</h5>
						<p class="Texto">Ingresa los datos necesarios.</p>
                        <form method="post" id="register-form">
                            <div class="col s12 m12 l12 center">
								<br>
                                <p class="Textos">Recibirás un código de confirmación en tu correo electrónico</p>
							</div>
                            <div class="input-field col s12 m12 l12">
								<input id="correo" name="correo" type="email" class="validate" required>
								<label for="correo">Correo Electrónico</label>
							</div>
							<div class="col s12 m12 l12 center">
								<br>
								<button type="submit" class="btn black waves-effect waves-light hoverable">Enviar Código</button>
							</div>
							<div class="col s12 m12 l12 center">
								<br>
							</div>
					    </form>
                        <form method="post" id="verify-form">
                            <div class="col s12 m12 l12 center">
								<br>
                                <p class="Textos">Ingrésa el código de confirmación que enviamos a tu correo electrónico</p>
							</div>
							<div class="input-field col s12 m12 l12">
								<input id="codigo" name="codigo" type="number" class="validate" required>
								<label for="codigo">Código de Confirmación</label>
							</div>
							<div class="col s12 m12 l12 center">
								<br>
								<button type="submit" disabled class="btn black waves-effect waves-light hoverable">Verificar Código</button>
							</div>
							<div class="col s12 m12 l12 center">
								<br>
							</div>
					    </form>
					    <form method="post" id="register-form">
							<div class="input-field col s12 m12 l12">
								<input id="clave1" name="clave1" type="password" class="validate" required>
								<label for="clave1">Contraseña Nueva</label>
							</div>
							<div class="input-field col s12 m12 l12">
								<input id="clave2" name="clave2" type="password" class="validate" required>
								<label for="clave2">Confirma tu Contraseña Nueva</label>
							</div>
							<div class="col s12 m12 l12 center">
								<br>
								<button type="submit"  disabled class="btn black waves-effect waves-light hoverable">Actualizar
									Contraseña</button>
							</div>
							<div class="col s12 m12 l12 center">
								<br>
							</div>
					    </form>
                    </div>
				</div>
				<div class="col s12 m12 l12">
					<div class="divider"></div>
					<br><br>
					<h5 class="Titulos">Recordatorio:</h5>
					<p class="Texto">Acá te dejamos las medidas que debes seguir para Aumentar la SEGURIDAD de tus datos.</p>
					<p class="Texto">- Tu contraseña debe de contener letras mayúsculas, minúsculas y números.</p>	
					<p class="Texto">- No utilíces tu alias, correo electrónico o teléfono como contraseña.</p>
					<p class="Texto">- La contraseña debe de ser mayor o igual a 8 caracteres.</p>
								
				</div>
			</div>
		</div>
	</div>
</section>
<?php
// Se imprime la plantilla del pie enviando el nombre del controlador para la página web.
Dashboard_Page::footerTemplate('register.js',null);
?>