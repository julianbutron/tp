<?php
$host = "localhost";
$user = "root";
$pw = "1234";
$bd = "empresalogistica";
	
	$conexion= mysql_connect($host, $user, $pw) or die ("problema de conexion");
	mysql_select_db($bd, $conexion)or die ("problema de bd");	
	
?>