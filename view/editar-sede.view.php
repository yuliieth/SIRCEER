<?php require 'cabecera-admin.php' ?>
<?php require("header-menu.view.php") #Aun falta recibir el parametro?>
<div class="formulario-editar-user">
	<h3>Esta modificando una sede:</h3>
	<hr>
	<form  action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST">
	<table width="100%">

		<tr>
			<td><input type="hidden" name="id" value="<?php echo $result['id'] ?>"></td>
		</tr>
		<tr>
			<td>
			<label for="nombre">Nombre:</label>
			</td>
			<td><input type="text" size="20" name="nombre" placeholder="Nombre" required=""  value="<?php echo $result['nombre'] ?>"></td>
			<td><label for="codigo_dane">Codigo DANE:</label></td>
			<td><input type="text" size="20" name="codigo_dane" placeholder="Codigo DANE" required=""  value="<?php echo $result['codigo_dane_sede'] ?>"></td>
		</tr>

		<tr>
			<td>
			<label for="consecutivo">Consecutivo</label>
			</td>
			<td><input type="text" name="consecutivo" required="required" placeholder="Consecutivo" value="<?php echo $result['consecutivo'] ?>"></td>
			<td><label for="zona">Zona</label></td>
			<td>
				<select name="zona" id="">
					<option value="#">No aplica</option>
				<?php foreach ($zonas as $value): ?>
					<option value="<?php echo $value['id'] ?>" <?php if ($result['zona_id'] == $value['id']): ?>
						<?php echo 'selected' ?>
					<?php endif ?>><?php echo $value['nombre'] ?></option>
				<?php endforeach ?>
				</select>
			</td>
		</tr>	

		<tr>

			<td><label for="modelo">Modelo</label></td>
			<td>
				<select name="modelo" id="">
					<option value="#">No aplica</option>
				<?php foreach ($modelos as $value): ?>
					<option value="<?php echo $value['id'] ?>" <?php if ($result['modelo_id'] == $value['id']): ?>
						<?php echo 'selected' ?>
					<?php endif ?>><?php echo $value['nombre'] ?></option>
				<?php endforeach ?>
				</select>
			</td>
			<td><label for="institucion">Institucion</label></td>
			<td>
				<select name="institucion" id="">
					<option value="#">No aplica</option>
				<?php foreach ($instituciones as $value): ?>
					<option value="<?php echo $value['id'] ?>" <?php if ($result['institucion_id'] == $value['id']): ?>
						<?php echo 'selected' ?>
					<?php endif ?>><?php echo $value['nombre'] ?></option>
				<?php endforeach ?>
				</select>
			</td>
		</tr>

		<tr>

			<td><label for="municipio">Municipio</label></td>
			<td>
				<select name="municipio" id="">
					<option value="#">No aplica</option>
				<?php foreach ($municipios as $value): ?>
					<option value="<?php echo $value['id'] ?>" <?php if ($result['municipio_id'] == $value['id']): ?>
						<?php echo 'selected' ?>
					<?php endif ?>><?php echo $value['nombre'] ?></option>
				<?php endforeach ?>
				</select>
			</td>
		</tr>

	<tr>
		<td> </td>
		<td>
		<input type="reset" name="">
		</td>
		<td>
		<input type="submit" name="submit" class="btn btn-primary" value="Guardar">
		</td>
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
		

		

	</form>
</div>
<?php require 'piedepagina-admin.php' ?>


