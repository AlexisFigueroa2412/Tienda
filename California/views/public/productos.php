<?php
include("../../app/helpers/public_page.php");
Public_Page::headerTemplate('california','california');
Public_Page::controlTime();
?>
<head class="Texto">
    <div class="container">
        <div class="row">
            <h1>Catálogo</h1><br><br>
            <h5>Da un vistazo a nuestros productos</h5><br><br>
        </div>
    </div>
</head>
<!-- Aca se cargan todos los productos -->
<section>
    <div class="container Texto">
        <div class="row">
            <div id="tbody-rows">
                <div>
                </div>
            </div>
</section>

<?php
  //Se imprime la plantilla del pie y se envía el nombre del controlador para la página web
  Public_Page::footerTemplate("productos.js",null);
?>