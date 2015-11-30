<html>
<head>
<title> Cargar Combustible </title>
<link rel="stylesheet" type="text/css" href="estilos\cargar_combustible.css">
<script type="text/javascript" src="javascript\validar_fecha.js"></script>
<script type="text/javascript" src="javascript\validar_campo_numerico.js"></script>
</head>
<body Background="imagenes\fondo.jpg">

<form ACTION="cargar_combustible2.php" METHOD="POST">

<div id="contenedor">
	<div id="cabecera">
	<a href="menu_usuario.php"><img src="imagenes\boton_atras.png" class="imagen_atras"/></a>
		<div class="titulo">
		Ingreso de Combustible
		</div>
	</div>
	<div id="cuerpo">
	<div class="titulos_pequeños">
	Los campos marcados con (<span style=color:crimson>*</span>) son obligatorios.
	</div>
	<div class="titulos">
	Ingrese los datos 
	</div>
<hr width="85%" align="center">
		
	<div class="campo">
<span style=color:crimson>*</span>Chofer: <select name="id_chofer" class="campo_seleccionar_chofer">
	<option value=""> Seleccionar  </option>
	
<?php
	include('conexion_bd.php');
	$consulta = "SELECT id, dni FROM empleado WHERE id_cargo= 1";
	$tabla = mysql_query($consulta);

	while($registro=mysql_fetch_array($tabla))
	echo "<option  value='".$registro["id"]."'>".$registro["id"]." - DNI: ".$registro["dni"]."</option>";  
	mysql_close($conexion);
?>
		</select>
		</div>
		<div class="campo">
<span style=color:crimson>*</span>Fecha: <input type="text" name="fecha" placeholder="YYYY-MM-DD" maxlength="10" class="campo_fecha" onKeyUp = "this.value=formateafecha(this.value);">
		</div>
		
	<div class="campo">
<span style=color:crimson>*</span>Veh&iacute;culo: <select name="id_vehiculo" class="campo_vehiculo">
		<option value=""> Seleccionar </option>
<?php
	include('conexion_bd.php');
	$consulta = "SELECT id, patente FROM vehiculo";
	$tabla = mysql_query($consulta);

	while($registro=mysql_fetch_array($tabla))
	echo "<option  value='".$registro["id"]."'>".$registro["id"]." - ".$registro["patente"]."</option>";  
	mysql_close($conexion);
?>
		</select>
		</div>
	<div class="campo">
<span style=color:crimson>*</span>Litros:<input type="text" name="litros"  class="campo_litros" maxlength="5" onkeyUp="return ValNumero(this);">
	</div>
	<div class="campo_importe_texto">
<span style=color:crimson>*</span>Importe:<input type="text" name="importe" class="campo_importe" maxlength="5" onkeyUp="return ValNumero(this);">
	</div>
<?php
	include('conexion_bd.php');
	$ultimo = mysql_query("SELECT * FROM coordenadas ORDER BY id DESC LIMIT 1");
	if ($row = mysql_fetch_row($ultimo)) {
	$id = trim($row[0]);
	mysql_close($conexion);}
?>
	<input type="hidden" name="id_coordenadas" value="<?php echo $id?>">
	<div class="sesion" align="center">
	<input type="submit" value="Enviar" class="boton">
	</div>
	</div>
</div>
</form>
</body>
</html>