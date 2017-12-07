<?php require 'cabecera-admin.php';?>
<?php require("header-menu.view.php") ?>
<div class="contenedor">
<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST">
	<table>
		<th><p><strong>Estudiante</strong></p></th>
	<tr>
		<td><label for="documento">Documento</label></td>
		<td><input type="text" readonly="" value="<?php echo $estudiante['documento']; ?>" name="documento" ><br></td>
		<td><label for="documento">Nombre estudiante</label></td>
		<td><input type="text" value="<?php echo $estudiante['primer_nombre']." ".$estudiante['segundo_nombre'] ." ".$estudiante['primer_apellido'];?>" name="nombre" disabled=""></td>
	</tr>

		<th><p><strong>Programa</strong></p></th>
	<tr>
		<td><label for="nombre">Nombre:</label></td>
		<?php foreach ($programa as $valor) {?>
		<td><input type="text" disabled="" value="<?php echo $valor['nombre_programa'] ?>"></td>
		<td><label for="nombre">SNIES:</label></td>
		<td><input type="text" disabled="" value="<?php echo $valor['codigo_snies'] ?>"></td>
	</tr>
		<?php } ?>
		
			<th><strong><p>Institucion academica</p></strong></th>
		<tr>
			<td>Insitucion:</td>
			<?php foreach ($programa as $valor) {?>
			<td><p id="wraper-i"><?php echo $valor['nombre_institucion']; ?></p></td>
			<?php } ?>
		</tr>
		
		
			<th><strong>promedio semestre</strong></th>
		<tr>
			<td><label for="promedio">Promedio:</label></td>
			<td><input type="text" required="" name="promedio" placeholder="Ej: 3.5"></td>
		<!--Se debe llenar este input con el ultimo semestre registrado para el estudiante-->
			<td><label for="promedio">Semestre:</label></td>
			<td><input type="number" max="10" min="1" required="required" name="semestre" placeholder="Semestre"></td>
		</tr>
			<td><label for="periodo">Periodo:</label></td>
			<td>
				<select name="periodo" id="periodo">
					<option value="1">1</option>
					<option value="2">2</option>
				</select>
			</td>
		<tr>
			
		</tr>

		<tr>
			<td></td>
			<td></td>
			<td></td>
			<td><input type="submit" value="enviar"></td>
		</tr>
	
	</table>
	</form>
</div>
<?php require("footer-menu.view.php") ?>
<?php #require'piedepagina-admin.php' ?>