<?php
require('../../helpers/report.php');
require('../../models/pedidos.php');

// Se instancia el módelo Categorias para procesar los datos.
$categoria = new Pedidos;
// Se verifica si la categoría del parametro existe, de lo contrario se direcciona a la página web de origen.
if ($rowCategoria = $categoria->readFact()) {
    // Se instancia la clase para crear el reporte.
    $pdf = new Report;
    // Se inicia el reporte con el encabezado del documento.
    $pdf->startReport('Factura N° '.$rowCategoria['id_pedido']);
    $pdf->Cell(0, 10, utf8_decode($rowCategoria['cliente']), 0, 1, 'C');
    $pdf->Cell(0, 10, utf8_decode($rowCategoria['fecha_pedido']), 0, 1, 'C');

    if ($categoria->setIdPedido($rowCategoria['id_pedido'])) {
        // Se verifica si existen registros (productos) para mostrar, de lo contrario se imprime un mensaje.
        if ($dataProductos = $categoria->readCart()) {
            $pdf->SetFont('Arial', '', 10);
            // Se agrega un salto de línea para mostrar el contenido principal del documento.
            $pdf->Ln(10);
            // Se establece un color de relleno para los encabezados.
            $pdf->SetFillColor(225);
            // Se establece la fuente para los encabezados.
            $pdf->SetFont('Arial', 'B', 11);
            // Se imprimen las celdas con los encabezados.
            $pdf->Cell(30, 10, utf8_decode('Producto'), 1, 0, 'C', 1);
            $pdf->Cell(26, 10, utf8_decode('Precio (US$)'), 1, 0, 'C', 1);
            $pdf->Cell(25, 10, utf8_decode('Cantidad'), 1, 1, 'C', 1);
            // Se establece la fuente para los datos de los productos.
            $pdf->SetFont('Arial', '', 11);
            // Se recorren los registros ($dataProductos) fila por fila ($rowProducto).
            foreach ($dataProductos as $rowProducto) {
                // Se imprimen las celdas con los datos de los productos.
                $pdf->Cell(30, 20, utf8_decode($rowProducto['nombre_producto']), 1, 0);
                $pdf->Cell(26, 20, $rowProducto['precio_producto'], 1, 0);
                $pdf->Cell(25, 20, $rowProducto['cantidad_productos'], 1, 1);
            }
        } else {
            $pdf->Cell(0, 10, utf8_decode('No hay productos para esta categoría'), 1, 1);
        }
    } else {
        $pdf->Cell(0, 10, utf8_decode('No se encontraron registros en la factura'), 1, 1);
    }
    // Se envía el documento al navegador y se llama al método Footer()
    $pdf->Output();
} else {
    header('location: ../../../views/dashboard/categorias.php');
}
?>