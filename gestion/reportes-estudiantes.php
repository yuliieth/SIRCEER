<?php session_start(); 
require_once '../admin/config.php';
require_once '../php/funciones.php';
require_once '../php/Conexion.php';
require_once '../mpdf60/mpdf.php';
validateSession();
$cn = getConexion($bd_config);
comprobarConexion($cn);
$sedes = getAllSubject('sedes',$cn);
?>

<?php 
#Objectivo mostrar el listado de estudaintes por institucion o se seleccionada

if (isset($_POST['generar'])) {
	
	#var_dump($_POST);
	#echo count($criterios)."\n";
	$estudiantes_sedes = getEstudiantesBySede($_POST['sede'],$cn);
	#var_dump($estudiantes_sedes);
	require "../view/reportes-estudiantes-parameters.view.php";
	

}

 ?>


<?php require "../view/reportes-estudiantes.view.php" ?>