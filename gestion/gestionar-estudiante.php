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
}elseif ($_SERVER['REQUEST_METHOD'] == 'POST' && $_POST['matricular']) {

	var_dump($_POST);
	#obteniendo valores de la variable $_POST[]
	$documento = $_POST['documento'];
	$id_programa = $_POST['programa'];
	$periodo = $_POST['periodo'];

	#EN CASO DE QUE EL ESTUDIANTE NO ESTE MATRICULADO EN ALGUN P.E.S
	#PASOS:
	/*
	1. tener el id del estudiante.
	2. tener el id del programa.
	3. insert in matricula.
	4. obtener id de la matricula anterior.
	5. inser in semestre (Como es la primera matricula el semestre es 1=primero).
	6. obtener id semestre anterior
	7. insert in historial_academico_semestre
	*/


	$id_estudiante = getSubjectByValue('estudiantes',$documento,'documento',$cn);
	#var_dump($id_estudiante);
	$estado_matricula = saveMatricula($id_estudiante['id'],$id_programa,$cn);

	$id_matricula = $cn->lastInsertId();

	$estado_semestre = saveSemestre(1,$periodo,$cn);

	$id_semestre = $cn->lastInsertId();	

	$estado_historial_semestre = saveHistorialSemestre($id_semestre,$id_matricula,'null',$cn);


	if (!$estado_matricula || !$estado_semestre || !$estado_historial_semestre) {
		echo "<br>Ocurrio un error<br>";
		var_dump($estado_matricula);
		echo "<br>Semestre:<br>";
		var_dump($estado_semestre);
		echo "<br>Historial:<br>";
		var_dump($estado_historial_semestre);
	}else
	{
		echo "Sin errores";
	}




	#header("Location: ".URL. "gestion/buscar-estudiantes.php?select=e");
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
$datosEstudiante = getAllStudentRelations($documento,$cn);
#var_dump($datosEstudiante);
#echo "<br>***********<br>";
$matricula = getMatriculaEstudiante($documento,$cn);
$programas = getProgramas($cn);
var_dump($matricula);
}

?>

<?php require '../view/gestionar-estudiante.view.php'?>