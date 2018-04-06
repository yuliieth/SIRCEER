<?php session_start(); ?>
<?php require '../php/Conexion.php' ?>
<?php require '../php/funciones.php' ?>
<?php require '../admin/config.php' ?>
<?php validateSession(); ?>
<?php
$cn = getConexion($bd_config);
comprobarConexion($cn);

$municipios = getMuniResi($cn);


$enviado = false;
if ($_SERVER['REQUEST_METHOD'] == 'POST') 
{
	#print_r($_POST);
	$documento = cleanData($_POST['documento']);
	$primer_nombre = cleanData($_POST['primer_nombre']);
	$segundo_nombre = cleanData($_POST['segundo_nombre']);
	$primer_apellido = cleanData($_POST['primer_apellido']);
	$segundo_apellido = cleanData($_POST['segundo_apellido']);
	$dire_resi = cleanData($_POST['dire_resi']);
	$muni_resi = cleanData($_POST['muni_resi']);
	$estrato = cleanData($_POST['estrato']);
	$tel_contacto = cleanData($_POST['tel_contacto']);
	$email = cleanData($_POST['email']);
	$fecha_naci = cleanData($_POST['fecha_naci']);
	$edad = cleanData($_POST['edad']);
	$muni_naci = cleanData($_POST['muni_naci']);
	$zona = cleanData($_POST['zona']);
	$situacion = cleanData($_POST['situacion']);
	$tipo_poblacion = cleanData($_POST['tipo_poblacion']);
	$situacion_academica = cleanData($_POST['situacion_academica']);
	$ojos = cleanData($_POST['ojos']);
	#$genero = cleanData($_POST['genero']);
	#$tipo_doc = cleanData($_POST['tipo_doc']);

	$sqlEstu = 
	"UPDATE 
	estudiante SET 
	primer_nombre=:primer_nombre,
	segundo_nombre=:segundo_nombre,
	primer_apellido=:primer_apellido,
	segundo_apellido=:segundo_apellido,
	tel_contacto=:tel_contacto,
	email=:email,
	fecha_naci=:fecha_naci,
	edad=:edad,
	municipio_naci_id=:muni_naci,
	direccion_residencia=:dire_resi,
	municipio_resi_id=:muni_resi,
	estrato=:estrato,
	zona=:zona,
	 situacion=:situacion,
	 tipo_poblacion=:tipo_poblacion,
	 situacion_academica=:situacion_academica,
	 ojos=:ojos WHERE 
	 documento=:documento";

	$ps=$cn->prepare($sqlEstu);
	$ps->bindParam(":primer_nombre",$primer_nombre);
	$ps->bindParam(":segundo_nombre",$segundo_nombre);
	$ps->bindParam(":primer_apellido",$primer_apellido);
	$ps->bindParam(":segundo_apellido",$segundo_apellido);
	$ps->bindParam(":tel_contacto",$tel_contacto);
	$ps->bindParam(":email",$email);
	$ps->bindParam(":fecha_naci",$fecha_naci);
	$ps->bindParam(":edad",$edad);
	$ps->bindParam(":muni_naci",$muni_naci);
	$ps->bindParam(":dire_resi",$dire_resi);
	$ps->bindParam(":muni_resi",$muni_resi);
	$ps->bindParam(":estrato",$estrato);
	$ps->bindParam(":zona",$zona);
	$ps->bindParam(":situacion",$situacion);
	$ps->bindParam(":tipo_poblacion",$tipo_poblacion);
	$ps->bindParam(":situacion_academica",$situacion_academica);
	$ps->bindParam(":ojos",$ojos);
	$ps->bindParam(":documento",$documento);
	$ps->execute();
	

	// echo a message to say the UPDATE succeeded
    #echo $ps->rowCount() . " records UPDATED successfully";

    header("Location:".URL."gestion/buscar-estudiantes.php?select=e");
    $enviado = true;
}else
{
	#Crear funcion para limpiar id
	$doc_estu = $_GET['id'];
	if (empty($doc_estu)) {
		header("Location:".URL."principal-admin.php");
		#echo "Id vacio";
	}
	$result = getSubjectByValue("estudiantes",$doc_estu,'documento',$cn);
	$situacionA = getSituacionAcademica($cn);
	$fuente = getFuenteRecurso($cn);
	$servicio_social = getServicioSocial($cn);
	$grados = getGrado($cn);
	$tipos_sangre = getTiposSangre($cn);
	$tipos_poblacion = getTipoPoblacion($cn);
	$generos = getGenero($cn);
	$discapacidades = getDiscapacidades($cn);
	$tipos_documento = getTipoDocumento($cn);
	$internados = getInternado($cn);
	$instituciones = getSedes($cn);
	$estratos = getEstrato($cn);
	$colores_ojos = getOjos($cn);
	$estudianteServicioSocial = getEstudianteServicioSocial($result['id'],$cn);

	#var_dump($result);
	#var_dump($estudianteServicioSocial);

}
?>

<?php require '../view/editar-estudiante.view.php' ?>