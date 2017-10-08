<?php require 'cabecera-admin.php' ?>
<?php require("header-menu.view.php") #Aun falta recibir el parametro?>
<div class="formulario-editar-user">
	<h3>Esta modificando un estudiante:</h3>
	<hr>
	<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST">
		<input type="text" size="20" name="documento" value="<?php echo $result['documento']; ?>">
		<input type="text" size="30" name="primer_nombre"  value="<?php echo $result['primer_nombre']; ?>"  placeholder="Primer nombre" required="">
		<input type="text" size="30" name="segundo_nombre"  value="<?php echo $result['segundo_nombre']; ?>"  placeholder="Primer nombre" required="">		
		<input type="text" size="30" name="primer_apellido" value="<?php echo $result['primer_apellido']; ?>"  placeholder="Primer apellido" required="">
		<input type="text" size="30" name="segundo_apellido" value="<?php echo $result['segundo_apellido']; ?>"  placeholder="Primer apellido" required="">
		<input type="text" size="30" name="dire_resi" value="<?php echo $result['direccion_residencia']; ?>" placeholder="Direccion" >
		<select  name="muni_resi" id="municipio">
			<?php foreach ($municipios as $muni): ?>
					<option value="<?php echo $muni['id'] ?>"><?php echo $muni['nombre'] ?></option>
				<?php endforeach ?>
		</select>		
		
		<input type="text" size="30" name="estrato"  value="<?php echo $result['estrato']; ?>"  placeholder="Estrato" required="">
		<input type="text" size="30" name="tel_contacto" value="<?php echo $result['tel_contacto']; ?>"  placeholder="Telefono de contacto" >
		
		<input type="email" size="30" name="email"  value="<?php echo $result['email']; ?>"  placeholder="Email" required="">
		<!--<input type="text" size="30" name="fecha-naci" placeholder="fecha de nacimiento*">-->
		<input type="date" name="fecha_naci" step="1" min="1950-01-01" max="2018-12-31" value="<?php echo date("Y-m-d");?>" placeholder="Fecha de nacimiento">

		<input type="number" name="edad" placeholder="Edad: 10-25" required="" value="<?php echo $result['edad'];?>">

		
		<select  name="muni_naci" id="municipio">
			<?php foreach ($municipios as $muni): ?>
					<option value="<?php echo $muni['id'] ?>"><?php echo $muni['nombre'] ?></option>
				<?php endforeach ?>
		</select>
		<input type="text" size="30" min="1" max="5" name="zona" value="<?php echo $result['zona'];?>" placeholder="Zona" required="">

		<br>
		<!--
		<label class="labels">Estado*:</label>
		<label class="input-redit" for="activo">Si</label>
		<input type="radio" id="activo" value="1" name="estado"<?php if ($result['estado'] == 1){echo "checked";}?>>
		<label class="input-redit" for="inactivo">No</label>
		<input type="radio" id="inactivo" value="0" name="estado"<?php if ($result['estado'] == 0){echo " checked";}?> >
		-->
		
		<br>
		<label class="labels">Desplazado*:</label>
		<label class="input-redit" for="des_si">Si</label>
		<input type="radio" id="des_si" value="si" name="desplazado"<?php if ($result['desplazado'] == 'si'){echo "checked";}?>>
		<label class="input-redit" for="des_no">No</label>
		<input type="radio" id="des_no" value="no" name="desplazado"<?php if ($result['desplazado'] == 'no'){echo " checked";}?> >
		
		<br>
		<label class="labels">Afrodescendiente*:</label>
		<label class="input-redit" for="afro-si">Si</label>
		<input type="radio" id="afro-si" value="si" name="afro"<?php if ($result['afrodescendiente'] == 'si'){echo " checked";}?>>
		
		<label class="input-redit" for="afro-no">No</label>
		<input type="radio" id="afro-no" value="no" name="afro"<?php if ($result['desplazado'] == 'no'){echo " checked";}?> >
		<!--
		<label class="labels">Genero*:</label>
		<label class="input-redit" for="femenino">Mujer</label>
		<input type="radio" id="femenino" value="femenino" name="genero"<?php if ($result['genero'] == 'F'){echo " checked";}?>>
		<label class="input-redit" for="masculino">Hombre</label>
		<input type="radio" id="masculino" value="masculino" name="genero"<?php if ($result['genero'] == 'M'){echo " checked";}?>>
		-->

		<br>
		<label class="labels">Color de ojos*:</label>
		<label class="input-redit" for="negros">Negros</label>
		<input type="radio" id="negros" value="negros" name="ojos"<?php if ($result['ojos'] == 'Negros'){echo " checked";}?>>
		<label class="input-redit" for="azules">Azules</label>
		<input type="radio" id="azules" value="azules" name="ojos"<?php if ($result['ojos'] == 'Azules'){echo " checked";}?>>
		<label class="input-redit" for="cafes">Cafes</label>
		<input type="radio" id="cafes" value="cafes" name="ojos"<?php if ($result['ojos'] == 'Cafes'){echo " checked";}?>>
		<label class="input-redit" for="marron">Marron</label>
		<input type="radio" id="marron" value="marron" name="ojos"<?php if ($result['ojos'] == 'Marron'){echo " checked";}?>>
		<br>

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


