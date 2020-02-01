<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>PSMG - Material Escolar, de Escritorio y Papeleria</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
        <meta content="Coderthemes" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="assets/images/favicon.ico">

        <!-- DataTables -->
        <link href="assets/libs/datatables/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/libs/datatables/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/libs/datatables/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/libs/datatables/select.bootstrap4.min.css" rel="stylesheet" type="text/css" /> 

        <!-- Sweet Alert-->
        <link href="assets/libs/sweetalert2/sweetalert2.min.css" rel="stylesheet" type="text/css" />

        <!-- App css -->
        <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/app.min.css" rel="stylesheet" type="text/css" />
        
        <!-- Funciones para el CRUD de los Administradores -->
        <script src="assets/js/crud/crud_administrador.js"></script>
    </head>

    <body>

        <!-- Begin page -->
        <div id="wrapper">

            <!-- Topbar Start -->
            <?php include('assets/inc/topbar.php'); ?>
            <!-- end Topbar -->

            <!-- ========== Left Sidebar Start ========== -->
            <?php include('assets/inc/left-side-menu.php'); ?>
            <!-- Left Sidebar End -->

            <!-- ============================================================== -->
            <!-- Start Page Content here -->
            <!-- ============================================================== -->

            <div class="content-page">
                <div class="content">

                    <!-- Start Content-->
                    <div class="container-fluid">
                        
                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box">
                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Papeleria</a></li>
                                            <li class="breadcrumb-item active">Administradores</li>
                                        </ol>
                                    </div>
                                    <h4 class="page-title">
                                        <a style="color:yellow;" 
                                            href="#" data-toggle="modal" 
                                            data-target="#modal_crear_administrador" 
                                            title="Registrar Administrador">
                                            <i class="icon-plus"></i>
                                        </a> Administradores
                                    </h4>
                                </div>
                            </div>
                        </div>     
                        <!-- end page title --> 

                        <div class="row">
                            <div class="col-12">
                                <!--  id="tabla-proveedor" sirve para identificar al div, ya que 
                                    depues de realizar un CRUD solo se recargada ese div usando ajax-->
                                <div class="card-box">
                                    <div id="tabla_administrador"></div>
                                </div> <!-- end card-box -->
                            </div> <!-- end col -->
                        </div> <!-- end row -->
                        <!--============================================================
                        =         MODAL PARA EL REGISTRO DE UN ADMINISTRADOR           =
                        =============================================================-->
                        <div id="modal_crear_administrador" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title" id="myModalLabel">Registro de Administrador</h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                    </div>
                                    <div class="modal-body">
                                        <form id="form_nuevo_administrador">
                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label class="col-form-label">NOMBRES</label>
                                                    <input type="text" class="form-control form-control-sm" id="c_nombres">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label class="col-form-label">APELLIDOS</label>
                                                    <input type="text" class="form-control form-control-sm" id="c_apellidos">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label class="col-form-label">CARNET De IDENTIDAD</label>
                                                    <input type="text" class="form-control form-control-sm" id="c_ci">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label class="col-form-label">CELULAR</label>
                                                    <input type="text" class="form-control form-control-sm" id="c_celular">
                                                </div> 
                                                <div class="form-group col-md-12">
                                                    <label class="col-form-label">DIRECCIÓN</label>
                                                    <input type="text" class="form-control form-control-sm" id="c_direccion">
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="modal-footer">
                                            <button type="button" class="btn btn-light waves-effect" data-dismiss="modal">Cancelar</button>
                                            <button type="submit" class="btn btn-primary waves-effect waves-light" data-dismiss="modal" id="create_administrador">Guardar Registro</button>
                                    </div>
                                </div><!-- /.modal-content -->
                            </div><!-- /.modal-dialog -->
                        </div><!-- /.modal -->
                    
                        <!--==============================================================
                        =          MODAL PARA LA ACTUALIZACION UN ADMINISTRADOR          =
                        ===============================================================-->
                        <div id="modal_actualizar_administrador" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title" id="myModalLabel">Registro de Administrador</h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                    </div>
                                    <div class="modal-body">
                                        <form id="form_actualizar_administrador">
                                            <div class="form-row">
                                                <input type="text" hidden="" class="form-control form-control-sm" id="adm_id">
                                                <div class="form-group col-md-6">
                                                    <label class="col-form-label">NOMBRES</label>
                                                    <input type="text" class="form-control form-control-sm" id="u_nombres">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label class="col-form-label">APELLIDOS</label>
                                                    <input type="text" class="form-control form-control-sm" id="u_apellidos">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label class="col-form-label">CARNET De IDENTIDAD</label>
                                                    <input type="text" class="form-control form-control-sm" id="u_ci">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label class="col-form-label">CELULAR</label>
                                                    <input type="text" class="form-control form-control-sm" id="u_celular">
                                                </div> 
                                                <div class="form-group col-md-12">
                                                    <label class="col-form-label">DIRECCIÓN</label>
                                                    <input type="text" class="form-control form-control-sm" id="u_direccion">
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="modal-footer">
                                            <button type="button" class="btn btn-light waves-effect" data-dismiss="modal">Cancelar</button>
                                            <button type="submit" class="btn btn-primary waves-effect waves-light" data-dismiss="modal" id="update_administrador">Actualizar Registro</button>
                                    </div>
                                </div><!-- /.modal-content -->
                            </div><!-- /.modal-dialog -->
                        </div><!-- /.modal -->
                    </div> <!-- container -->

                </div> <!-- content -->

                <!-- Footer Start -->
                <?php include('assets/inc/footer.php'); ?>
                <!-- end Footer -->

            </div>

            <!-- ============================================================== -->
            <!-- End Page content -->
            <!-- ============================================================== -->


        </div>
        <!-- END wrapper -->

        <!-- Right Sidebar -->
        <?php /*include('assets/inc/right-side-bar.php');*/ ?>
        <!-- /Right-bar -->

        <!-- Right bar overlay-->
        <!--<div class="rightbar-overlay"></div>-->

        <!-- Vendor js -->
        <script src="assets/js/vendor.min.js"></script>



        <!-- Datatable js -->
        <script src="assets/libs/datatables/jquery.dataTables.min.js"></script>
        <script src="assets/libs/datatables/dataTables.bootstrap4.min.js"></script>
        <script src="assets/libs/datatables/dataTables.responsive.min.js"></script>
        <script src="assets/libs/datatables/responsive.bootstrap4.min.js"></script>
        
        <script src="assets/libs/datatables/dataTables.buttons.min.js"></script>
        <script src="assets/libs/datatables/buttons.bootstrap4.min.js"></script>
        <script src="assets/libs/datatables/buttons.html5.min.js"></script>
        <script src="assets/libs/datatables/buttons.flash.min.js"></script>
        <script src="assets/libs/datatables/buttons.print.min.js"></script>

        <script src="assets/libs/datatables/dataTables.keyTable.min.js"></script>
        <script src="assets/libs/datatables/dataTables.select.min.js"></script>

        <!-- Sweet Alerts js -->
        <script src="assets/libs/sweetalert2/sweetalert2.min.js"></script>

        <!-- App js -->
        <script src="assets/js/app.min.js"></script>

        <!-- CARGA LOS REGISTROS DESDE administrador-tabla.php en el DIV con id=tabla_administrador -->
        <script type="text/javascript">
            $(document).ready(function(){
                $('#tabla_administrador').load('administrador_tabla.php');
            });
        </script>

        <!-- FUNCION PARA REGISTRAR y ACTUALIZAR UN ADMINISTRADOR -->
        <script type="text/javascript">
            $(document).ready(function(){
               $('#create_administrador').click(function(){
                /*EL SCRIPT JS GUARDA LOS VALORES DE LOS INPUT'S DEL FORMULARIO DE REGISTRO
                Y LOS GUARDA EN VARIABLES, PARA LUEGO LLAMAR A LA FUNCION CrearPaciente y 
                MANDARLES ESAS VARIABLES COMO PARAMETROS.*/
                valor1 = $('#c_nombres').val();
                valor2 = $('#c_apellidos').val();
                valor3 = $('#c_ci').val();
                valor4 = $('#c_celular').val();
                valor5 = $('#c_direccion').val();

                CrearAdministrador(valor1,valor2,valor3,valor4,valor5);

               });
            
            $('#update_administrador').click(function(){
                ActualizarAdministrador();
            });

            });   
        </script>

        <!-- Colocar Foco en el Primer Input despues de abrir el Modal -->
        <script type="text/javascript">
            $(document).ready(function() {
                $('#modal_crear_administrador').on('shown.bs.modal',function(){
                    $('#c_nombres').trigger('focus');
                });
            });
        </script>
    </body>
</html>