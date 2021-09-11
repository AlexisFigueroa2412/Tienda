<?php
include("../../app/helpers/public_page.php");
Public_Page::headerTemplate('california','california');
Public_Page::controlTime();
?>

<section>
	<nav>
		<div class="nav-wrapper black">
			<div class="col s12 pad-nav">
				<a href="index.php" class="breadcrumb">Inicio</a>
				<a href="Productos.php" class="breadcrumb">Productos</a>
				<!--Link del producto-->
				<a href="#!" class="breadcrumb" id="bread"></a>
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
				<img class="responsive-img" id="imagen" src="">
			</div>
			<div class="col s12 m8 l8">
				<div class="container">
					<div class="row">
						<div class="col s12 m12 l12">
							<!--Precio-->
							<h4 class="Titulos" id="precio"></h4>
							<!--Nombre-->
							<span class="Texto flow-text" id="nombre"></span>
							<div class="container"></div>
							<!--Tipo del Producto-->
							<p class="Texto" id="categoria"></p>
							<!--Marca-->
							<p class="Texto" id="marca"></p>
							<!--Promedio de valoracion-->
							<div class="container left">
								<div class="row" id="val">
								</div>
							</div>
							<br><br>
							<!--Descripcion-->
							<p class="Texto" id="descripcion"></p>
							<div class="container left">
								<div class="row">
									<div class="col s12 m12 l12">
										<div class="row">
											<form method="post" id="shopping-form" class="col s12 m12 l12">
												<div class="row">
													<!--Text Box Cantidad-->
													<input type="number" id="id_producto" name="id_producto"
														class="hide" />
													<input type="number" id="precio_producto" name="precio_producto"
														class="hide" />
													<div class="input-field col s12 m12 l12" id="cant">
														<input aria-disabled="true" id="cantidad_producto"
															name="cantidad_producto" type="number" min="1"
															class="validate" required>
														<label for="cantidad_producto">Cantidad</label>
													</div>
													<div class="col s12 m12 l12">
														<!--Btn Carrito-->
														<button type="submit"
															class="waves-effect waves-light black btn"><i
																class="material-icons left">add_shopping_cart</i>Llevar
															en el Carrito</button>
													</div>
												</div>
											</form>
										</div>
									</div>
								</div>
							</div>
							<br>
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
			<div class="col s4 m4 l4" id="boton">

			</div>
		</div>
		<div class="row">
			<div class="col s12 m12 l12">
				<!--Comentarios-->
				<p id="tem"></p>
				<ul class="collection Texto" id="tbody-rows">
				</ul>
			</div>
		</div>
	</div>

	<!-- Modal Structure -->
	<div id="save-modal" class="modal rad">
		<div class="modal-content">
			<h5 class="Texto">Agregar Comentario</h5>
			<p class="Texto">Ingresa tu comentario</p>
			<form method="post" id="save-form" class="col s12 m12 l12">
				<div class="row">
				<input type="number" id="id_producto_coment" name="id_producto_coment"
														class="hide" />
				<div class="input-field col s6 m6 l6">
					<!--Textbox Comentario-->
					<textarea id="comentario" name="comentario" class="materialize-textarea" required></textarea>
					<label for="comentario">Ingresa tu comentario</label>
				</div>
				<div class="input-field col s6 m6 l6" id="cant">
					<input aria-disabled="true" id="calificacion" name="calificacion" type="number" min="1" max="5"
						class="validate" required>
					<label for="calificacion">Califica del 1 al 5 este producto</label>
				</div>
				<div>
					<a href="#!" class="modal-close waves-effect waves-black btn-flat">Cancelar</a>
					<button type="submit" class="modal-close waves-effect waves-green btn-flat">Guardar</button>
				</div>
				</div>
			</form>
		</div>
	</div>
</section>

<?php
  //Se imprime la plantilla del pie y se envía el nombre del controlador para la página web
  Public_Page::footerTemplate("producto.js",null);
?>