<?php session_start(); ?>
<?php 	require_once '../admin/config.php';
require_once '../php/funciones.php';
require_once '../php/Conexion.php';
validateSession();
$cn = getConexion($bd_config);
comprobarConexion($cn);
$allInstitutes = getAllEntity("planteles_educativos",$cn);
$numInstitutes = getTotalObjects($bd_config);
$enviado = "";
if (isset($_POST['submit'])) {

	$errores = "";
	$parameters = array(
		"documento","primer-nombre","segundo-nombre","primer-apellido","segundo-apellido","direccion","municipio","celular","telefono","email","fecha-naci","lugar-naci","estrato","despla","afro","ojos","genero"
		);
	#var_dump($parameters);
	#echo "string";
	$errores = validarErrores($parameters,$errores);
	#var_dump($errores);


	if (empty($errores)) {
		$enviado = true;



		$documento = $_POST['documento'];
		
		$primerNombre = $_POST['primer-nombre'];
		
		$segundoNombre = $_POST['segundo-nombre'];

		$primerApellido = $_POST['primer-apellido'];

		$segundoApellido = $_POST['segundo-apellido'];
		
		$direccion = $_POST['direccion'];
		$municipio = $_POST['municipio'];
	
		$celular = $_POST['celular'];
		$telefono = $_POST['telefono'];
		
		$email = $_POST['email'];
		$fechaNaci = $_POST['fecha-naci'];

		$lugarNaci = $_POST['lugar-naci'];
	
		$estrato = $_POST['estrato'];

		$desplazado = $_POST['despla'];
		$afrodescendiente = $_POST['afro'];
		$ojos = $_POST['ojos'];
		$genero = $_POST['genero'];
		$institute = $_POST['institute'];
		$fecha_registro = date("Y");

saveStudent(
	$documento,$primerNombre,$segundoNombre,$primerApellido,$segundoApellido,$celular,$telefono,$email,$fechaNaci,$lugarNaci,$direccion,$municipio,$estrato,$desplazado,$afrodescendiente,$ojos,$genero, $fecha_registro,$institute,$bd_config
	);
}



}
?>
<?php require("../view/new-estudiante.view.php") ?>

