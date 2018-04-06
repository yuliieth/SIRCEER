<?php session_start(); ?>
<?php $titulo = " ESTUDIANTES" ?>
<?php require_once '../admin/config.php';
require_once '../php/funciones.php';
require_once '../php/Conexion.php';
validateSession();
$cn = getConexion($bd_config);
comprobarConexion($cn);

#Load from DB to combox
$tipoDocumento = getTipoDocumento($cn);
$muni_resi = getMuniResi($cn);
$fuente_recurso = getFuenteRecurso($cn);
$internado = getInternado($cn);
$servicio_social = getServicioSocial($cn);
$grado = getGrado($cn); 
$tipos_sangre = getTiposSangre($cn);
$colegio = getColegio($cn);
$tipo_poblacion = getTipoPoblacion($cn);
$zona = getZona($cn); 
$genero = getGenero($cn);
$estrato = getEstrato($cn);
$situacion_academica = getSituacionAcademica($cn);
$ojos = getOjos($cn); 
$discapacidades = getDiscapacidades($cn);
$situacion_social = getSituacionSocial($cn); 



#$programas = getAllSubject("programa",$cn);

$enviado = "";
if (isset($_POST['submit'])) {
	#var_dump($_POST);
	$errores = "";
	$parameters = array(
		"tipo_documento","documento","tipo_sangre","primer_nombre","segundo_nombre","primer_apellido","segundo_apellido","telefono","fecha_naci","edad","dire_resi","fecha_inicio","estrato","zona","eps","tipo_poblacion","situacion_social","fuente_recurso","internado","servicio_social","colegio","ojos","genero","discapacidades","situacion_academica","grado","ciudad"
		);
	#echo "Entra a validar";
	$errores = validarErrores($parameters,$errores);

	if (empty($errores)) {
		#echo "No se encontraron errores de validacion";
		$enviado = true;
		#Obtenemos los valores de los campos en el formulario
		$tipo_documento = $_POST['tipo_documento'];
		$documento = $_POST['documento'];
		$primer_nombre = $_POST['primer_nombre'];
		$segundo_nombre = $_POST['segundo_nombre'];
		$primer_apellido = $_POST['primer_apellido'];
		$segundo_apellido = $_POST['segundo_apellido'];
		$telefono = $_POST['telefono'];
		$email = $_POST['email'];
		$fecha_naci = $_POST['fecha_naci'];
		$edad = $_POST['edad'];
		$dire_resi = $_POST['dire_resi'];
		$muni_resi = $_POST['ciudad'];
		$eps = $_POST['eps'];
		$fecha_inicio = $_POST['fecha_inicio'];
		$fecha_fin = $_POST['fecha_fin'];
		$fuente_recurso = $_POST['fuente_recurso'];
		$internado = $_POST['internado'];
		$servicio_social = $_POST['servicio_social'];
		$grado = $_POST['grado'];
		$tipo_sangre = $_POST['tipo_sangre'];
		$colegio = $_POST['colegio'];
		$tipo_poblacion = $_POST['tipo_poblacion'];
		$zona = $_POST['zona'];
		$genero = $_POST['genero'];
		$estrato = $_POST['estrato'];
		$situacion_academica = $_POST['situacion_academica'];
		$ojos = $_POST['ojos'];
		$discapacidades = $_POST['discapacidades'];
		$situacion_social = $_POST['situacion_social'];
		$observacion = $_POST['observacion'];
		


	$estado = saveStudent(
		$tipo_documento,
		$documento,
		$primer_nombre,
		$segundo_nombre,
		$primer_apellido,
		$segundo_apellido,
		$telefono,
		$email,
		$fecha_naci,
		$edad,
		$dire_resi,
		$muni_resi,
		$eps,
		$fecha_inicio,
		$fecha_fin,
		$fuente_recurso,
		$internado,
		$servicio_social,
		$grado,
		$tipo_sangre,
		$colegio,
		$tipo_poblacion,
		$zona,
		$genero,
		$estrato,
		$situacion_academica,
		$ojos,
		$discapacidades,
		$situacion_social,
		$observacion,
		$cn
	);


	if ($estado) {
		?>
            <script type="text/javascript"> 
                window.location="<?php echo URL ?>gestion/new-estudiante.php?select=e"; 
            </script> 
            <?php //lo abro de nuevo
	}else{
		echo "Ocurrio un error";
	}
}
}
?>
<script type=text/javascript>

		function ejecutar(str)
		{
		//Creacion de una variable de tipo XMLHttpRequest - Es un objeto javascript para obtener informacion de la url sin actualizar la pagina
		var conexion;
		

		/*Añadiendo ajax para versiones antiguas de IE*/
		if (window.XMLHttpRequest) 
			//Es una version actual
		{
			conexion = new XMLHttpRequest();
		}else
		{
			//Es una version antigua
			conexion = new ActiveXObject("Microsoft.XMLHTTP");
		}

		conexion.onreadystatechange= function(){
			if (conexion.readyState == 4 && conexion.status == 200) 
			{
				document.getElementById("snies").innerHTML=conexion.responseText;
			}
		}

		//Realizamos una peticion de apertura con un metodo que puede ser GET o POST y Asincrona 
		//El valor por defecto es true es decir asincrona
		//Asiyn: permite varias conexiones sin choques entre el servidor y el navegador

		conexion.open("GET","../php/traer-institucion.php?id="+str,true);
		conexion.send();
		}
	</script>
<?php require("../view/new-estudiante.view.php") ?>
