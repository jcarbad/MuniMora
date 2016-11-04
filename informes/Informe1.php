<?php
require_once('../lib/fpdf.php') ;
	//Cell(ancho,alto,texto,borde,salto de linea,alinieacion de texto);
	$pdf =new FPDF();
	$y_axis_initial=25;
	$pdf->AddPage();
	$pdf ->SetFont('Arial','B','12');
	$imagen="../img/logo_login.png";
	$pdf->Cell(19,16,$pdf ->Image($imagen,$pdf->GetX(),$pdf->GetY(),40),0,1,'C');
	$pdf->Cell(190,6,'Municipalidad de Mora',0,1,'C');
	$pdf->Cell(190,6,'Informe: Usuarios Registrados',0,1,'C');
	$pdf->Ln(30);
	
	$pdf->Cell(190,6,'texto',1,0,'C');
	$pdf->Output();//mostrar el informe
?>