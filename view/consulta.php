<?php
/////// CONEXIÓN A LA BASE DE DATOS /////////
$host = 'localhost';
$basededatos = 'srceer';
$usuario = 'roo';
$contrasena = '';
echo "Iniciando conexion";
$conexion = new mysqli($host, $usuario,$contrasena, $basededatos);
if ($conexion -> connect_errno)
{
	die("Fallo la conexion:(".$conexion -> mysqli_connect_errno().")".$conexion-> mysqli_connect_error());
}

//////////////// VALORES INICIALES ///////////////////////

$tabla="";
$query="SELECT * FROM estudiantes ORDER BY id";

///////// LO QUE OCURRE AL TECLEAR SOBRE EL INPUT DE BUSQUEDA ////////////
if(isset($_POST['alumnos']))
{
	$q=$conexion->real_escape_string($_POST['alumnos']);
	$query="SELECT * FROM estudiantes WHERE 
		id LIKE '%".$q."%' OR
		primer_nombre LIKE '%".$q."%' OR
		primer_apellido LIKE '%".$q."%' OR
		segundo_apellido LIKE '%".$q."%' OR
		segundo_nombre LIKE '%".$q."%' OR
		email LIKE '%".$q."%' OR
		ojos LIKE '%".$q."%' OR
		estrato LIKE '%".$q."%' OR
		genero LIKE '%".$q."%'";
}

$buscarAlumnos=$conexion->query($query);
if ($buscarAlumnos->num_rows > 0)
{
	$tabla.= 
	'<table class="table">
		<tr class="bg-primary">
			<td>ID ALUMNO</td>
			<td>NOMBRES</td>
			<td>APELLIDOS</td>
			<td>EMAIL</td>
			<td>OJOS</td>
			<td>ESTRATO</td>
			<td>GENERO</td>
		</tr>';

	while($filaAlumnos= $buscarAlumnos->fetch_assoc())
	{
		$tabla.=
		'<tr>
			<td>'.$filaAlumnos['id'].'</td>
			<td>'.$filaAlumnos['primer_nombre']." ".$filaAlumnos['segundo_nombre'].'</td>
			<td>'.$filaAlumnos['primer_apellido']." ".$filaAlumnos['segundo_apellido'].'</td>
			<td>'.$filaAlumnos['email'].'</td>
			<td>'.$filaAlumnos['ojos'].'</td>
			<td>'.$filaAlumnos['estrato'].'</td>
			<td>'.$filaAlumnos['genero'].'</td>
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
