<?php require("cabecera-admin.php") ?>
<?php require("header-menu.view.php") ?>			
<!--CONTENIDO-->

<div class="wrap-formulario-new-estudiante">
	<h1>Nuevo Sede</h1>
		
	<form  action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST">
	<table width="100%">
		<tr>
			<td>
			<label for="nombre">Nombre:</label>
			</td>
			<td><input type="text" size="20" name="nombre" placeholder="Nombre" required="" ></td>
			<td><label for="codigo_dane">Codigo DANE:</label></td>
			<td><input type="text" size="20" name="codigo_dane" placeholder="Codigo DANE" required="" ></td>
		</tr>

		<tr>
			<td>
			<label for="consecutivo">Consecutivo</label>
			</td>
			<td><input type="text" name="consecutivo" placeholder="Consecutivo"></td>
			<td><label for="zona">Zona</label></td>
			<td>
				<select name="zona" id="">
				<?php foreach ($zonas as $value): ?>
					<option value="<?php echo $value['id'] ?>"><?php echo $value['nombre'] ?></option>
				<?php endforeach ?>
				</select>
			</td>
		</tr>	

		<tr>

			<td><label for="modelo">Modelo</label></td>
			<td>
				<select name="modelo" id="">
				<?php foreach ($modelos as $value): ?>
					<option value="<?php echo $value['id'] ?>"><?php echo $value['nombre'] ?></option>
				<?php endforeach ?>
				</select>
			</td>
			<td><label for="institucion">Institucion</label></td>
			<td>
				<select name="institucion" id="">
				<?php foreach ($instituciones as $value): ?>
					<option value="<?php echo $value['id'] ?>"><?php echo $value['nombre'] ?></option>
				<?php endforeach ?>
				</select>
			</td>
		</tr>

		<tr>

			<td><label for="municipio">Municipio</label></td>
			<td>
				<select name="municipio" id="">
					<option value="#">No aplica</option>
				<?php foreach ($municipios as $value): ?>
					<option value="<?php echo $value['id'] ?>"><?php echo $value['nombre'] ?></option>
				<?php endforeach ?>
				</select>
			</td>
			<td><label for="alianza">Alianza</label></td>
			<td>
				<select  name="alianza" id="alianza">
			<?php foreach ($alianzas as $valor): ?>
				<option value="<?php echo $valor['id'] ?>"><?php echo $valor['nombre'] ?></option>
			<?php endforeach ?>
		</select>
			</td>
		</tr>

		
	</table>	

		<?php //if (!empty($errores)): ?>
			<!--<div class="input-redit alert error">
				<?php #echo $errores;?>
			</div>-->	
		<?php #elseif($enviado): ?>
			<!--<div class="input-redit alert success">
				<p>Datos enviados correctamente</p>
			</div>-->
		<?php #endif ?>
		

		
		<input type="reset" name="">
		<input type="submit" name="submit" class="btn btn-primary" value="Guardar">

	</form>
	
</div>

<!--END CONTENIDO-->
<?php require("footer-menu.view.php") ?>					
<?php #require("piedepagina-admin.php") ?>

<script type=text/javascript>
	function validarForm(formulario)
	{
		if (formulario.busqueda.value.length == 0) 
		{
			formulario.busqueda.focus();
			alert("Debes ingresar el documento");
			return false;
		}
		return true;
	}
</script>