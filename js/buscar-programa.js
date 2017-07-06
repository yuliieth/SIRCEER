$(obtener_registros());

function obtener_registros(programa)
{
	$.ajax({
		url : '../php/buscar-programa.php',
		type : 'POST',
		dataType : 'html',
		data : { programa: programa },
		})

	.done(function(resultado){
		$("#tabla_resultado").html(resultado);
	})
}

$(document).on('keyup', '#busqueda-programa', function()
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
