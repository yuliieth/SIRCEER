<?php session_start(); ?>
<?php  
require_once '../php/Consultas.php';
require_once '../php/funciones.php';
validateSession();
?>
<?php require'../view/gestion-estudiantes.view.php' ?>