<?php
/////// CONEXIÓN A LA BASE DE DATOS /////////
$host = 'localhost';
$basededatos = 'srceer';
$usuario = 'root';
$contrasena = '';

$conexion = new mysqli($host, $usuario,$contrasena, $basededatos);
if ($conexion -> connect_errno)
{
	die("Fallo la conexion:(".$conexion -> mysqli_connect_errno().")".$conexion-> mysqli_connect_error());
}

//////////////// VALORES INICIALES ///////////////////////

$tabla="";
$query="SELECT * FROM programas ORDER BY id";

///////// LO QUE OCURRE AL TECLEAR SOBRE EL INPUT DE BUSQUEDA ////////////
if(isset($_POST['programas']))
{                  #Por seguridad
	$q=$conexion->real_escape_string($_POST['programas']);
	$query="SELECT * FROM programas WHERE 
		id LIKE '%".$q."%' OR
		nombre LIKE '%".$q."%' OR
		codigo_snies LIKE '%".$q."%' OR
		num_semestres LIKE '%".$q."%' OR
		num_creditos LIKE '%".$q."%' OR
		nivel_academico LIKE '%".$q."%'";
}

$buscarProgramas=$conexion->query($query);
if ($buscarProgramas->num_rows > 0)
{
	$tabla.= 
	'<table class="table">
	  <tr>
	  	<th scope="colgroup" colspan="4">Listado de programas</th>
	  </tr>
		<tr class="bg-primary">
			<td>ID</td>
			<td>PROGRAMA</td>
			<td>CODIGO SNIES</td>
			<td>SEMESTRES</td>
			<td>CREDITOS</td>
			<td>NIVEL ACADEMICO</td>
		</tr>';

	while($filaProgramas= $buscarProgramas->fetch_assoc())
	{
		$tabla.=
		'<tr class="color">
			<td>'.$filaProgramas['id'].'</td>
			<td>'.$filaProgramas['nombre'].'</td>
			<td>'.$filaProgramas['codigo_snies'].'</td>
			<td>'.$filaProgramas['num_semestres'].'</td>
			<td>'.$filaProgramas['num_creditos'].'</td>
			<td>'.$filaProgramas['nivel_academico'].'</td>
			<td> <a href="../gestion/editar-programa.php?id='. urlencode($filaProgramas['id']).'">Editar</a> </td>
			<td> <a href="../php/eliminarPrograma.php?id='. urlencode($filaProgramas['id']).'">Eliminar</a></td>
		 </tr>
		';
	}

	$tabla.='</table>';
} else
	{
		$tabla="No se encontraron coincidencias con sus criterios de búsqueda.";
	}


echo $tabla;
?>
