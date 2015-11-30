<html>
<head>
<title> Eliminar Veh&iacute;culo 2 </title>
<!--Utiliza el mismo estilo eliminar empleado -->
<link rel="stylesheet" type="text/css" href="estilos\eliminar_empleado.css">
</head>
<body Background="imagenes\fondo.jpg">
<div id="contenedor">
	<div id="cabecera">
	</div>
<div id="cuerpo">
<?php
//Conexion con la bd
include('conexion_bd.php');

//Creamos la sentencia SQL y la ejecutamos
$consulta= mysql_query("SELECT id FROM vehiculo WHERE id = '$_POST[id]'", $conexion);

//Creamos una variable que almacena en un array la base de una tabla y ejecutamos una 2da consulta
//fetch_array permite traer los datos de una forma mas ordenada de las tablas de una bd
if($consulta2= mysql_fetch_array($consulta)){
	
	mysql_query("DELETE FROM vehiculo WHERE id = '$_POST[id]'" , $conexion);
	echo '<div class="titulos_resultado"> Los registros han sido eliminados </div>';
	
	mysql_close($conexion);
	}
	else{
	echo '<div class="titulos_resultado">!No hay registros para listar! </div>';
	}
?>
	<div class="sesion">
	<a href="ABM_vehiculo.php"><input type="submit" value="Volver" class="boton_volver"></a>
	</div>
	</div>
</div>
</body>
</html>