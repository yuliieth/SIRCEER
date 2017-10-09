<?php require '../admin/config.php';
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
$query="SELECT * FROM programa ORDER BY snies";

///////// LO QUE OCURRE AL TECLEAR SOBRE EL INPUT DE BUSQUEDA ////////////
if(isset($_POST['programa']))
{                  #Por seguridad
	$q=$conexion->real_escape_string($_POST['programa']);
	$query="SELECT * FROM programa WHERE 
		snies LIKE '%".$q."%' OR
		nombre LIKE '%".$q."%' OR
		num_semestres LIKE '%".$q."%' OR
		num_creditos LIKE '%".$q."%'";
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
			<td>SNIES</td>
			<td>PROGRAMA</td>
			<td>SEMESTRES</td>
			<td>CREDITOS</td>
		</tr>';

	while($filaProgramas= $buscarProgramas->fetch_assoc())
	{
		$tabla.=
		'<tr class="color">
			<td>'.$filaProgramas['snies'].'</td>
			<td>'.$filaProgramas['nombre'].'</td>
			<td>'.$filaProgramas['num_semestres'].'</td>
			<td>'.$filaProgramas['num_creditos'].'</td>
			<td> <a href="'.URL.'gestion/editar-programa.php?id='. urlencode($filaProgramas['snies']).'&select=p">Editar</a> </td>
			<td> <a href="'.URL.'php/eliminarPrograma.php?id='. urlencode($filaProgramas['snies']).'&select=p">Eliminar</a></td>
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
