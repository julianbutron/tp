<?php
/* Incluimos la biblioteca jpgraph.php y la parcela Line jpgraph_line.php ya que realizaremos un grafico de línea*/
include ('jpgraph/src/jpgraph.php'); 
include ('jpgraph/src/jpgraph_line.php'); 

// Conecto a la base de datos
	include('conexion_bd.php');
    $consulta = ("SELECT * FROM mantenimiento "); 
    $resultado = mysql_query($consulta); 
	
	mysql_close($conexion);
	while ($row = mysql_fetch_array($resultado)){ 

// Recibiendo datos de campo km para la variable Y
	
	$datay1[] = $row['km'];

// Recibiendo datos de la campo fecha para la variable X

	$fecha[] = $row['fecha'];
}
// Definir ancho y alto del grafico
	$ancho = 640; $alto = 370;

//crear la instancia del objeto graph definiendo ancho alto y tipo de escala
	$graph = new Graph($ancho, $alto);

//Especificar la escala de valores de los ejes 
	$graph->SetScale("textlin");

//Crear curva
	$lineplot = new LinePlot($datay1); 
	$lineplot->SetColor("black"); 

	$graph->img->SetMargin(60,80,50,50); 
	$graph->img->SetAntiAliasing(false);
	$graph->title->Set('Uso de Vehiculos');
	$graph->SetBox(false);

	$graph->img->SetAntiAliasing();
	$graph->yaxis->HideZeroLabel();
	$graph->yaxis->HideLine(false);
	$graph->yaxis->HideTicks(false,false);

	$graph->xgrid->Show();
	$graph->xaxis->title->Set("Fuera de Servicio");
	$graph->xgrid->SetLineStyle("solid");
	$graph->xaxis->SetTickLabels($fecha);
	$graph->xgrid->SetColor('#E3E3E3');

// Crear la linea
	$p1 = new LinePlot($datay1);
	$graph->Add($p1);
	$p1->value->Show();
	$p1->SetColor("#6495ED");
	$p1->SetLegend('Km Recorridos');

	$graph->legend->SetFrameWeight(1);

// Generar el grafico desde el php
	$graph->Stroke();
?>
