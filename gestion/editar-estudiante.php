<?php session_start(); ?>
<?php require '../php/Conexion.php' ?>
<?php require '../php/funciones.php' ?>
<?php validateSession(); ?>
<?php
$cn = getConexion();
comprobarConexion($cn);
$enviado = false;
if ($_SERVER['REQUEST_METHOD'] == 'POST') 
{
	echo $_POST['id'];
	$id = cleanData($_POST['id']);
	$documento = cleanData($_POST['documento']);
	$primer_nombre = cleanData($_POST['primer_nombre']);
	$segundo_nombre = cleanData($_POST['segundo_nombre']);
	$primer_apellido = cleanData($_POST['primer_apellido']);
	$segundo_apellido = cleanData($_POST['segundo_apellido']);
	$cel_contacto = cleanData($_POST['cel_contacto']);
	$tel_contacto = cleanData($_POST['tel_contacto']);
	$email = cleanData($_POST['email']);
	$fecha_naci = cleanData($_POST['fecha_naci']);
	$lugar_naci = cleanData($_POST['lugar_naci']);
	$direccion = cleanData($_POST['direccion']);
	$municipio = cleanData($_POST['municipio']);
	$estrato = cleanData($_POST['estrato']);
	$desplazado = cleanData($_POST['desplazado']);
	$afro = cleanData($_POST['afro']);
	$ojos = cleanData($_POST['ojos']);
	$genero = cleanData($_POST['genero']);

	$sqlEstu = 
	"UPDATE 
	estudiantes SET documento=:documento,primer_nombre=:primer_nombre,segundo_nombre=:segundo_nombre,primer_apellido=:primer_apellido,segundo_apellido=:segundo_apellido,cel_contacto=:cel_contacto,tel_contacto=:tel_contacto,email=:email,fecha_naci=:fecha_naci,lugar_naci=:lugar_naci,direccion=:direccion,municipio=:municipio,estrato=:estrato,desplazado=:desplazado,afrodescendiente=:afrodescendiente,ojos=:ojos,genero=:genero WHERE id=:id";
	$ps=$cn->prepare($sqlEstu);
	$ps->bindParam(":documento",$documento);
	$ps->bindParam(":primer_nombre",$primer_nombre);
	$ps->bindParam(":segundo_nombre",$segundo_nombre);
	$ps->bindParam(":primer_apellido",$primer_apellido);
	$ps->bindParam(":segundo_apellido",$segundo_apellido);
	$ps->bindParam(":cel_contacto",$cel_contacto);
	$ps->bindParam(":tel_contacto",$tel_contacto);
	$ps->bindParam(":email",$email);
	$ps->bindParam(":fecha_naci",$fecha_naci);
	$ps->bindParam(":lugar_naci",$lugar_naci);
	$ps->bindParam(":direccion",$direccion);
	$ps->bindParam(":municipio",$municipio);
	$ps->bindParam(":estrato",$estrato);
	$ps->bindParam(":desplazado",$desplazado);
	$ps->bindParam(":afrodescendiente",$afro);
	$ps->bindParam(":ojos",$ojos);
	$ps->bindParam(":genero",$genero);
	$ps->execute();
	

	// echo a message to say the UPDATE succeeded
    #echo $ps->rowCount() . " records UPDATED successfully";

    #header("Location: principal-admin.php");
    $enviado = true;
}else
{
	#Crear funcion para limpiar id
	$id_estu = $_GET['id'];
	if (empty($id_estu)) {
		#header("Location:principal-admin.php");
		echo "Id vacio";
	}
	$result = getSubjectsById("estudiantes",$id_estu,$cn);
		#var_dump($result);

}
?>

<?php require '../view/editar-estudiante.view.php' ?>