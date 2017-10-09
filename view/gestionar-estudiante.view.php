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
		<label for="nombre">Nombre</label>
		<select name="programa" id="" onchange="ejecutar(this.value)" >
			<option value="">Seleccione una opcion</option>
		<?php foreach ($programas as $programa): ?>
			<option  value="<?php echo $programa['snies']?>"><?php echo $programa['nombre']?></option>
		<?php endforeach ?>
		</select>

	</div>
	<div>
		<strong><p>Institucion academica</p></strong>
		<p id="wraper-i"></p>
		
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