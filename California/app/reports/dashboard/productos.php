<?php
require('../../helpers/report.php');
require('../../models/productos.php');

// Se instancia la clase para crear el reporte.
$pdf = new Report;
// Se inicia el reporte con el encabezado del documento.
$pdf->startReport('Productos Registrados');

// Se instancia el módelo Categorías para obtener los datos.
$categoria = new Productos;
// Se verifica si existen registros (categorías) para mostrar, de lo contrario se imprime un mensaje.
if ($dataProductos = $categoria->readAll()) {
    // Se establece un color de relleno para los encabezados.
    $pdf->SetFillColor(225);
    // Se establece la fuente para los encabezados.
    $pdf->SetFont('Arial', 'B', 11);
    // Se imprimen las celdas con los encabezados.
    $pdf->Cell(30, 10, utf8_decode('Nombre'), 1, 0, 'C', 1);
    $pdf->Cell(26, 10, utf8_decode('Precio (US$)'), 1, 0, 'C', 1);
    $pdf->Cell(55, 10, utf8_decode('Descripción'), 1, 0, 'C', 1);
    $pdf->Cell(25, 10, utf8_decode('Cantidad'), 1, 0, 'C', 1);
    $pdf->Cell(25, 10, utf8_decode('Marca'), 1, 0, 'C', 1);
    $pdf->Cell(25, 10, utf8_decode('Tipo'), 1, 1, 'C', 1);
    // Se establece la fuente para los datos de los productos.
    $pdf->SetFont('Arial', '', 11);
    // Se recorren los registros ($dataProductos) fila por fila ($rowProducto).
    foreach ($dataProductos as $rowProducto) {
        // Se imprimen las celdas con los datos de los productos.
        $pdf->Cell(30, 20, utf8_decode($rowProducto['nombre_producto']), 1, 0);
        $pdf->Cell(26, 20, $rowProducto['precio_producto'], 1, 0);
        $pdf->Cell(55, 20, $rowProducto['descripcion_producto'], 1, 0);
        $pdf->Cell(25, 20, $rowProducto['cantidad_total'], 1, 0);
        $pdf->Cell(25, 20, $rowProducto['marca_producto'], 1, 0);
        $pdf->Cell(25, 20, $rowProducto['categoria'], 1, 1);
    }
} else {
    $pdf->Cell(0, 10, utf8_decode('No hay productos que mostrar'), 1, 1);
}

// Se envía el documento al navegador y se llama al método Footer()
$pdf->Output();
?>