function CrearLamina(valor1,valor2,valor3,valor4,valor5,valor6){
	
	cadena="nom=" + valor1 + "&des=" + valor2 + "&fab=" + valor3 + "&cat=" + valor4 + "&can=" + valor5 + "&num=" + valor6;
	//alert(cadena); //QUITAMOS EL COMENTARIO PARA VER LAS VARIABLES Y SU CONTENIDO
	$.ajax({
		type:"POST",
		url:"assets/inc/create_lamina.php",
		data:cadena,
		success:function(r){
			if(r==1){														//Si la insercion de datos es exitosa.
        		$('#tabla_lamina').load('lamina_tabla.php');			//Recargar el DataTaable con AJAX
        		$('#modal_crear_lamina').on('hidden.bs.modal',function(){//Limpia los inputs del formulario, que estan en el modal
        			$(this).find('#form_nuevo_lamina')[0].reset();
        		});
        		/*$('#c_paciente')[0].reset();*/								//Limpia los inputs del formulario con id=c_paciente
        		Swal.fire({
        			type: 'success',
					title: 'Lámina Agregada Exitosamente.',
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
//Esta funcion captura los datos de un registro y los envia a los inputs de un formulario
//que esta dentro de una ventana modal, para que el cliente pueda modificar los datos.
function EditarLamina(datos){
	//Usamos el alert para verificar que los datos recuperados son los correctos.
	//alert(datos);
	vector=datos.split('||');
	//Los datos del registro son enviados a los inputs con los id's correspondientes.
	//usamos u_palabra para hacer notar que estamos realizando una actualizacion de datos
	//asi tambien usaremos c_palabra para crear un registro, etc.
	$('#lam_id').val(vector[0]);
	$('#u_nombre').val(vector[1]);
	$('#u_descripcion').val(vector[2]);
	$('#u_fabricante').val(vector[3]);
	$('#u_categoria').val(vector[4]);
	$('#u_cantidad').val(vector[5]);
	$('#u_numero').val(vector[6]);
}

function ActualizarLamina(){
	//Guardamos los valores .val() de los inputs del formulario que esta en el modal
	//para crear una cadena variable=valor, y enviarla por ajax para su actualizacion
	//en la BdD
	// actalizaremos todos los valores aunque en algunos casos sean los mismos valores
	// usando el adm_id en la clausura where.
	valor1 = $('#lam_id').val();
	valor2 = $('#u_nombre').val();
	valor3 = $('#u_descripcion').val();
	valor4 = $('#u_fabricante').val();
	valor5 = $('#u_categoria').val();
	valor6 = $('#u_cantidad').val();
	valor7 = $('#u_numero').val();

	cadena ="lam_id="+valor1+
			"&nom="+valor2+
			"&des="+valor3+
			"&fab="+valor4+
			"&cat="+valor5+
			"&can="+valor6+
			"&num="+valor7;
	alert(cadena);
	$.ajax({
		type:"POST",
		url:"assets/inc/update_lamina.php",
		data:cadena,
		success:function(r){
			if(r==1){
        		$('#tabla_lamina').load('lamina_tabla.php');
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

function EliminarLamina(lam_id){
	Swal.fire({
	  title: 'Estas Seguro?',
	  text: "No podrás revertir esto!",
	  type: 'warning',
	  showCancelButton: true,
	  cancelButtonText: 'Cancelar',
	  confirmButtonColor: '#3085d6',
	  cancelButtonColor: '#d33',
	  confirmButtonText: 'Si, eliminarlo!'
	}).then((result) => {//result es nombre cualquiera de una variable que puede tener dos valores 1 o 0, si es uno quiere decir que presionamos el Boton Si, Eliminarlo!, y si es 0 presionamos Cancelar
	  if (result.value) {//su result es 1, se intenta eliminar el registro..
	  	cadena="id="+lam_id; //cadena para el ajax
	  	$.ajax({
	  		// la URL para la petición
	  		url:"assets/inc/delete_lamina.php",
	  		// la información a enviar
	  		data:cadena,
	  		// especifica si será una petición POST o GET
	  		type:"POST",
	  		// código a ejecutar si la petición es satisfactoria;
	  		success:function(r){//r puede ser 1 o 0, es uno si la eliminacion fue exitosa, y 0 si fallo.
	  			if(r==1){
					$('#tabla_lamina').load('lamina_tabla.php');
					Swal.fire({
        			type: 'success',
					title: 'Tu registro a sido Borrado.',
					showConfirmButton: false,
					timer: 2000//1500
					})//Fin Swal
				}//Fin if
	  		}//Fin success

	  	});//fin ajax
	  }//Fin Cuadro de Dialogo
	})//Fin then=entonces
}
function AbastecerLamina(datos){
	//alert(datos);
	vector=datos.split('||');
	$('#modal_abastecer_lamina').on('hidden.bs.modal',function(){//Limpia los inputs del formulario, que estan en el modal
        $(this).find('#form_abastecer_lamina')[0].reset();
    });
	$('#a_id').val(vector[0]);	
	$('#a_nombre').val(vector[1]);	
	$('#a_fabricante').val(vector[3]);
	$('#cantidad').val(vector[5]);
	$('#a_numero').val(vector[6]);
	//COLOCAMOS EL FOCO EN EL INPUT PARA INGRESAR EL VALORR
	$('#modal_abastecer_lamina').on('shown.bs.modal', function (){$('#a_cantidad').focus();});
}
function ActualizarStock(){

	valor1=$('#a_id').val();			//id de la lámina
	valor2=$('#cantidad').val();		//stock actual de la lámina
	valor3=$('#a_cantidad').val();		//cantidad a añadir al stock actual
	
	cadena="lam_id="+valor1+"&cantidad="+valor2+"&entrada="+valor3;
	//OJO mucho OJO se envia por POST las variable de color amarillo de cadena...
	//alert(cadena);
	$.ajax({
		type:"POST",
		url:"assets/inc/update_stock.php",
		data:cadena,
		success:function(r){
			if(r==1){
				$('#tabla_lamina').load('lamina_tabla.php');
				//$('#tventa').load('tablaVenta.php');
        		Swal.fire({
					  type: 'success',
					  title: 'Suministro Exitoso.',
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
	});//fin ajax

}