<?php
	/*Datos de conexion a la base de datos*/
	define('DB_HOST', 'localhost');//DB_HOST:  generalmente suele ser "127.0.0.1" o "localhost"
	define('DB_USER', 'root');//Usuario de tu base de datos
	define('DB_PASS', 'usbw');//Contraseña del usuario de la base de datos
	define('DB_NAME', 'papeleria');//Nombre de la base de datos
	# conectare la base de datos
    $conexion=@mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    # Soporte UTF-8, para caracteres especiales. En MYSQLi
    /*$conexion->set_charset("utf8");*/
    date_default_timezone_set('America/La_Paz');
    setlocale(LC_TIME, "spanish");
    mysqli_set_charset( $conexion, 'utf8');

    if(!$conexion){
        die("Imposible Conectarse: ".mysqli_error($conexion));
    }
    if (@mysqli_connect_errno()){
        die("Falló la Conexión: ".mysqli_connect_errno()." : ". mysqli_connect_error());
    }
?>