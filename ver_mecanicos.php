<html>
<head>
<title> Ver mecanicos</title>
<link rel="stylesheet" type="text/css" href="estilos\ver_lista_empleado.css">
</head>
<body Background="imagenes\fondo.jpg">
<div id="contenedor">
	<div id="cabecera">
	
<!-- diseño de cabecera con buscador-->	
	<form ACTION="buscar_mecanico.php" METHOD="POST">
	<div class="buscar">
	<input type="text" name="palabra" placeholder="Ingrese Apellido" class="campo_buscar">
	<input type="submit" name="buscador" value="Buscar" class="campo_buscador">	
	</form>	
		<div class="titulo">
		Mecanicos
		</div>
		<a href="menu_supervisor.php"><img src="imagenes\cerrar.png" class="imagen_atras"/></a>
	</div> 
<!----------------------->

<div id="cuerpo">
  <table border='1' cellpadding='0' align="center" cellspacing='0' width='auto' bgcolor='#F6F6F6' bordercolor='#FFFFFF'>  
	<tr align="center">  
	  <td width='50'	style='font-weight: bold'>ID			 </td> 
      <td width='80'	style='font-weight: bold'>Dni			 </td>  
      <td width='85'	style='font-weight: bold'>Fec. Nac.		 </td>   
      <td width='140'	style='font-weight: bold'>Nombre	 	 </td>  
      <td width='100'	style='font-weight: bold'>Apellido		 </td>
	  <td width='150'	style='font-weight: bold'>Domicilio		 </td> 
	  <td width='110'	style='font-weight: bold'>Localidad		 </td>
	  <td width='130'	style='font-weight: bold'>Provincia	     </td> 
	  <td width='40'	style='font-weight: bold'>Lic			 </td> 
	  <td width='100'	style='font-weight: bold'>Tel&eacute;fono</td> 
      <td width='50'	style='font-weight: bold'>ID_Rol		 </td> 
	  <td width='140'	style='font-weight: bold'>Usuario	     </td> 
    </tr> 
<?php
	include('conexion_bd.php');
	$cadena ="SELECT * FROM empleado WHERE id_cargo= 4";
	$tabla = mysql_query($cadena);

	while ($registro = mysql_fetch_array($tabla)){
	echo " 
    <tr> 
	  <td width='50'>"	.$registro['id'].		"</td> 
      <td width='80'>"	.$registro['dni'].		"</td>  
      <td width='85'>"	.$registro['fecha_nac']."</td>
	  <td width='140'>"	.$registro['nombre'].	"</td> 
	  <td width='100'>"	.$registro['apellido'].	"</td>
	  <td width='150'>"	.$registro['domicilio']."</td>
	  <td width='110'>"	.$registro['localidad']."</td>
	  <td width='130'>"	.$registro['provincia']."</td>
	  <td width='40'>"	.$registro['lic'].		"</td>
	  <td width='100'>"	.$registro['telefono'].	"</td>
	  <td width='50'>"	.$registro['id_rol'].	"</td>
	  <td width='140'>"	.$registro['usuario'].	"</td>
    </tr>  ";
} 	
?>
 </table>  
 <a href= "generar_pdf_mecanicos.php"><input type="submit" value="Exportar PDF" class="boton_pdf"></a>
 <a href= "pantalla.php"><input type="submit" value="Salir" class="boton_salir"></a>
</div>
</div>  
</body>
</html>