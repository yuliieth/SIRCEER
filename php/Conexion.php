<?php 
	
		
		function getConexion($bd_config){
			try{
			$conexion = new PDO('mysql:host=localhost;dbname='.$bd_config['nameBD'],$bd_config['userName'],$bd_config['pass']);

		}catch(PDOException $e){
			echo "Error " . $e->getMessage();
		}
			return $conexion;
		}
		

 ?>