<?php session_start(); ?>
<?php  
require_once '../admin/config.php';
require_once '../php/funciones.php';
require_once '../php/Conexion.php';
validateSession();
$cn = getConexion($bd_config);
comprobarConexion($cn);
#$allEntitys = getStudentsInsitutesAndprogramns($bd_config);
$alianzas = getAllSubject("alianzas",$cn);
#var_dump($allEntitys);
?>
<?php require("../view/buscar-alianza.view.php") ?>

