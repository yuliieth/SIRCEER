<?php session_start(); ?>
<?php  
require_once '../admin/config.php';
require_once '../php/funciones.php';
require_once '../php/Conexion.php';
validateSession();
?>
<?php 
$cn = getConexionSIMAT($bd_config);
comprobarConexion($cn);
#var_dump($_POST);
if ( isset( $_POST['buscar'])) {
	$busqueda = $_POST['busqueda'];
	$result=buscarEstudianteSIMAT($busqueda,$cn);
	#var_dump($result);
}

require '../view/simat-estudiantes.view.php';
?>