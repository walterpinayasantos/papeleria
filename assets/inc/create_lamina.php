<?php
	/*Datos de conexion a la base de datos*/
	include('conexion.php');

	$nom = $_POST['nom'];
	$des = $_POST['des'];
	$fab = $_POST['fab'];
	$cat = $_POST['cat'];
	$can = $_POST['can'];
	$num = $_POST['num'];
	/*fec = date("Y-m-d H:i:s");*/
	# DATOS PARA PROBAR SE SE INSERTAN CORRECTAMENTE LOS DATOS.
	/*$nom = "Walter";
	$ape = "Pinaya Santos";
	$ci = "5720466 OR";
	$cel = "76152989";
	$dir = "CALLE AYACUCHO S/N, ENTRE LA PAZ Y ORURO";
	$fec = date("Y-m-d H:i:s");*/

	$sql="INSERT INTO lamina (lam_id, lam_nombre, lam_descripcion, lam_industria, lam_categoria, lam_cantidad, lam_numero) VALUES ('','$nom','$des','$fab','$cat','$can','$num')";
	echo $result=mysqli_query($conexion,$sql);
	mysqli_close($conexion);
 ?>