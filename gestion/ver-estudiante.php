<?php session_start(); ?>
<?php  
require_once '../php/funciones.php';
require_once '../mpdf60/mpdf.php';
validateSession();
#https://www.youtube.com/watch?v=RjtZVCm5fhc&t=202s
?>
<?php require("../view/ver-estudiante.view.php") ?>