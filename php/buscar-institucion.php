<?php
require '../admin/config.php';
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
$query="SELECT * FROM planteles_educativos ORDER BY id";

///////// LO QUE OCURRE AL TECLEAR SOBRE EL INPUT DE BUSQUEDA ////////////
if(isset($_POST['institutos']))
{                  #Por seguridad
	$q=$conexion->real_escape_string($_POST['institutos']);
	$query="SELECT * FROM estudiantes WHERE 
		id LIKE '%".$q."%' OR
		nombre LIKE '%".$q."%' OR
		codigo LIKE '%".$q."%' OR
		telefono LIKE '%".$q."%' OR
		municipio LIKE '%".$q."%' OR
		email LIKE '%".$q."%' OR
		direccion LIKE '%".$q."%'";
}

$buscarInstitutos=$conexion->query($query);
if ($buscarInstitutos->num_rows > 0)
{
	$tabla.= 
	'<table class="table">
	  <tr>
	  	<th scope="colgroup" colspan="4">Listado de instituciones</th>
	  </tr>
		<tr class="bg-primary">
			<td>ID</td>
			<td>INSTITUTO</td>
			<td>CODIGO</td>
			<td>TELEFONO</td>
			<td>MUNICIPIO</td>
			<td>EMAIL</td>
			<td>DIRECCION</td>
		</tr>';

	while($filaInstitutos= $buscarInstitutos->fetch_assoc())
	{
		$tabla.=
		'<tr class="color">
			<td>'.$filaInstitutos['id'].'</td>
			<td>'.$filaInstitutos['nombre'].'</td>
			<td>'.$filaInstitutos['codigo'].'</td>
			<td>'.$filaInstitutos['telefono'].'</td>
			<td>'.$filaInstitutos['municipio'].'</td>
			<td>'.$filaInstitutos['email'].'</td>
			<td>'.$filaInstitutos['direccion'].'</td>
			<td>
			 <a href="'.URL.'gestion/editar-institucion.php?id='. urlencode($filaInstitutos['id']).'">Editar</a> 
			</td>
			<td>
			 <a href="'.URL.'php/eliminarInstitucion.php?id='. urlencode($filaInstitutos['id']).'">Eliminar</a>
			</td>
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