<html> 
<head> 
<title> Cliente_validar </title> 
<link rel="stylesheet" type="text/css" href="estilos\aviso.css">
</head> 
<body Background="imagenes\fondo.jpg">
<div id="contenedor">
	<div id="cabecera">
	</div>
	<div id="cuerpo">
	<div class="letras_aviso">
<?php
include("conexion_bd.php");
	if(isset($_POST['rs']) && !empty ($_POST['rs']) &&
	isset($_POST['email']) && !empty ($_POST['email']) &&
	isset($_POST['telefono']) && !empty ($_POST['telefono']))
	{
	mysql_query("INSERT INTO cliente(rs, email, telefono)
	VALUES ('$_POST[rs]', '$_POST[email]', '$_POST[telefono]')", $conexion);
	echo "<font color='green'>Datos insertados CORRECTAMENTE</font><br><br><br>";
	echo "Razon Social: ".$_POST['rs']."<br>".
		"Email: ".$_POST['email']."<br>".
		"Tel: ".$_POST['telefono']."<br><br>";
	mysql_close($conexion);
	}
	else {
	echo "<br><br><font color='red'>AVISO!!</font> Problemas al insertar los datos. <br><br><br><br>";	
	}
?>
	<div class="sesion">
	<a href="menu_admin.php"><input type="submit" value="Finalizar" class="boton_finalizar_empleado"></a>
	</div>	
</div>
</div>
</div>
</body> 
</html>