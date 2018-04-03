<?php session_start(); ?>
<?php 	require_once '../admin/config.php';
require_once '../php/Conexion.php';
require_once '../php/funciones.php';
#validateSession();
$cn = getConexion($bd_config);
comprobarConexion($cn);
$municipios = getMuniResi($cn);
$enviado = "";
if (isset($_POST['submit'])) {

	$errores = "";
	$parameters = array(
		"nombre","telefono","municipio","email","direccion"
		);
	#var_dump($parameters);
	#echo "string";
	$errores = validarErrores($parameters,$errores);
	#var_dump($errores);


	if (empty($errores)) {
		$enviado = true;
		
		$nombre = $_POST['nombre'];
		#$codigo = $_POST['codigo'];
		$telefono = $_POST['telefono'];
		$municipio = $_POST['municipio'];
		$email = $_POST['email'];
		$direccion = $_POST['direccion'];
		
saveInstitu(
	$nombre,$telefono,$municipio,$email,$direccion,$cn
	);
}



}
?>
<?php include '../view/new-institucion.view.php' ?>