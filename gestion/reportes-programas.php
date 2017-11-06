<?php 
session_start();
require_once '../admin/config.php';
require_once '../php/funciones.php';
require_once '../php/Conexion.php';
require_once '../mpdf60/mpdf.php';

$cn = getConexion($bd_config);
#Traemos todas las programas creados a la fecha
$programas = getAllSubject('programa',$cn);



include_once '../view/reportes-programas.view.php';
 ?>