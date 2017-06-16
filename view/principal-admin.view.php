<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>srceer | Administracion</title>
	<link rel="stylesheet" href="../css/estilos-admin.css">
	<link rel="stylesheet" href="../font-awesome/css/font-awesome.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<script type="text/javascript">
		function openVentana(){
		$(".ventana").slideDown("slow");
		}

		function cerrar(){
			$(".ventana").slideUp("fast");
		}
	</script>
</head>
<body>
	<header>
		Este es el header
	</header>
	<section>
		<div class="ventana">
			<div class="formulario">
					<div class="cerrar">
						<a href="javascript:cerrar();">Cerrar</a>
						</div>
				<h3>Datos del nuevo usuario:</h3>
				<hr>
					<form action="">
							<input type="text" placeholder="Nombre:"><br>
							<input type="text" placeholder="Usuario:"><br>
							<input type="password" placeholder="Contraseña:"><br>
							<input type="password" placeholder="Email"><br>
							<input type="submit" value="enviar">		
					</form>
				
			
					</div>
		</div>
		<div class="agregar">
			<a href="javascript:openVentana();"><i class="fa fa-plus-square-o fa-3x" aria-hidden="true"></i></a>
		</div>
		<div class="contenido">
		<!--<p><a href="javascript:openVentana();">Abrir ventana modal</a></p>-->
			<table>
				<tr>
					<th>#</th>
					<th>Usuario</th>
					<th>Password</th>
					<th>Nombre</th>
					<th>Email</th>
					<th>Read</th>
					<th>Write</th>
				</tr>
				<tr>
					<td>1</td>
					<td>Cristhian</td>
					<td>123</td>
					<td>Cristhian Alexis</td>
					<td>titiruizah@gmail.com</td>
					<td>
						<label><input type="checkbox" id="" value="si"></label>
					</td>
					<td>
						<label><input type="checkbox" id="" value="si"></label>
					</td>
				</tr>
				<tr>
					<td>2</td>
					<td>Alexis</td>
					<td>456</td>
					<td>Luis Alexis</td>
					<td>ruizah@gmail.com</td>
					<td>
						<label><input type="checkbox" id="" value="si"></label>
					</td>
					<td>
						<label><input type="checkbox" id="" value="si"></label>
					</td>
				</tr>
			</table>
			<article>
				<h2>Recuerde:</h2>
				<div class="descripcion">
					<ul>
						<li>
							<p><strong>Read:</strong> los suarios con este atributo podran solo realizar consultas</p>
						</li>
						<li>
							<p><strong>Write</strong>: Los usuarios con esta propiedad podran modificar datos</p>
						</li>
					</ul>
				</div>
			</article>
		</div>
	</section>
	<footer>
		Este es el footer
	</footer>
</body>
</html>