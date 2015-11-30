<html> 
<head> 
<title> Modificar Viaje 3 </title> 
<link rel="stylesheet" type="text/css" href="estilos\aviso_viaje.css">
</head> 
<body Background="imagenes\fondo.jpg">
<div id="contenedor">
	<div id="cabecera">
	</div>
	<div id="cuerpo">
	<div class="letras_aviso">
<?php 
	if(isset($_POST['cod']) && !empty($_POST['cod'])){
	$cod=$_POST['cod'];
	$fecha_partida=$_POST['fecha_partida'];
	$hora_partida=$_POST['hora_partida'];
	$fecha_llegada=$_POST['fecha_llegada'];
	$fecha_llegada=$_POST['fecha_llegada'];
	$hora_llegada=$_POST['hora_llegada'];
	$id_cliente=$_POST['id_cliente'];
	$tipo_carga=$_POST['tipo_carga'];
	$domicilio_o=$_POST['domicilio_o'];
	$ciudad_o=$_POST['ciudad_o'];
	$provincia_o=$_POST['provincia_o'];
	$pais_o=$_POST['pais_o'];
	$domicilio_d=$_POST['domicilio_d'];
	$ciudad_d=$_POST['ciudad_d'];
	$provincia_d=$_POST['provincia_d'];
	$pais_d=$_POST['pais_d'];
	$id_vehiculo=$_POST['id_vehiculo'];
	$id_chofer=$_POST['id_chofer'];
	$combustible=$_POST['combustible'];
	$km=$_POST['km'];
	$horas=$_POST['horas'];
	
	$fecha_partida_hora = $_POST['fecha_partida']." ".$_POST['hora_partida'];
	$fecha_llegada_hora = $_POST['fecha_llegada']." ".$_POST['hora_llegada'];
	include('conexion_bd.php');
	$consulta=	"UPDATE viaje
				SET fecha_partida='$fecha_partida_hora', fecha_llegada='$fecha_llegada_hora', id_cliente='$id_cliente', tipo_carga='$tipo_carga', domicilio_o='$domicilio_o', ciudad_o='$ciudad_o', provincia_o='$provincia_o', pais_o='$pais_o', domicilio_d='$domicilio_d', ciudad_d='$ciudad_d', provincia_d='$provincia_d', pais_d='$pais_d', id_vehiculo='$id_vehiculo', id_chofer='$id_chofer', combustible='$combustible', km='$km', horas='$horas'	
				WHERE cod='$cod'"; 			
	mysql_query($consulta); 
	
	echo "<div align='center'><font color='green'>DATOS ACTUALIZADOS CORRECTAMENTE</font></div>";
	echo "C&oacute;digo: ".$cod."<br>".
		"Fecha Partida: ".$fecha_partida_hora."<br>".
		"Fecha Llegada: ".$fecha_llegada_hora."<br>".
		"Cliente: ".$id_cliente." - "." Tipo Carga: ".$tipo_carga."<br>".
		"Origen: ".$domicilio_o.", ".$ciudad_o.", ".$provincia_o.", ".$pais_o."<br>".
		"Destino: ".$_POST['domicilio_d'].", ".$ciudad_d.", ".$provincia_d.", ".$pais_d."<br>".
		"Vehiculo ID: ".$id_vehiculo." - "."Chofer ID: ".$id_chofer."<br>".
		"Combustible: ".$combustible." - KM: ".$km." - "."Cant Horas: ".$horas;
	mysql_close($conexion);
	}
	
	else{		
	echo "<font color='red'>AVISO!</font> No se han modificado los registros";
	}
?> 
	<div class="sesion">
	<a href="menu_admin.php"><input type="submit" value="Finalizar" class="boton_finalizar"></a>
	</div>	
</div>
</div>
</div>
</body> 
</html>