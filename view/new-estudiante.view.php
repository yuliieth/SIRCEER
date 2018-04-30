<?php require("cabecera-admin.php") ?>
<?php require("header-menu.view.php") ?>			
<!--CONTENIDO-->


<div class="wrap-formulario-new-estudiante">
<div class="wra_titulo">
	<h1>NUEVO ESTUDIANTE</h1>
</div>
	
	<form  action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST">
	<table width="100%">

		<tr>
			<td><label for="documento">Documento:</label></td>
			<td><input type="text" onkeyup="sugerencias(this.value)" size="20" name="documento" placeholder="Documento" required="" >
				<div id="miDiv"></div>
			</td>		
			<td><label for="tipo_documento">Tipo de documento:</label></td>
			<td>
				<select name="tipo_documento" id="">
					<option value="#">Sin seleccionar</option>
				<?php foreach ($tipoDocumento as $tipoDocumento): ?>
					<option value="<?php echo $tipoDocumento['id'] ?>"><?php echo $tipoDocumento['nombre'] ?></option>
				<?php endforeach ?>
				</select>
			</td>
		</tr>	

		<tr>
			<td><label for="primer_nombre">Primer nombre:</label></td>
			<td><input type="text" size="30" name="primer_nombre" placeholder="Primer nombre"  required="" ></td>
			<td><label for="segundo_nombre">Segundo nombre:</label></td>
			<td><input type="text" size="30" name="segundo_nombre" placeholder="Segundo nombre"></td>
		</tr>

		<tr>
			<td><label for="primer_apellido">Primer apellido:</label></td>
			<td><input type="text" size="30" name="primer_apellido" placeholder="Primer apellido"  required="" ></td>
			<td><label for="segundo_apellido">Segundo apellido:</label></td>
			<td><input type="text" size="30" name="segundo_apellido" placeholder="Segundo apellido"></td>
		</tr>
		

		<tr>
			<td><label for="telefono">Telefono:</label></td>
			<td><input type="text" size="30" name="telefono" placeholder="Telefono"></td>
			<td><label for="email">Email:</label></td>
			<td><input type="email" size="30" name="email" placeholder="Email"></td>
		</tr>

		<tr>
			<td><label for="fecha-naci">Fecha de nacimiento:</label></td>
			<td><input type="date" name="fecha_naci" step="1" min="1980-01-01" max="2030-12-31" value="" placeholder="Fecha de nacimiento"></td>
			<td><label for="edad">Edad:</label></td>
			<td><input type="number" min="10" max="50" name="edad" placeholder="Edad: 10-50" required="" ></td>
		</tr>

		<tr>
			<td><label for="dire_resi">Direccion de residencia:</label></td>
			<td><input type="text" size="30" name="dire_resi" placeholder="Direccion"></td>
			<td><label for="ciudad">Municipio de residencia:</label></td>
				<option value="#">Sin seleccionar</option>
			<td>
			<select name="ciudad" id="">
				<option value="#">Sin seleccionar</option>
				<?php foreach ($muni_resi as $muni_resi): ?>
					<option value="<?php echo $muni_resi['id'] ?>"><?php echo $muni_resi['nombre'] ?></option>
				<?php endforeach ?>
			</select>
			</td>		
		</tr>

		<tr>
			<td><label for="eps">EPS:</label></td>
			<td><input type="text" name="eps" placeholder="EPS" required=""></td>
			<td><label for="fecha_inicio">Fecha de inicio</label></td>
			<td><input type="date" name="fecha_inicio" step="1" min="1980-01-01" max="2030-12-31" value="" placeholder="Fecha de inicio"></td>
		</tr>
		
		<tr>
			<td><label for="fecha_fin">Fecha fin</label></td>
			<td><input type="date" name="fecha_fin" step="1" min="1980-01-01" max="2030-12-31" value="" placeholder="Fecha de inicio"></td>
			<td><label for="fuente_recurso">Fuente de recurso</label></td>
			<td>
				<select name="fuente_recurso" id="">	
				<option value="#">Sin seleccionar</option>
				<?php foreach ($fuente_recurso as $fuente_recurso): ?>
					<option value="<?php echo $fuente_recurso['id'] ?>"><?php echo $fuente_recurso['nombre'] ?></option>
				<?php endforeach ?>
				</select>
			</td>
		</tr>

		<tr>
			<td><label for="internado">Internado</label></td>
			<td>
				<select name="internado" id="">
						<option value="#">Sin seleccionar</option>
					<?php foreach ($internado as $internado): ?>
					<option value="<?php echo $internado['id'] ?>"><?php echo $internado['nombre'] ?></option>
				<?php endforeach ?>
				</select>
			</td>
			<td><label for="servicio_social">Servicio social</label></td>
			<td>
				<select name="servicio_social" id="">
						<option value="#">Sin seleccionar</option>
					<?php foreach ($servicio_social as $servicio_social): ?>
					<option value="<?php echo $servicio_social['id'] ?>"><?php echo $servicio_social['estado'] ?></option>
				<?php endforeach ?>
				</select>
			</td>
		</tr>


		<tr>
			<td><label for="grado"></label>Grado que cursa:</td>
			<td>
				<select name="grado" id="">
						<option value="#">Sin seleccionar</option>
					<?php foreach ($grado as $grado): ?>
					<option value="<?php echo $grado['id'] ?>"><?php echo $grado['nombre'] ?></option>
				<?php endforeach ?>
				</select>
			</td>
			<td><label for="tipo_sangre">Tipo sangre:</label></td>
			<td><select name="tipo_sangre" id="">
					<option value="#">Sin seleccionar</option>
				<?php foreach ($tipos_sangre as $tipos_sangre): ?>
					<option value="<?php echo $tipos_sangre['id'] ?>"><?php echo $tipos_sangre['nombre'] ?></option>
				<?php endforeach ?>
			</select></td>
		</tr>

		<tr>
			<td><label for="colegio">Colegio</label></td>
			<td>
				<select name="colegio" id="">
						<option value="#">Sin seleccionar</option>
					<?php foreach ($colegio as $colegio): ?>
					<option value="<?php echo $colegio['id'] ?>"><?php echo $colegio['nombre'] ?></option>
				<?php endforeach ?>
				</select>
			</td>
			
			<td><label for="tipo_poblacion">Tipo de poblacion:</label></td>
			<td>
			<select name="tipo_poblacion" id="">
						<option value="#">Sin seleccionar</option>
					<?php foreach ($tipo_poblacion as $tipo_poblacion): ?>
					<option value="<?php echo $tipo_poblacion['id'] ?>"><?php echo $tipo_poblacion['nombre'] ?></option>
				<?php endforeach ?>
				</select></td>
		</tr>


		<tr>
			<td><label for="zona">Zona:</label></td>
			<td>
				<select name="zona" id="">
						<option value="#">Sin seleccionar</option>
					<?php foreach ($zona as $zona): ?>
					<option value="<?php echo $zona['id'] ?>"><?php echo $zona['nombre'] ?></option>
				<?php endforeach ?>
				</select>
			</td>
			<td><label for="genero">Genero</label></td>
			<td><select name="genero" id="">
					<option value="#">Sin seleccionar</option>
					<?php foreach ($genero as $genero): ?>
					<option value="<?php echo $genero['id'] ?>"><?php echo $genero['nombre'] ?></option>
				<?php endforeach ?>
				</select></td>
		</tr>


		<tr>
			<td><label for="estrato">Estrato:</label></td>
			<td>
			<select name="estrato" id="">
					<option value="#">Sin seleccionar</option>
				<?php foreach ($estrato as $estrato): ?>
					<option value="<?php echo $estrato['id'] ?>"><?php echo $estrato['nombre'] ?></option>
				<?php endforeach ?>
			</select>
			</td>
			<td><label for="situacion_academica">Situacion academica:</label></td>
			<td>
				<select name="situacion_academica" id="">
						<option value="#">Sin seleccionar</option>
					<?php foreach ($situacion_academica as $situacion_academica): ?>
					<option value="<?php echo $situacion_academica['id'] ?>"><?php echo $situacion_academica['nombre'] ?></option>
				<?php endforeach ?>
				</select>
			</td>
		</tr>

		

		<tr>
			<td><label for="ojos">Ojos:</label></td>
			<td>
				<select name="ojos" id="">
						<option value="#">Sin seleccionar</option>
					<?php foreach ($ojos as $ojos): ?>
					<option value="<?php echo $ojos['id'] ?>"><?php echo $ojos['color'] ?></option>
				<?php endforeach ?>
				</select>
			</td>
			<td><label for="discapacidades">Discapacidades:</label></td>
			<td>
				<select name="discapacidades" id="">
						<option value="#">Sin seleccionar</option>
					<?php foreach ($discapacidades as $discapacidades): ?>
					<option value="<?php echo $discapacidades['id'] ?>"><?php echo $discapacidades['nombre'] ?></option>
				<?php endforeach ?>

				</select>	
			</td>
		</tr>

		<tr>
			<td><label for="situacion_social">Situacion social:</label></td>
			<td>
				<select name="situacion_social" id="">
						<option value="#">Sin seleccionar</option>
					<?php foreach ($situacion_social as $situacion_social): ?>
					<option value="<?php echo $situacion_social['id'] ?>"><?php echo $situacion_social['nombre'] ?></option>
				<?php endforeach ?>
				</select>
			</td>
			<td><label for="observacion:">Observación:</label></td>
			<td><textarea name="observacion" placeholder="Observaciones para el estudiante..." id="observacion" cols="30" rows="3" maxlength="110"></textarea></td>
		</tr>
		
		<tr>
			<td><label for=""></label></td>
			<td><input type="hidden"></td>
		</tr>

		<tr>
			<td></td>
			<td><input type="reset" name=""></td>
			<td></td>
			<td><input type="submit" name="submit" class="btn btn-primary" value="Guardar"></td>
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

<!--END CONTENIDO-->
<?php require("footer-menu.view.php") ?>					
<?php #require("piedepagina-admin.php") ?>

<script type=text/javascript>
	function validarForm(formulario)
	{
		if (formulario.busqueda.value.length == 0) 
		{
			formulario.busqueda.focus();
			alert("Debes ingresar el documento");
			return false;
		}
		return true;
	}
</script>