<!DOCTYPE html>
        <html lang="es">
          <head>
            <meta charset="utf-8">
            <!--Importar Google Icon Font-->
            <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
            <!--Importar materialize.css-->
            <link type="text/css" rel="stylesheet" href="../../resources/css/materialize.min.css"  media="screen,projection"/>
            <!--Importar css propio-->   
            <link type="text/css" rel="stylesheet" href="../../resources/css/login.css"/>
      
            <!--Para que sea resposivo-->
            <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
            <title>California</title>
          </head>
      
	<body>
		  	
			<!--Login y registro-->
		<section>
      		<div class="container z-depth-1 hide-on-small-only" id="container">
				<div class="form-container sign-up-container">
					<form method>
						<h5 class="Titulos black-text">Crear Cuenta</h5>
						<span>Completa tus datos</span>
						<input type="text" placeholder="Nombre" class="validate col s6"/>
						<input type="text" placeholder="Apellidos" class="validate"/>
						<input type="email" placeholder="Email" autocomplete="off" class="validate"/>
						<input type="tel" placeholder="Teléfono" autocomplete="off" class="validate"/>
						<input type="password" placeholder="Contraseña" autocomplete="off" class="validate"/>		
						<input type="text" placeholder="Nombre" autocomplete="off" class="validate col s6"/>
						<input type="password" placeholder="Contraseña" class="validate"/>							
						<a href="#!" class="link modal-trigger" data-target="terminos">Al registrarte estas aceptando los terminos y condiciones</a>
						<a class="btn black waves-effect waves-light hoverable" href="#!">Registrarme</a>
					</form>
				</div>
				<div class="form-container sign-in-container">
					<form method="post" id="session-form">
						<h3 class="Titulos black-text">Iniciar Sesion</h3>
						<span>Ingresa tus credenciales</span>
						<input type="email" placeholder="Correo Electrónico" autocomplete="off" id="usuario" name="usuario" class="validate" required/>
						<input type="password" placeholder="Clave" id="clave" autocomplete="off" name="clave" class="validate" required/>
						<button type="submit" class="btn black waves-effect tooltipped" data-tooltip="Ingresar">Iniciar Sesión</button>
						<a class="Texto link" href="index.php">Volver al inicio</a>
					</form>
				</div>
				<div class="overlay-container">
					<div class="overlay">
						<div class="overlay-panel overlay-left">
							<h5 class="Subtitulos white-text">¿Ya tienes una cuenta?</h5>
							<a class="btn white black-text waves-effect waves-light hoverable" id="signIn">Iniciar Sesión</a>
						</div>
						<div class="overlay-panel overlay-right">
							<h5 class="Subtitulos">¿Eres nuevo por acá?</h5>
							<a class="btn white black-text waves-effect waves-light hoverable modal-trigger" href="register.php" id="signUp">Registrate</a>
						</div>
					</div>
				</div>
			</div>
			<!-- Modal Terminos --> 
			<div id="terminos" class="modal rad">
					<div class="modal-content">
						<h4 class="Texto">Terminos y condiciones</h4>
						<p class="Texto">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quis ipsam, vero adipisci corrupti dolores, accusamus odit incidunt aperiam expedita saepe id blanditiis vitae quisquam pariatur in ea nisi et. Iste animi quo pariatur, veritatis ipsa debitis, dolorum doloremque rerum quia voluptatibus aliquam sit! Nemo dolorem consequatur, adipisci accusantium incidunt, dignissimos quasi sapiente expedita, illum corporis aliquam sed ratione labore reprehenderit mollitia optio? Voluptatum voluptatem fugiat repellendus facere quas culpa similique sunt excepturi delectus dignissimos mollitia nisi illo, aspernatur incidunt nam vitae! Accusamus nesciunt reprehenderit magnam maxime odio adipisci ipsam sunt ex qui iste dignissimos tempore, molestiae autem mollitia illo perferendis modi rem dolore necessitatibus cupiditate dolores laborum. Eius repellendus quae amet incidunt perspiciatis eum cumque iusto doloribus itaque totam iste quos molestias similique deserunt saepe animi accusamus fuga esse obcaecati, quibusdam harum praesentium ullam libero consequuntur. Veniam assumenda aliquam a similique consectetur sunt cupiditate voluptatum, harum omnis soluta doloribus quis dicta aut reprehenderit libero sapiente saepe quos perspiciatis explicabo temporibus nesciunt? Dolor repellendus iure laboriosam, quasi nisi et atque? Reprehenderit, rem! Reiciendis, dolorem iusto. Incidunt adipisci nobis provident voluptatibus nihil minus quaerat earum aperiam facilis, corporis rem, natus pariatur assumenda delectus sint fuga consequatur perspiciatis asperiores itaque modi. Tempora, quibusdam?</p>						
					</div>
					<div class="modal-footer">
						<a href="#!" class="modal-close waves-effect waves-green btn-flat">Ok</a>
					</div>
		    </div>
		</section> 

		<!-- Modal Structure -->
		<div id="modal1" class="modal">
			<div class="modal-content">
			<h4>Modal Header</h4>
			<p>A bunch of text</p>
			</div>
			<div class="modal-footer">
			<a href="#!" class="modal-close waves-effect waves-green btn-flat">Agree</a>
			</div>
		</div>

			

      <!--JavaScript at end of body for optimized loading-->
	  <script type="text/javascript" src="../../resources/js/materialize.min.js"></script> 
      <script type="text/javascript" src="../../app/controllers/public/login.js"></script> 
	  <script type="text/javascript" src="../../resources/js/sweetalert.min.js"></script>                
	  <script type="text/javascript" src="../../app/helpers/components.js"></script>
    </body>
</html>