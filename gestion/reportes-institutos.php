<?php session_start(); ?>
<?php  
require_once '../php/funciones.php';
validateSession();
?>
<?php require("../view/reportes-institutos.view.php") ?>