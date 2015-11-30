<html>
<head>
<title> Eliminar veh&iacute;culo </title>
<!--Utiliza el mismo estilo eliminar empleado -->
<link rel="stylesheet" type="text/css" href="estilos\eliminar_empleado.css"> 
</head>
<body Background="imagenes\fondo.jpg">
<div id="contenedor">
	<div id="cabecera">
	
<!-- diseño de cabecera con buscador-->	
	<form ACTION="buscar_vehiculo_eliminar.php" METHOD="POST">
	<div class="buscar">
	<input type="text" name="palabra" placeholder="Ingrese Patente" maxlength="7" class="campo_buscar">
	<input type="submit" name="buscador" value="Buscar" class="campo_buscador">	
	</form>	
		<div class="titulo">
		Eliminar
		</div>
		<a href="menu_admin.php"><img src="imagenes\cerrar.png" class="imagen_atras"/></a>
	</div> 
	</div>
<!----------------------->

	
<form ACTION="eliminar_vehiculo2.php" METHOD="POST">
	<div id="cuerpo">
	<div class="titulos">
	Seleccione ID del Veh&iacute;culo
	</div>
<hr width="80%" align="center">
	<div class="campo">
		<select name="id" class="campo2">
		<option value=""> ID - Patente </option>
	
<?php
	include('conexion_bd.php');
	$consulta ="SELECT id, patente FROM vehiculo";
	$tabla = mysql_query($consulta);

	while($registro=mysql_fetch_array($tabla))
	echo "<option  value='".$registro["id"]."'>".$registro["id"]." - ".$registro["patente"]."</option>";  
	mysql_close($conexion);
?>
		</select>
	<div class="sesion">
	<input type="submit" value="Eliminar" class="boton">
	</div>

</div>
</div>
</div>
</form>
</body>
</html>