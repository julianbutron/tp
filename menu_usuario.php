<html>
<head>
<title> Menu Chofer </title>
<link rel="stylesheet" type="text/css" href="estilos\menu_usuario.css">
</head>
<body Background="imagenes\fondo.jpg">
<?php
//abrimos la sesión
	SESSION_START();

//Si la variable sesión está vacía
	if (!isset($_SESSION['usuarios'])) {
	
//nos envía a la siguiente dirección en el caso de no poseer autorización
	header("location:../tp/login.php"); 
	}
?>
<div id="contenedor">
	<div id="cabecera">
		<div class="titulo">
		Men&uacute; Principal
		</div>
	</div>
	<div id="cuerpo">
		<div class="campo">
		<a href="localizacion.php"><img src="imagenes\combustible.png" title="Combustible" class="imagenes"/></a>
		<a href="alta_alarma1.php"><img src="imagenes\reporte.png" title="Reportar" class="imagenes"/></a>	
		<a href="consultar_viaje1.php"><img src="imagenes\viaje.png" title="Viaje" class="imagenes"/></a>
		<a href="salir_usuario.php"><img src="imagenes\salir.png" title="Salir" class="imagenes"/></a>
		</div>
		
		<!--Letras dentro de las imagenes -->
		<div class="letras_izquierdo">
		Cargar
		</div>
		<div class="letras_centro1">
		Reportar
		</div>
		<div class="letras_centro2">
		Consultar
		</div>
		<div class="letras_derecho">
		Salir
		</div>
	</div>
</div>
</body>
</html>