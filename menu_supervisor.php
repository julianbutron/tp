<html>
<head>
<title> Menu Supervisor </title>
<link rel="stylesheet" type="text/css" href="estilos\menu.css">
</head>
<body Background="imagenes\fondo.jpg">
<?php
//abrimos la sesión
	SESSION_START();

//Si la variable sesión está vacía
	if (!isset($_SESSION['supervisor'])) {
	
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
		<a href="ABM_supervisor1.php"><img src="imagenes\usuario.png" title="Empleado" class="imagenes"/></a>
		<a href="pantalla.php"><img src="imagenes\pantalla.png" title="Pantalla" class="imagenes"/></a>
		<a href="reporte_estadistico.php"><img src="imagenes\reporte_estadistico.png" title="Estadisticas" class="imagenes"/></a>
		<a href="seguimiento.php"><img src="imagenes\localizacion.png" title="Localizacion" class="imagenes"/></a>
		<a href="calendario.php"><img src="imagenes\calendario.png" title="Calendario" class="imagenes"/></a>
		<a href="salir_supervisor.php"><img src="imagenes\salir.png" title="Salir" class="imagenes"/></a>
		</div>
		
		<!--Letras dentro de las imagenes -->
		<div class="letras_izquierdo">
		Empleado
		</div>
		<div class="letras_centro">
		Registros
		</div>
		<div class="letras_derecho">
		Estadisticas
		</div>
		<div class="letras_izquierdo_inferior">
		Localizaci&oacute;n
		</div>
		<div class="letras_centro_inferior">
		Calendario
		</div>
		<div class="letras_derecho_inferior">
		Salir
		</div>

	</div>
</div>
</body>
</html>