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
	$telefono = cleanData($_POST['telefono']);
	$email = cleanData($_POST['email']);
	$direccion = cleanData($_POST['direccion']);

	$sql = 
	"UPDATE 
	institucion SET nombre=:nombre,telefono=:telefono,email=:email,direccion=:direccion WHERE id=:id";
	$ps=$cn->prepare($sql);
	$ps->bindParam(":nombre",$nombre);
	$ps->bindParam(":telefono",$telefono);
	$ps->bindParam(":email",$email);
	$ps->bindParam(":direccion",$direccion);
	$ps->bindParam(":id",$id);
	$ps->execute();
	

	// echo a message to say the UPDATE succeeded
    #echo $ps->rowCount() . " records UPDATED successfully";

    header("Location:".URL."gestion/buscar-institucion.php?select=i");
    $enviado = true;
}else
{
	#Crear funcion para limpiar id
	$id_insti = $_GET['id'];
	if (empty($id_insti)) {
		header("Location:error.php");
	}
	#echo $id_insti;
	$result = getSubjectById("institucion",$id_insti,'id',$cn);
		#var_dump($result);

}
?>

<?php require '../view/editar-institucion.view.php' ?>