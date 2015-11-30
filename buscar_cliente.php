<html>
<head>
<title> Buscar Cliente </title>
<link rel="stylesheet" type="text/css" href="estilos\ver_clientes.css">
</head>
<body Background="imagenes\fondo.jpg">
<div id="contenedor">
	<div id="cabecera">
<a href="menu_admin.php"><img src="imagenes\cerrar.png" class="imagen_atras"/></a>
		<div class="titulo">
		Cliente
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
$sql = "SELECT * FROM cliente WHERE rs LIKE '%$buscar%' ORDER BY id ASC";
mysql_select_db($bd, $conexion);

$result = mysql_query($sql, $conexion);

// Tomamos el total de los resultados
$total = mysql_num_rows($result);

// Imprimimos los resultados
if ($row = mysql_fetch_array($result)){ 
echo "Resultados para: <font color='red'><b>$buscar</b></font>";
echo '  <table border="1" cellpadding="0" align="center" cellspacing="0" width="100%" bgcolor="#F6F6F6" bordercolor="#FFFFFF">  
	<tr align="center">  
	  <td width="50" style="font-weight: bold">ID				</td> 
      <td width="140" style="font-weight: bold">Razon Social	</td>  
      <td width="140" style="font-weight: bold">Email			</td>    
      <td width="80" style="font-weight: bold">Tel&eacute;fono	</td> 
    </tr> 
	 </table> ';
do { 
?>

<p><b><a href="modificar_cliente1.php?id= <?.$row['id'];?>"><?=
	  "<table bgcolor='#BDC5F2' cellpadding='0' align='center' cellspacing='0' width='100%'>
	  <tr align='center'> 
	  <td width='50'>".$row['id'].				"</td> 
      <td width='140'>".$row['rs'].				"</td>  
      <td width='140'>".$row['email'].			"</td>
	  <td width='80'>".$row['telefono'].		"</td>
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