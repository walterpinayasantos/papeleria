<?php
	/*Datos de conexion a la base de datos*/
	include('conexion.php');

	$adm_id=$_POST['id'];
    //$adm_id=12;

	$sql="DELETE FROM administrador WHERE adm_id='$adm_id'";
	echo $result=mysqli_query($conexion,$sql);
	mysqli_close($conexion);
 ?>