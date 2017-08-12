<?php session_start(); ?>
<?php require '../php/Conexion.php' ?>
<?php require '../php/funciones.php' ?>
<?php require '../admin/config.php' ?>
<?php validateSession(); ?>
<?php
$cn = getConexion($bd_config);
comprobarConexion($cn);
$enviado = false;
if ($_SERVER['REQUEST_METHOD'] == 'POST') 
{
	print_r($_POST);
	$documento = cleanData($_POST['documento']);
	#$documento = cleanData($_POST['documento']);
	$nombres = cleanData($_POST['nombres']);
	$apellidos = cleanData($_POST['apellidos']);
	$cel_contacto = cleanData($_POST['cel_contacto']);
	$tel_contacto = cleanData($_POST['tel_contacto']);
	$email = cleanData($_POST['email']);
	$fecha_naci = cleanData($_POST['fecha_naci']);
	$edad = cleanData($_POST['edad']);
	$lugar_naci = cleanData($_POST['lugar_naci']);
	$direccion = cleanData($_POST['direccion']);
	$municipio = cleanData($_POST['municipio']);
	$estrato = cleanData($_POST['estrato']);
	$desplazado = cleanData($_POST['desplazado']);
	$afro = cleanData($_POST['afro']);
	$ojos = cleanData($_POST['ojos']);
	$genero = cleanData($_POST['genero']);
	#$tipo_doc = cleanData($_POST['tipo_doc']);

	$sqlEstu = 
	"UPDATE 
	estudiante SET nombres=:nombres,apellidos=:apellidos,cel_contacto=:cel_contacto,tel_contacto=:tel_contacto,email=:email,fecha_naci=:fecha_naci,edad=:edad,lugar_naci=:lugar_naci,direccion=:direccion,municipio=:municipio,estrato=:estrato,desplazado=:desplazado,afrodescendiente=:afrodescendiente,ojos=:ojos,genero=:genero WHERE documento=:documento";
	$ps=$cn->prepare($sqlEstu);
	$ps->bindParam(":documento",$id);
	$ps->bindParam(":nombres",$nombres);
	$ps->bindParam(":apellidos",$apellidos);
	$ps->bindParam(":cel_contacto",$cel_contacto);
	$ps->bindParam(":tel_contacto",$tel_contacto);
	$ps->bindParam(":email",$email);
	$ps->bindParam(":fecha_naci",$fecha_naci);
	$ps->bindParam(":edad",$edad);
	$ps->bindParam(":lugar_naci",$lugar_naci);
	$ps->bindParam(":direccion",$direccion);
	$ps->bindParam(":municipio",$municipio);
	$ps->bindParam(":estrato",$estrato);
	$ps->bindParam(":desplazado",$desplazado);
	$ps->bindParam(":afrodescendiente",$afro);
	$ps->bindParam(":ojos",$ojos);
	$ps->bindParam(":genero",$genero);
	$ps->bindParam(":documento",$documento);
	$ps->execute();
	

	// echo a message to say the UPDATE succeeded
    echo $ps->rowCount() . " records UPDATED successfully";

    #header("Location: buscar_estudiantes.php");
    $enviado = true;
}else
{
	#Crear funcion para limpiar id
	$doc_estu = $_GET['id'];
	if (empty($doc_estu)) {
		#header("Location:principal-admin.php");
		echo "Id vacio";
	}
	$result = getSubjectById("estudiante",$doc_estu,$cn);
	#$institutes = getAllEntity("institucion",$cn);
	#$programs = getAllEntity("programa",$cn);
		#var_dump($result);

}
?>

<?php require '../view/editar-estudiante.view.php' ?>