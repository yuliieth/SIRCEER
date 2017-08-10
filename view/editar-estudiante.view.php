<?php require 'cabecera-admin.php' ?>
<div class="formulario-editar-user">
	<h3>Esta modificando un estudiante:</h3>
	<hr>
	<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST">
		<input type="hidden" size="20" name="documento" value="<?php echo $result['documento']; ?>">
		<input type="text" size="30" name="primer_nombre"  value="<?php echo $result['nombres']; ?>"  placeholder="Primer nombre" required="">		
		<input type="text" size="30" name="apellidos" value="<?php echo $result['apellidos']; ?>"  placeholder="Primer apellido" required="">
		<input type="text" size="30" name="direccion" value="<?php echo $result['direccion']; ?>" placeholder="Direccion" ><br>
		<select  name="municipio" id="municipio">
			<optgroup label="Risaralda">
				<option value="pereira"<?php if ($result['municipio'] == 'pereira'){echo " selected";}?>>Pereira</option>
				<option value="dosquebradas"<?php if ($result['municipio'] == 'dosquebradas'){echo " selected";}?>>D/Quebradas</option>
				<option value="santa rosa"<?php if ($result['municipio'] == 'santa rosa'){echo " selected";}?>>Santa rosa</option>
				<option value="apia"<?php if ($result['municipio'] == 'apia'){echo " selected";}?>>Apia</option>
				<option value="mistrato"<?php if ($result['municipio'] == 'mistrato'){echo " selected";}?>>Mistrato</option>
				<option value="belen de umbria"<?php if ($result['municipio'] == 'belen de umbria'){echo " selected";}?>>Belen de umbria</option>
				<option value="chinchina"<?php if ($result['municipio'] == 'chinchina'){echo " selected";}?>>Chinchina</option>
			</optgroup>
		</select>		
		
		<input type="text" size="30" name="cel_contacto"  value="<?php echo $result['cel_contacto']; ?>"  placeholder="Celular de contacto" required="">
		<input type="text" size="30" name="tel_contacto" value="<?php echo $result['tel_contacto']; ?>"  placeholder="Telefono de contacto" >
		

		
		<input type="email" size="30" name="email"  value="<?php echo $result['email']; ?>"  placeholder="Email" required="">
		<!--<input type="text" size="30" name="fecha-naci" placeholder="fecha de nacimiento*">-->
		<input type="date" name="fecha_naci" step="1" min="1950-01-01" max="2018-12-31" value="<?php echo date("Y-m-d");?>" placeholder="Fecha de nacimiento">

		

		
		<input type="text" size="30" name="lugar_naci" value="<?php echo $result['lugar_naci']; ?>"  placeholder="Lugar de nacimiento" required>
		<input type="number" size="30" min="1" max="5" name="estrato" value="<?php echo $result['estrato'];?>" placeholder="Estrato" required="">

		<!--Necesidad:
		Crear itemns hasta el total de valores encontrados en la BD
		Datos: 1. Numero de regisrtros 2. Todos los registros and yours Forein keys
		Ciclo: Un for
		-->
		<?php #var_dump($totalInsti); ?>
		<select name="institucion" id="select_institucion">
		<?php foreach ($institutes as $values) {?>
			<option value="<?php echo $values['id'] ?>"><?php echo $values['nombre'];?></option>
			<?php
			}
		 ?>
		</select>

		<select name="programa" id="select_programa">
		<?php foreach ($programs as $values) {?>
			<option value="<?php echo $values['id'] ?>"><?php echo $values['nombre'];?></option>
			<?php
			}
		 ?>
		</select>
		<br>
		
		<br>
		<label class="labels">Estado*:</label>
		<label class="input-redit" for="activo">Si</label>
		<input type="radio" id="activo" value="1" name="estado"<?php if ($result['estado'] == 1){echo "checked";}?>>
		<label class="input-redit" for="inactivo">No</label>
		<input type="radio" id="inactivo" value="0" name="estado"<?php if ($result['estado'] == 0){echo " checked";}?> >
		
		
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
		

		<br>
		<label class="labels">Genero*:</label>
		<label class="input-redit" for="femenino">Mujer</label>
		<input type="radio" id="femenino" value="femenino" name="genero"<?php if ($result['genero'] == 'femenino'){echo " checked";}?>>
		<label class="input-redit" for="masculino">Hombre</label>
		<input type="radio" id="masculino" value="masculino" name="genero"<?php if ($result['genero'] == 'masculino'){echo " checked";}?>>
		

		<br>
		<label class="labels">Color de ojos*:</label>
		<label class="input-redit" for="negros">Negros</label>
		<input type="radio" id="negros" value="negros" name="ojos"<?php if ($result['ojos'] == 'negros'){echo " checked";}?>>
		<label class="input-redit" for="azules">Azules</label>
		<input type="radio" id="azules" value="azules" name="ojos"<?php if ($result['ojos'] == 'azules'){echo " checked";}?>>
		<label class="input-redit" for="cafes">Cafes</label>
		<input type="radio" id="cafes" value="cafes" name="ojos"<?php if ($result['ojos'] == 'cafes'){echo " checked";}?>>
		<label class="input-redit" for="marron">Marron</label>
		<input type="radio" id="marron" value="marron" name="ojos"<?php if ($result['ojos'] == 'marron'){echo " checked";}?>>
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


