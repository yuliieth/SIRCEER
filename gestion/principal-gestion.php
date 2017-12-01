<?php session_start(); ?>
<?php  
require_once '../admin/config.php';
require_once '../php/funciones.php';
require_once '../php/Conexion.php';
validateSession();
$cn = getConexion($bd_config);
$totalE=countEntityWithOutWhere("estudiante",$cn);
$totalP=countEntityWithOutWhere("programa",$cn);
$totalI=countEntityWithOutWhere("institucion",$cn);
$totalA=countEntityWithOutWhere("alianza",$cn);

?>
<?php require '../view/principal-gestion.view.php' ?>