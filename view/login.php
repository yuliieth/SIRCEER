<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Login</title>
	<link rel="stylesheet" href="../css/estilos.css">
	<link href="https://fonts.googleapis.com/css?family=Revalia" rel="stylesheet">
</head>
<body>
	<div class="contenedor">
		<div class="contenedor-loguin">
			<div class="barra-loguin">
			</div>
				<div class="contenedor-form">
					<form action="loguin_script.php" method="POST">
						<input type="text" name="usuario" placeholder="Nombre de usuario">
						<br>
						<input type="text" name="pass" placeholder="Contraseña">
						<br>
						<input type="submit" value="Entrar">
					</form>
			</div>
		</div>
	</div>
</body>
</html>