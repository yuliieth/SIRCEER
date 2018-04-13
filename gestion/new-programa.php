<?php session_start(); ?>
<?php 	require_once '../admin/config.php';?>
<?php  require_once '../php/Conexion.php';?>
<?php  require_once '../php/funciones.php';
#validateSession();
$cn = getConexion($bd_config);
comprobarConexion($cn);
$niveles = getAllSubject('nivel_academico',$cn);
$universidades = getAllSubject('universidades',$cn);
#las anteriores pueden ser reemplazadas por esta
$jornadas = getAllSubject('jornadas',$cn);
$enviado = "";
if (isset($_POST['submit'])) {

	$errores = "";
	$parameters = array(
		"nombre","codigosnies","semestres","jornada","nivel-academico","institucion","valor_semestre"
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

		$valor_semestre = $_POST['valor_semestre'];

		$nivelAcademico = $_POST['nivel-academico'];
		$institucion = $_POST['institucion'];
		$jornada = $_POST['jornada'];
		
		
saveProgram(
	$codigosnies,$nombre,$semestres,$valor_semestre,$nivelAcademico,$institucion,$jornada,$cn
	);
}



}
?>
<?php include '../view/new-programa.view.php' ?>