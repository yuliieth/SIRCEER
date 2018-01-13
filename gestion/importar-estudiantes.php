<?php session_start(); ?>
<?php require_once '../admin/config.php';
require_once '../php/funciones.php';
require_once '../php/Conexion.php';
validateSession();
$cn = getConexion($bd_config);
comprobarConexion($cn);
#-------------PROCESANDO HOJA----------------------------
$estado = false;
#var_dump($_POST);
if (isset($_POST['Importar'])) {
	if ( substr($_FILES['myfile']['name'], -4) == "xlsx" ) {

$nombreArchivo = $_FILES['myfile']['name'];

$destino = "back_".$nombreArchivo;

if (copy($_FILES['myfile']['tmp_name'], $destino)) {
	echo "Archivo cargado con exito!";
}else
{
	echo "Error al cargar el archivo";
}

if (file_exists("back_".$nombreArchivo)) {

require_once '../libs/PHPExcel/IOFactory.php';

echo "Exists";

#indicamos que vamos a cargar el archivo
#llama a la funcion  PHPEXCEL_IOFactory
#y luego a la funcion load
$objPHPEXCEL = PHPEXCEL_IOFactory::load("back_".$nombreArchivo);
#Establecemos en que hoja vamos a leer por medio del objeto
$objPHPEXCEL->setActiveSheetIndex(0);
#obtenemos el numero de filas en la hoja activa
$numRows = $objPHPEXCEL->setActiveSheetIndex(0)->getHighestRow();
$estado = true;
echo $numRows;
#Finalmente se hace el insert
#header("Location:".URL."gestion/importar-estudiantes.php?select=e");
#https://www.youtube.com/watch?v=4Sw24E5Hi5M
}
	}
}

?>

<?php require("../view/importar-estudiantes.view.php") ?>