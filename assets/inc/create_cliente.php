<?php
	/*Datos de conexion a la base de datos*/
	include('conexion.php');

	$nom = $_POST['nombre'];
	$nit = $_POST['ci_nit'];
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

	$sql="INSERT INTO cliente ( cli_id, cli_ci_nit, cli_nombre, cli_direccion, cli_celular, cli_fecha_registro )
			VALUES
				( '', '$nit', '$nom', '$dir', '$cel', '$fec' )";
	echo $result=mysqli_query($conexion,$sql);
	mysqli_close($conexion);
 ?>