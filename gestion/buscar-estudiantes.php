<?php session_start(); ?>
<?php  
require '../admin/config.php';
require_once '../php/funciones.php';
require_once '../php/Conexion.php';
validateSession();
$allEntitys = getStudentsInsitutesAndprogramns($bd_config);
#var_dump($allEntitys);
?>
<?php require("../view/buscar-estudiante.view.php") ?>

