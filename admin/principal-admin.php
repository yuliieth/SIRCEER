<?php session_start();
require_once '../php/Conexion.php';
require_once '../php/funciones.php';
require_once 'config.php';
validateSession();
$con = getConexion($bd_config);
comprobarConexion($con);
$statement = getAllUsers($con);
var_dump($statement);


if (isset($_POST['enviar'])) {
	$fecha_ingreso = date("YY-mm-dd");
	$user = $_POST['usuario'];
	$pass = $_POST['password'];
	// $email = $_POST['email'];
	$perfil_id = $_POST['perfil'];
	$estado_id = $_POST['estado'];

		#print_r($_POST);
		#inser on usuarios, and usuarios_perfiles
		#no vamos a utilizar query sino ps para aplicar seguridad
	$sql = "INSERT INTO usuarios(nombre, clave, fecha_ingreso, rol_id, estado_id) VALUES (:nombre,:clave,:fecha_ingreso,:rol_id,:estado_id)";


	echo "Fecha: $fecha_ingreso<br>";
	echo "Perfuil: $perfil_id<br>";
	echo "Estado: $estado_id<br>";

	$ps = $con->prepare($sql);
	$ps->bindParam(':nombre',$user);
	$ps->bindParam(':clave',$pass);
	$ps->bindParam(':fecha_ingreso',$fecha_ingreso);
	$ps->bindParam(':rol_id',$perfil_id);
	$ps->bindParam(':estado_id',$estado_id);
	$result = $ps->execute();

	if ($result != false) {
		?>
			<script type="text/javascript">
				window.location="<?php echo URL ?>admin/principal-admin.php";
			</script>
		<?php
	}else{?>
	<script>
		alert("Ocurrio un error en la insercion..");
	</script>
	<?php }

	
}?>

<?php require '../view/principal-admin.view.php'; ?>
