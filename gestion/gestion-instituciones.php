<?php session_start(); ?>
<?php  
require_once '../php/funciones.php';
require_once '../php/Conexion.php';
validateSession();
?>
<?php require'../view/gestion-instituciones.view.php' ?>