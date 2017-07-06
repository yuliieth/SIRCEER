<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>SRCEER | Gobernaci&oacute;n</title>
	<link rel="stylesheet" href="../css/estilos.css">
	<link rel="icon" href="../imagenes/favicon.png">
	<link rel="stylesheet" href="../font-awesome/css/font-awesome.css">
	<!--La sgte libreria es inprescidinble para el buscador-->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<!--<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>-->
	<script src="../js/buscar-estudiante.js"></script>
	<script src="../js/buscar-institucion.js"></script>
	<script src="../js/buscar-programa.js"></script>
	<script src="../js/jquery.js"></script>
	<!--<link href="https://fonts.googleapis.com/css?family=Revalia" rel="stylesheet">-->
</head>
<body>
<!--https://www.facebook.com/fyupanquia-->
	<header>
		<h1><a href="principal-gestion.php">SRCEER</a></h1>
		<div class="user">
			<i class="fa fa-user-circle fa-2x" aria-hidden="true"></i><a href="../php/cerrar-sesion.php"><?php echo $_SESSION['usuario']['user']; ?></a>
		</div>
	
	</header>

	<div class="wraper-nav">
	<nav class="menu-bar">

		<ul>
			<li class="students"><i class="fa fa-graduation-cap fa-2x" aria-hidden="true"></i>
<a href="gestion-estudiantes.php?select=e">Estudiantes</a></li>
			<li class="users"><i class="fa fa-university fa-2x" aria-hidden="true"></i>
<a href="gestion-instituciones.php?select=i">Instituciones</a></li>
			<li class="chart"><i class="fa fa-tasks fa-2x" aria-hidden="true"></i>
<a href="gestion-programas.php?select=p">Programas</a></li>
<!--<li class="reports"><i class="fa fa-flag-checkered fa-2x" aria-hidden="true"></i>
<a href="reportes-estudiantes.php">Reportes</a></li>-->
		</ul>
	</nav>
	</div>

	<div class="contenedor">