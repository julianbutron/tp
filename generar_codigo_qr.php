<?php
if(isset ($_POST['generar_codigo'])){
	
	// Incluir biblioteca phpqrcore
	include('phpqrcode/qrlib.php');
	$patente= $_POST['patente'];
	$chasis= $_POST['chasis'];
	$motor= $_POST['motor'];

	
	$cv= 'BEGIN:VCARD'."\n";
	$cv.= 'FN:'.$patente."\n";
	$cv.= 'FN:'.$chasis."\n";
	$cv.= 'FN:'.$motor."\n";
	$cv.= 'END:VCARD';
	
// Almacenar en un archivo: contenido, ruta, nivel de ECC y el tamaño de pixel
	QRcode::png($cv, "imagenes\imagen_QRCODE.png", QR_ECLEVEL_L);
	
	echo '<img src="imagenes\imagen_QRCODE.png"/>';
}
?>