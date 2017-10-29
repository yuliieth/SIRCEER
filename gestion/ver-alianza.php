<?php session_start(); ?>
<?php  
require_once '../admin/config.php';
require_once '../php/Conexion.php';
require_once '../php/funciones.php';
require_once '../mpdf60/mpdf.php';
validateSession();
$cn = getConexion($bd_config);
comprobarConexion($cn);

$id = $_GET['id'];

$alianza = getAllAlianzaRelations($id,$cn);
var_dump($alianza);
?>
<?php #require("../view/ver-alianza.view.php") ?>