<?php 
	require_once '../php/Consultas.php';
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

		$desplazado = $_POST['despla'];
		$afrodescendiente = $_POST['afro'];
		$ojos = $_POST['ojos'];
		$genero = $_POST['genero'];
	
		print_r($_POST);

		
		registrarProductos(
			$documento,$primerNombre,$segundoNombre,$primerApellido,$segundoApellido,$celular,$telefono,$email,$fechaNaci,$lugarNaci,$direccion,$municipio,$estrato,$desplazado,$afrodescendiente,$ojos,$genero
			);
			
	}
 ?>
<?php require("../view/new_estudiantes-view.php") ?>
