<?php
include("../../app/helpers/private_page.php");
Dashboard_Page::headerTemplate('California');
?>
<header>
	<div class="container">
		<div class="row">
			<h1>Clientes</h1>
			<h5>Gestión Usuarios de los Clientes</h5>
		</div>
	</div>
</header>
<section>
	<div class="container Texto">
		<div class="row">
			<div class="col s6 m4 l3">
				<div class="card rad">
					<div class="card-content center">
						<img class="circle" src="../../resources/multimedia/perfil.jpg" width="80px" height="80px">
						<span class="card-title">Sergio Pérez</span>
						<p>sergioperez@gmail.com</p>
						<p>7062-3278</p><br>
						<!-- Switch -->
						<div class="switch">
							<label>
								<p>Estado del usuario:</p>
								Bloqueado
								<input type="checkbox" checked="checked">
								<span class="lever"></span>
								Activo
							</label>
						</div><br>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<?php
  //Se imprime la plantilla del pie y se envía el nombre del controlador para la página web
  Dashboard_Page::footerTemplate();
?>