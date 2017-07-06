<?php 	session_start();
require_once 'Conexion.php';
require_once 'funciones.php';
validateSession();
$con = getConexion();
comprobarConexion($con);
$id = cleanData($_GET['id']);
if (empty($id)) {
	header("Location: ../gestion/error.php");
}
else
{
$sql = "DELETE FROM planteles_educativos WHERE id=$id";
$ps = $con->prepare($sql);
$ps->execute();
if (!$ps) {
	header("Location: ../gestion/error.php");
}else
{
	header("Location: ../gestion/buscar-institucion.php?select=i");
}
	
}
?>