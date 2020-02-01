<?php
                        //CONEXION A LA BdD
                        include('assets/inc/conexion.php');
                        //BUSCAMOS EL No DE FACTURA ACTUAL, PUEDE SER QUE NO HAYA NINGUNA FACTURA ó QUE SEA LA FACTURA0 NUMERO N.
                        $consulta="SELECT MAX(fac_id) FROM factura";
                        $result = mysqli_query($conexion,$consulta);
                        $filas = mysqli_fetch_row($result);
                        $valor = (int)$filas[0];
                        if($valor == 0){
                            $numero = $valor;
                            echo $numero;
                        }else{
                            /*$sql1="SELECT fac_estado FROM factura WHERE fac_id = $valor";
                            $resultado1 = mysqli_query($conexion,$sql1);
                            $filas1 = mysqli_fetch_row($resultado1);
                            $estado = (int)$filas1[0];
                            if($estado==0){//estado 0 indica que factura solo ha sido creada, y por lo tanto se mostrara en la tabla detalle los articulos que contengan la factura actual
                                $numero = $valor;
                            }else if($estado==1){//estado 1 indica que se realizo la compra, y por lo tanto se mostrara la tabla detalle vacia si articulos, y esperando a que se cree una nueva factura
                                $numero = $valor + 1;
                            }*/
                        }

                     ?>