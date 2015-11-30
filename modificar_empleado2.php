<html> 
<head> 
<title> Modificar Empleado 2 </title> 
<link rel="stylesheet" type="text/css" href="estilos\modificar_empleado2.css">
<script type="text/javascript" src="javascript\validar_fecha.js"></script>
<script type="text/javascript" src="javascript\validar_campo_numerico.js"></script>
<script type="text/javascript" src="javascript\validar_letras.js"></script>
</head> 
<body Background="imagenes\fondo.jpg">
<?php  
	if(isset($_POST['dni']) && !empty($_POST['dni'])){
    $dni = $_POST['dni'];
	
	include('conexion_bd.php');
    $consulta = "SELECT * FROM empleado WHERE dni = '$dni'"; 
    $resultado = mysql_query($consulta); 

	while ($row = mysql_fetch_array($resultado)){ 
?>
<form ACTION="modificar_empleado3.php" METHOD="POST">
<div id="contenedor">
	<div id="cabecera">
	<a href="menu_supervisor.php"><img src="imagenes\cerrar.png" class="imagen_atras"/></a>
		<div class="titulo">
		Modificar Empleado
		</div>
	</div>
	<div id="cuerpo">
		<div class="titulos_pequeños">
	Los campos marcados con (<span style=color:crimson>*</span>) son obligatorios.
	</div>
		<div class="titulos">
		Si no se cambian los datos del empleado, se mantienen iguales.
		</div>
<hr width="85%" align="center">
	<div class="campo">
	<input type="hidden" name="dni" value="<?php echo $row['dni'];?>">
	</div>

	<div class="campo_letras_fecha">
<span style=color:crimson>*</span>Fecha de Nacimiento:
	</div>
	<div class="campo">
	<input type="text" name="fecha_nac" placeholder="YYYY-MM-DD" value="<?php echo $row['fecha_nac'];?>" class="campo_fecha" onKeyUp = "this.value=formateafecha(this.value);">
	</div>
	
	<div class="campo">
<span style=color:crimson>*</span>Nombre: <input type="text" name="nombre" value="<?php echo $row['nombre'];?>" class="campo_nombre_apellido" onkeypress="return soloLetras(event)">
		</div>
		<div class="campo">
<span style=color:crimson>*</span>Apellido:<input type="text" name="apellido" value="<?php echo $row['apellido'];?>" class="campo_nombre_apellido" onkeypress="return soloLetras(event)">
		</div>
		<div class="campo">
<span style=color:crimson>*</span>Domicilio: <input type="text" name="domicilio" value="<?php echo $row['domicilio'];?>" placeholder="Direcci&oacute;n + N&uacute;mero" class="campo_domicilio">
		</div>
		<div class="campo">
<span style=color:crimson>*</span>Localidad: <input type="text" name="localidad" value="<?php echo $row['localidad'];?>" class="campo_localidad" onkeypress="return soloLetras(event)">
		</div>
		<div class="campo">
<span style=color:crimson>*</span>Provincia: <input type="text" name="provincia" value="<?php echo $row['provincia'];?>" class="campo_provincia" onkeypress="return soloLetras(event)">
		</div>
		<div class="campo">
<span style=color:crimson>*</span>Tipo Lic: <input type="text" name="lic" value="<?php echo $row['lic'];?>" class="campo_lic">
		</div>
		<div class="campo">
<span style=color:crimson>*</span>Tel&eacute;fono:	<input type="text" name="telefono" value="<?php echo $row['telefono'];?>" class="campo_tel" maxlength="10" onkeyUp="return ValNumero(this);">
		</div>
		<div class="campo">
<span style=color:crimson>*</span>Cargo: <select name="id_cargo" class="campo_cargo">
		<option value="<?php echo $row['id_cargo'];?>"> <?php echo "ID.".$row['id_cargo'];?> </option>
<?php
	include('conexion_bd.php');
	$consulta ="SELECT id, descripcion FROM cargo";
	$tabla = mysql_query($consulta);

	while($registro=mysql_fetch_array($tabla))
	echo "<option  value='".$registro['id']."'>ID.".$registro["id"]." - ".$registro["descripcion"]."</option>";  
	mysql_close($conexion);
?>
		</select>
		</div>	
		
		<div class="campo">
<span style=color:crimson>*</span>Rol: <select name="id_rol" class="campo_rol">
		<option value="<?php echo $row['id_cargo'];?>"> <?php echo "ID.".$row['id_rol'];?> </option>
<?php
	include('conexion_bd.php');
	$consulta ="SELECT id, descripcion FROM rol";
	$tabla = mysql_query($consulta);

	while($registro=mysql_fetch_array($tabla))
	echo "<option  value='".$registro['id']."'>ID.".$registro["id"]." - ".$registro["descripcion"]."</option>";  
	mysql_close($conexion);
?>
		</select>
		</div>	

	<div class="campo">
<span style=color:crimson>*</span> Usuario: <input type="text" name="usuario" value="<?php echo $row['usuario'];?>" class="campo_usuario">
	</div>
	
	<div class="campo">
<span style=color:crimson>*</span> Contrase&ntilde;a: <input type="password" name="password" class="campo_clave">
	</div>	
	<div class="sesion">
	<input type="submit" value="Actualizar" class="boton_actualizar">
	</div>	
</div>
</div>
</form>
<?php
} 
   mysql_close($conexion);
}
else{
	echo '<div id="contenedor_aviso">
			<div id="cabecera_aviso">
			</div>
		<div id="cuerpo_aviso">
		<div class="letras_aviso">
		!!No hay registros de usuarios para listar!!
		</div>
	<div class="sesion_aviso">
	<a href="ABM_supervisor1.php"><input type="submit" value="Volver" class="boton_volver_aviso"></a>
	</div>'	;
	}
?>
</div>
</div>
</body> 
</html> 