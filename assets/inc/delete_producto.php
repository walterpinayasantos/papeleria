<?php
	/*Datos de conexion a la base de datos*/
	include('conexion.php');

	$prod_id=$_POST['id'];
    //$adm_id=12;

	$sql="DELETE FROM producto WHERE prod_id='$prod_id'";
	echo $result=mysqli_query($conexion,$sql);
	mysqli_close($conexion);
 ?>