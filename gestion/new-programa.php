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
		"nombre","codigo_snies","jornada","nivel_academico","universidad","valor_semestre"
		);
	#var_dump($parameters);
	#echo "string";
	$errores = validarErrores($parameters,$errores);
	#var_dump($errores);


	if (empty($errores)) {
		$enviado = true;



		$codigo_snies = $_POST['codigo_snies'];
		$nombre = $_POST['nombre'];
		$semestres = $_POST['semestres'];
		$valor_semestre = $_POST['valor_semestre'];
		$nivel_academico = $_POST['nivel_academico'];
		$universidad = $_POST['universidad'];
		$jornada = $_POST['jornada'];
		
$estado_programa = saveProgram(
	$codigo_snies,$nombre,$semestres,$valor_semestre,$nivel_academico,$universidad,$jornada,$cn
	);


	if ($estado_programa) {
		?>
			<script type="text/javascript">
				window.location="<?php echo URL ?>gestion/new-programa.php?select=p";
			</script>
		<?php
	}

}



}
?>
<?php include '../view/new-programa.view.php' ?>