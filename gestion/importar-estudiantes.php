<?php session_start(); ?>
<?php require_once '../admin/config.php';
require_once '../php/funciones.php';
require_once '../php/Conexion.php';
require_once '../libs/PHPExcel1.8.0/Classes/PHPExcel/IOFactory.php';
validateSession();
$cn = getConexion($bd_config);
comprobarConexion($cn);
#-------------PROCESANDO HOJA----------------------------
$estado = false;
#var_dump($_POST);
if (isset($_POST['Importar'])) {
	if ( substr($_FILES['myfile']['name'], -4) == "xlsx" ) {

$nombreArchivo = $_FILES['myfile']['name'];

$destino = '../tmp_excel/back_'.$nombreArchivo;
echo "<br> Destino: $destino <br> ";

var_dump($_FILES);

echo "Copying...";
if (copy($_FILES['myfile']['tmp_name'], $destino)) {
	#echo "Archivo cargado con exito!";
}else
{
	echo "Error al cargar el archivo";
}

if (file_exists("../tmp_excel/back_".$nombreArchivo)) {

#Cambiamos parametros de PHP
//set_time_limit('max_execution_time','1200'); //5 minutos ó  set_time_limit 



/**
VERSION PHPEXCEL: 1.8.0 2014
REQUESITOS: EXTENSION ZIP INSTALADA
LINEA: PHPExcel_Settings::setZipClass(PHPExcel_Settings::PCLZIP);
SE COMPRUEBA QUE SOLO FUNCIONA ESTE ENTORNO CON PHPEXCEL VERSION 2017, EL QUE ESTA HABILITADO EN ESTE MOMENTO
PHP 7.1
*/
echo "Exists";
PHPExcel_Settings::setZipClass(PHPExcel_Settings::PCLZIP);
#indicamos que vamos a cargar el archivo
#llama a la funcion  PHPEXCEL_IOFactory
#y luego a la funcion load
$objPHPEXCEL = PHPEXCEL_IOFactory::load('../tmp_excel/back_'.$nombreArchivo);
#var_dump($objPHPEXCEL);
#Establecemos en que hoja vamos a leer por medio del objeto
$objPHPEXCEL->setActiveSheetIndex(0);
#obtenemos el numero de filas en la hoja activa
$numRows = $objPHPEXCEL->setActiveSheetIndex(0)->getHighestRow();




echo $numRows;


	for ($i=2; $i <= 30; $i++) { 

		//Extrae datos por fila

		$anio = $objPHPEXCEL ->getActiveSheet()->getCell('A'.$i)->getCalculatedValue();

		#relacion: Matriculado, No matriculado
		$estado = $objPHPEXCEL ->getActiveSheet()->getCell('B'.$i)->getCalculatedValue();
		#Validar si este registro em $estado ya esta en la tabla situaciones_academicas column nombre:
		#Se tiene: valor, nombre table, nombre campo
		#se necesita: Crear funcion que reciba el valor, nombre tabla, nombre campo, conexion crear sql de tipo select, la funcion devuelve true o false.
		$estado = validarYregistrar('situaciones_academicas','nombre','descripcion',$estado,$cn);
		echo "<br> Estado academico: $estado <br>";
		

		#Relacion:Jerarquia=municipio
		$jerarquia = utf8_decode($objPHPEXCEL ->getActiveSheet()->getCell('C'.$i)->getCalculatedValue());
		$municipio =  validarYregistrar('municipios','nombre','departamentos_id',$jerarquia,$cn);
		echo "<br> municipio: $municipio <br>";


		echo "<br>**********institucion*************<br>";
		#*****COLEGIO***************
		#1. Validar existencia
		#2. Registrar(si aplica)
		#3. Obtener id
		#Atributo para colegios
		$institucion =  utf8_decode( $objPHPEXCEL ->getActiveSheet()->getCell('D'.$i)->getCalculatedValue());
		
		#Atributo para colegios
		$dane = $objPHPEXCEL ->getActiveSheet()->getCell('E'.$i)->getCalculatedValue();
		
		#Atributo para colegios
		$calendario = $objPHPEXCEL ->getActiveSheet()->getCell('F'.$i)->getCalculatedValue();
		

		#Atributo para colegios, primero debe ser validado e insertado en la tabla sectores
		$sector = $objPHPEXCEL ->getActiveSheet()->getCell('G'.$i)->getCalculatedValue();
		$sector = validarYregistrar('sectores','nombre','descripcion',$sector,$cn);

		#Validar existencia de la institucion
		echo "Validando registro institucion...<br>";
		$estado_busqueda = validarRegistro('instituciones','nombre',$institucion,$cn);
		if ( empty( $estado_busqueda) ){
			
			#No Hay coincidencia, registra y devuelve su ID
			$institucion = saveSchool($institucion,$calendario,$dane,$sector,$municipio,$cn);

		}else{

		$institucion = $estado_busqueda;
		}

		echo "<br> Institucion: $institucion <br>";
		echo "<br>***********************<br>";
		#****************************



		echo "<br>**********SEDES*************<br>";
		//******sedes******
		#Relacion: sedes(nombre, codigo_dane, consecutivo,zona,modelo,colegio)
		$sede = utf8_decode( $objPHPEXCEL ->getActiveSheet()->getCell('H'.$i)->getCalculatedValue());
		echo "<br>Nombre sede: $sede<br>";

		$codigo_dane_sede = $objPHPEXCEL ->getActiveSheet()->getCell('I'.$i)->getCalculatedValue();
		echo "<br>Codigo dane: $codigo_dane_sede<br>";
		$consecutivo = $objPHPEXCEL ->getActiveSheet()->getCell('J'.$i)->getCalculatedValue();
		echo "<br>consecutivo: $consecutivo<br>";
		#Relacion: Considerar validaryregistrar
		$zona_sede = $objPHPEXCEL ->getActiveSheet()->getCell('K'.$i)->getCalculatedValue();
		echo "<br>Validando zonas para sede<br>";
		$zona_sede = validarYregistrar('zonas','nombre','descripcion',$zona_sede,$cn);
		echo "<br>Id zona sede: $zona_sede<br>";

		#Relacion:
		$modelo = utf8_decode( $objPHPEXCEL ->getActiveSheet()->getCell('O'.$i)->getCalculatedValue());
		$modelo = validarYregistrar('modelos','nombre','descripcion',$modelo,$cn);
		echo "<br>Id modelo: $modelo<br>";
		#validamos si existe coincidencia para la sede
		$estado_busqueda = validarRegistro('sedes','nombre',$sede,$cn);
		echo "<br>Valor estado sede: $estado_busqueda <br>";
		if ( empty( $estado_busqueda) ){
			#No hay coincidencia, entonces recoje datos de las columns
			echo "<br>No hay registro aun de la sede:<br>";
			#Como no hubo coincidencia, registra y devuelve su ID
			$sede = saveSede($sede,$codigo_dane_sede,$consecutivo,$zona_sede,$modelo,$institucion,$municipio,$cn);
			echo "<br>ID sede registrada: $sede<br>";
		}else{
			echo "<br>Ya hay sede registrada<br>";
			$sede = $estado_busqueda;
			echo "<b> Sede: $sede <br>";
		}

		echo "<br>***********************<br>";

		//****************************************




		#Relacion:
		$jornada = utf8_decode( $objPHPEXCEL ->getActiveSheet()->getCell('L'.$i)->getCalculatedValue());
		$jornada = validarYregistrar('jornadas','nombre','descripcion',$jornada,$cn);

		echo "<br>***********ESTUDIANTE************<br>";
		///******************ESTUDIANTE********************
		#Relacion:
		$codigo_grado = $objPHPEXCEL ->getActiveSheet()->getCell('M'.$i)->getCalculatedValue();
		$codigo_grado = validarYregistrar('grados','nombre','descripcion',$codigo_grado,$cn);
		echo "<b> grado: $codigo_grado <br>";


		#Relacion: ?
		$grupo = $objPHPEXCEL ->getActiveSheet()->getCell('N'.$i)->getCalculatedValue();

		#?
		$motivo = $objPHPEXCEL ->getActiveSheet()->getCell('P'.$i)->getCalculatedValue();

		#ok
		$fecha_ini = "2018-01-27";
		//$objPHPEXCEL ->getActiveSheet()->getCell('Q'.$i)->getCalculatedValue();
		echo "<br>Fecha inicio: $fecha_ini<br>";
		#ok
		$fecha_fin = $objPHPEXCEL ->getActiveSheet()->getCell('R'.$i)->getCalculatedValue();

		#?
		$nui = $objPHPEXCEL ->getActiveSheet()->getCell('S'.$i)->getCalculatedValue();

		#Relacion:
		$estrato = $objPHPEXCEL ->getActiveSheet()->getCell('T'.$i)->getCalculatedValue();
		$estrato = validarYregistrar('estrato','nombre','descripcion',$estrato,$cn);
		echo "<b> Estrato: $estrato <br>";


		#Relacion: ?
		$sisben_tres = $objPHPEXCEL ->getActiveSheet()->getCell('U'.$i)->getCalculatedValue();
		#?
		$per_id = $objPHPEXCEL ->getActiveSheet()->getCell('V'.$i)->getCalculatedValue();

		#Atributo
		$doc = $objPHPEXCEL ->getActiveSheet()->getCell('W'.$i)->getCalculatedValue();
		echo "<br> Documento: $doc <br>";


		#Relacion:
		
		$tipo_doc = $objPHPEXCEL ->getActiveSheet()->getCell('X'.$i)->getCalculatedValue();
		$tipo_doc = validarYregistrar('tipos_documento','nombre','descripcion',$tipo_doc,$cn);
		echo "<br> Tipo de document: $tipo_doc <br>";
		

		#atributo
		$ape_uno = utf8_decode( $objPHPEXCEL ->getActiveSheet()->getCell('Y'.$i)->getCalculatedValue());
		echo "<br> Primer apellido: $ape_uno <br>";
		#atributo
		$ape_dos = utf8_decode( $objPHPEXCEL ->getActiveSheet()->getCell('Z'.$i)->getCalculatedValue());
		echo "<br> apellido dos: $ape_dos <br>";
		#atributo
		$nombre_uno = utf8_decode( $objPHPEXCEL ->getActiveSheet()->getCell('AA'.$i)->getCalculatedValue());
		echo "<br> Primer nombre: $nombre_uno <br>";
		#atributo
		$nombre_dos = utf8_decode( $objPHPEXCEL ->getActiveSheet()->getCell('AB'.$i)->getCalculatedValue());
		echo "<br> Nombre dos: $nombre_dos <br>";

		#Relacion:
		$genero = $objPHPEXCEL ->getActiveSheet()->getCell('AC'.$i)->getCalculatedValue();
		$genero = validarYregistrar('generos','nombre','descripcion',$genero,$cn);
		echo "<br> Genero: $genero <br>";

		$fecha_naci = "1989-01-17";
		//= $objPHPEXCEL ->getActiveSheet()->getCell('AD'.$i)->getCalculatedValue();
		echo "<br> Fecha de nacimieno: $fecha_naci <br>";

		#Relacion: ?
		$matricula_contratada = $objPHPEXCEL ->getActiveSheet()->getCell('AE'.$i)->getCalculatedValue();
		echo "<br> Matricula contratada: $matricula_contratada <br>";

		#Relacion: 
		$fuente_recursos = $objPHPEXCEL ->getActiveSheet()->getCell('AF'.$i)->getCalculatedValue();
		$fuente_recursos = validarYregistrar('fuente_recursos','nombre','descripcion',$fuente_recursos,$cn);
		echo "<br> Fuente de recursos: $fuente_recursos <br>";

		#Relacion:
		$internado = $objPHPEXCEL ->getActiveSheet()->getCell('AG'.$i)->getCalculatedValue();
		$internado = validarYregistrar('internado','nombre','descripcion',$internado,$cn);
		echo "<br> Internado: $internado <br>";

		#atributo
		$eps_estudiante = $objPHPEXCEL ->getActiveSheet()->getCell('AH'.$i)->getCalculatedValue();
		echo "<br> EPS: $eps_estudiante <br>";

		#?
		$num_contrato = $objPHPEXCEL ->getActiveSheet()->getCell('AI'.$i)->getCalculatedValue();

		#Relacion: ?
		$apoyo_aca_especial = $objPHPEXCEL ->getActiveSheet()->getCell('AJ'.$i)->getCalculatedValue();

		#Relacion: ?
		$srpa = $objPHPEXCEL ->getActiveSheet()->getCell('AK'.$i)->getCalculatedValue();

		#Relacion:
		$discapacidad = $objPHPEXCEL ->getActiveSheet()->getCell('AL'.$i)->getCalculatedValue();
		$discapacidad = validarYregistrar('discapacidades','nombre','descripcion',$discapacidad,$cn);

		echo "<br> Discapacidades: $discapacidad <br>";

		echo "<br>***********************<br>";


/*
 echo "<br>$anio <br>";
 echo "<br>$jerarquia <br>";
 echo "<br>$dane <br>";
 echo "<br>$calendario <br>";
 echo "<br>$sector <br>";
 echo "<br>$sede <br>";
 echo "<br>$codigo_dane_sede <br>";
 echo "<br>$consecutivo <br>";
 echo "<br>$zona_sede <br>";
 echo "<br>$jornada <br>";
 echo "<br>$grupo <br>";
 echo "<br>$modelo <br>";
 echo "<br>$motivo <br>";
// echo "<br>$nui <br>";
 //echo "<br>$sisben_tres <br>";
 //echo "<br>$per_id <br>";

*/
#variables pendientes
 $telefono_contacto = "SIN REGISTRO";
 $email = "SIN REGISTRO";
 $edad = "0";
 $direccion_residencia = "SIN REGISTRO";
 $observacion = "SIN REGISTRO";
 $tipos_sangre = validarRegistro('tipos_sangre','nombre','NO APLICA',$cn);
 $tipos_poblacion = validarRegistro('tipos_poblacion','nombre','NO APLICA',$cn);
 $ojos = validarRegistro('color_ojos','color','NO APLICA',$cn);
 $situacion_social = validarRegistro('situaciones_sociales','nombre','NO APLICA',$cn);
 #$discapacidad = getSubjectByValue('discapacidades','NO APLICA','nombre',$cn);
 $municipio = validarRegistro('municipios','nombre','NO APLICA',$cn);
 $zona = validarRegistro('zonas','nombre','NO APLICA',$cn);
 
 echo "<br>******MOSTRANDO VARIABLES:*********<br>";
 echo "<br>Institucion: $institucion <br>";
 echo "<br> Estrato $estrato <br>";
 echo "<br>Fecha de inicio: $fecha_ini <br>";
 echo "<br>Fecha de fin: $fecha_fin <br>";
 echo "<br>Codigo grado: $codigo_grado <br>";
 echo "<br>Estado academico: $estado <br>";
 echo "<br>Documento: $doc <br>";
 echo "<br>Tipo de documento $tipo_doc <br>";
 echo "<br>Primer apellido: $ape_uno <br>";
 echo "<br>Segundo apellido $ape_dos <br>";
 echo "<br>Primer nombre: $nombre_uno <br>";
 echo "<br>segundo nombre: $nombre_dos <br>";
 echo "<br>Genero: $genero <br>";
 //echo "<br>Nombre dos ?: $nombre_dos <br>";
 echo "<br>Fecha nacimiento: $fecha_naci <br>";
 //echo "<br>$matricula_contratada <br>";
 echo "<br>Fuente de recursos¨: $fuente_recursos <br>";
 echo "<br>Internado: $internado <br>";
 echo "<br>EPS: $eps_estudiante <br>";
 //echo "<br>$num_contrato <br>";
 //echo "<br>$apoyo_aca_especial <br>";
 //echo "<br>$srpa <br>";
 echo "<br>Discapacidade : $discapacidad <br>";


 echo "<br> Telefono de contacto: $telefono_contacto <br>";
 echo "<br> Email: $email <br>";
 echo "<br> Edad: $edad <br>";
 echo "<br> Direccion residencia: $direccion_residencia <br>";
 echo "<br> Observacion: $observacion <br>";
 echo "<br> Tipo de sangre: $tipos_sangre <br>";
 echo "<br> Tipo de poblacion: $tipos_poblacion <br>";
 echo "<br> Ojos: $ojos <br>";
 echo "<br> Situacion social: $situacion_social <br>";
 echo "<br> municipio: $municipio <br>";
 echo "<br> discapacidad: $discapacidad <br>";
 echo "<br> Zona: $zona <br>";

	$sql = "
	INSERT INTO estudiantes(documento, primer_nombre, segundo_nombre, primer_apellido, segundo_apellido, telefono_contacto, email, fecha_nacimiento, edad, direccion_residencia, EPS, fecha_inicio, fecha_fin, observacion, tipo_documento_id, tipo_sangre_id, zona_id, tipo_poblaion_id, estrato_id, genero_id, ojos_id, situacion_academica_id, situacion_social_id, grado_id, fuenterecurso_id, internado_id, discapacidad_id, municipio_id,sede_id) VALUES (
	:documento, :primer_nombre, :segundo_nombre, :primer_apellido, :segundo_apellido, :telefono_contacto, :email, :fecha_nacimiento, :edad, :direccion_residencia, :EPS, :fecha_inicio, :fecha_fin, :observacion, :tipo_documento_id, :tipo_sangre_id, :zona_id, :tipo_poblaion_id, :estrato_id, :genero_id, :ojos_id, :situacion_academica_id, :situacion_social_id, :grado_id, :fuenterecurso_id, :internado_id, :discapacidad_id, :ciudades_id,:sede_id
)";

	$state = $cn->prepare($sql);
	
	$state->bindParam(':documento', $doc);
	$state->bindParam(':primer_nombre', $nombre_uno);
	$state->bindParam(':segundo_nombre', $nombre_dos);
	$state->bindParam(':primer_apellido', $ape_uno);
	$state->bindParam(':segundo_apellido', $ape_dos);
	$state->bindParam(':telefono_contacto', $telefono_contacto);
	$state->bindParam(':email', $email);
	$state->bindParam(':fecha_nacimiento', $fecha_naci);
	$state->bindParam(':edad', $edad );
	$state->bindParam(':direccion_residencia', $direccion_residencia);
	$state->bindParam(':EPS', $eps_estudiante);
	$state->bindParam(':fecha_inicio', $fecha_ini);
	$state->bindParam(':fecha_fin', $fecha_fin);
	$state->bindParam(':observacion', $observacion);
	$state->bindParam(':tipo_documento_id', $tipo_doc);
	$state->bindParam(':tipo_sangre_id', $tipos_sangre);//?
	$state->bindParam(':zona_id', $zona);//?
	$state->bindParam(':tipo_poblaion_id', $tipos_poblacion);//?
	$state->bindParam(':estrato_id', $estrato);
	$state->bindParam(':genero_id', $genero);
	$state->bindParam(':ojos_id', $ojos);//?
	$state->bindParam(':situacion_academica_id', $estado);
	$state->bindParam(':situacion_social_id', $situacion_social);//?
	$state->bindParam(':grado_id', $codigo_grado);
	$state->bindParam(':fuenterecurso_id', $fuente_recursos);
	$state->bindParam(':internado_id', $internado);
	$state->bindParam(':discapacidad_id', $discapacidad);
	$state->bindParam(':ciudades_id',$municipio);
	$state->bindParam(':sede_id',$sede);

	#echo "<br> Mostrando sql: <br>";
	#var_dump($state);

	$resultE = $state->execute();
	#echo "<br>RESULTADO INSERCION ESTUDIANTE <br>";
	#var_dump($resultE);

#Una vez se hace el insert para el estudiante retornamos si ID para ser ocupado en la tabla "estudiante_serviciosocial: campos ids estudiante_serviciosocial_id - servicio_social_id"

		$idEstudiante = getId("estudiantes",$cn);
		$servicioSocial = getSubjectByValue('servicios_sociales','NO APLICA','estado',$cn);
		

		$sql = ("INSERT INTO estudiante_serviciosocial (estudiante_serviciosocial_id,servicio_social_id) VALUES (:estudiante,:servicio)");

		$stp = $cn->prepare($sql);
		$stp->bindParam(':estudiante',$idEstudiante);
		$stp->bindParam(':servicio',$servicioSocial['id']);
		$resultS = $stp->execute();


		if ($resultE != false && $resultS != false) {
			echo "<br>estudiante y sercio : OK<br>";
		}


					}//Fin for

#header("Location:".URL."gestion/importar-estudiantes.php?select=e");
#https://www.youtube.com/watch?v=4Sw24E5Hi5M

								} //End file exist

		} //End substr
		

		} //End iss

?>

<?php require("../view/importar-estudiantes.view.php") ?>