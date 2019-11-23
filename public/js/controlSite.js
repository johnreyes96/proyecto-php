$(document).ready(function(){

	$("body .MyProfile").on("click", function(e){
		e.preventDefault();
		$.get('/admin/showInfoUser',function(data){

			$(".infoIdentificacion").html(data.infoUsuario[0].Identificacion);
			$(".infoTipoIdentificacion").html(data.infoUsuario[0].tipoIdentificacion);
			$(".infoNombres").html(data.infoUsuario[0].Nombres);
			$(".infoApellidos").html(data.infoUsuario[0].Apellidos);
			$(".infoEmail").html(data.infoUsuario[0].email);
			$(".infoNumeroCelular").html(data.infoUsuario[0].NumeroCelular);
			$(".infoFechaNacimiento").html(data.infoUsuario[0].FechaNacimiento);
			$(".infoDireccionResidencia").html(data.infoUsuario[0].DireccionResidencia);
			$(".infoSexo").html(data.infoUsuario[0].Sexo);
			$(".infoBanco").html(data.infoUsuario[0].Banco);
			$(".infoNumeroCuenta").html(data.infoUsuario[0].CuentaBanco);

			if (data.typeUser == "Modelo")
			{
				$(".infoModelo").show();
				$(".infoNombreModelo").html(data.infoUsuario[0].NombreModelo);
				$(".infoTipoModelo").html(data.infoUsuario[0].typeModel);
			}else{
				$(".infoEmpleado").show();
				$(".infoTipoEmpleado").html(data.infoUsuario[0].typeUser);	
			}
			$("#modalMyProfile").modal('show');
		})
	});


});
	function Message(Type, Message) {
	/*
		Type:
			1. Advertencia
			2. Satisfactorio
			3. Error

	*/
	if (Type == 1) {
		return alertify.alert('<i class="fas fa-exclamation" style="font-size: 20px;"></i> Advertencia', Message);
	}
	if (Type == 2) {
		return alertify.alert('<i class="fas fa-check" style="font-size: 20px;"></i> Satisfactorio', Message);
	}
	if (Type == 3) {
		return alertify.alert('<i class="fas fa-times" style="font-size: 20px;"></i> Error', Message);
	}
}