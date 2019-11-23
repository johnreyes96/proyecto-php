var ArraySitios = [];
var ArrayTblSitios = [];
var ListModelSites = [];
var ListModelsCalculate = [];

$(document).ready(function() {
	

  	function getSitios()
	{
		$.get('/admin/getSitios',function(data){
				$("#slSitio").html('');
				$("#slSitio").append('<option value="0">Seleccione un sitio...</option>');
				$.each(data.Contenido, function(i,item){
					if (item.HTMLCalculo != "") {
							$('#slSitio').append($('<option>', { 
              					value: item.id,
              					text : item.NombreSitio
          					}
          			)); 
				    var Obj = {};
				    Obj.id = item.id;
				    Obj.Nombre = item.NombreSitio;
				    Obj.HTML = item.HTMLCalculo;
				    ArraySitios.push(Obj);
					}
      			});
		});
	}
	getSitios();

	function getModelosRegistros(id, fechaInicio, fechaFin)
	{
		$.get('/admin/getRegistros', {id: id, FechaInicio: fechaInicio, FechaFin: fechaFin}, function(data){
			$.each(data.Request, function(i, item){
				var Obj = {};
				
				Obj.Apellidos = item.Apellidos;
				Obj.Cantidad = item.Cantidad;
				Obj.Model_id = item.Model_id;
				Obj.NombreModelo = item.NombreModelo;
				Obj.NombreSitio = item.NombreSitio;
				Obj.Nombres = item.Nombres;
				Obj.PorcentajePago = item.PorcentajePago;
				Obj.Site_id = item.Site_id;
				Obj.User_id = item.User_id;
				ListModelSites.push(Obj);
			})
		})

	}

	$('body').on('click', '.btnAdd', function(){

		$.each(ArraySitios, function(i, item){
			if ($("#slSitio").val() == item.id) {
				var Obj = {};
				Obj.id = item.id;
				Obj.Nombre = item.Nombre;
				Obj.FechaInicio = $("#dtFechaInicio").val();
				Obj.FechaFin = $("#dtFechaFin").val();
				ArrayTblSitios.push(Obj);
				$("#tblSitios tbody").append('<tr><td style="display: none">'+item.id+'</td><td>'+item.Nombre+'</td><td>'+item.HTML+'</td><td>'+$("#dtFechaInicio").val()+'</td><td>'+$("#dtFechaFin").val()+'</td></tr>');
			}
		})
	});

	$('body').on('click', '.btnAddModelo', function(){

			
			// Código del modelo
			var codModel = $("#slModeloSitio").val().split('');

			// Separo el código del modelo
			var Sitio = codModel[0];
			var Modelo = codModel[1];

			// Traer y almacenar información del modelo
			$.each(ListModelSites, function(i, item){
				if (item.Site_id == Sitio && item.Model_id == Modelo) {
					$("#listModelSite").append('<tr><td style="display:none">'+$("#slModeloSitio").val()+'</td><td style="display: none">'+item.Model_id+'</td><td>'+item.NombreModelo+'</td><td style="display: none">'+item.Site_id+'</td><td>'+item.NombreSitio+'</td><td><div class="input-group mb-3"><div class="input-group-prepend"><span class="input-group-text">%</span></div><input type="text" class="form-control" value="'+item.PorcentajePago+'"></div></td><td>'+item.Cantidad+'</td></tr>');
				}
			})
			//validateModelInTable($("#slModeloSitio").val());
		
	})

	function validateModelInTable(Index)
	{
		$.each($("#listModelSite > tr"), function(i, item){
			if ($(this).find("td:eq(0)").text() == Index) {
				console.log('El modelo ya se encuentra añadido');
			}else{
				console.log($(this).find("td:eq(0)").text());
			}
			
				
			})

		/*if ($("#listModelSite > tr").length > 0) {

			console.log(Index);
			
			$.each($("#listModelSite > tr"), function(i, item){

				if ($(this).find("td:eq(0)").text() == Index) {
					return 'Existe';
				}else{
					return 'No existe';
				}
				console.log($(this).find("td:eq(0)").text());
			})

		}else{
			return false;
		}*/


		
		
	}

	$('body').on('click', '.btnGuadar2', function(){
		$.each($("#listModelSite > tr"), function(i, item){
			
			var Obj = {};
			Obj.idModelo = $(this).find("td:eq(1)").text();
			Obj.NombreModelo = $(this).find("td:eq(2)").text();
			Obj.idSitio = $(this).find("td:eq(3)").text();
			Obj.NombreSitio = $(this).find("td:eq(4)").text();
			Obj.PorcentajeModelo = $(this).find("td:eq(5)").children().children("input[type='text']").val();

			ListModelsCalculate.push(Obj);
			/*console.log($(this).find("td:eq(4)").children().children("input[type='text']").val());
			console.log($(this).find("td:eq(0)").text());*/
		})
	});

	$('body').on('click', '.btnGuardar', function(){
		if (ArrayTblSitios.length > 0) {
			// Consultar las modelos que se encuentran en el rango de fechas y sitios ingresados
			$.each(ArrayTblSitios, function(i, item){
				getModelosRegistros(item.id, item.FechaInicio, item.FechaFin);
				
			});
			$(".btnGuardar").html('<div class="spinner-border spinner-border-sm" role="status"><span class="sr-only">Loading...</span></div> Guardando...');
			$(".btnGuardar").attr('disabled',true);
			setInterval(function(){

				$(".btnNext").removeAttr('disabled');
				$(".btnGuardar").html('<i class="fa fa-fw" aria-hidden="true"></i> Guardado');
			}, 3000);
			
		}else{
			
			alertify.alert('<i class="fa fa-fw" aria-hidden="true" title="Copy to use exclamation"></i> Advertencia', 'Debe añadir al menos un sitio');
		}
	})

	$('body').on('click', '.btnNext', function(){
		$('#slModeloSitio').html('Seleccione una modelo...');
		$.each(ListModelSites, function(i, item){
				$('#slModeloSitio').append($('<option>', { 
              		value: item.Site_id+''+item.Model_id,
              		text : item.Nombres+' '+item.Apellidos+' ['+item.NombreModelo+']'+' / '+item.NombreSitio
          		}));
		});
		$("#tab-eg7-1").addClass('active');
		$("body a[href$='#tab-eg7-1']").addClass('active');
		$("#tab-eg7-0").removeClass('active');
		$("body a[href$='#tab-eg7-0']").removeClass('active');
		$(".progress-bar").css('width','50%')
	})
});