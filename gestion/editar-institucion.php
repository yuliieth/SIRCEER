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
	#print_r($_POST);
	$id = cleanData($_POST['id']);
	$nombre = cleanData($_POST['nombre']);
	$telefono = cleanData($_POST['telefono']);
	$siglas = cleanData($_POST['siglas']);
	$calendario = cleanData($_POST['calendario']);
	$dane = cleanData($_POST['dane']);

	$sql = 
	"UPDATE instituciones SET nombre=:nombre,telefono=:telefono,siglas=:siglas,calendario=:calendario,DANE=:dane WHERE instituciones.id=:id";

	$ps=$cn->prepare($sql);
	$ps->bindParam(":nombre",$nombre);
	$ps->bindParam(":telefono",$telefono);
	$ps->bindParam(":siglas",$siglas);
	$ps->bindParam(":calendario",$calendario);
	$ps->bindParam(":dane",$dane);
	$ps->bindParam(":id",$id);

	$result = $ps->execute();
	if ($result) {
		?>
			<script type="text/javascript">
				window.location = "<?php echo URL ?>gestion/buscar-institucion.php?select=i"
			</script>
		<?php
	}else{
		?>
			<script type="text/javascript">
				window.location = "<?php echo URL ?>gestion/errorIn.php"
			</script>
		<?php
	}
    $enviado = true;
}else
{
	#Crear funcion para limpiar id
	$id_institucion = $_GET['id'];
	if (empty($id_institucion)) {
		header("Location:errorIn.php");
	}
	#echo $id_insti;
	$result = getAllSubjectByValue('instituciones',$id_institucion,'id',$cn);
	#var_dump($result);

}
?>

<?php require '../view/editar-institucion.view.php' ?>