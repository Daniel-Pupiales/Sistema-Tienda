<?php
require_once "plantilla.php";
require_once "servicios.php";

$resultado = Servicios::mostrar();
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();

// titulo del informe
$pdf->SetFont("Arial", "B", 16);
$pdf->SetTextColor(0, 51, 102);
$pdf->Cell(0, 10, "INFORME DE CLIENTES Y VENTAS", 0, 1, "C");
$pdf->Ln(5);

// Encabezados de tabla
$pdf->SetFillColor(0, 51, 102);
$pdf->SetTextColor(255, 255, 255);
$pdf->SetFont("Arial", "B", 10);
$pdf->Cell(15, 8, "ID", 1, 0, "C", true);
$pdf->Cell(50, 8, "Nombre Cliente", 1, 0, "C", true);
$pdf->Cell(30, 8, "Cedula", 1, 0, "C", true);
$pdf->Cell(50, 8, "Direccion", 1, 0, "C", true);
$pdf->Cell(45, 8, "Total ($)", 1, 1, "C", true);

// Cuerpo del reporte con colores alternos
$pdf->SetFont("Arial", "", 10);
$pdf->SetTextColor(0);
$fill = false;
$sumaTotal = 0;

while ($fila = mysqli_fetch_array($resultado)) {
  $pdf->SetFillColor(240, 240, 240); 
  $pdf->Cell(15, 8, $fila["codigo_cliente"], 1, 0, "C", $fill);
  $pdf->Cell(50, 8, utf8_decode($fila["nombre_cliente"]), 1, 0, "L", $fill);
  $pdf->Cell(30, 8, $fila["cedula_cliente"], 1, 0, "C", $fill);
  $pdf->Cell(50, 8, utf8_decode($fila["direccion_cliente"]), 1, 0, "L", $fill);
  $pdf->Cell(45, 8, number_format($fila["total_cliente"], 2), 1, 1, "R", $fill);

  $sumaTotal += $fila["total_cliente"];
  $fill = !$fill;
}

$pdf->Ln(5);
$pdf->SetFont("Arial", "B", 11);
$pdf->Cell(145, 8, "TOTAL ACUMULADO", 1, 0, "R");
$pdf->Cell(45, 8, "$ " . number_format($sumaTotal, 2), 1, 1, "R", true);

ob_end_clean();
$pdf->Output("I", "Reporte_Empresarial.pdf");
