$(document).ready(function(){



	$.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
            }
        });

	$('#tblModelos').DataTable({
         processing: true,
         serverSide: true,
         ajax: {
          url: "/admin/getModelosEstudio",
          type: 'GET',
         },
         columns: [
                  { data: 'SexoModel', name: 'SexoModel', orderable: false},
                  { data: 'InfoModel', name: 'InfoModel'},
                  { data: 'email', name: 'email'},
                  { data: 'EstatusModel', name: 'EstatusModel'},
                  { data: 'action', name: 'action', orderable: false},
               ],
        order: [[1, 'desc']],
        "language": {
			"lengthMenu": "Mostrar _MENU_ registros por página.",
            "zeroRecords": "No se encontraron registros.",
            "info": "Mostrando página _PAGE_ de _PAGES_",
            "infoEmpty": "No hay registros disponibles",
            "infoFiltered": "(Filtrado de _MAX_ registros totales)",
            "sSearch": "Buscar",
            "sProcessing":     "Procesando...",
            "oPaginate": {
            	"sFirst":    	"Primero",
				"sPrevious": 	"Anterior",
				"sNext":     	"Siguiente",
				"sLast":     	"Último"
            }
		}
      });

	function formDisable(Estatus){
		if (!Estatus) {
			// Información personal
			$("#txtNombres").prop("disabled", false);
			$("#txtApellidos").prop("disabled", false);
			$("#txtNumCelular").prop("disabled", false);
			$("#txtEmail").prop("disabled", false);
			$("#txtDirResidencia").prop("disabled", false);
			$("#txtFechaNacimiento").prop("disabled", false);
			$("#txtNombreModelo").prop("disabled", false);
			$("#slSexo").prop("disabled", false);
			$("#slTipoIdentificacion").prop("disabled", false);
			$("#txtNumeroCuenta").prop("disabled", false);
			$("#slBanco").prop("disabled", false);
			$("#slTipoModelo").prop("disabled", false);

		}else{
			// Información personal
			$("#txtNombres").prop("disabled", true);
			$("#txtApellidos").prop("disabled", true);
			$("#txtNumCelular").prop("disabled", true);
			$("#txtEmail").prop("disabled", true);
			$("#txtDirResidencia").prop("disabled", true);
			$("#txtFechaNacimiento").prop("disabled", true);
			$("#txtNombreModelo").prop("disabled", true);
			$("#slSexo").prop("disabled", true);
			$("#slTipoIdentificacion").prop("disabled", true);
			$("#txtNumeroCuenta").prop("disabled", true);
			$("#slBanco").prop("disabled", true);
			$("#slTipoModelo").prop("disabled", true);
			
		}
	}

	$("#btnValidarId").on("click", function(){
		// Consultar sí el id existe en la BD
		$.ajax({
			type: "GET",
			url: "/admin/getExistId",
			dataType: "json",
			data: 'userId='+$("#txtIdentificacion").val(),
			cache: false,
			beforeSend: function(){
				
				$(".preloader").fadeIn("slow");
			},
			success: function (result)
			{
				if (result.Request) {
					
					// Información personal
					$("#txtNombres").val(result.dataUser[0].Nombres);
					$("#txtApellidos").val(result.dataUser[0].Apellidos);
					$("#txtNumCelular").val(result.dataUser[0].NumeroCelular);
					$("#txtEmail").val(result.dataUser[0].email);
					$("#txtDirResidencia").val(result.dataUser[0].DireccionResidencia);
					$("#txtFechaNacimiento").val(result.dataUser[0].FechaNacimiento);
					$("select#slBanco option[value='"+result.dataUser[0].Banco_id+"']").attr("selected",true);
					$("select#slTipoIdentificacion option[value='"+result.dataUser[0].TipoIdentificacion_id+"']").attr("selected",true);
					$("select#slSexo option[value='"+result.dataUser[0].Sexo_id+"']").attr("selected",true);
					$("#txtNumeroCuenta").val(result.dataUser[0].CuentaBanco);

					formDisable(false);
					
				}else{
					if (result.Mensaje != null) {
						Message(1,result.Mensaje);
						//alertify.alert('Advertencia', result.Mensaje);
					}else{
						formDisable(false);	
					}
					
				}

				$(".preloader").fadeOut("slow");

			}, error: function (jqXHR, textStatus, errorThrown)
			{
				console.log('Error en ajax');
	         	console.log(jqXHR.responseText);
	          	console.log(textStatus);
	          	console.log(errorThrown);
			}
		});
	});

	function cargarInfoBanco()
	{
		$.ajax({
			type: "GET",
			url: "/admin/getInfoBanco",
			dataType: "json",
			cache: false,
			success: function (result)
			{
				$("#slBanco").html('<option value="0">Seleccione un banco...</option>');
				$.each(result, function(i,item){
            		$('#slBanco').append($('<option>', { 
              			value: item.id,
              			text : item.descripcion
          		}	)); 

      			});
			}, error: function (jqXHR, textStatus, errorThrown)
			{
				console.log('Error en ajax');
	         	console.log(jqXHR.responseText);
	          	console.log(textStatus);
	          	console.log(errorThrown);
			}
		});
	}
	cargarInfoBanco();

	function getTypesModels()
	{
		$("#slTipoModelo").html('<option value="0">Seleccione un tipo...</option>');
		$.get('/admin/getTypesModels', function(data){
			$.each(data.TiposModelos, function(i,item){
            		$('#slTipoModelo').append($('<option>', { 
              			value: item.id,
              			text : item.descripcion
          		}	)); 

      			});
    	});
	}
	
	function actionModal(action)
	{
		if (action == 'show') {
			$("#modalGestionUsuarios").modal(action);
		}else{
			$(".modal-backdrop").removeClass('show');
			$("#modalGestionUsuarios").modal(action);
		}
		
	}


	$("#btnCrearModelo").on('click', function () {
		cargarInfoBanco();
		getTypesModels();
		$("#titleModalModels").html('Crear modelo');
		$("#btnGuardarModel").val('create-user');
		$("#userForm").trigger('reset');
		$('#user_id').val('');
		formDisable(true);
		$("#modalGestionUsuarios").modal('show');
	});

	$('body').on('click', '.blockUser', function() {
		var model_id = $(this).data('id');
		var user_id = $(this).attr('data-userId');

		
		alertify.confirm('¿Está seguro de realizar ésta acción?',function(){
			$.post('/admin/EstatusModel', {modelId : model_id, userId: user_id}, function(data) {
				if (data.Request) {
					var oTable = $('#tblModelos').dataTable();
              		oTable.fnDraw(false);
              		console.log(data.Message);
              		
				}else{
					Message(1,data.Message);
				}
			});
		}).set({title: "Advertencia"})
		
	});

	$('body').on('click', '.edit-user', function () {
		$("#userForm").trigger('reset');
    	var user_id = $(this).data('id');
    	$.get('/admin/editGestionUsuarios',{id: user_id}, function(data){
    		
    		$("#titleModalModels").html('Editar modelo');
    		$("#btnGuardarModel").val('edit-user');
    		actionModal('show');
    		$("#user_id").val(data.Modelo[0].id);
    		$("#txtIdentificacion").val(data.Modelo[0].Identificacion);
    		$("#txtNombres").val(data.Modelo[0].Nombres);
    		$("#txtApellidos").val(data.Modelo[0].Apellidos);
    		$("#txtEmail").val(data.Modelo[0].email);
    		$("#txtNumCelular").val(data.Modelo[0].NumeroCelular);
    		$("#txtFechaNacimiento").val(data.Modelo[0].FechaNacimiento);
    		$("#txtDirResidencia").val(data.Modelo[0].DireccionResidencia);
    		$("#txtNumeroCuenta").val(data.Modelo[0].CuentaBanco);
    		$("#txtNombreModelo").val(data.Modelo[0].NombreModelo);
    		$("select#slBanco option[value='"+data.Modelo[0].Banco_id+"']").attr("selected",true);
			$("select#slTipoIdentificacion option[value='"+data.Modelo[0].TipoIdentificacion_id+"']").attr("selected",true);
			$("select#slSexo option[value='"+data.Modelo[0].Sexo_id+"']").attr("selected",true);
			$("select#slTipoModelo option[value='"+data.Modelo[0].TipoModelo_id+"']").attr("selected",true);

    		formDisable(false);
			$("#txtEmail").prop("disabled", true);
			
    	})
   	});

	$('body').on('click', '.view-info', function(){
		var user_id = $(this).data('id');
		$(".pInfoModel").html('');
    	$.get('/admin/editGestionUsuarios',{id: user_id}, function(data){
    		$(".infoIdentificacion").html(data.Modelo[0].Identificacion);
			$(".infoTipoIdentificacion").html(data.Modelo[0].tipoIdentificacion);
			$(".infoNombres").html(data.Modelo[0].Nombres);
			$(".infoApellidos").html(data.Modelo[0].Apellidos);
			$(".infoEmail").html(data.Modelo[0].email);
			$(".infoNumeroCelular").html(data.Modelo[0].NumeroCelular);
			$(".infoFechaNacimiento").html(data.Modelo[0].FechaNacimiento);
			$(".infoDireccionResidencia").html(data.Modelo[0].DireccionResidencia);
			$(".infoSexo").html(data.Modelo[0].Sexo);
			$(".infoBanco").html(data.Modelo[0].Banco);
			$(".infoNumeroCuenta").html(data.Modelo[0].CuentaBanco);

			$(".infoNombreModelo").html(data.Modelo[0].NombreModelo);
			$(".infoTipoModelo").html('Modelo '+data.Modelo[0].typeModel);

			$("#viewInfoModel").modal('show');
			
    	})
	});

	if ($("#userForm").length > 0) {
		$("#userForm").validate({

			submitHandler: function(form) {
				$.ajax({
					data: $("#userForm").serialize(),
					url: '/admin/saveGestionUsuarios',
					type: "POST",
					dataType: 'json',
					success: function (result) {
						if (result.Request) {
							alertify.alert('Mensaje', result.Message, function(){

								var oTable = $('#tblModelos').dataTable();
              					oTable.fnDraw(false);
							});
							actionModal('hide');
						}else{
							//alertify.alert('Advertencia', result.Message);
							Message(1,result.Message);
						}


			}, error: function (jqXHR, textStatus, errorThrown)
			{
				console.log('Error en ajax');
	         	console.log(jqXHR.responseText);
	          	console.log(textStatus);
	          	console.log(errorThrown);
			}
			});
			}
		})
	}
});