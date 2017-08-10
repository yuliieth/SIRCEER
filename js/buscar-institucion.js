$(obtener_registros());

function obtener_registros(institucion)
{
	$.ajax({
		url : '../php/buscar-institucion.php',
		type : 'POST',
		dataType : 'html',
		data : { institucion: institucion },
		})

	.done(function(resultado){
		$("#tabla_resultado").html(resultado);
	})
}

$(document).on('keyup', '#busqueda-institucion', function()
{
	var valorBusqueda=$(this).val();
	if (valorBusqueda!="")
	{
		obtener_registros(valorBusqueda);
	}
	else
		{
			obtener_registros();
		}
});
