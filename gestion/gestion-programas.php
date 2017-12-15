<?php session_start(); ?>
<?php  
require_once '../admin/config.php';
require_once '../php/funciones.php';
require_once '../php/Conexion.php';
validateSession();
$cn = getConexion($bd_config);
$totalP=countEntityWithOutWhere("estudiante",$cn);
$totalI=countEntityWithWhere("programa","nivel_academico_id",'3',$cn);
$totalTo=countEntityWithWhere("programa","nivel_academico_id",'2',$cn);
$totalTi=countEntityWithWhere("programa","nivel_academico_id",'1',$cn);
#$leyenda = "";
if ($totalP != 0) {
	# code...

#var_dump($totalM);
#var_dump($totalF);
#var_dump($totalE);
#realizando operaciones
$porceI=($totalI / $totalP)*100;
$porceTo=($totalTo / $totalP)*100;
$porceTi= ($totalTi / $totalP)*100;
}
?>
<?php require'../view/gestion-programas.view.php' ?>