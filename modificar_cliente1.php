<html>
<head>
<title> Modificar Cliente 1 </title>
<!-- Utilizo el mismo estilo que modificar empleado 1 -->
<link rel="stylesheet" type="text/css" href="estilos\modificar_empleado1.css">
</head>
<body Background="imagenes\fondo.jpg">
<div id="contenedor">
	<div id="cabecera">
	
<!-- diseño de cabecera con buscador-->	
	<form ACTION="buscar_cliente.php" METHOD="POST">
	<div class="buscar">
	<input type="text" name="palabra" placeholder="Razon Social" class="campo_buscar">
	<input type="submit" name="buscador" value="Buscar" class="campo_buscador">	
	</form>	
		<div class="titulo">
		Modificar
		</div>
		<a href="menu_admin.php"><img src="imagenes\cerrar.png" class="imagen_atras"/></a>
	</div> 
	</div>
<!----------------------->

<form ACTION= "modificar_cliente2.php" METHOD="POST">
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
<input type="submit" name="siguiente" value="Siguiente  >>" class="boton_continuar">
</div>
</div>
</div>
</form>
</body>
</html>