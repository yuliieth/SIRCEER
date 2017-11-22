<?php session_start();
require_once '../php/Conexion.php';
require_once '../php/funciones.php';
require_once 'config.php';
validateSession();
$con = getConexion($bd_config);
comprobarConexion($con);
$statement = getAllUsers($con);



if (isset($_POST['enviar'])) {
	$nombre = $_POST['nombre'];
	$user = $_POST['usuario'];
	$pass = $_POST['password'];
	$email = $_POST['email'];
	$perfiles_id = $_POST['perfil'];

		#print_r($_POST);
		#inser on usuarios, and usuarios_perfiles
		#no vamos a utilizar query sino preparedStatement para aplicar seguridad
	$sql = "INSERT INTO usuarios (id,nombre_completo,username,password,email) values(null,:nombre,:usuario,:pass,:email)";
	$sql2 = "INSERT INTO usuarios_perfiles(id,perfiles_id,usuarios_id) values (null,:perfiles_id,:usuarios_id)";
	$sql3 = "SELECT id FROM usuarios ORDER BY id DESC LIMIT 1";

	$preparedStatement = $con->prepare($sql);
	$preparedStatement->execute(
		array(
			':nombre' => $nombre, 
			':usuario' => $user,
			':pass' => $pass,
			':email' => $email
			)
		);

	$preparedStatement2 = $con->prepare($sql3);
	$preparedStatement2->execute();
	
	$usuarios_id = $preparedStatement2->fetch()['id'];
	
		#var_dump($usuarios_id);
		#print_r($usuarios_id);

		#$usuarios_id = 5;
	$preparedStatement1 = $con->prepare($sql2);
	$preparedStatement1->execute(
		array(
			':perfiles_id' => $perfiles_id,
			':usuarios_id' => $usuarios_id 
			)
		);

	if ($sql2 != null && $sql != null && $sql3 != null) {
		header("Location: principal-admin.php");
	}else{?>
	<script>
		alert("Ocurrio un error en la insercion..");
	</script>
	<?php }

	
}?>

<?php require '../view/principal-admin.view.php'; ?>
