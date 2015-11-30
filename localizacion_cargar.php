<html>
<head>
<link rel="stylesheet" type="text/css">
<style>
.boton{
width: "170px";
height:"40px";
background-color:#4682B4;
color: white;
font-size: 12pt;
font-weight: bold;
padding-left: 5px; 
margin: 20 0 0 80px;
border-radius: 30px;
}
.boton:hover{ background:#0000FF;
}

</style>
</head>
<body>
<?php
error_reporting(E_ERROR | E_WARNING | E_PARSE);
include('conexion.php');
	$lat=strip_tags(mysqli_real_escape_string($con,$_POST['lat']));
	$lng=strip_tags(mysqli_real_escape_string($con,$_POST['lng']));
	$pos=$lat.",".$lng;
	mysqli_query($con,"INSERT INTO coordenadas (Lat, Lng, Pos) values ('$lat','$lng','$pos')");
	echo "<b> Posición Guardada: </b>".$lat.", ".$lng;
	echo '<div>
	<a href="cargar_combustible1.php"><input type="submit" value="Continuar" class="boton"></a> 
	</div>';
?>
</body>
</html>