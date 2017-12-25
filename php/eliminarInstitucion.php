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
$ps_IM = $ps_IM->execute();
$ps_IM =$ps_IM;
var_dump($ps_IM);

#DELETE FROM A WHERE ID = (SELECT ID FROM B);

#Y finalmente institucion
$sqlI = "DELETE FROM institucion WHERE id=$id";
$ps_I = $con->prepare($sqlI);
$ps_I = $ps_I->execute();
$ps_I = $ps_I;
var_dump($ps_I);

if ($ps_IM != null && $ps_I != null) {
	header("Location:".URL."gestion/buscar-institucion.php?select=i");
}else
{
	echo "No se pudo realizar la transaccion";
}
	
}
?>