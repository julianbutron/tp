<html> 
<head> 
<title> Mantenimiento Validar </title> 
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
	if(isset($_POST['id_vehiculo']) && !empty ($_POST['id_vehiculo']) &&
	isset($_POST['fecha']) && !empty ($_POST['fecha']) &&
	isset($_POST['km']) && !empty ($_POST['km']) &&
	isset($_POST['costo']) && !empty ($_POST['costo']) &&
	isset($_POST['repuesto']) && !empty ($_POST['repuesto']))
	{
	$id_mecanico= $_POST['id_mecanico'];
	$mecanico_ext= $_POST['mecanico_ext'];
	mysql_query("INSERT INTO mantenimiento(id_vehiculo, fecha, km, costo, id_mecanico, mecanico_ext, repuesto)
	VALUES ('$_POST[id_vehiculo]', '$_POST[fecha]', '$_POST[km]', '$_POST[costo]', '$id_mecanico', '$mecanico_ext', '$_POST[repuesto]')", $conexion);
	echo "<font color='green'>Datos insertados CORRECTAMENTE</font><br><br>";
	echo "Fecha: ".$_POST['fecha']."<br>".
		"Vehiculo ID: ".$_POST['id_vehiculo']." - Km Recorrido: ".$_POST['km']."<br>".
		"Mecanico Int: ".$_POST['id_mecanico']."<br>".
		"Mecanico Ext: ".$_POST['mecanico_ext']."<br>".
		"Repuestos: ".$_POST['repuesto']."<br>".
		"Importe: ".$_POST['costo'] ;
	}
	else {
	echo "<br><br><font color='red'>AVISO!!</font> Problemas al insertar los datos. <br><br><br><br>";	
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