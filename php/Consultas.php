<?php 
	require_once'Conexion.php';
		function registrarProductos
		(
			$documento,$primerNombre,
			$segundoNombre,$primerApellido,
			$segundoApellido,$direccion,
			$municipio,$celular,
			$telefono,$email,
			$fechaNaci,$lugarNaci,
			$estrato,$desplazado,
			$afro,$ojos
			)
		{
			
			$conexion = getConexion();
			$sql = ("INSERT INTO estudiantes (
				documento,primer_nombre,primer_apellido,segundo_apellido,segundo_nombre,fecha_nacimiento,tel_contacto,cel_contacto,email,descendencia,estrato,ojos,condicion values (:documento,:primer_nombre,:primer_apellido,:segundo_apellido,:segundo_nombre,:fecha_nacimiento,:tel_contacto,:cel_contacto,:email,:descendencia,:estrato,:ojos,:condicion)
				)");

			$statement = $conexion->prepare($sql);
			$statement->execute(
				array(':documento' => $documento ,
					  ':primer_nombre' => $primerNombre,
					  ':primer_apellido' => $primerApellido,
					  ':segundo_apellido' => $segundoApellido,
					  ':segundo_nombre' => $segundoNombre,
					  ':fecha_nacimiento' => $fechaNaci,
					  ':tel_contacto' => $telefono,
					  ':cel_contacto' => $celular,
					  ':email' => $email,
					  ':descendencia' => $afro,
					  ':estrato' => $estrato,
					  ':ojos' => $ojos,
					  ':condicion' => $desplazado 
					));


			$resultado = $statement->fetchAll();
		}
	  
	

 ?>