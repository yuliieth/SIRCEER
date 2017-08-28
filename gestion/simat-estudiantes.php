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
#var_dump($_POST);
if ( isset( $_POST['buscar'])) {
	echo "Entro" . $_POST['busqueda'];
}

require '../view/simat-estudiantes.view.php';
?>