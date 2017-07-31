<?php 

function getStudentsInsitutesAndprogramns($con)
{
	$con= getConexion($con);
	$sql="SELECT estudiantes.id AS idestudiante,estudiantes.primer_nombre,estudiantes.segundo_nombre,estudiantes.primer_apellido,estudiantes.segundo_apellido,estudiantes.email,estudiantes.ojos,estudiantes.estrato,estudiantes.genero,planteles_educativos.nombre AS nameInstitute,estudiantes.estado,programas.nombre AS namePrograma,semestres.periodo AS nameSemestre,semestre_programas.programas_id AS idprograma FROM estudiantes INNER JOIN planteles_educativos ON estudiantes.planteles_educativos_id=planteles_educativos.id INNER JOIN programas ON planteles_educativos.id=programas.planteles_educativos_id INNER JOIN semestre_programas ON programas.id=semestre_programas.programas_id INNER JOIN semestres ON semestres.id=semestre_programas.semestre_id";
	#INNER JOIN semestres ON semestres.id=semestres_programas.semestres_id
	#AND semestres_programas.programas_planteles_educativos_id=programas.planteles_educativos_id
	$ps = $con->prepare($sql);
	$ps->execute();
	#var_dump($ps);
	$ps = $ps->fetchAll();
	#var_dump($ps);
	return $ps;
}

function getAllEntity($entity,$con)
{
	$con= getConexion($con);
	$sql="SELECT SQL_CALC_FOUND_ROWS id,nombre FROM $entity";
	$ps = $con->prepare($sql);
	$ps->execute();
	$ps = $ps->fetchAll();
	return $ps;
}

function getTotalObjects($con)
{
	$con= getConexion($con);
	$sql="SELECT FOUND_ROWS() AS total";
	$ps = $con->prepare($sql);
	$ps->execute();
	$ps = $ps->fetch()['total'];
	return $ps;
}

function validateSession()
{
	if (!isset($_SESSION['usuario'])) {
		header("Location: ".URL."php/login.php");
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
			$direccion,
			$bd_config
			)
		{
			$conexion = getConexion($bd_config);
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
				header('Location: '.URL.'gestion/new-institucion.php?select=i');
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
			$nivelAcademico,
			$bd_config
			)
		{	
			$conexion = getConexion($bd_config);
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
				header("Location:".URL."gestion/new-programa.php?select=p");
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
			$afro,$ojos,$genero,$fecha_registro,$institute,
			$bd_config
			)
		{
			//echo "Entro a registrar";
			
			$conexion = getConexion($bd_config);
			if (!$conexion) {
				echo "Error en conexion";
			}else{

			try {
			//var_dump($conexion);
			$sql = ("INSERT INTO estudiantes  (id, documento, primer_nombre, segundo_nombre, primer_apellido, segundo_apellido, cel_contacto, tel_contacto, email, fecha_naci, lugar_naci, direccion, municipio, estrato, desplazado, afrodescendiente, ojos, genero, fecha_registro,estado,planteles_educativos_id) values(null,:documento,:primer_nombre,:segundo_nombre,:primer_apellido,:segundo_apellido,:cel_contacto,:tel_contacto,:email,:fecha_naci,:lugar_naci,:direccion,:municipio,:estrato,:desplazado,:afrodescendiente,:ojos,:genero,:fecha_registro,0,:institute)"
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
					 $statement->bindParam( ':institute' , $institute);

			 $result= $statement->execute();
			
			if ($result !== null) {
				#header("Location:".URL."gestion/new-estudiante.php?select=e");
			}

			} catch (Exception $e) {
				echo "Linea de error: ".$e->getMessage();	
			}
			//echo "ejecuto el metodo";
		}
	  
	}





?>