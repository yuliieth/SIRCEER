<?php require 'cabecera-admin.php';?>
<?php require("header-menu.view.php") ?>
<div class="contenedor">
	<!--SEGUNDO FORMULARIO DE RENOVACION SEMESTRE-->	
	<!--<h2>REALIZAR MATRICULA</h2>-->
	<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST">
	<table>

		<tr>
			<td><input type="hidden" name="id" value="<?php echo $result['id'] ?>"></td>
		</tr>
	<tr>
			<td><label for="nombre">Nombre</label></td>
			<td><input type="text" size="30" name="nombre" placeholder="Nombre*" 	required="required" value="<?php echo $result['nombre'] ?>"></td>
			<td><label for="telefono">Telefono</label></td>
			<td><input type="text" size="30" name="telefono" placeholder="Telefono" value="<?php echo $result['telefono'] ?>"></td>
		</tr>
	
		<tr>
			<td><label for="email">E-mail</label></td>
			<td><input type="email" size="30" name="email" placeholder="E-mail*"  value="<?php echo $result['email'] ?>"></td>
			<td><label for="direccion">Dirección</label></td>
			<td><input type="text" size="30" name="direccion" placeholder="Direccion" value="<?php echo $result['direccion'] ?>"></td>
		</tr>
		
		<tr>
			<td><label for="municipio">Municipio</label></td>
			<td>
				<select  name="municipio" id="municipio">
			<?php foreach ($municipios as $value): ?>
					<option value="<?php echo $value['id'] ?>" <?php if ($result['ciudad_id'] == $value['id']): ?>
						<?php echo 'selected' ?>
					<?php endif ?>><?php echo $value['nombre'] ?></option>
				<?php endforeach ?>
		</select>
			</td>
			<td><label for="alianza">Alianza</label></td>
			<td>
				<select  name="alianza" id="alianza">
			<?php foreach ($alianzas as $valor): ?>
				<option value="<?php echo $valor['id'] ?>" <?php if ($result['alianza_id'] == $valor['id']): ?>
						<?php echo 'selected' ?>
					<?php endif ?>><?php echo $valor['nombre'] ?></option>
			<?php endforeach ?>
		</select>
			</td>
		</tr>

		<tr>
			<td><input type="submit" name="enviar" value="Enviar"></td>
		</tr>
	
	</table>
	</form>



</div>
<?php require("footer-menu.view.php") ?>
<?php #require'piedepagina-admin.php' ?>