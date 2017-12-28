<?php session_start(); ?>
<?php require_once '../admin/config.php';
require_once '../php/funciones.php';
require_once '../php/Conexion.php';
require '../PHPExcel/IOFactory.php';
validateSession();
$cn = getConexion($bd_config);
comprobarConexion($cn);
#-------------PROCESANDO HOJA----------------------------
$estado = false;
#var_dump($_POST);
if (isset($_POST['Importar'])) {
	#var_dump($_FILES);	
$nombreArchivo = $_FILES['myfile']['name'];
#indicamos que vamos a cargar el archivo
#llama a la funcion  PHPEXCEL_IOFactory
#y luego a la funcion load
$ocjPHPEXCEL = PHPEXCEL_IOFactory::load($nombreArchivo);
#Establecemos en que hoja vamos a leer por medio del objeto
$ocjPHPEXCEL->setActiveSheetIndex(0);
#obtenemos el numero de filas en la hoja activa
$numRows = $ocjPHPEXCEL->setActiveSheetIndex(0)->getHighestRow();
$estado = true;
header("Location".URL."gestion/importar-estudiantes.php");
#https://www.youtube.com/watch?v=4Sw24E5Hi5M
}

?>

<?php require("../view/importar-estudiantes.view.php") ?>