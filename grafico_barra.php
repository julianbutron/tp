<?php
/* Incluimos la biblioteca jpgraph.php y la parcela jpgraph_line.php ya que realizaremos un grafico de línea*/
include('conexion_bd.php');
include('jpgraph/src/jpgraph.php'); 
include('jpgraph/src/jpgraph_bar.php'); 

// Conecto a la base de datos
	include('conexion_bd.php');
    $consulta = ("SELECT combustible FROM viaje"); 
    $resultado = mysql_query($consulta); 
	
	mysql_close($conexion);
	while ($row = mysql_fetch_array($resultado)){ 
	
//Definiendo datos de la tercera línea
	$promedio[] = $row['combustible'];
	$datay1[]=array_sum($promedio)/count($promedio);  
}
//crear la instancia del objeto graph
	$ancho = 640; $alto = 320;
	$graph = new Graph($ancho, $alto);

//especificar la escala
	$graph->SetScale("textlin");

// Create the bar plots
	$b1plot = new BarPlot($datay1);

// Create the grouped bar plot
	$gbplot = new GroupBarPlot(array($b1plot));
// ...and add it to the graPH
	$graph->Add($gbplot);

	$b1plot->value->Show();
	$b1plot->SetColor("white");
	$b1plot->SetFillColor("#1111cc");
	$b1plot->SetColor("#6495ED");
	$b1plot->SetLegend('Promedio');

	$graph->img->SetMargin(60,80,50,50); 
	$graph->title->Set("Consumo de Combustible por Viaje");

// Display the graph
	$graph->Stroke();
?>