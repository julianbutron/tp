<html>
<head>
<title> Modificar veh&iacute;culo 2 </title>
<link rel="stylesheet" type="text/css" href="estilos\agregar_vehiculo.css">
<script type="text/javascript" src="javascript\validar_campo_numerico.js"></script>
</head>
<body Background="imagenes\fondo.jpg">
<?php  
	if(isset($_POST['id']) && !empty($_POST['id'])){
    $id = $_POST['id'];
	
	include('conexion_bd.php');
    $consulta = "SELECT * FROM vehiculo WHERE id = '$id'"; 
    $resultado = mysql_query($consulta); 

	while ($row = mysql_fetch_array($resultado)){ 
	echo '<form ACTION= "modificar_vehiculo3.php" METHOD="POST">
<div id="contenedor">
	<div id="cabecera">
	<a href="menu_admin.php"><img src="imagenes\cerrar.png" class="imagen_atras"/></a>
		<div class="titulo">
		Modificar Veh&iacute;culo
		</div>
	</div>
	<div id="cuerpo">
	<div class="titulos">
	Datos del Veh&iacute;culo 
	</div>
	<div class="titulos_pequeños">
	Los campos marcados con (<span style=color:crimson>*</span>) son obligatorios.
	</div>
<hr width="80%" align="center">';
?>
		<div class="campo">
<span style=color:crimson>*</span>Patente:<input type="text" name="patente" maxlength="6" value="<?php echo $row['patente'];?>" class="campo_patente">
		</div>
		<div class="campo">
<span style=color:crimson>*</span>Nro.Chasis:<input type="text" name="chasis" value="<?php echo $row['chasis'];?>" class="campo_chasis">
		</div>
		<div class="campo">
<span style=color:crimson>*</span>Marca:<input type="text" name="marca" value="<?php echo $row['marca'];?>" class="campo_marca">
		</div>
		<div class="campo">
<span style=color:crimson>*</span>Nro.Motor:<input type="text" name="motor" value="<?php echo $row['motor'];?>" class="campo_motor">
		</div>
		<div class="campo">
<span style=color:crimson>*</span>Modelo:<input type="text" name="modelo" value="<?php echo $row['modelo'];?>" class="campo_modelo">
		</div>
		<div class="campo">
<span style=color:crimson>*</span>A&ntilde;o de Fabricaci&oacute;n: <input type="text" name="fabricacion" value="<?php echo $row['fabricacion'];?>" class="campo_fabricacion" maxlength="4" onkeyUp="return ValNumero(this);">
		</div>
		<input type="hidden" name="generar_codigo">	
		<input type="hidden" name="id" value="<?php echo $row['id'];?>">

<?php
echo '<div class="sesion">
	<input type="submit" value="Actualizar" class="boton">
	</div>
	</div>
	</form>';
} 
   mysql_close($conexion);
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
	<a href="ABM_vehiculo.php"><input type="submit" value="Volver" class="boton_volver_aviso"></a>
	</div>'	
;}
?>	
</div>
</div>
</body>
</html>