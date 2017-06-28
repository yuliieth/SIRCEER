<?php 

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

function getSubjectsById($table,$id,$con)
{
	$sql = "SELECT * FROM $table WHERE id=$id LIMIT 1";
	$ps = $con->prepare($sql);
	$ps->execute();
	$resul = $ps->fetch();
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
?>