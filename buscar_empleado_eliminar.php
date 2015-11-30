<html>
<head>
<title> Buscar Empleado </title>
<link rel="stylesheet" type="text/css" href="estilos\ver_lista_empleado.css">
</head>
<body Background="imagenes\fondo.jpg">
<div id="contenedor">
	<div id="cabecera">
<a href="menu_supervisor.php"><img src="imagenes\cerrar.png" class="imagen_atras"/></a>
		<div class="titulo_buscar">
		Empleado
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
$sql = "SELECT * FROM empleado WHERE apellido LIKE '%$buscar%' ORDER BY id ASC";
mysql_select_db($bd, $conexion);

$result = mysql_query($sql, $conexion);

// Tomamos el total de los resultados
$total = mysql_num_rows($result);

// Imprimimos los resultados
if ($row = mysql_fetch_array($result)){ 
echo "Resultados para: <font color='red'><b>$buscar</b></font>";
echo '  <table border="1" cellpadding="0" align="center" cellspacing="0" width="auto" bgcolor="#F6F6F6" bordercolor="#FFFFFF">  
	<tr align="center">  
	  <td width="50" style="font-weight: bold">ID				</td> 
      <td width="80" style="font-weight: bold">Dni				</td>  
      <td width="85" style="font-weight: bold">Fec. Nac.		</td>   
      <td width="140" style="font-weight: bold">Nombre			</td>  
      <td width="100" style="font-weight: bold">Apellido		</td>
	  <td width="140" style="font-weight: bold">Domicilio		</td> 
	  <td width="100" style="font-weight: bold">Localidad		</td>
	  <td width="120" style="font-weight: bold">Provincia		</td> 
	  <td width="40" style="font-weight: bold">Lic				</td>   
      <td width="70" style="font-weight: bold">Tel&eacute;fono  </td> 
    </tr> 
	 </table> ';
do { 
?>

<p><b><a href="eliminar_empleado1.php?id= <?.$row['id'];?>"><?=
	  "<table bgcolor='#BDC5F2' cellpadding='0' align='center' cellspacing='0' width='auto'>
	  <tr> 
	  <td width='50'>".$row['id'].				"</td> 
      <td width='80'>".$row['dni'].				"</td>  
      <td width='85'>".$row['fecha_nac'].		"</td>
	  <td width='140'>".$row['nombre'].			"</td> 
	  <td width='100'>".$row['apellido'].		"</td>
	  <td width='140'>".$row['domicilio'].		"</td>
	  <td width='100'>".$row['localidad'].		"</td>
	  <td width='120'>".$row['provincia'].		"</td>
	  <td width='40'>".$row['lic'].				"</td>
	  <td width='70'>".$row['telefono'].		"</td>
	  </tr>
	  </table>";?></a></b></p>
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