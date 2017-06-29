<?php session_start();
	require_once'../php/Conexion.php';
	require_once'../php/funciones.php';
	if (isset($_SESSION['usuario'])) {
		header("Location: ../gestion/principal-gestion.php");
	}


	/*Comprobamos methodo de envio*/
	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		$usuario = strtolower( $_POST['usuario']);
		$pass = $_POST['pass'];
	
	
	$conexion = getConexion();
	if (!$conexion) {
		echo "Error en conexion";
		header("Location:login.php");
	}


		$result = shearcUserLogin($usuario,$pass,$conexion);
		#echo "Valor de result:";
		#var_dump($result);
		if ($result !== false) {
			$_SESSION['usuario']['user'] = $usuario;

			$perfil = shearcPerfilUser($result['id'],$conexion);
			$_SESSION['usuario']['perfil'] = $perfil;
			#var_dump($_SESSION);
			if ($_SESSION['usuario']['perfil'] == 1 && $_SESSION['usuario']['user'] == "admin") {
				header("Location: ../admin/principal-admin.php");
			}else
			{
				
				header("Location: ../gestion/principal-gestion.php");

			}
		}
	}

 ?>
<?php require("../view/login.view.php") ?>