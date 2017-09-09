<?php session_start(); ?>
<?php 	require_once '../admin/config.php';
require_once '../php/funciones.php';
require_once '../php/Conexion.php';
validateSession();
$cn = getConexion($bd_config);
comprobarConexion($cn);
$tipoDocumento = getTiposDocumentos($cn);
$tipos_sangre = getTiposSangre($cn);
$munis_naci = getMunicipios($cn);
$munis_resi = getMunicipios($cn);
$enviado = "";
if (isset($_POST['submit'])) {
	var_dump($_POST);
	$errores = "";
	$parameters = array(
		"tipo_documento","documento","tipo_sangre","primer_nombre","segundo_nombre","primer_apellido","segundo_apellido","telefono","email","fecha_naci","edad","muni_naci","dire_resi","barrio_resi","muni_resi","estrato","zona","eps","desplazado","afro","ojos","genero","victima_conflicto","discapacidades","situacion_periodo_anterior","grado"
		);
	#var_dump($parameters);
	#echo "string";
	$errores = validarErrores($parameters,$errores);
	#var_dump($errores);
	if (empty($errores)) {
		$enviado = true;
		#Obtenemos los valores de los campos en el formulario
		$tipo_documento = $_POST['tipo_documento'];
		$documento = $_POST['documento'];
		$tipo_sangre = $_POST['tipo_sangre'];
		$primer_nombre = $_POST['primer_nombre'];
		$segundo_nombre = $_POST['segundo_nombre'];
		$primer_apellido = $_POST['primer_apellido'];
		$segundo_apellido = $_POST['segundo_apellido'];
		$telefono = $_POST['telefono'];
		$email = $_POST['email'];
		$fecha_naci = $_POST['fecha_naci'];
		$edad = $_POST['edad'];
		$muni_naci = $_POST['muni_naci'];
		$dire_resi = $_POST['dire_resi'];
		$barrio_resi = $_POST['barrio_resi'];
		$muni_resi = $_POST['muni_resi'];
		$estrato = $_POST['estrato'];
		$zona = $_POST['zona'];
		$eps = $_POST['eps'];
		$desplazado = $_POST['desplazado'];
		$afro = $_POST['afro'];
		$ojos = $_POST['ojos'];
		$genero = $_POST['genero'];
		#$victima_conflicto = ($_POST['victima_conflicto'] == 'si') ? (boolean) 1 : (boolean) 0 ; ;
		$victima_conflicto = $_POST['victima_conflicto'];
		$discapacidades = $_POST['discapacidades'];
		$situacion_periodo_anterior = $_POST['situacion_periodo_anterior'];
		$grado = $_POST['grado'];
		$estado = "0";
		$observacion = $_POST['observacion'];
		#28 parametros
		#var_dump($estado);
		#var_dump($victima_conflicto);
saveStudent(
	$tipo_documento,$documento,$tipo_sangre,$primer_nombre,
	$segundo_nombre,$primer_apellido,$segundo_apellido,
	$telefono,$email,$fecha_naci,
	$edad,$muni_naci,$dire_resi,
	$barrio_resi,$muni_resi,$estrato,
	$zona,$eps,$desplazado,
	$afro,$ojos,$genero,
	$victima_conflicto,$discapacidades,$situacion_periodo_anterior,
	$grado,$estado,$observacion,
	$cn
	#se pasan 28 parametro (conexion)
	);
}



}
?>
<?php require("../view/new-estudiante.view.php") ?>

