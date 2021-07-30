<?php
require('../../helpers/report.php');
require('../../models/usuarios.php');

// Se instancia la clase para crear el reporte.
$pdf = new Report;
// Se inicia el reporte con el encabezado del documento.
$pdf->startReport('Usuarios Registrados');

// Se instancia el módelo Categorías para obtener los datos.
$usuarios = new usuarios;
// Se verifica si existen registros (categorías) para mostrar, de lo contrario se imprime un mensaje.
if ($dataUsuarios = $usuarios->readAll()) {
    // Se establece un color de relleno para los encabezados.
    $pdf->SetFillColor(225);
    // Se establece la fuente para los encabezados.
    $pdf->SetFont('Arial', 'B', 11);
    // Se imprimen las celdas con los encabezados.
    $pdf->Cell(10, 10, utf8_decode('N°'), 1, 0, 'C', 1);
    $pdf->Cell(30, 10, utf8_decode('Nombre usuario'), 1, 0, 'C', 1);
    $pdf->Cell(40, 10, utf8_decode('Apellido_Usuario'), 1, 0, 'C', 1);
    $pdf->Cell(65, 10, utf8_decode('Correo usuario'), 1, 0, 'C', 1);
    $pdf->Cell(20, 10, utf8_decode('Alias'), 1, 0, 'C', 1);
    $pdf->Cell(20, 10, utf8_decode('Estado '), 1, 1, 'C', 1);
    // Se establece la fuente para los datos de los productos.
    $pdf->SetFont('Arial', '', 11);
    // Se recorren los registros ($dataUsuarios) fila por fila ($rowProducto).
    foreach ($dataUsuarios as $rowProducto) {
        // Se imprimen las celdas con los datos de los productos.
        $pdf->Cell(10, 20, utf8_decode($rowProducto['id_usuario']), 1, 0);
        $pdf->Cell(30, 20, utf8_decode($rowProducto['nombre_usuario']), 1, 0);
        $pdf->Cell(40, 20, utf8_decode($rowProducto['apellidos_usuario']), 1, 0);
        $pdf->Cell(65, 20, $rowProducto['correo_usuario'], 1, 0);
        $pdf->Cell(20, 20, utf8_decode($rowProducto['alias_usuario']), 1, 0);
       $pdf->Cell(20, 20, utf8_decode($rowProducto['estado_usuario']), 1, 1);
    }
} else {
    $pdf->Cell(0, 10, utf8_decode('No hay usuarios que mostrar'), 1, 1);
}

// Se envía el documento al navegador y se llama al método Footer()
$pdf->Output();
?>