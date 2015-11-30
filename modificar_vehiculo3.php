<html> 
<head> 
<title> Modificar veh&iacute;culo 3 </title> 
<link rel="stylesheet" type="text/css" href="estilos\aviso_qr.css">
</head> 
<body Background="imagenes\fondo.jpg">
<div id="contenedor">
	<div id="cabecera">
	</div>
	<div id="cuerpo">
	<div class="letras_aviso">
<?php 
	if(isset($_POST['id']) && !empty($_POST['id'])){
	$id=$_POST['id'];
    $patente=$_POST['patente'];
	$chasis=$_POST['chasis'];
	$marca=$_POST['marca'];
	$motor=$_POST['motor'];
    $modelo=$_POST['modelo'];
    $fabricacion=$_POST['fabricacion'];
	
	include('conexion_bd.php');
	$consulta=	"UPDATE vehiculo
				SET patente='$patente', chasis='$chasis', marca='$marca', motor='$motor', modelo='$modelo', fabricacion='$fabricacion'
				WHERE id = '$id'"; 
	mysql_query($consulta); 
    mysql_close($conexion);

	echo '<font color="green">Los datos han sido actualizados con exito.</font>
			<div class="letras_qr">';
			echo "ID: ".$id."<br>".
				 " Patente: ".$patente."<br>".
				 "Chasis: ".$chasis."<br>".
				 "Marca: ".$marca."<br>".
				 "Motor: ".$motor."<br>".
				 "Modelo: ".$modelo."<br>".
				 "A&ntilde;o de Fabricacion: ".$fabricacion.
			'</div>';
	echo '<div class="imagen_qr">';
	include("generar_codigo_qr.php"); 
	echo '</div>';
	}	
?> 
	<div class="sesion">
	<a href="menu_admin.php"><input type="submit" value="Finalizar" class="boton_finalizar"></a>
	</div>	
</div>
</div>
</div>
</body> 
</html>