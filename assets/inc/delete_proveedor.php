<?php
	/*Datos de conexion a la base de datos*/
	include('conexion.php');

	$prov_id=$_POST['id'];
    //$adm_id=12;

	$sql="DELETE FROM proveedor WHERE prov_id='$prov_id'";
	echo $result=mysqli_query($conexion,$sql);
	mysqli_close($conexion);
 ?>