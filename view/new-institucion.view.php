<?php require("cabecera-admin.php") ?>
<?php require("header-menu.view.php") ?>			
<!--CONTENIDO-->
<h2>Nueva institucion</h2>
<div class="wrap-formulario-institucion">

	<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST">	
	<table>
		<tr>
			<td><input type="text" size="30" name="nombre" placeholder="Nombre*" required></td>
			<td><input type="text" size="30" name="telefono" placeholder="Telefono"></td>
		</tr>
	
		<tr>
			<td>
				<select  name="municipio" id="municipio">
			<?php foreach ($municipios as $valor): ?>
				<option value="<?php echo $valor['id'] ?>"><?php echo $valor['nombre'] ?></option>
			<?php endforeach ?>
		</select>
			</td>
			<td><input type="email" size="30" name="email" placeholder="E-mail*" required=""></td>
		</tr>
		
		<!--<input type="text" size="30" name="codigo" placeholder="Codigo*" required="">-->
		
		<tr>
			<td><input type="text" size="30" name="direccion" placeholder="Direccion"></td>
		</tr>

		<tr>
			<td><input type="reset" name=""></td>
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