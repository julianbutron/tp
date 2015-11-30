<html> 
<head> 
<title> Modificar Cliente 3 </title> 
<link rel="stylesheet" type="text/css" href="estilos\aviso.css">
</head> 
<body Background="imagenes\fondo.jpg">
<div id="contenedor">
	<div id="cabecera">
	</div>
	<div id="cuerpo">
	<div class="letras_aviso">
<?php 
	$id=$_POST['id'];
    $rs=$_POST['rs'];
	$email=$_POST['email'];
	$telefono=$_POST['telefono'];
	
	include('conexion_bd.php');
	$consulta=	"UPDATE cliente
				SET rs='$rs', email='$email', telefono='$telefono' 
				WHERE id='$id'"; 
	mysql_query($consulta); 
    mysql_close($conexion);

	echo "<p><font color='green'>Los datos han sido actualizados con exito.</font></p>";
	echo "Cliente ID: ".$_POST['id']."<br>".
	"Razon Social: ".$_POST['rs']."<br>".
	"Email: ".$_POST['email']."<br>".
	"Tel: ".$_POST['telefono']."<br><br>";
?> 
	<div class="sesion">
	<a href="menu_admin.php"><input type="submit" value="Finalizar" class="boton_finalizar"></a>
	</div>	
</div>
</div>
</div>
</body> 
</html>