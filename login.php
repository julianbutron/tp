<html>
<head>
<title> Iniciar Sesi&oacute;n </title>
<link rel="stylesheet" type="text/css" href="estilos\login.css">
<script type="text/javascript" src="javascript\codigo1.js"></script>
</head>
<body Background="imagenes\fondo.jpg" width="10%">
<form METHOD= "POST" ACTION= "login_validar.php" ONSUBMIT="return validar(this)">
<div id="contenedor">
	<div id="cabecera">
		<div class="titulo">
		Iniciar Sesi&oacute;n
		</div>
	</div>
	<div id="cuerpo">
		<div class="campo">
		<input type="text" id="user" name="user" placeholder="Ingrese  Usuario" class="campo1">
		</div>
		<div class="campo">
		<input type="password" id="password" name="password" placeholder="Ingrese  Contrase&ntilde;a" class="campo2">
		</div>
		
		<div class="sesion">
		<input type="submit"  name="login" value="INGRESAR" class="boton">
		</div>
		</div>
</div>
</form>
</body>
</html>