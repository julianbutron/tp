<html>
<head>
<title> Seguimiento </title>
<link rel="stylesheet" type="text/css" href="estilos\seguimiento.css">
<script type="text/javascript" src="javascript\codigo1.js"></script>
<script type="text/javascript" src="javascript\validar_fecha.js"></script>
</head>
<body Background="imagenes\fondo.jpg">
<div id="contenedor">
	<div id="cabecera">
	
<!-- diseño de cabecera con buscador-->	
	<form ACTION="buscar_viaje.php" METHOD="POST">
	<div class="buscar">
	<input type="text" name="palabra" placeholder="YYYY-MM-DD" class="campo_buscar" onKeyUp = "this.value=formateafecha(this.value);"> 
	<input type="submit" name="buscador" value="Buscar" class="campo_buscador">	
	</form>	
		<div class="titulo">
		Veh&iacute;culos en Viaje
		</div>
		<a href="menu_supervisor.php"><img src="imagenes\cerrar.png" class="imagen_atras"/></a>
	</div> 
	</div>
<!----------------------->
	
<form ACTION= "localizacion_vehiculo.php" METHOD="POST" ONSUBMIT="return validar2(this)">
	<div id="cuerpo">
	<div class="titulos">
	Seleccione ID del Vehiculo
	</div>
<hr width="80%" align="center">
	<div class="campo">
		<select id="id" name="id" class="campo2">
		<option value=""> ID - Patente </option>
	
<?php
	include('conexion_bd.php');
	$consulta ="SELECT id, patente FROM vehiculo
				WHERE EXISTS (SELECT 1 FROM viaje V WHERE V.id_vehiculo = vehiculo.id)";
	$tabla = mysql_query($consulta);

	while($registro=mysql_fetch_array($tabla))
	echo "<option  value='".$registro["id"]."'>".$registro["id"]." - ".$registro["patente"]."</option>";  
?>
		</select>
<input type="submit" name="siguiente" value="Siguiente  >>" class="boton_continuar">
</div>
</div>
</div>
</form>
</body>
</html>