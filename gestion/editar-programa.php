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
	$snies = cleanData($_POST['snies']);
	$nombre = cleanData($_POST['nombre']);
	$num_semestres = cleanData($_POST['num_semestres']);
	$num_creditos = cleanData($_POST['num_creditos']);
	$nivel_academico = cleanData($_POST['nivel_academico']);

	$sql = 
	"UPDATE 
	programa SET nombre=:nombre,num_semestres=:num_semestres,num_creditos=:num_creditos,nivel_academico_id=:nivel_academico WHERE snies=:snies";
	$ps=$cn->prepare($sql);
	$ps->bindParam(":nombre",$nombre);
	$ps->bindParam(":num_semestres",$num_semestres);
	$ps->bindParam(":num_creditos",$num_creditos);
	$ps->bindParam(":nivel_academico",$nivel_academico);
	$ps->bindParam(":snies",$snies);
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
	$result = getSubjectById("programa",$id_pro,'snies',$cn);
		#var_dump($result);

}
?>

<?php require '../view/editar-programa.view.php' ?>