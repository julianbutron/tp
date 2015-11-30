<?php
include("conexion_bd.php");
require('fpdf/fpdf.php');

$pdf = new FPDF('P','mm','A4'); 
$pdf->AddPage(); 
$pdf->SetFont('Arial','B',10); 
$pdf->Cell(10,10,'ALARMAS', '');
$pdf->Ln(); 
$pdf->SetFillColor(240,150,20);
$pdf->Cell(12,10,'ID', 		  1, 0, 'C', True); 
$pdf->Cell(20,10,'ID_Chofer', 	  1, 0, 'C', True); 
$pdf->Cell(25,10,'Fecha', 1, 0, 'C', True); 
$pdf->Cell(28,10,'ID_Vehiculo',  1, 0, 'C', True); 
$pdf->Cell(102,10,'Detalle',   1, 0, 'C', True); 
$pdf->Ln(); 

	$cadena ="SELECT * FROM alarmas";
	$tabla = mysql_query($cadena);

	while ($registro = mysql_fetch_array($tabla)){
$pdf->Cell(12,10,$registro['id'], 1); 
$pdf->Cell(20,10,$registro['id_chofer'] , 1); 
$pdf->Cell(25,10,$registro['dia']."/".$registro['mes']."/".$registro['anio'], 1); 
$pdf->Cell(28,10,$registro['id_vehiculo'], 1);
$pdf->Cell(102,10,$registro['detalle'], 1);
$pdf->Ln(); 
}
$pdf->Output();
?>