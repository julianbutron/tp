<html>
<head>
<title> Modificar Mantenimiento </title>
<!-- Utilizo el mismo estilo modificar empleado 1 -->
<link rel="stylesheet" type="text/css" href="estilos\modificar_empleado1.css">
<script type="text/javascript" src="javascript\validar_fecha.js"></script>
</head>
<body Background="imagenes\fondo.jpg">
<div id="contenedor">
	<div id="cabecera">
	
<!-- diseño de cabecera con buscador-->	
	<form ACTION="buscar_mantenimiento_modificar.php" METHOD="POST">
	<div class="buscar">
	<input type="text" name="palabra" placeholder="YYY-MM-DD" class="campo_buscar" onKeyUp = "this.value=formateafecha(this.value);" >
	<input type="submit" name="buscador" value="Buscar" class="campo_buscador">	
	</form>	
		<div class="titulo">
		Modificar
		</div>
		<a href="menu_admin.php"><img src="imagenes\cerrar.png" class="imagen_atras"/></a>
	</div> 
	</div>
<!----------------------->

	
<form ACTION="modificar_mantenimiento2.php" METHOD="POST">
	<div id="cuerpo">
	<div class="titulos">
	Seleccione C&oacute;digo de mantenimiento
	</div>
<hr width="80%" align="center">
	<div class="campo">
		<select name="cod" class="campo2">
		<option value=""> C&oacute;d. -  Fecha </option>
<?php
	include('conexion_bd.php');
	$consulta ="SELECT * FROM mantenimiento ORDER BY cod DESC";
	$tabla = mysql_query($consulta);

	while($registro=mysql_fetch_array($tabla))
	echo "<option  value='".$registro["cod"]."'>".$registro["cod"]."__ ".$registro["fecha"]."</option>";  
?>	
		</select>
<input type="submit" name="siguiente" value="Siguiente  >>" class="boton_continuar">
</div>
</div>
</div>
</form>
</body>
</html>