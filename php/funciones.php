<?php function validateSession()
{
	if (!isset($_SESSION['usuario'])) {
		header("Location: http://localhost/DesarrolloWeb/PracticaPHP/SRCEER/php/login.php");
	}
}

function shearcPerfilUser($id_user,$con)
{
	$result = getUserById($id_user,$con);
	$id_user = $result['id_perfil'];
	return $id_user;
}

function shearcUserLogin($usuario,$pass,$conexion)
{
	#echo "$usuario $pass";
	$sql = "SELECT * FROM usuarios WHERE username=:usuario AND password=:password";
	$statement = $conexion->prepare($sql);
	$statement->execute(
		array(
			':usuario' => $usuario,
			':password' => $pass 
			));
	$result= $statement->fetch();
	#var_dump($result);
	return $result;

}

function cleanData($data)
{
	$data = trim($data);
	$data = htmlspecialchars($data);
	$data = stripcslashes($data);
	return $data;
}


function comprobarConexion($con)
{

	if (!$con) {
		echo "Ocurrio un error en la Conexion";
	}
}




function getUserById($id,$con)
{
		//Devuelve el user con sus relaciones
	$sql = "SELECT usuarios.id AS id_usuarios,nombre_completo,username,password,email,nombre,perfiles.id AS id_perfil FROM usuarios INNER JOIN usuarios_perfiles ON usuarios.id=usuarios_perfiles.usuarios_id INNER JOIN perfiles ON  perfiles.id=usuarios_perfiles.perfiles_id WHERE usuarios.id=$id";
	$ps = $con->prepare($sql);
	$ps->execute();
	$resul = $ps->fetch();
	return $resul;
	
}


function getAllUsers($con)
{
		//Devuelve todos los user con sus relaciones
	$sql = "SELECT usuarios.id AS id_usuarios,nombre_completo,username,password,email,nombre FROM usuarios INNER JOIN usuarios_perfiles ON usuarios.id=usuarios_perfiles.usuarios_id INNER JOIN perfiles ON  perfiles.id=usuarios_perfiles.perfiles_id";
	return 	$con->query($sql);
	#var_dump($sta);
}

function getAllSubjects($table,$con)
{
	$sql = "SELECT * FROM $table";
	$ps = $con->prepare($sql);
	$ps->execute();
	$resul = $ps->fetchAll();
	return $resul;

}

function getSubjectById($table,$id,$con)
{
	$sql = "SELECT * FROM $table WHERE id=$id LIMIT 1";
	$ps = $con->prepare($sql);
	$ps->execute();
	$resul = $ps->fetch();
	#var_dump($resul);
	return $resul;

}

function eliminarUsuario($con,$id)
{
	$sql = "DELETE FROM usuarios WHERE id=$id";
	$stm = $con->prepare($sql);
	$stm->execute();
}


function validarErrores($parameter,$errores)
{
	foreach ($parameter as $campo) {
		if (!isset($_POST[$campo]) ||  empty($_POST[$campo])) {
			$errores .= " Ingrese el campo " . $campo . "</br>";
		}
	}
	return $errores;
}



function saveInstitu
		(
			$nombre,
			$codigo,
			$telefono,
			$municipio,
			$email,
			$direccion
			)
		{
			$conexion = getConexion();
			if (!$conexion) {
				echo "Error en conexion";
			}else{
			try {
			//var_dump($conexion);
			$sql = ("INSERT INTO planteles_educativos  (id, nombre,codigo,telefono,municipio,email,direccion) values(null,:nombre,:codigo,:telefono,:municipio,:email,:direccion)"
				);
			$statement = $conexion->prepare($sql);
					 $statement->bindParam( ':nombre' , $nombre);
					 $statement->bindParam( ':codigo' , $codigo);
					 $statement->bindParam( ':telefono' , $telefono);
					 $statement->bindParam( ':municipio' , $municipio);
					 $statement->bindParam( ':email' , $email);
					 $statement->bindParam( ':direccion' , $direccion);
			 $result= $statement->execute();
			if ($result !== null) {
				header("Location: ../gestion/new-institucion.php");
			}
			} catch (Exception $e) {
				echo "Linea de error: ".$e->getMessage();	
			}
			//echo "ejecuto el metodo";
		}
	  
	}
function saveProgram
		(
			$nombre,
			$codigosnies,
			$semestres,
			$creditos,
			$nivelAcademico
			)
		{	
			$conexion = getConexion();
			if (!$conexion) {
				echo "Error en conexion";
			}else{
			try {
			//var_dump($conexion);
			$sql = ("INSERT INTO programas  (id, nombre, codigo_snies,num_semestres,num_creditos,nivel_academico) values(null, :nombre, :codigosnies,:num_semestres,:num_creditos,:nivel_academico)"
				);
			$statement = $conexion->prepare($sql);
					 $statement->bindParam( ':nombre' , $nombre);
					 $statement->bindParam( ':codigosnies' , $codigosnies);
					 $statement->bindParam( ':num_semestres' , $semestres);
					 $statement->bindParam( ':num_creditos' , $creditos);
					 $statement->bindParam( ':nivel_academico' , $nivelAcademico);
					 
			 $result= $statement->execute();
			
			if ($result !== null) {
				header("Location: ../gestion/new-programa.php");
			}

			} catch (Exception $e) {
				echo "Linea de error: ".$e->getMessage();	
			}
			//echo "ejecuto el metodo";
		}
	  
	}




function saveStudent
		(
			$documento,$primerNombre,
			$segundoNombre,$primerApellido,
			$segundoApellido,$celular,
			$telefono,$email,$fechaNaci,
			$lugarNaci,$direccion,
			$municipio,$estrato,$desplazado,
			$afro,$ojos,$genero,$fecha_registro
			)
		{
			//echo "Entro a registrar";
			
			$conexion = getConexion();
			if (!$conexion) {
				echo "Error en conexion";
			}else{

			try {
			//var_dump($conexion);
			$sql = ("INSERT INTO estudiantes  (id, documento, primer_nombre, segundo_nombre, primer_apellido, segundo_apellido, cel_contacto, tel_contacto, email, fecha_naci, lugar_naci, direccion, municipio, estrato, desplazado, afrodescendiente, ojos, genero, fecha_registro) values(null,:documento,:primer_nombre,:segundo_nombre,:primer_apellido,:segundo_apellido,:cel_contacto,:tel_contacto,:email,:fecha_naci,:lugar_naci,:direccion,:municipio,:estrato,:desplazado,:afrodescendiente,:ojos,:genero,:fecha_registro)"
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
					 $statement->bindParam( ':fecha_naci' , $fechaNaci);
					 $statement->bindParam( ':lugar_naci' , $lugarNaci);
					 $statement->bindParam( ':direccion' , $direccion);
					 $statement->bindParam( ':municipio' , $municipio);
					 $statement->bindParam( ':estrato' , $estrato);
					 $statement->bindParam( ':desplazado' , $desplazado);
					 $statement->bindParam( ':afrodescendiente' , $afro);
					 $statement->bindParam( ':ojos' , $ojos);
					 $statement->bindParam( ':genero' , $genero);
					 $statement->bindParam( ':fecha_registro' , $fecha_registro);

			 $result= $statement->execute();
			
			if ($result !== null) {
				header("Location: ../gestion/new_estudiante.php");
			}

			} catch (Exception $e) {
				echo "Linea de error: ".$e->getMessage();	
			}
			//echo "ejecuto el metodo";
		}
	  
	}





?>