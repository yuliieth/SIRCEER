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

	//1. Id de alianza. 2. Id institucion(3)
$sql = "INSERT INTO alianzas_instituciones VALUES (:alianza_id,institucion:id,:fecha_vinculacion)";
$ps = $cn->execute();
	#header("Location: ".URL. "gestion/buscar-alianza.php?select=a");

}else{

#var_dump($programas);

}



?>

<?php require '../view/gestionar-alianza.view.php'?>