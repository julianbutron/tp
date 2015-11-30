<html lang="es">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
  <link rel="stylesheet" type="text/css" href="estilos\localizacion.css">
  <script type="text/javascript">
  function load() {
    var map = new google.maps.Map(document.getElementById("map"), {
      center: new google.maps.LatLng(-34.67018123626648,-58.563725421350114),
      zoom: 7,
      mapTypeId: 'roadmap'
    });
    var infoWindow = new google.maps.InfoWindow;
    downloadUrl("markers.php", function(data) {
      var xml = data.responseXML;
      var markers = xml.documentElement.getElementsByTagName("marker");
      for (var i = 0; i < markers.length; i++) {
        var point = new google.maps.LatLng(
          parseFloat(markers[i].getAttribute("lat")),
          parseFloat(markers[i].getAttribute("lng")));
        var icon = 'marker.png';
        var marker = new google.maps.Marker({
          map: map,
          position: point,
          icon: icon
        });
      }
    });
  }
  function downloadUrl(url, callback) {
    var request = window.ActiveXObject ?
    new ActiveXObject('Microsoft.XMLHTTP') :
    new XMLHttpRequest;
    request.onreadystatechange = function() {
      if (request.readyState == 4) {
        request.onreadystatechange = doNothing;
        callback(request, request.status);
      }
    };
    request.open('GET', url, true);
    request.send(null);
  }
  function doNothing() {}
  </script>
</head>
<body Background="imagenes\fondo.jpg" onload="load()">
<div id="contenedor">
<div id='cabecera'>
<div class='titulo'> Ubicaci&oacute;n del Veh&iacute;culo </div></div>
	<div id='cuerpo'>
		<div id="map"></div>
	<?php  
	if(isset($_POST['id']) && !empty($_POST['id'])){
    $id = $_POST['id'];

	include('conexion_bd.php');
    $consulta = "SELECT *
				 FROM  consumo_combustible C JOIN vehiculo V ON C.id_vehiculo = V.id
				 WHERE C.id_vehiculo = '$id'
				 ORDER BY C.cod DESC LIMIT 1
				 "; 
    $resultado = mysql_query($consulta); 
	while ($row = mysql_fetch_array($resultado)){ 
	$chofer=$row['id_chofer'];
	$fecha=$row['fecha'];
	$combustible=$row['litros'];
	$importe=$row['importe'];
	echo "<div class='letras_vehiculo'>";
	
	echo "Veh&iacute;culo ID: ".$id."<br>".
		 "Chofer ID: ".$chofer."<br>".
		 "<font color='red'>Ultima Fecha: ".$fecha."</font><br>".
		 "<font color='red'>Ingreso Combustible: ".$combustible."</font><br>".
		 "<font color='red'>Importe: $".$importe."</font><br><br>";
	echo "</div>
	<div class='cod_qr'>";
	echo '<img src="imagenes\imagen_QRCODE.png"/>
		  </div>';
	}}
	?>
	<a href="menu_supervisor.php"><input type="submit" value="Salir" class="boton_salir"></a>
</div>
</div>
</body>
</html>