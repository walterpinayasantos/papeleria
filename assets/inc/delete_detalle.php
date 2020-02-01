<?php
	/*Datos de conexion a la base de datos*/
	include('conexion.php');
    
    $det_id=$_POST['det_id'];
    $sumar_stock=$_POST['sumar_stock'];
    $prod_id=$_POST['prod_id'];
	/*ACTUALIZAMOS EL STOCK, ES DECIR SUMAMOS AL STOCK ACTUAL, LA CANTIDA QUE SE ESTA ELIMINADO DE LA TABLA DETALLE DE FACTURA*/
	//PARA ELLO OBTENEMOS EL STOCK ACTUAL DE PRODUCTO MEDIANTE prod_id
	$sql1 = "SELECT prod_stock FROM producto WHERE prod_id = $prod_id";
	$resultado = mysqli_query($conexion,$sql1);
    $filas = mysqli_fetch_row($resultado);// $filas[0] ES EL STOCK ACTUAL PARA EL PRODUCTO CON ID $prod_id
    $stock = (int)$filas[0] + (int)$sumar_stock;//stock_actual + sumar_stock
    //CONSULTA PARA ACTUALIZAR EL STOCK DEL PRODUCTO
	$consulta="UPDATE producto SET prod_stock = $stock WHERE prod_id = $prod_id";
	if (mysqli_query($conexion,$consulta)) {//SI SE EJECUTÓ LA ACTUALIZACION DEL STOCK, ELIMINO EL DETALLE DE LA TABLA DETALLE
		$sql="DELETE FROM detalle_factura WHERE det_id='$det_id'";
		echo mysqli_query($conexion,$sql);
	}
 ?>