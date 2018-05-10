<?php session_start(); ?>
<?php  
require_once '../admin/config.php';
require_once '../php/funciones.php';
require_once '../php/Conexion.php';
validateSession();
$cn = getConexion($bd_config);
$totalP=countEntityWithOutWhere("programas",$cn);

#$leyenda = "";
if ($totalP != 0) {
	# code...
#realizando operaciones
$totalPT=contarEntity('programas','nivel_academico','nivel_academico_id','nombre','TECNICO',$cn);

$totalPTE=contarEntity('programas','nivel_academico','nivel_academico_id','nombre','TECNOLOGIA',$cn);

$totalPI=contarEntity('programas','nivel_academico','nivel_academico_id','nombre','INGENIERIA',$cn);


$porcePT=($totalPT / $totalP)*100;
$porcePTE=($totalPTE / $totalP)*100;
$porcePI= ($totalPI / $totalP)*100;


#Jornadas
$totalPJM=contarEntity('programas','Jornadas','jornada_id','nombre','MANANA',$cn);

$totalPJT=contarEntity('programas','Jornadas','jornada_id','nombre','TARDE',$cn);

$totalPJN=contarEntity('programas','Jornadas','jornada_id','nombre','NOCHE',$cn);


$porcePT=($totalPT / $totalP)*100;
$porcePTE=($totalPTE / $totalP)*100;
$porcePI= ($totalPI / $totalP)*100;

$porcePJM=($totalPJM / $totalP)*100;
$porcePJT=($totalPJT / $totalP)*100;
$porcePJN= ($totalPJN / $totalP)*100;





	}
?>
<?php require'../view/gestion-programas.view.php' ?>