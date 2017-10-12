<?php session_start(); ?>
<?php  
require_once '../admin/config.php';
require_once '../php/Conexion.php';
require_once '../php/funciones.php';
require_once '../mpdf60/mpdf.php';
validateSession();
$cn = getConexion($bd_config);
comprobarConexion($cn);

$documento = $_GET['id'];

$estudiante = getSubjectById("estudiante",$documento,"documento",$cn);
#var_dump($estudiante);
?>
<?php require("../view/ver-estudiante.view.php") ?>