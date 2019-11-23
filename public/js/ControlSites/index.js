$(document).ready(function(){
	function getModelsLive()
	{
		$.ajax({
			type: "GET",
			url: "/admin/RegistroTD",
			dataType: "json",
			cache: false,
			success: function(data)
			{
				$("#modelsInLive").html('');
				if (data.Request) {
					// Existen registros
					$.each(data.Registros, function(i, item){
						$("#modelsInLive").append('<tr>');
						$("#modelsInLive").append('<td>'+item.NombreModelo+'</td><td>'+item.NombreSitio+'</td>');
						$("#modelsInLive").append('<td>'+item.Tiempo+'</td>');
						if (item.Estado == 1) {
							$("#modelsInLive").append('<td><h5><span class="badge badge-info">Transmitiendo</span></h5></td>');
						}else{
							$("#modelsInLive").append('<td><h5><span class="badge badge-warning">En descanso</span></h5></td>');
						}
						$("#modelsInLive").append('</tr>');
					})
				}else{
					$("#modelsInLive").append('<tr><td colspan="4"><center>No hay modelos transmitiendo</center></td><tr>');
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
	getModelsLive();

	function getHistoryTiempoDiario() {
		$.get('/admin/getHistoryRegistroTiemposModelo', function(data){
			$.each(data.Contenido, function(i, item){
				if (item.CodTypeModel == 'L') {
					$("#listRegistrosTiempos").append('<tr><td>'+item.NombreSitio+'</td><td>'+item.Cantidad+' '+item.Moneda+'</td><td>'+item.Fecha+'</td><td>'+item.Tiempo+'</td></tr>');
				}else{
					$("#listRegistrosTiempos").append('<tr><td>'+item.NombreSitio+'</td><td>'+item.Cantidad+' '+item.Moneda+'</td><td>'+item.Fecha+'</td><td>N/A - Registro Modelo Satélite</td></tr>');
				}
				
			})
		})
	}
	getHistoryTiempoDiario();
})