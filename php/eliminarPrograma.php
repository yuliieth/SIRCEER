<?php 	session_start();
require_once 'Conexion.php';
require_once 'funciones.php';
include '../admin/config.php';
validateSession();
$con = getConexion($bd_config);
comprobarConexion($con);
$id = cleanData($_GET['id']);
#echo "$id";
if (empty($id)) {
	header("Location: ".URL."gestion/error.php");
		}else{
$sql = "DELETE FROM programa WHERE snies=$id";
$ps = $con->prepare($sql);
$result = $ps->execute();
if (!$result) {
	echo "<script>alert('El programa no se puede eliminar')</script>";
	echo "<script>location.href='".URL."gestion/buscar-programa.php?select=p';</script>";
	#header("Location: ".URL."gestion/error.php");
}else{
	echo "<script>alert('El programa ha sido eliminado')</script>";
	echo "<script>location.href='".URL."gestion/buscar-programa.php?select=p';</script>";
	#header("Location: ".URL."gestion/buscar-programa.php?select=p");
}
	
}
?>