<?php session_start(); ?>
<?php 	require_once '../admin/config.php';
require_once '../php/Conexion.php';
require_once '../php/funciones.php';
#validateSession();
$cn = getConexion($bd_config);
comprobarConexion($cn);
$municipios = getMuniResi($cn);
$alianzas = getAllSubject('alianzas',$cn);
$enviado = "";
if (isset($_POST['submit'])) {

	$errores = "";
	$parameters = array(
		"nombre"
		);

	#var_dump($parameters);
	#echo "string";
	$errores = validarErrores($parameters,$errores);
	#var_dump($errores);


	if (empty($errores)) {
		$enviado = true;
		
		$nombre = $_POST['nombre'];
		$telefono = $_POST['telefono'];
		$email = $_POST['email'];
		$direccion = $_POST['direccion'];
		$municipio = $_POST['municipio'];
		$alianza = $_POST['alianza'];
		
$estado_universidad = saveUniversidad(
	$nombre,$telefono,$email,$direccion,$municipio,$alianza,$cn
	);



	if ($estado_universidad) {
		?> 
			<script type="text/javascript">
				window.location="<?php echo URL ?>gestion/new-universidad.php?select=u";
			</script>
		<?php
	}else{
		?> 
			<script type="text/javascript">
				window.location="<?php echo URL ?>gestion/errorIn.php";
			</script>
		<?php
	}

}



}
?>
<?php include '../view/new-universidad.view.php' ?>