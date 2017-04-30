<?php session_start();
	require_once'../php/Conexion.php';
	if (isset($_SESSION['usuario'])) {
		header("Location: index.php");
	}


	/*Comprobamos methodo de envio*/
	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		$usuario = $_POST['usuario'];
		$pass = $_POST['pass'];
	
	
	$conexion = getConexion();
	if (!$conexion) {
		header("Location:loguin.php");
	}

	$sql = "SELECT * FROM usuarios WHERE nombre=:usuario AND password=:password";
	$statement = $conexion->prepare($sql);
	$statement->execute(
		array(
			':usuario' => $usuario,
			':password' => $pass 
			));
		$result= $statement->fetch();
		if ($result !== false) {
			$_SESSION['usuario'] = $usuario;
			header("Location: index.php");
		}
	}




 ?>
<?php require("../view/loguin.view.php") ?>