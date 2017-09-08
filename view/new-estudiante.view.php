<?php require("cabecera-admin.php") ?>
<?php require("header-menu.view.php") ?>			
<!--CONTENIDO-->

<div class="wrap-formulario">
	<h1>Nuevo estudiante</h1>
		
	<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST">
	<table width="100%">
		<tr>
			<td>
			<label for="tipoDocumento">Tipo de documento:</label>
			</td>
			<td>
				<select name="tipoDocumento" id="">
				<?php foreach ($tipoDocumento as $tipoDocumento): ?>
					<option value="<?php echo $tipoDocumento['id'] ?>"><?php echo $tipoDocumento['tipo'] ?></option>
				<?php endforeach ?>
				</select>
			<td>
		</tr>	
		<tr>
			<td>
			<label for="documento">Documento:</label>
			</td>
			<td>
			<input type="text" size="20" name="documento" placeholder="Documento" required="" >
			</td>
			<td><label for="primer_nombre">Primer nombre:</label></td>
			<td><input type="text" size="30" name="primer_nombre" placeholder="Primer nombre"  required="" ></td>
		</tr>

		<tr>
			<td>
				<label for="segundo_nombre">Segundo nombre:</label>
			</td>
			<td>
			<input type="text" size="30" name="segundo_nombre" placeholder="Segundo nombre"  >
			</td>
			<td><label for="primer_apellido">Primer apellido:</label></td>
			<td><input type="text" size="30" name="primer_apellido" placeholder="Primer apellido"  required="" ></td>
		</tr>

		<tr>
			<td>
				<label for="segundo_apellido">Segundo apellido:</label>
			</td>
			<td>
			<input type="text" size="30" name="segundo_apellido" placeholder="Segundo apellido"  >
			</td>
			<td><label for="direccion-resi">Direccion de residencia:</label></td>
			<td><input type="text" size="30" name="direccion-resi" placeholder="Direccion" ></td>
		</tr>

		<tr>
			<td>
				<label for="barrio-resi">Barrio de residencia:</label>
			</td>
			<td>
			<input type="text" size="30" name="barrio-resi" placeholder="Barrio" >
			</td>
			<td><label for="municipio-resi">Municipio de residencia:</label>		</td>
			<td><input type="text" size="30" name="lugar-resi" placeholder="Municipio de residencia" required="" ></td>
		</tr>
		
		<tr>
			<td>Estrato:</td>
			<td><input type="number" size="30" min="1" max="6" name="estrato" placeholder="Estrato"></td>
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
		</tr>

		<tr>
			<td>
				<label for="fecha-naci">Fecha de nacimiento:</label>
			</td>
			<td>
			<input type="text" size="30" name="fecha-naci" placeholder="fecha de nacimiento" required="" >
			</td>
			<td><label for="edad">Edad:</label></td>
			<td><input type="number" min="10" max="30" name="edad" placeholder="Edad: 10-30" required="" ></td>
		</tr>

		<tr>
			<td>
				<label for="muni_naci">Municipio de nacimiento:</label>
			</td>
			<td>
			<input type="text" size="30" name="muni_naci" placeholder="Municipio de nacimiento" required="" >
			</td>
			<td><label for="genero">Genero</label></td>
			<td><select name="genero" id="">
					<option value="F">Mujer</option>
					<option value="M">Hombre</option>
				</select></td>
		</tr>

		<tr>
			<td>
				<label for="telefono">Telefono:</label>
			</td>
			<td>
		<input type="text" size="30" name="telefono" placeholder="Telefono" </td>
			<td><label for="email">Email:</label></td>
			<td><input type="email" size="30" name="email" placeholder="Email" >
		</tr>

		<tr>
			<td>
				<label for="victima_conflicto">Victima del conflicto:</label>
			</td>
			<td>
				<select name="victima_conflicto" id="">
					<option value="si">Si</option>
					<option value="no">No</option>
				</select>
			</td>
			<td><label for="situacion_periodo_anterior">Situacion periodo anterior:</label></td>
			<td>
				<select name="situacion_periodo_anterior" id="">
					<option value="matriculado">Matriculado</option>
					<option value="matriculado">Promovido</option>
					<option value="matriculado">Cancelado</option>
					<option value="matriculado">Trasladado</option>
					<option value="matriculado">Suspendido</option>
				</select>
			</td>
		</tr>

		<tr>
			<td>
				<label for="discapacidades">Discapacidades:</label>
			</td>
			<td>
				<input type="text" rows="2" cols="20" size="30" name="discapacidades" placeholder="Discapacidades" required="" >	
			</td>
			<td>Institucion:</td>
			<td>
				<select  name="institucion" id="">
		<?php foreach ($instituciones as $result): ?>
				<option echo $result['id'];?><?php echo $result['nombre'];?></option>
		<?php endforeach ?>
		</select>
			</td>
		</tr>

		<tr>
			<td>Grado que cursa:</td>
			<td><input type="number" min="6" max="12" placeholder="Grado" required=""></td>
			<td>Observación:</td>
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