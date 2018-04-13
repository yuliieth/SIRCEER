<?php require("cabecera-admin.php") ?>
<?php require("header-menu.view.php") ?>			
<!--CONTENIDO-->

<div class="wrap-formulario-new-estudiante">
	<h1>Nuevo Institucion</h1>
		
	<form  action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST">
	<table width="100%">
		<tr>
			<td>
			<label for="nombre">Nombre:</label>
			</td>
			<td><input type="text" size="20" name="nombre" placeholder="Nombre" required="" ></td>
			<td><label for="telefono">Telefono:</label></td>
			<td><input type="text" size="12" name="telefono" placeholder="Telefono de contacto"></td>
		</tr>

		<tr>
			<td>
			<label for="siglas">Siglas:</label>
			</td>
			<td><input type="text" name="siglas" placeholder="Siglas"></td>
			<td><label for="calendario">Calendario:</label></td>
			<td>
				<select name="calendario" id="">
					<option value="#">Sin selccionar</option>
					<option value="A">A</option>
					<option value="B">B</option>
				</select>
			</td>
		</tr>	

		<tr>
			<td><label for="dane">DANE</label></td>
			<td><input type="text" name="dane" placeholder="DANE"></td>

			<td><label for="sector">Sector</label></td>
			<td>
				<select name="sector" id="">
					<option value="#">No aplica</option>
				<?php foreach ($sectores as $value): ?>
					<option value="<?php echo $value['id'] ?>"><?php echo $value['nombre'] ?></option>
				<?php endforeach ?>
				</select>
			</td>
		</tr>

		<tr>
			<td><label for="municipio">Municipio</label></td>
			<td>
				<select name="municipio" id="">
					<?php foreach ($municipios as $value): ?>
					<option value="<?php echo $value['id'] ?>"><?php echo $value['nombre'] ?></option>
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