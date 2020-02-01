<?php
	/*Datos de conexion a la base de datos*/
	include('conexion.php');
	$nom = $_POST['nom'];//tabla producto
	$des = $_POST['des'];//tabla producto
	$det = $_POST['det'];//tabla compra
	$exp = $_POST['exp'];//tabla compra
	$ubi = $_POST['ubi'];//tabla producto

	$can = $_POST['can'];//tabla producto//tabla compra
	$pre = $_POST['pre'];//tabla compra
	$uni = $_POST['uni'];//tabla producto//tabla compra
	$ven = $_POST['ven'];//tabla producto

	$fec = date("Y-m-d H:i:s");//tabla producto//tabla compra

	$sql="INSERT INTO producto ( prod_id, prod_nombre, prod_descripcion, prod_ubicacion, prod_stock, prod_precio_compra, prod_precio_venta, prod_fecha_registro )
			VALUES
				( '', '$nom', '$des', '$ubi', '$can', '$uni', '$ven', '$fec' )";
	if(mysqli_query($conexion,$sql))
	{
        //OBTENEMOS ID MAXIMO DE LA TABLA PRODUCTO
        $consulta = "SELECT MAX( prod_id ) AS prod_id FROM producto";
		//$consulta = "SELECT MAX(prod_id) FROM producto";
		$result = mysqli_query($conexion,$consulta);
		$fila = mysqli_fetch_row($result);
		$id = (int)$fila[0];

		$consulta="INSERT INTO compra ( comp_id, prod_id, comp_fecha_vencimiento, comp_detalle, comp_cantidad, comp_subtotal, comp_precio_unitario, comp_fecha_registro )
			VALUES
				( '', '$id', '$exp', '$det', '$can', '$pre', '$uni', '$fec' )";
			echo $result=mysqli_query($conexion,$consulta);

	}
	mysqli_close($conexion);
 ?>