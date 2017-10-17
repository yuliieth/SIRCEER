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
		
		
			<th><strong>Nota del semestre en curso</strong></th>
		<tr>
			<td><label for="nota">Promedio:</label></td>
			<td><input type="text" required="" name="nota" placeholder="Nota"></td>
			<!--<td><label for="notaAnterior">Promedio anterior:</label></td>
			<td><input type="text" name="nota_anterior" placeholder="Nota periodo anterior"></td>-->
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
<?php require'piedepagina-admin.php' ?>