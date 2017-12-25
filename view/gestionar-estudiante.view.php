<?php require 'cabecera-admin.php';?>
<?php require("header-menu.view.php") ?>
<div class="contenedor">
	<h2>Cargar pronmedio semestre culminado</h2>
<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST">
	<table>
		<th><p><strong>Estudiante</strong></p></th>
	<tr>
		<td><label for="documento">Documento</label></td>
		<td><input type="text" readonly="readonly" value="<?php echo $datosEstudiante['documento']; ?>" name="documento" ><br></td>
		<td><label for="documento">Nombre estudiante</label></td>
		<td><input type="text" value="<?php echo $datosEstudiante['primer_nombre']." ".$datosEstudiante['segundo_nombre'] ." ".$datosEstudiante['primer_apellido'];?>" name="nombre" disabled=""></td>
	</tr>

		<th><p><strong>Programa</strong></p></th>
	<tr>
		<td><label for="nombre">Nombre:</label></td>
		<td><input type="text" disabled="" value="<?php echo $datosEstudiante['nombrePrograma'] ?>"></td>
		<td><label for="nombre">SNIES:</label></td>
		<td><input type="text" disabled="" value="<?php echo $datosEstudiante['snies'] ?>"></td>
	</tr>
		
		
			<th><strong><p>Institucion academica</p></strong></th>
		<tr>
			<td></td>
			
			<td><h2><?php echo $datosEstudiante['nombreInstitucion']; ?></h2></td>
			
		</tr>
		
		
			<th><strong>Datos del semestre</strong></th>
		<tr>
		<!--Se debe llenar este input con el ultimo semestre registrado para el estudiante-->
			<td><label for="semestre">Semestre:</label></td>
			<td><input type="text" disabled="disabled" name="semestre" required="required" value="<?php echo $datosEstudiante['semestre']; ?>"></td>
			<td><label for="periodo">Periodo:</label></td>
			<td>
				<input type="text" disabled="disabled" name="periodo" value="<?php echo $datosEstudiante['periodo']; ?>">
			</td>
		</tr>
		<tr>
			<td><label for="promedio">Promedio:</label></td>

			<td><input type="text"  name="promedio" required="required" <?php if ( !empty( $datosEstudiante['promedio']) ): ?>
				<?php echo   'readonly="readonly"'?>
			 value="<?php echo $datosEstudiante['promedio']; ?>">
			 <?php echo "El promedio ya ha sido asignado" ?>
				<?php endif ?>
			</td>

			<td><input type="hidden" name="matricula" value="<?php echo $datosEstudiante['matriculaId']; ?>"></td>
			<td><input type="hidden"  name="semestre" value="<?php echo $datosEstudiante['semestreId']; ?>"></td>
		<tr>
			
		</tr>

		<tr>
			<td></td>
			<td></td>
			<td></td>
			<td><input type="submit" name="cargar" value="enviar"></td>
		</tr>
	
	</table>
	</form>


	<!--SEGUNDO FORMULARIO DE RENOVACION SEMESTRE-->	
	<h2>Renovacion matricula</h2>
	<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST">
	<table>
		<th><p><strong>Estudiante</strong></p></th>
	<tr>
		<td><label for="documento">Documento</label></td>
		<td><input type="text" readonly="readonly" value="<?php echo $datosEstudiante['documento']; ?>" name="documento" ><br></td>
		<td><label for="documento">Nombre estudiante</label></td>
		<td><input type="text" value="<?php echo $datosEstudiante['primer_nombre']." ".$datosEstudiante['segundo_nombre'] ." ".$datosEstudiante['primer_apellido'];?>" name="nombre" disabled=""></td>
	</tr>

		<th><p><strong>Programa</strong></p></th>
	<tr>
		<td><label for="nombre">Nombre:</label></td>
		<td><input type="text" disabled="" value="<?php echo $datosEstudiante['nombrePrograma'] ?>"></td>
		<td><label for="nombre">SNIES:</label></td>
		<td><input type="text" disabled="" value="<?php echo $datosEstudiante['snies'] ?>"></td>
	</tr>
		
		
			<th><strong><p>Institucion academica</p></strong></th>
		<tr>
			<td></td>
			
			<td><h2><?php echo $datosEstudiante['nombreInstitucion']; ?></h2></td>
			
		</tr>
		
		
			<th><strong>Datos del semestre</strong></th>
		<tr>
		<!--Se debe llenar este input con el ultimo semestre registrado para el estudiante-->
			<td><label for="semestre">Semestre:</label></td>
			<td>
				<select name="semestre" id="semestre">
					<option value="1">1</option>
					<option value="2">2</option>
					<option value="3">3</option>
					<option value="4">4</option>
					<option value="5">5</option>
					<option value="6">6</option>
					<option value="7">7</option>
					<option value="8">8</option>
					<option value="9">9</option>
					<option value="10">10</option>
				</select>
			</td>
			<td><label for="periodo">Periodo:</label></td>
			<td>
				<select name="periodo" id="periodo">
					<option value="1">1</option>
					<option value="2">2</option>
				</select>
			</td>
			<td><td><input type="hidden" name="matricula" value="<?php echo $datosEstudiante['matriculaId']; ?>"></td></td>
		</tr>
			

		<tr>
			<td></td>
			<td></td>
			<td></td>
			<td><input type="submit" name="renovar" value="renovar"></td>
		</tr>
	
	</table>
	</form>
	

</div>
<?php require("footer-menu.view.php") ?>
<?php #require'piedepagina-admin.php' ?>