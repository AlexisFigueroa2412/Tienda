<?php
include("../../app/helpers/private_page.php");
Dashboard_Page::headerTemplate('California');
?>
<section>
  <div id="index-banner" class="parallax-container">
    <div class="section no-pad-bot">
      <div class="container valign-wrapper">
        <br><br>
        <div class="container center"><br><br>
          <h1 class="Titulos white-text">California</h1><br>
          <h3 class="Subtitulos white-text">Dashboard</h3>                      
        </div>
        <br><br>
      </div>
    </div>
    <div class="parallax"><img src="../../resources/multimedia/CoverP.png" alt="Unsplashed background img 1"></div>
  </div>
</section>
<section>
  <br><br>
  <div class="container">
    <div class="row">
      <div class="col s12 m12 l12"><br><br>
        <h6 class="Texto flow-text black-text">Productos recurrentes</h2><br><br>
      </div>
      <div class="col s12 m6 l6">      
        <div class="carousel carousel-slider">
          <a class="carousel-item responsive-img" href="#one!"><img src="../../resources/multimedia/image1.jpg" width="150" height="300"></a>
          <a class="carousel-item responsive-img" href="#two!"><img src="../../resources/multimedia/image2.jpg" width="150" height="300"></a>
          <a class="carousel-item responsive-img" href="#three!"><img src="../../resources/multimedia/image3.jpg" width="150" height="300"></a>
          <a class="carousel-item responsive-img" href="#three!"><img src="../../resources/multimedia/image4.jpg" width="150" height="300"></a>
        </div>  
      </div>
      <div class="col s12 m6 l6">
          <!--Comentarios-->
          <ul class="collection Texto">
            <li class="collection-item avatar">
              <span class="title">Longboard Omakase</span>
              <p>$50 <br>
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Delectus, cumque.
              </p>
              <a href="#!" class="secondary-content"><i class="material-icons yellow-text">grade</i></a>
            </li>
            <li class="collection-item avatar">
              <span class="title">Tabla Komplet Neon Black</span>
              <p>$50<br>
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Architecto, possimus.
              </p>
              <a href="#!" class="secondary-content"><i class="material-icons yellow-text">grade</i></a>
            </li>
            <li class="collection-item avatar">
              <span class="title">Camisa Vans</span>
              <p>$20 <br>
                Lorem ipsum dolor sit, amet consectetur adipisicing elit. Nulla, aspernatur?
              </p>
              <a href="#!" class="secondary-content"><i class="material-icons yellow-text">grade</i></a>
            </li>
            <li class="collection-item avatar">
              <span class="title">Canvas Shoes Nike SB</span>
              <p>$65<br>
                Lorem ipsum dolor sit amet consectetur, adipisicing elit. Necessitatibus, totam.
              </p>
              <a href="#!" class="secondary-content"><i class="material-icons yellow-text">grade</i></a>
            </li>
          </ul>          
        </div>
      </div>
    </div>
  </div>
</section>

  
<?php
  //Se imprime la plantilla del pie y se envía el nombre del controlador para la página web
  Dashboard_Page::footerTemplate();
?>

