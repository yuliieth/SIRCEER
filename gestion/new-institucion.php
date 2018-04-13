<?php session_start(); ?>
<?php 	
require_once '../admin/config.php';
require_once '../php/funciones.php';
require_once '../php/Conexion.php';
validateSession();
$cn = getConexion($bd_config);
comprobarConexion($cn);

$sectores = getAllSubject('sectores',$cn);
$municipios = getAllSubject('municipios',$cn);


$enviado = "";
if (isset($_POST['submit'])) {
	#echo "entro post";
	#var_dump($_POST);
	$errores = "";
	$parameters = array(
		"nombre","calendario","dane"
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
		$sector = $_POST['sector'];
		$municipio = $_POST['municipio'];
		
		

$estado_institucion = saveInstitucion(
	$nombre,
	$telefono,
	$siglas,
	$calendario,
	$dane,
	$sector,
	$municipio,
	$cn
	);

	
	if ($estado_institucion) {
		?>
			<script type="text/javascript">
				window.location = "<?php echo URL ?>gestion/new-institucion.php?select=i"
			</script>
		<?php
	}

}



}
?>

<?php require("../view/new-institucion.view.php") ?>
