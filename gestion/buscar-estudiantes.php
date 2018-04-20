<?php session_start(); ?>
<?php  
require_once '../admin/config.php';
require_once '../php/funciones.php';
require_once '../php/Conexion.php';

$pagina = isset($_GET['p']) ? (int)$_GET['p'] : 1;
validateSession();
$cn = getConexion($bd_config);
comprobarConexion($cn);

$rows = obtener_estudiante($config_global['estudiantes_por_pagina'],$cn);
#var_dump($rows);
#$allEntitys = getStudentsInsitutesAndprogramns($bd_config);
#$estudiantes = getAllSubject("estudiante",$cn);
#var_dump($allEntitys);
?>
<?php require "../view/buscar-estudiante.view.php" ?>

