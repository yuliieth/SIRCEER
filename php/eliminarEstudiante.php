<?php 	session_start();
require_once 'Conexion.php';
require_once 'funciones.php';
include '../admin/config.php';
validateSession();
$con = getConexion($bd_config);
comprobarConexion($con);
$id = cleanData($_GET['id']);
if (empty($id)) {
	header("Location: ".URL."gestion/error.php");
}
else
{
$sql="DELETE FROM evaluacion_semestral WHERE estudiante_documento=$id";
$ps = $con->prepare($sql);
$ps->execute();
$sql = "DELETE FROM estudiante WHERE documento=$id";
var_dump($sql);
$ps = $con->prepare($sql);
#var_dump($ps);
$ps->execute();
if (!$ps) {
	header("Location: ".URL."gestion/error.php");
}else
{
	header("Location: ".URL."gestion/buscar-estudiantes.php?select=e");
}
	
}
?>