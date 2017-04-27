<?php 
	require_once '../admin/config.php';
	class Conexion 
	{
	
		function getConexion(){
			$conexion = PDO('mysql:host=$bd_config["host"];database=$bd_config["nameBD"];',$bd_config["user"],$bd_config["pass"]);

			return $conexion;
		}

		}

 ?>