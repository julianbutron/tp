<html> 
<head> 
<title> Agregar Veh&iacute;culo 2 </title> 
<link rel="stylesheet" type="text/css" href="estilos\aviso_qr.css">
</head> 
<body Background="imagenes\fondo.jpg">
<div id="contenedor">
	<div id="cabecera">
	</div>
	<div id="cuerpo">
	<div class="letras_aviso">
<?php
	if(isset($_POST['patente']) && !empty ($_POST['patente']) &&
	isset($_POST['chasis']) && !empty ($_POST['chasis']) &&
	isset($_POST['marca']) && !empty ($_POST['marca']) &&
	isset($_POST['motor']) && !empty ($_POST['motor']) &&
	isset($_POST['modelo']) && !empty ($_POST['modelo']) &&
	isset($_POST['fabricacion']) && !empty ($_POST['fabricacion']))
	{
	include('conexion_bd.php');
	mysql_query("INSERT INTO vehiculo(patente, chasis, marca, motor, modelo, fabricacion)
	VALUES ('$_POST[patente]', '$_POST[chasis]', '$_POST[marca]', '$_POST[motor]', '$_POST[modelo]', '$_POST[fabricacion]')", $conexion);
	
	echo '<font color="green">Datos ingresados CORRECTAMENTE.</font>
			<div class="letras_qr">';		 
			echo "Patente: ".$_POST['patente']."<br>".
				 "Chasis: ".$_POST['chasis']."<br>".
				 "Marca: ".$_POST['marca']."<br>".
				 "Motor: ".$_POST['motor']."<br>".
				 "Modelo: ".$_POST['modelo']."<br>".
				 "A&ntilde;o de Fabricacion: ".$_POST['fabricacion'].
			'</div>';
	echo '<div class="imagen_qr">';
	include("generar_codigo_qr.php"); 
	echo '</div>';
	
	mysql_close($conexion);
	}
	else {
	echo "<br><font color='red'>AVISO!!</font> Problemas al insertar los datos.<br><br><br>";
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