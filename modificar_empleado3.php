<html> 
<head> 
<title> Modificar Empleado 3 </title> 
<link rel="stylesheet" type="text/css" href="estilos\aviso.css">
</head> 
<body Background="imagenes\fondo.jpg">
<div id="contenedor">
	<div id="cabecera">
	</div>
	<div id="cuerpo">
	<div class="letras_aviso">
<?php 
    $dni=$_POST['dni'];
	$fecha_nac=$_POST['fecha_nac'];
    $nombre=$_POST['nombre'];
    $apellido=$_POST['apellido'];
	$domicilio = $_POST['domicilio'];
	$localidad = $_POST['localidad'];
	$provincia = $_POST['provincia'];
    $lic=$_POST['lic'];
	$telefono=$_POST['telefono'];
	$id_cargo = $_POST['id_cargo']; 
	$id_rol = $_POST['id_rol']; 
	$usuario = $_POST['usuario'];
	$clave = $_POST['password'];
	$clave_codificado = md5($clave);
	include('conexion_bd.php');
	$consulta=	"UPDATE empleado
				SET fecha_nac='$fecha_nac', 
					nombre='$nombre', apellido='$apellido',
					domicilio= '$domicilio', localidad= '$localidad', provincia= '$provincia',
					lic='$lic', telefono='$telefono', id_cargo= '$id_cargo',
					id_rol= '$id_rol', usuario= '$usuario', password= '$clave_codificado'
				WHERE dni='$dni'"; 
	mysql_query($consulta); 
    mysql_close($conexion);
	echo '<font color="green">Los datos han sido actualizados con exito.</font><br>';
	echo "Dni: ".$dni." "." Fecha Nac: ".$fecha_nac."<br>".
	$nombre." ".$apellido."<br>".
	$domicilio.", ".$localidad.", ".$provincia."<br>".
	"Tipo Lic: ".$lic."  "."Telefono: ".$telefono."<br>".
	"Id Cargo: ".$id_cargo."<br>".
	"Id Rol: ".$id_rol."<br>".
	"User: ".$usuario ;
	
	echo '<div class="sesion">
	<a href="menu_supervisor.php"><input type="submit" value="Finalizar" class="boton_finalizar_empleado"></a>
	</div>';
?> 
</div>
</div>
</div>
</body> 
</html>