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
$query="SELECT estudiante.documento AS doc_estudiante,estudiante.primer_nombre,estudiante.segundo_nombre,estudiante.primer_apellido,estudiante.segundo_apellido,estudiante.edad,estudiante.email,estudiante.ojos,estudiante.estrato,estudiante.genero,estudiante.estado,estudiante.zona,estudiante.desplazado,estudiante.afrodescendiente,estudiante.grado, programa.nombre AS namePrograma FROM estudiante INNER JOIN matricula ON estudiante.documento=matricula.estudiante_documento INNER JOIN programa ON programa.snies=matricula.programa_snies ORDER BY documento ASC ";

///////// LO QUE OCURRE AL TECLEAR SOBRE EL INPUT DE BUSQUEDA ////////////
if(isset($_POST['estudiantes']))
{                  #Por seguridad
	$q=$conexion->real_escape_string($_POST['estudiantes']);
	$query="SELECT estudiante.documento AS doc_estudiante,estudiante.primer_nombre,estudiante.segundo_nombre,estudiante.primer_apellido,estudiante.segundo_apellido,estudiante.edad,estudiante.email,estudiante.ojos,estudiante.estrato,estudiante.genero,estudiante.estado,estudiante.zona,estudiante.desplazado,estudiante.afrodescendiente,estudiante.grado, programa.nombre AS namePrograma FROM estudiante INNER JOIN matricula ON estudiante.documento=matricula.estudiante_documento INNER JOIN programa ON programa.snies=matricula.programa_snies WHERE
		estudiante.documento LIKE '%".$q."%' OR
		estudiante.primer_nombre LIKE '%".$q."%' OR
		estudiante.segundo_nombre LIKE '%".$q."%' OR
		estudiante.primer_apellido LIKE '%".$q."%' OR
		estudiante.segundo_apellido LIKE '%".$q."%' OR
		estudiante.email LIKE '%".$q."%' OR
		estudiante.estrato LIKE '%".$q."%' OR
		estudiante.genero LIKE '%".$q."%' OR
		estudiante.desplazado LIKE '%".$q."%' OR
		estudiante.afrodescendiente LIKE '%".$q."%' OR
		estudiante.estado LIKE '%".$q."%' OR
		estudiante.edad LIKE '%".$q."%' OR
        programa.nombre LIKE '%".$q."%'";
}

$buscarEstudiantes=$conexion->query($query);
if ($buscarEstudiantes->num_rows > 0)
{
	$tabla.= 
	'<table style="margin:auto; background-color: #FFF;">
	<tr>
	  	<th scope="colgroup" colspan="4">Listado de estudiantes</th>
	  </tr>
	<tr style="background-color: rgb(232,64,68); color:fff; padding: 4px; height: 31px;
	font-weight: bold; text-align: center;">
			<td>DOCUMENTO</td>
			<td>NOMBRE</td>
			<td>EDAD</td>
			<td>OJOS</td>
			<td>ESTRATO</td>
			<td>GENERO</td>
			<td>ZONA</td>
			<!--<td>AFRO</td>-->
			<!--<td>ESTADO</td>-->
			<!--<td>INSTITUTO</td>-->
			<td>PROGRAMA</td>
			<!--<td>SEMESTRE</td>-->
			<td>GRADO</td>
			<!--<td>DESPLAZADO</td>-->
			<td></td>
			<td></td>
			<td></td>
			<td></td>
	</tr>';

	while($filaEstudiantes= $buscarEstudiantes->fetch_assoc())
	{
		$tabla.=
		'<tr ';if ($filaEstudiantes['estado']!=0) {
			$tabla.='style="background-color: #CEE3F6;"';
		};$tabla.='>
			<td style="padding: 3px;"> '. $filaEstudiantes['doc_estudiante'].'</td>
			<td style="padding: 3px;"> '. $filaEstudiantes['primer_nombre'].' '.$filaEstudiantes['primer_apellido'].'</td>
			<td style="padding: 3px;"> '. $filaEstudiantes['edad'].'</td>
			<td style="padding: 3px;"> '. $filaEstudiantes['ojos'].'</td>
			<td style="padding: 3px;"> '. $filaEstudiantes['estrato'].'</td>
			<td style="padding: 3px;"> '. $filaEstudiantes['genero'].'</td>
			<td style="padding: 3px;"> '. $filaEstudiantes['zona'].'</td>
			<!--<td style="padding: 3px;"> '. $filaEstudiantes['afrodescendiente'].'</td>-->
			<!--<td style="padding: 3px;"> '. $filaEstudiantes['estado'].'</td>-->
			<td style="padding: 3px;"> '. $filaEstudiantes['namePrograma'].'</td>
			<td style="padding: 3px;"> '. $filaEstudiantes['grado'].'</td>
			<!--<td style="padding: 3px;"> '. $filaEstudiantes['desplazado'].'</td>-->

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
