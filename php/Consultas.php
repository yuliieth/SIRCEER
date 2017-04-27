<?php 
	
	class Consultas(){
		public function registrarProductos(
			$documento,$primerNombre,
			$segundoNombre,$primerApellido,
			$segundoApellido,$direccion,
			$municipio,$celular,
			$telefono,$email,
			$fechaNaci,$lugarNaci,
			$estrato,$desplazado,
			$afro,$ojos
			){
			$conexionObject = new Conexion();
			$conexion = $conexionObject->getConexion();
			$sql = ("INSERT INTO estudiantes (
				documento,primer_nombre,primer_apellido,segundo_apellido,segundo_nombre,fecha_nacimientotel_contacto,cel_contacto,email,descendencia,estrato,ojos,condicio,
				)");
		}
	  }
	}

 ?>