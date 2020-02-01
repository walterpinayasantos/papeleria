        <!-- INICIALIZAMOS EL PLUGIN Datatables EN LA TABLA CON id=detalle-->
        <script type="text/javascript">
            $(document).ready(function (){
                $('#detalle_tabla').dataTable({
                    "paging":false, "searching":false,"order": [[ 0,"desc" ]], "info": false,
                    "oLanguage": {"sEmptyTable": "Ningún dato disponible en esta factura"} //Para DataTables >=1.10
                });
            });
            
        </script>
        <!-- INICIALIZAMOS EL PLUGIN Datatables EN LA TABLA CON id=detalle-->
        <div class="col-sm-12">
            <div class="table-responsive">
                <table id="detalle_tabla" class="table-condensed dt-responsive" width="99%">
                    <thead>
                        <th>Nº</th>
                        <th>Nombre Del Producto</th>
                        <th>Cant.</th>
                        <th>Precio</th>
                        <th>SubTotal</th>
                        <th>Del</th>
                    </thead>
                    <tbody>
                    <?php
                        //CONEXION A LA BdD
                        include('assets/inc/conexion.php');
                        //ESTA TABLA MUESTRA EL DETALLE DE LA FACTURA ACTUAL, DEPENDIENDO ES ESTADO DE LA FACTURA (CREADA, FINALIZADA)
                        //SI NO HAY FACTURAS LA TABLA NO NUESTRA NADA, SI HAY AL MENOS UNA FACTURA VERIFICAMOS EL ESTADO DE LA FACTURA
                        //SI NO ESTA FINALIZADA MUESTRAS EL DETALLE DE LOS PRODUCTOS SI ES QUE LOS TUVIERA.
                        //BUSCAMOS EL No DE FACTURA ACTUAL, PUEDE SER QUE NO HAYA NINGUNA FACTURA ó QUE SEA LA FACTURA0 NUMERO N.
                        $consulta="SELECT MAX(fac_id) FROM factura";
                        $result = mysqli_query($conexion,$consulta);
                        $filas = mysqli_fetch_row($result);
                        $valor = (int)$filas[0];
                        if($valor == 0){//SI NO HAY NINGUA FACTURA
                            $numero_factura = $valor;
                        }else{//SI HAY FACTURAS, HABRIA QUE AVERIGUAR EL ESTADO  DE LA FACTURA 0 ó 1 (FACTURA CREADA ó FINALIZADA)
                            $consulta1="SELECT fac_estado FROM factura WHERE fac_id = $valor";
                            $resultado1 = mysqli_query($conexion,$consulta1);
                            $filas1 = mysqli_fetch_row($resultado1);
                            $estado = (int)$filas1[0];
                            if($estado==0){//estado 0 indica que factura solo ha sido creada, y por lo tanto se mostrara en la tabla detalle los productos que contengan la factura actual
                                $numero_factura = $valor;
                            }else if($estado==1){//estado 1 indica que se realizo la compra, y por lo tanto se mostrara la tabla detalle vacia sin productos, y esperando a que se cree una nueva factura
                                $numero_factura = $valor + 1;
                            }
                        }

                        $sql="SELECT
                                det_id,
                                det_producto,
                                det_cantidad,
                                det_precio_unitario,
                                det_subtotal,
                                prod_id 
                            FROM
                                detalle_factura 
                            WHERE
                                fac_id = $numero_factura";
                        $resultado=mysqli_query($conexion,$sql);
                        while($registro = mysqli_fetch_row($resultado)){
                            $datos=$registro[0]."||".$registro[1]."||".$registro[2]."||".$registro[3]."||".$registro[4];

                     ?>

                        <tr>
                            <td><?php echo $registro[0]; ?></td>
                            <td><?php echo $registro[1]; ?></td>
                            <td><?php echo $registro[2]; ?></td>
                            <td><?php echo $registro[3]; ?></td>
                            <td><?php echo "Bs. ".$registro[4]; ?></td>
                            <td>
                                <!--<a style="color:teal; font-size: 28px;" href="#" data-toggle="modal" data-target="#ModalEdicionDetalle" onclick="EditarItem('<?php /*echo*/ $datos ?>')">
                                    <i class="fa fa-pencil"></i>
                                </a>-->
                                <a style="color:white;" href="#" onclick="EliminarDetalle('<?php echo $registro[0]."||".$registro[2]."||".$registro[5]; ?>')">
                                    <!-- id_detalle, cant. a sumar al stock actual, id_producto -->
                                    <i class="icon-trash"></i>
                                </a>
                            </td>
                        </tr>

                    <?php 
                                                                }          
                    ?>
                    </tbody>

                </table>
            </div>
        </div>
