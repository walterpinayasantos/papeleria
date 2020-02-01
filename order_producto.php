<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8" />
        <title>PSMG - Material Escolar, de Escritorio y Papeleria</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
        <meta content="Coderthemes" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="assets/images/favicon2.ico">
        
        <!-- App css -->
        <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/app.min.css" rel="stylesheet" type="text/css" />

        <!-- DataTables -->
        <link href="assets/libs/datatables/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/libs/datatables/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/libs/datatables/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/libs/datatables/select.bootstrap4.min.css" rel="stylesheet" type="text/css" />   

        <!-- Sweet Alert-->
        <link href="assets/libs/sweetalert2/sweetalert2.min.css" rel="stylesheet" type="text/css" />  
        
        <!-- JQuery UI -->
        <link href="assets/libs/jquery-ui/themes/dark-hive/jquery-ui.min.css" rel="stylesheet" type="text/css" />

        <!-- Funciones para el CRUD para el PUNTO DE VENTA de la Papeleria -->
        <script src="assets/js/crud/crud_salesreport.js"></script>

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
                <div class="content" id="contenido">
                    <!-- Start Content-->
                    <div class="container-fluid">
                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box">
                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Papeleria</a></li>
                                            <li class="breadcrumb-item active">Lista de Pedido</li>
                                        </ol>
                                    </div>
                                    <h4 class="page-title">Lista de Pedido para Productos</h4>
                                </div>
                            </div>
                        </div>     
                        <!-- end page title -->


                        <!--==========================================
                        =   INICIO CONTENIDO DE LA PÁGINA PRINCIPAL   =
                        ===========================================-->
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card-box">
                                    <div class="container">
                                        <div class="row justify-content-center">
                                            <form class="form-inline">
                                                <label class="mb-2 mr-sm-2">CANTIDAD MINIMA DE PEDIDO :</label>
                                                <input type="number" min="0" class="form-control mb-2 mr-sm-2" id="cantidad_min" value="0">
                                                <button type="button" class="btn btn-primary mb-2" id="button_pedido">GENERAR REPORTE</button>
                                            </form>
                                        </div>
                                    </div>
                                    <div class="card-box">
                                        <div class="row" id="tabla_pedido">
                                        </div>                                                
                                    </div>
                                </div><!-- end card-box-->
                            </div>

                        </div><!-- end row -->
                        
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

        <!-- JQuery UI <script src="assets/libs/jquery/jquery-3.4.1.min.js"></script>-->
        
        <script src="assets/libs/jquery-ui/jquery-ui.min.js"></script>
        
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
        <script src="assets/libs/datatables/jszip.min.js"></script>
        <script src="assets/libs/datatables/pdfmake.min.js"></script>
        <script src="assets/libs/datatables/vfs_fonts.js"></script>

        <script src="assets/libs/datatables/dataTables.keyTable.min.js"></script>
        <script src="assets/libs/datatables/dataTables.select.min.js"></script>

        <!-- Sweet Alerts js -->
        <script src="assets/libs/sweetalert2/sweetalert2.min.js"></script>
        
        <!-- App js -->
        <script src="assets/js/app.min.js"></script>

        <!-- FOCO, BUSQUEDA, SELECCION PRODUCTO, MODAL DEL PRODUCTO, GUARDAR DETALLE, GUARDAR FACTURA  -->
        <script type="text/javascript">
        	//1. COLOCAMOS EL FOCO EN EL INPUT PARA BUSCAR UN PRODUCTO INMEDIATAMENTE DESPUES DE ABRIR LA PAGINA pos.php
            //$('#producto').focus();
            //CARGAMOS LA TABLA PEDIDO en el DIV con id=tabla_pedido
            $(document).ready(function() {
                $('#tabla_pedido').load('order_producto_tabla.php');
            });
            //CUANDO DAMOS CLICK EN EL BOTON PARA GENERAR INFORME POR DIA SEMANA MES Y AÑO
            //LOS BOTONES TIENEN IDs, dia, semana, mes, anio
            $(document).ready(function(){
                $('#button_pedido').click(function(){
                cantidad=$('#cantidad_min').val();        
                PedidoProducto(cantidad);
               });
            });
        </script>
    </body>
</html>