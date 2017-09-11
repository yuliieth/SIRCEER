<?php 
require '../fpdf/fpdf.php';
$fpdf = new FPDF();
$fpdf->AddPage();
$fpdf->SetFont('Arial','B',16);
#Imprime una celda
$fpdf->Cell(40,40,'!Hola mundo¡');
$fpdf->Output();
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Prueba FPDF</title>
</head>
<body>
	
</body>
</html>