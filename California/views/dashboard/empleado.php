?php
include("../../app/helpers/private_page.php");
Dashboard_Page::headerTemplate('California','California');
Dashboard_Page::controlTime();
?>
  <section> 

    
    <!--Banner del Index-->    
    <div id="index-banner" class="parallax-container">
      <!--Lo de dentro del parallax-->
      <div class="section no-pad-bot valign-wrapper">
        <div class="container">
          <br><br>
          <div class="container col s12 row center ">
            <img class="responsive-img" src="../resources/multimedia/LogoPP.png" alt="Logo"> 
            <br>
            <br>
          </div>
          <div class="row center  hide-on-med-only">            
            <h3 class="header col s12 center light Titulos">Born to Rove</h3>
          </div>
          <!--Barra de Busqueda-->
          <nav class="white z-depth-3 Titulos rad row center">
            <div class="nav-wrapper">
              <form>
                <div class="input-field">
                  <input class="black-text" id="search" type="search" required>
                  <label class="label-icon black-text" for="search"><i class="material-icons black-text">search</i></label>
                  <i class="material-icons">close</i>
                </div>
              </form>
            </div>
          </nav>
          <br><br>
        </div>
      </div>
      <!--Imagen del parallax-->
      <div class="parallax">
        <img src="../resources/multimedia/CoverP.png" alt="Unsplashed background img 1">
      </div>
    </div>
    <br><br>

    <!--Noticias-->
    <div>
      <h2 class="pad-nav Texto center">Noticias</h2>
      <br><br>
    </div>
    <div class="row">
      <a href="#!">
        <div class="col s6 m6 l3">
          <div class="card alto-card white rad">
            <div class="card-content black-text">
              <span class="card-title Titulos">California</span>
              <p class="Texto">¡La nueva línea de Skateboards 100% autenticas ya está aquí! Estamos orgullosos de poner a rodar nuestras nuevas tablas.</p>
            </div>            
          </div>
        </div>
      </a>
      <div class="col s6 m6 l3">          
        <a href="#!">
          <div class="card alto-card white z-depth-1 rad">
            <div class="card-content black-text">
              <span class="card-title Subtitulos">Vans</span>
              <p class="Texto">¡Hemos conseguido que VANS entre en nuestra pista! Podrás conseguir sus productos muy pronto en nuestra tienda.</p>
            </div>            
          </div>
        </a>
      </div>
      <a href="#!">
        <div class="col s6 m6 l3">
          <div class="card alto-card white z-depth-1 rad">
            <div class="card-content black-text">
              <span class="card-title Subtitulos">Element</span>
              <p class="Texto">¡Descuentos! Encuentra productos Element con hasta un 30% de descuento. Tienes hasta el 31 de marzo para buscarlos</p>
            </div>            
          </div>
        </div>
      </a>        
      <a href="#!">
        <div class="col s6 m6 l3">
          <div class="card alto-card white z-depth-1 rad center">
            <div class="card-content black-text">              
              <p class="Texto">Ver todas las noticias.</p>
              <span class="card-title Subtitulos"></span>
              <i class="center"><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px"
                width="50" height="50"
                viewBox="0 0 172 172"
                style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,172v-172h172v172z" fill="none"></path><g fill="#000000"><path d="M86,6.88c-43.65844,0 -79.12,35.46156 -79.12,79.12c0,43.65844 35.46156,79.12 79.12,79.12c43.65844,0 79.12,-35.46156 79.12,-79.12c0,-43.65844 -35.46156,-79.12 -79.12,-79.12zM86,13.76c39.93625,0 72.24,32.30375 72.24,72.24c0,39.93625 -32.30375,72.24 -72.24,72.24c-39.93625,0 -72.24,-32.30375 -72.24,-72.24c0,-39.93625 32.30375,-72.24 72.24,-72.24zM75.3575,48.0525c-0.14781,0.02688 -0.29562,0.06719 -0.43,0.1075c-1.29,0.22844 -2.32469,1.16906 -2.6875,2.41875c-0.36281,1.26313 0.01344,2.60688 0.9675,3.49375l31.9275,31.9275l-31.9275,31.9275c-1.37062,1.37063 -1.37062,3.57438 0,4.945c1.37063,1.37063 3.57438,1.37063 4.945,0l34.4,-34.4c0.67188,-0.645 1.04813,-1.54531 1.04813,-2.4725c0,-0.92719 -0.37625,-1.8275 -1.04813,-2.4725l-34.4,-34.4c-0.71219,-0.76594 -1.74687,-1.15562 -2.795,-1.075z"></path></g></g></svg>
              </i>
              </div>
        </div>
      </a>       
    </div>
  </section>  



  <section>
    <!--Productos-->
    <div>
      <br><br>
      <h2 class="pad-nav Texto center">Explora Nuestro Catálogo</h2>
      <br><br><br>
    </div>
    <div class="ancho-completo">
      <div id="index-banner" class="ancho-medio-izquierda">        
        <img class="responsive-img" src="../resources/multimedia/CoverSKTB (9).png" alt="producto">            
      </div>
      <div class="ancho-medio-derecha pad-nav">
          <div class="row">
            <div class="col s12 m12 l12 ">
              <div class="card small white z-depth-0 valign-wrapper">
                <div class="card-content black-text">
                  <span class="card-title Titulos"><h3>Skateboards</h3></span>
                  <p class="Texto">Tenemos las mejores Skateboards para ti.</p><br>
                  <a class="mover-derecha right-align black col s12 waves-effect waves-light btn" href="#!">Ver</a>
                </div>                
              </div>
            </div>
          </div>
        </div>
    </div>
    <div class="ancho-completo">
      <div id="index-banner" class="ancho-medio-derecha">        
        <img class="responsive-img" src="../resources/multimedia/CoverSKTB (4).png" alt="producto">            
      </div>
      <div class="ancho-medio-izquierda pad-nav">                    
          <div class="row">
            <div class="col s12 m12 l12">
              <div class="card small white z-depth-0 valign-wrapper">
                <div class="card-content black-text">
                  <span class="card-title Titulos"><h3>Longboards</h3></span>
                  <p class="Texto">Pruebate con nuestras nuevas Longboards</p><br>
                  <a class="black col s12 waves-effect waves-light btn" href="#!">Ver</a>
                </div>                
              </div>
            </div>
          </div>      
      </div> 
    </div>
    <div class="ancho-completo">
      <div id="index-banner" class="ancho-medio-izquierda">        
        <img class="responsive-img" src="../resources/multimedia/CoverSKTB (10).png" alt="producto">            
      </div>
      <div class="ancho-medio-derecha pad-nav">
          <div class="row">
            <div class="col s12 m12 l12 ">
              <div class="card white small z-depth-0 valign-wrapper">
                <div class="card-content black-text">
                  <span class="card-title Titulos"><h3>Complementos</h3></span>
                  <p class="Texto">Que no te falte nada para rodar.</p><br>
                  <a class="mover-derecha right-align black col s12 waves-effect waves-light btn" href="#!">Ver</a>
                </div>                
              </div>
            </div>
          </div>   
      </div>
    </div>
    <div class="ancho-completo">
      <div id="index-banner" class="ancho-medio-derecha">        
        <img class="responsive-img" src="../resources/multimedia/CoverSKTB (13).png" alt="producto">            
      </div>
      <div class="ancho-medio-izquierda pad-nav">                    
          <div class="row">
            <div class="col s12 m12 l12">
              <div class="card small white z-depth-0 valign-wrapper">
                <div class="card-content black-text">
                  <span class="card-title Titulos"><h3>Ropa</h3></span>
                  <p class="Texto">Que lo que vistas exprese tu genialidad.</p><br>
                  <a class="black col s12 waves-effect waves-light btn" href="#!">Ver</a>
                </div>                
              </div>
            </div>
          </div>      
      </div> 
    </div>
    <div class="ancho-completo">
      <div id="index-banner" class="ancho-medio-izquierda">        
        <img class="responsive-img" src="../resources/multimedia/CoverSKTB (12).png" alt="producto">            
      </div>
      <div class="ancho-medio-derecha pad-nav">
          <div class="row">
            <div class="col s12 m12 l12 ">
              <div class="card white small z-depth-0 valign-wrapper">
                <div class="card-content black-text">
                  <span class="card-title Titulos"><h3>Zapatillas</h3></span>
                  <p class="Texto">Demuestra confianza hasta en tus Zapatillas.</p><br>
                  <a class="mover-derecha right-align black col s12 waves-effect waves-light btn" href="#!">Ver</a>
                </div>                
              </div>
            </div>
          </div>   
      </div>
    </div>
    
  </section>
  <section>
    <div>
      <br><br>
      <h2 class="pad-nav Texto center">Sobre Nosotros</h2>
      <br><br><br>
    </div>
    <div class="row valign-wrapper">
      <div class="col s12 m6 l6">
        <br><br>
        <h3 class="pad-nav Texto center">"Somos la mejor opción para todo Skater"</h3>
        <div class="container center">
          <!-- Dropdown Trigger -->
          <a class="black waves-effect waves-light dropdown-trigger btn" href='#' data-target='dropdownmas'>Conoce más sobre Nosotros.</a>
          <!-- Dropdown Structure -->
          <ul id='dropdownmas' class='dropdown-content'>
            <li><a class="black-text" href="#!">Conocenos</a></li>
            <li><a class="black-text" href="#!">Contacta con Nosotros</a></li>
          </ul>
        </div>
        <br><br><br>
      </div>
      <div class="col m6 l6 hide-on-small-only">
        <img class="responsive-img" src="../resources/multimedia/gif.gif">
      </div>
    </div>
  </section>

  <?php
  //Se imprime la plantilla del pie y se envía el nombre del controlador para la página web
  Dashboard_Page::footerTemplate();
?>

