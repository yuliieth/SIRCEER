<?php 
require '../php/Conexion.php';
$con = getConexion();
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
		$sql2 = "INSERT INTO usuarios_perfiles values (:usuarios_id,:perfiles_id)";
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
				':usuarios_id' => $usuarios_id, 
				':perfiles_id' => $perfiles_id
				)
			);

		
	}
?>
<?php  require '../view/principal-admin.view.php'; ?>
