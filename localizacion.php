<?php
error_reporting(E_ERROR | E_WARNING | E_PARSE);
include('conexion.php');
?>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
  <link rel="stylesheet" type="text/css" href="estilos\localizacion.css">
</head>
<body Background="imagenes\fondo.jpg">
<div id="contenedor">
      <?php 
      $lat = "-34.67018123626648";
      $lng = "-58.563725421350114";
      $pos = "42.822410654302125,-1.6459033203125273";
      echo "<div id='cabecera'>
	  <a href='menu_usuario.php'><img src='imagenes\boton_atras.png' class='imagen_atras'/></a>
	  <div class='titulo_localizacion'>Ingreso de Combustible</div></div>
	  <div id='cuerpo'>
      <div id='info'>".$pos."</div>
      <div id='googleMap'></div>
      <button type='submit' id='enviar' class='btn btn-alert'>Guardar</button>
      <div id='respuesta'></div>
	  </div>";
      ?>
</div>
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
    <script>
    $(document).ready(function(){
      lat = "<?php echo $lat; ?>" ;
      lng = "<?php echo $lng; ?>" ;
      var map;
      function initialize() {
        var myLatlng = new google.maps.LatLng(lat,lng);
        var mapOptions = {
          zoom: 7,
          center: myLatlng,
          mapTypeId: google.maps.MapTypeId.ROADMAP
        }
        map = new google.maps.Map(document.getElementById("googleMap"), mapOptions);
        var marker = new google.maps.Marker({
          position: myLatlng,
          draggable:true,
          animation: google.maps.Animation.DROP,
          web:"Localización geográfica!",
          icon: "marker.png"
        });
        google.maps.event.addListener(marker, 'dragend', function(event) {
          var myLatLng = event.latLng;
          lat = myLatLng.lat();
          lng = myLatLng.lng();
          document.getElementById('info').innerHTML = [
          lat,
          lng
          ].join(', ');
        });
        marker.setMap(map);
      }
      google.maps.event.addDomListener(window, 'load', initialize);
      $("#enviar").click(function() { 
        var url = "localizacion_cargar.php";
        $("#respuesta").html('<img src="cargando.gif" />');
        $.ajax({
         type: "POST",
         url: url,
         data: 'lat=' + lat + '&lng=' + lng,
         success: function(data)
         {
           $("#respuesta").html(data);
         }
       });
      }); 
    });
</script>
</body>
</html>