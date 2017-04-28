<?php 
	$errores = "";

	if (isset($_POST['submit'])) {
		$documento = $_POST['documento'];
		$primerNombre = $_POST['primer-nombre'];
		$segundoNombre = $_POST['segundo-nombre'];
		$primerApellido = $_POST['primer-apellido'];
		$segundoApellido = $_POST['segundo-apellido'];
		$direccion = $_POST['direccion'];
		$municipio = $_POST['municipio'];
		$celular = $_POST['celular'];
		$telefono = $_POST['telefono'];
		$email = $_POST['email'];
		$fechaNaci = $_POST['fecha-naci'];
		$lugarNaci = $_POST['lugar-naci'];
		$estrato = $_POST['estrato'];
<<<<<<< HEAD
		$desplazado = $_POST['despla'];
		$afrodescendiente = $_POST['afro'];
=======
		$desplazado = $_POST['desplazado'];
		$afrodescendiente = $_POST['afrodescendiente'];*/
>>>>>>> c8c48b8e1095d8ff7a05824e9c76052f80556a36
		$ojos = $_POST['ojos'];
	
		//print_r($_POST);

	}
 ?>
<?php require("../view/new_estudiantes-view.php") ?>
