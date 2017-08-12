<?php session_start(); ?>
<?php  require_once '../php/funciones.php';
validateSession();
?>
<?php 
#Necesidades:
/*
1. El estudiante a mostrar (Ya esta seleccionado).
2. Frm para diligencias la tabla semestre.
3. Traer todos los programas registrados para ser seleccionados (Esta tabla ya estara diligenciada, ademas es una tabla hija por lo cual debemos tener cuidado de diligneciar sus tablas padres ).
4. Finalmente con estos datos hacer un insert para "evaluacion_semestral"
*/
?>
<?php require '../view/gestionar-estudiante.view.php' ?>