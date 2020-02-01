<?php
	/*Datos de conexion a la base de datos*/
	include('conexion.php');

	$adm_id = $_POST['adm_id'];
	$nombres = $_POST['nombres'];
	$apellidos = $_POST['apellidos'];
	$ci = $_POST['ci'];
	$celular = $_POST['celular'];
	$direccion = $_POST['direccion'];
	$fec = date("Y-m-d H:i:s");
	
	# DATOS PARA PROBAR SE SE INSERTAN CORRECTAMENTE LOS DATOS.
	/*$nom = "Walter";
	$ape = "Pinaya Santos";
	$ci = "5720466 OR";
	$cel = "76152989";
	$dir = "CALLE AYACUCHO S/N, ENTRE LA PAZ Y ORURO";
	$fec = date("Y-m-d H:i:s");*/

	$sql="UPDATE administrador SET adm_nombres='$nombres', adm_apellidos='$apellidos', adm_ci='$ci', adm_celular='$celular', adm_direccion='$direccion' 
	WHERE adm_id='$adm_id'";
	echo $result=mysqli_query($conexion,$sql);
	mysqli_close($conexion);
 ?>