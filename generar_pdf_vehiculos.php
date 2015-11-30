<?php
include("conexion_bd.php");
require('fpdf/fpdf.php');

$pdf = new FPDF('P','mm','A4'); 
$pdf->AddPage(); 
$pdf->SetFont('Arial','B',11); 
$pdf->Cell(15,10,'VEHICULOS', '');
$pdf->Ln(); 
$pdf->SetFillColor(240,150,20);
$pdf->Cell(15,10,'ID', 		  1, 0, 'C', True); 
$pdf->Cell(30,10,'Patente', 	  1, 0, 'C', True); 
$pdf->Cell(40,10,'Chasis', 1, 0, 'C', True); 
$pdf->Cell(35,10,'Marca', 	  1, 0, 'C', True); 
$pdf->Cell(35,10,'Motor',  1, 0, 'C', True); 
$pdf->Cell(32,10,'Ano Fabricacion', 1, 0, 'C', True); 
$pdf->Ln(); 

	$cadena ="SELECT * FROM vehiculo";
	$tabla = mysql_query($cadena);

	while ($registro = mysql_fetch_array($tabla)){
$pdf->Cell(15,10,$registro['id'], 1); 
$pdf->Cell(30,10,$registro['patente'] , 1);  
$pdf->Cell(40,10,$registro['chasis'], 1); 
$pdf->Cell(35,10,$registro['marca'], 1); 
$pdf->Cell(35,10,$registro['motor'], 1); 
$pdf->Cell(32,10,$registro['fabricacion'], 1); 
$pdf->Ln(); 
}
$pdf->Output();
?>