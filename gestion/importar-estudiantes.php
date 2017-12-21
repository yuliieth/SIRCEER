<?php session_start(); ?>
<?php require_once '../admin/config.php';
require_once '../php/funciones.php';
require_once '../php/Conexion.php';
validateSession();
$cn = getConexion($bd_config);
comprobarConexion($cn);

#-------------PROCESANDO HOJA----------------------------

if ( substr( $_FILES(['excel'],['name']) , -3) == "cvs" ) {
	$fecha = Date("Y-m-d");
	$carpeta = "tmp_excel/";
	$excel = $fecha. $fecha . $_FILES["excel"]["name"];

	#movemos la hoja a la carpet temporal creada
	move_uploaded_file($_FILES["excel"]["tmp_name"],$carpeta$excel);

	#con permisos de lectura abrimos el archivo en la ruta estipulada
	$fp = fopen("$carpeta$excel", "r");

	$row = 1;

	//fgetcsv. obtiene los valores que estan en el csv y los extrae.
	while ($data = fgetcsv($fp,1000,",")) {
		
		if ($row != 1) {
			
		}
	}
}

?>

<?php require("../view/importar-estudiantes.view.php") ?>