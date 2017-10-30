<?php require 'cabecera-admin.php' ?>
<?php require("header-menu.view.php") #Aun falta recibir el parametro?>
<div class="formulario-editar-user">
	<h3>Esta modificando un estudiante:</h3>
	<hr>
	<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST">
		<label for="nombre">ID:</label>
		<input type="text" size="20" readonly="readonly" value="<?php echo $result['id'] ?>" name="id" required="" >
		<label for="nombre">Nombre:</label>
		<input type="text" size="20" value="<?php echo $result['nombre'] ?>" name="nombre" required="" >
		<label for="fecha_ini">Fecha de inicio:</label>
		<input type="text" size="30" value="<?php echo $result['fecha_inicio'] ?>" name="fecha_ini" required="required"><br>
		<label for="fecha_fina">Fecha final:</label>
		<input type="text" size="20" value="<?php echo $result['fecha_final'] ?>" name="fecha_fina" required="required" >
		<label for="cupos">Cupos:</label>
		<input type="text" size="30" value="<?php echo $result['cupos'] ?>" name="cupos"  required="required"><br>

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


