<html> 
<head> 
<title> Cargar Combustible 2 </title> 
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
	isset($_POST['id_vehiculo']) && !empty ($_POST['id_vehiculo']) &&
	isset($_POST['litros']) && !empty ($_POST['litros']) &&
	isset($_POST['importe']) && !empty ($_POST['importe']))
	{
	$id_coordenadas= $_POST['id_coordenadas'];
	mysql_query("INSERT INTO consumo_combustible(id_chofer, fecha, id_vehiculo, litros, importe, id_coordenadas)
	VALUES ('$_POST[id_chofer]', '$_POST[fecha]', '$_POST[id_vehiculo]', '$_POST[litros]', '$_POST[importe]', '$id_coordenadas')", $conexion);
	echo "<div align='center'><font color='green'> ENVIADO CORRECTAMENTE </font></div><br>";
	echo "Fecha: ".$_POST['fecha']."<br>".
		 "Chofer ID: ".$_POST['id_chofer']."<br>".
		 "Vehiculo ID: ".$_POST['id_vehiculo']."<br>".
		 "Cant Litros: ".$_POST['litros']."<br>".
		 "Importe: $".$_POST['importe']."<br><br>";
	mysql_close($conexion);
	}
	else {
	echo "<br><br><font color='red'>AVISO!!</font> Problemas al insertar los datos.<br><br><br><br>";
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