<?php require 'cabecera-admin.php' ?>
<?php require("header-menu.view.php") #Aun falta recibir el parametro?>
<div class="formulario-editar-user">
	<h3>Esta modificando una institucion:</h3>
	<hr>
	<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST">
		<input type="hidden" size="20" name="id" value="<?php echo $result['id']; ?>">
		<input type="text" size="20" name="nombre" value="<?php echo $result['nombre']; ?>"  placeholder="Nombre" required="">
		<input type="text" size="30" name="codigo"  value="<?php echo $result['codigo']; ?>"  placeholder="Codigo" required="">
		<input type="text" size="30" name="telefono" value="<?php echo $result['telefono']; ?>"  placeholder="Telefono" required="">
		<select  name="municipio" id="municipio">
			<optgroup label="Risaralda">
				<option value="pereira"<?php if ($result['municipio'] == 'pereira'){echo " selected";}?>>Pereira</option>
				<option value="dosquebradas"<?php if ($result['municipio'] == 'dosquebradas'){echo " selected";}?>>D/Quebradas</option>
				<option value="santa rosa"<?php if ($result['municipio'] == 'santa rosa'){echo " selected";}?>>Santa rosa</option>
				<option value="apia"<?php if ($result['municipio'] == 'apia'){echo " selected";}?>>Apia</option>
				<option value="mistrato"<?php if ($result['municipio'] == 'mistrato'){echo " selected";}?>>Mistrato</option>
				<option value="belen de umbria"<?php if ($result['municipio'] == 'belen de umbria'){echo " selected";}?>>Belen de umbria</option>
				<option value="chinchina"<?php if ($result['municipio'] == 'chinchina'){echo " selected";}?>>Chinchina</option>
			</optgroup>
		</select>		
		<input type="email" size="30" name="email" value="<?php echo $result['email']; ?>"  placeholder="E-mail" required="">
		<input type="text" size="30" name="direccion" value="<?php echo $result['direccion']; ?>" placeholder="Direccion" ><br>
		
		
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
</div>
<?php require 'piedepagina-admin.php' ?>


