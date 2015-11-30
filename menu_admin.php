<html>
<head>
<title> Menu Administrador </title>
<link rel="stylesheet" type="text/css" href="estilos\menu.css">
</head>
<body Background="imagenes\fondo.jpg">
<?php
//abrimos la sesión
	SESSION_START(); 

//Si la variable sesión está vacía
	if (!isset($_SESSION['administrador'])) {
	
//nos envía a la siguiente dirección en el caso de no poseer autorización
	header("location:../tp/login.php"); }
?>
<div id="contenedor">
	<div id="cabecera">
		<div class="titulo">
		Men&uacute; Principal
		</div>
	</div>
	<div id="cuerpo">
		<div class="campo">
		<a href="ABM_vehiculo.php"><img src="imagenes\vehiculo.png" title="Vehiculo" class="imagenes"/></a>
		<a href="ABM_mantenimiento.php"><img src="imagenes\mantenimiento.png" title="Mantenimiento" class="imagenes"/></a>	
		<a href="consultar_alarma1.php"><img src="imagenes\alarma.png" title="Alarma" class="imagenes"/></a>	
		<a href="ABM_viaje.php"><img src="imagenes\viaje.png" title="Viaje" class="imagenes"/></a>
		<a href="ABM_cliente.php"><img src="imagenes\cliente.png" title="Cliente" class="imagenes"/></a>
		<a href="salir_administrador.php"><img src="imagenes\salir.png" title="Salir" class="imagenes"/></a>
		</div>

		<!--Letras dentro de las imagenes -->
		<div class="letras_izquierdo">
		Veh&iacute;culo
		</div>
		<div class="letras_centro">
		Mantenimiento
		</div>
		<div class="letras_derecho">
		Alarma
		</div>
		<div class="letras_izquierdo_inferior">
		Viaje
		</div>
		<div class="letras_centro_inferior">
		Cliente
		</div>
		<div class="letras_derecho_inferior">
		Salir
		</div>
	</div>
</div>
</body>
</html>