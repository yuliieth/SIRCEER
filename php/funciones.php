<?php 


function getTiposSangre($con)
{
	$sql = "SELECT * FROM tipo_sangre ORDER BY id DESC";
	$ps = $con->prepare($sql);
	$ps->execute();
	$result = $ps->fetchAll();
	#var_dump($result);
	return $result;

}

function getId($tabla,$con)
{
	$sql = "SELECT id FROM $tabla ORDER BY id DESC LIMIT 1";
	$ps = $con->prepare($sql);
	$ps->execute();
	$result = $ps->fetch()['id'];
	#var_dump($result);
	return $result;

}

function getProgramas($con)
{
	$sql = "SELECT * FROM programa";
	$ps = $con->prepare($sql);
	$ps->execute();
	#var_dump($ps);
	$result = $ps->fetchAll();
	#var_dump($result);
	return $result;
}


function getNivelesAcademicos($con)
{
	$sql = "SELECT * FROM nivel_academico";
	$ps = $con->prepare($sql);
	$ps->execute();
	#var_dump($ps);
	$result = $ps->fetchAll();
	#var_dump($result);
	return $result;
}


function getMunicipios($con)
{
	$sql = "SELECT * FROM municipio";
	$ps = $con->prepare($sql);
	$ps->execute();
	#var_dump($ps);
	$result = $ps->fetchAll();
	#var_dump($result);
	return $result;
}

function getTiposDocumentos($con)
{
	$sql = "SELECT * FROM tipo_documento";
	$ps = $con->prepare($sql);
	$ps->execute();
	$result = $ps->fetchAll();
	return $result;
}

function getInstituciones($con)
{
	$sql = "SELECT * FROM institucion";
	$ps = $con->prepare($sql);
	$ps->execute();
	#var_dump($ps);
	$result = $ps->fetchAll();
	#var_dump($result);
	return $result;
}

#SIMAT
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
	#devuelve el nombre del perfil
	$result = getUserById($id_user,$con);
	var_dump($result);
	$nombre_perfil = $result['nombre_perfil'];
	return $nombre_perfil;
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
	$sql = "SELECT usuarios.id AS id_usuarios,nombre_completo,username,password,email,nombre,perfiles.id AS id_perfil,perfiles.nombre AS nombre_perfil FROM usuarios INNER JOIN usuarios_perfiles ON usuarios.id=usuarios_perfiles.usuarios_id INNER JOIN perfiles ON perfiles.id=usuarios_perfiles.perfiles_id WHERE usuarios.id=$id";
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
	#Utilizada para traer todos los estudiantes
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
			$sql = ("INSERT INTO institucion  (id, nombre,telefono,email,direccion) values(null,:nombre,:telefono,:email,:direccion)"
				);
			$statement = $conexion->prepare($sql);
					 $statement->bindParam( ':nombre' , $nombre);
					 $statement->bindParam( ':telefono' , $telefono);
					 $statement->bindParam( ':email' , $email);
					 $statement->bindParam( ':direccion' , $direccion);
			 $result= $statement->execute();
		//Enlazar institucion con municipio por medio de la tabla institucion_municipio
			 $institucion_id = getId("institucion",$conexion);
		$sql = "INSERT INTO institucion_municipio (institucion_id, municipio_id) VALUES (:institucion,:municipio)";
	  	$statement = $conexion->prepare($sql);
	  	$statement->bindParam(':institucion',$institucion_id);
	  	$statement->bindParam(':municipio',$municipio);
	  	$resultInsti = $statement->execute();
			if ($result !== null && $resultInsti != null) {
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
			$institucion,
			$cn
			)
		{	
			
			try {
			//var_dump($conexion);
			$sql = ("INSERT INTO programa(snies, nombre,num_semestres,num_creditos,nivel_academico_id,institucion_id) VALUES(  :snies,:nombre,:num_semestres,:num_creditos,:nivel_academico_id,:institucion_id)"
				);
			$statement = $cn->prepare($sql);
					 $statement->bindParam( ':snies' , $codigosnies);
					 $statement->bindParam( ':nombre' , $nombre);
					 $statement->bindParam( ':num_semestres' , $semestres);
					 $statement->bindParam( ':num_creditos' , $creditos);
					 $statement->bindParam( ':nivel_academico_id' , $nivelAcademico);
					 $statement->bindParam( ':institucion_id' , $institucion);
					 
			 $result= $statement->execute();
			
			if ($result !== null) {
				header("Location:".URL."gestion/new-programa.php?select=p");
			}

			} catch (Exception $e) {
				echo "Linea de error: ".$e->getMessage();	
			}
			//echo "ejecuto el metodo";
		
	  
	}



#Registro del estudiante en la BD
function saveStudent
		(
	$tipo_documento,$documento,$tipo_sangre,$primer_nombre,
	$segundo_nombre,$primer_apellido,$segundo_apellido,
	$telefono,$email,$fecha_naci,
	$edad,$muni_naci,$dire_resi,
	$barrio_resi,$muni_resi,$estrato,
	$zona,$eps,$desplazado,
	$afro,$ojos,$genero,
	$victima_conflicto,$discapacidades,$situacion_periodo_anterior,
	$grado,$estado,$observacion,
	$programa,$periodo,$promedio_anterior,
	$cn
			)
		{
			$fecha_registro = "2017-08-01";
			$fecha_cambio_estado = "2017-08-01";
			try {
			#var_dump($cn);
			$sql = ("INSERT INTO estudiante (documento, tipo_documento_id, tipo_sangre_id,primer_nombre, segundo_nombre,primer_apellido,segundo_apellido, tel_contacto, email,fecha_naci, edad,municipio_naci_id,  direccion_residencia, barrio_residencia, municipio_resi_id, estrato, zona, EPS, desplazado, afrodescendiente, ojos, genero, victima_conflicto, discapacidades, situacion_periodo_anterior, grado, estado,fecha_registro,fecha_cambio_estado, observaciones)VALUES(	:documento,:tipo_documento_id,:tipo_sangre_id,:primer_nombre,:segundo_nombre,:primer_apellido,:segundo_apellido,:tel_contacto,:email,:fecha_naci,:edad,:municipio_naci_id,:direccion_residencia,:barrio_residencia,:municipio_resi_id,:estrato,:zona,:EPS,:desplazado,:afrodescendiente,:ojos,:genero,:victima_conflicto,:discapacidades,:situacion_periodo_anterior,:grado,:estado,:fecha_registro,:fecha_cambio_estado,:observaciones)");	

			/*
	(documento, tipo_documento_id, tipo_sangre_id, primer_nombre, segundo_nombre, primer_apellido, segundo_apellido, tel_contacto, email, fecha_naci, edad, municipio_naci_id, direccion_residencia, barrio_residencia, municipio_resi_id, estrato, zona, EPS, desplazado, afrodescendiente, ojos, genero, victima_conflicto, discapacidades, situacion_periodo_anterior, grado, estado,fecha_registro,fecha_cambio_estado, observaciones)

			*/

/*
:documento,:tipo_documento_id,:tipo_sangre_id,:primer_nombre,:segundo_nombre,:primer_apellido,:segundo_apellido,:tel_contacto,:email,:fecha_naci,:edad,:municipio_naci_id,:direccion_residencia,:barrio_residencia,:municipio_resi_id,:estrato,:zona,:EPS,:desplazado,:afrodescendiente,:ojos,:genero,:victima_conflicto,:discapacidades,:situacion_periodo_anterior,:grado,:estado,:fecha_registro,:fecha_cambio_estado,:observaciones)"
*/

			$statement = $cn->prepare($sql);
			#var_dump($statement);
			#Devuelve false en caso de ocurrir algun error
			$result=$statement->execute(
				array(
					':documento' => $documento , 
					':tipo_documento_id' => $tipo_documento , 
					':tipo_sangre_id' => $tipo_sangre, 
					':primer_nombre' => $primer_nombre, 
					':segundo_nombre' => $segundo_nombre , 
					':primer_apellido' => $primer_apellido , 
					':segundo_apellido' => $segundo_apellido , 
					':tel_contacto' => $telefono , 
					':email' => $email, 
					':fecha_naci' => $fecha_naci , 
					':edad' => $edad , 
					':municipio_naci_id' => $muni_naci,
					':direccion_residencia' => $dire_resi , 
					':barrio_residencia' => $barrio_resi , 
					':municipio_resi_id' => $muni_resi,
					':estrato' => $estrato , 
					':zona' => $zona , 
					':EPS' => $eps , 
					':desplazado' => $desplazado, 
					':afrodescendiente' => $afro , 
					':ojos' => $ojos, 
					':genero' => $genero, 
					':victima_conflicto' => $victima_conflicto , 
					':discapacidades' => $discapacidades, 
					':situacion_periodo_anterior' => $situacion_periodo_anterior, 
					':grado' => $grado , 
					':estado' => $estado, 
					':fecha_registro' => $fecha_registro, 
					':fecha_cambio_estado' => $fecha_cambio_estado, 
					':observaciones' => $observacion
					));

			/*
					 $statement->bindParam( ':documento' , $documento);
					 $statement->bindParam( ':tipo_documento_id' , $tipo_documento);
					 $statement->bindParam( ':tipo_sangre_id' , $tipo_sangre);
					 $statement->bindParam( ':primer_nombre' , $primer_nombre);
					 $statement->bindParam( ':segundo_nombre' , $segundo_nombre);
					 $statement->bindParam( ':primer_apellido' , $primer_apellido);
					 $statement->bindParam( ':segundo_apellido' , $segundo_apellido);
					 $statement->bindParam( ':tel_contacto' , $telefono);
					 $statement->bindParam( ':email' , $email);
					 $statement->bindParam( ':fecha_naci' , $fecha_naci);
					 $statement->bindParam( ':edad' , $edad);
					 $statement->bindParam( ':municipio_naci_id' , $muni_naci);
					 $statement->bindParam( ':direccion_residencia' , $dire_resi);
					 $statement->bindParam( ':barrio_residencia' , $barrio_resi);
					 $statement->bindParam( ':municipio_resi_id' , $muni_resi);
					 $statement->bindParam( ':estrato' , $estrato);
					 $statement->bindParam( ':zona' , $zona);
					 $statement->bindParam( ':EPS' , $eps);
					 $statement->bindParam( ':desplazado' , $desplazado);
					 $statement->bindParam( ':afrodescendiente' , $afro);
					 $statement->bindParam( ':ojos' , $ojos);
					 $statement->bindParam( ':genero' , $genero);
					 $statement->bindParam( ':victima_conflicto' , $victima_conflicto);
					 $statement->bindParam( ':discapacidades' , $discapacidades);
					 $statement->bindParam( ':situacion_periodo_anterior', $ituacion_periodo_anterior);
					 $statement->bindParam( ':grado' , $grado);
					 $statement->bindParam( ':estado' , $estado);
					 $statement->bindParam( ':fecha_registro' , $fecha_registro);
					 $statement->bindParam( ':fecha_cambio_estado' , $fecha_cambio_estado);
					 $statement->bindParam( ':observaciones' , $observacion);
			 $result= $statement->execute();
*/
			 $sql = "INSERT INTO semestre(id, periodo, promedio_anterior) VALUES 
			 (null,:periodo,:promedio_anterior)";
			 $statement = $cn->prepare($sql);
			#var_dump($statement);
			#Devuelve false en caso de ocurrir algun error
			
				$statement->bindParam(':periodo',$periodo);
				$statement->bindParam(':promedio_anterior',$promedio_anterior);
			$resultSemestre = $statement->execute();
			#var_dump($result);

			//Obtener el documento (ya esta)
			//Obtener ID del semestre
			$semestre_id = getId("semestre",$cn);

			//Insertar tabla evaluacion_semestral
			$sql = "INSERT INTO evaluacion_semestral(estudiante_documento, semestre_id, programa_snies) VALUES (:estudiante_documento,:semestre_id,:programa_snies)";
			 $statement = $cn->prepare($sql);
			#var_dump($statement);
			#Devuelve false en caso de ocurrir algun error
			
				$statement->bindParam(':estudiante_documento',$documento);
				$statement->bindParam(':semestre_id',$semestre_id);
				$statement->bindParam(':programa_snies',$programa);
			$resultEvaluacion = $statement->execute();
			#var_dump($result);			

			if ($result !== false && $resultSemestre !== false && $resultEvaluacion !== false) {
				header("Location:".URL."gestion/new-estudiante.php?select=e");
			}else{echo "Ocurrio un error";}

			} catch (Exception $e) {
				echo "Linea de error: ".$e->getMessage();	
			}
			#echo "ejecuto el metodo";
	  



	}





?>