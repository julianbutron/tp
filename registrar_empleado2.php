<html> 
<head> 
<title> Registrar Empleado 2 </title> 
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
	if(isset($_POST['dni']) && !empty ($_POST['dni']) &&
	isset($_POST['fecha_nac']) && !empty ($_POST['fecha_nac']) &&
	isset($_POST['nombre']) && !empty ($_POST['nombre']) &&
	isset($_POST['apellido']) && !empty ($_POST['apellido']) &&
	isset($_POST['domicilio']) && !empty ($_POST['domicilio']) &&
	isset($_POST['localidad']) && !empty ($_POST['localidad']) &&
	isset($_POST['provincia']) && !empty ($_POST['provincia']) &&
	isset($_POST['lic']) && !empty ($_POST['lic']) &&
	isset($_POST['telefono']) && !empty ($_POST['telefono']) &&
	isset($_POST['id_cargo']) && !empty ($_POST['id_cargo']) &&
	isset($_POST['id_rol']) && !empty ($_POST['id_rol']) &&
	isset($_POST['usuario']) && !empty ($_POST['usuario']) &&
	isset($_POST['password']) && !empty ($_POST['password']))
	{
	$dni = $_POST['dni'];
	$fecha_nac = $_POST['fecha_nac'];
	$nombre = $_POST['nombre']; $apellido = $_POST['apellido'];
	$domicilio = $_POST['domicilio']; $localidad = $_POST['localidad']; $provincia = $_POST['provincia'];
	$lic = $_POST['lic']; $telefono = $_POST['telefono']; 
	$id_cargo = $_POST['id_cargo']; $id_rol = $_POST['id_rol']; $usuario = $_POST['usuario'];

	$clave = $_POST['password'];
	$clave_codificado = md5($clave);
	mysql_query("INSERT INTO empleado(dni, fecha_nac, nombre, apellido, domicilio, localidad, provincia, lic, telefono, id_cargo, id_rol, usuario, password)
	VALUES ('$dni', '$fecha_nac', '$nombre', '$apellido', '$domicilio', '$localidad', '$provincia', '$lic', '$telefono', '$id_cargo', '$id_rol', '$usuario', '$clave_codificado')", $conexion);
	mysql_close($conexion);
	
	echo "<font color='green'>Datos insertados CORRECTAMENTE</font><br>";
	echo "Dni: ".$dni." "." Fecha Nac: ".$fecha_nac."<br>".
	$nombre." ".$apellido."<br>".
	$domicilio.", ".$localidad.", ".$provincia."<br>".
	"Tipo Lic: ".$lic."  "."Telefono: ".$telefono."<br>".
	"Id Cargo: ".$id_cargo."<br>".
	"Id Rol: ".$id_rol."<br>".
	"User: ".$usuario ;
	}
	else {
	
	echo "<br><br><font color='red'>AVISO!!</font> Problemas al insertar los datos.<br><br><br><br>";
	}
	
?>	
	<div class="sesion">
	<a href="menu_supervisor.php"><input type="submit" value="Finalizar" class="boton_finalizar_empleado"></a>
	</div>
	</div>
</div>
</div>
</body> 
</html>