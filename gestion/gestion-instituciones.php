<?php session_start(); ?>
<?php  
require_once '../php/Conexion.php';
require_once '../php/funciones.php';
require_once '../admin/config.php';

$cn = getConexion($bd_config);
validateSession();


$totalI=countEntityWithOutWhere("instituciones",$cn);
#Obtener el numero de instituciones en el sector oficial



if ($totalI != 0) {

$totalISO=contarEntity('instituciones','sectores','sector_id','nombre','OFICIAL',$cn);
$totalISNO=contarEntity('instituciones','sectores','sector_id','nombre','NO OFICIAL',$cn);
#Obtener el numero de instituciones en el sector no oficial

#Obtener el numero de instituciones del calendario A

#Obtener el numero de instituciones del calendario B

#realizando operaciones

$porceISO=($totalISO / $totalI)*100;
$porceISNO=($totalISNO / $totalI)*100;
	}
?>
<?php require '../view/gestion-instituciones.view.php' ?>