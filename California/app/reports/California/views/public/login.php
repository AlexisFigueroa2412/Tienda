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
					<form action="#">
						<h3 class="Titulos black-text">Crear Cuenta</h3>
						<span>Completa tus datos</span>
						<input type="text" placeholder="Nombre" class="validate"/>
						<input type="text" placeholder="Apellidos" class="validate"/>
						<input type="email" placeholder="Email" class="validate"/>
						<input type="tel" placeholder="Teléfono" class="validate"/>
						<input type="password" placeholder="Contraseña" class="validate"/>
						<a class="btn white z-depth-0 black-text modal-trigger" data-target="terminos">Al registrarte estas aceptando los terminos y condiciones</a>
						<a class="btn black waves-effect waves-light hoverable" href="#!">Registrarme</a>
					</form>
				</div>
				<div class="form-container sign-in-container">
					<form action="#">
						<h3 class="Titulos black-text">Iniciar Sesion</h3>
						<span>Ingresa tus credenciales</span>
						<input type="text" placeholder="Usuario" class="validate"/>
						<input type="password" placeholder="Contraseña" class="validate"/>
						<a class="btn black waves-effect waves-light hoverable" href="index.php">Iniciar Sesión</a><br>
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
							<a class="btn white black-text waves-effect waves-light hoverable" id="signUp">Registrate</a>
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
			
			<!--Login Telefonos-->

			<section class="hide-on-med-and-up">
				<br><br>
				<div class="container">
						<div class="row">
								<div class="col s12 m6 l6">
									<div class="card z-depth-0">
										<div class="card-content Texto">
												<h3 class="center Titulos">iniciar sesion</h3>
												<p class="center"><br><br>Ingresa tus datos</p>
												<br><br>                                    
												<div class="row">
														<div class="input-field col s12 m12 l12">
																<input id="correo_login_mobile" type="email" class="validate">
																<label for="correo_login_mobile">Correo</label>
														</div>
														<div class="input-field col s12 m12 l12">
																<input id="contraseña_login_mobile" type="password" class="validate">
																<label for="contraseña_login_mobile">Contraseña</label>
														</div>
														<div class="col s12 m12 l12 center">															
															<a class="btn black waves-effect waves-light hoverable" href="index.php">Iniciar Sesión</a>
														</div>
														<div class="col s12 m12 l12 center">
															<br><br>
															<p class="center">¿Eres nuevo por acá?</p>
															<a class="btn white black-text waves-effect waves-light hoverable modal-trigger" data-target="modal2">Registrate</a>
														</div>
												</div>
										</div>
										<a class="Texto link" href="index.php">Volver al inicio</a>
									</div>
								</div>
						</div>
				</div>

				<!-- Modal 2 --> 
				<div id="modal2" class="modal rad">
					<div class="modal-content">
						<h5 class="Titulos">Registrate</h5>
						<p class="Texto">Ingresa tus datos.</p>
						<div class="input-field col s12">
							<input id="nombre_registro_mobile" type="text" class="validate">
							<label for="nombre_registro_mobile">Nombre</label>
						</div>
						<div class="input-field col s12">
							<input id="apellidos_registro_mobile" type="text" class="validate">
							<label for="apellidos_registro_mobile">Apellidos</label>
						</div>
						<div class="input-field col s12">
							<input id="email_registro_mobile" type="email" class="validate">
							<label for="email_registro_mobile">Correo</label>
						</div>
						<div class="input-field col s12">
							<input id="tel_registro_mobile" type="tel" class="validate">
							<label for="tel_registro_mobile">Teléfono</label>
						</div>
						<div class="input-field col s12">
							<input id="psw_registro_mobile" type="password" class="validate">
							<label for="psw_registro_mobile">Contraseña</label>
						</div>
					</div>
					<div class="modal-footer">
						<a class="btn white z-depth-0 black-text modal-trigger" data-target="terminos2">Al registrarte estas aceptando los terminos y condiciones</a>
						<a href="#!" class="modal-close waves-effect waves-black btn-flat">Cancelar</a>
						<a href="#!" class="modal-close waves-effect waves-green btn-flat">Guardar</a>
					</div>
				</div>				
				<!-- Modal Terminos2 --> 
				<div id="terminos2" class="modal rad">
					<div class="modal-content">
						<h4 class="Texto">Terminos y condiciones</h4>
						<p class="Texto">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quis ipsam, vero adipisci corrupti dolores, accusamus odit incidunt aperiam expedita saepe id blanditiis vitae quisquam pariatur in ea nisi et. Iste animi quo pariatur, veritatis ipsa debitis, dolorum doloremque rerum quia voluptatibus aliquam sit! Nemo dolorem consequatur, adipisci accusantium incidunt, dignissimos quasi sapiente expedita, illum corporis aliquam sed ratione labore reprehenderit mollitia optio? Voluptatum voluptatem fugiat repellendus facere quas culpa similique sunt excepturi delectus dignissimos mollitia nisi illo, aspernatur incidunt nam vitae! Accusamus nesciunt reprehenderit magnam maxime odio adipisci ipsam sunt ex qui iste dignissimos tempore, molestiae autem mollitia illo perferendis modi rem dolore necessitatibus cupiditate dolores laborum. Eius repellendus quae amet incidunt perspiciatis eum cumque iusto doloribus itaque totam iste quos molestias similique deserunt saepe animi accusamus fuga esse obcaecati, quibusdam harum praesentium ullam libero consequuntur. Veniam assumenda aliquam a similique consectetur sunt cupiditate voluptatum, harum omnis soluta doloribus quis dicta aut reprehenderit libero sapiente saepe quos perspiciatis explicabo temporibus nesciunt? Dolor repellendus iure laboriosam, quasi nisi et atque? Reprehenderit, rem! Reiciendis, dolorem iusto. Incidunt adipisci nobis provident voluptatibus nihil minus quaerat earum aperiam facilis, corporis rem, natus pariatur assumenda delectus sint fuga consequatur perspiciatis asperiores itaque modi. Tempora, quibusdam?</p>						
					</div>
					<div class="modal-footer">
						<a href="#!" class="modal-close waves-effect waves-green btn-flat">Ok</a>
					</div>
				</div>
		</section>

      <!--JavaScript at end of body for optimized loading-->
      <script type="text/javascript" src="../../resources/js/materialize.min.js"></script> 
      <script type="text/javascript" src="../../app/init/california.js"></script> 
      <script type="text/javascript" src="../../app/init/login.js"></script> 
    </body>
</html>  