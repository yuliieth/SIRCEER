<?php session_start(); ?>
<?php  
require_once '../admin/config.php';
require_once '../php/funciones.php';
require_once '../php/Conexion.php';
validateSession();
$cn = getConexion($bd_config);
$totalE=countEntityWithOutWhere("estudiante",$cn);
$totalM=countEntityWithWhere("estudiante","genero",'M',$cn);
$totalF=countEntityWithWhere("estudiante","genero",'F',$cn);
#$leyenda = "";
#var_dump($totalM);
#var_dump($totalF);
#var_dump($totalE);
#realizando operaciones
$porceM = 0;
$porceF = 0;
$porceM=($totalM / $totalE)*100;
$porceF=($totalF / $totalE)*100;

?>
<?php require'../view/gestion-programas.view.php' ?>