<html>
<head>
<title> Buscar Mecanico </title>
<link rel="stylesheet" type="text/css" href="estilos\ver_lista_empleado.css">
</head>
<body Background="imagenes\fondo.jpg">
<div id="contenedor">
	<div id="cabecera">
<a href="menu_supervisor.php"><img src="imagenes\cerrar.png" class="imagen_atras_buscar"/></a>
		<div class="titulo_buscar">
		Mecanico
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
$sql = "SELECT * FROM empleado WHERE apellido LIKE '%$buscar%' AND id_cargo = 4 ORDER BY id ASC";
mysql_select_db($bd, $conexion);

$result = mysql_query($sql, $conexion);

// Tomamos el total de los resultados
$total = mysql_num_rows($result);

// Imprimimos los resultados
if ($row = mysql_fetch_array($result)){ 
echo "Resultados para: <font color='red'><b>$buscar</b></font>";
echo '  <table border="1" cellpadding="0" align="center" cellspacing="0" width="100%" bgcolor="#F6F6F6" bordercolor="#FFFFFF">  
	<tr align="center">  
	  <td width="50"  style="font-weight: bold">ID				</td> 
      <td width="80"  style="font-weight: bold">Dni				</td>  
      <td width="85"  style="font-weight: bold">Fec. Nac.		</td>   
      <td width="140" style="font-weight: bold">Nombre			</td>  
      <td width="100" style="font-weight: bold">Apellido		</td>
	  <td width="150" style="font-weight: bold">Domicilio		</td> 
	  <td width="110" style="font-weight: bold">Localidad		</td>
	  <td width="130" style="font-weight: bold">Provincia		</td> 
	  <td width="40"  style="font-weight: bold">Lic				</td>   
      <td width="100" style="font-weight: bold">Tel&eacute;fono	</td>
	  <td width="50"  style="font-weight: bold">Id_Rol			</td>
	  <td width="140" style="font-weight: bold">usuario			</td> 
    </tr> 
	</table>
	';
do { 
?>
<?.$row['id'];?><?=
	  "<table border='1' cellpadding='0' align='center' cellspacing='0' width='100%' bgcolor='#F6F6F6' bordercolor='#FFFFFF'>  
	  <tr align='center'> 
	  <td width='50'>".$row['id'].			"</td> 
      <td width='80'>".$row['dni'].			"</td>  
      <td width='85'>".$row['fecha_nac'].	"</td>
	  <td width='140'>".$row['nombre'].		"</td> 
	  <td width='100'>".$row['apellido'].	"</td>
	  <td width='150'>".$row['domicilio'].	"</td>
	  <td width='110'>".$row['localidad'].	"</td>
	  <td width='130'>".$row['provincia'].	"</td>
	  <td width='40'>".$row['lic'].			"</td>
	  <td width='100'>".$row['telefono'].	"</td>
	  <td width='50'>".$row['id_rol'].		"</td>
	  <td width='140'>".$row['usuario'].	"</td>
	  </tr>
	  </table>
	  ";?>
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