<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Login</title>
	<link rel="icon" href="../iconos/favicon.png">
	<link rel="stylesheet" href="../css/estilos.loguin.css">
	<link rel="stylesheet" href="../font-awesome/css/font-awesome.min.css">
	
</head>
<body>
<img id="estirada" style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; z-index:-50;" src="../imagenes/logo-gobernacion.jpg" />
	<div class="contenedor">
		<div class="contenedor-login">
				
					<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST" class="frm-login">
						<div class="envuelve-input">
						<input type="text" name="usuario" placeholder="Nombre de usuario">
						<i class="fa fa-user-o" aria-hidden="true"></i>
						</div>

						<br>
						<div class="envuelve-input">
						<input type="password" name="pass" placeholder="Contraseña">
						<i class="fa fa-unlock-alt" aria-hidden="true"></i>
						</div>
						<br>
						<input type="submit" class="btn" value="Iniciar Session">
					</form>
			</div>
		
	
</body>
</html>