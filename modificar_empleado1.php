<html>
<head>
<title> Modificar Empleado 1 </title>
<link rel="stylesheet" type="text/css" href="estilos\modificar_empleado1.css">
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
		Modificar
		</div>
		<a href="menu_supervisor.php"><img src="imagenes\cerrar.png" class="imagen_atras"/></a>
	</div> 
	</div>
<!----------------------->
<form ACTION= "modificar_empleado2.php" METHOD="POST">
	<div id="cuerpo">
	<div class="titulos">
	Seleccione ID del Empleado
	</div>
<hr width="80%" align="center">

	<div class="campo">
		<select name="dni" class="campo2">
		<option value=""> ID - Nro. DNI </option>	
<?php
	include('conexion_bd.php');
	$consulta ="SELECT id, dni FROM empleado";
	$tabla = mysql_query($consulta);

 while($registro=mysql_fetch_array($tabla))
   echo "<option  value='".$registro["dni"]."'>".$registro["id"]." - ".$registro["dni"]."</option>";  
?>
		</select>
<input type="submit" name="siguiente" value="Siguiente  >>" class="boton_continuar">
</div>
</div>
</div>
</form>

</body>
</html>