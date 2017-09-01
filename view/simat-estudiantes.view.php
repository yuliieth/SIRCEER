<?php require("cabecera-admin.php") ?>
<?php require("header-menu.view.php") ?>			
<!--CONTENIDO-->

<div class="wrap-formulario">
	<h1>Consulta de estudiantes en el SIMAT</h1>
	<div class="contenedor-busqueda">
		<form action="" method="POST" onSubmit="return validarForm(this)">
		<input type="text" name="busqueda" id="busqueda" placeholder="Buscar...">
		<input type="submit" value="Buscar" name="buscar">
		</form>
	</div>
	<?php if ($estado): ?>
		
	<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST">
	<table width="100%">
		<tr>
			<td>
				<label for="documento">Numero de documento:</label>
			</td>
			<td>
			<input type="text" size="20" name="documento" placeholder="Documento" value="<?php echo $result['numero'] ?>" required="" disabled="">
			</td>
		</tr>


		<tr>
			<td>
			<label for="primer_nombre">Primer nombre:</label>		
			</td>
			<td>
			<input type="text" size="30" name="primer_nombre" value="<?php echo $result['primer_nombre'] ?>" placeholder="Primer nombre"  required="" disabled="">
			</td>
		</tr>

		<tr>
			<td>
				<label for="segundo_nombre">Segundo nombre:</label>
			</td>
			<td>
			<input type="text" size="30" name="segundo_nombre" value="<?php echo $result['segundo_nombre'] ?>" placeholder="Segundo nombre"  disabled="">
			</td>
		</tr>

		<tr>
			<td>
				<label for="primer_apellido">Primer apellido:</label>
			</td>
			<td>
			<input type="text" size="30" name="primer_apellido" value="<?php echo $result['primer_apellido'] ?>" placeholder="Primer apellido"  required="" disabled="">
			</td>
		</tr>

		<tr>
			<td>
				<label for="segundo_apellido">Segundo apellido</label>
			</td>
			<td>
			<input type="text" size="30" name="segundo_apellido" value="<?php echo $result['segundo_apellido'] ?>" placeholder="Segundo apellido"  disabled="">
			</td>
		</tr>

		<tr>
			<td>
				<label for="direccion">Direccion:</label>
			</td>
			<td>
			<input type="text" size="30" name="direccion" placeholder="Direccion" value="<?php echo $result['direccion'] ?>" disabled="">
			</td>
		</tr>

		<tr>
			<td>
				<label for="barrio">Barrio</label>
			</td>
			<td>
			<input type="text" size="30" name="barrio" placeholder="Barrio" value="<?php echo $result['barrio'] ?>" disabled="">
			</td>
		</tr>

		<tr>
			<td>
				<label for="lugar-resi">Municipio de residencia:</label>		
			</td>
			<td>
			<input type="text" size="30" name="lugar-resi" placeholder="Municipio de residencia" required="" disabled="">
			</td>
		</tr>

		<tr>
			<td>
				<label for="fecha-naci">Fecha de nacimiento:</label>
			</td>
			<td>
			<input type="text" size="30" name="fecha-naci" placeholder="fecha de nacimiento" value="<?php echo $result['fecha_naci'] ?>" required="" disabled="">
			</td>
		</tr>

		<tr>
			<td>
				<label for="edad">Edad:</label>
			</td>
			<td>
			<input type="number" min="10" max="30" name="edad" placeholder="Edad: 10-30" required="" disabled="">
			</td>
		</tr>

		<tr>
			<td>
				<label for="lugar-naci">Lugar de nacimiento:</label>
			</td>
			<td>
			<input type="text" size="30" name="lugar-naci" placeholder="Lugar de nacimiento" value="<?php echo $result['muni_naci'] ?>" required="" disabled="">
			</td>
		</tr>

		<tr>
			<td>
				<label for="genero">Genero</label>
			</td>
			<td>
				<input type="text" size="30" name="genero" placeholder="Genero" value="<?php echo $result['genero'] ?>" required="" disabled="">
			</td>
		</tr>

		<tr>
			<td>
				<label for="telefono">Telefono:</label>
			</td>
			<td>
		<input type="text" size="30" name="telefono" placeholder="Telefono" disabled="">
			</td>
		</tr>


<tr>
			<td>
				<label for="victima_conflicto">Victima del conflicto:</label>
			</td>
			<td>
				<input type="text" size="30" name="victima_conflicto" placeholder="Victima del conflicto" value="<?php echo $result['victima_conflicto'] ?>" disabled="">
			</td>
		</tr>


<tr>
			<td>
				<label for="situacion_anio_anterior">Situacion año anterior:</label>
			</td>
			<td>
				<input type="text" size="30" name="situacion_anio_anterior" placeholder="E-mail" value="<?php echo $result['situacion_academica_anio_anterior'] ?>" required="" disabled="">	
			</td>
		</tr>


<tr>
			<td>
				<label for="discapacidades">Discapacidades:</label>
			</td>
			<td>
				<input type="text" size="30" name="discapacidades" placeholder="E-mail" value="<?php echo $result['discapacidades'] ?>" required="" disabled="">	
			</td>
		</tr>

	</table>	

		<?php //if (!empty($errores)): ?>
			<div class="input-redit alert error">
				<?php #echo $errores;?>
			</div>	
		<?php #elseif($enviado): ?>
			<div class="input-redit alert success">
				<p>Datos enviados correctamente</p>
			</div>
		<?php #endif ?>
		

		
		<input type="reset" name="">
		<input type="submit" name="submit" class="btn btn-primary" value="Guardar">

	</form>
	<?php else:?>
		<h1>Resultdo de la busqueda</h1>
		<?php endif ?>
	
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