$(obtener_registros());

function obtener_registros(alumnos){
	$.ajax({
		//Fichero al cual realizamos la peticion
		url: 'consulta_alumnos.php',
		type: 'POST',
		//Tipo de fichero con el que esperamos comunicarnos
		dataType: 'php',
		//Parametro
		data: {alumnos:alumnos},
	})

	.done(function (resultado){
		//En este contener vamos a albergar el resultado de la funcion
		$("tabla_resultado").html(resultado);
	})
}


$(document).on('keyup','#busqueda',function()
	{
		var valorBusqueda = $(this).val();
		if (valorBusqueda!="") 
		{
			obtener_registros(valorBusqueda);
		}else{
			obtener_registros();
		}
	})