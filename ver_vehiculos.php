<html>
<head>
<title> Ver veh&iacute;culos </title>
<link rel="stylesheet" type="text/css" href="estilos\ver_lista_vehiculos.css">
</head>
<body Background="imagenes\fondo.jpg">
<div id="contenedor">
	<div id="cabecera">
	
	<!-- diseño de cabecera con buscador-->	
	<form ACTION="buscar_vehiculo.php" METHOD="POST">
	<div class="buscar">
	<input type="text" name="palabra" placeholder="Ingrese Patente" class="campo_buscar">
	<input type="submit" name="buscador" value="Buscar" class="campo_buscador">	
	</form>	
		<div class="titulo">
		Veh&iacute;culos
		</div>
		<a href="menu_supervisor.php"><img src="imagenes\cerrar.png" class="imagen_atras"/></a>
	</div> 
<!----------------------->

<div id="cuerpo">
  <table border='1' cellpadding='0' align="center" cellspacing='0' width='auto' bgcolor='#F6F6F6' bordercolor='#FFFFFF'>  
	<tr align="center">  
	  <td width='70' style='font-weight: bold'>ID							 </td> 
	  <td width='130' style='font-weight: bold'>Patente						 </td> 
      <td width='200' style='font-weight: bold'>Chasis						 </td>  
      <td width='200' style='font-weight: bold'>Marca						 </td>   
      <td width='200' style='font-weight: bold'>Motor						 </td>  
      <td width='130' style='font-weight: bold'>A&ntilde;o Fabricaci&oacute;n</td> 
    </tr> 
<?php
	include('conexion_bd.php');
	$cadena ="SELECT * FROM vehiculo";
	$tabla = mysql_query($cadena);

	while ($registro = mysql_fetch_array($tabla)){
	echo " 
    <tr align='center'> 
	  <td width='70'>".$registro['id'].			 "</td> 
	  <td width='130'>".$registro['patente'].	 "</td> 
      <td width='200'>".$registro['chasis'].	 "</td>  
      <td width='200'>".$registro['marca'].		 "</td>  
	  <td width='200'>".$registro['motor'].		 "</td> 
	  <td width='130'>".$registro['fabricacion']."</td> 
    </tr>  ";
} 	
?>
 </table>  
 <a href= "generar_pdf_vehiculos.php"><input type="submit" value="Exportar PDF" class="boton_pdf"></a>
 <a href= "pantalla.php"><input type="submit" value="Salir" class="boton_salir"></a>
</div>
</div>  
</body>
</html>