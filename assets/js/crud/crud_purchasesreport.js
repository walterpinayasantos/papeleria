function ReporteCompraDia(fecha){
  cadena="date=" + fecha;
    //alert(cadena);
    $.ajax({
      type:"POST",
      url:"assets/inc/update_dia.php",
      data:cadena,
      success:function(){
        $('#tabla_compra_dia').load('purchasesreport_dia.php');        
      }
    });
}
function ReporteCompraMes(mes,anio){
  cadena="mes=" + mes + "&anio=" + anio;
    //alert(cadena);
    $.ajax({
      type:"POST",
      url:"assets/inc/update_mes.php",
      data:cadena,
      success:function(){//r puede ser 1 o 0, es uno si la eliminacion fue exitosa, y 0 si fallo.
        $('#tabla_compra_mes').load('purchasesreport_mes.php');        
      }//Fin success
    });//fin ajax
}
function ReporteCompraAnual(numero){
  cadena="anio=" + numero;
    //alert(cadena);
    $.ajax({
      type:"POST",
      url:"assets/inc/update_anio.php",
      data:cadena,
      success:function(){//r puede ser 1 o 0, es uno si la eliminacion fue exitosa, y 0 si fallo.
        $('#tabla_anio').load('salesreport_anio.php');
        $('#tabla_compra_anio').load('purchasesreport_anio.php');        
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

function EditarCompra(datos){
	//Usamos el alert para verificar que los datos recuperados son los correctos.
	//alert(datos);
	vector=datos.split('||');
	//Los datos del registro son enviados a los inputs con los id's correspondientes.
	//usamos u_palabra para hacer notar que estamos realizando una actualizacion de datos
	//asi tambien usaremos c_palabra para crear un registro, etc.
	$('#comp_id').val(vector[0]);
  $('#u_nombre').val(vector[1]);
  $('#u_detalle').val(vector[2]);
	$('#u_cantidad').val(vector[3]);
	$('#u_subtotal').val(vector[4]);
	$('#u_punitario').val(vector[5]);
}

function ActualizarCompra(){
	valor1 = $('#comp_id').val();
	valor3 = $('#u_detalle').val();
	valor4 = $('#u_cantidad').val();
	valor5 = $('#u_subtotal').val();
	valor6 = $('#u_punitario').val();

	cadena ="comp_id="+valor1+"&detalle="+valor3+"&cantidad="+valor4+"&total="+valor5+"&precio="+valor6;
	alert(cadena);
	$.ajax({
		type:"POST",
		url:"assets/inc/update_compra.php",
		data:cadena,
		success:function(r){
			if(r==1){
            $('#tabla_compra_dia').load('purchasesreport_dia.php');
        		Swal.fire({
					  type: 'success',
					  title: 'Actualizacion Exitosamente.',
					  showConfirmButton: false,
					  timer: 2000//1500
					})
			}else{
				Swal.fire({
					  type: 'error',
					  title: 'Se ha Producido un Error.',
					  showConfirmButton: false,
					  timer: 2000//1500
					})
			}
		}
	});
}