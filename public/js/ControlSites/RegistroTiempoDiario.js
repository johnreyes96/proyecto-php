$(document).ready(function(){

	$("#slSitiosML").prop("disabled", true);
	$("#slSitiosMS").prop("disabled", true);

		$.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
            }
        });


	function getModelos(typeConsult, Selector)
	{
		$(Selector).html('<option>Cargando modelos...</option>');
		$.get('/admin/getModelosRTT',{typeConsult: typeConsult} ,function(data){
			$(Selector).html('<option>Seleccione un modelo...</option>');
			$.each(data.Contenido, function(i,item){
            		$(Selector).append($('<option>', { 
              			value: item.id,
              			text : item.Nombres +' '+item.Apellidos +' ['+item.NombreModelo+']'
          		}	)); 

      			});
    	});
	}
	getModelos(1, '#slModeloML');


	function getSitiosModelo(id, Selector)
	{
		$(Selector).prop("disabled", true);
		$(Selector).html('<option>Cargando...</option>');

		$.get('/admin/getSitiosModelo',{ idModelo: id },function(data){
			$(Selector).html('<option value="">Seleccione un sitio...</option>');
			$.each(data.Contenido, function(i,item){
            	$(Selector).append($('<option>', { 
              			value: item.id,
              			text : item.NombreSitio
          			}	
          		)); 

      			});
			$(Selector).prop("disabled", false);
    	});
	}

	$("#slModeloML").on('change', function(){
		getSitiosModelo($(this).val(), '#slSitiosML');
	});
	$("#slModeloMS").on('change', function(){
		getSitiosModelo($(this).val(), '#slSitiosMS');
	});

	$("#viewRows").on("click", function(){
		var oTable = $('#tblRegistrosTD').dataTable();
        oTable.fnDraw(false);
	});

		$('#tblRegistrosTD').DataTable({
         processing: true,
         serverSide: true,
         "searching": false,
         ajax: {
          url: "/admin/RegistroTD",
          type: 'GET',
         },
         columns: [
                  { data: 'NombreSitio', name: 'NombreSitio'},
                  { data: 'NombreModelo', name: 'NombreModelo'},
                  { data: 'Fecha', name: 'Fecha' },
                  { data: 'Cantidad', name: 'Cantidad' },
                  { data: 'Nombres', name: 'Nombres' },
               ],
         order: [[2, 'desc']],
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
	
	
	function getRowsAvailable() {
		$.ajax({
			type: "GET",
			url: "/admin/RegistroTD",
			dataType: "json",
			cache: false,
			success: function(data)
			{
				$("#listRows").html('');
				if (data.Request) {
					// Existen registros
					$.each(data.Registros, function(i, item){
						$("#listRows").append('<tr>');
						$("#listRows").append('<td>'+item.NombreModelo+'</td><td>'+item.NombreSitio+'</td><td>'+item.Tiempo+'</td>');

						if (item.Estado == 1) {
							$("#listRows").append('<td><button class="btn btn-info btn-sm btnEstatus" disabled data-action="start"><i class="fa fa-fw"></i></button> <button class="btn btn-secondary btn-sm btnEstatus" data-id="'+item.id+'" data-action="break"><i class="fa fa-fw"></i></button> <button class="btn btn-danger btn-sm btnEstatus" data-id="'+item.id+'" data-action="finished"><i class="fa fa-fw"></i></button></td>');
						}else{
							$("#listRows").append('<td><button class="btn btn-info btn-sm btnEstatus" data-id="'+item.id+'" data-action="start"><i class="fa fa-fw"></i></button> <button class="btn btn-secondary btn-sm btnEstatus" disabled data-id="'+item.id+'" data-action="break"><i class="fa fa-fw"></i></button> <button class="btn btn-danger btn-sm btnEstatus" data-id="'+item.id+'" data-action="finished"><i class="fa fa-fw"></i></button></td>');
						}
						$("#listRows").append('</tr>');
					})
				}else{
					$("#listRows").append('<tr><td colspan="4"><center>No hay modelos en transmisión</center></td></tr>');
				}
				
			},
			error: function (jqXHR, textStatus, errorThrown)
			{
				console.log('Error en ajax');
	         	console.log(jqXHR.responseText);
	          	console.log(textStatus);
	          	console.log(errorThrown);
			}
		})
	}
	getRowsAvailable();

	$('body').on('click', '.btnEstatus', function(){
		var id = $(this).attr('data-id');
		var action = $(this).attr('data-action');
		if ($(this).attr('data-action') == 'finished') {
				alertify.prompt("Finalizar transmisión","Cantidad realizada en transmisión", "0",
				  function(evt, value ){
				    $.post('/admin/editRegistroTransmision',{'action': action, 'cantidad': value, 'id': id},function(data){
						if (data.Request) {
							getRowsAvailable();
							alertify.success(data.Message);

						}
					})
				  },
				  function(){
				    
				  });
		}else{
			$.post('/admin/editRegistroTransmision',{'action': action, 'id': id},function(data){
				if (data.Request) {
					getRowsAvailable();
					alertify.success(data.Message);
				}
			})
		}
		
	})

	if ($("#frmRegistro").length > 0) {
		$("#frmRegistro").validate({
			submitHandler: function(form) {
				$.post('/admin/saveRegistroTransmision', $("#frmRegistro").serialize(), function(data){
					if (data.Request) {
						getRowsAvailable();
						alertify.success(data.Message);
						$("#frmRegistro").trigger('reset');

					}else{
						alertify.alert('Advertencia', data.Message);
					}
				});
			}
		})
	}
	if ($("#frmRegistroSatelite").length > 0) {
		$("#frmRegistroSatelite").validate({
			submitHandler: function(form) {
				$.post('/admin/saveRegistroTransmision', $("#frmRegistroSatelite").serialize(), function(data){
					if (data.Request) {
						alertify.alert('Mensaje',data.Message);
						$("#frmRegistroSatelite").trigger('reset');

					}else{
						alertify.alert('Advertencia', data.Message);
					}
				});
			}
		})
	}

	$(".MS").on('click', function(){
		getModelos(2, '#slModeloMS');
	})
	
});