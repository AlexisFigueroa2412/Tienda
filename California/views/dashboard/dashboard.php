<?php
include("../../app/helpers/private_page.php");
Dashboard_Page::headerTemplate('California','California');
Dashboard_Page::controlTime();
?>
<div class="row">
    <h4 class="center-align blue-text" id="greeting"></h4>
</div>

<!-- Se muestran las gráficas de acuerdo con algunos datos disponibles en la base de datos -->
<div class="row">
    <div class="col s12 m6">
        <!-- Se muestra una gráfica de barra con la cantidad de productos por categoría -->
        <canvas id="chart1"></canvas>
    </div>
    <div class="col s12 m6">
        <!-- Se muestra una gráfica de pastel con el porcentaje de productos por categoría -->
        <canvas id="chart2"></canvas>
    </div>
</div>
<div class="row">
    <div class="col s12 m6">
        <!-- Se muestra una gráfica de barra con la cantidad de productos por categoría -->
        <canvas id="chart3"></canvas>
    </div>
    <div class="col s12 m6">
        <!-- Se muestra una gráfica de pastel con el porcentaje de productos por categoría -->
        <canvas id="chart4"></canvas>
    </div>
</div>
<div class="row">
    <div class="col s12 m12">
        <!-- Se muestra una gráfica de barra con la cantidad de productos por categoría -->
        <canvas id="chart5"></canvas>
    </div>
</div>

<!-- Importación del archivo para generar gráficas en tiempo real. Para más información https://www.chartjs.org/ -->
<script type="text/javascript" src="../../resources/js/chart.js"></script>


  
<?php
  //Se imprime la plantilla del pie y se envía el nombre del controlador para la página web
  Dashboard_Page::footerTemplate('main.js');
?>

