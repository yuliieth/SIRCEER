<?php session_start(); ?>
<?php  
require_once '../admin/config.php';
require_once '../php/funciones.php';
require_once '../php/Conexion.php';
validateSession();
?>
<?php 
$cn = getConexion($bd_config);
comprobarConexion($cn);

//*************PETICION POST********************
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset( $_POST['cargar'])) {
	#var_dump($_POST);

/*
*/
$documento = $_POST['documento'];
$matricula = $_POST['matricula'];
$semestre = $_POST['semestre'];
$promedio =  $_POST['promedio'];
$estado = 1;

$sql ="UPDATE detalle_semestre SET promedio=:promedio WHERE matricula_id =:matricula AND semestre_id=:semestre";
$ps = $cn->prepare($sql);
$ps->bindParam(':promedio',$promedio);
$ps->bindParam(':matricula',$matricula);
$ps->bindParam(':semestre',$semestre);
$ps->execute();


if ($ps!=false) {
	$sql ="UPDATE estudiante SET estado=:estado WHERE documento = :documento";
	$ps = $cn->prepare($sql);
	$ps->bindParam(':estado',$estado);
	$ps->bindParam(':documento',$documento);
	$ps->execute();

	header("Location: ".URL. "gestion/buscar-estudiantes.php?select=e");
}
}elseif ($_SERVER['REQUEST_METHOD'] == 'POST' && $_POST['renovar']) {
		#echo "Entro a renovar";
	#echo $_POST['matricula'];

	$fechaModificacion = date("yy,mm,dd");
	$anio = date("Y");
	$sql = "INSERT INTO semestre(id, semestre, periodo) VALUES (null,:semestre,:periodo)";
	$ps = $cn->prepare($sql);
	$ps->bindParam(':semestre',$_POST['semestre']);
	$ps->bindParam(':periodo',$_POST['periodo']);
	$ps->execute();

	$sqlGetiD = "select id FROM semestre ORDER BY id DESC LIMIT 1";
	$ps = $cn->prepare($sqlGetiD);
	$ps->execute();
	$semestre_id = $ps->fetch();
	
	#Ahora si insertamos en detalle_semestre
	$sql = "INSERT INTO detalle_semestre(id, matricula_id, semestre_id, anio, ultima_modificacion) VALUES (null,:matricula,:semestre,:anio,:fechaModificacion)";
	$ps = $cn->prepare($sql);
	$ps->bindParam(':matricula',$_POST['matricula']);
	$ps->bindParam(':semestre',$semestre_id['id']);
	$ps->bindParam(':anio',$anio);
	$ps->bindParam(':fechaModificacion',$fechaModificacion);
	$ps->execute();

	#Cambiarle de estado academico al estudainte luego de que su matricula ha sido renovada
	#Actualizar el estado a de nuevo sin gestionar, esto por que inicia un nuevo semestre

	header("Location: ".URL. "gestion/buscar-estudiantes.php?select=e");
}
//END PETICION POST
else
{
#Necesidades:
/*
1. El estudiante a mostrar (Ya esta seleccionado).
2. Frm para diligencias la tabla semestre.
3. Traer el programa y la institucion a la que pertenece el estudiante
4. Finalmente con estos datos hacer un insert para "evaluacion_semestral"
*/
$documento = cleanData($_GET['id']);
#echo "$documento";
$matricula = getMatriculaEstudiante($documento,$cn);
$datosEstudiante = getDataAllEstudent($matricula,$cn);
}

?>

<?php require '../view/gestionar-estudiante.view.php'?>