<?php require("cabecera-admin.php") ?>
<?php require("header-menu.view.php") ?>			
<!--CONTENIDO-->

<div class="wrap-formulario">
	<h1>Nuevo estudiante</h1>
		
	<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST">
	<table width="100%">
		<tr>
			<td>
			<label for="tipo_documento">Tipo de documento:</label>
			</td>
			<td>
				<select name="tipo_documento" id="">
				<?php foreach ($tipoDocumento as $tipoDocumento): ?>
					<option value="<?php echo $tipoDocumento['id'] ?>"><?php echo $tipoDocumento['tipo'] ?></option>
				<?php endforeach ?>
				</select>
			</td>
			<td><label for="documento">Documento:</label></td>
			<td><input type="text" size="20" name="documento" placeholder="Documento" required="" ></td>
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
			<td><input type="text" size="30" name="fecha_naci" placeholder="fecha de nacimiento"required=""></td>
			<td><label for="edad">Edad:</label></td>
			<td><input type="number" min="10" max="30" name="edad" placeholder="Edad: 10-30" required="" ></td>
		</tr>

		<tr>
			<td><label for="muni_naci">Municipio de nacimiento:</label></td>
			<td>
			<select name="muni_naci" id="">
				<?php foreach ($munis_naci as $muni): ?>
					<option value="<?php echo $muni['id'] ?>"><?php echo $muni['nombre'] ?></option>
				<?php endforeach ?>
				
			</select>
			</td>			
			<td><label for="dire_resi">Direccion de residencia:</label></td>
			<td><input type="text" size="30" name="dire_resi" placeholder="Direccion"></td>
		</tr>
		<tr>
			<td><label for="barrio_resi">Barrio de residencia:</label></td>
			<td><input type="text" size="30" name="barrio_resi" placeholder="Barrio"></td>
			<td><label for="muni_resi">Municipio de residencia:</label></td>
			<td>
			<select name="muni_resi" id="">
				<?php foreach ($munis_resi as $muni): ?>
					<option value="<?php echo $muni['id'] ?>"><?php echo $muni['nombre'] ?></option>
				<?php endforeach ?>
				
			</select>
			</td>
		</tr>
		
		<tr>
			<td><label for="estrato">Estrato:</label></td>
			<td><input type="number" size="30" min="1" max="6" name="estrato" placeholder="Estrato"></td>
			<td><label for="zona">Zona:</label></td>
			<td>
				<select name="zona" id="">
					<option value="Urbana">Urbana</option>
					<option value="Rural">Rural</option>
				</select>
			</td>
		</tr>

		<tr>
			<td><label for="eps">EPS:</label></td>
			<td><input type="text" name="eps" placeholder="EPS" required=""></td>
			<td><label for="desplazado">Desplazado:</label></td>
			<td>
				<select name="desplazado" id="">
					<option value="si">Si</option>
					<option value="no">No</option>
				</select>
			</td>
		</tr>

		

		<tr>
			<td><label for="afro">Afrodescendiente:</label></td>
			<td><select name="afro" id="">
					<option value="si">Si</option>
					<option value="no">No</option>
				</select></td>
			<td><label for="ojos">Ojos:</label></td>
			<td>
				<select name="ojos" id="">
					<option value="Negros">Negros</option>
					<option value="Cafes">Cafes</option>
					<option value="Azules">Azules</option>
				</select>
			</td>
		</tr>


		<tr>
			<td><label for="genero">Genero</label></td>
			<td><select name="genero" id="">
					<option value="F">Mujer</option>
					<option value="M">Hombre</option>
				</select></td>
			<td><label for="victima_conflicto">Victima del conflicto:</label></td>
			<td>
				<select name="victima_conflicto" id="">
					<option value="si">Si</option>
					<option value="no">No</option>
				</select>
			</td>
		</tr>

		<tr>
			<td><label for="discapacidades">Discapacidades:</label></td>
			<td>
				<input type="text" rows="2" cols="20" size="30" name="discapacidades" placeholder="Discapacidades" required="" >	
			</td>
			<td><label for="situacion_periodo_anterior">Situacion periodo anterior:</label></td>
			<td>
				<select name="situacion_periodo_anterior" id="">
					<option value="Matriculado">Matriculado</option>
					<option value="Promovido">Promovido</option>
					<option value="Cancelado">Cancelado</option>
					<option value="Trasladado">Trasladado</option>
					<option value="Suspendido">Suspendido</option>
				</select>
			</td>
		</tr>

		<tr>
			<td><label for="grado"></label>Grado que cursa:</td>
			<td><input type="number" name="grado" min="6" max="12" placeholder="Grado" required=""></td>
			<td><label for="tipo_sangre">Tipo sangre:</label></td>
			<td><select name="tipo_sangre" id="">
				<?php foreach ($tipos_sangre as $tipo): ?>
					<option value="<?php echo $tipo['id'] ?>"><?php echo $tipo['tipo'] ?></option>
				<?php endforeach ?>
			</select></td>
		</tr>

		<th><strong>Datos del programa</strong></th>
		<tr>
		<td><label for="programa">Programa:</label></td>
		<td>
		<select name="programa" id="" onchange="ejecutar(this.value)">
			<option value="">Seleccione una opcion</option>
		<?php foreach ($programas as $programa): ?>
			<option  value="<?php echo $programa['snies']?>"><?php echo $programa['nombre']?></option>
		<?php endforeach ?>
		</select>
		</td>
		<td></td>
		<td id="snies"></td>
		</tr>

		<th><strong>Datos semestres</strong></th>
		<tr>
			<td><label for="periodo">Periodo:</label></td>
			<td><input type="text" name="periodo" placeholder="Ejemplo: 2017-2" required=""></td>
			<td><label for="promedio_anterior">Promedio anterior:</label></td>
			<td><input type="text" name="promedio_anterior" placeholder="Ejemplo: 4.5"></td>
		</tr>

		<tr>
			<td><label for="observacion:">Observación:</label></td>
			<td><textarea name="observacion" id="observacion" cols="30" rows="3" maxlength="110"></textarea></td>
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
		

		
		<input type="reset" name="">
		<input type="submit" name="submit" class="btn btn-primary" value="Guardar">

	</form>
	
</div>

<!--END CONTENIDO-->
<?php require("footer-menu.view.php") ?>					
<!--<?php require("piedepagina-admin.php") ?>-->

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