<?php
include("conexion_bd.php");
require('fpdf/fpdf.php');

$pdf = new FPDF('L','mm','A4'); 
$pdf->AddPage(); 
$pdf->SetFont('Arial','B',9); 
$pdf->Cell(10,10,'ADMINISTRADOR', '');
$pdf->Ln(); 
$pdf->SetFillColor(240,150,20);
$pdf->Cell(12,10,'ID', 		  1, 0, 'C', True); 
$pdf->Cell(19,10,'DNI', 	  1, 0, 'C', True); 
$pdf->Cell(20,10,'Fecha Nac', 1, 0, 'C', True); 
$pdf->Cell(34,10,'Nombre', 	  1, 0, 'C', True); 
$pdf->Cell(28,10,'Apellido',  1, 0, 'C', True); 
$pdf->Cell(37,10,'Domicilio', 1, 0, 'C', True); 
$pdf->Cell(26,10,'Localidad', 1, 0, 'C', True); 
$pdf->Cell(30,10,'Provincia', 1, 0, 'C', True); 
$pdf->Cell(10,10,'Lic', 	  1, 0, 'C', True); 
$pdf->Cell(22,10,'Telefono',  1, 0, 'C', True);
$pdf->Cell(14,10,'Id_Rol',  1, 0, 'C', True);
$pdf->Cell(30,10,'usuario',   1, 0, 'C', True); 
$pdf->Ln(); 

	$cadena ="SELECT * FROM empleado WHERE id_cargo= 2";
	$tabla = mysql_query($cadena);

	while ($registro = mysql_fetch_array($tabla)){
$pdf->Cell(12,10,$registro['id'], 1); 
$pdf->Cell(19,10,$registro['dni'] , 1); 
$pdf->Cell(20,10,$registro['fecha_nac'], 1); 
$pdf->Cell(34,10,$registro['nombre'], 1); 
$pdf->Cell(28,10,$registro['apellido'], 1); 
$pdf->Cell(37,10,$registro['domicilio'], 1); 
$pdf->Cell(26,10,$registro['localidad'], 1); 
$pdf->Cell(30,10,$registro['provincia'], 1); 
$pdf->Cell(10,10,$registro['lic'], 1); 
$pdf->Cell(22,10,$registro['telefono'], 1);
$pdf->Cell(14,10,$registro['id_rol'], 1);
$pdf->Cell(30,10,$registro['usuario'], 1);
$pdf->Ln(); 
}
$pdf->Output();
?>