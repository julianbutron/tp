<html>
<head>
<title> Ver viajes </title>
<link rel="stylesheet" type="text/css" href="estilos\ver_lista_viajes.css">
<script type="text/javascript" src="javascript\validar_fecha.js"></script>
</head>
<body Background="imagenes\fondo.jpg">
<div id="contenedor">
	<div id="cabecera">
	
<!-- diseño de cabecera con buscador-->	
	<form ACTION="buscar_lista_viajes.php" METHOD="POST">
	<div class="buscar">
	<input type="text" name="palabra" placeholder="YYYY-MM-DD" class="campo_buscar" onKeyUp = "this.value=formateafecha(this.value);">
	<input type="submit" name="buscador" value="Buscar" class="campo_buscador">	
	</form>	
		<div class="titulo">
		Viajes
		</div>
		<a href="menu_supervisor.php"><img src="imagenes\cerrar.png" class="imagen_atras"/></a>
	</div> 
<!----------------------->

<div id="cuerpo">
  <table border='1' cellpadding='0' align="center" cellspacing='0' width='100%' style="font-size:13px" bgcolor='#F6F6F6' bordercolor='#FFFFFF'>  
	<tr align="center">  
	  <td width='35' style='font-weight: bold'>C&oacute;d.		 </td>  
      <td width='80' style='font-weight: bold'>Fec. Partida		 </td> 
	  <td width='80' style='font-weight: bold'>Fec. Llegada		 </td> 
	  <td width='50' style='font-weight: bold'>Id_Cliente		 </td>
	  <td width='60' style='font-weight: bold'>Tipo Carga		 </td>
	  <td width='240' style='font-weight: bold'>Origen			 </td>
	  <td width='240' style='font-weight: bold'>Destino			 </td>
	  <td width='50' style='font-weight: bold'>Id_Veh&iacute;culo</td> 
      <td width='50' style='font-weight: bold'>Id_Chofer		 </td> 
	  <td width='30' style='font-weight: bold'>Combus.			 </td>   
	  <td width='40' style='font-weight: bold'>Km Rec.			 </td> 
	  <td width='30' style='font-weight: bold'>HS				 </td> 
    </tr> 
<?php
	include('conexion_bd.php');
	$cadena ="SELECT * FROM viaje";
	$tabla = mysql_query($cadena);

	while ($registro = mysql_fetch_array($tabla)){
	echo " 
    <tr align='center'> 
	  <td width='35'>".$registro['cod'].			"</td>   
      <td width='80'>".$registro['fecha_partida'].	"</td>
	  <td width='80'>".$registro['fecha_llegada'].	"</td>
	  <td width='50'>".$registro['id_cliente'].		"</td>
	  <td width='60'>".$registro['tipo_carga'].		"</td> 
	  <td width='240'>".$registro['domicilio_o'].", ".$registro['ciudad_o'].", ".$registro['provincia_o'].", ".$registro['pais_o']."</td> 
	  <td width='240'>".$registro['domicilio_d'].", ".$registro['ciudad_d'].", ".$registro['provincia_d'].", ".$registro['pais_d']."</td> 
	  <td width='50'>".$registro['id_vehiculo'].	"</td>
	  <td width='50'>".$registro['id_chofer'].		"</td>
	  <td width='30'>".$registro['combustible'].	"</td>
	  <td width='40'>".$registro['km'].				"</td>
	  <td width='30'>".$registro['horas'].			"</td>
    </tr>  ";
} 	
?>
 </table>  
 <a href= "generar_pdf_viajes.php"><input type="submit" value="Exportar PDF" class="boton_pdf"></a>
 <a href= "pantalla.php"><input type="submit" value="Salir" class="boton_salir"></a>
</div>
</div>  
</body>
</html>