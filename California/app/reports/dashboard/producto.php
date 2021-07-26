<?php
// Se verifica si existe el parámetro id en la url, de lo contrario se direcciona a la página web de origen.
if (isset($_GET['id'])) {
    
    require('../../helpers/report.php');
    require('../../models/productos.php');

    // Se instancia la clase para crear el reporte.
    $pdf = new Report;
    // Se inicia el reporte con el encabezado del documento.
    $pdf->startReport('Registro del producto');

    // Se instancia el módelo Categorías para obtener los datos.
    $categoria = new Productos;

    // Se verifica si el parámetro es un valor correcto, de lo contrario se direcciona a la página web de origen.
    if ($categoria->setId($_GET['id'])) {
        // Se verifica si la categoría del parametro existe, de lo contrario se direcciona a la página web de origen.
        if ($dataProductos = $categoria->readOne()) {
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
            $pdf->Cell(30, 20, utf8_decode($dataProductos['nombre_producto']), 1, 0);
                $pdf->Cell(26, 20, $dataProductos['precio_producto'], 1, 0);
                $pdf->Cell(55, 20, utf8_decode($dataProductos['descripcion_producto']), 1, 0);
                $pdf->Cell(25, 20, $dataProductos['cantidad_total'], 1, 0);
                $pdf->Cell(25, 20, utf8_decode($dataProductos['marca_producto']), 1, 0);
               $pdf->Cell(25, 20, utf8_decode($dataProductos['categoria']), 1, 1);
            // Se envía el documento al navegador y se llama al método Footer()
            $pdf->Output();
        } else {
            header('location: ../../../views/dashboard/inventario.php');
        }
    } else {
        header('location: ../../../views/dashboard/inventario.php');
    }
} else {
    header('location: ../../../views/dashboard/inventario.php');
}
?>