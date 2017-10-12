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
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	var_dump($_POST);
}else{
#Necesidades:
/*
1. El estudiante a mostrar (Ya esta seleccionado).
2. Frm para diligencias la tabla semestre.
3. Traer todos los programas registrados para ser seleccionados (Esta tabla ya estara diligenciada, ademas es una tabla hija por lo cual debemos tener cuidado de diligneciar sus tablas padres ).
4. Finalmente con estos datos hacer un insert para "evaluacion_semestral"
*/
$documento = cleanData($_GET['id']);
$estudiante = getSubjectById("estudiante","documento",$documento,$cn);
$programas = getAllSubject("programa",$cn);
#var_dump($programas);

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
				document.getElementById("wraper-i").innerHTML=conexion.responseText;
			}
		}

		//Realizamos una peticion de apertura con un metodo que puede ser GET o POST y Asincrona 
		//El valor por defecto es true es decir asincrona
		//Asiyn: permite varias conexiones sin choques entre el servidor y el navegador

		conexion.open("GET","../php/traer-institucion.php?id="+str,true);
		conexion.send();
		}
	</script>

<?php require '../view/gestionar-estudiante.view.php'?>