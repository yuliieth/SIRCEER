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
$rows = obtener_estudiante($config_global['estudiantes_por_pagina'],$cn);

if ($_SERVER['REQUEST_METHOD'] == "POST") {
	#var_dump($_POST);

	$palabra = $_POST['busqueda'];

	$sql = "SELECT estudiantes.documento AS doc_estudiante,estudiantes.primer_nombre,estudiantes.segundo_nombre,estudiantes.primer_apellido,estudiantes.segundo_apellido,estudiantes.edad, generos.nombre AS genero, zonas.nombre AS zona,grados.nombre AS grado,municipios.nombre AS municipio, sedes.nombre AS sede FROM estudiantes LEFT JOIN generos ON estudiantes.genero_id=generos.id LEFT JOIN zonas ON estudiantes.zona_id=zonas.id LEFT JOIN grados ON estudiantes.grado_id=grados.id LEFT JOIN municipios ON estudiantes.municipio_id=municipios.id LEFT JOIN sedes ON estudiantes.sede_id=sedes.id WHERE
		estudiantes.documento LIKE '%".$palabra."%' OR
		estudiantes.primer_nombre LIKE '%".$palabra."%' OR
		estudiantes.segundo_nombre LIKE '%".$palabra."%' OR
		estudiantes.primer_apellido LIKE '%".$palabra."%' OR
		estudiantes.segundo_apellido LIKE '%".$palabra."%' OR
		estudiantes.genero_id LIKE '%".$palabra."%' OR
		estudiantes.zona_id LIKE '%".$palabra."%' OR
		estudiantes.grado_id LIKE '%".$palabra."%' OR
		estudiantes.fecha_inicio LIKE '%".$palabra."%' OR
		estudiantes.municipio_id LIKE '%".$palabra."%' OR
		estudiantes.sede_id LIKE '%".$palabra."%'";
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
<?php require "../view/buscar-estudiante.view.php" ?>

