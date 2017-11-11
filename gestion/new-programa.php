<?php session_start(); ?>
<?php 	require_once '../admin/config.php';?>
<?php  require_once '../php/Conexion.php';?>
<?php  require_once '../php/funciones.php';
validateSession();
$cn = getConexion($bd_config);
comprobarConexion($cn);
$niveles = getNivelesAcademicos($cn);
$instituciones = getInstituciones($cn);
#las anteriores pueden ser reemplazadas por esta
$alianzas = getAllSubject('alianza',$cn);
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
		$institucion = $_POST['institucion'];
		
		
saveProgram(
	$nombre,$codigosnies,$semestres,$creditos,$nivelAcademico,$institucion,$cn
	);
}



}
?>
<?php include '../view/new-programa.view.php' ?>