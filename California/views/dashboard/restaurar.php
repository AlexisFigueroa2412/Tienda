<?php
?>

<section>
<div class="container z-depth-1 hide-on-small-only" id="container">
		<div class="form-container sign-up-container">
			<form action="#">
				<a class="btn white z-depth-0 black-text modal-trigger" data-target="terminos">Al registrarte estas
					aceptando los terminos y condiciones</a>
				<a class="btn black waves-effect waves-light hoverable" href="#!">Registrarme</a>
			</form>
		</div>
		<div class="form-container sign-in-container">
			<form method="POST" id="session-form" action="#">
				<h3 class="Titulos black-text">Iniciar Sesion</h3>
				<span>Ingresa tus credenciales</span>
				<input id="alias" name="alias" type="text" placeholder="Usuario" autocomplete="off" class="validate" required/>
				<input id="clave" name="clave" type="password" placeholder="Contraseña" autocomplete="off" class="validate" required/>
				<button type="submit" class="btn black waves-effect waves-light hoverable">Iniciar Sesión</button><br>
				<a class="Texto link" href="index.php">Sitio Público</a>
				<a class="Texto link" href="restaurar.php">¿Olvidaste tu contraseña?</a>
			</form>
		</div>
</section>