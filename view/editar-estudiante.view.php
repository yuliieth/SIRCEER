<?php require 'cabecera-admin.php' ?>
<?php require("header-menu.view.php") #Aun falta recibir el parametro?>
<div class="formulario-editar-user">
	<h3>Esta modificando un estudiante:</h3>
	<hr>
	<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST">
		<table>

			<input type="hidden" readonly="readonly" size="20" name="id" value="<?php echo $result['id']; ?>">
		<tr>
			<td><label>Documento</label></td>
			<td><input type="text" readonly="readonly" size="20" name="documento" value="<?php echo $result['documento']; ?>"></td>
			<td><label>Primer nombre</label></td>
			<td><input type="text" size="30" name="primer_nombre"  value="<?php echo $result['primer_nombre']; ?>"  placeholder="Primer nombre" required=""></td>
		</tr>
		
		<tr>
			<td><label>Segundo nombre</label></td>
			<td><input type="text" size="30" name="segundo_nombre"  value="<?php echo $result['segundo_nombre']; ?>"  placeholder="Segundo nombre" >	</td>
		
			<td><label>Primer apellido</label>	</td>
			<td><input type="text" size="30" name="primer_apellido" value="<?php echo $result['primer_apellido']; ?>"  placeholder="Primer apellido" required=""></td>
		</tr>

		<tr>
			<td><label>Segundo apellido</label></td>
			<td><input type="text" size="30" name="segundo_apellido" value="<?php echo $result['segundo_apellido']; ?>"  placeholder="Segundo apellido" required=""></td>
			<td><label>Telefono de contacto</label></td>
			<td><input type="text" size="30" name="tel_contacto" value="<?php echo $result['telefono_contacto']; ?>"  placeholder="Telefono de contacto"></td>
		</tr>

		<tr>
			<td><label>Email</label></td>
			<td><input type="email" size="30" name="email"  value="<?php echo $result['email']; ?>"  placeholder="Email" required=""></td>
			<td><label>Fecha de nacimiento</label></td>
			<td><input type="date" name="fecha_naci" step="1" min="1980-01-01" max="2018-12-31" value="<?php echo strstr($result['fecha_nacimiento']," ",true)?>" placeholder="Fecha de nacimiento"></td>
		</tr>

		<tr>
			<td><label>Edad</label></td>
			<td><input type="number" name="edad" placeholder="Edad: 10-25" required="" value="<?php echo $result['edad'];?>"></td>
			<td><label>Direccion de Residencia</label></td>
			<td><input type="text" size="30" name="dire_resi" value="<?php echo $result['direccion_residencia']; ?>" placeholder="Direccion"></td>
		</tr>

		<tr>
			<td><label>Municipio de residencia</label></td>
			<td><select  name="muni_resi" id="municipio">
			<?php foreach ($municipios as $muni): ?>
					<option value="<?php echo $muni['id'] ?>" <?php if ($result['municipio_id'] == $muni['id']): ?>
						<?php echo 'selected' ?>
					<?php endif ?>><?php echo $muni['nombre'] ?></option>
				<?php endforeach ?>
		</select></td>
			<td><label for="eps">EPS:</label></td>
			<td><input type="text" name="eps" value="<?php echo $result['EPS'] ?>" placeholder="EPS" required=""></td>
		</tr>


	

		<tr>
			<td><label for="fecha_inicio">Fecha de inicio</label></td>
			<td><input type="date" name="fecha_inicio" step="1" min="1980-01-01" max="2030-12-31" value="<?php echo strstr($result['fecha_inicio']," ",true)?>" placeholder="Fecha de inicio"></td>
			<td><label for="fecha_fin">Fecha fin</label></td>
			<td><input type="date" name="fecha_fin" step="1" min="1980-01-01" max="2030-12-31" value="<?php echo strstr($result['fecha_fin']," ",true) ?>" placeholder="Fecha de inicio"></td>
		</tr>
		
		<tr>
			<td><label for="fuente_recurso">Fuente de recurso</label></td>
			<td>
				<select name="fuente_recurso" id="">	
				<option value="#">Sin seleccionar</option>
				<?php foreach ($fuente as $value): ?>
					<option value="<?php echo $value['id'] ?>" <?php if ($result['fuenterecurso_id'] == $value['id']): ?>
						<?php echo 'selected' ?>
					<?php endif ?>><?php echo $value['nombre'] ?></option>
				<?php endforeach ?>
				</select>
			</td>
			<td><label for="internado">Internado</label></td>
			<td>
				<select name="internado" id="">
						<option value="#">Sin seleccionar</option>
					<?php foreach ($internados as $value): ?>
					<option value="<?php echo $value['id'] ?>" <?php if ($result['internado_id'] == $value['id']): ?>
						<?php echo 'selected' ?>
					<?php endif ?>><?php echo $value['nombre'] ?></option>
				<?php endforeach ?>
				</select>
			</td>
		</tr>

		<tr>
			<td><label for="servicio_social">Servicio social</label></td>
			<td>
				<select name="servicio_social" id="">
						<?php foreach ($servicio_social as $value): ?>
					<option value="<?php echo $value['id'] ?>"<?php if ($estudianteServicioSocial['servicio_social_id'] == $value['id']): ?>
						<?php echo 'selected' ?>
					<?php endif ?>><?php echo $value['estado'] ?></option>
				<?php endforeach ?>
				</select>
			</td>
			<td><label for="grado"></label>Grado que cursa:</td>
			<td>
				<select name="grado" id="">
						<option value="#">Sin seleccionar</option>
					<?php foreach ($grados as $value): ?>
					<option value="<?php echo $value['id'] ?>" <?php if ($result['grado_id'] == $value['id']): ?>
						<?php echo 'selected' ?>
					<?php endif ?>><?php echo $value['nombre'] ?></option>
				<?php endforeach ?>
				</select>
			</td>
		</tr>


		<tr>
			<td><label for="tipo_sangre">Tipo sangre:</label></td>
			<td><select name="tipo_sangre" id="">
					<option value="#">Sin seleccionar</option>
				<?php foreach ($tipos_sangre as $value): ?>
					<option value="<?php echo $value['id'] ?>" <?php if ($result['tipo_sangre_id'] == $value['id']): ?>
						<?php echo 'selected' ?>
					<?php endif ?>><?php echo $value['nombre'] ?></option>
				<?php endforeach ?>
			</select></td>
			<td><label for="colegio">Colegio</label></td>
			<td>
				<select name="colegio" id="">
						<option value="#">Sin seleccionar</option>
					<?php foreach ($instituciones as $value): ?>
					<option value="<?php echo $value['id'] ?>" <?php if ($result['sede_id'] == $value['id']): ?>
						<?php echo 'selected' ?>
					<?php endif ?>><?php echo $value['nombre'] ?></option>
				<?php endforeach ?>
			</select></td>
			</td>
		</tr>

		<tr>
			<td><label for="tipo_poblacion">Tipo de poblacion</label></td>
		<td><select  name="tipo_poblacion" id="tipo_poblacion">
					<?php foreach ($tipos_poblacion as $value): ?>
					<option value="<?php echo $value['id'] ?>" <?php if ($result['tipo_poblaion_id'] == $value['id']): ?>
						<?php echo 'selected' ?>
					<?php endif ?>><?php echo $value['nombre'] ?></option>
				<?php endforeach ?>
		</select></td>
			<td><label>Zona</label></td>
			<td><select  name="zona" id="zona">
					<?php foreach ($zonas as $value): ?>
					<option value="<?php echo $value['id'] ?>" <?php if ($result['zona_id'] == $value['id']): ?>
						<?php echo 'selected' ?>
					<?php endif ?>><?php echo $value['nombre'] ?></option>
				<?php endforeach ?>
		</select></td>
		</tr>





		<tr>
			<td><label for="genero">Genero</label></td>
			<td><select name="genero" id="">
					<?php foreach ($generos as $value): ?>
					<option value="<?php echo $value['id'] ?>" <?php if ($result['genero_id'] == $value['id']): ?>
						<?php echo 'selected' ?>
					<?php endif ?>><?php echo $value['nombre'] ?></option>
				<?php endforeach ?>
				</select></td>
			<td><label>Estrato</label>	</td>
			<td><select name="estrato" id="">
					<?php foreach ($estratos as $value): ?>
					<option value="<?php echo $value['id'] ?>" <?php if ($result['estrato_id'] == $value['id']): ?>
						<?php echo 'selected' ?>
					<?php endif ?>><?php echo $value['nombre'] ?></option>
				<?php endforeach ?>
				</select></td>
		</tr>

		<tr>
			<td><label for="situacion_academica">Situacion academica</label></td>
		<td>
			<select name="situacion_academica" id="">
				
				<?php foreach ($situacionA as $situacion): ?>
					<option value="<?php echo $situacion['id'] ?>" <?php if ($result['situacion_academica_id'] == $situacion['id']): ?>
						<?php echo 'selected' ?>
					<?php endif ?>><?php echo $situacion['nombre'] ?></option>
				<?php endforeach ?>

			</select>
		<td><label for="color_ojos">Color de ojos</label></td>
		<td><select name="color_ojos" id="">
					<?php foreach ($colores_ojos as $value): ?>
					<option value="<?php echo $value['id'] ?>" <?php if ($result['ojos_id'] == $value['id']): ?>
						<?php echo 'selected' ?>
					<?php endif ?>><?php echo $value['color'] ?></option>
				<?php endforeach ?>
				</select></td>
		</td>

		

		<!--
		<tr>
			<td><label>Municipio de nacimiento</label></td>
			<td><select  name="muni_naci" id="municipio">
			<?php foreach ($municipios as $muni): ?>
					<option value="<?php echo $muni['id'] ?>" <?php if ($result['municipio_naci_id'] == $muni['id']): ?>
						<?php echo 'selected' ?>
					<?php endif ?>><?php echo $muni['nombre'] ?></option>
				<?php endforeach ?>
		</select></td>
		</tr>
-->
		
		
		<tr>
			<td><label for="discapacidades">Discapacidades:</label></td>
			<td>
				<select name="discapacidades" id="">
						<?php foreach ($discapacidades as $value): ?>
					<option value="<?php echo $value['id'] ?>" <?php if ($result['discapacidad_id'] == $value['id']): ?>
						<?php echo 'selected' ?>
					<?php endif ?>><?php echo $value['nombre'] ?></option>
				<?php endforeach ?>
				</select>	
			</td>
			<td><label  for="situacion_social">Situacion social</label></td>
		<td><select  name="situacion_social" id="situacion">
					<?php foreach ($situacion_social as $value): ?>
					<option value="<?php echo $value['id'] ?>" <?php if ($result['situacion_social_id'] == $value['id']): ?>
						<?php echo 'selected' ?>
					<?php endif ?>><?php echo $value['nombre'] ?></option>
				<?php endforeach ?>
		</select></td>
		</tr>

		
		<tr>
			<td><label for="tipo_documento">Tipo de documento:</label></td>
			<td>
				<select name="tipo_documento" id="">
					<?php foreach ($tipos_documento as $value): ?>
					<option value="<?php echo $value['id'] ?>" <?php if ($result['tipo_documento_id'] == $value['id']): ?>
						<?php echo 'selected' ?>
					<?php endif ?>><?php echo $value['nombre'] ?></option>
				<?php endforeach ?>
				</select>
			</td>
			<td><label for="observacion:">Observación:</label></td>
			<td><textarea name="observacion" placeholder="Observaciones para el estudiante..." id="observacion" cols="30" rows="3" maxlength="110"></textarea></td>
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


