<?php
	/*Datos de conexion a la base de datos*/
	include('conexion.php');
	$fac = $_POST['fac_id'];
	$pro = $_POST['prod_id'];
	$nom = $_POST['prod_nombre'];
	$can = $_POST['prod_cantidad'];
	$act = $_POST['stock_actual'];
	$ven = $_POST['prod_precio_venta'];
	$tot = $_POST['sub_total'];
	$uti = $_POST['utilidad'];

	/*$fac = 1;
	$pro = 22;
	$nom = "pistola";
	$can = 12;
	$act = 1;
	$ven = 25.00;
	$tot = 25-00;
	$uti = 5.00;*/

	//$subt=round(((float)$prev*(float)$cant),2);/*SUBTOTAL = PRECIO DE VENTA * CANTIDAD*/
	//$util=round((((float)$prev-(float)$prec)*(float)$cant),2);/*UTILIDAD = PRECIO DE COMPRA - PRECIO DE VENTA*/
	$fec= date("Y-m-d");
	/*CONSULTA PARA REGISTRAR EL DETALLE DE LA FACTURA*/
	$sql="INSERT INTO detalle_factura ( det_id, fac_id, prod_id, det_producto, det_cantidad, det_precio_unitario, det_subtotal, det_utilidad, det_fecha )
			VALUES
				('','$fac','$pro','$nom','$can','$ven', '$tot', '$uti', '$fec')";
	/*SI PODEMOS REGISTRAR EL DETALLE ENTONCES ACTUALIZAMOS EL STOCK*/
	if(mysqli_query($conexion,$sql)){
		/*ACTUALIZAMOS EL STOCK, QUE RECOGEMOS DE LA VENTANA MODAL*/
		$consulta="UPDATE producto SET prod_stock = $act WHERE prod_id = $pro";
		if(mysqli_query($conexion,$consulta)){
			echo 1;
		}
	}
	mysqli_close($conexion);
 ?>