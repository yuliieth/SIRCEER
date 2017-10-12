<?php require 'cabecera-admin.php';?>
<?php require("header-menu.view.php") ?>
<div class="contenedor">
<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST">
	<div class="wraper-e">
		<p><strong>Estudiante</strong></p>

		<label for="documento">Documento</label><br>
		<input type="text" value="<?php echo $estudiante['documento']; ?>" name="documento" disabled=""><br>

		<label for="documento">Nombre estudiante</label>
		<input type="text" value="<?php echo $estudiante['primer_nombre']." ".$estudiante['segundo_nombre'] ." ".$estudiante['primer_apellido'];?>" name="nombre" disabled="">
	</div>

	<div class="wraper-p">
		<p><strong>Programa</strong></p>
		<label for="nombre">Nombre:</label>
		<?php foreach ($programa as $valor) {?>
			
		<input type="text" disabled="" value="<?php echo $valor['nombre_programa'] ?>">
		<label for="nombre">SNIES:</label>
		<input type="text" value="<?php echo $valor['codigo_snies'] ?>">
		<?php } ?>
	</div>

	<div class="wraper-i">
		<strong><p>Institucion academica</p></strong>
		<?php foreach ($programa as $valor) {?>
		<p id="wraper-i"><?php echo $valor['nombre_institucion']; ?></p>
		<?php } ?>
		
	</div>
	<div class="wraper-pe">

			<!--<label for="periodo">Periodo:</label>
			<input type="text" value="2017-2" name="periodo">-->

			<label for="nota">Promedio:</label>
			<input type="text"  name="nota" placeholder="Nota">

			<label for="notaAnterior">Promedio anterior:</label>
			<input type="text" name="nota_anterior" placeholder="Nota periodo anterior">
		
	</div>
	<input type="submit" value="enviar">
	</form>
</div>
<?php require("footer-menu.view.php") ?>
<?php require'piedepagina-admin.php' ?>