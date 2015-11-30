<html>
<head>
<title> Eliminar Cliente </title>
<link rel="stylesheet" type="text/css" href="estilos\eliminar_empleado.css">
</head>
<body Background="imagenes\fondo.jpg">
<div id="contenedor">
	<div id="cabecera">
	
<!-- diseño de cabecera con buscador-->	
	<form ACTION="buscar_cliente_eliminar.php" METHOD="POST">
	<div class="buscar">
	<input type="text" name="palabra" placeholder="Razon Social" class="campo_buscar">
	<input type="submit" name="buscador" value="Buscar" class="campo_buscador">	
	</form>	
		<div class="titulo">
		Eliminar
		</div>
		<a href="menu_admin.php"><img src="imagenes\cerrar.png" class="imagen_atras"/></a>
	</div> 
	</div>
<!----------------------->
	
<form ACTION="eliminar_cliente2.php" METHOD="POST">
	<div id="cuerpo">
	<div class="titulos">
	Seleccione ID del cliente
	</div>
<hr width="80%" align="center">
	<div class="campo">
		<select name="id" class="campo2">
		<option value=""> ID - Razon Social </option>
	
<?php
	include('conexion_bd.php');
	$consulta ="SELECT id, rs FROM cliente";
	$tabla = mysql_query($consulta);

	while($registro=mysql_fetch_array($tabla))
	echo "<option  value='".$registro["id"]."'>".$registro["id"]." - ".$registro["rs"]."</option>";  
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