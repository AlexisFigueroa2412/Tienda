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
		<div class="container">
			<div class="container center-aling">
				<h5 class="Titulos black-text">Crear Cuenta</h5>
				<span>Completa tus datos</span>
				<form method="post" id="register-form">
					<input id="nombre" name="nombre" type="text" placeholder="Nombre" class="validate col s6" required>
					<input id="apellido" name="apellido" type="text" placeholder="Apellidos" class="validate" required>
					<input id="email" name="email" type="email" placeholder="Email" class="validate" required>
					<input id="telefono" name="telefono" type="tel" placeholder="Teléfono" class="validate" required>
					<input id="clave" name="clave" type="password" placeholder="Contraseña" class="validate" required>	
					<input id="clave2" name="clave2" type="password" placeholder="Confirmar Clave" class="validate" required>	<br>		
					<button class="btn botonRegistro" type="submit">Registrarse
                		<i class="material-icons right">person_add</i>
                	</button><br>			
					<a href="#!" class="link modal-trigger" data-target="terminos">Al registrarte estas aceptando los terminos y condiciones</a>
					<a href="login.php" class="link"><b>Regresar al login</b></a>
				</form>
				<br>	
			</div>
		</div>

      <!--JavaScript at end of body for optimized loading-->
	  <script type="text/javascript" src="../../resources/js/materialize.min.js"></script> 
      <script type="text/javascript" src="../../app/controllers/public/register.js"></script> 
	  <script type="text/javascript" src="../../resources/js/sweetalert.min.js"></script>                
	  <script type="text/javascript" src="../../app/helpers/components.js"></script>
    </body>
</html>