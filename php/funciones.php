<?php 

function saveDiscapacidades($discapacidad,$cn){
	
	$sql = "INSERT INTO discapacidades(nombre) VALUES (:nombre)";

	$stm = $cn->prepare($sql);
	$stm->bindParam(':nombre',$discapacidad);
	
	
	$result = $stm->execute();

	if ($result == false) {
		echo "Error insertando la sede";
	}

	echo "<br> Id sede insertada <br>";
	return $cn->lastInsertId();

}

function saveSede($sede,$codigo_dane_sede,$consecutivo,$zona_sede,$modelo,$institucion,$municipio,$cn){

	echo "<br>Guardando sede...<br>";

	$sql = "INSERT INTO sedes(nombre, codigo_dane_sede, consecutivo, zona_id, modelo_id, institucion_id,municipio_id) VALUES (:nombre,:codigo_dane_sede,:consecutivo,:zona_id,:modelo_id,:colegio_id,:municipio_id)";

	$stm = $cn->prepare($sql);

	$stm->bindParam(':nombre',$sede);
	$stm->bindParam(':codigo_dane_sede',$codigo_dane_sede);
	$stm->bindParam(':consecutivo',$consecutivo);
	$stm->bindParam(':zona_id',$zona_sede);
	$stm->bindParam(':modelo_id',$modelo);
	$stm->bindParam(':colegio_id',$institucion);
	$stm->bindParam(':municipio_id',$municipio);

	$result = $stm->execute();

	if ($result == false) {
		echo "Error insertando la sede";
	}else{

	echo "<br> Id sede insertada <br>";
	}

	return $cn->lastInsertId();

}

function saveSchool($institucion,$calendario,$dane,$sector,$municipio,$cn){

	echo "<br>Entro saveSchool<br> Valores variables recibidads: <br>
	$institucion <br> $calendario <br> $dane <br> $sector <br> municipio: $municipio <br>";

	/*
	#Primero debemos conocer el municipio y obtener su id
	$row = getSubjectByValue('municipios',$municipio,'nombre',$cn);
	#var_dump($row);
	$municipio_id =  $row['id'];
*/
	$sql = "INSERT INTO instituciones (nombre,calendario, DANE, sector_id,municipio_id) VALUES (:nombre,:calendario,:DANE,:sector_id,:municipio_id)";

	$stm = $cn->prepare($sql);

	$stm->bindParam(':nombre',$institucion);
	$stm->bindParam(':calendario',$calendario);
	$stm->bindParam(':DANE',$dane);
	$stm->bindParam(':sector_id',$sector);
	$stm->bindParam(':municipio_id',$municipio);

	echo "Insertando escuela...";
	$estado = $stm->execute();
	echo "<br> Valor de estado: ";
	var_dump($estado);
	if ($estado==false) {
		echo "<br> Error insertando la escuela<br>";
	}else{

	echo "<br> Id escuela insertada:<br>";
	var_dump($cn->lastInsertId());
	}
	return $cn->lastInsertId();
}

function validarYregistrar($nameTable,$nameColumnUno,$nameColumnDos,$valueUno,$cn){
	$id = 0;
	$relacion = validarRegistro($nameTable,$nameColumnUno,$valueUno,$cn);
		if ($relacion) {
			#Ya hay coincidencia
			#Obtener id para establecer relacion en BD
			echo "Encontro coincidencia";
			#buscar la coincidencia con la ciudad y obtiene su id
			$row = getSubjectByValue($nameTable,$valueUno,$nameColumnUno,$cn);
			#var_dump($row);
			$id = $row['id'];

			#echo "valor de last_id_estado <br>";
			#var_dump($last_id_estado);
			echo "<br>";
			#echo "$last_id_estado";
		}else
		{
			#echo "No hay coincidencias...";


			switch ($nameTable) {
				case 'municipios':
				#Por ahora trae el id del unico de partamento
				$valueDos = getId('departamentos',$cn);
				
					break;
				
				default:
					$valueDos = "Descripcion por defecto";
					break;
			}

			#Do insert
			$do_registred = registrarRelacion($nameTable,$nameColumnUno,$nameColumnDos,$valueUno,$valueDos,$cn);
			echo "<br>";
			#var_dump($do_registred);
			echo "<br>";
			if ($do_registred == false) {
				echo "Ocurrio un error al tratar de registrar $nameTable";
			}else{
			#Return last id
			$id = getId($nameTable,$cn);
				
			}



		}#End else

		return $id;

}


 function registrarRelacion($nameTable,$nameValueUno,$nameValueDos,$valueUno,$valueDos,$cn)
{
	
	echo "<br>";
	echo $nameValueUno;
	echo $nameValueDos;
	echo $valueUno;
	echo $valueDos;
	
	echo "<br>";
	$sql = "INSERT INTO $nameTable ($nameValueUno,$nameValueDos) VALUES(?,?)";
	$preparado = $cn->prepare($sql);
	$preparado->bindParam(1,$valueUno);
	$preparado->bindParam(2,$valueDos);
	$state = $preparado->execute();
	var_dump($preparado);

	#con->lastInsertId(); //devuelve el id del ultimo registro insertado en esta conexion
	if ($state) {
		return true;
		die();
	}else{
		return false;
		die();
	}
}


#Validad si hay coincidencia, si es asi devuelve el id de la coincidencia
function validarRegistro($nameTable,$nameColumn,$valor,$cn)
{
	/*
	echo "<br>";
	echo "$nameTable <br>";
	echo "$nameColumn <br>";
	echo "$valor <br>";
	echo "<br>";
	*/

	echo "<br>Ingresa a validarRegistro:<br>";

	$value = "";
	$sql = "SELECT * FROM $nameTable WHERE $nameColumn LIKE '".$valor."' LIMIT 1";	
	$stm = $cn->prepare($sql);
	$stm->execute();
	$estado = $stm->fetch();
	#echo "<br>Valor de stm<br>";
	#var_dump($stm);

	#echo "<br>Valor de estado de la busquedad...<br>";
	#var_dump($estado);
	#echo "<br>";
	if ($estado != false) {
	#	echo "<br> Hay coincidencias <br>";
			#Sy hay coincidencas
			$row = getSubjectByValue($nameTable,$valor,$nameColumn,$cn);
			#var_dump($row);
			#id de la ENTIDAD donde el nombre coincide
			#echo "<br> Mostrando row: <br>";
			#var_dump($row);
			$value = $row['id'];
	}

	#var_dump($stm);
	return $value;
}

function getDepartamentos($cn)
{
	$sql = "SELECT * FROM departamento ORDER BY nombre ASC";
	#var_dump($sql);
	$ps = $cn->prepare($sql);
	$ps->execute();
	$resul = $ps->fetchAll();
	#var_dump($resul);
	return $resul;
}

function  getHistorialEstudiante($matricula,$cn)
{
	$sql = "SELECT * FROM detalle_semestre,semestre WHERE detalle_semestre.matricula_id=$matricula AND detalle_semestre.semestre_id=semestre.id";
	#var_dump($sql);
	$ps = $cn->prepare($sql);
	$ps->execute();
	$resul = $ps->fetchAll();
	#var_dump($resul);
	return $resul;

}



function getMatricula($documento,$cn)
{
	$sql = "SELECT id AS matricula FROM matricula WHERE matricula.estudiante_documento=$documento";
	#var_dump($sql);
	$ps = $cn->prepare($sql);
	$ps->execute();
	$resul = $ps->fetch()['matricula'];
	#var_dump($resul);
	return $resul;

}


function getProgramaAndInstitute($con)
{
	$sql = "SELECT programa.snies,programa.nombre,programa.num_semestres,programa.num_creditos, institucion.nombre AS nombre_institucion FROM programa, institucion WHERE programa.institucion_id=institucion.id";
	#var_dump($sql);
	$ps = $con->prepare($sql);
	$ps->execute();
	$resul = $ps->fetchAll();
	#var_dump($resul);
	return $resul;

}

function getMatriculaEstudiante($documento,$cn)
{
	$sql = "SELECT matricula.id FROM matricula WHERE matricula.estudiante_documento=$documento LIMIT 1 ";
	#var_dump($sql);
	$ps=$cn->prepare($sql);
	$ps->execute();
	$result=$ps->fetch()['id'];
	#var_dump($result);
	return $result;	
}

function getDataAllEstudent($matricula,$cn)
{
	$sql = "SELECT estudiante.documento,estudiante.primer_nombre,estudiante.segundo_nombre,estudiante.primer_apellido,estudiante.segundo_apellido,detalle_semestre.promedio,semestre.semestre,semestre.periodo,programa.snies,programa.nombre AS nombrePrograma,institucion.nombre AS nombreInstitucion,matricula.id AS matriculaId, semestre.id AS semestreId FROM matricula,estudiante, detalle_semestre, semestre,programa,institucion WHERE matricula.id
	=detalle_semestre.matricula_id AND detalle_semestre.semestre_id=semestre.id AND programa.snies=matricula.programa_snies AND programa.institucion_id=institucion.id AND estudiante.documento=matricula.estudiante_documento AND matricula.id=$matricula ORDER by detalle_semestre.semestre_id DESC LIMIT 1 ";
	#var_dump($sql);
	$ps=$cn->prepare($sql);
	$ps->execute();
	$result=$ps->fetch();
	#var_dump($result);
	return $result;	
}

function getIdmatricula($documento,$cn)
{
	$sql = "SELECT  id FROM matricula WHERE estudiante_documento='$documento' LIMIT 1";
	#var_dump($sql);
	$ps=$cn->prepare($sql);
	$ps->execute();
	$result=$ps->fetch()['id'];
	#var_dump($result);
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
	$nombre,$fecha_ini,$fecha_fina,$cupos,$instituciones,$cn
)
{

	$fecha_sistema = Date("YY-mm-dd");
	
	try {
			//var_dump($conexion);
		$sql = ("INSERT INTO alianzas (nombre,fecha_inicio,fecha_final,cupos) VALUES(  :nombre,:fecha_ini,:fecha_fina,:cupos)"
	);
		$statement = $cn->prepare($sql);
		$statement->bindParam( ':nombre' , $nombre);
		$statement->bindParam( ':fecha_ini' , $fecha_ini);
		$statement->bindParam( ':fecha_fina' , $fecha_fina);
		$statement->bindParam( ':cupos' , $cupos);
		
		$result= $statement->execute();
		var_dump($result);



		echo "<br>*********<br>";
		var_dump($instituciones);

		#consultar id alianza
		$id_alianza = getId('alianzas',$cn);

		#Ahora se obtienen las instituciones seleccionadas para guardar en la tabla: instituciones_alianzas
		$sql = "INSERT INTO instituciones_alianzas (institucion_id,alianzas_id,fecha_vinculacion) 
		VALUES (:institucion_id,:alianzas_id,:fecha_vinculacion)";
		$stp = $cn->prepare($sql);

		for ($i=0; $i <  count($instituciones) ; $i++) { 
			
			
		$stp->bindParam(':institucion_id',$instituciones[$i]);
		$stp->bindParam(':alianzas_id',$id_alianza);
		$stp->bindParam(':fecha_vinculacion',$fecha_sistema);

		$resultA = $stp->execute();

		}


		if ($result != false && $resultA != false) {
			header("Location:".URL."gestion/new-alianza.php?select=a");
		}else{
			echo "ocurrio un error...";
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
	$sql="SELECT 
estudiantes.documento, estudiantes.primer_nombre,estudiantes.segundo_nombre,estudiantes.primer_apellido,estudiantes.segundo_apellido,estudiantes.email, estudiantes.fecha_nacimiento,estudiantes.edad,estudiantes.direccion_residencia,estudiantes.fecha_inicio,estudiantes.fecha_fin, estudiantes.telefono_contacto,estudiantes.EPS, estudiantes.observacion, 
tipos_documento.nombre AS tipos_documento,
tipos_sangre.nombre AS sangre,
zonas.nombre AS zona,
tipos_poblacion.nombre AS tipo_poblacion,
estrato.nombre AS estrato,
generos.nombre AS genero,
color_ojos.color AS ojos,
situaciones_academicas.nombre AS situacion_academica,
situaciones_sociales.nombre AS situacion_social,
grados.nombre AS grado,
fuente_recursos.nombre AS fuente_recurso,
internado.nombre AS internado,
discapacidades.nombre AS discapacidades,
municipios.nombre as municipios,
sedes.nombre AS sede,
programas.nombre AS nombre_programa,
matricula.id AS id_matricula,
universidades.nombre AS universidad,
historial_academico_semestre.promedio,historial_academico_semestre.anio,
semestre.semestre, semestre.periodo

FROM estudiantes 

LEFT JOIN tipos_documento ON estudiantes.tipo_documento_id=tipos_documento.id 
LEFT JOIN tipos_sangre ON estudiantes.tipo_sangre_id=tipos_sangre.id 
LEFT JOIN zonas ON estudiantes.zona_id=zonas.id 
LEFT JOIN tipos_poblacion ON estudiantes.tipo_poblaion_id=tipos_poblacion.id
LEFT JOIN estrato ON estudiantes.estrato_id=estrato.id
LEFT JOIN generos ON estudiantes.genero_id=generos.id
LEFT JOIN color_ojos ON estudiantes.ojos_id=color_ojos.id
LEFT JOIN situaciones_academicas ON estudiantes.situacion_academica_id=situaciones_academicas.id
LEFT JOIN situaciones_sociales ON estudiantes.situacion_social_id=situaciones_sociales.id
LEFT JOIN grados ON estudiantes.grado_id=grados.id
LEFT JOIN fuente_recursos ON estudiantes.fuenterecurso_id=fuente_recursos.id
LEFT JOIN internado ON estudiantes.internado_id=internado.id
LEFT JOIN discapacidades ON estudiantes.discapacidad_id=discapacidades.id
LEFT JOIN municipios ON estudiantes.municipio_id=municipios.id
LEFT JOIN sedes ON estudiantes.sede_id=sedes.id
LEFT JOIN matricula ON estudiantes.id=matricula.estudiante_id
LEFT JOIN programas ON matricula.programa_id=programas.id
LEFT JOIN universidades ON programas.institucion_id=universidades.id
LEFT JOIN historial_academico_semestre ON matricula.id=historial_academico_semestre.matricula_id
LEFT JOIN semestre ON historial_academico_semestre.semestre_id=semestre.id

where estudiantes.documento=1088264375 LIMIT 1";

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





/**
*Para combox of student
*/
function getTipoDocumento($con)
{
	$sql = "SELECT * FROM tipos_documento";
	$ps = $con->prepare($sql);
	$ps->execute();
	$result = $ps->fetchAll();
	return $result;
}



 function getMuniResi($cn)
 {
 	$sql = "SELECT * FROM municipios";
 	$ps = $cn->prepare($sql);
 	$ps -> execute();
 	$result = $ps->fetchAll();
 	return $result;
 }

 function getFuenteRecurso($cn)
 {
 	$sql = "SELECT * FROM fuente_recursos";
 	$ps = $cn->prepare($sql);
 	$ps -> execute();
 	$result = $ps->fetchAll();
 	return $result;
 }

 function getInternado($cn)
 {
 	$sql = "SELECT * FROM internado";
 	$ps = $cn->prepare($sql);
 	$ps -> execute();
 	$result = $ps->fetchAll();
 	return $result;
 }

 function getServicioSocial($cn)
 {
 	$sql = "SELECT * FROM servicios_sociales";
 	$ps = $cn->prepare($sql);
 	$ps -> execute();
 	$result = $ps->fetchAll();
 	return $result;
 }


function getEstudianteServicioSocial($id,$cn)
 {
 	#echo "$id";
 	$sql = "SELECT * FROM estudiante_serviciosocial WHERE estudiante_serviciosocial_id='".$id."'";
 	$ps = $cn->prepare($sql);
 	$ps -> execute();
 	$result = $ps->fetchAll();
 	return $result;
 }


 function getGrado($cn)
 {
 	$sql = "SELECT * FROM grados";
 	$ps = $cn->prepare($sql);
 	$ps -> execute();
 	$result = $ps->fetchAll();
 	return $result;
 }

 function getTiposSangre($cn)
 {
 	$sql = "SELECT * FROM tipos_sangre";
 	$ps = $cn->prepare($sql);
 	$ps -> execute();
 	$result = $ps->fetchAll();
 	return $result;
 }

 function getColegio($cn)
 {
 	$sql = "SELECT * FROM sedes";
 	$ps = $cn->prepare($sql);
 	$ps -> execute();
 	$result = $ps->fetchAll();
 	return $result;
 }

 function getTipoPoblacion($cn)
 {
 	$sql = "SELECT * FROM tipos_poblacion";
 	$ps = $cn->prepare($sql);
 	$ps -> execute();
 	$result = $ps->fetchAll();
 	return $result;
 }

 function getZona($cn)
 {
 	$sql = "SELECT * FROM zonas";
 	$ps = $cn->prepare($sql);
 	$ps -> execute();
 	$result = $ps->fetchAll();
 	return $result;
 }

 function getGenero($cn)
 {
 	$sql = "SELECT * FROM generos";
 	$ps = $cn->prepare($sql);
 	$ps -> execute();
 	$result = $ps->fetchAll();
 	return $result;
 }

 function getEstrato($cn)
 {
 	$sql = "SELECT * FROM estrato";
 	$ps = $cn->prepare($sql);
 	$ps -> execute();
 	$result = $ps->fetchAll();
 	return $result;
 }

 function getSituacionAcademica($cn)
 {
 	$sql = "SELECT * FROM situaciones_academicas";
 	$ps = $cn->prepare($sql);
 	$ps -> execute();
 	$result = $ps->fetchAll();
 	return $result;
 }

 function getOjos($cn)
 {
 	$sql = "SELECT * FROM color_ojos";
 	$ps = $cn->prepare($sql);
 	$ps -> execute();
 	$result = $ps->fetchAll();
 	return $result;
 }

 function getDiscapacidades($cn)
 {
 	$sql = "SELECT * FROM discapacidades";
 	$ps = $cn->prepare($sql);
 	$ps -> execute();
 	$result = $ps->fetchAll();
 	return $result;
 }

 function getSituacionSocial($cn)
 {
 	$sql = "SELECT * FROM situaciones_sociales";
 	$ps = $cn->prepare($sql);
 	$ps -> execute();
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


function getSedes($con)
{
	$sql = "SELECT * FROM sedes";
	$ps = $con->prepare($sql);
	$ps->execute();
	#var_dump($ps);
	$result = $ps->fetchAll();
	#var_dump($result);
	return $result;
}

//Pendiente de eliminar 
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
	if (!isset($_SESSION['usuario']['user'])  || empty($_SESSION['usuario']['user'])) {
		header("Location: ".URL."index.php");
	}
}

	#devuelve el nombre del perfil
function shearcPerfilUser($id_user,$con)
{
	$sql = "SELECT roles.nombre AS namePerfil FROM roles,usuarios WHERE roles.id=usuarios.rol_id AND usuarios.id=$id_user";
	#var_dump($result);
	$ps = $con->prepare($sql);
	$ps->execute();
	$namePerfil = $ps->fetch()['namePerfil'];
	return $namePerfil;
}

function shearcUserLogin($usuario,$pass,$conexion)
{
	#echo "<br>Entro a buscar usuario: $usuario $pass <br>";
	$sql = "SELECT * FROM usuarios WHERE nombre=:usuario AND clave=:password LIMIT 1";
	$statement = $conexion->prepare($sql);
	$statement->bindParam(':usuario',$usuario);
	$statement->bindParam(':password',$pass);
	#var_dump($statement);
	$statement->execute();
	
	$result= $statement->fetch();
	
	if ($result != false) {
		return $result;
	}else{
		return false;

	}

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

function getSubjectByValue($table,$value,$nameColumn,$con)
{
	#Used by Estudiante
	#used by Ver estudiante
	$sql = "SELECT * FROM $table WHERE $nameColumn='".$value."'";
	$ps = $con->prepare($sql);
	#var_dump($campo);
	$ps->execute();
	#var_dump($ps);
	//echo "Sujeto";
	$resul = $ps->fetch();
	//var_dump($resul);
	
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
	var_dump($errores);
	return $errores;
}



function saveInstitu
(
	$nombre,
	$telefono,
	$municipio,
	$email,
	$direccion,
	$cn
)
{

	
	if (!$cn) {
		echo "Error en conexion";
	}else{
		try {
			//var_dump($conexion);
			$sql = "INSERT INTO instituciones  (nombre,telefono,email,direccion,ciudad_id)VALUES (:nombre,:telefono,:email,:direccion,:municipio)";

			$statement = $cn->prepare($sql);
			$statement->bindParam( ':nombre' , $nombre);
			$statement->bindParam( ':telefono' , $telefono);
			$statement->bindParam( ':email' , $email);
			$statement->bindParam( ':direccion' , $direccion);
			$statement->bindParam( ':municipio' , $municipio);
			#var_dump($statement);
			$result= $statement->execute();
			#var_dump($result);
		
			if ($result != false) {
				echo "error";
				//header('Location: '.URL.'gestion/new-institucion.php?select=i');
			}
		} catch (Exception $e) {
			echo "Linea de error: ".$e->getMessage();	
		}
			//echo "ejecuto el metodo";
	}

}
function saveProgram
(
	$codigosnies,
	$nombre,
	$semestres,
	$valor_semestre,
	$nivelAcademico,
	$institucion,
	$jornada,
	$cn
)
{	
	
	
			//var_dump($conexion);
		$sql = ("INSERT INTO programas(snies, nombre,cantidad_semestre,costo_semestre,nivel_academico_id,institucion_id,jornada_id) VALUES(  :snies,:nombre,:num_semestres,:costo_semestre,:nivel_academico_id,:institucion_id,:jornada_id)"
	);
		$stp = $cn->prepare($sql);
		$stp->bindParam( ':snies' , $codigosnies);
		$stp->bindParam( ':nombre' , $nombre);
		$stp->bindParam( ':num_semestres' , $semestres);
		$stp->bindParam( ':costo_semestre' , $valor_semestre);
		$stp->bindParam( ':nivel_academico_id' , $nivelAcademico);
		$stp->bindParam( ':institucion_id' , $institucion);
		$stp->bindParam( ':jornada_id' , $jornada);
		#var_dump($stp);
		$result= $stp->execute();
		#var_dump($result);
		if ($result != false) {
			header("Location:".URL."gestion/new-programa.php?select=p");
		}

	
}



#Registro del estudiante en la BD
function saveStudent
(
		$tipo_doc,
		$doc,
		$nombre_uno,
		$nombre_dos,
		$ape_uno,
		$ape_dos,
		$telefono_contacto,
		$email,
		$fecha_naci,
		$edad,
		$direccion_residencia,
		$municipio,
		$eps_estudiante,
		$fecha_ini,
		$fecha_fin,
		$fuente_recursos,
		$internado,
		$servicioSocial,
		$codigo_grado,
		$tipos_sangre,
		$sede,
		$tipos_poblacion,
		$zona,
		$genero,
		$estrato,
		$estado,
		$ojos,
		$discapacidad,
		$situacion_social,
		$observacion,
		$cn
)

{
	
/*

		echo "<br>******VARIABLES recibidads*****<br>";
		echo "<br>$tipo_doc<br>"; 	
		echo "<br>$doc<br>"; 
		echo "<br>$nombre_uno<br>"; 
		echo "<br>$nombre_dos<br>"; 
		echo "<br>$ape_uno<br>"; 
		echo "<br>$ape_dos<br>"; 
		echo "<br>$telefono_contacto<br>"; 
		echo "<br>$email<br>"; 
		echo "<br>$fecha_naci<br>"; 
		echo "<br>$edad<br>"; 
		echo "<br>$direccion_residencia<br>"; 
		echo "<br>$municipio<br>"; 
		echo "<br>$eps_estudiante<br>"; 
		echo "<br>$fecha_ini<br>"; 
		echo "<br>$fecha_fin<br>"; 
		echo "<br>$fuente_recursos<br>"; 
		echo "<br>$internado<br>"; 
		echo "<br>$servicioSocial<br>"; 
		echo "<br>$codigo_grado<br>"; 
		echo "<br>$tipos_sangre<br>"; 
		echo "<br>$sede<br>"; 
		echo "<br>$tipos_poblacion<br>"; 
		echo "<br>$zona<br>"; 
		echo "<br>$genero<br>"; 
		echo "<br>$estrato<br>"; 
		echo "<br>$estado<br>"; 
		echo "<br>$ojos<br>"; 
		echo "<br>$discapacidad<br>"; 
		echo "<br>$situacion_social<br>"; 
		echo "<br>$observacion<br>"; 
*/	

		$sql = "
	INSERT INTO estudiantes(documento, primer_nombre, segundo_nombre, primer_apellido, segundo_apellido, telefono_contacto, email, fecha_nacimiento, edad, direccion_residencia, EPS, fecha_inicio, fecha_fin, observacion, tipo_documento_id, tipo_sangre_id, zona_id, tipo_poblaion_id, estrato_id, genero_id, ojos_id, situacion_academica_id, situacion_social_id, grado_id, fuenterecurso_id, internado_id, discapacidad_id, municipio_id,sede_id) VALUES (
	:documento, :primer_nombre, :segundo_nombre, :primer_apellido, :segundo_apellido, :telefono_contacto, :email, :fecha_nacimiento, :edad, :direccion_residencia, :EPS, :fecha_inicio, :fecha_fin, :observacion, :tipo_documento_id, :tipo_sangre_id, :zona_id, :tipo_poblaion_id, :estrato_id, :genero_id, :ojos_id, :situacion_academica_id, :situacion_social_id, :grado_id, :fuenterecurso_id, :internado_id, :discapacidad_id, :ciudades_id,:sede_id
)";

	$state = $cn->prepare($sql);
	
	$state->bindParam(':documento', $doc);
	$state->bindParam(':primer_nombre', $nombre_uno);
	$state->bindParam(':segundo_nombre', $nombre_dos);
	$state->bindParam(':primer_apellido', $ape_uno);
	$state->bindParam(':segundo_apellido', $ape_dos);
	$state->bindParam(':telefono_contacto', $telefono_contacto);
	$state->bindParam(':email', $email);
	$state->bindParam(':fecha_nacimiento', $fecha_naci);
	$state->bindParam(':edad', $edad );
	$state->bindParam(':direccion_residencia', $direccion_residencia);
	$state->bindParam(':EPS', $eps_estudiante);
	$state->bindParam(':fecha_inicio', $fecha_ini);
	$state->bindParam(':fecha_fin', $fecha_fin);
	$state->bindParam(':observacion', $observacion);
	$state->bindParam(':tipo_documento_id', $tipo_doc);
	$state->bindParam(':tipo_sangre_id', $tipos_sangre);//?
	$state->bindParam(':zona_id', $zona);//?
	$state->bindParam(':tipo_poblaion_id', $tipos_poblacion);//?
	$state->bindParam(':estrato_id', $estrato);
	$state->bindParam(':genero_id', $genero);
	$state->bindParam(':ojos_id', $ojos);//?
	$state->bindParam(':situacion_academica_id', $estado);
	$state->bindParam(':situacion_social_id', $situacion_social);//?
	$state->bindParam(':grado_id', $codigo_grado);
	$state->bindParam(':fuenterecurso_id', $fuente_recursos);
	$state->bindParam(':internado_id', $internado);
	$state->bindParam(':discapacidad_id', $discapacidad);
	$state->bindParam(':ciudades_id',$municipio);
	$state->bindParam(':sede_id',$sede);

	#echo "<br> Mostrando sql: <br>";
	#var_dump($state);

	$resultE = $state->execute();
	#echo "<br>RESULTADO INSERCION ESTUDIANTE <br>";
	#var_dump($resultE);

		
		
		#Una vez se hace el insert para el estudiante retornamos si ID para ser ocupado en la tabla "estudiante_serviciosocial: campos ids estudiante_serviciosocial_id - servicio_social_id"

		$idEstudiante = getId("estudiantes",$cn);
		

		$sql = ("INSERT INTO estudiante_serviciosocial (estudiante_serviciosocial_id,servicio_social_id) VALUES (:estudiante,:servicio)");

		$stp = $cn->prepare($sql);
		$stp->bindParam(':estudiante',$idEstudiante);
		$stp->bindParam(':servicio',$servicioSocial);
		$resultS = $stp->execute();


		if ($resultE == false && $resultS == false) {
			return false;
		}else{
			return true;
		}

	}	



	function saveColegio(
	$nombre,
	$telefono,
	$siglas,
	$calendario,
	$dane,
	$cn
			)
	{


			//var_dump($conexion);
		$sql = ("INSERT INTO colegios(nombre, telefono, siglas, calendario, DANE) VALUES(:nombre,:telefono,:siglas,:calendario,:DANE)"
	);
		$stp = $cn->prepare($sql);
		
		$stp->bindParam( ':nombre' , $nombre);
		$stp->bindParam( ':telefono' , $telefono);
		$stp->bindParam( ':siglas' , $siglas);
		$stp->bindParam( ':calendario' , $calendario);
		$stp->bindParam( ':DANE' , $DANE);
		
		#var_dump($stp);
		$result= $stp->execute();
		#var_dump($result);
		if ($result != false) {
			header("Location:".URL."gestion/new-colegio.php?select=c");
		}

	}	

?>