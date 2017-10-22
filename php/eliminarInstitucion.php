<?php 	session_start();
require_once 'Conexion.php';
require_once 'funciones.php';
include '../admin/config.php';
validateSession();
$con = getConexion($bd_config);
comprobarConexion($con);
$id = cleanData($_GET['id']);
#var_dump($id);
if (empty($id)) {
	header("Location:".URL."gestion/error.php");
}else{
	#CONDICION PRIMERO ELIMINAR EN: INSTITUCION_MUNICIPIO (consultar todos los programa que tiene: snies),EVALUACION_SEMESTRAL y PROGRAMA
#Institucion_municipio
$sql = "DELETE FROM institucion_municipio WHERE institucion_id=$id";
$ps_IM = $con->prepare($sql);
$ps_IM->execute();

#Evaluacion_semestral
$sql = "DELETE FROM evaluacion_semestral WHERE evaluacion_semestral.programa_snies = $programa_snies";
$ps_ES = $con->prepare($sql);
$ps_ES->execute();

var_dump($id);
$sql = "DELETE FROM programa WHERE institucion_id=$id";
$ps_P = $con->prepare($sql);
$ps_P->execute();



#DELETE FROM A WHERE ID = (SELECT ID FROM B);

#Y finalmente institucion
$sql = "DELETE FROM institucion WHERE id=$id";
$ps = $con->prepare($sql);
$ps->execute();

if (!$ps or !$ps_IM or !$ps_P or !$ps_ES) {
	header("Location:".URL."gestion/error.php");
}else
{
	header("Location:".URL."gestion/buscar-institucion.php?select=i");
}
	
}
?>