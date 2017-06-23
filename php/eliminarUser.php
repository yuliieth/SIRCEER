<?php 	
require_once 'Conexion.php';
require_once 'funciones.php';
$con = getConexion();
comprobarConexion($con);
$id = $_POST['id'];
$perfil = 3;
$sql1 = "DELETE FROM usuarios_perfiles WHERE usuarios_id='$id' AND perfiles_id='$perfil'";

$sql2 = "DELETE * FROM usuarios WHERE id='$id'";
$ps = $con->prepare($sql1);
$ps->execute();

$ps = $con->prepare($sql2);
$ps->execute();



echo("Usuario eliminado");

 ?>