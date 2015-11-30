<?php 
header('Content-Type: text/xml'); 
echo '<markers>';
include ("conexion.php");
$sql=mysqli_query($con,"SELECT id, Lat, Lng, Pos
						FROM  coordenadas CO
						WHERE EXISTS (SELECT 1
									  FROM consumo_combustible C
									  WHERE C.id_coordenadas = CO.id)
						ORDER BY id");
while($row=mysqli_fetch_array($sql))
{
	echo "<marker id ='".$row['id']."' lat='".$row['Lat']."' lng='".$row['Lng']."'>\n";
	echo "</marker>\n";
}
mysql_close($bd);
echo "</markers>\n";
?>