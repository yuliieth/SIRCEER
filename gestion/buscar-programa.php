<?php session_start(); ?>
<?php  
require_once '../php/funciones.php';
validateSession();
?>
<?php require("../view/buscar-programa.view.php") ?>
