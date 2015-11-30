<html>
<head>
<title> Buscar Mantenimiento </title>
<link rel="stylesheet" type="text/css" href="estilos\ver_lista_mantenimiento.css">
</head>
<body Background="imagenes\fondo.jpg">
<div id="contenedor">
	<div id="cabecera">
<a href="menu_supervisor.php"><img src="imagenes\cerrar.png" class="imagen_atras_buscar"/></a>
		<div class="titulo_buscar">
		Mantenimiento
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
$sql = "SELECT * FROM mantenimiento WHERE fecha LIKE '%$buscar%' ORDER BY cod ASC";
mysql_select_db($bd, $conexion);

$result = mysql_query($sql, $conexion);

// Tomamos el total de los resultados
$total = mysql_num_rows($result);

// Imprimimos los resultados
if ($row = mysql_fetch_array($result)){ 
echo "Resultados para la fecha: <font color='red'><b>$buscar</b></font>";
echo '<table border="1" cellpadding="0" align="center" cellspacing="0" width="100%" bgcolor="#F6F6F6" bordercolor="#FFFFFF">  
	<tr align="center">  
	  <td width="50"  style="font-weight: bold">C&oacute;d.		</td>  
      <td width="80"  style="font-weight: bold">Fecha			</td> 
	  <td width="90"  style="font-weight: bold">Id_Vehiculo		</td> 
	  <td width="80"  style="font-weight: bold">Km				</td>
	  <td width="100" style="font-weight: bold">Id_Mecanico		</td>
	  <td width="100" style="font-weight: bold">Mecanico_Ext	</td>
	  <td width="200" style="font-weight: bold">Repuesto		</td>
	  <td width="100" style="font-weight: bold">Costo			</td> 
    </tr> 
	</table>';
do { 
?>
<?.$row['cod'];?><?=
	  "<table border='1' cellpadding='0' align='center' cellspacing='0' width='100%' bgcolor='#F6F6F6' bordercolor='#FFFFFF'> 
	<tr align='center'> 
	  <td width='50'>".$row['cod'].			 "</td>   
      <td width='80'>".$row['fecha'].		 "</td>
	  <td width='90'>".$row['id_vehiculo'].	 "</td>
	  <td width='80'>".$row['km'].			 "</td>
	  <td width='100'>".$row['id_mecanico']. "</td> 
	  <td width='100'>".$row['mecanico_ext']."</td>
	  <td width='200'>".$row['repuesto'].	 "</td>
	  <td width='100'>".$row['costo'].		 "</td>
      </tr>
	  </table>";?>
<?php
} while ($row = mysql_fetch_array($result)); 
echo "<p>Resultados Encontrados: $total</p>";
} else { 
// En caso de no encontrar resultados
echo "<font color='red'> NO SE ENCONTRARON RESULTADOS PARA LA FECHA: <b>$buscar</b></font><br><br>"; 
}
}
}?> 

</div>
</div>  
</body>
</html>