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
	'<table style="margin:auto; background-color: #FFF;">
	  <tr>
	  	<th scope="colgroup" colspan="4">Listado de programas</th>
	  </tr>
		<tr style="background-color: rgb(232,64,68); color:fff; padding: 4px; height: 31px;
	font-weight: bold; text-align: center;">
			<td>SNIES</td>
			<td>PROGRAMA</td>
			<td>SEMESTRES</td>
			<td>CREDITOS</td>
		</tr>';

	while($filaProgramas= $buscarProgramas->fetch_assoc())
	{
		$tabla.=
		'<tr style="text-align: center;">
			<td style="padding: 3px; >'.$filaProgramas['snies'].'</td>
			<td style="padding: 3px; >'.$filaProgramas['nombre'].'</td>
			<td style="padding: 3px; >'.$filaProgramas['num_semestres'].'</td>
			<td style="padding: 3px; >'.$filaProgramas['num_creditos'].'</td>
			<td style="padding: 3px; > <a href="'.URL.'gestion/editar-programa.php?id='. urlencode($filaProgramas['snies']).'&select=p">Editar</a> </td>
			<td> <a href="'.URL.'php/eliminarPrograma.php?id='. urlencode($filaProgramas['snies']).'&select=p">Eliminar</a></td>
		 </tr>
		';
	}

	$tabla.='</table>';
} else
	{
		$tabla="<div style='background-color:#333438; margin-top: 150px; color:#FFF; width:100%; height:90px; text-align:center;'><p style='font-size: 2em; padding-top:33px; font-weight:bold;'>No se encontraron coincidencias con sus criterios de búsqueda.<p></div>";
	}


echo $tabla;
?>
