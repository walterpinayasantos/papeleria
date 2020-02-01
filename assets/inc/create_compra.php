<?php
	/*CONEXION A LA BASE DE DATOS*/
	include('conexion.php');

	$id = $_POST['id'];
	$exp = $_POST['exp'];
	$det = $_POST['det'];
	$can = $_POST['can'];
	$pre = $_POST['pre'];
	$uni = $_POST['uni'];//$uni ES EL NUEVO PRECIO DE VENTA, POR QUE PERTENECE AL ULTIMO PRECIO DE COMPRA DEL PRODUCTO
	$stock = $_POST['stock'];
	$fec = date("Y-m-d H:i:s");
	/*ACTUALIZAMOS EL STOCK EN LA TABLA PRODUCTO*/
	/*SUMANOS EL STOCK ACTUAL MAS LA CANTIDAD COMPRADO*/
	$stock_actual = (int)$_POST['stock'] + (int)$_POST['can'];
	$consulta = "UPDATE producto SET prod_stock = '$stock_actual', prod_precio_compra = '$uni' WHERE prod_id = '$id'";
	if(mysqli_query($conexion,$consulta)){//SI NUESTRO STOCK SE ACTUALIZA, ENTONCES INSERTAMOS LA COMPRA....
		$sql="INSERT INTO compra (comp_id, prod_id, comp_fecha_vencimiento, comp_detalle, comp_cantidad, comp_subtotal, comp_precio_unitario, comp_fecha_registro) VALUES ('','$id','$exp','$det','$can','$pre','$uni','$fec')";
		echo $result=mysqli_query($conexion,$sql);
	}
	mysqli_close($conexion);
 ?>