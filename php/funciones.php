<?php 
	
	function comprobarConexion($con)
	{
		global $con;
		if (!$con) {
		echo "Ocurrio un error en la Conexion";
	}
	}



	function traerUsuarios($con)
	{
		$sql = "SELECT usuarios.id AS id_usuarios,nombre_completo,username,password,email,nombre FROM usuarios INNER JOIN usuarios_perfiles ON usuarios.id=usuarios_perfiles.usuarios_id INNER JOIN perfiles ON  perfiles.id=usuarios_perfiles.perfiles_id";
			return 	$con->query($sql);
	#var_dump($sta);
	}

	function eliminarUsuario($con,$id)
	{
		$sql = "DELETE FROM usuarios WHERE id=$id";
		$stm = $con->prepare($sql);
		$stm->execute();
	}
	
 ?>