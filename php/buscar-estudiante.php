<?php
require '../admin/config.php';
/////// CONEXIÓN A LA BASE DE DATOS /////////


$conexion = new mysqli($bd_config['host'], $bd_config['userName'],$bd_config['pass'], $bd_config['nameBD']);
if ($conexion -> connect_errno)
{
	die("Fallo la conexion:(".$conexion -> mysqli_connect_errno().")".$conexion-> mysqli_connect_error());
}

//////////////// VALORES INICIALES ///////////////////////

$tabla="";
$query="SELECT estudiantes.documento AS doc_estudiante,estudiantes.primer_nombre,estudiantes.segundo_nombre,estudiantes.primer_apellido,estudiantes.segundo_apellido,estudiantes.edad, generos.nombre AS genero, zonas.nombre AS zona,grados.nombre AS grado,municipios.nombre AS municipio, sedes.nombre AS sede FROM estudiantes LEFT JOIN generos ON estudiantes.genero_id=generos.id LEFT JOIN zonas ON estudiantes.zona_id=zonas.id LEFT JOIN grados ON estudiantes.grado_id=grados.id LEFT JOIN municipios ON estudiantes.municipio_id=municipios.id LEFT JOIN sedes ON estudiantes.sede_id=sedes.id";

///////// LO QUE OCURRE AL TECLEAR SOBRE EL INPUT DE BUSQUEDA ////////////
if(isset($_POST['estudiantes']))
{                  #Por seguridad
	$q=$conexion->real_escape_string($_POST['estudiantes']);
	$query="SELECT estudiantes.documento AS doc_estudiante,estudiantes.primer_nombre,estudiantes.segundo_nombre,estudiantes.primer_apellido,estudiantes.segundo_apellido,estudiantes.edad, generos.nombre AS genero, zonas.nombre AS zona,grados.nombre AS grado,municipios.nombre AS municipio, sedes.nombre AS sede FROM estudiantes LEFT JOIN generos ON estudiantes.genero_id=generos.id LEFT JOIN zonas ON estudiantes.zona_id=zonas.id LEFT JOIN grados ON estudiantes.grado_id=grados.id LEFT JOIN municipios ON estudiantes.municipio_id=municipios.id LEFT JOIN sedes ON estudiantes.sede_id=sedes.id WHERE
		estudiantes.documento LIKE '%".$q."%' OR
		estudiantes.primer_nombre LIKE '%".$q."%' OR
		estudiantes.segundo_nombre LIKE '%".$q."%' OR
		estudiantes.primer_apellido LIKE '%".$q."%' OR
		estudiantes.segundo_apellido LIKE '%".$q."%' OR
		estudiantes.genero_id LIKE '%".$q."%' OR
		estudiantes.zona_id LIKE '%".$q."%' OR
		estudiantes.grado_id LIKE '%".$q."%' OR
		estudiantes.fecha_inicio LIKE '%".$q."%' OR
		estudiantes.municipio_id LIKE '%".$q."%' OR
		estudiantes.sede_id LIKE '%".$q."%'";
}

$buscarEstudiantes=$conexion->query($query);
if ($buscarEstudiantes->num_rows > 0)
{
	$tabla.= 
	'<table style="margin:auto; width:90%; background-color: #FFF;">
	<tr>
	  	<th scope="colgroup" colspan="4">Listado de estudiantes</th>
	  </tr>
	<tr style="background-color: rgb(232,64,68); color:fff; padding: 4px; height: 31px;
	font-weight: bold; text-align: center;">
			<td>DOCUMENTO</td>
			<td>NOMBRES</td>
			<td>APELLIDOS</td>
			<td>EDAD</td>
			<td>GENERO</td>
			<td>ZONA</td>
			<td width="10%">GRADO</td>
			<td>MUNICIPIO</td>
			<td>SEDE</td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
	</tr>';

	while($filaEstudiantes= $buscarEstudiantes->fetch_assoc())
	{
		$tabla.=
		'<tr>
			<td style="padding: 3px;"> '. $filaEstudiantes['doc_estudiante'].'</td>
			<td style="padding: 3px;"> '. $filaEstudiantes['primer_nombre'].' '.$filaEstudiantes['segundo_nombre'].'</td>
			<td style="padding: 3px;"> '. $filaEstudiantes['primer_apellido'].' '.$filaEstudiantes['segundo_apellido'].'</td>
			<td style="padding: 3px;"> '. $filaEstudiantes['edad'].'</td>
			<td style="padding: 3px;"> '. $filaEstudiantes['genero'].'</td>
			<td style="padding: 3px;"> '. $filaEstudiantes['zona'].'</td>
			<td style="padding: 3px;"> '. $filaEstudiantes['grado'].'</td>
			<td style="padding: 3px;"> '. $filaEstudiantes['municipio'].'</td>
			<td style="padding: 3px;"> '. $filaEstudiantes['sede'].'</td>
			<td></td>
			<td></td>

			<td> <a  href="' . URL .'gestion/gestionar-estudiante.php?id='. urlencode($filaEstudiantes['doc_estudiante']).'&select=e">Gestionar</a></td>
			<td> <a  href="' . URL .'gestion/editar-estudiante.php?id=' . urlencode($filaEstudiantes['doc_estudiante']).'&select=e">Editar</a></td>
			<td> <a  href="'.  URL .'php/eliminarEstudiante.php?id=' . urlencode($filaEstudiantes['doc_estudiante']).'">Eliminar</a></td>
			<td> <a  target="_blank" href="' . URL .'gestion/ver-estudiante.php?id=' . urlencode($filaEstudiantes['doc_estudiante']).'">Ver</a></td>
		 </tr>';
	}

	$tabla.='</table>';
} else
	{
		$tabla="<div style='background-color:#333438; margin-top: 150px; color:#FFF; width:100%; height:90px; text-align:center;'><p style='font-size: 2em; padding-top:33px; font-weight:bold;'>No se encontraron coincidencias con sus criterios de búsqueda.<p></div>";
	}


echo $tabla;
?>
