<?php session_start(); ?>
<?php require '../php/Conexion.php' ?>
<?php require '../php/funciones.php' ?>
<?php require '../admin/config.php' ?>
<?php validateSession(); ?>
<?php
$cn = getConexion($bd_config);
comprobarConexion($cn);

$municipios = getMuniResi($cn);


$enviado = false;
if ($_SERVER['REQUEST_METHOD'] == 'POST') 
{
	#print_r($_POST);
	$id = cleanData($_POST['id']);
	$documento = cleanData($_POST['documento']);
	$primer_nombre = cleanData($_POST['primer_nombre']);
	$segundo_nombre = cleanData($_POST['segundo_nombre']);
	$primer_apellido = cleanData($_POST['primer_apellido']);
	$segundo_apellido = cleanData($_POST['segundo_apellido']);
	$telefono_contacto = cleanData($_POST['tel_contacto']);
	$email = cleanData($_POST['email']);
	$fecha_nacimiento = cleanData($_POST['fecha_naci']);
	$edad = cleanData($_POST['edad']);
	$direccion_residencia = cleanData($_POST['dire_resi']);
	$municipio_id = cleanData($_POST['muni_resi']);
	$EPS = cleanData($_POST['eps']);
	$fecha_inicio = cleanData($_POST['fecha_inicio']);
	$fecha_fin = cleanData($_POST['fecha_fin']);
	$fuenterecurso_id = cleanData($_POST['fuente_recurso']);
	$internado_id = cleanData($_POST['internado']);
	$servicio_social_id = cleanData($_POST['servicio_social']);
	$grado_id = cleanData($_POST['grado']);
	$tipo_sangre_id = cleanData($_POST['tipo_sangre']);
	$sede_id = cleanData($_POST['colegio']);
	$tipo_poblaion_id = cleanData($_POST['tipo_poblacion']);
	$zona_id = cleanData($_POST['zona']);
	$genero_id = cleanData($_POST['genero']);
	$estrato_id = cleanData($_POST['estrato']);
	$situacion_academica_id = cleanData($_POST['situacion_academica']);
	$ojos_id = cleanData($_POST['color_ojos']);
	$discapacidad_id = cleanData($_POST['discapacidades']);
	$situacion_social_id = cleanData($_POST['situacion_social']);
	$tipo_documento_id = cleanData($_POST['tipo_documento']);
	$observacion = cleanData($_POST['observacion']);

/*
echo "<br>*****VARIABLES RECIBIDAS*****<br>";
	echo "<br>ID:$id <br>";
	echo "<br>documento: $documento <br>";
	echo "<br>$primer_nombre <br>";
	echo "<br>$segundo_nombre <br>";
	echo "<br>$primer_apellido <br>";
	echo "<br>$segundo_apellido <br>";
	echo "<br>$telefono_contacto <br>";
	echo "<br>$email <br>";
	echo "<br>$fecha_nacimiento <br>";
	echo "<br>Edad: $edad <br>";
	echo "<br>$direccion_residencia <br>";
	echo "<br>Municipio: $municipio_id <br>";
	echo "<br>$EPS <br>";
	echo "<br>$fecha_inicio <br>";
	echo "<br>$fecha_fin <br>";
	echo "<br>Fuente: $fuenterecurso_id <br>";
	echo "<br>internado: $internado_id <br>";
	echo "<br>Grado: $grado_id <br>";
	echo "<br>tipo_sangre: $tipo_sangre_id <br>";
	echo "<br>Sede: $sede_id <br>";
	echo "<br>$tipo_poblaion_id <br>";
	echo "<br>$zona_id <br>";
	echo "<br>$genero_id <br>";
	echo "<br>$estrato_id <br>";
	echo "<br>$situacion_academica_id <br>";
	echo "<br>$ojos_id <br>";
	echo "<br>$discapacidad_id <br>";
	echo "<br>$situacion_social_id <br>";
	echo "<br>$tipo_documento_id <br>";
	echo "<br>$observacion <br>";
*/
	$sqlEstu = 
	"UPDATE estudiantes SET documento=:documento,primer_nombre=:primer_nombre,segundo_nombre=:segundo_nombre,primer_apellido=:primer_apellido,segundo_apellido=:segundo_apellido,telefono_contacto=:telefono_contacto,email=:email,fecha_nacimiento=:fecha_nacimiento,edad=:edad,direccion_residencia=:direccion_residencia,EPS=:EPS,fecha_inicio=:fecha_inicio,fecha_fin=:fecha_fin,observacion=:observacion,tipo_documento_id=:tipo_documento_id ,tipo_sangre_id=:tipo_sangre_id ,zona_id=:zona_id ,tipo_poblaion_id=:tipo_poblaion_id ,estrato_id=:estrato_id ,genero_id=:genero_id,ojos_id=:ojos_id ,situacion_academica_id=:situacion_academica_id ,situacion_social_id=:situacion_social_id ,grado_id=:grado_id ,fuenterecurso_id=:fuenterecurso_id ,internado_id=:internado_id ,discapacidad_id=:discapacidad_id ,municipio_id=:municipio_id ,sede_id=:sede_id

	WHERE estudiantes.id=:id";

	/* */

	$statement=$cn->prepare($sqlEstu);

	$statement->bindParam(":documento",$documento);
	$statement->bindParam(":primer_nombre",$primer_nombre);
	$statement->bindParam(":segundo_nombre",$segundo_nombre);
	$statement->bindParam(":primer_apellido",$primer_apellido);
	$statement->bindParam(":segundo_apellido",$segundo_apellido);
	$statement->bindParam(":telefono_contacto",$telefono_contacto);
	$statement->bindParam(":email",$email);
	$statement->bindParam(":fecha_nacimiento",$fecha_nacimiento);
	$statement->bindParam(":edad",$edad);
	$statement->bindParam(":direccion_residencia",$direccion_residencia);
	$statement->bindParam(":EPS",$EPS);
	$statement->bindParam(":fecha_inicio",$fecha_inicio);
	$statement->bindParam(":fecha_fin",$fecha_fin);
	$statement->bindParam(":observacion",$observacion);
	$statement->bindParam(":tipo_documento_id",$tipo_documento_id);
	$statement->bindParam(":tipo_sangre_id",$tipo_sangre_id);
	$statement->bindParam(":zona_id",$zona_id);
	$statement->bindParam(":tipo_poblaion_id",$tipo_poblaion_id);
	$statement->bindParam(":estrato_id",$estrato_id);
	$statement->bindParam(":genero_id",$genero_id);
	$statement->bindParam(":ojos_id",$ojos_id);
	$statement->bindParam(":situacion_academica_id",$situacion_academica_id);
	$statement->bindParam(":situacion_social_id",$situacion_social_id);
	$statement->bindParam(":grado_id",$grado_id);
	$statement->bindParam(":fuenterecurso_id",$fuenterecurso_id);
	$statement->bindParam(":internado_id",$internado_id);
	$statement->bindParam(":discapacidad_id",$discapacidad_id);
	$statement->bindParam(":municipio_id",$municipio_id);
	$statement->bindParam(":sede_id",$sede_id);

	$statement->bindParam(":id",$id);
	/*
*/
	#var_dump($statement);
	$resultE = $statement->execute();

	#echo "ID: $id";
	#Recojer el id del estudiante y el nuevo ID del servicio social y hacer update a la tabla estudiante_serviciosocial
	$sql_update_servicio_social = "UPDATE estudiante_serviciosocial SET servicio_social_id=:servicio_social WHERE estudiante_serviciosocial.estudiante_serviciosocial_id=:estudiante";



	$ps=$cn->prepare($sql_update_servicio_social);
	$ps->bindParam(':servicio_social',$servicio_social_id);
	$ps->bindParam(':estudiante',$id);

	$resultSS = $ps->execute();
	#var_dump($resultSS);
	// echo a message to say the UPDATE succeeded
    #echo $ps->rowCount() . " records UPDATED successfully";
	if ($resultE != false || $resultSS != false) {
		?>
            <script type="text/javascript"> 
            alert('Registro actualizado....');
                window.location="<?php echo URL ?>gestion/buscar-estudiantes.php?select=e"; 
            </script> 
            <?php //lo abro de nuevo
    $enviado = true;
	}else{
		?>
            <script type="text/javascript"> 
                alert('Ocurrio un error...');
            </script> 
            <?php //lo abro de nuevo
	}


}else
{
	#Crear funcion para limpiar id
	$doc_estu = $_GET['id'];
	if (empty($doc_estu)) {
		?>
            <script type="text/javascript"> 
                window.location="<?php echo URL ?>principal-admin.php"; 
            </script> 
            <?php //lo abro de nuevo
	}
	$result = getSubjectByValue("estudiantes",$doc_estu,'documento',$cn);
	$situacionA = getSituacionAcademica($cn);
	$fuente = getFuenteRecurso($cn);
	$servicio_social = getServicioSocial($cn);
	$grados = getGrado($cn);
	$tipos_sangre = getTiposSangre($cn);
	$tipos_poblacion = getTipoPoblacion($cn);
	$generos = getGenero($cn);
	$discapacidades = getDiscapacidades($cn);
	$tipos_documento = getTipoDocumento($cn);
	$internados = getInternado($cn);
	$instituciones = getSedes($cn);
	$estratos = getEstrato($cn);
	$colores_ojos = getOjos($cn);
	$situacion_social = getSituacionSocial($cn);
	$zonas = getZona($cn);
	#var_dump($situacion_social);
	$estudianteServicioSocial = getEstudianteServicioSocial($result['id'],$cn);
    #var_dump($estudianteServicioSocial);
	#var_dump($estudianteServicioSocial);
	#var_dump($result);

}
?>

<?php require '../view/editar-estudiante.view.php' ?>