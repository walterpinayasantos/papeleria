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
        <link rel="shortcut icon" href="assets/images/favicon2.ico">

        <!-- DataTables -->
        <link href="assets/libs/datatables/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css"/>
        <link href="assets/libs/datatables/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css"/>

        <!-- Sweet Alert-->
        <link href="assets/libs/sweetalert2/sweetalert2.min.css" rel="stylesheet" type="text/css" />  
        
        <!-- App css -->
        <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/app.min.css" rel="stylesheet" type="text/css" />
        
        <!-- JQuery UI pepper-grinder -->
        <link href="assets/libs/jquery-ui/themes/dark-hive/jquery-ui.min.css" rel="stylesheet" type="text/css" />

        <!-- Funciones para el CRUD para el PUNTO DE VENTA de la Papeleria -->
        <script src="assets/js/crud/crud_pos.js"></script>
        <script src="assets/js/crud/crud_cliente.js"></script>

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
                                            <li class="breadcrumb-item active">Punto De Venta</li>
                                        </ol>
                                    </div>
                                    <h4 class="page-title">Punto De Venta</h4>
                                </div>
                            </div>
                        </div>     
                        <!-- end page title -->

                        <!--==========================================
                        =   INICIO CONTENIDO DE LA PÁGINA PRINCIPAL   =
                        ===========================================-->
                        <div class="row">
                            <div class="col-md-8"><!-- TABLA, DETALLE DE COMPRA -->
                                <div class="card-box">
                                <!--=========================================================
                                =  FORMULARIO PARA BUSCAR UN PRODUCTO EN LA TABLA DETALLE   =
                                ==========================================================-->
                                    <form class="form-horizontal" id="formulario_buscar_producto">
                                        <div class="col-md-12">
                                            <div class="form-group row">
                                                <!-- <label class="col-sm-2 col-form-label">PRODUCTO</label> -->
                                                <!-- <div class="col-sm-10"> -->
                                                    <div class="input-group">
                                                        <input type="text" class="form-control" id="producto" placeholder="Buscar producto, por nombre o código de barras..." style="text-transform: uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();">
                                                        <div class="input-group-append">
                                                            <span class="input-group-text" style="color:yellow;"><i class="icon-magnifier"></i></span>
                                                        </div>
                                                    </div>
                                                <!-- </div> -->
                                            </div>
                                        </div>
                                    </form>
                                </div> <!-- end card-box -->

                                <!--=========================================================
                                =    MODAL PARA REGISTRAR UN PRODUCTO EN LA TABLA DETALLE   =
                                ==========================================================-->
                                <div id="modal_crear_detalle" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title" id="myModalLabel">AGREGAR PRODUCTO</h4>
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                            </div>
                                            <div class="modal-body">
                                                <form class="form-horizontal" id="formulario_crear_detalle">
                                                    <!--==========================================
                                                    =      AUTOCOMPLETA DATOS DE UN PRODUCTO     =
                                                    ===========================================-->
                                                    <div class="form-row">
                                                        <div class="form-group col-sm-8">
                                                            <label class="col-form-label">Nombre Del Producto</label>
                                                            <input type="hidden" class="form-control" readonly="" id="prod_id">
                                                            <input type="text" class="form-control" readonly="" id="prod_nombre" value="">
                                                        </div>
                                                        
                                                        <div class="form-group col-sm-2">
                                                            <label class="col-form-label">Precio</label>
                                                            <input type="hidden" class="form-control" readonly="" id="prod_precio_compra" value="">
                                                            <input type="text" class="form-control" readonly="" id="prod_precio_venta" value="">
                                                        </div>
                                                        <div class="form-group col-sm-2">
                                                            <label class="col-form-label">Stock</label>
                                                            <input type="text" class="form-control" readonly="" id="prod_stock" value="">
                                                        </div>
                                                        <div class="form-group col-sm-4">
                                                            <label class="col-form-label">Cant. a Comprar</label>
                                                            <input type="number" min="1" step="1" class="form-control" id="prod_cantidad" value="">
                                                        </div>
                                                        <div class="form-group col-sm-4">
                                                            <label class="col-form-label">Descuento</label>
                                                            <div class="input-group">
                                                                <input type="number" value="0" min="0" max="100" step="10" class="form-control" id="prod_descuento">
                                                                <div class="input-group-append">
                                                                    <span class="input-group-text">%</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group col-sm-4">
                                                            <label class="col-form-label">Sub Total</label>
                                                            <div class="input-group">
                                                                <input type="text" class="form-control" readonly="" id="prod_subtotal" value="0">
                                                                <div class="input-group-append">
                                                                    <span class="input-group-text">Bs</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-light waves-effect" data-dismiss="modal" id="create_cerrar">Cerrar (Esc)</button>
                                                <button type="button" class="btn btn-primary waves-effect waves-light" data-dismiss="modal" id="create_detalle">Agregar (Intro)</button>
                                            </div>
                                        </div><!-- /.modal-content -->
                                    </div><!-- /.modal-dialog -->
                                </div><!-- /.modal -->

                                <!--============================================================
                                =              MODAL PARA EL REGISTRO DE UN CLIENTE            =
                                =============================================================-->
                                <div id="modal_crear_cliente" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title" id="myModalLabel">Registro de Clientes</h4>
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                            </div>
                                            <div class="modal-body">
                                                <form id="form_nuevo_cliente">
                                                    <div class="form-row">
                                                        <div class="form-group col-md-12">
                                                            <label class="col-form-label">Nombre Completo</label>
                                                            <input type="text" class="form-control form-control-sm" style="text-transform: uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();" id="c_nombre">
                                                        </div>
                                                        <div class="form-group col-md-6">
                                                            <label class="col-form-label">CI/NIT</label>
                                                            <input type="number" min="0" class="form-control form-control-sm" id="c_ci_nit">
                                                        </div>
                                                        <div class="form-group col-md-6">
                                                            <label class="col-form-label">Celular</label>
                                                            <input type="number" min="0" class="form-control form-control-sm" id="c_celular">
                                                        </div>
                                                        <div class="form-group col-md-12">
                                                            <label class="col-form-label">Direccion</label>
                                                            <input type="text" class="form-control form-control-sm" style="text-transform: uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();" id="c_direccion">
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="modal-footer">
                                                    <button type="button" class="btn btn-light waves-effect" data-dismiss="modal">Cancelar</button>
                                                    <button type="submit" class="btn btn-primary waves-effect waves-light" data-dismiss="modal" id="create_cliente">Guardar Registro</button>
                                            </div>
                                        </div><!-- /.modal-content -->
                                    </div><!-- /.modal-dialog -->
                                </div><!-- /.modal -->

                                <!--====================================================
                                =    MUESTRA EL DETALLE DE PRODUCTOS DE LA FACTURA N   =
                                =====================================================-->
                                <div class="card-box">
                                    <!-- CARGAMOS EL ARCHIVO pos_tabla.php EN EL DIV con id=tabla_detalle -->
                                    <div class="row" id="tabla_detalle">
                                    </div> <!-- end row -->
                                </div> <!-- end card-box -->
                            </div>
        
                            <div class="col-md-4"><!-- FICHA DATOS DEL CLIENTE Y TOTAL DE LA COMPRA -->
                                <div class="card-box">
                                    <h3 class="card-header" align="center">Bs. 
                                        <span id="fac_total_cabecera"></span>
                                    </h3>
                                    <!-- <div class="card-body"> -->
                                    <div>
                                        <form id="factura">
                                            <h5>DATOS DEL CLIENTE:</h5>
                                            <div class="form-group">
                                                <label>NIT ó C.I.</label>
                                                <input type="hidden" class="form-control" id="cli_id">
                                                <div class="input-group">
                                                    <input type="number" min="0" class="form-control" id="cli_ci_nit">
                                                    <div class="input-group-append">
                                                        <span class="input-group-text">
                                                            <a style="color:yellow;" href="#" data-toggle="modal" data-target="#modal_crear_cliente" title="Registrar Cliente"><i class="icon-user-follow"></i></a>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label>Nombre del Cliente</label>
                                                <input type="text" class="form-control" style="text-transform: uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();" id="cli_nombre">
                                            </div>
                                            <h5>DATOS DE LA FACTURA:</h5>
                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label class="col-form-label">Factura Nº</label>
                                                    <!--======================================
                                                    =     MOSTRAMOS EL NUMERO DE FACTURA    ==
                                                    =======================================-->
                                                    <div id="numero_factura">
                                                        
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label class="col-form-label">Fecha y Hora</label>
                                                    <input type="text" class="form-control" readonly="" id="fac_fecha_hora" value="<?php echo date("Y-m-d H:i:s"); ?>">
                                                </div>

                                                <div class="form-group col-sm-12">
                                                    <input type="hidden" class="form-control" id="user_id" value="1">
                                                    <label>Nombre del Cajero</label>
                                                    <input type="text" class="form-control" id="user_nombre" readonly="" value="SERVER-PC">
                                                </div>
                                                <div class="form-group col-sm-4">
                                                    <label class="col-form-label">Total</label>
                                                    <!--======================================
                                                    =    MOSTRAMOS EL TOTAL DE LA FACTURA   ==
                                                    =======================================-->
                                                    <div id="total_factura">
                                                        
                                                    </div>
                                                </div>
                                                <div class="form-group col-sm-4">
                                                    <label class="col-form-label">Importe</label>
                                                    <input type="number" min="0" class="form-control" id="fac_importe" value="0.00">
                                                </div>
                                                <div class="form-group col-sm-4">
                                                    <label class="col-form-label">Cambio</label>
                                                    <input type="text" class="form-control" readonly="" id="fac_cambio" value="0.00">
                                                </div>
                                            </div>

                                            <!-- <ul class="list-group list-group-flush">
                                                <li class="list-group-item">Total :</li>
                                            </ul><br /> -->
                                            <div class="form-row">
                                                <div class="form-group col-md-12" align="center">
                                                    <button type="button" id="create_factura" class="btn btn-primary width-lg"> REGISTRAR FACTURA </button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div> <!-- end card-box-->
                            </div><!-- end col -->
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

        <!-- Sweet Alerts js -->
        <script src="assets/libs/sweetalert2/sweetalert2.min.js"></script>
        
        <!-- App js -->
        <script src="assets/js/app.min.js"></script>

        <!-- FOCO, BUSQUEDA, SELECCION PRODUCTO, MODAL DEL PRODUCTO, GUARDAR DETALLE, GUARDAR FACTURA  -->
        <script type="text/javascript">
        	//1. COLOCAMOS EL FOCO EN EL INPUT PARA BUSCAR UN PRODUCTO INMEDIATAMENTE DESPUES DE ABRIR LA PAGINA pos.php
            $('#producto').focus();
            //CARGAMOS LA TABLA DETALLE DE COMPRA en el DIV con id=tabla_detalle
            $(document).ready(function() {
                $('#tabla_detalle').load('pos_tabla.php');
                //CARGAMOS EL NUMERO DE FACTURA
                $('#numero_factura').load('assets/inc/create_numero_factura.php');
                //CARGAMOS EL TOTAL DE LA FACTURA
                $('#total_factura').load('factura_total.php');
                $('#fac_total_cabecera').load('factura_total_cabecera.php');

            });

            //AUTOCOMPLETA DATOS DEL PRODUCTO PARA LUEGO ABRIR EL MODAL CREAR DETALLE
            $(document).ready(function(){
                $("#producto").autocomplete({
                        source: "autocomplete_producto.php",
                        minLength: 2,
                        select: function(event, ui) {
                            event.preventDefault();
                            $('#prod_id').val(ui.item.id);
                            $('#prod_nombre').val(ui.item.nombre);
                            $('#prod_stock').val(ui.item.stock);
                            $('#prod_precio_compra').val(ui.item.precio_compra);
                            $('#prod_precio_venta').val(ui.item.precio_venta);
                            //ABRE VENTANA MODAL...(CON DATOS DEL ITEM SELECCIONADO)
                            $('#modal_crear_detalle').modal("show");
                        }
                });
            });
            //2. COLOCA EL FOCO EN EL INPUT CANTIDAD A COMPRAR SOLO SI HAY STOCK DISPONIBLE, DESPUES DE CARGAR EL MODAL CREAR DETALLE
            $(document).ready(function() {
                //COLOCAMOS EL FOCO EN EL INPUT DE CANTIDAD A COMPRAR, DESPUES DE ABRIR EL MODAL CREAR DETALLE
                //DEPENDIENDO SI HAY STOCK DISPONIBLE, SI EL STOCK ES MAYOR A 0 ENTONCES SE PONE EL FOCO, SI NO NÓ.
                $('#modal_crear_detalle').on('shown.bs.modal',function(){
                    //SI EL STOCK ES CERO, NO SE PUEDE COMPRAR ESE PRODUCTO, POR TANTO EL VALUE MINIMO DE CANTIDAD A COMPRAR SERA 0, CASO CONTRARIO 1
                    stock = parseInt($('#prod_stock').val());
                    if (stock > 0) {
                        //COLOCAMOS EL VALOR DEL SUB TOTAL AL ABRIR EL MODAL, DONDE MUESTRA EN CANTIDAD UN PRODUCTO Y SIN DESCUENTO
                        //ESTO ES SOLO PARA CUANDO SE ABRE EL MODAL.
                        $('#prod_cantidad').val(1);
                        var valor = $("#prod_cantidad").removeAttr("readonly");
                        document.getElementById("prod_subtotal").value = parseFloat($('#prod_cantidad').val())*parseFloat($('#prod_precio_venta').val());
                        //AL ATRIBUTO MAX DEL INPUT con id=prod_cantidad SE ASIGNACION EL VALOR DEL STOCK
                        //ESO QUIERE DECIR QUE NO SE PUEDE COMPRAR MAS QUE ES STOCK DISPONIBLE
                        var input = document.getElementById("prod_cantidad");
                        input.setAttribute("max",stock); // set a new value;
                        //COLOCAMOS EL FOCO EN EL INPUT CANTIDAD A COMPRAR
                        $('#prod_cantidad').focus();

                    }else{//SI EL STOCK ES CERO...
                        //SETEAMOS EL VALUE DE CANTIDAD A COMPRAR A CERO y DE SOLO LECTURA
                        $('#prod_cantidad').val(0);
                        var valor = $("#prod_cantidad").attr("readonly","readonly");
                        //SI EL STOCK ES CERO, ENTONCES EL SUB TOTAL ES CERO
                        document.getElementById("prod_subtotal").value = 0;
                        //AL ATRIBUTO MAX DEL INPUT con id=prod_cantidad SE ASIGNACION EL VALOR DEL STOCK
                        //ESO QUIERE DECIR QUE NO SE PUEDE COMPRAR MAS QUE ES STOCK DISPONIBLE
                        //var input = document.getElementById("prod_cantidad");
                        //input.setAttribute("max",0); // set a new value;
                    }
                });
            });
            //3. CALCULA EL SUBTOTAL DADO LA CANTIDAd A COMPRAR y EL DESCUENTO
            $('#prod_cantidad').on('keyup change',function() {
            //$('#prod_cantidad').keyup(function() {
                var cantidad = $(this).val();

                pc = parseFloat($('#prod_precio_compra').val());
                pv = parseFloat($('#prod_precio_venta').val());
                desc = parseFloat($('#prod_descuento').val());
                utilidad = (parseFloat(pv)-parseFloat(pc)).toFixed(2);
                // SUBTOTAL = CANTIDAD * (PRECIOdeCOMPRA + (UTILIDAD - UTILIDAD/100))
                subtotal = (parseFloat(cantidad)*((parseFloat(pc)+(parseFloat(utilidad)-parseFloat(utilidad)*(parseFloat(desc)/100))))).toFixed(2);
                //$('#prod_subtotal').text(subtotal);
                $('#prod_subtotal').val(subtotal);

              }).keyup();

            $('#prod_descuento').on('keyup change',function() {
            //$('#prod_cantidad').keyup(function() {
                var descuento = $( this ).val();
                //$( "p" ).text( cantidad );
                //porcentaje del valor total para precios de ventas
                cantidad = parseFloat($('#prod_cantidad').val());
                pc = parseFloat($('#prod_precio_compra').val());
                pv = parseFloat($('#prod_precio_venta').val());
                desc = parseFloat(descuento);
                utilidad = (parseFloat(pv)-parseFloat(pc)).toFixed(2);
                subtotal = (parseFloat(cantidad)*((parseFloat(pc)+(parseFloat(utilidad)-parseFloat(utilidad)*(parseFloat(desc)/100))))).toFixed(2);

                //$('#subtotal').text(subtotal);
                $('#prod_subtotal').val(subtotal);

              }).keyup();
            
            //4. ASIGNACION DE HotKey A LOS BOTONES USANDO JavaSCcript
            document.addEventListener('keyup', event => {
                // combinación de teclas ctrl + a        http://keycode.info/
                /*if (event.ctrlKey && event.keyCode === 65) {
                    document.getElementById("create_detalle").click();
                }*/
                if (event.keyCode === 13) {//13 tecla enter
                    document.getElementById("create_detalle").click();
                    //LIMPIA EL FORMULARIO DE BUSQUEDA DE PRODUCTO
                    $('#formulario_buscar_producto')[0].reset();
                    //LIMPIA EL MODAL PARA REGISTRAR PRODUCTO
                    $('#modal_crear_detalle').on('hidden.bs.modal',function(){
                        $(this).find('#formulario_crear_detalle')[0].reset();
                    });
                    //COLOCAMOS EL FOCO EN EL INPUT PARA BUSCAR UN PRODUCTO
                    $('#producto').focus();
                }
                else if (event.keyCode === 27) {//27 tecla escape
                    document.getElementById("create_cerrar").click();
                    //LIMPIA EL FORMULARIO DE BUSQUEDA DE PRODUCTO
                    $('#formulario_buscar_producto')[0].reset();
                    //LIMPIA EL MODAL PARA REGISTRAR PRODUCTO
                    $('#modal_crear_detalle').on('hidden.bs.modal',function(){
                        $(this).find('#formulario_crear_detalle')[0].reset();
                    });
                    //COLOCAMOS EL FOCO EN EL INPUT PARA BUSCAR UN PRODUCTO
                    $('#producto').focus();
                }
            }, false);


            //REGISTRA UN PRODUCTO EN LA TABLA DETALLE DE COMPRA DE LA FACTURA
            $('#create_detalle').click(function(){
                valor1 = parseInt($('#fac_id').val());
                valor2 = $('#prod_id').val();
                valor3 = $('#prod_nombre').val();
                valor4 = $('#prod_cantidad').val();
                valor5 = parseInt($('#prod_stock').val())-parseInt($('#prod_cantidad').val());//STOCK ACTUALIZADO
                valor6 = $('#prod_precio_venta').val();
                //EL SUBTOTAL Y UTILIDAD SE PUEDE COPIAR DIRECTAMENTE DE LOS INPUTS, YA QUE EL CALCULO SE REALIZA
                //MAS ARRIBA CUANDO LA CANTIDAD Y DESCUENTO CAMBIAN....
                //valor7 = (parseFloat($('#prod_cantidad').val())*parseFloat($('#prod_precio_venta').val())).toFixed(2);//SUB TOTAL
                //valor8 = (parseFloat($('#prod_cantidad').val())*(parseFloat($('#prod_precio_venta').val())-parseFloat($('#prod_precio_compra').val()))).toFixed(2);//UTILIDAD
                valor7 = parseFloat($('#prod_subtotal').val());//SUB TOTAL
                valor8 = (parseFloat($('#prod_subtotal').val())-(parseFloat($('#prod_cantidad').val())*parseFloat($('#prod_precio_compra').val()))).toFixed(2);//UTILIDAD
                CrearDetalle(valor1, valor2, valor3, valor4, valor5, valor6, valor7, valor8);
                    //LIMPIA EL FORMULARIO DE BUSQUEDA DE PRODUCTO
                    $('#formulario_buscar_producto')[0].reset();
                    //COLOCAMOS EL FOCO EN EL INPUT PARA BUSCAR UN PRODUCTO
                    //$('#producto').trigger('focus');
                    $('#producto').focus();
            });


            //AUTOCOMPLETA DATOS DEL CLIENTE DADO EL C.I.
            $(document).ready(function(){
                $("#cli_ci_nit").autocomplete({
                        source: "autocomplete_cliente_ci.php",
                        minLength: 2,
                        select: function(event, ui) {
                            event.preventDefault();
                            $('#cli_id').val(ui.item.id);
                            $('#cli_ci_nit').val(ui.item.ci_nit);
                            $('#cli_nombre').val(ui.item.nombre);
                        }
                });
            });

            //AUTOCOMPLETA DATOS DEL CLIENTE DADO EL NOMBRE
            $(document).ready(function(){
                $("#cli_nombre").autocomplete({
                        source: "autocomplete_cliente_nombre.php",
                        minLength: 2,
                        select: function(event, ui) {
                            event.preventDefault();
                            $('#cli_id').val(ui.item.id);
                            $('#cli_ci_nit').val(ui.item.ci_nit);
                            $('#cli_nombre').val(ui.item.nombre);
                        }
                });
            });

            //CALCULA EL CAMBIO, DADO EL TOTAL DE LA FACTURA
            $(document).ready(function () {
                $("#fac_importe").keyup(function () {
                    var total = document.getElementById("fac_total").value;
                    var importe = $(this).val();
                    var cambio = (parseFloat(importe) - parseFloat(total)).toFixed(2);
                    document.getElementById("fac_cambio").value = cambio;
                });
            });


            //REGISTRAMOS LA FACTURA Y CON ESTO CONCLUYE AL VENTA
            $('#create_factura').click(function(){
                //RECARGAMOS LA TABLA DETALLE
                //$('#tabla_detalle').load('pos_tabla.php');
                //RECARGAMOS EL TOTAL DE LA FACTURA
                //$('#total_factura').load('factura_total.php');

                valor1 = parseInt($('#fac_id').val());
                valor2 = $('#cli_id').val();
                valor3 = $('#cli_nombre').val();
                valor4 = $('#user_id').val();
                valor5 = $('#user_nombre').val();
                valor6 = $('#fac_total').val();
                CrearFactura(valor1, valor2, valor3, valor4, valor5, valor6);
                
            });
            //CUANDO EL MODAL SE ABRE, HACEMOS FOCO AL INPUT PARA INGRESAR NOMBRE DEL CLIENTE
            $('#modal_crear_cliente').on('shown.bs.modal',function(){
                $('#c_nombre').trigger('focus');
            });
            //CUANDO EL MODAL SE CIERRA, HACEMOS FOTOS AL INPUT
            $('#modal_crear_cliente').on('hide.bs.modal',function(){
                //$('#producto').trigger('focus');
                //$('#producto input').focus();
                $('#producto').focus();
            });
            $('#create_cliente').click(function(){
                /*EL SCRIPT JS GUARDA LOS VALORES DE LOS INPUT'S DEL FORMULARIO DE REGISTRO
                Y LOS GUARDA EN VARIABLES, PARA LUEGO LLAMAR A LA FUNCION CrearPaciente y 
                MANDARLES ESAS VARIABLES COMO PARAMETROS.*/
                valor1 = $('#c_nombre').val();
                valor2 = $('#c_ci_nit').val();
                valor3 = $('#c_celular').val();
                valor4 = $('#c_direccion').val();
                CrearCliente(valor1,valor2,valor3,valor4);
            });

        </script>
    </body>
</html>