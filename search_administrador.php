<?php
	/*Datos de conexion a la base de datos*/
	include('assets/inc/conexion.php');

	$password = $_POST['password'];
	//$password = 'WALTER';
	//$fec = date("Y-m-d H:i:s");
	$sql="SELECT EXISTS
			( SELECT * FROM usuario WHERE user_password = '$password')";
	//LA CONSULTA DEVUELVE 0 SI NO HAY NINGUNA PASSWORD IGUAL EN LA BdD
	$result = mysqli_query($conexion,$sql);
	$fila = mysqli_fetch_row($result);
	$valor = (int)$fila[0];
	/*if($valor == 1){
		//SI RETORNA UNO RECUPERAMOS SU NOMBRE, Y MOSTRAMOS MENSAJE ALERT DE BIENVENIDO CON SU NOMBRE
		$consulta = "SELECT user_id, user_nombres FROM usuario WHERE user_password = '$password'";
		$resultado = mysqli_query($conexion,$consulta);
		$filas = mysqli_fetch_row($resultado);
		$nombres = $filas[1] ;		

	}
	else{

	}*/
	echo $valor;
	mysqli_close($conexion);
 ?>