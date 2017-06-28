<?php session_start();
echo "sin entrar";
	require_once'../php/Conexion.php';
	require_once'../php/funciones.php';
	#if (isset($_SESSION['usuario'])) {
	#	#header("Location: index.php");
	#}

	echo "sin entrar";
	/*Comprobamos methodo de envio*/
	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		echo "entro";
		$usuario = $_POST['usuario'];
		$pass = $_POST['pass'];
	
	
	$conexion = getConexion();
	if (!$conexion) {
		#header("Location:login.php");
		echo "erro conexion";
	}


		$result = shearcUserLogin($usuario,$pass,$conexion);

		if ($result !== false) {
			$_SESSION['usuario']['user'] = $usuario;

			$perfil = shearcPerfilUser($result['id'],$conexion);
			$_SESSION['usuario']['perfil'] = $perfil;
			var_dump($_SESSION);
			#header("Location: index.php");
		}
	}

 ?>
<?php require("../view/login.view.php") ?>