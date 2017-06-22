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



		function sugerencias(str)
		{

		var conexion;
			if (str.length == 0) 
			{
				document.getElementById("miDiv").innerHTML="";
				return;
			}
		//Creacion de una variable de tipo XMLHttpRequest - Es un objeto javascript para obtener informacion de la url sin actualizar la pagina
		

		/*Añadiendo ajax para versiones antiguas de IE*/
		if (window.XMLHttpRequest) 
			//Es una version actual
		{
			conexion = new XMLHttpRequest();
		}else
		{
			//Es una version antigua
			conexion = new ActiveXObject("Microsoft.XMLHTTP");
		}

		conexion.onreadystatechange= function(){
			if (conexion.readyState == 4 && conexion.status == 200) 
			{
				document.getElementById("miDiv").innerHTML=conexion.responseText;
			}
		}

		//Realizamos una peticion de apertura con un metodo que puede ser GET o POST y Asincrona 
		//El valor por defecto es true es decir asincrona
		//Asiyn: permite varias conexiones sin choques entre el servidor y el navegador

		conexion.open("GET","validarUsuario?u="+str,true);
		conexion.send();
		}
		
	</script>
</head>
<body>
	<header>
		Este es el header
	</header>
	<section>

	<!--VENTANA MODAL-->
		<div class="ventana">
			<div class="formulario">
					<div class="cerrar">
						<a href="javascript:cerrar();">Cerrar</a>
						</div>
				<h3>Datos del nuevo usuario:</h3>
				<hr>
					<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST">
							<input type="text" name="nombre" placeholder="Nombre:" require><br>
							<input type="text" onkeyup="sugerencias(this.value)" name="usuario" placeholder="Usuario:" ><br>
							<input type="password" name="password" placeholder="Contraseña:"><br>
							<input type="text" name="email" placeholder="Email"><br>
							<select name="perfil" id="perfil">
								<option value="1">Super usuario</option>
								<option value="2">Usuario estandar</option>
								<option value="3">Usuario externo</option>
							</select>
	<div id="miDiv"></div>
							<input type="submit" name="enviar" value="enviar">		
					</form>
				
			
					</div>
		</div>

		<div class="agregar">
			<a href="javascript:openVentana();"><i class="fa fa-plus-square-o fa-3x" aria-hidden="true"></i></a>
		</div>
		<div class="contenido">
			<table>
				<tr>
					<th>#</th>
					<th>Nombre</th>
					<th>Usuario</th>
					<th>Password</th>
					<th>Email</th>
					<th>Tipo</th>
				</tr>
		<?php 
			 foreach ($statement as $valor) {
			 	?>
				<tr>
					<td><?php echo $valor['id_usuarios']; ?></td>
					<td><?php echo $valor['nombre_completo']; ?></td>
					<td><?php echo $valor['username']; ?></td>
					<td><?php echo $valor['password']; ?></td>
					<td><?php echo $valor['email']; ?></td>
					<td><?php echo $valor['nombre']; ?></td>
					<td>
					<a href="javascript:openVentana();"><i class="fa fa-pencil-square fa-2x" aria-hidden="true"></i></a>
					</td>
					<td>
					<a href="#"><i class="fa fa-minus-square fa-2x"" aria-hidden="true"></i></a>
					</td>
				</tr>
			<?php } ?>
			</table>


			<article>
				<h2>Recuerde:</h2>
				<div class="descripcion">
					<ul>
						<li>
							<p><strong>Read:</strong> Los usuarios con este atributo podran solo realizar consultas</p>
						</li>
						<li>
							<p><strong>Write:</strong> Los usuarios con esta propiedad podran modificar datos</p>
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