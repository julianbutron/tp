<html>
<head>
<title> Agregar Mantenimiento 2 </title>
<!-- Utilizo el mismo estilo agregar mantenimiento -->
<link rel="stylesheet" type="text/css" href="estilos\agregar_mantenimiento.css">
<script type="text/javascript" src="javascript\validar_campo_numerico.js"></script>
</head>
<body Background="imagenes\fondo.jpg">
<?php  
	if(isset($_POST['cod']) && !empty($_POST['cod'])){
    $cod = $_POST['cod'];
	
	include('conexion_bd.php');
    $consulta = "SELECT * FROM mantenimiento WHERE cod = '$cod'"; 
    $resultado = mysql_query($consulta); 

	while ($row = mysql_fetch_array($resultado)){ 
	mysql_close($conexion);
	echo '<form ACTION= "modificar_mantenimiento3.php" METHOD="POST">
	<div id="contenedor">
	<div id="cabecera">
	<a href="menu_admin.php"><img src="imagenes\cerrar.png" class="imagen_atras"/></a>
		<div class="titulo">
		Modificar Mantenimiento
		</div>
	</div>
	<div id="cuerpo">
	<div class="titulos">
	Datos del gasto
	</div>
	<div class="titulos_pequeños">
	Los campos marcados con (<span style=color:crimson>*</span>) son obligatorios.
	</div>
<hr width="80%" align="center">';
?>
	<div class="campo">
<span style=color:crimson>*</span> Fecha: 
	<input type="text" name="fecha" placeholder="YYYY-MM-DD" value="<?php echo $row['fecha'];?>" class="campo_fecha">
	</div>

	<div class="campo">
<span style=color:crimson>*</span> Veh&iacute;culo: <select name="id_vehiculo" value="<?php echo $row['id_vehiculo'];?>" class="campo_vehiculo_mecanico">
	<option value="<?php echo $row['id_vehiculo'];?>"> <?php echo "ID.".$row['id_vehiculo'];?> </option>
<?php
   	include('conexion_bd.php');
	$consulta ="SELECT id, patente FROM vehiculo";
	$tabla = mysql_query($consulta);

	while($registro=mysql_fetch_array($tabla))
	echo "<option  value='".$registro["id"]."'>ID.".$registro["id"]." - ".$registro["patente"]."</option>";  
	mysql_close($conexion);
?>
		</select>
		</div>

	<div class="campo">
<span style=color:crimson>*</span> Km Recorrido: <input type="text" name="km" value="<?php echo $row['km'];?>" class="campo_km" maxlength="5" onkeyUp="return ValNumero(this);">
	</div>
	
	<div class="campo">
<span style=color:crimson>*</span>Mecanico: <select name="id_mecanico" value="<?php echo $row['id_mecanico'];?>" class="campo_vehiculo_mecanico">
		<option value="<?php echo $row['id_mecanico'];?>"> <?php echo "ID.".$row['id_mecanico'];?> </option>
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
<span style=color:crimson>*</span> Repuestos Cambiados: <input type="text" name="repuesto" value="<?php echo $row['repuesto'];?>" class="campo_repuesto">
	</div>
	<div class="campo">
<span style=color:crimson>*</span> Importe Total: <input type="text" name="costo" value="<?php echo $row['costo'];?>" class="campo_costo" maxlength="10" onkeyUp="return ValNumero(this);">
	</div>
<input type="hidden" name="cod" value="<?php echo $row['cod'];?>">
<?php
echo '<div class="sesion">
	<input type="submit" value="Actualizar" class="boton">
	</div>
	</div>
</form>';
} 
}
else{
	echo '<div id="contenedor">
	<div id="cabecera">
	</div>
	<div id="cuerpo_aviso">
		<div class="letras_aviso">
		!!No hay registros de usuarios para listar!!
		</div>
	<div class="sesion_aviso">
	<a href="ABM_mantenimiento.php"><input type="submit" value="Volver" class="boton_volver_aviso"></a>
	</div>'	
;}
?>	
</div>
</div>
</form>
</body>
</html>