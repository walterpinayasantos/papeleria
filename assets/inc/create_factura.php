<?php
	/*Datos de conexion a la base de datos*/
	include('conexion.php');
	$fac_id = $_POST['fac_id'];
	$cli_id = $_POST['cli_id'];
	$cli_nom = $_POST['cli_nombre'];
	$user_id = $_POST['user_id'];
	$user_nom = $_POST['user_nombre'];
	$fac_total = (float)$_POST['fac_total'];
	$fecha=date("Y-m-d H:i:s");

	//CALCULAMOS LA UTILIDAD SUMANDO LAS UTILIDADES DE LA FACTURA N
    $sql="SELECT SUM(det_utilidad) FROM detalle_factura WHERE fac_id = $fac_id";
    $resultado = mysqli_query($conexion,$sql);
    $filas = mysqli_fetch_row($resultado);
    $fac_utilidad = (float)$filas[0];

	//ACTUALIZAMOS DATOS DE LA FACTURA PARA FINALIZAR LA COMPRA
	//YA QUE AL CREARSE SOLO TIENE NUMERO DE FACTURA Y ESTADO EN 0
    $consulta = "UPDATE factura 
				SET cli_id = '$cli_id',
				fac_nombre_cliente = '$cli_nom',
				user_id = '$user_id',
				fac_nombre_usuario = '$user_nom',
				fac_total = $fac_total,
				fac_utilidad = $fac_utilidad,
				fac_estado = 1,
				fac_fecha_hora = '$fecha'
				WHERE
					fac_id = '$fac_id'";

    echo mysqli_query($conexion,$consulta);

	mysqli_close($conexion);
 ?>