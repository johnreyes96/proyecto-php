$(document).ready(function(){

	$.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
            }
        });
		$('#tblSitiosModelos').DataTable({
         processing: true,
         serverSide: true,
         ajax: {
          url: "/admin/ConfigModeloSitio",
          type: 'GET',
         },
         columns: [
                  { data: 'InfoModel', name: 'InfoModel'},
                  { data: 'action', name: 'action', orderable: false},
               ],
        order: [[0, 'desc']],
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

	function getSitios()
	{
		$.ajax({
			type: "GET",
			url: "/admin/getSitios",
			dataType: "json",
			cache: false,
			beforeSend: function(){
				$("#slSitio").html('<option value="0">Cargando sitios...</option>');
			},
			success: function (result)
			{
				$("#slSitio").html('');
				$("#slSitio").append('<option value="0">Seleccione un sitio...</option>');
				$.each(result.Contenido, function(i,item){
            		$('#slSitio').append($('<option>', { 
              			value: item.id,
              			text : item.NombreSitio
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
	function getModelos()
	{
		$.ajax({
			type: "GET",
			url: "/admin/getModelos",
			dataType: "json",
			cache: false,
			beforeSend: function(){
				$("#slModelo").html('<option value="0">Cargando modelos...</option>');
			},
			success: function (result)
			{
				
				$("#slModelo").html('');
				$("#slModelo").append('<option value="0">Seleccione un modelo...</option>');
				$.each(result.Contenido, function(i,item){
            		$('#slModelo').append($('<option>', { 
              			value: item.id,
              			text : item.Nombres + ' ' +item.Apellidos + ' [' + item.NombreModelo + ']'
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

	$("#btnAddSitioModelo").on('click', function () {
		
		$(".modal-title").html('Agregar Modelo a Sitio');
		getSitios(); // Cargar los sitios
		getModelos();
		/*$("#btnGuardarModel").val('create-user');
		$("#userForm").trigger('reset');
		$('#user_id').val('');
		formDisable(true);*/
	});

	function actionModal(action)
	{
		if (action == 'show') {
			$("#exampleModal").modal(action);
		}else{
			$(".modal-backdrop").remove();
			$("#exampleModal").modal(action);
		}
		
	}

	if ($("#ModeloSitioForm").length > 0) {
		$("#ModeloSitioForm").validate({

			submitHandler: function(form) {
				$.ajax({
					data: $("#ModeloSitioForm").serialize(),
					url: '/admin/saveConfigSitiosModelos',
					type: "POST",
					dataType: 'json',
					success: function (result) {
						if (result.Request) {
							alertify.alert('Mensaje', result.Message, function(){

								var oTable = $('#tblSitiosModelos').dataTable();
              					oTable.fnDraw(false);
							});
							actionModal('hide');
						}else{
							alertify.alert('Advertencia', result.Message);
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

		$('body').on('click', '.view-info', function () {
	    	var model_id = $(this).data('id');
	    	$(".infoModel").html('<div class="d-flex justify-content-center"><div class="spinner-border" role="status"><span class="sr-only">Loading...</span></div></div>');
	    	$.get('/admin/viewInfoSites',{id: model_id}, function(data){
	    		$("#ModalInfo").modal('show');
	    		$(".infoModel").html(data)

	    	})
   });
	
});