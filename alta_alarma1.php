<html>
<head>
<title> Alta alarma 1 </title>
<!-- Utilizo el mismo estilo cargar combustible -->
<link rel="stylesheet" type="text/css" href="estilos\cargar_combustible.css">
<script type="text/javascript" src="javascript\validar_fecha.js"></script>
<script type="text/javascript" src="javascript\validar_hora.js"></script>
<script type="text/javascript" src="javascript\validar_campo_numerico.js"></script>
</head>
<body Background="imagenes\fondo.jpg">
<form ACTION="alta_alarma2.php" METHOD="POST">
<div id="contenedor">
	<div id="cabecera">
	<a href="menu_usuario.php"><img src="imagenes\cerrar.png" class="imagen_atras"/></a>
		<div class="titulo">
		Reportar
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
	<option value=""> ID - Nro.DNI  </option>
<?php
	include('conexion_bd.php');
	$consulta = "SELECT id, dni FROM empleado WHERE id_cargo = 1";
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
		<option value=""> ID - Patente </option>
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
<span style=color:crimson>*</span>Hora: <input type="text" name="hora" placeholder="HH:MM" maxlength="10" class="campo_hora" onKeyPress="return FormatoHora(event,this)">	
		</div>
		
	<div class="campo">
<span style=color:crimson>*</span>KM Recorridos:<input type="text" name="km_rec"  maxlength="6" class="campo_km" onkeyUp="return ValNumero(this);">
	</div>
	<div class="campo">
	<input type="submit" value="Enviar" class="boton_estado">
	</div>
</div>
</div>
</form>
</body>
</html>