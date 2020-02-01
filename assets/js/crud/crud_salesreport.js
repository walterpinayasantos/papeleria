function ReporteDia(fecha){
  cadena="date=" + fecha;
    //alert(cadena);
    $.ajax({
      type:"POST",
      url:"assets/inc/update_dia.php",
      data:cadena,
      success:function(){
        $('#tabla_dia').load('salesreport_dia.php');
      }
    });
}
function ReporteMes(mes,anio){
  cadena="mes=" + mes + "&anio=" + anio;
    //alert(cadena);
    $.ajax({
      type:"POST",
      url:"assets/inc/update_mes.php",
      data:cadena,
      success:function(){//r puede ser 1 o 0, es uno si la eliminacion fue exitosa, y 0 si fallo.
        $('#tabla_mes').load('salesreport_mes.php');
      }//Fin success
    });//fin ajax
}
function ReporteAnual(numero){
  cadena="anio=" + numero;
    //alert(cadena);
    $.ajax({
      type:"POST",
      url:"assets/inc/update_anio.php",
      data:cadena,
      success:function(){//r puede ser 1 o 0, es uno si la eliminacion fue exitosa, y 0 si fallo.
        $('#tabla_anio').load('salesreport_anio.php');
      }//Fin success
    });//fin ajax
}
function VerDetalle(numero){
  cadena="id="+numero;
  //alert(cadena);
  $.ajax({
    type:"POST",
    url:"inc/actualizarNumeroDetalle.php",
    data:cadena,
    success:function(r){
      if(r==1){
        $('#tdetalle').load('tablaDetalleModal.php');
      }//Fin if
    }//Fin success
  });//fin ajax

}
function VerDetalleVentaDia(fecha){
  cadena="date="+fecha;
  //alert(cadena);
  $.ajax({
    type:"POST",
    url:"assets/inc/update_dia.php",
    data:cadena,
    success:function(r){
      if(r==1){
        $('#literal_dia_detalle').load('literal_dia_detalle.php');
        $('#tabla_dia_detalle').load('salesreport_dia_detalle.php');
      }//Fin if
    }//Fin success
  });//fin ajax
}
function PedidoProducto(cantidad){
  cadena="cantidad=" + cantidad;
    //alert(cadena);
    $.ajax({
      type:"POST",
      url:"assets/inc/update_eoq.php",
      data:cadena,
      success:function(){
        $('#tabla_pedido').load('order_producto_tabla.php');
      }
    });
}
function PedidoLamina(cantidad){
  cadena="cantidad=" + cantidad;
    //alert(cadena);
    $.ajax({
      type:"POST",
      url:"assets/inc/update_eoq.php",
      data:cadena,
      success:function(){
        $('#tabla_pedido').load('order_lamina_tabla.php');
      }
    });
}