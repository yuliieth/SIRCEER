<?php 	session_start();
require_once 'Conexion.php';
require_once 'funciones.php';
include '../admin/config.php';
validateSession();
$con = getConexion($bd_config);
comprobarConexion($con);
$id = cleanData($_GET['id']);
echo "$id";
if (empty($id)) {
	header("Location: ".URL."gestion/error.php");
}
else
{
$sql = "DELETE FROM programa WHERE id=$id";
$ps = $con->prepare($sql);
$ps->execute();
if (!$ps) {
	header("Location: ".URL."gestion/error.php");
}else
{
	#header("Location: ".URL."gestion/buscar-programa.php?select=p");
}
	
}
?>