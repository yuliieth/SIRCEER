<?php 
	require_once '../admin/config.php';
	
		function getConexion(){
			try{
			$conexion = new PDO('mysql:host=localhost;dbname=id1872513_srceer','root','1088264375C');

		}catch(PDOException $e){
			echo "Error " . $e->getMessage();
		}
			return $conexion;
		}
		

 ?>