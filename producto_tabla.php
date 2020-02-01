        <!-- Inicializamos el DataTable -->
        
        <script type="text/javascript">
            $(document).ready(function() {
                var table = $("#datatable_producto").DataTable({
                    keys: !0,
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
                    }
                });
                //Coloca el foco en el input search del DataTable
                $('div.dataTables_filter input',table.table().container()).focus();
            });
        </script>
        <!--=================================================
        =       CONEXIÓN A LA BASE DE DATOS PAPELERIA       =
        ==================================================-->
        <?php include('assets/inc/conexion.php'); ?>
        <div class="table-responsive">
            <table id="datatable_producto" class="table table-sm table-bordered dt-responsive" width="99%">
                <thead>
                <tr>
                    <th class="all">Nombre Del Producto</th>
                    <th class="none">Descripción</th>
                    <th class="all">Ubicación</th>
                    <th class="none">Stock</th>
                    <th class="all">Precio</th>
                    <th class="all">Acciones</th>
                </tr>
                </thead>
                <tbody>
                    <?php 
                        $sql="SELECT *FROM producto";
                        $resultado=mysqli_query($conexion,$sql);
                        while($registro = mysqli_fetch_row($resultado)){
                            /* En la variable $datos se recoge los registros de una fila
                            de la consulta, para poder enviarlo a los inputs de un modal
                            y de esta manera poder actualizar los datos */
                            $datos = $registro[0]."||".
                                     $registro[1]."||".
                                     $registro[2]."||".
                                     $registro[3]."||".
                                     $registro[4]."||".
                                     $registro[5]."||".
                                     $registro[6]."||".
                                     $registro[7];
                           
                    ?>
                        <tr>
                            <td><?php echo $registro[1]; ?></td>
                            <td><?php echo ": ".$registro[2]; ?></td>
                            <td><?php echo $registro[3]; ?></td>
                            <td><?php echo " : ".$registro[4]; ?></td>
                            <td><?php echo "Bs ".$registro[6]; ?></td>
                            <td align="center">
                                <a style="color:white;" href="#" data-toggle="modal" data-target="#modal_actualizar_producto" title="Editar" onclick="EditarProducto('<?php echo $datos; ?>')">
                                    <i class="icon-pencil"></i>
                                </a>&nbsp;
                                <a style="color:white;" href="#" data-toggle="modal" data-target="#modal_abastecer_producto" title="Abastecer" onclick="AbastecerProducto('<?php echo $registro[0]."||".$registro[1]."||".$registro[4]; ?>')">
                                    <i class="icon-basket-loaded"></i>
                                </a>&nbsp;
                                <a style="color:white;" href="#" data-toggle="modal" data-target="#modal_historial_producto" title="Historial de Compras" onclick="HistorialProducto('<?php echo $registro[0]."||".$registro[1]; ?>')">
                                    <i class="icon-bag"></i>
                                </a>
                                <!--                             <a style="color:white;" 
                                    href="#" title="Eliminar"
                                    onclick="EliminarProducto('<?php echo $registro[0]; ?>')">
                                    <i class="icon-trash"></i>
                                </a> -->
                                

                            </td>
                        </tr>

                    <?php 
                        }          
                    ?>
                </tbody>
            </table>            
        </div>
        <!-- <table id="datatable_producto" class="table table-sm table-bordered dt-responsive nowrap"> -->
