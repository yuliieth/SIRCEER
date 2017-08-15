<?php require 'cabecera-admin.php';?>
<?php require("header-menu.view.php") ?>
<div class="contenedor">
<form action="" method="POST">
	<div class="wraper-e">
		<p><strong>Estudiante</strong></p>
		<label for="documento">Documento</label>
		<input type="text" value="<?php echo $estudiante['documento']; ?>" name="documento" disabled="">
		<label for="nombreEstudiante">Nombre estudiante</label>
		<input type="text" value="<?php echo $estudiante['nombres']." ".$estudiante['apellidos'];?>" name="nombreEstudiante" disabled="">
	</div>

	<div class="wraper-p">
		<p><strong>Programa</strong></p>
		<label for="nombre">Nombre</label>
		<select name="programa" id="" onchange="ejecutar(this.value)" >
			<option value="">Seleccione una opcion</option>
		<?php foreach ($programas as $programa): ?>
			<option  value="<?php echo $programa['snies']?>"><?php echo $programa['nombre']?></option>
		<?php endforeach ?>
		</select>

	</div>
	<div>
		<p>Institucion academica</p>
		<p id="wraper-i"><strong></strong></p>
		
	</div>
	<div class="wraper-f">
			<label for="nota">Promedio</label>
			<input type="text" value="3.5" name="nota">
			<label for="periodo">Periodo</label>
			<input type="text" value="2017-2" name="periodo">
			<label for="notaAnterior">Promedio anterior</label>
			<input type="text" value="4.6" name="notaAnterior">
		
	</div>
	<input type="submit" value="enviar">
	</form>
</div>
<?php require("footer-menu.view.php") ?>
<?php require'piedepagina-admin.php' ?>