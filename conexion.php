<?php
$con=mysqli_connect("localhost","root","1234","empresalogistica");
if (mysqli_connect_errno())
{
	echo "Error en la conexión: " . mysqli_connect_error();
}
mysqli_set_charset($con,"utf8");
?>