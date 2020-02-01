<?php
	/*Datos de conexion a la base de datos*/
	include('conexion.php');

    $lam_id = $_POST['lam_id'];
	$stock_actual = (int)$_POST['cantidad'] + (int)$_POST['entrada'];

	$sql="UPDATE lamina SET lam_cantidad ='$stock_actual' WHERE lam_id ='$lam_id'";
	echo $result=mysqli_query($conexion,$sql);
	mysqli_close($conexion);

 ?>