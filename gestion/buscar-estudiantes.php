<?php session_start(); ?>
<?php  
require_once '../admin/config.php';
require_once '../php/funciones.php';
require_once '../php/Conexion.php';
validateSession();
$cn = getConexion($bd_config);
comprobarConexion($cn);
#$allEntitys = getStudentsInsitutesAndprogramns($bd_config);
$allEntitys = getAllSubject("estudiante",$cn);
#var_dump($allEntitys);
?>
<?php require("../view/buscar-estudiante.view.php") ?>
