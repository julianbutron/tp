<html>
<head>
<title> Login Validar </title>
<link rel="stylesheet" type="text/css" href="estilos\login.css">
</head>
<body Background="imagenes\fondo.jpg">
<?php
//Nos conectamos al motor Mysql
	include("conexion_bd.php");

//Recibimos las dos variables
	$usuario = $_POST['user'];
	$clave =   $_POST['password'];

//Variable donde se guardar la contraseña encriptada en md5, usaremos la funcion md5() de PHP:	
	$clave_codificado = md5($clave);

// Realizamos una consulta por cada tabla para buscar en que tabla se encuentra el usuario que está intentando acceder */
$usuarios = 	 mysql_query("SELECT * FROM empleado WHERE id_rol= 1 AND usuario = '$usuario' AND password = '$clave_codificado'");
$administrador = mysql_query("SELECT * FROM empleado WHERE id_rol= 2 AND usuario = '$usuario' AND password = '$clave_codificado'");
$supervisor = 	 mysql_query("SELECT * FROM empleado WHERE id_rol= 3 AND usuario = '$usuario' AND password = '$clave_codificado'");
  
/* En el caso que exista el usuario se encontrará en una de estas tres tablas, 
por lo tanto se guardará en alguno de nuestras tres variables que guardan nuestra consulta*/
/* Ahora comprobamos que variable contiene al usuario*/
if(mysql_num_rows($usuarios) > 0) {	

/* Si entra en este if significa que el que intenta acceder es un chofer, por lo tanto le creamos una sesión */
	SESSION_START();
	$_SESSION['usuarios']= "$usuario";

/* Nos dirigimos al espacio del chofer usando header que nos redireccionará a la página que le indiquemos */
	header('location:menu_usuario.php');

//liberamos la base de datos
	mysql_free_result($usuarios);

/*terminamos la ejecución ya que si redireccionamos ya no nos interesa seguir con el código PHP en este archivo */
	exit(); }

//Ahora comprobamos si el que intenta acceder es un administrador
	else if(mysql_num_rows($administrador) > 0) {
	SESSION_START();
	$_SESSION['administrador']="$usuario";
	header('location:menu_admin.php');
	mysql_free_result($administrador);
	exit(); }

//comprobamos si es un supervisor el que intenta abrir la sesión
	else if(mysql_num_rows($supervisor) > 0) {
	SESSION_START();
	$_SESSION['supervisor']="$usuario";
	header('location:menu_supervisor.php');
	mysql_free_result($supervisor);
	exit();
	} else {

//Si no el usuario no se encuentra en ninguna de las tres tablas imprime el siguiente mensaje
    echo '<div id="contenedor">
				<div id="cabecera">
				</div>
		 <div id="cuerpo_login_validar">
		    <div class="letras_login_validar">
		<font color="red"><br><br>El usuario y la contrase&ntilde;a son incorrectos.</font>
		<div><a href="login.php"> Volver </a></div>
			</div>		
		 </div>
		</div>';
}
?>
</body>
</html>