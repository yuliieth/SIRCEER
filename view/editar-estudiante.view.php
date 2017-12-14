<?php require 'cabecera-admin.php' ?>
<?php require("header-menu.view.php") #Aun falta recibir el parametro?>
<div class="formulario-editar-user">
	<h3>Esta modificando un estudiante:</h3>
	<hr>
	<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST">
		<table>
		<tr>
			<td><label>Documento</label></td>
			<td><input type="text" readonly="readonly" size="20" name="documento" value="<?php echo $result['documento']; ?>"></td>
			<td><label>Primer nombre</label></td>
			<td><input type="text" size="30" name="primer_nombre"  value="<?php echo $result['primer_nombre']; ?>"  placeholder="Primer nombre" required=""></td>
		</tr>
		
		<tr>
			<td><label>Segundo nombre</label></td>
			<td><input type="text" size="30" name="segundo_nombre"  value="<?php echo $result['segundo_nombre']; ?>"  placeholder="Primer nombre" required="">	</td>
		
			<td><label>Primer apellido</label>	</td>
			<td><input type="text" size="30" name="primer_apellido" value="<?php echo $result['primer_apellido']; ?>"  placeholder="Primer apellido" required=""></td>
		</tr>

		<tr>
			<td><label>Segundo apellido</label></td>
			<td><input type="text" size="30" name="segundo_apellido" value="<?php echo $result['segundo_apellido']; ?>"  placeholder="Segundo apellido" required=""></td>
			<td><label>Direccion de Residencia</label></td>
			<td><input type="text" size="30" name="dire_resi" value="<?php echo $result['direccion_residencia']; ?>" placeholder="Direccion"></td>
		</tr>
		<tr>
			<td><label>Municipio de residencia</label></td>
			<td><select  name="muni_resi" id="municipio">
			<?php foreach ($municipios as $muni): ?>
					<option value="<?php echo $muni['id'] ?>" <?php if ($result['municipio_resi_id'] == $muni['id']): ?>
						<?php echo 'selected' ?>
					<?php endif ?>><?php echo $muni['nombre'] ?></option>
				<?php endforeach ?>
		</select></td>
			<td><label>Estrato</label>	</td>
			<td><input type="number" size="30" name="estrato"  value="<?php echo $result['estrato']; ?>"  placeholder="Estrato" required=""></td>
		</tr>

		<tr>
			<td><label>Telefono de contacto</label></td>
			<td><input type="text" size="30" name="tel_contacto" value="<?php echo $result['tel_contacto']; ?>"  placeholder="Telefono de contacto"></td>
			<td><label>Email</label></td>
			<td><input type="email" size="30" name="email"  value="<?php echo $result['email']; ?>"  placeholder="Email" required=""></td>
		</tr>

		<tr>
			<td><label>Fecha de nacimiento</label></td>
			<td><input type="date" name="fecha_naci" step="1" min="1980-01-01" max="2018-12-31" value="<?php echo $result['fecha_naci'];?>" placeholder="Fecha de nacimiento"></td>
			<td><label>Edad</label></td>
			<td><input type="number" name="edad" placeholder="Edad: 10-25" required="" value="<?php echo $result['edad'];?>"></td>
		</tr>
		
		<tr>
			<td><label>Municipio de nacimiento</label></td>
			<td><select  name="muni_naci" id="municipio">
			<?php foreach ($municipios as $muni): ?>
					<option value="<?php echo $muni['id'] ?>" <?php if ($result['municipio_naci_id'] == $muni['id']): ?>
						<?php echo 'selected' ?>
					<?php endif ?>><?php echo $muni['nombre'] ?></option>
				<?php endforeach ?>
		</select></td>

			<td><label>Zona</label></td>
			<td><select  name="zona" id="zona">
					<option value="Urbana" <?php if ($result['zona'] == 'Urbana'): ?>
						 <?php echo "selected" ?> 
					<?php endif ?>>Urbana</option>
					<option value="Rural" <?php if ($result['zona'] == 'Rural'): ?>
						 <?php echo "selected" ?> 
					<?php endif ?>>Rural</option>
		</select></td>
		</tr>
		
		<tr>
			<th><label >Situacion*:</label></th>
		</th>
		<tr>
			<td><label  for="situacion">Si</label></td>
		<td><select  name="situacion" id="situacion">
					<option value="Desplazado" <?php if ($result['situacion'] == 'Desplazado'): ?>
						 <?php echo "selected" ?> 
					<?php endif ?>>Desplazado</option>
					<option value="Victima conflicto" <?php if ($result['situacion'] == 'Victima conflicto'): ?>
						 <?php echo "selected" ?> 
					<?php endif ?>>Victima del conflicto</option>
					<option value="Vulnerable" <?php if ($result['situacion'] == 'Vulnerable'): ?>
						 <?php echo "selected" ?> 
					<?php endif ?>>Poblacion vulnerable</option>
		</select></td>
		<td><label for="situacion_academica">Situacion academica</label></td>
		<td>
			<select name="situacion_academica" id="">

				<option value="Matriculado" <?php if ($result['situacion_academica'] == 'Matriculado'): ?>
						 <?php echo "selected" ?> 
					<?php endif ?> >Matriculado</option>

				<option value="Cancelado" <?php if ($result['situacion_academica'] == 'Cancelado'): ?>
						 <?php echo "selected" ?> 
					<?php endif ?>>Cancelado</option>

				<option value="Promovido" <?php if ($result['situacion_academica'] == 'Promovido'): ?>
						 <?php echo "selected" ?> 
					<?php endif ?>>Promovido</option>

				<option value="Culmino" <?php if ($result['situacion_academica'] == 'Culmino'): ?>
						 <?php echo "selected" ?> 
					<?php endif ?>>Culmino</option>

			</select>
		</td>
		</tr>

		<tr>
		<th><label>Tipo de poblacion*:</label></th>
		</tr>
		<tr>
		<td><label for="tipo_poblacion">Si</label></td>
		<td><select  name="tipo_poblacion" id="tipo_poblacion">
					<option value="Mestizo" <?php if ($result['tipo_poblacion'] == 'Mestizo'): ?>
						 <?php echo "selected" ?> 
					<?php endif ?>>Mestizo</option>
					<option value="Indigena" <?php if ($result['tipo_poblacion'] == 'Indigena'): ?>
						 <?php echo "selected" ?> 
					<?php endif ?>>Indigena</option>
					<option value="Afro" <?php if ($result['tipo_poblacion'] == 'Afro'): ?>
						 <?php echo "selected" ?> 
					<?php endif ?>>Afro</option>
		</select></td>
		</tr>
		
		
		<tr>
		<th><label >Color de ojos*:</label></th>
		</tr>
		<tr>
		<td><label for="negros">Negros</label></td>
		<td><input type="radio" id="negros" value="Negros" name="ojos"<?php if ($result['ojos'] == 'Negros'){echo " checked";}?>></td>
		<td><label for="azules">Azules</label></td>
		<td><input type="radio" id="azules" value="Azules" name="ojos"<?php if ($result['ojos'] == 'Azules'){echo " checked";}?>></td>
		</tr>
		<tr>
		<td><label for="cafes">Cafes</label></td>
		<td><input type="radio" id="cafes" value="Cafes" name="ojos"<?php if ($result['ojos'] == 'Cafes'){echo " checked";}?>></td>
		<td><label for="marron">Marron</label></td>
		<td><input type="radio" id="marron" value="Marron" name="ojos"<?php if ($result['ojos'] == 'Marron'){echo " checked";}?>></td>
		</tr>

		<?php if (!empty($errores)): ?>
			<div class="input-redit alert error">
				<?php echo $errores;?>
			</div>	
		<?php elseif($enviado): ?>
			<div class="input-redit alert success">
				<p>Datos enviados correctamente</p>
			</div>
		<?php endif ?>
		

		<tr>
		<td><td><input type="reset" name=""></td>
		<td><input type="submit" name="submit" class="btn btn-primary" value="Guardar"></td>
		</tr>
		</table>
	</form>
</div>
<?php #require 'piedepagina-admin.php' ?>


