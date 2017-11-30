<?php require 'cabecera-admin.php' ?>
<?php require("header-menu.view.php") #Aun falta recibir el parametro?>
<div class="formulario-editar-user">
	<h3>Esta modificando una institucion:</h3>
	<hr>
	<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST">

		<table>

		  <tr>
		  	<td>Id:</td>
			<td><input type="text" readonly="readonly" size="20" name="id" value="<?php echo $result['id']; ?>"></td>
			<td>Nombre:</td>
			<td><input type="text" size="20" name="nombre" value="<?php echo $result['nombre']; ?>"  placeholder="Nombre" required=""></td>
		  </tr>

		  <tr>
		  	<td>Telefono:</td>
			<td><input type="text" size="30" name="telefono" value="<?php echo $result['telefono']; ?>"  placeholder="Telefono" required=""></td>
			<td>Email:</td>
			<td><input type="email" size="30" name="email" value="<?php echo $result['email']; ?>"  placeholder="E-mail" required=""></td>
		  </tr>

		  <tr>
		  	<td>Dirección:</td>
		  	<td><input type="text" size="30" name="direccion" value="<?php echo $result['direccion']; ?>" placeholder="Direccion" ></td>
		  	<td></td>
		  	<td></td>
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


