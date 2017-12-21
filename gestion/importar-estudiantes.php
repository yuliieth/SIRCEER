<?php session_start(); ?>
<?php require_once '../admin/config.php';
require_once '../php/funciones.php';
require_once '../php/Conexion.php';
validateSession();
$cn = getConexion($bd_config);
comprobarConexion($cn);
?>

<?php require("../view/importar-estudiantes.view.php") ?>