<?php 

function getIdmatricula($documento,$cn)
{
	$sql = "SELECT  id FROM matricula WHERE estudiante_documento='$documento' LIMIT 1";
	#var_dump($sql);
	$ps=$cn->prepare($sql);
	$ps->execute();
	$result=$ps->fetch()['id'];
	var_dump($result);
	return $result;
}

function countEntityWithWhere($tabla,$criterio,$valor,$cn){
	$sql = "SELECT COUNT($criterio) AS total FROM $tabla WHERE $criterio='$valor'";
	#var_dump($sql);
	$ps=$cn->prepare($sql);
	$ps->execute();
	$result=$ps->fetch()['total'];
	$result = (integer) $result;
	#var_dump($result);
	return $result;
}

function countEntityWithOutWhere($tabla,$cn){
	$sql = "SELECT COUNT(*) AS total FROM $tabla";
	$ps=$cn->prepare($sql);
	$ps->execute();
	$result=$ps->fetch()['total'];
	#var_dump($result);
	$result = (integer) $result;
	#var_dump($result);
	return (int)$result;
}

function saveAlianza(
	$nombre,$fecha_ini,$fecha_fina,$cupos,$cn
)
{
	echo "entro";	
	
	try {
			//var_dump($conexion);
		$sql = ("INSERT INTO alianza (nombre,fecha_inicio,fecha_final,cupos) VALUES(  :nombre,:fecha_ini,:fecha_fina,:cupos)"
	);
		$statement = $cn->prepare($sql);
		$statement->bindParam( ':nombre' , $nombre);
		$statement->bindParam( ':fecha_ini' , $fecha_ini);
		$statement->bindParam( ':fecha_fina' , $fecha_fina);
		$statement->bindParam( ':cupos' , $cupos);
		
		$result= $statement->execute();
		var_dump($result);
		if ($result !== null) {
			header("Location:".URL."gestion/new-alianza.php?select=a");
		}

	} catch (Exception $e) {
		echo "Linea de error: ".$e->getMessage();	
	}
			//echo "ejecuto el metodo";
}


function getAllAlianzaRelations($id,$con)
{
	#Trae todos los campos de todas las tablas que tienen relacion con la alianza por medio de id = ...
	#Utilizada por ver-alianza
	$sql="SELECT alianza.id AS id_alianza, alianza.nombre AS nombreAlianza,alianza.fecha_inicio,alianza.fecha_final, alianza.cupos, institucion.id AS id_institucion, institucion.nombre AS nombre_institucion,institucion.email AS email_institucion FROM alianza INNER JOIN institucion ON alianza.id=institucion.alianza_id WHERE alianza.id=$id";

	$ps = $con->prepare($sql);
	$ps->execute();
	$result = $ps->fetchAll();
	#var_dump($result);
	return $result;	
}

function getAllStudentRelations($documento,$con)
{
	#Trae todos los campos de todas las tablas que tienen relacion con el estudiante con documento = ...
	#Utilizada por ver-estudiante
	$sql="SELECT estudiante.documento AS doc_estudiante,estudiante.primer_nombre,estudiante.segundo_nombre,estudiante.primer_apellido,estudiante.segundo_apellido,estudiante.edad,estudiante.email,estudiante.ojos,estudiante.estrato,estudiante.genero,estudiante.estado,estudiante.zona,estudiante.desplazado,estudiante.afrodescendiente,estudiante.grado,estudiante.fecha_naci,estudiante.fecha_registro,estudiante.discapacidades,estudiante.victima_conflicto,estudiante.direccion_residencia,estudiante.barrio_residencia,municipio.nombre AS nameMuniNaci,municipio.nombre AS nameMuniResi, tipo_documento.tipo AS tipo_docu,tipo_sangre.tipo AS tipo_sangre,estudiante.observaciones, programa.nombre AS namePrograma, semestre.periodo,semestre.promedio_anterior,evaluacion_semestral.nota,institucion.nombre AS nameInstitute FROM estudiante INNER JOIN evaluacion_semestral ON estudiante.documento=evaluacion_semestral.estudiante_documento INNER JOIN programa ON programa.snies=evaluacion_semestral.programa_snies INNER JOIN semestre ON semestre.id=evaluacion_semestral.semestre_id INNER JOIN institucion ON institucion.id=programa.institucion_id INNER JOIN municipio ON municipio.id=estudiante.municipio_naci_id INNER JOIN tipo_documento ON estudiante.tipo_documento_id=tipo_documento.id INNER JOIN tipo_sangre ON estudiante.tipo_sangre_id=tipo_sangre.id WHERE documento=$documento";

	$ps = $con->prepare($sql);
	$ps->execute();
	$result = $ps->fetch();
	#var_dump($result);
	return $result;	
}

function getProgramaOfEstudiante($documento,$con)
{
	$sql = "SELECT programa.nombre AS nombre_programa,programa.snies AS codigo_snies, institucion.nombre AS nombre_institucion FROM programa INNER JOIN evaluacion_semestral ON programa.snies=evaluacion_semestral.programa_snies INNER JOIN institucion ON institucion.id=programa.institucion_id WHERE evaluacion_semestral.estudiante_documento=$documento LIMIT 1";
	$ps = $con->prepare($sql);
	$ps->execute();
	$result = $ps->fetchAll();
	#var_dump($result);
	return $result;	
}

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
	#var_dump($sql);
	$ps = $con->prepare($sql);
	$ps->execute();
	$resul = $ps->fetchAll();
	#var_dump($resul);
	return $resul;

}

function getSubjectById($table,$doc,$campo,$con)
{
	#Used by Estudiante
	#used by Ver estudiante
	$sql = "SELECT * FROM $table WHERE $campo=$doc";
	$ps = $con->prepare($sql);
	#var_dump($campo);
	$ps->execute();
	#var_dump($ps);
	$resul = $ps->fetch();
	#var_dump($result);
	
	return $resul;

	

}



function getInstitucionesOfAlianzaById($id,$con)
{
	#Used by Estudiante
	#used by Ver estudiante
	$sql = "SELECT * FROM alianzas_instituciones,institucion WHERE institucion.id=alianzas_instituciones.institucion_id AND alianzas_instituciones.alianza_id=$id";
	$ps = $con->prepare($sql);
	#var_dump($campo);
	$ps->execute();
	#var_dump($ps);
	$resul = $ps->fetchAll();
		#var_dump($result);
	
	return $resul;
}


function getAllSubjectById($table,$doc,$campo,$con)
{
	#Used by Estudiante
	#used by Ver estudiante
	$sql = "SELECT * FROM $table WHERE $campo=$doc";
	$ps = $con->prepare($sql);
	#var_dump($campo);
	$ps->execute();
	#var_dump($ps);
	$resul = $ps->fetchAll();
		#var_dump($result);
	
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

	#echo $municipio;
	$conexion = getConexion($bd_config);
	if (!$conexion) {
		echo "Error en conexion";
	}else{
		try {
			//var_dump($conexion);
			$sql = "INSERT INTO institucion  (nombre,telefono,email,direccion)VALUES (:nombre,:telefono,:email,:direccion)";

			$statement = $conexion->prepare($sql);
			$statement->bindParam( ':nombre' , $nombre);
			$statement->bindParam( ':telefono' , $telefono);
			$statement->bindParam( ':email' , $email);
			$statement->bindParam( ':direccion' , $direccion);
			#var_dump($statement);
			$result= $statement->execute();
			#var_dump($result);
		//Enlazar institucion con municipio por medio de la tabla institucion_municipio
			$institucion_id = getId("institucion",$conexion);
			echo $institucion_id;
			$sql = "INSERT INTO institucion_municipio (institucion_id, municipio_id) VALUES (:institucion,:municipio)";
			$statement = $conexion->prepare($sql);
			$statement->bindParam(':institucion',$institucion_id);
			$statement->bindParam(':municipio',$municipio);
			$resultInsti = $statement->execute();

			if ($result !== null && $resultInsti != null) {
				echo "error";
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
	$programa,$semestre,$periodo,
	$cn
)
{
	$fecha_registro =  date("Y-m-d");
	$fecha_cambio_estado = "";
	$anio = date("Y");
	try {
			#var_dump($cn);
		$sql = ("INSERT INTO estudiante (documento, tipo_documento_id, tipo_sangre_id,primer_nombre, segundo_nombre,primer_apellido,segundo_apellido, tel_contacto, email,fecha_naci, edad,municipio_naci_id,  direccion_residencia, barrio_residencia, municipio_resi_id, estrato, zona, EPS, desplazado, afrodescendiente, ojos, genero, victima_conflicto, discapacidades, situacion_periodo_anterior, grado, estado,fecha_registro,fecha_cambio_estado, observaciones)VALUES(	:documento,:tipo_documento_id,:tipo_sangre_id,:primer_nombre,:segundo_nombre,:primer_apellido,:segundo_apellido,:tel_contacto,:email,:fecha_naci,:edad,:municipio_naci_id,:direccion_residencia,:barrio_residencia,:municipio_resi_id,:estrato,:zona,:EPS,:desplazado,:afrodescendiente,:ojos,:genero,:victima_conflicto,:discapacidades,:situacion_periodo_anterior,:grado,:estado,:fecha_registro,:fecha_cambio_estado,:observaciones)");	


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
			 $sql = "INSERT INTO matricula(id, estudiante_documento,programa_snies,fecha) VALUES 
			 (null,:estudiante_documento, :programa_snies,:fecha)";
			 $statement = $cn->prepare($sql);
			#var_dump($statement);
			#Devuelve false en caso de ocurrir algun error
			 
			 $statement->bindParam(':estudiante_documento',$documento);
			 $statement->bindParam(':programa_snies',$programa);
			 $statement->bindParam(':fecha',$fecha_registro);
				#$statement->bindParam(':promedio_anterior',$promedio_anterior);
			 $resultSemestre = $statement->execute();
			#var_dump($result);



			 $sql = "INSERT INTO semestre(id, semestre, periodo) VALUES (null,:semestre,:periodo)";
			 $statement = $cn->prepare($sql);
			#var_dump($statement);
			#Devuelve false en caso de ocurrir algun error
			 
			 $statement->bindParam(':semestre',$semestre);
			 $statement->bindParam(':periodo',$periodo);
			 $resultSemestre = $statement->execute();
			#

			//Obtener el documento (ya esta)
			//Obtener ID del semestre
			 $matricula = getIdmatricula($documento,$cn);

			//Insertar tabla detalle semestre
			 $sql = "INSERT INTO detalle_semestre(id, matricula_id, semestre_id, anio, ultima_modificacion) VALUES (null,:matricula,:semestre,:anio,:fecha_modi))";
			 $statement = $cn->prepare($sql);
			#var_dump($statement);
			#Devuelve false en caso de ocurrir algun error
			 echo "semestre: $semestre ,matricula: $matricula";
			 echo "Año: $anio , fecha_registro: $fecha_registro";
			 $statement->bindParam(':matricula',$matricula);
			 $statement->bindParam(':semestre',$semestre);
			 $statement->bindParam(':anio',$anio);
			 $statement->bindParam(':fecha_modi',$fecha_registro);
			 $resultDetalle = $statement->execute();
			#var_dump($result);			

			 if ($result !== false && $resultSemestre !== false && $resultDetalle !== false) {
			 	header("Location:".URL."gestion/new-estudiante.php?select=e");
			 }else{
			 	echo "Ocurrio un error";
			 }

			} catch (Exception $e) {
				echo "Linea de error: ".$e->getMessage();	
			}
			#echo "ejecuto el metodo";
			



		}





		?>