<html>
<head>
<title> Agregar Empleado </title>
<link rel="stylesheet" type="text/css" href="estilos\registrar_empleado.css">
<script type="text/javascript" src="javascript\validar_fecha.js"></script>
<script type="text/javascript" src="javascript\validar_campo_numerico.js"></script>
<script type="text/javascript" src="javascript\validar_letras.js"></script>
</head>
<body Background="imagenes\fondo.jpg">
<form ACTION= "registrar_empleado2.php" METHOD="POST">
<div id="contenedor">
	<div id="cabecera">
	<a href="menu_supervisor.php"><img src="imagenes\cerrar.png" class="imagen_atras"/></a>
		<div class="titulo">
	Agregar Empleado
		</div>
	</div>
	<div id="cuerpo">
	<div class="titulos_pequeños">
	Los campos marcados con (<span style=color:crimson>*</span>) son obligatorios.
	</div>
	<div class="titulos">
	Datos del Empleado 
	</div>
<hr width="80%" align="center">

		<div class="campo">
<span style=color:crimson>*</span>DNI: <input type="text" name="dni" maxlength="8" class="campo_dni" onkeyUp="return ValNumero(this);">
		</div>
		<div class="campo">
<span style=color:crimson>*</span>Fecha Nacimiento: <input type="text" name="fecha_nac" placeholder="yyyy-mm-dd" maxlength="10" class="campo_fecha" onKeyUp = "this.value=formateafecha(this.value);">
		</div>
		<div class="campo">
<span style=color:crimson>*</span>Nombre: <input type="text" name="nombre" class="campo_nombre_apellido" onkeypress="return soloLetras(event)">
		</div>
		<div class="campo">
<span style=color:crimson>*</span>Apellido:<input type="text" name="apellido" class="campo_nombre_apellido" onkeypress="return soloLetras(event)">
		</div>
		<div class="campo">
<span style=color:crimson>*</span>Domicilio: <input type="text" name="domicilio" placeholder="Direcci&oacute;n + N&uacute;mero" class="campo_domicilio">
		</div>
		<div class="campo">
<span style=color:crimson>*</span>Localidad: <input type="text" name="localidad" class="campo_localidad" onkeypress="return soloLetras(event)">
		</div>
		<div class="campo">
<span style=color:crimson>*</span>Provincia: <input type="text" name="provincia" class="campo_provincia" onkeypress="return soloLetras(event)">
		</div>
		<div class="campo">
<span style=color:crimson>*</span>Tipo Lic: <input type="text" name="lic" class="campo_lic">
		</div>
		<div class="campo">
<span style=color:crimson>*</span>Tel&eacute;fono:	<input type="text" name="telefono" maxlength="10" class="campo_tel" onkeyUp="return ValNumero(this);">
		</div>
		
		<div class="campo">
<span style=color:crimson>*</span>Cargo: <select name="id_cargo" class="campo_cargo">
		<option value="">  </option>
<?php
	include('conexion_bd.php');
	$consulta = "SELECT id, descripcion FROM cargo";
	$tabla = mysql_query($consulta);

	while($registro=mysql_fetch_array($tabla))
	echo "<option  value='".$registro["id"]."'>".$registro["id"]." - ".$registro["descripcion"]."</option>";  
	mysql_close($conexion);
?>
		</select>
		</div>	
		
		<div class="campo">
<span style=color:crimson>*</span>Rol: <select name="id_rol" class="campo_rol">
		<option value="">  </option>
<?php
	include('conexion_bd.php');
	$consulta = "SELECT id, descripcion FROM rol";
	$tabla = mysql_query($consulta);

	while($registro=mysql_fetch_array($tabla))
	echo "<option  value='".$registro["id"]."'>".$registro["id"]." - ".$registro["descripcion"]."</option>";  
	mysql_close($conexion);
?>
		</select>
		</div>	

	<div class="campo">
<span style=color:crimson>*</span> Usuario: <input type="text" name="usuario" class="campo_usuario">
	</div>
	
	<div class="campo">
<span style=color:crimson>*</span> Contrase&ntilde;a: <input type="password" name="password" class="campo_clave">
	</div>	
	<div class="sesion">
	<input type="submit" value="Guardar" class="boton">
	</div>
	</div>
</div>
</form>
</body>
</html>