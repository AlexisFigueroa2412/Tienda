<?php
include("../../app/helpers/public_page.php");
Public_Page::headerTemplate('california','california');
Public_Page::controlTime();
?>

<section>
  <br><br>
  <div class="container">
    <div class="row">
      <div class="col s12 m8 l8">
          <div class="row">
          <div id="tbody-rows">
                <div>
                </div>
            </div>
          </div>
      </div>
      <div class="col s12 m4 l4 right">
          <div class="row">
            <div class="col s12 m12 l12">
              <div class="card rad z-depth-0">
                <div class="card-content Texto">
                  <p class="center">Datos de la entrega</p><br><br>
                  <h5 class="flow-text">Total: $<b id="pago"></b></h5>
                  <p>Impuestos ya agregados</p><br><br>
                  <div class="row">
                    <button type="button" onclick="finishOrder()" class="col s12 btn black waves-effect waves-light hoverable" href="#!">Realizar pedido</button>
                    <p class="center"> ó </p>
                    <a href="productos.php" class="col s12 btn white black-text waves-effect hoverable">Seguir Comprando</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
      </div>
    </div>
  </div>
  <!-- Componente Modal para mostrar una caja de dialogo -->
  <div id="item-modal" class="modal Texto rad">
      <div class="modal-content">
          <!-- Título para la caja de dialogo -->
          <h5 id="modal-title">Modificar Cantidad</h5>
          <!-- Formulario para cambiar la cantidad de producto -->
          <form method="post" id="item-form">
              <!-- Campo oculto para asignar el id del registro al momento de modificar -->
              <input type="number" id="id_detalle" name="id_detalle" class="hide"/>
              <input type="number" id="anterior" name="anterior" class="hide"/>              
              <div class="row">
                  <div class="input-field col s12 m12 l12">
                      <input type="number" id="cantidad_producto" name="cantidad_producto" min="1" class="validate" required/>
                      <label for="cantidad_producto">Cantidad</label>
                  </div>
              </div>
              <div class="row">
                  <a href="#" class="modal-close waves-effect waves-black btn-flat">Cancelar</a>
                  <button type="submit" class="btn-flat modal-close">Guardar</button>
              </div>
          </form>
      </div>
  </div>
</section>

<?php
  //Se imprime la plantilla del pie y se envía el nombre del controlador para la página web
  Public_Page::footerTemplate("cart.js",null);
?>