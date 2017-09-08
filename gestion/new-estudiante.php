<?php session_start(); ?>
<?php 	require_once '../admin/config.php';
require_once '../php/funciones.php';
require_once '../php/Conexion.php';
validateSession();
$cn = getConexion($bd_config);
comprobarConexion($cn);
$allInstitutes = getAllEntity("instituto",$cn);
$numInstitutes = getTotalObjects($bd_config);
$instituciones = getInstituciones($cn);
$tipoDocumento = getTiposDocumentos($cn);

$enviado = "";
if (isset($_POST['submit'])) {

	$errores = "";
	$parameters = array(
		"documento","nombres","apellidos","direccion","municipio","celular","telefono","email","fecha-naci","edad","lugar-naci","estrato","despla","afro","ojos","genero","tipo_documento"
		);
	#var_dump($parameters);
	#echo "string";
	$errores = validarErrores($parameters,$errores);
	#var_dump($errores);


	if (empty($errores)) {
		$enviado = true;



		$documento = $_POST['documento'];
		
		$nombres = $_POST['nombres'];

		$apellidos = $_POST['apellidos'];
		
		$direccion = $_POST['direccion'];
		$municipio = $_POST['municipio'];
	
		$celular = $_POST['celular'];
		$telefono = $_POST['telefono'];
		
		$email = $_POST['email'];
		$fechaNaci = $_POST['fecha-naci'];
		$edad = $_POST['edad'];
		$lugarNaci = $_POST['lugar-naci'];
	
		$estrato = $_POST['estrato'];

		$desplazado = $_POST['despla'];
		$afrodescendiente = $_POST['afro'];
		$ojos = $_POST['ojos'];
		$genero = $_POST['genero'];
		$fecha_registro = date("Y");
		$tipo_documento = $_POST['tipo_documento'];

saveStudent(
	$documento,$nombres,$apellidos,$celular,$telefono,$email,$fechaNaci,$edad,$lugarNaci,$direccion,$municipio,$estrato,$desplazado,$afrodescendiente,$ojos,$genero, $fecha_registro,$tipo_documento,$bd_config
	);
}



}
?>
<?php require("../view/new-estudiante.view.php") ?>

