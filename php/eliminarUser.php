<?php 	
include 'Conexion.php';
$con = getConexion();

$sql = "DELETE * FROM usuarios WHERE id=$_GET['u']";
$ps = $con->prepare($sql);
$ps->execute();

echo("Usuario eliminado");

 ?>