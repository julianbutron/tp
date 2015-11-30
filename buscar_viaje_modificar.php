<html>
<head>
<title> Buscar Viaje </title>
<link rel="stylesheet" type="text/css" href="estilos\ver_lista_viajes.css">
</head>
<body Background="imagenes\fondo.jpg">
<div id="contenedor">
	<div id="cabecera">
<a href="menu_admin.php"><img src="imagenes\cerrar.png" class="imagen_atras_buscar"/></a>
		<div class="titulo_buscar">
		Viaje
		</div>
	</div> 
<div id="cuerpo">
<?php
if ($_POST['buscador'])
{ 
// Tomamos el valor ingresado
$buscar = $_POST['palabra'];

// Si está vacío, lo informamos, sino realizamos la búsqueda
if(empty($buscar))
{
echo "<font color='red'> NO SE HA INGRESADO UNA FECHA A BUSCAR </font><br><br>";
}else{
// Conexión a la base de datos y seleccion de registros
include('conexion_bd.php');
$sql = "SELECT * FROM viaje WHERE fecha_partida LIKE '%$buscar%' ORDER BY cod ASC";
mysql_select_db($bd, $conexion);

$result = mysql_query($sql, $conexion);

// Tomamos el total de los resultados
$total = mysql_num_rows($result);

// Imprimimos los resultados
if ($row = mysql_fetch_array($result)){ 
echo "Resultados para: <font color='red'><b>$buscar</b></font>";
echo '<table border="1" cellpadding="0" align="center" cellspacing="0" width="100%" bgcolor="#F6F6F6" bordercolor="#FFFFFF">
	<tr align="center">  
	  <td width="35"  style="font-weight: bold">C&oacute;d.		 	</td>  
      <td width="80"  style="font-weight: bold">Fec. Partida	 	</td> 
	  <td width="80"  style="font-weight: bold">Fec. Llegada	 	</td> 
	  <td width="60"  style="font-weight: bold">Id_Cliente		 	</td>
	  <td width="60"  style="font-weight: bold">Tipo Carga		 	</td>
	  <td width="240" style="font-weight: bold">Origen			 	</td>
	  <td width="240" style="font-weight: bold">Destino			 	</td>
	  <td width="50"  style="font-weight: bold">Id_Veh&iacute;culo	</td> 
      <td width="50"  style="font-weight: bold">Id_Chofer		 	</td> 
	  <td width="30"  style="font-weight: bold">Combus.			 	</td>   
	  <td width="40"  style="font-weight: bold">Km Rec.			 	</td> 
	  <td width="30"  style="font-weight: bold">HS				 	</td> 
    </tr> 
	</table>';
do { 
?>
<p><b><a href="modificar_viaje1.php?id= <?.$row['cod'];?>"><?=
	  " <table bgcolor='#BDC5F2' cellpadding='0' align='center' cellspacing='0' width='100%'>
	<tr align='center'> 
	  <td width='25'>".$row['cod'].					"</td>   
      <td width='60'>".$row['fecha_partida'].		"</td>
	  <td width='60'>".$row['fecha_llegada'].		"</td>
	  <td width='38'>".$row['id_cliente'].			"</td>
	  <td width='60'>".$row['tipo_carga'].			"</td> 
	  <td width='180'>".$row['domicilio_o'].", ".$row['ciudad_o'].", ".$row['provincia_o'].", ".$row['pais_o']."</td> 
	  <td width='180'>".$row['domicilio_d'].", ".$row['ciudad_d'].", ".$row['provincia_d'].", ".$row['pais_d']."</td> 
	  <td width='50'>".$row['id_vehiculo'].			"</td>
	  <td width='50'>".$row['id_chofer'].			"</td>
	  <td width='30'>".$row['combustible'].			"</td>
	  <td width='25'>".$row['km'].					"</td>
	  <td width='25'>".$row['horas'].				"</td>
      </tr>
	  </table>";?></a></b></p>
<?php
} while ($row = mysql_fetch_array($result)); 
echo "<p>Resultados Encontrados: $total</p>";
} else { 
// En caso de no encontrar resultados
echo "<font color='red'> NO SE ENCONTRARON RESULTADOS PARA: <b>$buscar</b></font><br><br>"; 
}
}
}?> 
</div>
</div>  
</body>
</html>