<?php 
	require_once '../admin/config.php';
	
		function getConexion(){
			try{
			$conexion = new PDO('mysql:host=localhost;dbname=srceer','root','');

		}catch(PDOException $e){
			echo "Error " . $e->getMessage();
		}
			return $conexion;
		}
		

 ?>