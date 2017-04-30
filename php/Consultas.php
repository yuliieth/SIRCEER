<?php 
	require_once'Conexion.php';
		function registrarProductos
		(
			$documento,$primerNombre,
			$segundoNombre,$primerApellido,
			$segundoApellido,$celular,
			$telefono,$email,$fechaNaci,
			$lugarNaci,$direccion,
			$municipio,$estrato,$desplazado,
			$afro,$ojos
			)
		{
			echo "Entro a registrar";
			
			$conexion = getConexion();
			if (!$conexion) {
				echo "Error en conexion";
			}else{

			try {
			var_dump($conexion);
			$sql = ("INSERT INTO estudiantes values(null,:documento,:primer_nombre,:segundo_nombre,:primer_apellido,:segundo_apellido,:cel_contacto,:tel_contacto,:email,:fecha_nacimiento,:lugar_naci,:direccion,:municipio,:estrato,:desplazado,:afrodescendiente,:ojos)"
				);

			$statement = $conexion->prepare($sql);

					 $statement->bindParam( ':documento' , $documento);
					 $statement->bindParam( ':primer_nombre' , $primerNombre);
					 $statement->bindParam( ':segundo_nombre' , $segundoNombre);
					 $statement->bindParam( ':primer_apellido' , $primerApellido);
					 $statement->bindParam( ':segundo_apellido' , $segundoApellido);
					 $statement->bindParam( ':cel_contacto' , $celular);
					 $statement->bindParam( ':tel_contacto' , $telefono);
					 $statement->bindParam( ':email' , $email);
					 $statement->bindParam( ':fecha_nacimiento' , $fechaNaci);
					 $statement->bindParam( ':lugar_naci' , $lugarNaci);
					 $statement->bindParam( ':direccion' , $direccion);
					 $statement->bindParam( ':municipio' , $municipio);
					 $statement->bindParam( ':estrato' , $estrato);
					 $statement->bindParam( ':desplazado' , $desplazado);
					 $statement->bindParam( ':afrodescendiente' , $afro);
					 $statement->bindParam( ':ojos' , $ojos);

			 $result= $statement->execute();
			echo "Antes del fetch";
			//$result->fetchAll();
			//$resultado = $statement->fetchAll();
			var_dump($result);

			} catch (Exception $e) {
				echo "Linea de error: ".$e->getMessage();	
			}
			echo "ejecuto el metodo";
		}
	  
	}

 ?>