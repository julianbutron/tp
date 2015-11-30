<html>
<head>
<title> Agregar Mantenimiento </title>
<link rel="stylesheet" type="text/css" href="estilos\agregar_mantenimiento.css">
<script type="text/javascript" src="javascript\validar_fecha.js"></script>
<script type="text/javascript" src="javascript\validar_campo_numerico.js"></script>
</head>
<body Background="imagenes\fondo.jpg">
<form ACTION= "agregar_mantenimiento2.php" METHOD="POST">
<div id="contenedor">
	<div id="cabecera">
	<a href="menu_admin.php"><img src="imagenes\cerrar.png" class="imagen_atras"/></a>
		<div class="titulo">
		Agregar Mantenimiento
		</div>
	</div>
	<div id="cuerpo">
	<div class="titulos">
	Datos del gasto
	</div>
	<div class="titulos_pequeños">
	Los campos marcados con (<span style=color:crimson>*</span>) son obligatorios.
	</div>
<hr width="80%" align="center">
		<div class="campo">
<span style=color:crimson>*</span>Fecha: <input type="text" name="fecha" placeholder="YYYY-MM-DD" maxlength="10" class="campo_fecha" onKeyUp = "this.value=formateafecha(this.value);">
		</div>
		<div class="campo">
<span style=color:crimson>*</span> Veh&iacute;culo: <select name="id_vehiculo" class="campo_vehiculo_mecanico">
		<option value=""> Seleccionar </option>
<?php
   	include("conexion_bd.php");
	$consulta ="SELECT id, patente FROM vehiculo";
	$tabla = mysql_query($consulta);

 while($registro=mysql_fetch_array($tabla))
   echo "<option  value='".$registro["id"]."'>".$registro["id"]." - ".$registro["patente"]."</option>";  
 mysql_close($conexion);
?>
		</select>
		</div>

		<div class="campo">
<span style=color:crimson>*</span> Km Recorrido: <input type="text" name="km" class="campo_km" maxlength="5" onkeyUp="return ValNumero(this);">
		</div>
		
		<div class="campo">
<span style=color:crimson>*</span>Mecanico: <select name="id_mecanico" class="campo_vehiculo_mecanico">
		<option value=""> Seleccionar </option>
<?php
   	include("conexion_bd.php");	
	$consulta ="SELECT id, dni 
				FROM empleado E 
				WHERE EXISTS (SELECT 1 FROM cargo C WHERE C.descripcion = 'Mecanico' AND E.id_cargo = C.id
				)";
	$tabla = mysql_query($consulta);

 while($registro=mysql_fetch_array($tabla))
   echo "<option  value='".$registro["id"]."'>ID.".$registro["id"]." - DNI: ".$registro["dni"]."</option>";  
 mysql_close($conexion);
?>
		</select>
		</div>
		
		<div class="campo">
<span style=color:crimson>*</span>Mecanico Ext. <input type="radio" name="mecanico_ext" value="Si" class="campo_externo"> Si <input type="radio" name="mecanico_ext" value="No" class="campo_externo" checked> No
		</div>
		
		<div class="campo">
<span style=color:crimson>*</span> Repuestos Cambiados: <input type="text" name="repuesto" class="campo_repuesto">
		</div>
		<div class="campo">
<span style=color:crimson>*</span> Importe Total: <input type="text" name="costo"  class="campo_costo" maxlength="10" onkeyUp="return ValNumero(this);">
		</div>
	<div class="sesion">
	<input type="submit" value="Guardar" class="boton">
	</div>
	</div>
</div>
</form>
</body>
</html>