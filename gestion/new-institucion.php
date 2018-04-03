<?php session_start(); ?>
<?php 	
require_once '../admin/config.php';
require_once '../php/funciones.php';
require_once '../php/Conexion.php';
#validateSession();
$cn = getConexion($bd_config);
comprobarConexion($cn);

$instituciones = getAllSubject('instituciones',$cn);

$enviado = "";
if (isset($_POST['submit'])) {
	#echo "entro post";
	var_dump($_POST);
	$errores = "";
	$parameters = array(
		"nombre","fecha_ini","fecha_final","cupos"
		);
	#var_dump($parameters);
	#echo "string";
	$errores = validarErrores($parameters,$errores);
	#var_dump($errores);
	if (empty($errores)) {
		$enviado = true;
		#Obtenemos los valores de los campos en el formulario
		$nombre = $_POST['nombre'];
		$telefono = $_POST['telefono'];
		$siglas = $_POST['siglas'];
		$calendario = $_POST['calendario'];
		$dane = $_POST['dane'];
		

saveColegio(
	$nombre,
$telefono,
$siglas,
$calendario,
$dane,$cn
	);
}



}
?>

<?php require("../view/new-alianza.view.php") ?>
