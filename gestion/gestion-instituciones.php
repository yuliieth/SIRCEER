<?php session_start(); ?>
<?php  
require_once '../admin/config.php';
require_once '../php/funciones.php';
require_once '../php/Conexion.php';
validateSession();
$cn = getConexion($bd_config);
#$totalI=countEntityWithOutWhere("institucion",$cn);
#$totalM=countEntityWithWhere("estudiante","genero",'M',$cn);
#$totalF=countEntityWithWhere("estudiante","genero",'F',$cn);
#$leyenda = "";
#var_dump($totalM);
#var_dump($totalF);
#var_dump($totalE);
#realizando operaciones

?>
<?php require '../view/gestion-instituciones.view.php' ?>