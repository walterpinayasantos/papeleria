        <!-- INICIALIZAMOS EL PLUGIN Datatables EN LA TABLA CON id=factura-->
        <script type="text/javascript">
            $(document).ready(function (){
                $('#compraAnual').dataTable({
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
                                    <table id="compraAnual" class="table table-dark table-condensed responsive" width="99%" style="color:white;">
                                        <thead style="background-color:;">
                                            <th>Nº</th>
                                            <th>Fecha</th>
                                            <th>Cliente</th>
                                            <th>Vendedor</th>
                                            <th>Importe Total</th>
                                            <th>Utilidad</th>
                                        </thead>
                                        <tbody>
                                        <?php
                                            //CONEXION A LA BdD
                                            $conexion=@mysqli_connect('localhost', 'root', 'usbw', 'papeleria');
                                            //IMPRIMIMOS LAS FACTURAS CON ESTADO 1, QUE ESTAN FINALIZADA Y CANCELADAS DE LA SEMANA ACTUAL
                                            //OBTENEMOS EL MES PARA REALIZAR EL REPORTE
                                            $consulta = "SELECT year FROM configuracion";
                                            $result = mysqli_query($conexion,$consulta);
                                            $fila = mysqli_fetch_row($result);
                                            $year = (int)$fila[0];

                                            $sql="SELECT fac_id, fac_fecha_hora, fac_nombre_cliente, fac_nombre_usuario, fac_total, fac_utilidad FROM factura WHERE year(fac_fecha_hora) = '$year'";
                                            $resultado=mysqli_query($conexion,$sql);
                                            while($registro = mysqli_fetch_row($resultado)){
                                                $datos=$registro[0]."||".$registro[1]."||".$registro[2]."||".$registro[3]."||".$registro[4];

                                         ?>

                                            <tr>
                                                <td><?php echo $registro[0]; ?></td>
                                                <td><?php $fecha = date_create($registro[1]); echo date_format($fecha, 'd/m/Y H:i:s'); ?></td>
                                                <td><?php echo $registro[2]; ?></td>
                                                <td><?php echo $registro[3]; ?></td>
                                                <td><?php echo "<span style='color:; font-weight:bold'>"."Bs. "."</span>".$registro[4]; ?></td>
                                                <td><?php echo "<span style='color:; font-weight:bold'>"."Bs. "."</span>".$registro[5]; ?></td>
                                            </tr>

                                        <?php
                                                                                    }

                                        ?>
                                            <tfoot>
                                                <tr>
                                                    <td colspan="4" align="right" style="text-align:right;font-size:14px !Important" rowspan="1">&nbsp; <b>
                                                        <font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Total, Ventas del Año :</font></font></b>
                                                    </td>
                                                    <td style="text-align: left; background-color:;" rowspan="1" colspan="1"><b>
                                                        <font style="vertical-align: inherit;">Bs. 
                                                        <?php 
                                                            //OBTENEMOS EL AÑO ESCOGIDO
                                                            $consulta = "SELECT year FROM configuracion";
                                                            $result = mysqli_query($conexion,$consulta);
                                                            $fila = mysqli_fetch_row($result);
                                                            $year = (int)$fila[0];
                                                            //CONEXION A LA BASE DE DATOS
                                                            $conexion=@mysqli_connect('localhost', 'root', 'usbw', 'papeleria'); 
                                                            //OBTENEMOS LA SUMA DE LOS TOTALES DE LAS FACTURAS DE LA SEMANA
                                                            $consulta = "SELECT SUM(fac_total) FROM factura WHERE year(fac_fecha_hora) = '$year'";
                                                            $resultado = mysqli_query($conexion,$consulta);
                                                            $fila = mysqli_fetch_row($resultado);
                                                            $suma = number_format((float)$fila[0], 2, '.', '');
                                                            echo $suma;
                                                        ?>
                                                        </font></b>
                                                    </td>
                                                    <td style="text-align: left; background-color:;" rowspan="1" colspan="1"><b>
                                                        <font style="vertical-align: inherit;">Bs. 
                                                        <?php 
                                                            //OBTENEMOS EL AÑO ESCOGIDO
                                                            $consulta = "SELECT year FROM configuracion";
                                                            $result = mysqli_query($conexion,$consulta);
                                                            $fila = mysqli_fetch_row($result);
                                                            $year = (int)$fila[0];
                                                            //CONEXION A LA BASE DE DATOS
                                                            $conexion=@mysqli_connect('localhost', 'root', 'usbw', 'papeleria'); 
                                                            //OBTENEMOS LA SUMA DE LOS TOTALES DE LAS FACTURAS DE LA SEMANA
                                                            $consulta = "SELECT SUM(fac_utilidad) FROM factura WHERE year(fac_fecha_hora) = '$year'";
                                                            $resultado = mysqli_query($conexion,$consulta);
                                                            $fila = mysqli_fetch_row($resultado);
                                                            $suma = number_format((float)$fila[0], 2, '.', '');
                                                            echo $suma;
                                                        ?>
                                                        </font></b>
                                                    </td>
                                                </tr>
                                            </tfoot>
                                        </tbody>

                                    </table>
                                </div>
