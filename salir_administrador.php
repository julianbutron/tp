<?php 
	SESSION_START();
	
/* comprobamos que un usuario registrado es el que accede al archivo, sino no tendría sentido que pasara por este archivo */
	if (!isset($_SESSION[administrador])) {
	header("location:../tp/login.php"); }

/* usamos la función session_unset() para liberar la variable de sesión que se encuentra registrada */
	session_unset($_SESSION[administrador]);

// Destruye la información de la sesión
	SESSION_DESTROY();

//volvemos a la página principal
	header("location:../tp/login.php"); 
	?>
