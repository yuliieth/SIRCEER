<?php session_start(); ?>
<?php require '../php/Conexion.php' ?>
<?php require '../php/funciones.php' ?>
<?php validateSession(); ?>
<?php
$cn = getConexion();
comprobarConexion($cn);
$enviado = false;
if ($_SERVER['REQUEST_METHOD'] == 'POST') 
{
	print_r($_POST);
	$id = cleanData($_POST['id']);
	$nombre = cleanData($_POST['nombre']);
	$codigo = cleanData($_POST['codigo']);
	$telefono = cleanData($_POST['telefono']);
	$municipio = cleanData($_POST['municipio']);
	$email = cleanData($_POST['email']);
	$direccion = cleanData($_POST['direccion']);

	$sql = 
	"UPDATE 
	planteles_educativos SET nombre=:nombre,codigo=:codigo,telefono=:telefono,municipio=:municipio,email=:email,direccion=:direccion WHERE id=:id";
	$ps=$cn->prepare($sql);
	$ps->bindParam(":nombre",$nombre);
	$ps->bindParam(":codigo",$codigo);
	$ps->bindParam(":telefono",$telefono);
	$ps->bindParam(":municipio",$municipio);
	$ps->bindParam(":email",$email);
	$ps->bindParam(":direccion",$direccion);
	$ps->bindParam(":id",$id);
	$ps->execute();
	

	// echo a message to say the UPDATE succeeded
    echo $ps->rowCount() . " records UPDATED successfully";

    header("Location: buscar-institucion.php?select=i");
    $enviado = true;
}else
{
	#Crear funcion para limpiar id
	$id_insti = $_GET['id'];
	if (empty($id_insti)) {
		header("Location:error.php");
	}
	$result = getSubjectById("planteles_educativos",$id_insti,$cn);
		#var_dump($result);

}
?>

<?php require '../view/editar-institucion.view.php' ?>