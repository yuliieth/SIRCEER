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



		function sugerencias(str){
			var xmlhttp;
			if (str.length==0)
			{ 
				document.getElementById("miDiv").innerHTML="";
				return;
			}
			if (window.XMLHttpRequest)
			{
				xmlhttp=new XMLHttpRequest();
			}
			else
			{
				xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
			}
			xmlhttp.onreadystatechange=function()
			{
				if (xmlhttp.readyState==4 && xmlhttp.status==200)
				{
					document.getElementById("miDiv").innerHTML=xmlhttp.responseText;
				}
			}
			xmlhttp.open("GET","../php/validarUsuario.php?u="+str,true);
			xmlhttp.send();
		}
		
	</script>
</head>
<body>
	<header>
		
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
				<input type="text" name="nombre" placeholder="Nombre:" required="Campo requerido"><br>
					<div id="miDiv"></div>
					<input type="text" onkeyup="sugerencias(this.value)" name="usuario" placeholder="Usuario:" required="" ><br>
					<input type="password" name="password" placeholder="Contraseña:" required=""><br>
					<input type="email" name="email" placeholder="Email" required=""><br>
					<select name="perfil" id="perfil">
						<option value="1">Super usuario</option>
						<option value="2">Usuario estandar</option>
						<option value="3">Usuario externo</option>
					</select>
					<input type="submit" name="enviar" value="Crear usuario">		
				</form>
				

			</div>
		</div>

		<div class="agregar">
			<a href="javascript:openVentana();"><i class="fa fa-plus-square-o fa-3x" aria-hidden="true"></i></a>
		</div>
		<div class="contenido">
			<table>
				<tr class="head">
					<th>#</th>
					<th>Nombre</th>
					<th>Usuario</th>
					<th>Contraseña</th>
					<th>Email</th>
					<th>Tipo</th>
				</tr>
				<?php 
				foreach ($statement as $valor) {
					?>
					<tr class="cuerpo">
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
		<!--<footer>
			
		</footer>-->
	</body>
	</html>