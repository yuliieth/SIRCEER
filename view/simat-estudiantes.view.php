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
	<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST">
		
		<input type="text" size="20" name="documento" placeholder="Documento" value="<?php echo $result['numero'] ?>" required="" disabled="">
		<input type="text" size="30" name="primer_nombre" value="<?php echo $result['primer_nombre'] ?>" placeholder="Primer nombre"  required="" disabled="">
		<input type="text" size="30" name="segundo_nombre" value="<?php echo $result['segundo_nombre'] ?>" placeholder="Segundo nombre"  disabled="">
		<input type="text" size="30" name="primer_apellido" value="<?php echo $result['primer_apellido'] ?>" placeholder="Primer apellido"  required="" disabled="">
		<input type="text" size="30" name="segundo_apellido" value="<?php echo $result['segundo_apellido'] ?>" placeholder="Segundo apellido"  disabled="">
		
		<input type="text" size="30" name="direccion" placeholder="Direccion" value="<?php echo $result['direccion'] ?>" disabled="">
		<input type="text" size="30" name="barrio" placeholder="Barrio" value="<?php echo $result['barrio'] ?>" disabled="">
		<input type="text" size="30" name="lugar-resi" placeholder="Municipio de residencia" required="" disabled="">
		<input type="text" size="30" name="fecha-naci" placeholder="fecha de nacimiento" value="<?php echo $result['fecha_naci'] ?>" required="" disabled="">
		<input type="number" min="10" max="30" name="edad" placeholder="Edad: 10-30" required="" disabled="">
		<input type="text" size="30" name="lugar-naci" placeholder="Lugar de nacimiento" value="<?php echo $result['muni_naci'] ?>" required="" disabled="">
		<input type="text" size="30" name="genero" placeholder="Genero" value="<?php echo $result['genero'] ?>" required="" disabled="">
		<input type="text" size="30" name="telefono" placeholder="Telefono" disabled="">
		<input type="text" size="30" name="victima_conflicto" placeholder="Victima del conflicto" value="<?php echo $result['victima_conflicto'] ?>" disabled="">
		<input type="email" size="30" name="situacion_anio_anterior" placeholder="E-mail" value="<?php echo $result['situacion_academica_anio_anterior'] ?>" required="" disabled="">
		<input type="email" size="30" name="situacion_anio_anterior" placeholder="E-mail" value="<?php echo $result['discapacidades'] ?>" required="" disabled="">
		

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
	<!--</table>-->
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