<?php
	/*Datos de conexion a la base de datos*/
	include('conexion.php');

	$nom = $_POST['nombres'];
	$ape = $_POST['apellidos'];
	$ci = $_POST['ci'];
	$cel = $_POST['celular'];
	$dir = $_POST['direccion'];
	$fec = date("Y-m-d H:i:s");
	# DATOS PARA PROBAR SE SE INSERTAN CORRECTAMENTE LOS DATOS.
	/*$nom = "Walter";
	$ape = "Pinaya Santos";
	$ci = "5720466 OR";
	$cel = "76152989";
	$dir = "CALLE AYACUCHO S/N, ENTRE LA PAZ Y ORURO";
	$fec = date("Y-m-d H:i:s");*/

	$sql="INSERT INTO administrador (adm_id, adm_nombres, adm_apellidos, adm_ci, adm_celular, adm_direccion, adm_fecha_registro) VALUES ('','$nom','$ape','$ci','$cel','$dir','$fec')";
	echo $result=mysqli_query($conexion,$sql);
	mysqli_close($conexion);
 ?>