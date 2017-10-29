<?php require("cabecera-admin.php") ?>
<?php require("header-menu.view.php") ?>			
<!--CONTENIDO-->

<div class="wrap-formulario-new-estudiante">
	<h1>Nuevo estudiante</h1>
		
	<form  action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST">
	<table width="100%">
		<tr>
			<td>
			<label for="nombre">Nombre:</label>
			</td>
			<td>
			<td><input type="text" size="20" name="nombre" placeholder="Nombre alianza" required="" ></td>	
			</td>
			<td><label for="fecha_ini">Fecha de inicio:</label></td>
			<td><input type="text" size="30" name="fecha_ini" placeholder="Fecha de inicio" required="required"></td>
		</tr>

		<tr>
			<td>
			<label for="fecha_fina">Fecha final:</label>
			</td>
			<td>
			<td><input type="text" size="20" name="fecha_fina" placeholder="Fecha de finalizacion" required="" ></td>	
			</td>
			<td><label for="cupos">Cupos:</label></td>
			<td><input type="text" size="30" name="cupos" placeholder="cupos" required="required"></td>
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
<?php require("piedepagina-admin.php") ?>

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