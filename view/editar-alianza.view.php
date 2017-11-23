<?php require 'cabecera-admin.php' ?>
<?php require("header-menu.view.php") #Aun falta recibir el parametro?>
<div class="formulario-editar-user">
	<h3>Esta modificando un estudiante:</h3>
	<hr>
	<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST">
	 <table>
		<tr>
			<td><label for="nombre">ID:</label></td>
			<td><input type="text" size="20" readonly="readonly" value="<?php echo $result['id'] ?>" name="id" required="" ></td>
			<td><label for="nombre">Nombre:</label></td>
			<td><input type="text" size="20" value="<?php echo $result['nombre'] ?>" name="nombre" required="" ></td>
		</tr>


		<tr>
			<td><label for="fecha_ini">Fecha de inicio:</label></td>
			<td><input type="text" size="30" value="<?php echo $result['fecha_inicio'] ?>" name="fecha_ini" required="required"></td>
			<td><label for="fecha_fina">Fecha final:</label></td>
			<td><input type="text" size="20" value="<?php echo $result['fecha_final'] ?>" name="fecha_fina" required="required" ></td>
		</tr>


		<tr>
			<td><label for="cupos">Cupos:</label></td>
			<td><input type="text" size="30" value="<?php echo $result['cupos'] ?>" name="cupos"  required="required"></td>
			<td></td>
			<td></td>
		</tr>

		<tr>
			<td></td>
			<td></td>
			<td><input type="reset" name=""></td>
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
<?php require 'piedepagina-admin.php' ?>


