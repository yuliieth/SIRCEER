<?php session_start(); ?>
<?php require '../php/Conexion.php' ?>
<?php require '../php/funciones.php' ?>
<?php require '../admin/config.php' ?>
<?php validateSession(); ?>
<?php
$cn = getConexion($bd_config);
comprobarConexion($cn);
$enviado = false;
if ($_SERVER['REQUEST_METHOD'] == 'POST') 
{
	#print_r($_POST);
	$id = cleanData($_POST['id']);
	$nombre = cleanData($_POST['nombre']);
	$codigo_snies = cleanData($_POST['codigo_snies']);
	$num_semestres = cleanData($_POST['num_semestres']);
	$num_creditos = cleanData($_POST['num_creditos']);
	$nivel_academico = cleanData($_POST['nivel_academico']);

	$sql = 
	"UPDATE 
	programas SET nombre=:nombre,codigo_snies=:codigo_snies,num_semestres=:num_semestres,num_creditos=:num_creditos,nivel_academico=:nivel_academico WHERE id=:id";
	$ps=$cn->prepare($sql);
	$ps->bindParam(":nombre",$nombre);
	$ps->bindParam(":codigo_snies",$codigo_snies);
	$ps->bindParam(":num_semestres",$num_semestres);
	$ps->bindParam(":num_creditos",$num_creditos);
	$ps->bindParam(":nivel_academico",$nivel_academico);
	$ps->bindParam(":id",$id);
	$ps->execute();
	

	// echo a message to say the UPDATE succeeded
    echo $ps->rowCount() . " records UPDATED successfully";

    header("Location: buscar-programa.php?select=p");
    $enviado = true;
}else
{
	#Crear funcion para limpiar id
	$id_pro = $_GET['id'];
	if (empty($id_pro)) {
		header("Location:error.php");
	}
	$result = getSubjectById("programas",$id_pro,$cn);
		#var_dump($result);

}
?>

<?php require '../view/editar-programa.view.php?select=p' ?>