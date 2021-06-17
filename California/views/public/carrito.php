<?php
include("../../app/helpers/public_page.php");
Public_Page::headerTemplate('california','california');
?>

<section>
  <br><br>
  <div class="container">
    <div class="row">
      <div class="col s12 m6 l6">
          <div class="row">
            <div class="col s12 m12 l12">                            
              <div class="card horizontal appear-up">
                <!--Imagen del producto-->
                <div class="card-image">
                  <img class="responsive-img" src="../../resources/multimedia/sb.jpg">                                    
                </div>
                <div class="card-stacked">
                  <div class="card-content">
                    <!--Titulo del producto-->
                    <p class="Texto">Zapatos Canvas Nike SB</p><br>
                    <!--Precio Unitario del producto-->
                    <p class="Texto">$65 <span class="new badge Texto" data-badge-caption="Descuento">Sin</span></p><br>
                    <!--Cantidad de productos-->
                    <p class="Texto">Cantidad: 1</p> 
                    <!--Precio total de los productos-->
                    <p class="Texto">Subtotal: $65</p> 
                    <a class="btn-floating halfway-fab waves-effect waves-light black right hoverable transition-scale scale-out scale-in-init"><i class="material-icons">remove</i></a>                                                                  
                	</div>
                </div>                               
              </div>
            </div>
            <div class="col s12 m12 l12">                            
              <div class="card horizontal appear-up">
                <!--Imagen del producto-->
                <div class="card-image">
                  <img class="responsive-img" src="../../resources/multimedia/vans.jpg">                                    
                </div>
                <div class="card-stacked">
                  <div class="card-content">
                    <!--Titulo del producto-->
                    <p class="Texto">Camisa Vans</p><br>
                    <!--Precio Unitario del producto-->
                    <p class="Texto">$20 <span class="new badge Texto" data-badge-caption="Descuento">Sin</span></p><br>
                    <!--Cantidad de productos-->
                    <p class="Texto">Cantidad: 1</p>
                    <!--Precio total de los productos-->
                    <p class="Texto">Subtotal: $65</p> 
                    <a class="btn-floating halfway-fab waves-effect waves-light black right hoverable transition-scale scale-out scale-in-init"><i class="material-icons">remove</i></a>                                                                                                                  
                  </div>
                </div>                               
              </div>
            </div>
          </div>
                       
      </div>
      <div class="col s12 m6 l5 right">
          <div class="row">
            <div class="col s12 m12 l12">
              <div class="card">
                <div class="card-content Texto">
                  <p class="center">Datos de la entrega</p><br><br>
                  <h5 class="flow-text">Total: $85.75</h5>
                  <p>Impuestos ya agregados</p>                  
                  <div class="row">
										<div class="input-field col s12 m12 l12">
											<input id="ciudad_entrega" type="text" class="validate">
											<label for="ciudad_entrega">Ciudad</label>
										</div>
										<div class="input-field col s12 m12 l12">
											<input id="direccion_entrega" type="text" class="validate">
											<label for="direccion_entrega">Dirección</label>
										</div>
										<div class="input-field col s12 m12 l12">
											<input type="text" id="dia_entrega" class="datepicker">
											<label for="dia_entrega">Fecha de Entrega</label>
										</div>
                    <div class="input-field col s12 m12 l12">
											<input type="text" id="hora_entrega" class="timepicker">
											<label for="hora_entrega">Hora de Entrega</label>
										</div>
                	</div>
                	<a class="btn black waves-effect waves-light hoverable" href="#!">Realizar pedido</a>
                </div>
              </div>
            </div>
          </div>
      </div>
    </div>
  </div>
</section>

<?php
  //Se imprime la plantilla del pie y se envía el nombre del controlador para la página web
  Public_Page::footerTemplate("cart.js",null);
?>