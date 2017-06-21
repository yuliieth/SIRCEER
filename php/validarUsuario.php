<?php 
include 'Conexion.php';
$con = getConexion();

$sql = "SELECT * FROM usuarios";
$ps = $con->prepare($sql);
$ps->execute();

$result=$ps->fetchAll();
#var_dump($result);
#print_r($result);

echo $_GET['u'];

foreach ($result as $campo) {
	echo $campo['nombre_completo'];
	echo "<br>";
	echo $campo['username'];
}
 ?>