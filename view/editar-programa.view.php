<?php require 'cabecera-admin.php' ?>
<div class="formulario-editar-user">
	<h3>Esta modificando una institucion:</h3>
	<hr>
	<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST">
		<input type="hidden" size="20" name="id" value="<?php echo $result['id']; ?>">
		<input type="text" size="20" name="nombre" value="<?php echo $result['nombre']; ?>"  placeholder="Nombre" required="">
		<input type="text" size="30" name="codigo_snies"  value="<?php echo $result['codigo_snies']; ?>"  placeholder="Codigo SNIES" required="">
		<input type="text" size="30" name="num_semestres" value="<?php echo $result['num_semestres']; ?>"  placeholder="Semestres" required="">
		<input type="text" size="30" name="num_creditos" value="<?php echo $result['num_creditos']; ?>"  placeholder="Creditos" required="">
		<select  name="nivel_academico" id="nivel_academico">
			<optgroup label="nivel_academico">
				<option value="Tecnico"<?php if ($result['nivel_academico'] == 'Tecnico'){echo " selected";}?>>Tecnico</option>
				<option value="Tecnologo"<?php if ($result['nivel_academico'] == 'Tecnologo'){echo " selected";}?>>Tecnologo</option>
				<option value="Ingenieria"<?php if ($result['nivel_academico'] == 'Ingenieria'){echo " selected";}?>>Ingenieria</option>
			</optgroup>
		</select>		
		
		
		
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


