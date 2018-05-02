<?php session_start(); ?>
<?php  
require_once '../admin/config.php';
require_once '../php/funciones.php';
require_once '../php/Conexion.php';

$pagina = isset($_GET['p']) ? (int)$_GET['p'] : 1;
validateSession();
$cn = getConexion($bd_config);
comprobarConexion($cn);

#Declaracion variable global 
$rows = obtener_instituciones($config_global['result_por_pagina'],$cn);

if ($_SERVER['REQUEST_METHOD'] == "POST") {
	#var_dump($_POST);

	$palabra = $_POST['busqueda'];

	$sql = "SELECT instituciones.id AS id_institucion,instituciones.nombre AS name_institucion,instituciones.telefono, instituciones.siglas,instituciones.calendario,instituciones.DANE,sectores.nombre AS sector,municipios.nombre AS name_municipio  FROM instituciones  LEFT JOIN municipios ON municipios.id=instituciones.municipio_id LEFT JOIN sectores ON sectores.id=instituciones.sector_id WHERE
		instituciones.nombre LIKE '%".$palabra."%' OR
		instituciones.telefono LIKE '%".$palabra."%' OR
		instituciones.siglas LIKE '%".$palabra."%' OR
		instituciones.calendario LIKE '%".$palabra."%' OR
		instituciones.DANE LIKE '%".$palabra."%' OR
		sectores.nombre LIKE '%".$palabra."%' OR
		municipios.nombre LIKE '%".$palabra."%'";
	$ps = $cn->prepare($sql);
	#var_dump($ps);
	$ps->execute();
	$rows = $ps->fetchAll();

	
}

#var_dump($rows);
#$allEntitys = getStudentsInsitutesAndprogramns($bd_config);
#$estudiantes = getAllSubject("estudiante",$cn);
#var_dump($allEntitys);
?>
<?php require("../view/buscar-institucion.view.php") ?>

