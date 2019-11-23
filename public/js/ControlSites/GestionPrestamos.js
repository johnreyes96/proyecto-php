 $(document).ready(function(){

	$.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
            }
        });
		getPrestamos();
		function getPrestamos() {
		
			$('#tblPrestamos').DataTable({
	         processing: true,
	         serverSide: true,
	         ajax: {
	          url: "/admin/getPrestamos",
	          type: 'POST',
	         },
	         dom: 'Bfrtip',
	         buttons: [
	         	'copy', 'excel', 'pdf'
	         ],
	         columns: [
	                  { data: 'Nombres', name: 'Nombres' },
	                  { data: 'Descripcion', name: 'Descripcion' },
	                  { data: 'valorPrestamo', name: 'valorPrestamo' },
	                  { data: 'valorPagado', name: 'valorPagado'},
	                  { data: 'Fecha', name: 'Fecha' },
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
	getUsersEstudio();

	$(".btnNewPrestamo").on('click', function(){
		$("#frmPrestamo").trigger('reset');
		$("#newPrestamo").modal('show');
	});
	$('body').on('click','.btnCancel', function(){
		alertify.confirm("¿Está seguro que desea cancelar este prestamo?",
		  function(){
		    alert('ok');
		  });

				  
	})
	if ($("#frmPrestamo").length > 0) {
		$("#frmPrestamo").validate({

			submitHandler: function(form) {
				$.post('/admin/savePrestamo', $("#frmPrestamo").serialize(), function(data){
					if (data.Request) {
						alertify.alert('Mensaje', data.Message);
						var oTable = $('#tblPrestamos').dataTable();
              			oTable.fnDraw(false);
              			$("#newPrestamo").modal('hide');
					}else{
						alertify.alert('Error', data.Message);
					}
				});
			}
		})
	}
	function getInfoPrestamo(id)
	{
		// Search information to pay
		$.get('/admin/showInfoPrestamo',{id: id}, function(data){
			$("#textModeloEmpleado").html(data.Request[0].Nombres);
			$("#textConcepto").html(data.Request[0].Descripcion);
			$("#textCantidadCuotas").html(data.Request[0].cantidadCuotas);
			$("#textValorPrestamo").html(data.Request[0].valorPrestamo);
			$("#textValorTotalAbonado").html(data.Request[0].valorPagado == null ? '0': data.Request[0].valorPagado);
			$("#txtCantidadAbono").val('')
			$("#payPrestamo").modal('show');
		})
	}
	$('body').on('click','.btnPay', function(){
		var id = $(this).attr('data-id');
		$("#idPrestamo").val(id);
		getInfoPrestamo(id);
	});

	$('body').on('click', '.btnMovements', function(){
		var id = $(this).attr('data-id');
		$(".viewMovimientos").html('');
		$.get('/admin/showInfoPrestamo',{id: id}, function(data){
			$("#MtextModeloEmpleado").html(data.Request[0].Nombres);
			$("#MtextConcepto").html(data.Request[0].Descripcion);
			$("#MtextCantidadCuotas").html(data.Request[0].cantidadCuotas);
			$("#MtextValorPrestamo").html(data.Request[0].valorPrestamo);
			$("#MtextValorTotalAbonado").html(data.Request[0].valorPagado == null ? '0': data.Request[0].valorPagado);
		})
		$.get('/admin/getMovimientos', {Prestamo : id}, function(data){
			if(data.Request.length < 1){
				$(".viewMovimientos").append('<li class="list-group-item"><span class="text-center">No hay movimientos registrados.</span></li>');
			}else{
				$.each(data.Request, function(i, item){
					$(".viewMovimientos").append('<li class="list-group-item"><div class="widget-content p-0"><div class="widget-content-wrapper"><div class="widget-content-left"><div class="widget-heading">'+item.Fecha+'</div><div class="widget-subheading">'+item.Concepto+'</div></div><div class="widget-content-right"><div class="font-size-xlg text-muted"><small class="opacity-5 pr-1">$</small><span>'+item.Valor+'</span></div></div></div></div></li>');
				})
			}
			
			$("#modalMovimientosPrestamo").modal('show');	
		})
		
	});

	$('body').on('click','#btnAddPay', function(){
		var Abono = $("#txtCantidadAbono").val();
		var id = $("#idPrestamo").val();
		if (Abono > 0) {
			$.post('/admin/addMovimientoPrestamo',{Valor: Abono, id: id}, function(data){
				if (data.Request) {
					Message(2, data.Message);
              		$("#payPrestamo").modal('hide');
              		var oTable = $('#tblPrestamos').dataTable();
              		oTable.fnDraw(false);

				}else{
					Message(1, data.Message);
				}
			});
		}else{
			Message(1, 'El valor total a abonar debe ser mayor a 0');
		}
	})
	$('#tblPrestamosFinalizados').DataTable({
         processing: true,
         serverSide: true,
         ajax: {
          url: "/admin/getPrestamosFinalizados",
          type: 'POST',
         },
         dom: 'Bfrtip',
         buttons: [
         	'copy', 'excel', 'pdf'
         ],
         columns: [
                  { data: 'Nombres', name: 'Nombres' },
                  { data: 'Descripcion', name: 'Descripcion' },
                  { data: 'valorPrestamo', name: 'valorPrestamo' },
                  { data: 'Fecha', name: 'Fecha' },
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

})