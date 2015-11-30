<?php
include("conexion_bd.php");
require('fpdf/fpdf.php');

$pdf = new FPDF('L','mm','A4'); 
$pdf->AddPage(); 
$pdf->SetFont('Arial','B',11); 
$pdf->Cell(15,10,'MANTENIMIENTOS', '');
$pdf->Ln(); 
$pdf->SetFillColor(240,150,20);
$pdf->Cell(15,10,'Cod.', 		  1, 0, 'C', True); 
$pdf->Cell(22,10,'Fecha', 	  1, 0, 'C', True); 
$pdf->Cell(35,10,'Id_Vehiculo', 1, 0, 'C', True); 
$pdf->Cell(20,10,'Km Rec.', 	  1, 0, 'C', True); 
$pdf->Cell(35,10,'Id_Mecanico',  1, 0, 'C', True); 
$pdf->Cell(30,10,'Mecanico Ext.', 1, 0, 'C', True); 
$pdf->Cell(80,10,'Respuesto', 1, 0, 'C', True); 
$pdf->Cell(27,10,'Importe', 	  1, 0, 'C', True); 
$pdf->Ln(); 

	$cadena ="SELECT * FROM mantenimiento";
	$tabla = mysql_query($cadena);

	while ($registro = mysql_fetch_array($tabla)){
$pdf->Cell(15,10,$registro['cod'], 1); 
$pdf->Cell(22,10,$registro['fecha'], 1); 
$pdf->Cell(35,10,$registro['id_vehiculo'] , 1); 
$pdf->Cell(20,10,$registro['km'], 1); 
$pdf->Cell(35,10,$registro['id_mecanico'], 1); 
$pdf->Cell(30,10,$registro['mecanico_ext'], 1); 
$pdf->Cell(80,10,$registro['repuesto'], 1); 
$pdf->Cell(27,10,"$".$registro['costo'], 1); 

$pdf->Ln(); 
}
$pdf->Output();
?>