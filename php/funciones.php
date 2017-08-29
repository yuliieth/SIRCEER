<?php 

function buscarEstudianteSIMAT($documento,$con)
{

	$sql="SELECT * FROM estudiante WHERE numero=$documento LIMIT 1";
	$ps = $con->prepare($sql);
	$ps->execute();
	#var_dump($ps);
	$ps = $ps->fetch();
	#var_dump($ps);
	return $ps;
}

function getStudentsInsitutesAndprogramns($con)
{
	#Esta funcion sera utilizada cuando este gestionado el student
	$con= getConexion($con);
	$sql="SELECT estudiante.documento AS doc_estudiante,estudiante.nombres,estudiante.apellidos,estudiante.edad,estudiante.email,estudiante.ojos,estudiante.estrato,estudiante.genero,estudiante.estado, programa.nombre AS namePrograma, semestre.periodo,semestre.promedio_anterior,institucion.nombre AS nameInstitute FROM estudiante INNER JOIN evaluacion_semestral ON estudiante.documento=evaluacion_semestral.estudiante_documento INNER JOIN programa ON programa.snies=evaluacion_semestral.programa_snies INNER JOIN semestre ON semestre.id=evaluacion_semestral.semestre_id INNER JOIN institucion ON institucion.id=programa.institucion_id";
	$ps = $con->prepare($sql);
	$ps->execute();
	#var_dump($ps);
	$ps = $ps->fetchAll();
	#var_dump($ps);
	return $ps;
}

function getAllEntity($entity,$con)
{
	
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

function getAllSubject($table,$con)
{
	#utilizada para traer el rpograma en gestionar-estudiante.php
	$sql = "SELECT * FROM $table";
	$ps = $con->prepare($sql);
	$ps->execute();
	$resul = $ps->fetchAll();
	#var_dump($resul);
	return $resul;

}

function getSubjectById($table,$doc,$con)
{
	#Used by Estudiante
	$sql = "SELECT * FROM $table WHERE documento=$doc LIMIT 1";
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
			$documento,$nombres,
			$apellidos,$celular,
			$telefono,$email,$fechaNaci,
			$edad,$lugarNaci,$direccion,
			$municipio,$estrato,$desplazado,
			$afro,$ojos,$genero,$fecha_registro,
			$tipo_documento,$bd_config
			)
		{
			//echo "Entro a registrar";
			
			$conexion = getConexion($bd_config);
			if (!$conexion) {
				echo "Error en conexion";
			}else{

			try {
			//var_dump($conexion);
			$sql = ("INSERT INTO estudiante (documento, nombres, apellidos, cel_contacto, tel_contacto, email, fecha_naci,edad,lugar_naci, direccion, municipio, estrato, desplazado, afrodescendiente, ojos, genero, fecha_registro,estado,tipo_documento_id) values(:documento,:nombres,:apellidos,:cel_contacto,:tel_contacto,:email,:fecha_naci,:edad,:lugar_naci,:direccion,:municipio,:estrato,:desplazado,:afrodescendiente,:ojos,:genero,:fecha_registro,0,:tipo_documento)"
				);

			$statement = $conexion->prepare($sql);

					 $statement->bindParam( ':documento' , $documento);
					 $statement->bindParam( ':nombres' , $nombres);
					 $statement->bindParam( ':apellidos' , $apellidos);
					 $statement->bindParam( ':cel_contacto' , $celular);
					 $statement->bindParam( ':tel_contacto' , $telefono);
					 $statement->bindParam( ':email' , $email);
					 $statement->bindParam( ':fecha_naci' , $fechaNaci);
					 $statement->bindParam( ':edad' , $edad);
					 $statement->bindParam( ':lugar_naci' , $lugarNaci);
					 $statement->bindParam( ':direccion' , $direccion);
					 $statement->bindParam( ':municipio' , $municipio);
					 $statement->bindParam( ':estrato' , $estrato);
					 $statement->bindParam( ':desplazado' , $desplazado);
					 $statement->bindParam( ':afrodescendiente' , $afro);
					 $statement->bindParam( ':ojos' , $ojos);
					 $statement->bindParam( ':genero' , $genero);
					 $statement->bindParam( ':fecha_registro' , $fecha_registro);
					 $statement->bindParam( ':tipo_documento' , $tipo_documento);

			 $result= $statement->execute();
			
			if ($result !== null) {
				header("Location:".URL."gestion/new-estudiante.php?select=e");
			}

			} catch (Exception $e) {
				echo "Linea de error: ".$e->getMessage();	
			}
			//echo "ejecuto el metodo";
		}
	  
	}





?>