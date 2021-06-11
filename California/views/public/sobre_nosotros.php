<?php
include("../../app/helpers/public_page.php");
Public_Page::headerTemplate('california','california');
?>

<section>
    <div id="index-banner" class="parallax-container valign-wrapper">
        <!--Lo de dentro del parallax-->
        <div class="section no-pad-bot ">
          <div class="container">
            <br><br>
            <div class="row">            
              <h3 class="header col s12 center light Subtitulos">Más que una empresa, somos un gran equipo.</h3>
            </div>
            <br><br>
          </div>
        </div>
        <!--Imagen del parallax-->
        <div class="parallax">
          <img src="../../resources/multimedia/CoverSKTB (14).png" alt="Unsplashed background img 1">
        </div>
      </div>
      <br><br>
</section>   
<section>
    <div>
        <br><br>
        <h2 class="pad-nav Texto center">Dejanos Contarte Sobre Nosotros...</h2>
        <br><br><br>
      </div>
    <div class="container justificar">
        <div class="row">
            <div class="col s12 m12 l12">
                <h2 class="Titulos">California</h2>
                <p class="flow-text Texto">Es una tienda en línea de skateboards de fabricación artesanal además de la distribución de productos de las marcas más reconocidas en el mundo del patinaje.</p>
                <p class=" flow-text Texto">Pero esa es solo nuestra ficha técnica, en realidad somos más que eso. Desde el inicio hemos buscado la forma de dar lo mejor en implementos a la comunidad de Skaters; tenemos una mentalidad fresca y presente nuestra busqueda de innovar por eso no perderemos jamás el espiritu de "rover" que cargamos en nuestras tablas desde la misma creación del skateboard en 1970, y es justamente esa fidelidad al espiritu skater que nos dió nuestro nombre "California".</p>
                <div class="container">
                    <div class="row">
                        <div class="col s12 center">
                            <img class="responsive-img" src="../../resources/multimedia/OsoLogo.png">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col s12 m6 l6">
                <h2 class="Titulos">Nuestra Mision</h2>
                <p class="flow-text Texto">Nuestra misión es fácil de describir, pero de mucho esfuerzo de realizar. Ofrecemos una opción mejor en nuestros productos a las que la comunidad skater tiene actualmente, todo para que la cultura de este deporte crezca junto con la pasión de cada uno de los que ya estamos en este mundo.</p>
            </div>
            <div class="col s12 m6 l6">
                <h2 class="Titulos">Nuestra Vision</h2>
                <p class="flow-text Texto">Siempre hemos pensado que apuntar alto es algo necesario en todo momento y no hacemos excepción. Queremos ser la referencia de todas las generaciones en el mundo del skateboard, por la calidad y la pasión que nuestros productos aportan, no solo en nuestro país si no también en extranjero.</p>
            </div>
        </div>
        <div>
            <br><br>
            <h2 class="pad-nav Texto center">Nuestros compañeros en la pista:</h2>
            <br><br><br>
          </div>
        <div class="row valign-wrapper">            
            <div class="col s3 m3 l3">
                <img class="responsive-img" src="../../resources/multimedia/Logo California Tipog.png">
            </div>
            <div class="col s3 m3 l3 valign-wrapper">
                <img class="responsive-img" src="../../resources/multimedia/Vans logo.png">
            </div>
            <div class="col s3 m3 l3 valign-wrapper">
                <img class="responsive-img" src="../../resources/multimedia/Baker logo.png">
            </div>
            <div class="col s3 m3 l3 valign-wrapper">
                <img class="responsive-img" src="../../resources/multimedia/element-logo-1.png">
            </div>
            <div class="col s3 m3 l3 valign-wrapper">
                <img class="responsive-img" src="../../resources/multimedia/Flip logo.png">
            </div>
        </div>
    </div>    
</section>

<?php
  //Se imprime la plantilla del pie y se envía el nombre del controlador para la página web
  Public_Page::footerTemplate(null,null);
?>