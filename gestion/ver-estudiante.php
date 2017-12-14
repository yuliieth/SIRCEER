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

$estudiante = getAllStudentRelations($documento,$cn);
$matricula = getMatricula($documento,$cn);
#echo "$matricula";
$historial = getHistorialEstudiante($matricula,$cn);
#var_dump($historial);
?>
<?php require("../view/ver-estudiante.view.php") ?>