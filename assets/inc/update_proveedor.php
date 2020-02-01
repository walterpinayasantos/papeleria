<?php
	/*Datos de conexion a la base de datos*/
	include('conexion.php');

	$prov_id = $_POST['prov_id'];
	$emp = $_POST['empresa'];
	$dir = $_POST['direccion'];
	$tel = $_POST['telefono'];
	$pre = $_POST['preventista'];
	$cel = $_POST['celular'];
	$com = $_POST['comentario'];
	
	# DATOS PARA PROBAR SE SE INSERTAN CORRECTAMENTE LOS DATOS.
	/*$nom = "Walter";
	$ape = "Pinaya Santos";
	$ci = "5720466 OR";
	$cel = "76152989";
	$dir = "CALLE AYACUCHO S/N, ENTRE LA PAZ Y ORURO";
	$fec = date("Y-m-d H:i:s");*/

	$sql="UPDATE proveedor SET prov_empresa='$emp', prov_direccion='$dir', prov_telefono='$tel', prov_preventista='$pre', prov_celular='$cel', prov_comentario='$com' 
	WHERE prov_id='$prov_id'";
	echo $result=mysqli_query($conexion,$sql);
	mysqli_close($conexion);
 ?>