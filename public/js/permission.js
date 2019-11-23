var Objects = [];
function validarObjeto(Obj){
	for (var i = 0; i < Objects.length; i++) 
	{
		if (Obj == Objects[i].ObjName) 
		{
			return true;
		}		
	}
	return false;
}

function objetosPerfil ()
{
	$(".seguridad").each(function(i, item){
		
		var Objeto = $(this).attr("ObjName");

		if (validarObjeto(Objeto)) {
			$(this).show();
		}else{
			$(this).remove();
		}
	});
}

$(document).ready(function(){
	
	function consultaObjetos()
	{
		$.get('/admin/getObjectsPermissions', function(data){
			
			$.each(data.Request, function(i, item){
				Objects.push(item);
			})
			objetosPerfil();
		});
	}
	consultaObjetos();
	
});