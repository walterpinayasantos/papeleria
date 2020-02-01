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

        <!-- Funciones para el CRUD de Asistencia -->
        <script src="assets/js/crud/crud_asistencia.js"></script>

        
        <!-- Script que muestra la fecha y la hora -->
        <script type="text/javascript">
            window.onload = setInterval(clock,1000);

            function clock()
            {
            var d = new Date();
            
            var date = d.getDate();
            
            var month = d.getMonth();
            var montharr =["Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre"];
            month=montharr[month];
            
            var year = d.getFullYear();
            
            var day = d.getDay();
            var dayarr =["Domingo","Lunes","Martes","Miercoles","Jueves","Viernes","Sabado"];
            day=dayarr[day];
            
            var hour =d.getHours();
            var min = d.getMinutes();
            var sec = d.getSeconds();
            
            document.getElementById("date").innerHTML=day+" "+date+" "+month+" del "+year;
            document.getElementById("time").innerHTML=hour+":"+min+":"+sec;
            }
        </script>
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
                                            <li class="breadcrumb-item active">Control de Asistencia</li>
                                        </ol>
                                    </div>
                                    <h4 class="page-title">Control de Asistencia</h4>
                                </div>
                            </div>
                        </div>     
                        <!-- end page title -->

                        <div class="row justify-content-center">
                            <div class="col-6">
                                <div class="card-box">
                                    <div class="text-center mb-4">
                                        <a href="index.php">
                                            <span><img src="assets/images/logo-light.png" alt="" height="28"></span>
                                        </a>
                                    </div>
                                    <p id="date" style="font-size: 16px; text-align:center;"></p>
                                    <p id="time" class="display-4" style="text-align:center;"></p>        
                                    <form class="form-horizontal" id="formulario_crear_asistencia">
                                        <div class="form-group row">
                                            <!--<label class="col-sm-4 col-form-label" for="example-input-large">Contraseña :</label>-->
                                            <div class="col-sm-12">
                                                <input type="password" id="c_password" class="form-control" placeholder="Ingrese su Contraseña para Registrar su Hora de Entrada y Salida" style="font-size:1em;"> <p></p>
                                                <button type="button" class="btn btn-primary btn-block" id="create_asistencia">ENTRADA  -  SALIDA</button>
                                            </div>
                                        </div>
                                    </form>
                                </div> <!-- end card-box -->
                            </div> <!-- end col -->
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <div class="card-box">
                                    <div id="tabla_asistencia"></div>
                                </div> <!-- end card-box -->
                            </div> <!-- end col -->
                        </div> <!-- end row -->
                        <!--============================================================
                        =       MODAL PARA ACTUALIZAR DATOS DE IMPRESORAS Y OTROS...   =
                        =============================================================-->
                        <div id="update_asistencia" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title" id="myModalLabel">DATOS DE CONTROL DE ASISTENCIA</h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                    </div>
                                    <div class="modal-body">
                                        <form class="form-horizontal">
                                            
                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">Epson L220</label>
                                                <div class="col-sm-2">
                                                    <input type="number" min="0" class="form-control" id="entradaP1" placeholder="Entrada">
                                                </div>
                                                <div class="col-sm-2">
                                                    <input type="number" min="0" class="form-control" id="salidaP1" placeholder="Salida">
                                                </div>
                                                <label class="col-sm-2 col-form-label">Bizhub 421</label>
                                                <div class="col-sm-2">
                                                    <input type="number" min="0" class="form-control" id="entradaC1" placeholder="Entrada">
                                                </div>
                                                <div class="col-sm-2">
                                                    <input type="number" min="0" class="form-control" id="salidaC1" placeholder="Salida">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">Epson L120</label>
                                                <div class="col-sm-2">
                                                    <input type="number" min="0" class="form-control" id="entradaP2" placeholder="Entrada">
                                                </div>
                                                <div class="col-sm-2">
                                                    <input type="number" min="0" class="form-control" id="salidaP2" placeholder="Salida">
                                                </div>
                                                <label class="col-sm-2 col-form-label">Ricoh MP4002</label>
                                                <div class="col-sm-2">
                                                    <input type="number" min="0" class="form-control" id="entradaC2" placeholder="Entrada">
                                                </div>
                                                <div class="col-sm-2">
                                                    <input type="number" min="0" class="form-control" id="salidaC2" placeholder="Salida">
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">Tarjetas</label>
                                                <div class="col-sm-2">
                                                    <input type="number" placeholder="ENTEL" min="0" class="form-control" id="entel">
                                                </div>
                                                <div class="col-sm-2">
                                                    <input type="number" placeholder="TIGO" min="0" class="form-control" id="tigo">
                                                </div>
                                                <div class="col-sm-2">
                                                    <input type="number" placeholder="VIVA" min="0" class="form-control" id="viva">
                                                </div>
                                                <label class="col-sm-2 col-form-label">Vendido</label>
                                                <div class="col-sm-2">
                                                    <input type="number" placeholder="Bs." min="0" class="form-control" id="bs">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">CD/DVD</label>
                                                <div class="col-sm-2">
                                                    <input type="number" min="0" class="form-control" id="cd">
                                                </div>
                                                <label class="col-sm-2 col-form-label">MP3/MP4</label>
                                                <div class="col-sm-2">
                                                    <input type="number" min="0" class="form-control" id="mp3">
                                                </div>
                                                <label class="col-sm-2 col-form-label">Escaneados</label>
                                                <div class="col-sm-2">
                                                    <input type="number" min="0" class="form-control" id="escaner">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">Fallas Impresion</label>
                                                <div class="col-sm-2">
                                                    <input type="number" min="0" class="form-control" id="fallasI">
                                                </div>
                                                <label class="col-sm-2 col-form-label">Fallas Fotocopia</label>
                                                <div class="col-sm-2">
                                                    <input type="number" min="0" class="form-control" id="fallasF">
                                                </div>
                                                <label class="col-sm-2 col-form-label">Transcripciones</label>
                                                <div class="col-sm-2">
                                                    <input type="number" min="0" class="form-control" id="transcripcion">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">Nota</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" name="" value="" placeholder="">
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="modal-footer">
                                            <button type="button" class="btn btn-light waves-effect" data-dismiss="modal">Cancelar</button>
                                            <button type="button" class="btn btn-primary waves-effect waves-light">Actualizar Registro</button>
                                    </div>
                                </div><!-- /.modal-content -->
                            </div><!-- /.modal-dialog -->
                        </div><!-- /.modal -->
                        <!--============================================================
                        =    MODAL PARA EL ACTUALIZAR DATOS DE IMPRESORAS Y OTROS...   =
                        =============================================================-->
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
                $('#tabla_asistencia').load('asistencia_tabla.php');
            });
        </script>

        <!-- FUNCION PARA REGISTRAR y ACTUALIZAR ASISTENCIA -->
        <script type="text/javascript">
            $('#c_password').focus();
            $(document).ready(function(){
               $('#create_asistencia').click(function(){
                /*EL SCRIPT JS GUARDA LOS VALORES DE LOS INPUT'S DEL FORMULARIO DE REGISTRO
                Y LOS GUARDA EN VARIABLES, PARA LUEGO LLAMAR A LA FUNCION CrearPaciente y 
                MANDARLES ESAS VARIABLES COMO PARAMETROS.*/
                valor1 = $('#c_password').val();
                CrearAsistencia(valor1);
                $('#c_password').focus();
            });

               $('#update_paciente').click(function(){
                ActualizarPaciente();
            });

           });

            // ASIGNACION DE HotKey A LOS BOTONES USANDO JavaSCcript
            document.addEventListener('keyup', event => {
                if (event.keyCode === 13) {//SI SE PRESIONA LA TECLA ENTER(13)
                    document.getElementById("create_asistencia").click();
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
     
       </script>
    </body>
</html>