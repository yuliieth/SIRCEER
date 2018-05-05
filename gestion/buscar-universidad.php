<?php session_start(); ?>
<?php  
require_once '../admin/config.php';
require_once '../php/funciones.php';
require_once '../php/Conexion.php';

$pagina = isset($_GET['p']) ? (int)$_GET['p'] : 1;
validateSession();
$cn = getConexion($bd_config);
comprobarConexion($cn);


#name BD
$name_bd = "universidades";

#Declaracion variable global 
$rows = obtener_universidades($config_global['result_por_pagina'],$cn);

if ($_SERVER['REQUEST_METHOD'] == "POST") {
	#var_dump($_POST);

	$palabra = $_POST['busqueda'];

	$sql = "SELECT universidades.id AS id_universidad,universidades.nombre AS universidad, universidades.telefono,universidades.email,universidades.direccion, municipios.nombre AS municipio,alianzas.nombre AS alianza FROM universidades LEFT JOIN municipios ON municipios.id=universidades.ciudad_id LEFT JOIN alianzas ON alianzas.id=universidades.alianza_id WHERE
		programas.nombre LIKE '%".$palabra."%' OR
		programas.telefono LIKE '%".$palabra."%' OR
		programas.email LIKE '%".$palabra."%' OR
		programas.direccion LIKE '%".$palabra."%' OR
		municipios.nombre LIKE '%".$palabra."%' OR
		alianzas.nombre LIKE '%".$palabra."%'";

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



<?php require("../view/buscar-universidad.view.php") ?>

