<?php session_start(); ?>
<?php  
require_once '../admin/config.php';
require_once '../php/funciones.php';
require_once '../php/Conexion.php';
validateSession();
?>
<?php 
$cn = getConexion($bd_config);
comprobarConexion($cn);

//*************PETICION POST********************
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset( $_POST['enviar'])) {
	#var_dump($_POST);

$id = $_POST['id'];
$nombre = $_POST['nombre'];
$telefono = $_POST['telefono'];
$email = $_POST['email'];
#echo "$semestre_id";
$direccion =  $_POST['direccion'];
$ciudad =  $_POST['municipio'];
$alianza =  $_POST['alianza'];

$estado = 1;


$sql ="UPDATE universidades SET nombre=:nombre,telefono=:telefono,email=:email,direccion=:direccion,ciudad_id=:ciudad_id WHERE universidades.id=:id";

$ps = $cn->prepare($sql);

$ps->bindParam(':nombre',$nombre);
$ps->bindParam(':telefono',$telefono);
$ps->bindParam(':email',$email);
$ps->bindParam(':direccion',$direccion);
$ps->bindParam(':ciudad_id',$ciudad);
#$ps->bindParam(':alianza_id',$alianza);
$ps->bindParam(':id',$id);

$result = $ps->execute();
#var_dump($result);

if ($result != false) {
	?>
		<script type="text/javascript">
			window.location="<?php echo URL ?>gestion/buscar-universidad.php?select=u";
		</script>
	<?php
	}else{
		?>
		
		<script type="text/javascript">
			window.location="<?php echo URL ?>gestion/errorIn.php";
		</script>
	
	<?php
	}
}
else
{
#Necesidades:
/*

*/
$id = cleanData($_GET['id']);
#echo "$documento";
$result = getSubjectByValue('universidades',$id,'id',$cn);
#var_dump($result);
#echo "<br>***********<br>";
$municipios = getAllSubject('municipios',$cn);
$alianzas = getAllSubject('alianzas',$cn);
#var_dump($matricula);
}

?>

<?php require '../view/editar-universidad.view.php'?>