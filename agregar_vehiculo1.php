<html>
<head>
<title> Agregar nuevo veh&iacute;culo </title>
<link rel="stylesheet" type="text/css" href="estilos\agregar_vehiculo.css">
<script type="text/javascript" src="javascript\validar_campo_numerico.js"></script>
</head>
<body Background="imagenes\fondo.jpg">

<form ACTION= "agregar_vehiculo2.php" METHOD="POST">
<div id="contenedor">
	<div id="cabecera">
	<a href="menu_admin.php"><img src="imagenes\cerrar.png" class="imagen_atras"/></a>
		<div class="titulo">
		Agregar Nuevo Veh&iacute;culo
		</div>
	</div>
	<div id="cuerpo">
	<div class="titulos">
	Datos del Veh&iacute;culo 
	</div>
	<div class="titulos_pequeños">
	Los campos marcados con (<span style=color:crimson>*</span>) son obligatorios.
	</div>
<hr width="80%" align="center">

		<div class="campo">
<span style=color:crimson>*</span>Patente:<input type="text" name="patente" maxlength="6" class="campo_patente">
		</div>
		<div class="campo">
<span style=color:crimson>*</span>Nro.Chasis:<input type="text" name="chasis" class="campo_chasis">
		</div>
		<div class="campo">
<span style=color:crimson>*</span>Marca:<input type="text" name="marca" class="campo_marca">
		</div>
		<div class="campo">
<span style=color:crimson>*</span>Nro.Motor:<input type="text" name="motor" class="campo_motor">
		</div>
		<div class="campo">
<span style=color:crimson>*</span>Modelo:<input type="text" name="modelo" class="campo_modelo">
		</div>
		<div class="campo">
<span style=color:crimson>*</span>A&ntilde;o de Fabricaci&oacute;n: <input type="text" name="fabricacion"  class="campo_fabricacion" maxlength="4" onkeyUp="return ValNumero(this);">
		</div>	
	<input type="hidden" name="generar_codigo">	
	
	<div class="sesion">
	<input type="submit"  value="Guardar" class="boton">
	</div>
	</div>
</div>
</form>
</body>
</html>