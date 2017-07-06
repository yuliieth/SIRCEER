<?php 	
require_once 'Conexion.php';
require_once 'funciones.php';
$con = getConexion();
comprobarConexion($con);
$id = $_GET['id'];
$sql = "DELETE FROM estudiantes WHERE id=$id";
$ps = $con->prepare($sql);
$ps->execute();
if (!$ps) {
	echo "Error en usuarios_perfiles";
}else{
	echo("Usuario eliminado");
}
header("Location: ../gestion/buscar-estudiantes.php")




?>