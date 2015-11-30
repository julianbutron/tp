<html> 
<head> 
<title> Modificar Mantenimiento 3 </title> 
<link rel="stylesheet" type="text/css" href="estilos\aviso.css">
</head> 
<body Background="imagenes\fondo.jpg">
<div id="contenedor">
	<div id="cabecera">
	</div>
	<div id="cuerpo">
	<div class="letras_aviso">
<?php 
	if(isset($_POST['cod']) && !empty($_POST['cod'])){
	$cod=$_POST['cod'];
	$fecha=$_POST['fecha'];
	$id_vehiculo=$_POST['id_vehiculo'];
	$km=$_POST['km'];
	$id_mecanico=$_POST['id_mecanico'];
	$mecanico2=$_POST['mecanico_ext'];
	$repuesto=$_POST['repuesto'];
	$costo=$_POST['costo'];
	
	include('conexion_bd.php');
	$consulta=	"UPDATE mantenimiento 
				SET fecha='$fecha', id_vehiculo='$id_vehiculo', km='$km', id_mecanico='$id_mecanico', mecanico_ext='$mecanico2', repuesto='$repuesto', costo='$costo'	
				WHERE cod='$cod'"; 			
	mysql_query($consulta); 
	
	echo "<font color='green'>Los datos han sido actualizados con exito.</font><br><br>"; 
	echo "Fecha: ".$_POST['fecha']."<br>".
		"Vehiculo ID: ".$_POST['id_vehiculo']." - Km Recorrido: ".$_POST['km']."<br>".
		"Mecanico Int: ".$_POST['id_mecanico']."<br>".
		"Mecanico Ext: ".$_POST['mecanico_ext']."<br>".
		"Repuestos: ".$_POST['repuesto']."<br>".
		"Importe: $".$_POST['costo'] ;
	mysql_close($conexion);
	}

	else{
		
	echo "<font color='red'>AVISO!</font> No se han modificado los registros";
	}
?> 
	<div class="sesion">
	<a href="menu_admin.php"><input type="submit" value="Finalizar" class="boton_finalizar"></a>
	</div>	
</div>
</div>
</div>
</body> 
</html>