<?php
	/*Datos de conexion a la base de datos*/
	include('conexion.php');

	$prod_id = $_POST['prod_id'];
	$nom = $_POST['nom'];
	$des = $_POST['des'];
	$ubi = $_POST['ubi'];
	$can = $_POST['can'];
	$ven = $_POST['ven'];
	
	# DATOS PARA PROBAR SE SE INSERTAN CORRECTAMENTE LOS DATOS.
	/*$nom = "Walter";
	$ape = "Pinaya Santos";
	$ci = "5720466 OR";
	$cel = "76152989";
	$dir = "CALLE AYACUCHO S/N, ENTRE LA PAZ Y ORURO";
	$fec = date("Y-m-d H:i:s");*/

	$sql="UPDATE producto SET 
			prod_nombre = '$nom',
			prod_descripcion = '$des',
			prod_ubicacion = '$ubi',
			prod_stock = '$can',
			prod_precio_venta = '$ven' 
			WHERE
				prod_id = '$prod_id'";
	echo $result=mysqli_query($conexion,$sql);
	mysqli_close($conexion);
 ?>