<?php
// Se incluye la clase con las plantillas del documento.
require_once('../../app/helpers/private_page.php');
// Se imprime la plantilla del encabezado enviando el título de la página web.
Dashboard_Page::headerTemplate('Restaurar Contraseña','California');
?>
<nav>
	<div class="nav-wrapper black">
		<div class="col s12 pad-nav">
			<a href="index.php" class="breadcrumb">Volver al Inicio de Sesión</a>
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
                    <div class="card-content Texto">
						<h5 class="Titulos">Recuperar Credenciales</h5>
						<p class="Texto">Ingresa los datos necesarios.</p>
                        <form method="post" id="email-form">
                            <div class="col s12 m12 l12 center">
								<br>
                                <p class="Textos">Recibirás un código de confirmación en tu correo electrónico</p>
							</div>
                            <div id="spn"></div>
                            <div class="input-field col s12 m12 l12">
								<input id="correo" name="correo" autocomplete="off" type="email" class="validate" required>
								<label for="correo">Correo Electrónico</label>
							</div>
							<div class="col s12 m12 l12 center">
								<br>
								<button onclick="enviarCorreo()" class="btn black waves-effect waves-light hoverable">Enviar Código</button>
							</div>
							<div class="col s12 m12 l12 center">
								<br>
							</div>
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
							</div>
					    </form>
                    </div>
				</div>
			</div>
		</div>
	</div>
</section>
<?php
// Se imprime la plantilla del pie enviando el nombre del controlador para la página web.
Dashboard_Page::footerTemplate('restaurar.js',null);
?>