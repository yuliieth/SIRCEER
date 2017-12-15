<?php require 'cabecera-admin.php' ?>
<?php require("header-menu.view.php") #Aun falta recibir el parametro?>
<div class="formulario-editar-user">
	<h3>Esta modificando un programa:</h3>
	<hr>
	<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST">

		<table>
			<tr>
				<td>SNIES:</td>
				<td><input type="text" readonly="readonly" size="20" name="snies" value="<?php echo $result['snies']; ?>"></td>
				<td>Nombre:</td>
				<td><input type="text" size="20" name="nombre" value="<?php echo $result['nombre']; ?>"  placeholder="Nombre" required=""></td>
			</tr>


			<tr>
				<td>Numero de semestres:</td>
				<td><input type="text" size="30" name="num_semestres" value="<?php echo $result['num_semestres']; ?>"  placeholder="Semestres" required=""></td>
				<td>Numero de creditos:</td>
				<td><input type="text" size="30" name="num_creditos" value="<?php echo $result['num_creditos']; ?>"  placeholder="Creditos" required=""></td>
			</tr>


			<tr>
				<td>Nivel academico:</td>
				<td><select  name="nivel_academico" id="nivel_academico">
				<option value="1"<?php if ($result['nivel_academico_id'] == 1){echo " selected";}?>>Tecnico</option>
				<option value="2"<?php if ($result['nivel_academico_id'] == 2){echo " selected";}?>>Tecnologia</option>
				<option value="3"<?php if ($result['nivel_academico_id'] == 3){echo " selected";}?>>Ingenieria</option>
		</select>		
		</td>
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
<?php #require 'piedepagina-admin.php' ?>


