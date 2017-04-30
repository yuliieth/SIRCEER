<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Login</title>
	<link rel="stylesheet" href="../css/estilos.loguin.css">
	<link rel="stylesheet" href="../font-awesome/css/font-awesome.min.css">
	<link href="https://fonts.googleapis.com/css?family=Revalia" rel="stylesheet">
</head>
<body>
	<div class="contenedor">
		<div class="contenedor-loguin">
				<div class="contenedor-form">
					<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST" class="frm-login">
					<i class="fa fa-user-circle-o" aria-hidden="true"></i>
						<input type="text" name="usuario" placeholder="Nombre de usuario">
						<br>
						<i class="fa fa-key" aria-hidden="true"></i>
						<input type="password" name="pass" placeholder="Contraseña">
						<br>
						<input type="submit" class="btn" value="Entrar">
					</form>
			</div>
		
	</div>
</body>
</html>