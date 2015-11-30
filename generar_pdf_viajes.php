<?php
include("conexion_bd.php");
require('fpdf/fpdf.php');

$pdf = new FPDF('L','mm','A3'); 
$pdf->AddPage(); 
$pdf->SetFont('Arial','B',8); 
$pdf->Cell(15,10,'VIAJES', '');
$pdf->Ln(); 
$pdf->SetFillColor(240,150,20);
$pdf->Cell(10,10,'Cod.', 		  1, 0, 'C', True); 
$pdf->Cell(30,10,'Fecha Partida', 	  1, 0, 'C', True); 
$pdf->Cell(30,10,'Fecha Llegada', 1, 0, 'C', True); 
$pdf->Cell(15,10,'Id_Cliente', 	  1, 0, 'C', True); 
$pdf->Cell(20,10,'Tipo Carga',  1, 0, 'C', True); 
$pdf->Cell(80,10,'Origen', 1, 0, 'C', True); 
$pdf->Cell(80,10,'Destino', 1, 0, 'C', True); 
$pdf->Cell(17,10,'Id_Vehiculo',  1, 0, 'C', True); 
$pdf->Cell(16,10,'Id_Chofer',  1, 0, 'C', True); 
$pdf->Cell(18,10,'Combustible',  1, 0, 'C', True); 
$pdf->Cell(15,10,'Km.Rec.',  1, 0, 'C', True); 
$pdf->Cell(15,10,'Horas',  1, 0, 'C', True);
$pdf->Ln(); 

	$cadena ="SELECT * FROM viaje";
	$tabla = mysql_query($cadena);

	while ($registro = mysql_fetch_array($tabla)){
$pdf->Cell(10,10,$registro['cod'], 1); 
$pdf->Cell(30,10,$registro['fecha_partida'], 1);
$pdf->Cell(30,10,$registro['fecha_llegada'], 1);
$pdf->Cell(15,10,$registro['id_cliente'] , 1); 
$pdf->Cell(20,10,$registro['tipo_carga'], 1); 
$pdf->Cell(80,10,$registro['domicilio_o'].", ".$registro['ciudad_o'].", ".$registro['provincia_o'].", ".$registro['pais_o'], 1); 
$pdf->Cell(80,10,$registro['domicilio_d'].", ".$registro['ciudad_d'].", ".$registro['provincia_d'].", ".$registro['pais_d'], 1); 
$pdf->Cell(17,10,$registro['id_vehiculo'], 1); 
$pdf->Cell(16,10,$registro['id_chofer'], 1);
$pdf->Cell(18,10,$registro['combustible'], 1);
$pdf->Cell(15,10,$registro['km'], 1);
$pdf->Cell(15,10,$registro['horas'], 1);
$pdf->Ln(); 
}
$pdf->Output();
?>  