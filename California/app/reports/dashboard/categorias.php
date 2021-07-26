<?php
require('../../helpers/report.php');
require('../../models/categorias.php');

// Se instancia la clase para crear el reporte.
$pdf = new Report;
// Se inicia el reporte con el encabezado del documento.
$pdf->startReport('Categorías Registradas');

// Se instancia el módelo Categorías para obtener los datos.
$categoria = new Categorias;
// Se verifica si existen registros (categorías) para mostrar, de lo contrario se imprime un mensaje.
if ($dataProductos = $categoria->readAll()) {
    // Se establece un color de relleno para los encabezados.
    $pdf->SetFillColor(225);
    // Se establece la fuente para los encabezados.
    $pdf->SetFont('Arial', 'B', 11);
    // Se imprimen las celdas con los encabezados.
    $pdf->Cell(93, 10, utf8_decode('N°'), 1, 0, 'C', 1);
    $pdf->Cell(93, 10, utf8_decode('Categoría'), 1, 1, 'C', 1);
    // Se establece la fuente para los datos de los productos.
    $pdf->SetFont('Arial', '', 11);
    // Se recorren los registros ($dataProductos) fila por fila ($rowProducto).
    foreach ($dataProductos as $rowProducto) {
        // Se imprimen las celdas con los datos de los productos.
        $pdf->Cell(93, 10,$rowProducto['id_categoria'], 1, 0);
        $pdf->Cell(93, 10, utf8_decode($rowProducto['categoria']) , 1, 1);
    }
} else {
    $pdf->Cell(0, 10, utf8_decode('No hay productos que mostrar'), 1, 1);
}

// Se envía el documento al navegador y se llama al método Footer()
$pdf->Output();
?>