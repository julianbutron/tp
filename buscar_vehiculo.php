<html>
<head>
<title> Buscar Veh&iacute;culo </title>
<link rel="stylesheet" type="text/css" href="estilos\ver_lista_vehiculos.css">
</head>
<body Background="imagenes\fondo.jpg">
<div id="contenedor">
	<div id="cabecera">
<a href="menu_supervisor.php"><img src="imagenes\cerrar.png" class="imagen_atras_buscar"/></a>
		<div class="titulo_buscar">
		Veh&iacute;culo
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
echo "<p><font color='red'> NO SE HA INGRESADO UNA CADENA A BUSCAR </font></p>";
}else{
// Conexión a la base de datos y seleccion de registros
include('conexion_bd.php');
$sql = "SELECT * FROM vehiculo WHERE patente LIKE '%$buscar%' ORDER BY id ASC";
mysql_select_db($bd, $conexion);

$result = mysql_query($sql, $conexion);

// Tomamos el total de los resultados
$total = mysql_num_rows($result);

// Imprimimos los resultados
if ($row = mysql_fetch_array($result)){ 
echo "Resultados para: <font color='red'><b>$buscar</b></font>";
echo '<table border="1" cellpadding="0" align="center" cellspacing="0" width="100%" bgcolor="#F6F6F6" bordercolor="#FFFFFF">  
	<tr align="center">  
	  <td width="70"  style="font-weight: bold">ID			</td> 
      <td width="130" style="font-weight: bold">patente		</td>  
      <td width="200" style="font-weight: bold">Chasis		</td>   
      <td width="200" style="font-weight: bold">Marca		</td>  
      <td width="200" style="font-weight: bold">Motor		</td>
	  <td width="130" style="font-weight: bold">Fabricacion </td> 
    </tr> 
	</table>';
do { 
?>
<?.$row['id'];?><?=
	  "<table border='1' cellpadding='0' align='center' cellspacing='0' width='100%' bgcolor='#F6F6F6' bordercolor='#FFFFFF'> 
	  <tr align='center'> 
	  <td width='70'>".$row['id']."			 </td> 
      <td width='130'>".$row['patente']."	 </td>  
      <td width='200'>".$row['chasis']."	 </td>
	  <td width='200'>".$row['marca']."		 </td> 
	  <td width='200'>".$row['motor']."		 </td>
	  <td width='130'>".$row['fabricacion']."</td>
	  </tr>
	  </table>";?>
<?php
} while ($row = mysql_fetch_array($result)); 
echo "<p>Resultados Encontrados: $total</p>";
} else { 
// En caso de no encontrar resultados
echo "<p><font color='red'>NO SE ENCONTRARON RESULTADOS PARA: <b>$buscar</b></font></p>"; 
}
}
}?> 
</div>
</div>  
</body>
</html>