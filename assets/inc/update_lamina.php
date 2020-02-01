<?php
	/*Datos de conexion a la base de datos*/
	include('conexion.php');

	$lam_id = $_POST['lam_id'];
	$nom = $_POST['nom'];
	$des = $_POST['des'];
	$fab = $_POST['fab'];
	$cat = $_POST['cat'];
	$can = $_POST['can'];
	$num = $_POST['num'];

	$sql="UPDATE lamina SET 
			lam_nombre = '$nom',
			lam_descripcion = '$des',
			lam_industria = '$fab',
			lam_categoria = '$cat',
			lam_cantidad = '$can', 
			lam_numero = '$num'
			WHERE
				lam_id = '$lam_id'";
	echo $result=mysqli_query($conexion,$sql);
	mysqli_close($conexion);
 ?>