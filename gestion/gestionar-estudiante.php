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
EN EL CASO DE CARGA DE PROMEDIO
REQUISITOS:
1. Id matricula
2. Id semestre
3. Valor promedio
4. Insertar historial_academico_semestre
*/
$documento = $_POST['documento'];
$matricula_id = $_POST['matricula'];
$semestre_id = $_POST['semestre'];
#echo "$semestre_id";
$promedio =  $_POST['promedio'];
$estado = 1;

$fecha_modificaion = date("YY-mm-dd");

$sql ="UPDATE historial_academico_semestre SET promedio=:promedio,fecha_modificaion=:fecha_modificaion WHERE   historial_academico_semestre.matricula_id=:matricula_id AND historial_academico_semestre.semestre_id=:semestre_id";
$ps = $cn->prepare($sql);
$ps->bindParam(':promedio',$promedio);
$ps->bindParam(':fecha_modificaion',$fecha_modificaion);
$ps->bindParam(':matricula_id',$matricula_id);
$ps->bindParam(':semestre_id',$semestre_id);

$result = $ps->execute();


if ($result != false) {
	?>
		<script type="text/javascript">
			window.location="<?php echo URL ?>gestion/buscar-estudiantes.php?select=e";
		</script>
	<?php
	
}
}elseif ($_SERVER['REQUEST_METHOD'] == 'POST' && $_POST['matricular']) {
	$operacion = $_POST['operacion'];

	switch ($operacion) {
	
		case 'insert':
	#var_dump($_POST);
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
		?>
			<script type="text/javascript">
				window.location = "<?php echo URL ?>gestion/buscar-estudiantes.php?select=e";
			</script>
		<?php
	}
	
			break;

		case 'update':
			
		#Objetivo:
		#Update historial_academico_semestre para registrar nuevo semestre consecutivo

		#Necesario: Id matricula (POST)
		#Insert semestre (semestre y periodo=(POST))
		#Id semestre
		#Insertar historial_academico_semestre

		$id_matricula = $_POST['matricula'];
		$semestre = $_POST['semestre'];
		$periodo = $_POST['periodo'];

		$estado = "NULL";
		$anio = Date("YY");
		$fecha_modificaion = Date("YY-mm-dd");

		$sql_semestre = "INSERT INTO semestre(semestre, periodo) VALUES (:semestre,:periodo)";

		$ps = $cn->prepare($sql_semestre);
		$ps->bindParam(':semestre',$semestre);
		$ps->bindParam(':periodo',$periodo);

		$result_semestre = $ps->execute();
		#var_dump($result_semestre);
		$id_semestre = $cn->lastInsertId();
		#echo "<br>ID semestre: $id_semestre";

		#Insertando historail_academico_semestre
		$sql_historial_semestre = "INSERT INTO historial_academico_semestre( anio, fecha_modificaion, estado, matricula_id, semestre_id) VALUES (:anio,:fecha_modificaion,:estado,:matricula_id,:semestre_id)";

		$ps = $cn->prepare($sql_historial_semestre);
		
		$ps->bindParam(':anio',$anio);
		$ps->bindParam(':fecha_modificaion',$fecha_modificaion);
		$ps->bindParam(':estado',$estado);
		$ps->bindParam(':matricula_id',$id_matricula);
		$ps->bindParam(':semestre_id',$id_semestre);

		$result_historial = $ps->execute();

		#var_dump($result_historial);

		?>
			<script type="text/javascript">
				window.location = "<?php echo URL ?>gestion/buscar-estudiantes.php?select=e";
			</script>
		<?php
		
			break;
		
		default:
			# code...
			break;

	}#End swith

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