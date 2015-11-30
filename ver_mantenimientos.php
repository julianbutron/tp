<html>
<head>
<title> Ver mantenimientos </title>
<link rel="stylesheet" type="text/css" href="estilos\ver_lista_mantenimiento.css">
<script type="text/javascript" src="javascript\validar_fecha.js"></script>
</head>
<body Background="imagenes\fondo.jpg">
<div id="contenedor">
	<div id="cabecera">
	
<!-- diseño de cabecera con buscador-->	
	<form ACTION="buscar_mantenimiento.php" METHOD="POST">
	<div class="buscar">
	<input type="text" name="palabra" placeholder="YYYY-MM-DD" class="campo_buscar" onKeyUp = "this.value=formateafecha(this.value);">
	<input type="submit" name="buscador" value="Buscar" class="campo_buscador">	
	</form>	
		<div class="titulo">
		Mantenimientos
		</div>
		<a href="menu_supervisor.php"><img src="imagenes\cerrar.png" class="imagen_atras"/></a>
	</div> 
<!----------------------->
<div id="cuerpo">
  <table border='1' cellpadding='0' align="center" cellspacing='0' width='auto' bgcolor='#F6F6F6' bordercolor='#FFFFFF'>  
	<tr align="center">  
	  <td width='50' style='font-weight: bold'>C&oacute;d.		  </td>  
      <td width='80' style='font-weight: bold'>Fecha			  </td>  
	  <td width='90' style='font-weight: bold'>Id_Veh&iacute;culo </td> 
      <td width='80' style='font-weight: bold'>Km Rec.			  </td>  
      <td width='100' style='font-weight: bold'>Id_Mecanico		  </td> 
	  <td width='100' style='font-weight: bold'>Mecanico Ext.	  </td>   
	  <td width='200' style='font-weight: bold'>Respuesto		  </td> 
	  <td width='100' style='font-weight: bold'>Importe			  </td> 
    </tr> 
<?php
	include('conexion_bd.php');
	$cadena ="SELECT * FROM mantenimiento ORDER BY cod DESC";
	$tabla = mysql_query($cadena);

	while ($registro = mysql_fetch_array($tabla)){
	echo " 
    <tr align='center' > 
	  <td width='50'>".$registro['cod'].		  "</td>   
      <td width='80'>".$registro['fecha'].		  "</td>
	  <td width='90'>".$registro['id_vehiculo'].  "</td> 
	  <td width='80'>".$registro['km'].			  "</td>
	  <td width='100'>".$registro['id_mecanico']. "</td> 
	  <td width='100'>".$registro['mecanico_ext']."</td>
	  <td width='200'>".$registro['repuesto'].	  "</td>
	  <td width='100'>$".$registro['costo'].	  "</td>
    </tr>  ";
} 	
?>
 </table>  
 <a href= "generar_pdf_mantenimientos.php"><input type="submit" value="Exportar PDF" class="boton_pdf"></a>
 <a href= "pantalla.php"><input type="submit" value="Salir" class="boton_salir"></a>
</div>
</div>  
</body>
</html>