        <!-- Inicializamos el DataTable -->
        
        <script type="text/javascript">
            $(document).ready(function() {
                var table = $("#datatable_lamina").DataTable({
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
                    }/*,
                    "aoColumns": [
                    { sWidth: '40%' },
                    { sWidth: '20%' },
                    { sWidth: '10%' },
                    { sWidth: '10%' },
                    { sWidth: '30%' },
                    { sWidth: '10%' } ]*/

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
            <table id="datatable_lamina" class="table table-sm table-bordered dt-responsive" width="99%">
                <thead>
                    <tr>
                        <th class="all">Nombre de la Lámina</th>
                        <!-- <th>Descripción</th> -->
                        <th class="none">Descripción</th>
                        <th class="all">Categoría</th>
                        <th class="none">Stock</th>
                        <th class="all">Nº</th>
                        <th class="all">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    $sql="SELECT *from lamina";
                    $resultado=mysqli_query($conexion,$sql);
                    while($registro = mysqli_fetch_row($resultado))
                    {
                        $datos = $registro[0]."||".
                        $registro[1]."||".
                        $registro[2]."||".
                        $registro[3]."||".
                        $registro[4]."||".
                        $registro[5]."||".
                        $registro[6];
                        ?>

                        <tr>
                            <td><?php echo $registro[1]; ?></td>
                            <td><?php echo $registro[2]; ?></td>
                            <td><?php echo $registro[4]; ?></td>
                            <td><?php echo $registro[5]; ?></td>
                            <td><?php echo $registro[6]; ?></td>
                            <td align="center">
                                <a style="color:white; font-size: 18px;" href="#" data-toggle="modal" data-target="#modal_actualizar_lamina" title="Editar" onclick="EditarLamina('<?php echo $datos; ?>')">
                                    <i class="icon-pencil"></i>
                                </a>
                                <a style="color:white; font-size: 18px;" href="#" data-toggle="modal" data-target="#modal_abastecer_lamina" title="Abastecer" onclick="AbastecerLamina('<?php echo $datos; ?>')">
                                    <i class="icon-basket-loaded"></i>
                                </a>
                                <a style="color:white; font-size: 18px;" href="#" title="Eliminar" onclick="EliminarLamina('<?php echo $registro[0]; ?>')">
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
