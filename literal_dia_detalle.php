<?php
    //CONEXION A LA BdD
    $conexion=@mysqli_connect('localhost', 'root', 'usbw', 'papeleria');
    date_default_timezone_set('America/La_Paz');
    setlocale(LC_TIME, "spanish");
    //setlocale(LC_ALL, "spanish");
    mysqli_set_charset( $conexion, 'utf8');
    //AQUI PODEMOS CAPTURAR EL NUMERO DE LA FACTURA ACTUAL
    $consulta = "SELECT dia FROM configuracion";
    $resultado = mysqli_query($conexion,$consulta);
    $fila = mysqli_fetch_row($resultado);
    $fecha = date_create($fila[0]);
    $dia =  strftime("%A", $fecha->getTimestamp());
    //echo date_format($fecha, 'd-m-Y');
    echo strftime("$dia".", "."%d %b %Y", $fecha->getTimestamp());
?>