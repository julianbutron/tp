<html> 
<head> 
<title> Alta alarma 2 </title> 
<link rel="stylesheet" type="text/css" href="estilos\aviso.css">
</head> 
<body Background="imagenes\fondo.jpg">
<div id="contenedor">
	<div id="cabecera">
	</div>
	<div id="cuerpo">
	<div class="letras_aviso">
<?php
include("conexion_bd.php");
	if(isset($_POST['id_chofer']) && !empty ($_POST['id_chofer']) &&
	isset($_POST['fecha']) && !empty ($_POST['fecha']) &&
	isset($_POST['hora']) && !empty ($_POST['hora']) &&
	isset($_POST['id_vehiculo']) && !empty ($_POST['id_vehiculo']) &&
	isset($_POST['km_rec']) && !empty ($_POST['km_rec']))
	{
	$fecha_hora = $_POST['fecha']." ".$_POST['hora'];
	mysql_query("INSERT INTO alarmas(id_chofer, fecha, id_vehiculo, km_rec)
	VALUES ('$_POST[id_chofer]', '$fecha_hora', '$_POST[id_vehiculo]', '$_POST[km_rec]')", $conexion);
	echo "<br><font color='green'>Datos insertados CORRECTAMENTE</font><br><br>";
	echo "Fecha: ".$fecha_hora."<br>".
		 "Chofer ID: ".$_POST['id_chofer']."<br>".
		 "Vehiculo ID: ".$_POST['id_vehiculo']."<br>".
		 "KM Recorridos: ".$_POST['km_rec']."<br><br>";
	mysql_close($conexion);
	}
	else {
	echo "<br><font color='red'>AVISO!!</font> Problemas al insertar los datos.<br><br><br>";
	}
?>
	<div class="sesion">
	<a href="menu_usuario.php"><input type="submit" value="Finalizar" class="boton_finalizar_empleado"></a>
	</div>	
</div>
</div>
</div>
</body> 
</html>