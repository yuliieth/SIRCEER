<?php require 'cabecera-admin.php' ?>
<?php require("header-menu.view.php") #Aun falta recibir el parametro?>
<div class="formulario-editar-user">
	<h3>Esta modificando un estudiante:</h3>
	<hr>
	<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST">
		<table>
		<tr>
			<td><label>Documento</label></td>
			<td><input type="text" size="20" name="documento" value="<?php echo $result['documento']; ?>"></td>
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
					<option value="<?php echo $muni['id'] ?>"><?php echo $muni['nombre'] ?></option>
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
			<td><input type="date" name="fecha_naci" step="1" min="1950-01-01" max="2018-12-31" value="<?php echo date("Y-m-d");?>" placeholder="Fecha de nacimiento"></td>
			<td><label>Edad</label></td>
			<td><input type="number" name="edad" placeholder="Edad: 10-25" required="" value="<?php echo $result['edad'];?>"></td>
		</tr>
		
		<tr>
			<td><label>Municipio de nacimiento</label></td>
			<td><select  name="muni_naci" id="municipio">
			<?php foreach ($municipios as $muni): ?>
					<option value="<?php echo $muni['id'] ?>"><?php echo $muni['nombre'] ?></option>
				<?php endforeach ?>
		</select></td>
			<td><label>Zona</label></td>
			<td><select  name="zona" id="zona">
					<option value="Urbana" <?php if ($result['zona'] == 'Urbana'): ?>
						 <?php echo "selected" ?> 
					<?php endif ?>> <?php echo $result['zona'] ?> </option>
					<option value="Rural" <?php if ($result['zona'] == 'Rural'): ?>
						 <?php echo "selected" ?> 
					<?php endif ?>> <?php echo $result['zona'] ?> </option>
		</select></td>
		</tr>
		
		<tr>
			<th><label >Desplazado*:</label></th>
		</th>
		<tr>
			<td><label  for="des_si">Si</label></td>
		<td>
			<input type="radio" id="des_si" value="Si" name="desplazado"<?php if ($result['desplazado'] == 'Si'){echo " checked";}?>>
		</td>
		<td><label  for="des_no">No</label></td>
		<td><input type="radio" id="des_no" value="No" name="desplazado"<?php if ($result['desplazado'] == 'No'){echo " checked";}?> ></td>
		</tr>

		<tr>
		<th><label>Afrodescendiente*:</label></th>
		</tr>
		<tr>
		<td><label for="afro-si">Si</label></td>
		<td><input type="radio" id="afro-si" value="Si" name="afro"<?php if ($result['afrodescendiente'] == 'Si'){echo " checked";}?>></td>
		<td><label for="afro-no">No</label></td>
		<td><input type="radio" id="afro-no" value="No" name="afro"<?php if ($result['afrodescendiente'] == 'No'){echo " checked";}?> ></td>
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
<?php require 'piedepagina-admin.php' ?>


