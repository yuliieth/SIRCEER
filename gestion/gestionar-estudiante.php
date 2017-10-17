<?php session_start(); ?>
<?php  
require_once '../admin/config.php';
require_once '../php/funciones.php';
require_once '../php/Conexion.php';
validateSession();
?>
<?php 
$cn = getConexion($bd_config);
comprobarConexion($cn);
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	var_dump($_POST);
}else{
#Necesidades:
/*
1. El estudiante a mostrar (Ya esta seleccionado).
2. Frm para diligencias la tabla semestre.
3. Traer el programa y la institucion a la que pertenece el estudiante
4. Finalmente con estos datos hacer un insert para "evaluacion_semestral"
*/
$documento = cleanData($_GET['id']);

$estudiante = getSubjectById("estudiante",$documento,"documento",$cn);
$programa = getProgramaOfEstudiante($documento,$cn);

$estudiante = getSubjectById("estudiante","documento",$documento,$cn);
$programas = getAllSubject("programa",$cn);

#var_dump($programas);

}



?>

<?php require '../view/gestionar-estudiante.view.php'?>