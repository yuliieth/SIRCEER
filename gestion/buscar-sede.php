<?php session_start(); ?>
<?php  
require_once '../admin/config.php';
require_once '../php/funciones.php';
validateSession();
?>
<?php require("../view/buscar-sede.view.php") ?>

