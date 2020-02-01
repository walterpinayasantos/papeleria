        <!-- Inicializamos el DataTable -->
        
        <script type="text/javascript">
            $(document).ready(function() {
                $("#datatable_administrador").DataTable({
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
            });
        </script>
        <!--=================================================
        =       CONEXIÓN A LA BASE DE DATOS PAPELERIA       =
        ==================================================-->
        <?php include('assets/inc/conexion.php'); ?>
        <div class="table-responsive">
            <table id="datatable_administrador" class="table table-sm table-bordered dt-responsive" width="99%">
                <thead>
                <tr>
                    <th>Nombre Completo</th>
                    <th>C. I.</th>
                    <th>Celular</th>
                    <th>Dirección</th>
                    <th>Fecha De Registro</th>
                    <th>Acciones</th>
                </tr>
                </thead>


                <tbody>
                    <?php 
                        $sql="SELECT *from administrador";
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
                                     $registro[6];
                           
                    ?>

                        <tr>
                            <td><?php echo $registro[1]." ".$registro[2]; ?></td>
                            <td><?php echo $registro[3]; ?></td>
                            <td><?php echo $registro[4]; ?></td>
                            <td><?php echo $registro[5]; ?></td>
                            <td><?php echo $registro[6]; ?></td>
                            <td align="center">
                                <a style="color:white; font-size: 18px;" 
                                    href="#" data-toggle="modal" 
                                    data-target="#modal_actualizar_administrador"
                                    title="Editar"
                                    onclick="EditarAdministrador('<?php echo $datos; ?>')">
                                    <i class="icon-pencil"></i>
                                </a>
                                <a style="color:white; font-size: 18px;" 
                                    href="#" title="Eliminar"
                                    onclick="EliminarAdministrador('<?php echo $registro[0]; ?>')">
                                    <i class="icon-trash"></i>
                                </a>
                            </td>
                        </tr>

                    <?php
                        }
                        mysqli_close($conexion);          
                    ?>
                </tbody>
            </table>            
        </div>
