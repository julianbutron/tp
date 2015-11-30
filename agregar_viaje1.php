<html>
<head>
<title> Agregar Viaje </title>
<link rel="stylesheet" type="text/css" href="estilos\agregar_viaje.css">
<script type="text/javascript" src="javascript\validar_fecha.js"></script>
<script type="text/javascript" src="javascript\validar_hora.js"></script>
<script type="text/javascript" src="javascript\validar_campo_numerico.js"></script>
</head>
<body Background="imagenes\fondo.jpg">
<form ACTION="agregar_viaje2.php" METHOD="POST">
<div id="contenedor">
	<div id="cabecera">
	<a href="menu_admin.php"><img src="imagenes\cerrar.png" class="imagen_atras"/></a>
		<div class="titulo">
		Agregar Viaje
		</div>
	</div>
	<div id="cuerpo_fecha">
	<div class="titulos_viaje">
<span style=color:crimson>*</span> Fecha de Partida
	</div>
<hr width="80%" align="center">
<input type="text" name="fecha_partida" placeholder="YYYY-MM-DD" maxlength="10" class="campo_fecha" onKeyUp = "this.value=formateafecha(this.value);">
<input type="text" name="hora_partida" placeholder="HH:MM" maxlength="10" class="campo_hora" onKeyPress="return FormatoHora(event,this)">	
	</div>
	<div id="cuerpo_fecha">
	<div class="titulos_viaje">
<span style=color:crimson>*</span> Fecha de Llegada
	</div>
<hr width="80%" align="center">
<input type="text" name="fecha_llegada" placeholder="YYYY-MM-DD" maxlength="10" class="campo_fecha" onKeyUp = "this.value=formateafecha(this.value);">
<input type="text" name="hora_llegada" placeholder="HH:MM" maxlength="10" class="campo_hora" onKeyPress="return FormatoHora(event,this)">
	</div>

	<div id="pie_agregar_viaje">
		<div class="campo">
<span style=color:crimson>*</span>Cliente: <select name="id_cliente" class="campo_cliente">
		<option value=""> Seleccionar </option>
<?php
	include('conexion_bd.php');
	$consulta = "SELECT id, rs FROM cliente";
	$tabla = mysql_query($consulta);

	while($registro=mysql_fetch_array($tabla))
	echo "<option  value='".$registro["id"]."'>".$registro["id"]." - ".$registro["rs"]."</option>";  
	mysql_close($conexion);
?>
		</select>
		</div>	
		<div class="campo">
<span style=color:crimson>*</span>Tipo Carga: <input type="text" name="tipo_carga" class="campo_tipo_carga">
		</div>
		
		<div align="center">
		Origen
		</div>	
		<div class="campo">
<span style=color:crimson>*</span>Domicilio: <input type="text" name="domicilio_o" placeholder="Direccion + Nro" class="campo_domicilio">
		</div>
		<div class="campo">
<span style=color:crimson>*</span>Ciudad: <input type="text" name="ciudad_o" class="campo_ciudad">
		</div>
		<div class="campo">
<span style=color:crimson>*</span>Provincia: <input type="text" name="provincia_o" class="campo_provincia">
		</div>
		<div class="campo">
<span style=color:crimson>*</span>Pa&iacute;s: <input type="text" name="pais_o" class="campo_pais">
		</div>
		
		<div align="center">
		Destino
		</div>
		<div class="campo">
<span style=color:crimson>*</span>Domicilio: <input type="text" name="domicilio_d" placeholder="Direccion + Nro" class="campo_domicilio">
		</div>
		<div class="campo">
<span style=color:crimson>*</span>Ciudad: <input type="text" name="ciudad_d" class="campo_ciudad">
		</div>
		<div class="campo">
<span style=color:crimson>*</span>Provincia: <input type="text" name="provincia_d" class="campo_provincia">
		</div>
		<div class="campo">
<span style=color:crimson>*</span>Pa&iacute;s: <input type="text" name="pais_d" class="campo_pais">
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
<span style=color:crimson>*</span>Chofer: <select name="id_chofer" class="campo_seleccionar_chofer">
		<option value=""> Seleccionar  </option>
<?php
   	include("conexion_bd.php");	
	$consulta ="SELECT id, dni 
				FROM empleado E 
				WHERE EXISTS (SELECT 1 FROM cargo C WHERE C.descripcion = 'Chofer' AND E.id_cargo = C.id
				)";
	$tabla = mysql_query($consulta);

 while($registro=mysql_fetch_array($tabla))
   echo "<option  value='".$registro["id"]."'>ID.".$registro["id"]." - DNI: ".$registro["dni"]."</option>";  
 mysql_close($conexion);
?>
		</select>
		</div>
		
		<div class="campo">
<span style=color:crimson>*</span>Uso Combustible:<input type="text" name="combustible" class="campo_combustible" maxlength="5" onkeyUp="return ValNumero(this);">
		</div>	
		<div class="campo">
<span style=color:crimson>*</span>Km.Estimado:<input type="text" name="km" class="campo_km_hora" maxlength="5" onkeyUp="return ValNumero(this);">
		</div>	
		<div class="campo">
<span style=color:crimson>*</span>Total Horas:<input type="text" name="horas" class="campo_km_hora" maxlength="3" onkeyUp="return ValNumero(this);">
		</div>
	<div class="titulos_pequeños">
	Los campos marcados con (<span style=color:crimson>*</span>) son obligatorios.
	</div>
	
	<div class="sesion">
	<input type="submit" value="Guardar" class="boton_centro">
	</div>
	</div>
</div>
</form>
</body>
</html>