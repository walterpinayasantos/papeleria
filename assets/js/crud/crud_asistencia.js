function CrearAsistencia(valor1){
	cadena="password=" + valor1;
	alert(cadena); //QUITAMOS EL COMENTARIO PARA VER LAS VARIABLES Y SU CONTENIDO
	$.ajax({
		type:"POST",
		url:"search_administrador.php",//consultamos si existe el password en la BdD
		data:cadena,
		success:function(r){
			if(r==1){															//Si la busqueda de datos es exitosa.
        		//$('#tabla_administrador').load('administrador_tabla.php');		//Recargar el DataTaable con AJAX
        		//$('#modal_crear_administrador').on('hidden.bs.modal',function(){//Limpia los inputs del formulario
        		//	$(this).find('#form_nuevo_administrador')[0].reset();
        		//});
        		//$('#c_password')[0].reset();								//Limpia los inputs del formulario con id=c_password
        		Swal.fire({
        			type: 'success',
					title: 'Registro Exitoso, Bienvenido',
					showConfirmButton: false,
					timer: 2000//1500
					})
        		$('#c_password')[0].reset();
			}else{
				Swal.fire({
					type: 'error',
					title: 'No esta registrado en el Sistema',
					showConfirmButton: false,
					timer: 2000//1500
					})
				$('#c_password')[0].reset();
			}
		}
	});
}
//Esta funcion captura los datos de un registro y los envia a los inputs de un formulario
//que esta dentro de una ventana modal, para que el cliente pueda modificar los datos.
function EditarAdministrador(datos){
	//Usamos el alert para verificar que los datos recuperados son los correctos.
	//alert(datos);
	vector=datos.split('||');
	//Los datos del registro son enviados a los inputs con los id's correspondientes.
	//usamos u_palabra para hacer notar que estamos realizando una actualizacion de datos
	//asi tambien usaremos c_palabra para crear un registro, etc.
	$('#adm_id').val(vector[0]);
	$('#u_nombres').val(vector[1]);
	$('#u_apellidos').val(vector[2]);
	$('#u_ci').val(vector[3]);
	$('#u_celular').val(vector[4]);
	$('#u_direccion').val(vector[5]);
}

function ActualizarAdministrador(){
	//Guardamos los valores .val() de los inputs del formulario que esta en el modal
	//para crear una cadena variable=valor, y enviarla por ajax para su actualizacion
	//en la BdD
	// actalizaremos todos los valores aunque en algunos casos sean los mismos valores
	// usando el adm_id en la clausura where.
	valor1 = $('#adm_id').val();
	valor2 = $('#u_nombres').val();
	valor3 = $('#u_apellidos').val();
	valor4 = $('#u_ci').val();
	valor5 = $('#u_celular').val();
	valor6 = $('#u_direccion').val();

	cadena ="adm_id="+valor1+
			"&nombres="+valor2+
			"&apellidos="+valor3+
			"&ci="+valor4+
			"&celular="+valor5+
			"&direccion="+valor6;
	//alert(cadena);
	$.ajax({
		type:"POST",
		url:"assets/inc/update_administrador.php",
		data:cadena,
		success:function(r){
			if(r==1){
        		$('#tabla_administrador').load('administrador_tabla.php');
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

function EliminarAdministrador(adm_id){
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
	  	cadena="id="+adm_id; //cadena para el ajax
	  	$.ajax({
	  		// la URL para la petición
	  		url:"assets/inc/delete_administrador.php",
	  		// la información a enviar
	  		data:cadena,
	  		// especifica si será una petición POST o GET
	  		type:"POST",
	  		// código a ejecutar si la petición es satisfactoria;
	  		success:function(r){//r puede ser 1 o 0, es uno si la eliminacion fue exitosa, y 0 si fallo.
	  			if(r==1){
					$('#tabla_administrador').load('administrador_tabla.php');
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
