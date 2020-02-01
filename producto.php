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

        <!-- jvectormap -->
        <link href="assets/libs/jqvmap/jqvmap.min.css" rel="stylesheet" />

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
        
        <!-- Funciones para el CRUD para los Productos de la Papeleria -->
        <script src="assets/js/crud/crud_producto.js"></script>

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
                                            <li class="breadcrumb-item active">Productos</li>
                                        </ol>
                                    </div>
                                    <h4 class="page-title">
                                        <a style="color:yellow;" 
                                            href="#" data-toggle="modal" 
                                            data-target="#modal_crear_producto" 
                                            title="Registrar Producto">
                                            <i class="icon-plus"></i>
                                        </a> Productos
                                    </h4>
                                </div>
                            </div>
                        </div>     
                        <!-- end page title --> 

                        <div class="row">
                            <div class="col-12">
                                <div class="card-box">
                                    <!-- Muestra los registros en un DataTable desde una consulta MySQL -->
                                    <div id="tabla_producto"></div>
                                </div> <!-- end card-box -->
                            </div> <!-- end col -->
                        </div> <!-- end row -->
                        
                        <!-- MODAL PARA LA CREACION DE UN PRODUCTO -->
                        <div id="modal_crear_producto" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title" id="myModalLabel">Registro de un Nuevo Producto</h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                    </div>
                                    <div class="modal-body">
                                        <form class="form-horizontal" role="form" id="formulario_crear_producto">
                                            <div class="form-row">
                                                <div class="form-group col-lg-9">
                                                    <label class="col-form-label">Nombre y Marca del Producto</label>
                                                    <input type="text" class="form-control form-control-sm" style="text-transform: uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();" id="c_nombre">
                                                </div>
                                                <div class="form-group col-lg-3">
                                                    <label class="col-form-label">Vencimiento</label>
                                                    <input type="date" class="form-control form-control-sm" id="c_expiracion">
                                                </div>                                              
                                                <div class="form-group col-lg-12">
                                                    <label class="col-form-label">Descripcion del producto</label>
                                                    <textarea class="form-control" rows="2" style="text-transform: uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();" id="c_descripcion"></textarea>
                                                </div>

                                                <div class="form-group col-lg-6">
                                                    <label class="col-form-label">Detalle de Compra</label>
                                                    <input type="text" class="form-control form-control-sm" style="text-transform: uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();" id="c_detalle">
                                                </div> 
                                                <div class="form-group col-lg-6">
                                                    <label class="col-form-label">Ubicacion</label>
                                                    <input type="text" class="form-control form-control-sm" style="text-transform: uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();" id="c_ubicacion">
                                                </div>  

                                                <div class="form-group col-lg-3">
                                                    <label class="col-form-label">Cant.Comprada (Unidades)</label>
                                                    <input type="number" min="0" value="0" class="form-control form-control-sm" id="c_cantidad">
                                                </div>
                                                <div class="form-group col-lg-3">
                                                    <label class="col-form-label">Precio de Compra (Bs)</label>
                                                    <input type="number" min="0" value="0" class="form-control form-control-sm" id="c_precio">
                                                </div>
                                                <div class="form-group col-lg-3">
                                                    <label class="col-form-label">Precio Unitario (Bs)</label>
                                                    <input type="number" min="0" value="0" class="form-control form-control-sm" id="c_unitario">
                                                </div>
                                                <div class="form-group col-lg-3">
                                                    <label class="col-form-label">Precio de Venta (Bs)</label>
                                                    <input type="number" min="0" value="0" class="form-control form-control-sm" id="c_venta">
                                                </div>                                              

                                            </div>
                                        </form>
                                    </div>
                                    <div class="modal-footer">
                                            <button type="button" class="btn btn-light waves-effect" data-dismiss="modal">Cancelar</button>
                                            <button type="button" class="btn btn-primary waves-effect waves-light" data-dismiss="modal" id="create_producto">Guardar Registro</button>
                                    </div>
                                </div><!-- /.modal-content -->
                            </div><!-- /.modal-dialog -->
                        </div><!-- /.modal -->
                    
                        <!-- MODAL PARA LA ACTUALIZACION DE UN PRODUCTO -->
                        <div id="modal_actualizar_producto" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title" id="myModalLabel">Actualizar Datos del Producto</h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                    </div>
                                    <div class="modal-body">
                                        <form class="form-horizontal" role="form" id="formulario_actualizar_producto">
                                            <div class="form-row">
                                                <input type="hidden" name="" class="form-control form-control-sm" id="prod_id">
                                                <div class="form-group col-lg-9">
                                                    <label class="col-form-label">Nombre y Marca del Producto</label>
                                                    <input type="text" class="form-control form-control-sm" style="text-transform: uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();" id="u_nombre">
                                                </div>
                                                <div class="form-group col-lg-3">
                                                    <label class="col-form-label">Stock</label>
                                                    <input type="number" class="form-control form-control-sm" id="u_stock" readonly="">
                                                </div>                                              
                                                <div class="form-group col-lg-12">
                                                    <label class="col-form-label">Descripción del producto</label>
                                                    <textarea class="form-control" rows="2" style="text-transform: uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();" id="u_descripcion"></textarea>
                                                </div>

                                                <div class="form-group col-lg-9">
                                                    <label class="col-form-label">Ubicación</label>
                                                    <input type="text" class="form-control form-control-sm" style="text-transform: uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();" id="u_ubicacion">
                                                </div>  

                                                <div class="form-group col-lg-3">
                                                    <label class="col-form-label">Precio de Venta (Bs)</label>
                                                    <input type="number" min="0" value="0" class="form-control form-control-sm" id="u_venta">
                                                </div>                                              

                                            </div>
                                        </form>
                                    </div>
                                    <div class="modal-footer">
                                            <button type="button" class="btn btn-light waves-effect" data-dismiss="modal">Cancelar</button>
                                            <button type="button" class="btn btn-primary waves-effect waves-light" data-dismiss="modal" id="update_producto">Actualizar Registro</button>
                                    </div>
                                </div><!-- /.modal-content -->
                            </div><!-- /.modal-dialog -->
                        </div><!-- /.modal -->

                        <!-- MODAL PARA LA ABASTECER O AÑADIR LA COMPRA DE UN PRODUCTO -->
                        <div id="modal_abastecer_producto" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title" id="myModalLabel">Añadir Stock (Compra de un Producto)</h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                    </div>
                                    <div class="modal-body">
                                        <form class="form-horizontal" role="form" id="formulario_abastecer_producto">
                                            <div class="form-row">
                                                <!-- ID DEL PRODUCTO QUE QUEREMOS ABASTECER -->
                                                <input type="hidden" name="" class="form-control form-control-sm" id="a_prod_id">
                                                <div class="form-group col-lg-7">
                                                    <label class="col-form-label">Nombre y Marca del Producto</label>
                                                    <input type="text" class="form-control form-control-sm" id="a_nombre" readonly="">
                                                </div>
                                                <div class="form-group col-lg-2">
                                                    <label class="col-form-label">Stock</label>
                                                    <!-- STOCK ACTUAL DEL PRODUCTO -->
                                                    <input type="number" name="" class="form-control form-control-sm" id="stock_producto" readonly="">
                                                </div>
                                                <div class="form-group col-lg-3">
                                                    <label class="col-form-label">Vencimiento</label>
                                                    <input type="date" class="form-control form-control-sm" id="a_expiracion">
                                                </div>                                              

                                                <div class="form-group col-lg-12">
                                                    <label class="col-form-label">Detalle de Compra</label>
                                                    <input type="text" class="form-control form-control-sm" style="text-transform: uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();" id="a_detalle">
                                                </div> 

                                                <div class="form-group col-lg-4">
                                                    <label class="col-form-label">Cant.Comprada (Unidades)</label>
                                                    <input type="number" min="1" value="0" class="form-control form-control-sm" id="a_cantidad">
                                                </div>
                                                <div class="form-group col-lg-4">
                                                    <label class="col-form-label">Precio de Compra (Bs)</label>
                                                    <input type="number" min="0" value="0" class="form-control form-control-sm" id="a_precio">
                                                </div>
                                                <div class="form-group col-lg-4">
                                                    <label class="col-form-label">Precio Unitario (Bs)</label>
                                                    <input type="number" min="0" value="0" class="form-control form-control-sm" id="a_unitario">
                                                </div>

                                            </div>
                                        </form>
                                    </div>
                                    <div class="modal-footer">
                                            <button type="button" class="btn btn-light waves-effect" data-dismiss="modal">Cancelar</button>
                                            <button type="button" class="btn btn-primary waves-effect waves-light" data-dismiss="modal" id="compra_producto">Guardar Registro</button>
                                    </div>
                                </div><!-- /.modal-content -->
                            </div><!-- /.modal-dialog -->
                        </div><!-- /.modal -->

                        <!-- MODAL QUE MUESTRA EL HISTORIAL DE COMPRA DE UN PRODUCTO -->
                        <div id="modal_historial_producto" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title" id="myModalLabel">Historial De Compras  :&nbsp;&nbsp;</h4><h4 class="modal-title" id="prod_nombre"></h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                    </div>
                                    <div class="modal-body">
                                            <!-- Muestra los registros en un DataTable desde una consulta MySQL -->
                                            <div id="tabla_producto_historial"></div>
                                    </div>
                                    <!-- <div class="modal-footer">
                                            <button type="button" class="btn btn-light waves-effect" data-dismiss="modal">Cerrar</button>
                                    </div> -->
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
        
        <!-- Calcula el precio de venta unitario DaDo la cantidad y precio de compra EN el formualrio de REGISTRO -->
        <script type="text/javascript">
            $(document).ready(function () {
                $("#c_precio").keyup(function () {
                    var cantidad = document.getElementById("c_cantidad").value;
                    var precio = $(this).val();
                    var resultado = (parseFloat(precio) / parseFloat(cantidad)).toFixed(2);
                    document.getElementById("c_unitario").value = resultado;
                });
            });
        </script>
        <!-- Calcula el precio de venta unitario DaDo la cantidad y precio de compra En el formulario de ABASTECER-->
        <script type="text/javascript">
            $(document).ready(function () {
                $("#a_precio").keyup(function () {
                    var cantidad = document.getElementById("a_cantidad").value;
                    var precio = $(this).val();
                    var resultado = (parseFloat(precio) / parseFloat(cantidad)).toFixed(2);
                    document.getElementById("a_unitario").value = resultado;
                });
            });
        </script>

        <!-- Scripts para la Manipulacion de DataTables -->
        <script type="text/javascript">
            $(document).ready(function() {
                $('#tabla_producto').load('producto_tabla.php');
            });
        </script>
        
        <!-- Colocar Foco en el Primer Input despues de abrir el Modal -->
        <script type="text/javascript">
            $(document).ready(function() {
                $('#modal_crear_producto').on('shown.bs.modal',function(){
                    $('#c_nombre').trigger('focus');
                });
            });
        </script>
        
        <!-- FUNCION PARA REGISTRAR y ACTUALIZAR UN PACIENTE -->
        <script type="text/javascript">
            $(document).ready(function(){
               $('#create_producto').click(function(){
                /*EL SCRIPT JS GUARDA LOS VALORES DE LOS INPUT'S DEL FORMULARIO DE REGISTRO
                Y LOS GUARDA EN VARIABLES, PARA LUEGO LLAMAR A LA FUNCION CrearPaciente y 
                MANDARLES ESAS VARIABLES COMO PARAMETROS.*/
                valor1 = $('#c_nombre').val();
                valor2 = $('#c_descripcion').val();
                valor3 = $('#c_detalle').val();
                valor4 = $('#c_expiracion').val();
                valor5 = $('#c_ubicacion').val();
                valor6 = $('#c_cantidad').val();
                valor7 = $('#c_precio').val();
                valor8 = $('#c_unitario').val();
                valor9 = $('#c_venta').val();
                CrearProducto(valor1,valor2,valor3,valor4,valor5,valor6,valor7,valor8,valor9);

               });
            
            $('#update_producto').click(function(){
                ActualizarProducto();
            });
            $('#compra_producto').click(function(){
                valor1 = $('#a_prod_id').val();
                valor2 = $('#a_expiracion').val();
                valor3 = $('#a_detalle').val();
                valor4 = $('#a_cantidad').val();
                valor5 = $('#a_precio').val();
                valor6 = $('#a_unitario').val();
                valor7 = $('#stock_producto').val();
                CompraProducto(valor1,valor2,valor3,valor4,valor5,valor6,valor7);
            });

            });
            
        </script>

    </body>
</html>