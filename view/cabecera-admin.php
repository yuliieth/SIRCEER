<?php 	require_once '../admin/config.php';?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>SIRCEER | Gobernaci&oacute;n</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="<?php echo URL; ?>css/estilos.css">
	<link rel="icon" href="<?php echo URL; ?>imagenes/favicon.png">
	<link rel="stylesheet" href="<?php echo URL; ?>font-awesome/css/font-awesome.css">
	<link rel="stylesheet" href="<?php echo URL; ?>css/odometer-theme-car.css" />
	<!--La sgte libreria es inprescidinble para el buscador-->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<!--<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>-->
	<script src="<?php echo URL; ?>js/odometer.js"></script>
	<script src="<?php echo URL; ?>js/jquery.js"></script>
	<script src="<?php echo URL; ?>js/javascript.js"></script>
	<script src="../js/jquery.js"></script>
	<!--<link href="https://fonts.googleapis.com/css?family=Revalia" rel="stylesheet">-->
</head>
<body>
	<!--https://www.facebook.com/fyupanquia-->
	<header>
		<!--
		<h1><a href="principal-gestion.php">SIRCEER</a></h1>
		<div class="user">
			<i class="fa fa-user-circle fa-2x" aria-hidden="true"></i><a href="<?php echo URL; ?>php/cerrar-sesion.php"><?php echo $_SESSION['usuario']['user']; ?></a>
		</div>
		-->
	</header>

	<?php include_once '../view/menu-cabecera.view.php' ?>