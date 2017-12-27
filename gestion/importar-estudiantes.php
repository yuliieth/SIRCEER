<?php session_start(); ?>
<?php require_once '../admin/config.php';
require_once '../php/funciones.php';
require_once '../php/Conexion.php';
validateSession();
$cn = getConexion($bd_config);
comprobarConexion($cn);

#-------------PROCESANDO HOJA----------------------------

require '../PHPExcel/IOFactory.php';

$nombreArchivo = "agenda";

#indicamos que vamos a cargar el archivo
#llama a la funcion  PHPEXCEL_IOFactory
#y luego a la funcion load
$ocjPHPEXCEL = PHPEXCEL_IOFactory::load($nombreArchivo);
#Establecemos en que hoja vamos a leer por medio del objeto
$ocjPHPEXCEL->setActiveShetIndex(0);

#obtenemos el numero de filas en la hoja activa
$numRows = $ocjPHPEXCEL->setActiveShetIndex(0)->getHighestRow();

#Creamos la tabla para mostrar


#https://www.youtube.com/watch?v=4Sw24E5Hi5M
?>

<?php require("../view/importar-estudiantes.view.php") ?>