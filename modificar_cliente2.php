<html> 
<head> 
<title> Modificar Cliente 2 </title> 
<link rel="stylesheet" type="text/css" href="estilos\agregar_cliente.css">
<script type="text/javascript" src="javascript\validar_campo_numerico.js"></script>
</head> 
<body Background="imagenes\fondo.jpg">
<?php  
	if(isset($_POST['id']) && !empty($_POST['id'])){
    $id = $_POST['id'];
	
	include('conexion_bd.php');
    $consulta = "SELECT * FROM cliente WHERE id = '$id'"; 
    $resultado = mysql_query($consulta); 

	while ($row = mysql_fetch_array($resultado)){ 
?>
<form ACTION="modificar_cliente3.php" METHOD="POST">
<div id="contenedor">
	<div id="cabecera">
	<a href="menu_admin.php"><img src="imagenes\cerrar.png" class="imagen_atras"/></a>
		<div class="titulo">
		Modificar Cliente
		</div>
	</div>
	<div id="cuerpo">
		<div class="titulos_pequeños">
	Los campos marcados con (<span style=color:crimson>*</span>) son obligatorios.
	</div>
		<div class="titulos">
		Si no se cambian los datos del cliente, se mantienen iguales.
		</div>
<hr width="85%" align="center">
<div class="campo">
<span style=color:crimson>*</span>Razon Social: <input type="text" name="rs" value="<?php echo $row['rs'];?>" class="campo_rs">
		</div>
		<div class="campo">
<span style=color:crimson>*</span>Email:<input type="text" name="email" value="<?php echo $row['email'];?>" class="campo_email">
		</div>
		<div class="campo">
<span style=color:crimson>*</span>Tel&eacute;fono:	<input type="text" name="telefono" value="<?php echo $row['telefono'];?>" class="campo_tel" onkeyUp="return ValNumero(this);">
		</div>
		<div class="sesion">
	<input type="hidden" name="id" value="<?php echo $row['id'];?>">
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
	<a href="ABM_cliente.php"><input type="submit" value="Volver" class="boton_volver_aviso"></a>
	</div>'	;
	}
?>
</div>
</div>
</body> 
</html> 