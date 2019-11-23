$(document).ready(function(){
	$.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
            }
        });

	$(".btnNewPrestacion").on('click', function(){
		$("#frmPrestacion").trigger('reset');
		$(".btnSave").val('save');
		$("#modalPrestaciones").modal('show');
	});

	if ($("#frmPrestacion").length > 0) {
		$("#frmPrestacion").validate({

			submitHandler: function(form) {
				$.post('/admin/savePrestacion', $("#frmPrestacion").serialize(), function(data){
					if (data.Request) {
						Message(2,data.Message);
						$("#modalPrestaciones").modal('hide')
						var oTable = $('#tblPrestaciones').dataTable();
              			oTable.fnDraw(false);
					}else{
						Message(3,data.Message);
					}
				});
			}
		})
	}

	$('#tblPrestaciones').DataTable({
         processing: true,
         serverSide: true,
         ajax: {
          url: "/admin/PrestacionesSociales",
          type: 'GET',
         },
         columns: [
                  { data: 'descripcion', name: 'descripcion'},
                  { data: 'valor', name: 'valor'},
                  { data: 'deduccion', name: 'deduccion'},
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

	$('body').on('click', '.edit', function(){
		var id = $(this).attr('data-id');
		$.get('/admin/editPrestacion', {id: id}, function(data){
			if (data.Request) {
				$("#frmPrestacion").trigger('reset');

				$("#txtid").val(data.Content[0].id);
				$("#txtDescripcion").val(data.Content[0].descripcion);
				$("#txtValor").val(data.Content[0].valor);
				if (data.Content[0].deduccion == 1) {
					$("#rdTrue").attr('checked', true);
				}else{
					$("#rdfalse").attr('checked', true);
				}
				$(".btnSave").val('edit');
				$("#modalPrestaciones").modal('show');

			}else{
				Message(3,data.Message);
			}
		})
	});
	$('body').on('click', '.PrestacionesEmp', function(){
		$("#txtidPrestacion").val($(this).attr('data-id'));
		getUsersPrestacion($("#txtidPrestacion").val());
		$("#modalPrestacionesEmpleados").modal('show');
		getUsersEstudio();
		
	});

	$('body').on('click', '.deleteUserPrestacion', function(){
		var id = $(this).attr('data-id');
		$.post('/admin/destroyUserPrestacion', {id: id}, function(data){
			if (!data.Request) {
				Message(3, data.Message);
			}else{
				getUsersPrestacion($("#txtidPrestacion").val());
			}
		});
	});

	function getUsersPrestacion(id) {
		$(".viewUsersPrestacion").html('<div class="spinner-border" role="status"><span class="sr-only">Loading...</span></div>');
		$.get('/admin/getUsersPrestacion', {idPrestacion: id}, function(data){
			$(".viewUsersPrestacion").html('');
			if (data.Content.length < 1) {
				$(".viewUsersPrestacion").append('<li class="list-group-item"><span class="text-center">No hay usuarios agregados a la prestación.</span></li>');
			}else{
				$.each(data.Content, function(i, item){
					$(".viewUsersPrestacion").append('<li class="list-group-item"><div class="widget-content p-0"><div class="widget-content-wrapper"><div class="widget-content-left"><div class="widget-heading">'+item.Nombres+'</div></div><div class="widget-content-right"><div class="font-size-xlg text-muted"><button class="btn btn-default deleteUserPrestacion" data-id = "'+item.id+'"><i class="fa fa-times"></i></button></div></div></div></div></li>');
				});
			}
			
		});
	}

	function getUsersEstudio() {
		$('#slUsuario').html('<option>Seleccione un empleado...</option>');
		$.get('/admin/getUsersEstudio', function(data){
			// Cargar Modelos
			$('#slUsuario').append('<optgroup label="Modelos">');
			$.each(data.Modelos, function(i,item){
            		$('#slUsuario').append($('<option>', { 
              			value: item.id,
              			text : item.Nombres+' '+item.Apellidos
          		}	)); 

      			});
			$('#slUsuario').append('</optgroup>');
			// Cargar empleados
			$('#slUsuario').append('<optgroup label="Empleados">');
			$.each(data.Empleados, function(i,item){
            		$('#slUsuario').append($('<option>', { 
              			value: item.id,
              			text : item.Nombres+' '+item.Apellidos
          		}	)); 

      			});
			$('#slUsuario').append('</optgroup>');
		})
	}

	if ($("#frmAddUserPrestacion").length > 0) {
		$("#frmAddUserPrestacion").validate({

			submitHandler: function(form) {
				$.post('/admin/saveUserPrestacion', $("#frmAddUserPrestacion").serialize(), function(data){
					if (data.Request) {
						Message(2,data.Message);
						getUsersPrestacion($("#txtidPrestacion").val());
					}else{
						Message(1,data.Message);
					}
				});
			}
		})
	}
	
})