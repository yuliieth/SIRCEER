<?php require 'cabecera-admin.php' ?>
<?php require("header-menu.view.php") #Aun falta recibir el parametro?>
<div class="formulario-editar-user">
	<h3>Esta modificando una institucion:</h3>
	<hr>
	<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST">
		<input type="hidden" size="20" name="snies" value="<?php echo $result['snies']; ?>">
		<input type="text" size="20" name="nombre" value="<?php echo $result['nombre']; ?>"  placeholder="Nombre" required="">
		<input type="text" size="30" name="num_semestres" value="<?php echo $result['num_semestres']; ?>"  placeholder="Semestres" required="">
		<input type="text" size="30" name="num_creditos" value="<?php echo $result['num_creditos']; ?>"  placeholder="Creditos" required="">

		
		
		<select  name="nivel_academico" id="nivel_academico">
			<optgroup label="nivel_academico">
				<option value="1"<?php if ($result['nivel_academico_id'] == 'Tecnico'){echo " selected";}?>>Tecnico</option>
				<option value="2"<?php if ($result['nivel_academico_id'] == 'Tecnologo'){echo " selected";}?>>Tecnologo</option>
				<option value="3"<?php if ($result['nivel_academico_id'] == 'Ingenieria'){echo " selected";}?>>Ingenieria</option>
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


