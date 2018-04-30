<?php require("cabecera-admin.php") ?>
<?php require("header-menu.view.php") ?>			
<!--CONTENIDO-->
<div class="wrap-formulario-institucion">
	
<div class="wra_titulo">
	<h2>Nueva universidad</h2>
</div>
	<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST">	
	<table>
		<tr>
			<td><label for="nombre">Nombre</label></td>
			<td><input type="text" size="30" name="nombre" placeholder="Nombre*" required></td>
			<td><label for="telefono">Telefono</label></td>
			<td><input type="text" size="30" name="telefono" placeholder="Telefono"></td>
		</tr>
	
		<tr>
			<td><label for="email">E-mail</label></td>
			<td><input type="email" size="30" name="email" placeholder="E-mail*" ></td>
			<td><label for="direccion">Direccion</label></td>
			<td><input type="text" size="30" name="direccion" placeholder="Direccion"></td>
		</tr>
		
		<tr>
			<td><label for="alianza">Alianza</label></td>
			<td>
				<select  name="alianza" id="alianza">
			<?php foreach ($alianzas as $valor): ?>
				<option value="<?php echo $valor['id'] ?>"><?php echo $valor['nombre'] ?></option>
			<?php endforeach ?>
		</select>
			</td>
			<td><label for="municipio">Munucipio</label></td>
			<td>
				<select  name="municipio" id="municipio">
			<?php foreach ($municipios as $valor): ?>
				<option value="<?php echo $valor['id'] ?>"><?php echo $valor['nombre'] ?></option>
			<?php endforeach ?>
		</select>
			</td>
		</tr>

		<tr>
			<td></td>
			<td><input type="reset" name=""></td>
			<td></td>
			<td><input type="submit" name="submit" class="btn btn-primary" value="Guardar"></td>
		</tr>
		
		
		
		<?php if (!empty($errores)): ?>
			<div class="input-redit alert error">
				<?php echo $errores;?>
			</div>	
		<?php elseif($enviado): ?>
			<div class="input-redit alert success">
				<p>Datos enviados correctamente</p>
			</div>
		<?php endif ?>
	</table>
		

	</form>
</div>

<!--END CONTENIDO-->				

<?php require("footer-menu.view.php") ?>	


<!--<?php #require("piedepagina-admin.php") ?>-->