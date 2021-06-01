<?php
include("../../app/helpers/public_page.php");
Public_Page::headerTemplate('california');
?>

<section>
    <nav>
        <div class="nav-wrapper black">
          <div class="col s12 pad-nav">
            <a href="index.php" class="breadcrumb">Inicio</a>
            <a href="Productos.php" class="breadcrumb">Productos</a>
						<!--Link del producto-->
            <a href="#!" class="breadcrumb">Producto</a>
          </div>
        </div>
      </nav>
</section>

<section>
	<br><br>
</section>

<section>
	<div class="container">
		<div class="row">
			<div class="col s12 m4 l4">
				<img class="responsive-img" src="../../resources/multimedia/sb.jpg">
			</div>
			<div class="col s12 m8 l8">
				<div class="container">
					<div class="row">
						<div class="col s12 m12 l12">
							<!--Precio-->
							<h3 class="Titulos">$65<span class="new badge Texto" data-badge-caption="Descuento">Sin</span></h3>
							<!--Nombre-->
							<span class="Texto flow-text">Zapatos Canvas Nike SB</span>
							<div class="container"></div>
							<!--Tipo del Producto-->
							<p class="Texto">Tipo del producto: Zapatillas</p>
							<!--Marca-->
							<p class="Texto">Marca: Nike</p>
							<!--Promedio de valoracion-->
							<div class="container left">
								<div class="row">
									<div class="col s1 m1 l1">
										<a href="#!"><i class="material-icons tooltipped" data-position="bottom" data-tooltip="Dar 1 estrellas">star</i></a></a>
									</div>
									<div class="col s1 m1 l1">
										<a href="#!"><i class="material-icons tooltipped" data-position="bottom" data-tooltip="Dar 2 estrellas">star</i></a></a>
									</div>
									<div class="col s1 m1 l1">
										<a href="#!"><i class="material-icons tooltipped" data-position="bottom" data-tooltip="Dar 3 estrellas">star</i></a></a>
									</div>
									<div class="col s1 m1 l1">
										<a href="#!"><i class="material-icons tooltipped" data-position="bottom" data-tooltip="Dar 4 estrellas">star</i></a></a>
									</div>
									<div class="col s1 m1 l1">
										<a href="#!"><i class="material-icons tooltipped" data-position="bottom" data-tooltip="Dar 5 estrellas">star</i></a></a>
									</div>
								</div>
							</div>
							<br><br>
							<!--Descripcion-->
							<p class="Texto">Lorem ipsum dolor sit amet consectetur adipisicing elit. Laborum quaerat similique itaque ipsa aut maiores molestias reprehenderit, nisi, cum deleniti placeat aperiam enim minus harum velit consequatur architecto in nulla exercitationem sit expedita aliquid! Facilis dolorem, fugit officiis vitae id delectus ea vel, ex totam labore numquam cum odit ut!</p>
							<div class="container left">
								<div class="row">
									<div class="col s6 m6 l6">
										<div class="row">
											<form class="col s12 m12 l12">
												<div class="row">
													<!--Text Box Cantidad-->
													<div class="input-field col s12 m12 l12">
														<input aria-disabled="true" id="cantidad_producto" type="number" min="1" max="99" class="validate">
														<label for="cantidad_producto">Cantidad</label>
													</div>
												</div>
											</form>
										</div>
									</div>
									<!--Combobox Talla-->
									<div class="col s6 m6 l6">
										<label>Talla</label>
										<select class="browser-default">
											<option value="1" selected>7</option>
											<option value="2">8</option>
											<option value="3">9</option>
											<option value="4">10</option>
										</select>
									</div>
								</div>
							</div>
							<br>
						</div>
						<div class="col s12 m12 l12">
							<!--Btn Carrito-->
							<a class="waves-effect waves-light black btn"><i class="material-icons left">add_shopping_cart</i>Llevar en el Carrito</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<section>
  <div class="container">
    <div class="row">
			<div class="col s12 m12 l12">
				<br><br><br>
				<h5 class="pad-nav Texto center">Comentarios del producto</h5>
				<br><br><br>
			</div>
      <div class="col s4 m4 l4">
        <!-- Modal Trigger -->
        <a class="waves-effect waves-light black btn modal-trigger" data-target="modal1">Agregar Comentario</a>                
    	</div>
  	</div>
    <div class="row">
      <div class="col s12 m12 l12">
        <!--Comentarios-->
        <ul class="collection Texto">
          <li class="collection-item avatar">
						<!--Foto de Perfil-->
            <img src="../../resources/multimedia/perfil1.jpg" alt="" class="circle">
						<!--Nombre-->
            <span class="title">Steve Caballero</span>
						<!--Comentario-->
            <p>California es más que una tienda, es una puerta para la cultura.</p>
            <a href="#!" class="secondary-content"><i class="material-icons blue-text">grade</i></a>
          </li>
          <li class="collection-item avatar">
						<!--Foto de Perfil-->
            <img src="../../resources/multimedia/perfil.jpg" alt="" class="circle">
						<!--Nombre-->
            <span class="title">Sergio Pérez</span>
						<!--Comentario-->
            <p>Si fuera Skater sin duda preferiria comprar en California.</p>
            <a href="#!" class="secondary-content"><i class="material-icons blue-text">grade</i></a>
          </li>
          <li class="collection-item avatar">
						<!--Foto de Perfil-->
            <img src="../../resources/multimedia/perfil.jfif" alt="" class="circle">
						<!--Nombre-->
            <span class="title">Tony Hawk</span>
						<!--Comentario-->
            <p>Nunca vi en mi carrera una iniciativa tan prometedora como esta.</p>
            <a href="#!" class="secondary-content"><i class="material-icons blue-text">grade</i></a>
          </li>
          <li class="collection-item avatar">
						<!--Foto de Perfil-->
            <img src="../../resources/multimedia/pefil2.jpg" alt="" class="circle">
						<!--Nombre-->
            <span class="title">Mauricio</span>
						<!--Comentario-->
            <p>De no ser por los implementos de California, no hubiera hecho historia en Red Bull 2019.</p>
            <a href="#!" class="secondary-content"><i class="material-icons blue-text">grade</i></a>
          </li>
        </ul>          
      </div>
    </div>
  </div>

    <!-- Modal Structure --> 
  <div id="modal1" class="modal rad">
    <div class="modal-content">
      <h4 class="Titulos">Agregar Comentario</h4>
      <p class="Texto">Ingresa tu comentario</p>
      <div class="input-field col s12">
				<!--Textbox Comentario-->
      	<textarea id="textarea1" class="materialize-textarea"></textarea>
  		</div>
  	</div>
    <div class="modal-footer">
      <a href="#!" class="modal-close waves-effect waves-black btn-flat">Cancelar</a>
      <a href="#!" class="modal-close waves-effect waves-green btn-flat">Guardar</a>
    </div>
  </div>
</section>

<?php
  //Se imprime la plantilla del pie y se envía el nombre del controlador para la página web
  Public_Page::footerTemplate();
?>