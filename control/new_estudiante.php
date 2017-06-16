
<?php 
	require_once '../php/Consultas.php';
	$errores = "";
	$enviado = "";

	if (isset($_POST['submit'])) {
		
		$documento = $_POST['documento'];
		if(empty($documento)){
			$errores .= "Por favor ingrese un documento</br>"; 
		}


		$primerNombre = $_POST['primer-nombre'];
		if(empty($primerNombre)){
			$errores .= "Por favor ingrese el primer nombre</br>"; 
		}


		$segundoNombre = $_POST['segundo-nombre'];
		if(empty($segundoNombre)){
			$errores .= "Por favor ingrese el segundo nombre</br>"; 
		}

		$primerApellido = $_POST['primer-apellido'];
		if(empty($primerApellido)){
			$errores .= "Por favor ingrese el primer apellido</br>"; 
		}

		$segundoApellido = $_POST['segundo-apellido'];
		if(empty($segundoApellido)){
			$errores .= "Por favor ingrese el segundo el apellido</br>"; 
		}

		$direccion = $_POST['direccion'];
		$municipio = $_POST['municipio'];
		

		$celular = $_POST['celular'];
		if(empty($celular)){
			$errores .= "Por favor ingrese el celular</br>"; 
		}

		$telefono = $_POST['telefono'];
		

		$email = $_POST['email'];
		if(empty($email)){
			$errores .= "Por favor ingrese un email</br>"; 
		}

		$fechaNaci = $_POST['fecha-naci'];
		if(empty($fechaNaci)){
			$errores .= "Por favor ingrese una fecha de nacimiento</br>"; 
		}

		$lugarNaci = $_POST['lugar-naci'];
		if(empty($lugarNaci)){
			$errores .= "Por favor ingrese un lugar de nacimiento</br>"; 
		}
		$estrato = $_POST['estrato'];
		if(empty($estrato)){
			$errores .= "Por favor ingrese un estrato</br>"; 
		}

		
		$desplazado = $_POST['despla'];
		$afrodescendiente = $_POST['afro'];
		$ojos = $_POST['ojos'];
		$genero = $_POST['genero'];
		$fecha_registro = date("Y");
		
		if (empty($errores)) {
			$enviado = true;
		}

		
		registrarProductos(
			$documento,$primerNombre,$segundoNombre,$primerApellido,$segundoApellido,$celular,$telefono,$email,$fechaNaci,$lugarNaci,$direccion,$municipio,$estrato,$desplazado,$afrodescendiente,$ojos,$genero, $fecha_registro
			);
			
	}
 ?>
<?php require("../view/new_estudiantes-view.php") ?>

