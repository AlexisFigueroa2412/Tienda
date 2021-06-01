<?php
include("../../app/helpers/private_page.php");
Dashboard_Page::headerTemplate('California');
?>
<section>
<div class="container Texto">
  <div class="row">
    <div class="col s12 m12 l12">
      <h1>Reportes</h1><br><br>
      <h6>Ejemplo de reporte que pronto habrá acá</h6>
    </div>
    <div class="col s12 m12 l12">
      <img src="../../resources/multimedia/reporte.png" alt="">
    </div>
  </div>
</div>
</section>

<?php
  //Se imprime la plantilla del pie y se envía el nombre del controlador para la página web
  Dashboard_Page::footerTemplate();
?>

