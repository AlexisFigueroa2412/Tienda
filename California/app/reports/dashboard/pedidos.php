<?php
require('../../helpers/report.php');
require('../../models/pedidos.php');

// Se instancia la clase para crear el reporte.
$pdf = new Report;
// Se inicia el reporte con el encabezado del documento.
$pdf->startReport('pedidos Registrados');

// Se instancia el módelo Categorías para obtener los datos.
$pedidos = new pedidos;
// Se verifica si existen registros (categorías) para mostrar, de lo contrario se imprime un mensaje.
if ($dataPedidos = $pedidos->readFacts()) {
    // Se establece un color de relleno para los encabezados.
    $pdf->SetFillColor(225);
    // Se establece la fuente para los encabezados.
    $pdf->SetFont('Arial', 'B', 11);
    // Se imprimen las celdas con los encabezados.
    $pdf->Cell(10, 10, utf8_decode('N°'), 1, 0, 'C', 1);
    $pdf->Cell(100, 10, utf8_decode('Cliente'), 1, 0, 'C', 1);
    $pdf->Cell(40, 10, utf8_decode('Fecha del pedido'), 1, 1, 'C', 1);
   
    // Se establece la fuente para los datos de los productos.
    $pdf->SetFont('Arial', '', 11);
    // Se recorren los registros ($dataPedidos) fila por fila ($rowProducto).
    foreach ($dataPedidos as $rowPedido) {
        // Se imprimen las celdas con los datos de los productos.
        $pdf->Cell(10, 20, utf8_decode($rowPedido['id_pedido']), 1, 0);
        $pdf->Cell(100, 20, $rowPedido['cliente'], 1, 0);
        $pdf->Cell(40, 20, utf8_decode($rowPedido['fecha_pedido']), 1, 1);
       
    }
} else {
    $pdf->Cell(0, 10, utf8_decode('No hay Pedidos que mostrar'), 1, 1);
}

// Se envía el documento al navegador y se llama al método Footer()
$pdf->Output();
?>