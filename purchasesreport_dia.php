        <!-- INICIALIZAMOS EL PLUGIN Datatables EN LA TABLA CON id=factura-->
        <script type="text/javascript">
            $(document).ready(function (){
                $('#compraDia').dataTable({
                    "lengthMenu":[5,10,15,20],
                    "order": [[ 0,"desc" ]],//ORDERNAR DESCENDENTEMENTE POR EL NUMERO DE FACTURA
                    "language": {
                        "sProcessing":     "Procesando...",
                        "sLengthMenu":     "Mostrar _MENU_ registros",
                        "sZeroRecords":    "No se encontraron resultados",
                        "sEmptyTable":     "Ningún dato disponible en esta tabla",
                        "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
                        "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
                        "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
                        "sInfoPostFix":    "",
                        "sSearch":         "Buscar:",
                        "sUrl":            "",
                        "sInfoThousands":  ",",
                        "sLoadingRecords": "Cargando...",
                        "oPaginate": {
                            "sFirst":    "Primero",
                            "sLast":     "Último",
                            "sNext":     "Siguiente",
                            "sPrevious": "Anterior"
                        },
                        "oAria": {
                            "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
                            "sSortDescending": ": Activar para ordenar la columna de manera descendente"
                        }
                    }
                });
            });
        </script>
        <!-- INICIALIZAMOS EL PLUGIN Datatables EN LA TABLA CON id=factura-->
        <div class="table-responsive">
            <table id="compraDia" class="table table-dark table-condensed responsive" width="99%" style="color:white;">
                <thead>
                    <th>Nº Compra</th>
                    <th>Producto</th>
                    <th>Detalle</th>
                    <th>Cantidad</th>
                    <th>SubTotal</th>
                    <th>P.Unitario</th>
                    <th>Edit</th>
                </thead>
                <tbody>
                <?php
                    //CONEXION A LA BdD
                    include('assets/inc/conexion.php');
                    //OBTENEMOS FECHA DEL DIA, DE LA TABLA CONFIGURACION
                    $consulta = "SELECT dia FROM configuracion";
                    $resultado = mysqli_query($conexion,$consulta);
                    $fila = mysqli_fetch_row($resultado);
                    $fecha = $fila[0];
                    //echo $fecha;
                    //$fecha=date("Y-m-d");

                    $sql="SELECT
                            comp_id,
                            prod_nombre,
                            comp_detalle,
                            comp_cantidad,
                            comp_subtotal,
                            comp_precio_unitario 
                        FROM
                            producto
                            INNER JOIN compra ON producto.prod_id = compra.prod_id 
                        WHERE
                            DATE( comp_fecha_registro ) = '$fecha'";
                    $resultado=mysqli_query($conexion,$sql);
                    while($registro = mysqli_fetch_row($resultado)){
                        $datos=$registro[0]."||".$registro[1]."||".$registro[2]."||".$registro[3]."||".$registro[4]."||".$registro[5];

                 ?>

                    <tr>
                        <td><?php echo $registro[0]; ?></td>
                        <td><?php echo $registro[1]; ?></td>
                        <td><?php echo $registro[2]; ?></td>
                        <td style="text-align: right;"><?php echo $registro[3]; ?></td>
                        <td style="text-align: right;"><?php echo $registro[4]; ?></td>
                        <td><?php echo "<span style='color:; font-weight:bold'>"."Bs. "."</span>".$registro[5]; ?></td>
                        <td>
                            <a style="color:white;" href="#" data-toggle="modal" data-target="#modal_actualizar_compra" title="Editar" onclick="EditarCompra('<?php echo $datos; ?>')">
                                <i class="icon-pencil"></i>
                            </a>
                        </td>
                        
                    </tr>

                <?php
                                                            }

                ?>
                    <tfoot>
                        <tr>
                            <td colspan="4" align="right" style="text-align:right;font-size:14px !Important" rowspan="1">&nbsp; <b>
                                <font style="vertical-align: inherit;">
                                    <font style="vertical-align: inherit;">Total, Compras Del Día :</font>
                                </font></b>
                            </td>
                            <td style="text-align: left;" rowspan="1" colspan="3">
                                <b>
                                    <font style="vertical-align: inherit;">Bs. 
                                    <?php 
                                    $conexion=@mysqli_connect('localhost', 'root', 'usbw', 'papeleria'); 
                                    //OBTENEMOS FECHA DEL DIA, DE LA TABLA CONFIGURACION
                                    $consulta = "SELECT dia FROM configuracion";
                                    $resultado = mysqli_query($conexion,$consulta);
                                    $fila = mysqli_fetch_row($resultado);
                                    $fecha = $fila[0];
                                    //OBTENEMOS LA SUMA DE LOS TOTALES DE LAS FACTURAS DEL DIA
                                    $consulta = "SELECT SUM(comp_subtotal) FROM compra WHERE DATE(comp_fecha_registro) = '$fecha'";
                                    $resultado = mysqli_query($conexion,$consulta);
                                    $fila = mysqli_fetch_row($resultado);
                                    $suma = number_format((float)$fila[0], 2, '.', '');
                                    echo $suma;
                                    ?>&nbsp;
                                    </font>
                                </b>
                            </td>

                        </tr>
                    </tfoot>
                </tbody>

            </table>
        </div>
