<?php
include("../../app/helpers/public_page.php");
Public_Page::headerTemplate('california');
?>
<div class="container Texto">
    <div class="row">
        <div class="col s12 m2 l2">
          <div id="test-slider"></div>
        </div>
        <div class="col s12 m6 l6">
            <div class="row">
                <form class="col s12">
                  <div class="row">
                    <div class="input-field col s12">
                      <i class="material-icons prefix">search</i>
                      <!--TextBox Producto-->
                      <textarea id="icon_prefix2" class="materialize-textarea z-depth-1 rad"></textarea>
                      <label for="icon_prefix2">Buscar Producto</label>
                    </div>
                  </div>
                </form>
            </div>           
        </div>
        <div class="col s12 m4 l4">
            <!--Combobox Tipo del producto-->
            <label class="Texto">Tipo del Producto</label>
            <select class="browser-default Texto">                
              <option class="Texto" value="" disabled selected>Todos</option>
              <optgroup class="Texto grey-text text-darken-1" label="Boards">
                <option id="comboSkt" class="black-text" value="1">Skateboards</option>
                <option id="comboLgb" class="black-text" value="2">Longboards</option>
              </optgroup>
              <optgroup class="Texto grey-text text-darken-1" label="Outfits">
                <option id="comboRp" class="black-text" value="3">Ropa</option>
                <option id="comboZp" class="black-text" value="4">Zapatillas</option>
                <option id="comboCmp" class="black-text" value="4">Complementos</option>
              </optgroup>
            </select>
        </div>
    </div>
</div>

<section>  
  <div class="container">
    <div class="row">
      <div class="col s12 m12 l12">
        <div class="container right">
          <div class="row">
            <!--lista-->
            <div class="right col s6 m2 l2">
              <a href="#!" class="valign-wrapper black-text Texto"><i><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px"
                width="20" height="20"
                viewBox="0 0 172 172"
                style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="none" stroke-linecap="butt" stroke-linejoin="none" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,172v-172h172v172z" stroke="none" stroke-width="1" stroke-linejoin="miter"></path><g stroke="#000000" stroke-width="6.88" stroke-linejoin="round"><path d="M17.2,17.2h58.48v58.48h-58.48zM96.32,17.2h58.48v58.48h-58.48zM17.2,96.32h58.48v58.48h-58.48zM96.32,96.32h58.48v58.48h-58.48z"></path></g></g></svg></i><span class="Texto pad-nav">Ver Cuadricula</span></a>
              
            </div>
            <!--Cuadricula-->
            <div class="right col s6 m2 l2">
              <a href="#!" class="valign-wrapper black-text Texto"><i><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px"
                width="20" height="20"
                viewBox="0 0 172 172"
                style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,172v-172h172v172z" fill="none"></path><g fill="#000000"><path d="M13.76,13.76c-7.56531,0 -13.76,6.19469 -13.76,13.76c0,7.56531 6.19469,13.76 13.76,13.76c7.56531,0 13.76,-6.19469 13.76,-13.76c0,-7.56531 -6.19469,-13.76 -13.76,-13.76zM13.76,20.64c3.84313,0 6.88,3.03688 6.88,6.88c0,3.84313 -3.03687,6.88 -6.88,6.88c-3.84312,0 -6.88,-3.03687 -6.88,-6.88c0,-3.84312 3.03688,-6.88 6.88,-6.88zM41.28,24.08v6.88h130.72v-6.88zM13.76,72.24c-7.56531,0 -13.76,6.19469 -13.76,13.76c0,7.56531 6.19469,13.76 13.76,13.76c7.56531,0 13.76,-6.19469 13.76,-13.76c0,-7.56531 -6.19469,-13.76 -13.76,-13.76zM13.76,79.12c3.84313,0 6.88,3.03688 6.88,6.88c0,3.84313 -3.03687,6.88 -6.88,6.88c-3.84312,0 -6.88,-3.03687 -6.88,-6.88c0,-3.84312 3.03688,-6.88 6.88,-6.88zM41.28,82.56v6.88h130.72v-6.88zM13.76,130.72c-7.56531,0 -13.76,6.19469 -13.76,13.76c0,7.56531 6.19469,13.76 13.76,13.76c7.56531,0 13.76,-6.19469 13.76,-13.76c0,-7.56531 -6.19469,-13.76 -13.76,-13.76zM13.76,137.6c3.84313,0 6.88,3.03688 6.88,6.88c0,3.84313 -3.03687,6.88 -6.88,6.88c-3.84312,0 -6.88,-3.03687 -6.88,-6.88c0,-3.84312 3.03688,-6.88 6.88,-6.88zM41.28,141.04v6.88h130.72v-6.88z"></path></g></g></svg></i><span class="Texto pad-nav">Ver Lista</span></a>
            </div>
          </div>
        </div>
      </div>
      <div class="col s12 m2 l2"></div>
    </div>
  </div>
</section>

<div class="container">
  <div class="row">

    <div class="col s12 m6 l4">
      <div class="card hoverable appear-down">
        <!--Imagen del producto-->
        <div class="card-image">
          <img src="../../resources/multimedia/skate.jpg">
          <a href="producto.php" class="btn-floating halfway-fab waves-effect waves-light black hoverable transition-appear down"><i class="material-icons">call_made</i></a>
        </div>
        <div class="card-content">
          <!--Precio del producto-->
          <span class="card-title Titulos">$50</span>
          <!--Nombre del producto-->
          <p class="Texto">Tabla Komplet Neon Black</p>
          <!--Descripcion del producto-->
          <p class="Texto">Lorem ipsum dolor sit amet consectetur adipisicing elit. Cum pariatur nostrum itaque error enim nisi deserunt sit consectetur illum provident.</p><br>
          
        </div>    
        <!--Descuento del producto-->
        <div class="card-action">
          <span class="left new badge" data-badge-caption="Descuento">15%</span>
        </div>             
      </div>
    </div>

    <div class="col s12 m6 l4">
      <div class="card hoverable appear-down">
        <!--Imagen del producto-->
        <div class="card-image">
          <img src="../../resources/multimedia/long.jpg">
          <a href="producto.php" class="btn-floating halfway-fab waves-effect waves-light black hoverable transition-appear down"><i class="material-icons">call_made</i></a>
        </div>
        <div class="card-content">
          <!--Precio del producto-->
          <span class="card-title Titulos">$50</span>
          <!--Nombre del producto-->
          <p class="Texto">Longboard Omakase</p>
          <!--Descripcion del producto-->
          <p class="Texto">Lorem ipsum dolor sit amet consectetur adipisicing elit. Cum pariatur nostrum itaque error enim nisi deserunt sit consectetur illum provident.</p><br>
          
        </div>    
        <!--Descuento del producto-->
        <div class="card-action">
          <span class="left new badge" data-badge-caption="Descuento">10%</span>
        </div>             
      </div>
    </div>
    
    <div class="col s12 m6 l4">
      <div class="card hoverable appear-down">
        <!--Imagen del producto-->
        <div class="card-image">
          <img src="../../resources/multimedia/vans.jpg">
          <a href="producto.php" class="btn-floating halfway-fab waves-effect waves-light black hoverable transition-appear down"><i class="material-icons">call_made</i></a>
        </div>
        <div class="card-content">
          <!--Precio del producto-->
          <span class="card-title Titulos">$20</span>
          <!--Nombre del producto-->
          <p class="Texto">Camisa Vans</p>
          <!--Descripcion del producto-->
          <p class="Texto">Lorem ipsum dolor sit amet consectetur adipisicing elit. Cum pariatur nostrum itaque error enim nisi deserunt sit consectetur illum provident.</p><br>
          
        </div>    
        <!--Descuento del producto-->
        <div class="card-action">
          <span class="left new badge" data-badge-caption="Descuento">Sin</span>
        </div>             
      </div>
    </div>

    <div class="col s12 m6 l4">
      <div class="card hoverable appear-down">
        <!--Imagen del producto-->
        <div class="card-image">
          <img src="../../resources/multimedia/sb.jpg">
          <a href="producto.php" class="btn-floating halfway-fab waves-effect waves-light black hoverable transition-appear down"><i class="material-icons">call_made</i></a>
        </div>
        <div class="card-content">
          <!--Precio del producto-->
          <span class="card-title Titulos">$65</span>
          <!--Nombre del producto-->
          <p class="Texto">Canvas Shoes Nike SB</p>
          <!--Descripcion del producto-->
          <p class="Texto">Lorem ipsum dolor sit amet consectetur adipisicing elit. Cum pariatur nostrum itaque error enim nisi deserunt sit consectetur illum provident.</p><br>
          
        </div>    
        <!--Descuento del producto-->
        <div class="card-action">
          <span class="left new badge" data-badge-caption="Descuento">Sin</span>
        </div>             
      </div>
    </div>

  </div>
</div>
<section>
  
</section>

<?php
  //Se imprime la plantilla del pie y se envía el nombre del controlador para la página web
  Public_Page::footerTemplate();
?>