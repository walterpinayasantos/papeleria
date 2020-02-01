        <!-- Inicializamos el DataTable -->  
        <script type="text/javascript">
            $(document).ready(function(){
                $("#datatable_asistencia").DataTable({
                    "paging":false, "searching":false,"order": [[ 0,"desc" ]], "info": false,
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
            <table id="datatable_asistencia" class="table-condensed dt-responsive" width="99%">
                <thead>
                <tr>
                    <th>Administrador</th>
                    <th>Fecha</th>
                    <th>Entrada - Salida</th>
                    <th>Duración</th>
                    <th>Estado</th>
                    <th>Ficha</th>
                </tr>
                </thead>
                <tbody>
                    <?php 
                        /*LA CONSULTA REGRESARA LAS ASISTENCIA DEL DIA DE HOY*/
                        $hoy = date("Y-m-d");
                        $sql="SELECT user_id, asis_fecha, asis_entrada, asis_salida FROM asistencia WHERE asis_fecha='2019-10-12'";
                        $resultado=mysqli_query($conexion,$sql);
                        while($registro = mysqli_fetch_row($resultado))
                        {
                            $datos = $registro[0]."||".
                                     $registro[1]."||".
                                     $registro[2]."||".
                                     $registro[3];
                    ?>

                        <tr>
                            <td><?php echo $registro[0].'WALTER PINAYA SANTOS'; ?></td>
                            <td>
                                <?php
                                    $fecha = new DateTime($registro[1]);
                                    echo strftime("%d %b %Y", $fecha->getTimestamp());
                                ?>  
                            </td>
                            <td><?php echo date("g:i a", strtotime($registro[2])).' - '.date("g:i a", strtotime($registro[3])); ?></td>
                            <td>
                                <?php 
                                    $horaEntrada = new DateTime($registro[2]);
                                    $horaSalida = new DateTime($registro[3]);
                                    $diferencia = $horaEntrada -> diff($horaSalida);
                                    echo $diferencia -> format('%H:%I:%S'); 
                                ?>
                            </td>
                            <td><!-- <span class="badge badge-dark">Trabajando</span> -->
                                <span class="badge badge-light">Concluido</span>
                            </td>
                            <td align="center">
                                <a style="color:white; font-size: 18px;" 
                                    href="#" data-toggle="modal" 
                                    data-target="#update_asistencia"
                                    title="Completar Registro"
                                    onclick="ActualizarAsistencia('<?php echo $datos; ?>')">
                                    <i class="icon-note"></i>
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
