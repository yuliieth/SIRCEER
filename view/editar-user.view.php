<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>srceer | Administracion</title>
	<link rel="stylesheet" href="../css/estilos-admin.css">
	<link rel="stylesheet" href="../font-awesome/css/font-awesome.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	
</head>
<body>
	<header>
		
	</header>
	<section>

			<div class="formulario-editar-user">
				<h3>Esta modificando un usuario:</h3>
				<hr>
				<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST">
				<input type="hidden"  name="id" value="<?php echo $result['id']; ?>">
				<label>Nombre completo:</label>
				<input type="text" name="nombre" value="<?php echo $result['nombre_completo']; ?>" required="Campo requerido"><br>
				<label>Usuarios:</label>
					<input type="text" onkeyup="sugerencias(this.value)" name="usuario" value="<?php echo $result['username']; ?>" placeholder="Usuario:" required="" ><br>
					<label>Contraseña:</label>
					<input type="password" name="password" value="<?php echo $result['password']; ?>" required=""><br>
					<label>E-mail:</label>
					<input type="email" name="email" value="<?php echo $result['email']; ?>" required=""><br>
					<label>Perfil</label>
					<select name="perfil" id="perfil">
						<option value="1">Super usuario</option>
						<option value="2">Usuario estandar</option>
						<option value="3">Usuario externo</option>
					</select>

					
					<input type="submit" name="enviar" value="Crear usuario">		
				</form>
				

			
		</div>

		
		</section>
		<!--<footer>
			
		</footer>-->
	</body>
	</html>