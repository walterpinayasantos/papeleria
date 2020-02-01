        <!-- INICIALIZAMOS EL PLUGIN Datatables EN LA TABLA CON id=factura-->
        <script type="text/javascript">
            //MUESTRA LA Version DE NUESTRO DataTable (1.10.19)
            //var versionNo = $.fn.dataTable.version;
            //alert(versionNo);
            $(document).ready(function() {
                var table = $("#pedido_producto").DataTable({
                    lengthChange: !1,
                    language: {
                        processing: "Procesando...",
                        lengthMenu: "Mostrar _MENU_ registros",
                        zeroRecords: "No se encontraron resultados",
                        emptyTable: "Ningún dato disponible en esta tabla",
                        info: "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
                        infoEmpty: "Mostrando registros del 0 al 0 de un total de 0 registros",
                        infoFiltered: "(filtrado de un total de _MAX_ registros)",
                        infoPostFix: "",
                        search: "Buscar:",
                        url: "",
                        infoThousands: ",",
                        loadingRecords: "Cargando...",
                        paginate: {
                            first: "Primero",
                            last: "Último",
                            next: "Siguiente",
                            previous: "Anterior"
                        },
                        aria: {
                            sortAscending: ": Activar para ordenar la columna de manera ascendente",
                            sortDescending: ": Activar para ordenar la columna de manera descendente"
                        }
                    },
                    //dom: 'Bfrtip',
                    buttons: ["copy", "csv", "excel", "pdf"]
                }); table.buttons().container().appendTo("#pedido_producto_wrapper .col-md-6:eq(0)")
            });

        </script>
        <!-- INICIALIZAMOS EL PLUGIN Datatables EN LA TABLA CON id=factura-->
        <div class="table-responsive">
            <table id="pedido_producto" class="table table-dark table-condensed responsive" width="99%" style="color:white;">
                <thead>
                    <th>Nombre Del Producto</th>
                    <!-- <th>Ubicación</th> -->
                    <th>Precio de Compra</th>
                    <th>Stock Actual</th>
                </thead>
                <tbody>
                <?php
                    //CONEXION A LA BdD
                    include('assets/inc/conexion.php');
                    //OBTENEMOS LA CANTIDAD ECONOMICA PARA REALIZAR UN PEDIDO, DE LA TABLA CONFIGURACION
                    $consulta = "SELECT eoq FROM configuracion";
                    $result = mysqli_query($conexion,$consulta);
                    $fila = mysqli_fetch_row($result);
                    $eoq = (int)$fila[0];

                    $sql="SELECT prod_id, prod_nombre, prod_ubicacion, prod_stock, prod_precio_compra FROM producto WHERE prod_stock <= $eoq";
                    $resultado=mysqli_query($conexion,$sql);
                    while($registro = mysqli_fetch_row($resultado)){
                        $datos=$registro[0]."||".$registro[1]."||".$registro[2]."||".$registro[3]."||".$registro[4];

                 ?>

                    <tr>
                        <td><?php echo $registro[1]; ?></td>
                        <!-- <td><?php echo $registro[2]; ?></td> -->
                        <td><?php echo "Bs. ".$registro[4]; ?></td>
                        <td><?php echo $registro[3]; ?></td>
                    </tr>

                <?php
                                                            }

                ?>
                </tbody>

            </table>
        </div>
