<?php session_start(); ?>
<?php require_once '../admin/config.php';
require_once '../php/funciones.php';
require_once '../php/Conexion.php';
validateSession();
$cn = getConexion($bd_config);
comprobarConexion($cn);

#-------------PROCESANDO HOJA----------------------------

if ( isset($_FILES['excel']['name']) ) {
	if (substr( $_FILES['excel']['name'] , -3) == "cvs") {#Gobernacion maneja XLS
	
	$fecha = Date("Y-m-d");
	$carpeta = "tmp_excel/";
	$excel = $fecha. "-". $_FILES["excel"]["name"];

	#movemos la hoja a la carpet temporal creada
	move_uploaded_file($_FILES["excel"]["tmp_name"],"$carpeta$excel");

	#con permisos de lectura abrimos el archivo en la ruta estipulada
	$fp = fopen("$carpeta$excel", "r");

	$row = 1;

	//fgetcsv. obtiene los valores que estan en el csv y los extrae.
	while ($data = fgetcsv($fp,1000,",")) {
		
		if ($row != 1) {
			#Campos hoja: 
			#Nombres + apellidos, documento, fecha naci, edad, sisben o estrato
			
		}
	}
}}
#https://mega.nz/#F!on4WSJqZ!7Qhjr37tl57S8VKeoUt8dA
?>

<?php require("../view/importar-estudiantes.view.php") ?>