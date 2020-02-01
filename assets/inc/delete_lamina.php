<?php
	/*Datos de conexion a la base de datos*/
	include('conexion.php');

	$lam_id=$_POST['id'];
    //$adm_id=12;

	$sql="DELETE FROM lamina WHERE lam_id='$lam_id'";
	echo $result=mysqli_query($conexion,$sql);
	mysqli_close($conexion);
 ?>