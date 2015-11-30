<html>
<head>
<title> Consultar Alarma </title>

<link rel="stylesheet" type="text/css" href="estilos\ver_alarmas.css">
</head>
<body Background="imagenes\fondo.jpg">
<div id="contenedor">
	<div id="cabecera">
<a href="menu_admin.php"><img src="imagenes\cerrar.png" class="imagen_atras"/></a>
		<div class="titulo_alarma">
		Alarmas
		</div>
	</div> 
<div id="cuerpo">
  <table border='1' cellpadding='0' align="center" cellspacing='0' width='100%' bgcolor='#F6F6F6' bordercolor='#FFFFFF'>  
	<tr align="center">  
	  <td width='50' 	style='font-weight: bold'>ID			</td> 
      <td width='80' 	style='font-weight: bold'>Id_Chofer		</td>  
      <td width='80' 	style='font-weight: bold'>Fecha			</td>   
      <td width='140' 	style='font-weight: bold'>Id_Vehiculo	</td>  
	  <td width='50' 	style='font-weight: bold'>Aceite		</td>
	  <td width='50' 	style='font-weight: bold'>Frenos		</td>
	  <td width='50' 	style='font-weight: bold'>Llantas		</td>
	  <td width='50' 	style='font-weight: bold'>Bateria		</td>

    </tr> 
<?php
	include('conexion_bd.php');
	$cadena ="SELECT * FROM alarmas ";
	$tabla = mysql_query($cadena);

	while ($row=mysql_fetch_array($tabla)){
	$km= $row['km_rec'];
	
	//Alertas del vehiculo. Si Km es mayor o igual a 5000 KM 
	if ($km >= 5000){
	echo "<tr align='center'>	
	  <td width='50'>".$row['id'].							"</td> 
      <td width='80'>".$row['id_chofer'].					"</td>  
      <td width='80'>".$row['fecha'].						"</td>
	  <td width='140'>".$row['id_vehiculo'].				"</td> 
	  <td width='50'><font color ='red'>VENCIDO</font>   	 </td>
	  <td width='50'><font color ='red'>VENCIDO</font> 	 	 </td>
	  <td width='50'><font color ='red'>VENCIDO</font> 		 </td>
	  <td width='50'><font color ='orange'>VENCERA</font> 	 </td>
		</tr>";	
	}
	
	//Alertas del vehiculo. Si Km es mayor o igual a 2000 KM.
	else if ($km >= 2000){
	echo "<tr align='center'>	
	  <td width='50'>".$row['id'].							"</td> 
      <td width='80'>".$row['id_chofer'].					"</td>  
      <td width='80'>".$row['fecha'].						"</td>
	  <td width='140'>".$row['id_vehiculo'].				"</td> 
	  <td width='50'><font color ='red'>VENCIDO</font>   	 </td>
	  <td width='50'><font color ='red'>VENCIDO</font> 	 	 </td>
	  <td width='50'><font color ='orange'>VENCERA</font> 	 </td>
	  <td width='50'><font color ='green'>OK</font> 	 	 </td>
		</tr>";	
	}
	
	//Alertas del vehiculo. Si Km es mayor o igual a 1000 KM.
	else if ($km >= 1000) {
	echo "<tr align='center'>	
	  <td width='50'>".$row['id'].							"</td> 
      <td width='80'>".$row['id_chofer'].					"</td>  
      <td width='80'>".$row['fecha'].						"</td>
	  <td width='140'>".$row['id_vehiculo'].				"</td> 
	  <td width='50'><font color ='red'>VENCIDO</font> 	 	 </td>
	  <td width='50'><font color ='orange'>VENCERA</font> 	 </td>
	  <td width='50'><font color ='green'>OK</font> 		 </td>
	  <td width='50'><font color ='green'>OK</font> 		 </td>
		</tr>";	
	}
	
	//Alertas del vehiculo. Si Km es mayor o igual a 100 KM.
	else if ($km >= 100) {
	echo "<tr align='center'>	
	  <td width='50'>".$row['id'].							"</td> 
      <td width='80'>".$row['id_chofer'].					"</td>  
      <td width='80'>".$row['fecha'].						"</td>
	  <td width='140'>".$row['id_vehiculo'].				"</td> 
	  <td width='50'><font color ='orange'>VENCERA</font> 	 </td>
	  <td width='50'><font color ='green'>OK</font> 	 	 </td>
	  <td width='50'><font color ='green'>OK</font> 	 	 </td>
	  <td width='50'><font color ='green'>OK</font> 	 	 </td>
		</tr>";	
	}
	
	//Alertas del vehiculo. En el caso que sea menor a 100 KM.
	else {
		echo "<tr align='center'>	
	  <td width='50'>".$row['id'].							 "</td> 
      <td width='80'>".$row['id_chofer'].					 "</td>  
      <td width='80'>".$row['fecha'].						 "</td>
	  <td width='140'>".$row['id_vehiculo'].				 "</td> 
	  <td width='50'><font color ='green'>OK</font>	 		  </td> 
	  <td width='50'><font color ='green'>OK</font> 	 	  </td>
	  <td width='50'><font color ='green'>OK</font> 	  	  </td>
	  <td width='50'><font color ='green'>OK</font> 	  	  </td>
		</tr>";	
	}
}
?>
 </table>  
</div>
</div>  
</body>
</html>