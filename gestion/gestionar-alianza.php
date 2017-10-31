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
$id_alianza = $_GET['id'];
$alianza = getSubjectById('alianza',$id_alianza,'id',$cn);
$instituciones = getInstituciones($cn);
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	var_dump($_POST);


	#header("Location: ".URL. "gestion/buscar-alianza.php?select=a");

}else{
#Necesidades:
/*
1. El estudiante a mostrar (Ya esta seleccionado).
2. Frm para diligencias la tabla semestre.
3. Traer el programa y la institucion a la que pertenece el estudiante
4. Finalmente con estos datos hacer un insert para "evaluacion_semestral"
*/


#var_dump($programas);

}



?>

<?php require '../view/gestionar-alianza.view.php'?>