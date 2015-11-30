<html>
<head>
<title> Consultar viaje 1 </title>
<link rel="stylesheet" type="text/css" href="estilos\consultar_viaje.css">
</head>
<body Background="imagenes\fondo.jpg">
<form ACTION= "consultar_viaje2.php" METHOD="POST">
<div id="contenedor">
	<div id="cabecera">
<a href="menu_usuario.php"><img src="imagenes\cerrar.png" class="imagen_atras"/></a>
		<div class="titulo">
		Viaje
		</div>
	</div>
	<div id="cuerpo">
	<div class="titulos">
	Ingrese numero DNI
	</div>
<hr width="80%" align="center">
	<div class="campo">
	<input type="text" name="palabra" maxlength="10" class="campo2">
	</div>
	<div class="campo">
	<input type="submit" name="buscador" value="Consultar" class="boton_continuar">
	</div>
</div>
</div>
</form>
</body>
</html>