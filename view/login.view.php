<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Login</title>
	<link rel="stylesheet" href="../css/estilos.loguin.css">
	<link rel="stylesheet" href="../font-awesome/css/font-awesome.min.css">
	
</head>
<body>
	<div class="contenedor">
		<div class="contenedor-login">
				
					<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST" class="frm-login">
						<div class="envuelve-input"><i class="fa fa-user-o" aria-hidden="true"></i>
						<input type="text" name="usuario" placeholder="Nombre de usuario">
						</div>
						<br>
						<div class="envuelve-input">
						<i class="fa fa-unlock-alt" aria-hidden="true"></i>
						<input type="password" name="pass" placeholder="Contraseña">
						</div>
						<br>
						<input type="submit" class="btn" value="Entrar">
					</form>
			</div>
		
	
</body>
</html>