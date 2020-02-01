<?php
	/*Datos de conexion a la base de datos*/
	include('conexion.php');

	$emp = $_POST['empresa'];
	$dir = $_POST['direccion'];
	$tel = $_POST['telefono'];
	$pre = $_POST['preventista'];
	$cel = $_POST['celular'];
	$com = $_POST['comentario'];
	/*fec = date("Y-m-d H:i:s");*/
	# DATOS PARA PROBAR SE SE INSERTAN CORRECTAMENTE LOS DATOS.
	/*$nom = "Walter";
	$ape = "Pinaya Santos";
	$ci = "5720466 OR";
	$cel = "76152989";
	$dir = "CALLE AYACUCHO S/N, ENTRE LA PAZ Y ORURO";
	$fec = date("Y-m-d H:i:s");*/

	$sql="INSERT INTO proveedor (prov_id, prov_empresa, prov_direccion, prov_telefono, prov_preventista, prov_celular, prov_comentario) VALUES ('','$emp','$dir','$tel','$pre','$cel','$com')";
	echo $result=mysqli_query($conexion,$sql);
	mysqli_close($conexion);
 ?>