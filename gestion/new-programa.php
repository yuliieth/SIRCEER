<?php session_start(); ?>
    <?php
    header("Cache-Control: no-cache, must-revalidate"); // HTTP/1.1
    header("Expires: Sat, 1 Jul 2000 05:00:00 GMT"); // Fecha en el pasado
    ?>
<?php  
require_once '../php/funciones.php';
validateSession();

$enviado = "";
if (isset($_POST['submit'])) {

	$errores = "";
	$parameters = array(
		"nombre","codigosnies","semestres","creditos","nivel-academico"
		);
	#var_dump($parameters);
	#echo "string";
	$errores = validarErrores($parameters,$errores);
	#var_dump($errores);


	if (empty($errores)) {
		$enviado = true;



		$nombre = $_POST['nombre'];
		
		$codigosnies = $_POST['codigosnies'];
		
		$semestres = $_POST['semestres'];

		$creditos = $_POST['creditos'];

		$nivelAcademico = $_POST['nivel-academico'];
		
saveProgram(
	$nombre,$codigosnies,$semestres,$creditos,$nivelAcademico
	);
}



}
?>
<?php include '../view/new-institucion.view.php' ?>