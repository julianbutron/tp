<html>
<head>
<title> Eliminar Mantenimiento </title>
<!--Utiliza el mismo estilo eliminar empleado -->
<link rel="stylesheet" type="text/css" href="estilos\eliminar_empleado.css"> 
<script type="text/javascript" src="javascript\validar_fecha.js"></script>
</head>
<body Background="imagenes\fondo.jpg">
<div id="contenedor">
	<div id="cabecera">
	
<!-- diseño de cabecera con buscador-->	
	<form ACTION="buscar_mantenimiento_eliminar.php" METHOD="POST">
	<div class="buscar">
	<input type="text" name="palabra" placeholder="YYY-MM-DD" class="campo_buscar" onKeyUp = "this.value=formateafecha(this.value);" >
	<input type="submit" name="buscador" value="Buscar" class="campo_buscador">	
	</form>	
		<div class="titulo">
		Eliminar
		</div>
		<a href="menu_admin.php"><img src="imagenes\cerrar.png" class="imagen_atras"/></a>
	</div> 
	</div>
<!----------------------->
	
<form ACTION="eliminar_mantenimiento2.php" METHOD="POST">
	<div id="cuerpo">
	<div class="titulos">
	Seleccione C&oacute;digo del Mantenimiento
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
	<div class="sesion">
	<input type="submit" value="Eliminar" class="boton">
	</div>
</div>
</div>
</div>
</form>
</body>
</html>