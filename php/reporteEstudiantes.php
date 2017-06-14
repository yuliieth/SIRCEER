<?php 
require '../fpdf/fpdf.php';
$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial','B',16);
#Definimos las medidas para lineas de la celda
$pdf->Cell(100,10,'¡Hola, Mundo!',1);
$pdf->ln();
$pdf->Cell(60,10,'Hecho con FPDF.',1,0,'C');
#para mostrar la ventana de descarga
$pdf->Output('mipdf.pdf','d');

 ?>