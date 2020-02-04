<?php
	/*Datos de conexion a la base de datos*/
	include('conexion.php');

	$comp_id = $_POST['comp_id'];
	$det = $_POST['detalle'];
	$can = $_POST['cantidad'];
	$tot = $_POST['total'];
	$pre = $_POST['precio'];

	$sql="UPDATE compra 
			SET comp_detalle = '$det',
				comp_cantidad = '$can',
				comp_subtotal = '$tot',
				comp_precio_unitario = '$pre' 
			WHERE
				comp_id = '$comp_id'";
	echo $result=mysqli_query($conexion,$sql);
	mysqli_close($conexion);
 ?>