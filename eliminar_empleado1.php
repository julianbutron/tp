<html>
<head>
<title> Eliminar Empleado </title>
<link rel="stylesheet" type="text/css" href="estilos\eliminar_empleado.css">
</head>
<body Background="imagenes\fondo.jpg">
<div id="contenedor">
	<div id="cabecera">

	<!-- diseño de cabecera con buscador-->	
	<form ACTION="buscar_empleado.php" METHOD="POST">
	<div class="buscar">
	<input type="text" name="palabra" placeholder="Ingrese Apellido" class="campo_buscar">
	<input type="submit" name="buscador" value="Buscar" class="campo_buscador">	
	</form>	
		<div class="titulo">
		Eliminar
		</div>
		<a href="menu_supervisor.php"><img src="imagenes\cerrar.png" class="imagen_atras"/></a>
	</div> 
	</div>
<!----------------------->

<form ACTION="eliminar_empleado2.php" METHOD="POST">
	<div id="cuerpo">
	<div class="titulos">
	Seleccione ID del Empleado
	</div>
<hr width="80%" align="center">
	<div class="campo">
		<select name="id" class="campo2">
		<option value=""> ID </option>
<?php
	include('conexion_bd.php');
	$consulta ="SELECT id, dni FROM empleado";
	$tabla = mysql_query($consulta);

 while($registro=mysql_fetch_array($tabla))
   echo "<option  value='".$registro["id"]."'>".$registro["id"]." - ".$registro["dni"]."</option>";  
?>	
		</select>
	<input type="submit" value="Eliminar" class="boton">
</div>
</div>
</div>
</form>
</body>
</html>