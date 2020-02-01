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
        <link href="assets/css/table.css" rel="stylesheet" type="text/css" />
        
        <!-- Funciones para el CRUD de las LÁMINAS -->
        <script src="assets/js/crud/crud_lamina.js"></script>

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
                                            <li class="breadcrumb-item active">Laminas Escolares</li>
                                        </ol>
                                    </div>
                                    <h4 class="page-title">
                                        <a style="color:yellow;" 
                                            href="#" data-toggle="modal" 
                                            data-target="#modal_crear_lamina" 
                                            title="Registrar Lámina">
                                            <i class="icon-plus"></i>
                                        </a> Láminas Escolares
                                    </h4>
                                </div>
                            </div>
                        </div>     
                        <!-- end page title --> 

                        <div class="row">
                            <div class="col-12">
                                <div class="card-box">
                                    <div id="tabla_lamina"></div>    
                                </div> <!-- end card-box -->
                            </div> <!-- end col -->
                        </div> <!-- end row -->
                        <!--============================================================
                        =            MODAL PARA EL REGISTRO DE UNA LAMINA              =
                        =============================================================-->
                        <div id="modal_crear_lamina" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title" id="myModalLabel">Registro de Lámina...</h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                    </div>
                                    <div class="modal-body">
                                        <form id="form_nuevo_lamina">
                                            <div class="form-row">
                                                <div class="form-group col-md-12">
                                                    <label class="col-form-label">Nombre</label>
                                                    <input type="text" style="text-transform: uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();" class="form-control form-control-sm" id="c_nombre">
                                                </div>
                                                <div class="form-group col-md-12">
                                                    <label class="col-form-label">Descripción</label>
                                                    <textarea class="form-control" rows="4" style="text-transform: uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();" id="c_descripcion"></textarea>
                                                </div>                                                
                                                <div class="form-group col-md-6">
                                                    <label class="col-form-label">Fabricante</label>
                                                    <input type="text" style="text-transform: uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();" class="form-control form-control-sm" id="c_fabricante">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label class="col-form-label">Categoría</label>
                                                    <input type="text" style="text-transform: uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();" class="form-control form-control-sm" id="c_categoria">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label class="col-form-label">Cantidad Comprada</label>
                                                    <input type="number" min="0" class="form-control form-control-sm" id="c_cantidad">
                                                </div>                                              
                                                <div class="form-group col-md-6">
                                                    <label class="col-form-label">Nº de Lámina</label>
                                                    <input type="number" min="0" class="form-control form-control-sm" id="c_numero">
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="modal-footer">
                                            <button type="button" class="btn btn-light waves-effect" data-dismiss="modal">Cancelar</button>
                                            <button type="submit" class="btn btn-primary waves-effect waves-light" data-dismiss="modal" id="create_lamina">Guardar Registro</button>
                                    </div>
                                </div><!-- /.modal-content -->
                            </div><!-- /.modal-dialog -->
                        </div><!-- /.modal -->
                        <!--============================================================
                        =         MODAL PARA LA ACTUALIZACION DE UNA LAMINA            =
                        =============================================================-->
                        <div id="modal_actualizar_lamina" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title" id="myModalLabel">Actualizar Lámina...</h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                    </div>
                                    <div class="modal-body">
                                        <form id="form_actualizar_lamina">
                                            <div class="form-row">
                                                <input type="text" hidden="" class="form-control form-control-sm" id="lam_id">
                                                <div class="form-group col-md-12">
                                                    <label class="col-form-label">Nombre</label>
                                                    <input type="text" style="text-transform: uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();" class="form-control form-control-sm" id="u_nombre">
                                                </div>
                                                <div class="form-group col-md-12">
                                                    <label class="col-form-label">Descripción</label>
                                                    <textarea class="form-control" rows="4" style="text-transform: uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();" id="u_descripcion"></textarea>
                                                </div>                                                
                                                <div class="form-group col-md-6">
                                                    <label class="col-form-label">Fabricante</label>
                                                    <input type="text" class="form-control form-control-sm" style="text-transform: uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();" id="u_fabricante">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label class="col-form-label">Categoría</label>
                                                    <input type="text" class="form-control form-control-sm" style="text-transform: uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();" id="u_categoria">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label class="col-form-label">Cantidad Disponible</label>
                                                    <input type="number" min="0" class="form-control form-control-sm" id="u_cantidad">
                                                </div>                                              
                                                <div class="form-group col-md-6">
                                                    <label class="col-form-label">Nº de Lámina</label>
                                                    <input type="number" min="0" class="form-control form-control-sm" id="u_numero">
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="modal-footer">
                                            <button type="button" class="btn btn-light waves-effect" data-dismiss="modal">Cancelar</button>
                                            <button type="submit" class="btn btn-primary waves-effect waves-light" data-dismiss="modal" id="update_lamina">Actualizar Registro</button>
                                    </div>
                                </div><!-- /.modal-content -->
                            </div><!-- /.modal-dialog -->
                        </div><!-- /.modal -->
                        <!--============================================================
                        =              MODAL PARA ABASTECER UNA LAMINA                 =
                        =============================================================-->
                        <div id="modal_abastecer_lamina" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title" id="myModalLabel">Abastecer Lámina</h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                    </div>
                                    <div class="modal-body">
                                        <form id="form_abastecer_lamina">
                                            <div class="form-row">
                                                <input type="text" hidden="" class="form-control form-control-sm" id="a_id">
                                                <div class="form-group col-md-10">
                                                    <label class="col-form-label">Nombre de la Lámina</label>
                                                    <input type="text" class="form-control form-control-sm" id="a_nombre" readonly="">
                                                </div>
                                                <div class="form-group col-md-2">
                                                    <label class="col-form-label">Stock</label>
                                                    <input type="text" class="form-control form-control-sm" id="cantidad" readonly="">
                                                </div>                                            
                                                <div class="form-group col-md-6">
                                                    <label class="col-form-label">Fabricante</label>
                                                    <input type="text" class="form-control form-control-sm" id="a_fabricante">
                                                </div>                                              
                                                <div class="form-group col-md-3">
                                                    <label class="col-form-label">Nº de Lámina</label>
                                                    <input type="text" class="form-control form-control-sm" id="a_numero">
                                                </div>
                                                
                                                <div class="form-group col-md-3">
                                                    <label class="col-form-label">Cantidad</label>
                                                    <input type="number" min="0" class="form-control form-control-sm" id="a_cantidad">
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="modal-footer">
                                            <button type="button" class="btn btn-light waves-effect" data-dismiss="modal">Cancelar</button>
                                            <button type="submit" class="btn btn-primary waves-effect waves-light" data-dismiss="modal" id="abastecer_lamina">Abastecer Lámina</button>
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

        <!-- CARGA LOS REGISTROS DESDE lamina_tabla.php en el DIV con id=tabla_lamina -->
        <script type="text/javascript">
            $(document).ready(function(){
                $('#tabla_lamina').load('lamina_tabla.php');
            });
        </script>

        <!-- Colocar Foco en el Primer Input despues de abrir el Modal -->
        <script type="text/javascript">
            $(document).ready(function() {
                $('#modal_crear_lamina').on('shown.bs.modal',function(){
                    $('#c_nombre').trigger('focus');
                });
            });
        </script>

        <!-- FUNCION PARA REGISTRAR,ACTUALIZAR y ABASTECER UNA LÁMINA -->
        <script type="text/javascript">
            $(document).ready(function(){
               $('#create_lamina').click(function(){
                /*EL SCRIPT JS GUARDA LOS VALORES DE LOS INPUT'S DEL FORMULARIO DE REGISTRO
                Y LOS GUARDA EN VARIABLES, PARA LUEGO LLAMAR A LA FUNCION CrearPaciente y 
                MANDARLES ESAS VARIABLES COMO PARAMETROS.*/
                valor1 = $('#c_nombre').val();
                valor2 = $('#c_descripcion').val();
                valor3 = $('#c_fabricante').val();
                valor4 = $('#c_categoria').val();
                valor5 = $('#c_cantidad').val();
                valor6 = $('#c_numero').val();

                CrearLamina(valor1,valor2,valor3,valor4,valor5,valor6);

               });
            
            $('#update_lamina').click(function(){
                ActualizarLamina();
            });

            $('#abastecer_lamina').click(function(){
                ActualizarStock();
            });

            });
            /*FOCO IN INPUT SEARCH*/
            $('#datatable_lamina_filter input').focus();

        </script>
    </body>
</html>