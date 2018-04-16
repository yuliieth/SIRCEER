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
$query="SELECT * FROM sedes ORDER BY id";

///////// LO QUE OCURRE AL TECLEAR SOBRE EL INPUT DE BUSQUEDA ////////////
if(isset($_POST['sedes']))
{                  #Por seguridad
	$q=$conexion->real_escape_string($_POST['sedes']);
	$query="SELECT * FROM sedes WHERE
		id LIKE '%".$q."%' OR
		nombre LIKE '%".$q."%' OR
		codigo_dane_sede LIKE '%".$q."%' OR
		consecutivo LIKE '%".$q. "%'";
}

$sedes=$conexion->query($query);
if ($sedes->num_rows > 0)
{
	$tabla.= 
	'<table style="margin:auto; background-color: #FFF;">
	  <tr>
	  	<th scope="colgroup" colspan="4">Listado de sedes</th>
	  </tr>
		<tr style="background-color: rgb(232,64,68); color:fff; padding: 4px; height: 31px;
	font-weight: bold; text-align: center;">
			<td>ID</td>
			<td>NOMBRE</td>
			<td>CODIGO DANE</td>
			<td>CONSECUTIVO</td>
			<td></td>
			<td></td>
		</tr>';

	while($sede= $sedes->fetch_assoc())
	{
		$tabla.=
		'<tr style="text-align: center;">
			<td style="padding: 3px;">'.$sede['id'].'</td>
			<td style="padding: 3px;">'.$sede['nombre'].'</td>
			<td style="padding: 3px;">'.$sede['codigo_dane_sede'].'</td>
			<td style="padding: 3px;">'.$sede['consecutivo'].'</td>
			<td>
			 <a href="'.URL.'gestion/editar-sede.php?id='. urlencode($sede['id']).'&select=s">Editar</a> 
			</td>
			<td>
			 <a href="'.URL.'php/eliminarSede.php?id='. urlencode($sede['id']).'">Eliminar</a>
			</td>
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
