<?php session_start(); ?>
<?php  
require_once '../admin/config.php';
require_once '../php/funciones.php';
require_once '../php/Conexion.php';
#validateSession();
$cn = getConexion($bd_config);?>
<?php require '../view/gestion-universidades.view.php' ?>