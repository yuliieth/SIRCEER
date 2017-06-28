<?php require '../php/Conexion.php' ?>
<?php require '../php/funciones.php' ?>


<?php
$cn = getConexion();
comprobarConexion($cn);

if ($_SERVER['REQUEST_METHOD'] == 'POST') 
{
	echo $_POST['id'];
	echo $_POST['nombre'];
	echo $_POST['usuario'];
	echo $_POST['password'];
	echo $_POST['email'];
	echo $_POST['perfil'];
	
}else
{
	#Crear funcion para limpiar id
	$id_user = $_GET['id'];
	if (empty($id_user)) {
		header("Location:principal-admin.php");
	}
		$result = getSubjectsById("usuarios",$id_user,$cn);
		#var_dump($result);
	
}
?>

<?php require '../view/editar-user.view.php' ?>