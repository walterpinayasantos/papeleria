<?php
	/* Conexion a la BdD */
	include('assets/inc/conexion.php');
	if (isset($_POST['search'])){
		$consulta = mysqli_query($conexion,"SELECT * FROM producto where prod_nombre like '%".mysqli_real_escape_string($conexion,($_POST['search']))."%' LIMIT 0 ,10"); 
		$return_arr = array();
		while ($row = mysqli_fetch_array($consulta)) {
				/* El array value, muestra solo informacion*/
				$row_array['value'] = $row['prod_nombre']." , Bs. ".$row['prod_precio_venta']." , Stock: ".$row['prod_stock'];
				$row_array['id']=$row['prod_id'];
				$row_array['nombre']=$row['prod_nombre'];
				$row_array['stock']=$row['prod_stock'];
				$row_array['precio_compra']=$row['prod_precio_compra'];
				$row_array['precio_venta']=$row['prod_precio_venta'];
				array_push($return_arr,$row_array);
			}
		
		/* Cierra la conexión. */
		mysqli_close($conexion);
		/* Codifica el resultado del array en JSON. */
		echo json_encode($return_arr);
	}
?>