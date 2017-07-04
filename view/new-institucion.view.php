<?php require("cabecera-admin.php") ?>
<?php require("header-menu.view.php") ?>			
<!--CONTENIDO-->

<div class="wrap-formulario">

	<!--<table class="table-formulario">-->
	<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST">
		
		
		<input type="text" size="30" name="nombre" placeholder="Nombre*" required>
		<input type="text" size="30" name="codigo" placeholder="Codigo*" required="">
		<input type="text" size="30" name="telefono" placeholder="Telefono">		
		<br>
		<select  name="municipio" id="municipio">
			<optgroup label="Risaralda">
				<option value="pereira">Pereira</option>
				<option value="dosquebradas">D/Quebradas</option>
				<option value="santa rosa">Santa rosa</option>
				<option value="apia">Apia</option>
				<option value="mistrato">Mistrato</option>
				<option value="belen de umbria">Belen de umbria</option>
				<option value="chinchina">Chinchina</option>
			</optgroup>
		</select>		
		<input type="email" size="30" name="email" placeholder="E-mail" required="">	
		<input type="text" size="30" name="direccion" placeholder="Direccion">
		
		
		<br>
		
		
		<?php if (!empty($errores)): ?>
			<div class="input-redit alert error">
				<?php echo $errores;?>
			</div>	
		<?php elseif($enviado): ?>
			<div class="input-redit alert success">
				<p>Datos enviados correctamente</p>
			</div>
		<?php endif ?>
		

		
		<input type="reset" name="">
		<input type="submit" name="submit" class="btn btn-primary" value="Guardar">

	</form>
	<!--</table>-->
</div>

<!--END CONTENIDO-->				




<!--<?php require("piedepagina-admin.php") ?>-->