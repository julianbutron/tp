<html> 
<head> 
<title> Agregar viaje 2 </title> 
<link rel="stylesheet" type="text/css" href="estilos\aviso_viaje.css">
</head> 
<body Background="imagenes\fondo.jpg">
<div id="contenedor">
	<div id="cabecera">
	</div>
	<div id="cuerpo">
	<div class="letras_aviso">
<?php
include("conexion_bd.php");
	if(isset($_POST['fecha_partida']) && !empty ($_POST['fecha_partida']) &&
	isset($_POST['fecha_llegada']) && !empty ($_POST['fecha_llegada']) &&
	isset($_POST['hora_partida']) && !empty ($_POST['hora_partida']) &&
	isset($_POST['hora_llegada']) && !empty ($_POST['hora_llegada']) &&
	isset($_POST['id_cliente']) && !empty ($_POST['id_cliente']) &&
	isset($_POST['tipo_carga']) && !empty ($_POST['tipo_carga']) &&
	isset($_POST['domicilio_o']) && !empty ($_POST['domicilio_o']) &&
	isset($_POST['ciudad_o']) && !empty ($_POST['ciudad_o']) &&
	isset($_POST['provincia_o']) && !empty ($_POST['provincia_o']) &&
	isset($_POST['pais_o']) && !empty ($_POST['pais_o']) &&
	isset($_POST['domicilio_d']) && !empty ($_POST['domicilio_d']) &&
	isset($_POST['ciudad_d']) && !empty ($_POST['ciudad_d']) &&
	isset($_POST['provincia_d']) && !empty ($_POST['provincia_d']) &&
	isset($_POST['pais_d']) && !empty ($_POST['pais_d']) &&
	isset($_POST['id_vehiculo']) && !empty ($_POST['id_vehiculo']) &&
	isset($_POST['id_chofer']) && !empty ($_POST['id_chofer']) &&
	isset($_POST['combustible']) && !empty ($_POST['combustible']) &&
	isset($_POST['km']) && !empty ($_POST['km']) &&
	isset($_POST['horas']) && !empty ($_POST['horas']))
	{
	$fecha_partida_hora = $_POST['fecha_partida']." ".$_POST['hora_partida'];
	$fecha_llegada_hora = $_POST['fecha_llegada']." ".$_POST['hora_llegada'];
	
	mysql_query("INSERT INTO viaje(fecha_partida, fecha_llegada, id_cliente, tipo_carga, domicilio_o, ciudad_o, provincia_o, pais_o, domicilio_d, ciudad_d, provincia_d, pais_d, id_vehiculo, id_chofer, combustible, km, horas)
	VALUES ('$fecha_partida_hora', '$fecha_llegada_hora', '$_POST[id_cliente]', '$_POST[tipo_carga]', '$_POST[domicilio_o]', '$_POST[ciudad_o]', '$_POST[provincia_o]', '$_POST[pais_o]', '$_POST[domicilio_d]', '$_POST[ciudad_d]', '$_POST[provincia_d]', '$_POST[pais_d]', '$_POST[id_vehiculo]', '$_POST[id_chofer]', '$_POST[combustible]', '$_POST[km]', '$_POST[horas]')", $conexion);
	echo "<font color='green'>Datos insertados CORRECTAMENTE</font><br><br>";
	echo "Fecha Partida: ".$fecha_partida_hora."<br>".
		 "Fecha Partida: ".$fecha_llegada_hora."<br>".
		 " Cliente: ".$_POST['id_cliente']." - "." Tipo Carga: ".$_POST['tipo_carga']."<br>".
		 "Origen: ".$_POST['domicilio_o'].", ".$_POST['ciudad_o'].", ".$_POST['provincia_o'].", ".$_POST['pais_o']."<br>".
		 "Destino: ".$_POST['domicilio_d'].", ".$_POST['ciudad_d'].", ".$_POST['provincia_d'].", ".$_POST['pais_d']."<br>".
		 "Vehiculo ID: ".$_POST['id_vehiculo']." - "."Chofer ID: ".$_POST['id_chofer']."<br>".
		 "Combustible: ".$_POST['combustible']." - KM: ".$_POST['km']." - "."Cant Horas: ".$_POST['horas'];
	mysql_close($conexion);
	}
	else {
	echo "<br><br><div align='center'><font color='red'>AVISO!!</font> No ha ingresado correctamente los datos.</div><br><br><br>";
	}
?>
	<div class="sesion">
	<a href="menu_admin.php"><input type="submit" value="Finalizar" class="boton_finalizar_empleado"></a>
	</div>	
</div>
</div>
</div>
</body> 
</html>