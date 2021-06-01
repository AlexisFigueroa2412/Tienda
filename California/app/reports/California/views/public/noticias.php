<?php
include("../../app/helpers/public_page.php");
Public_Page::headerTemplate('california');
?>

<section>
    <div id="index-banner" class="parallax-container valign-wrapper">
        <!--Lo de dentro del parallax-->
        <div class="section no-pad-bot ">
          <div class="container">
            <br><br>
            <div class="row">            
              <h3 class="header col s12 center light Subtitulos">No te pierdas de las novedades que tenemos para ti.</h3>
            </div>
            <br><br>
          </div>
        </div>
        <!--Imagen del parallax-->
        <div class="parallax">
          <img src="../../resources/multimedia/CoverSKTB (16).png" alt="Unsplashed background img 1">
        </div>
      </div>
      <br><br>
</section>   
<section>
    <div>
        <br><br>
        <h2 class="pad-nav Texto center">De última hora</h2>
        <br><br><br>
      </div>
    <div class="container">
        <div class="row">
            <div class="col s12 m4 l4">
              <div class="card large hoverable scale-transition scale-out">
                <!--Imagen de la noticia-->
                <div class="card-image">
                  <img src="../../resources/multimedia/Header noticia (2).png">                  
                </div>
                <div class="card-content">
                  <!--Titulo de la noticia-->
                  <span class="card-title Titulos">California</span>
                  <!--Descripcion de la noticia-->
                  <p class="Texto">¡La nueva línea de Skateboards 100% autenticas ya está aquí! Estamos orgullosos de poner a rodar nuestras nuevas tablas.</p><br>
                  <!--Link de la noticia-->
                  <a class="btn black col s12 waves-effect waves-light hoverable" href="noticia.php">Ver más</a>
                </div>
              </div>
            </div>
            <div class="col s12 m4 l4">
                <div class="card large hoverable scale-transition scale-out">
                  <div class="card-image">
                    <img src="../../resources/multimedia/Header noticia.png">                    
                  </div>
                  <div class="card-content">
                    <span class="card-title Titulos">Vans</span>
                    <p class="Texto">¡Hemos conseguido que VANS entre en nuestra pista! Podrás conseguir sus productos muy pronto en nuestra tienda.</p><br>
                    <a class="btn black col s12 waves-effect waves-light hoverable" href="noticia.php">Ver más</a>
                  </div>
                </div>
            </div>
            <div class="col s12 m4 l4">
                <div class="card large hoverable scale-transition scale-out">
                  <div class="card-image">
                    <img src="../../resources/multimedia/Header noticia (1).png">                    
                  </div>
                  <div class="card-content">
                    <span class="card-title Titulos">Element</span>
                    <p class="Texto">¡Descuentos! Encuentra productos Element con hasta un 30% de descuento. Tienes hasta el 31 de marzo para buscarlos.</p><br>
                    <a class="btn black col s12 waves-effect waves-light" href="noticia.php">Ver más</a>
                  </div>                 
                </div>
            </div>     
            <div class="col s12 m4 l4">
                <div class="card large hoverable scale-transition scale-out">
                  <div class="card-image">
                    <img src="../../resources/multimedia/Header noticia (3).png">                    
                  </div>
                  <div class="card-content">
                    <span class="card-title Titulos">Nueva pista</span>
                    <p class="Texto">¡Nueva pista abierta! Seremos los sponsors principales de la Ignauración de la nueva pista en el centro de San Salvador.</p><br>
                    <a class="btn black col s12 waves-effect waves-light hoverable" href="noticia.php">Ver más</a>
                  </div>                 
                </div>
            </div>            
        </div>
    </div>
</section>

<?php
  //Se imprime la plantilla del pie y se envía el nombre del controlador para la página web
  Public_Page::footerTemplate();
?>