<html>
<head>
<title> Agregar nuevo Cliente </title>
<link rel="stylesheet" type="text/css" href="estilos\agregar_cliente.css">
<script type="text/javascript" src="javascript\validar_campo_numerico.js"></script>
</head>
<body Background="imagenes\fondo.jpg">
<form ACTION= "agregar_cliente2.php" METHOD="POST">
<div id="contenedor">
	<div id="cabecera">
	<a href="menu_admin.php"><img src="imagenes\cerrar.png" class="imagen_atras"/></a>
		<div class="titulo">
	Agregar Nuevo Cliente
		</div>
	</div>
	<div id="cuerpo">
	<div class="titulos_pequeños">
	Los campos marcados con (<span style=color:crimson>*</span>) son obligatorios.
	</div>
	<div class="titulos">
	Datos del Cliente
	</div>
<hr width="80%" align="center">

		<div class="campo">
<span style=color:crimson>*</span>Razon Social: <input type="text" name="rs" class="campo_rs">
		</div>
		<div class="campo">
<span style=color:crimson>*</span>Email:<input type="text" name="email" class="campo_email">
		</div>

		<div class="campo">
<span style=color:crimson>*</span>Tel&eacute;fono:	<input type="text" name="telefono" maxlength="10" class="campo_tel" onkeyUp="return ValNumero(this);">
		</div>
	
	<div class="sesion">
	<input type="submit" value="Guardar" class="boton">
	</div>
	</div>
</div>
</form>
</body>
</html>