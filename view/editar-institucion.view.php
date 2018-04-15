<?php require 'cabecera-admin.php' ?>
<?php require("header-menu.view.php") #Aun falta recibir el parametro?>
<div class="formulario-editar-user">
	<h3>Esta modificando una institucion:</h3>
	<hr>
	<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST">

		<table>

		  <tr>
		  	<td>Id</td>
			<td><input type="text" readonly="readonly" size="20" name="id" value="<?php echo $result['id']; ?>"></td>
			<td>Nombre</td>
			<td><input type="text" size="20" name="nombre" value="<?php echo $result['nombre']; ?>"  placeholder="Nombre" required=""></td>
		  </tr>

		  <tr>
		  	<td>Telefono</td>
			<td><input type="text" size="30" name="telefono" value="<?php echo $result['telefono']; ?>"  placeholder="Telefono" ></td>
			<td>Siglas:</td>
			<td><input type="text" size="10" name="siglas" value="<?php echo $result['siglas']; ?>"  placeholder="Siglas" ></td>
		  </tr>

		  <tr>
		  	<td><label for="calendario">Calendario</label></td>
		  	<td>
		  		<select name="calendario" id="">
		  			<option value="A" <?php if ($result['calendario'] == 'A'): ?>
		  				<?php echo ' selected' ?>
		  			<?php endif ?>>A</option>
		  			<option value="B" <?php if ($result['calendario'] == 'B'): ?>
		  				<?php echo ' selected' ?>
		  			<?php endif ?>>B</option>
		  		</select>
		  	</td>
		  	<td><label for="dane"></label></td>
		  	<td><input type="text" name="dane" required="required" value="<?php echo $result['DANE'] ?>"></td>
		  </tr>

		  <tr>
		  	<td></td>
		  	<td></td>
			<td><input type="reset" value="Restaurar"></td>
			<td><input type="submit" name="submit" class="btn btn-primary" value="Guardar"></td>
		  </tr>

		</table>
		
		
		<?php if (!empty($errores)): ?>
			<div class="input-redit alert error">
				<?php echo $errores;?>
			</div>	
		<?php elseif($enviado): ?>
			<div class="input-redit alert success">
				<p>Datos enviados correctamente</p>
			</div>
		<?php endif ?>
		

		
		
		

	</form>
</div>
<?php #require 'piedepagina-admin.php' ?>


