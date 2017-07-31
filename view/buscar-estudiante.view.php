<?php require 'cabecera-admin.php' ?>
<?php require("header-menu.view.php") ?>
<div class="contenedor-busqueda">
		<input type="text" name="busqueda" id="busqueda" placeholder="Buscar...">
	</section>

	<div id="tabla_resultado">
	<table class="table">
	  <tr>
	  	<th scope="colgroup" colspan="4">Listado de estudiantes</th>
	  </tr>
	<tr class="bg-primary">
			<td>NOMBRES</td>
			<td>APELLIDOS</td>
			<td>EMAIL</td>
			<td>OJOS</td>
			<td>ESTRATO</td>
			<td>GENERO</td>
			<td>INSTITUTO</td>
			<td>PROGRAMA</td>
			<td>SEMESTRE</td>
			<td>ESTADO</td>
	</tr>

		<?php foreach ($allEntitys as $filaAlumnos) {?>
			

		<tr>
			<td> <?php echo  $filaAlumnos['primer_nombre']." ".$filaAlumnos['segundo_nombre']?></td>
			<td> <?php echo  $filaAlumnos['primer_apellido']." ".$filaAlumnos['segundo_apellido']?></td>
			<td> <?php echo  $filaAlumnos['email']?></td>
			<td> <?php echo  $filaAlumnos['ojos']?></td>
			<td> <?php echo  $filaAlumnos['estrato']?></td>
			<td> <?php echo  $filaAlumnos['genero']?></td>
			<td> <?php echo  $filaAlumnos['nameInstitute']?></td>
			<td> <?php echo  $filaAlumnos['namePrograma']?></td>
			<td> <?php echo  $filaAlumnos['nameSemestre']?></td>
			<td> <?php echo  $filaAlumnos['estado']?></td>
			<td> <?php echo  $filaAlumnos['idprograma']?></td>
			<td> <a href="<?php echo URL ?>gestion/editar-estudiante.php?id=<?php echo urlencode($filaAlumnos['id'])?>">Editar</a></td>
			<td> <a href="<?php echo URL ?>php/eliminarEstudiante.php?id=<?php echo urlencode($filaAlumnos['id'])?>">Eliminar</a></td>
			<td> <a href="<?php echo URL ?>gestion/ver-estudiante.php?id='<?php echo urlencode($filaAlumnos['id'])?>">Ver</a></td>
		 </tr>



		<?php } ?>
		
	</div>
</div>	
					
	</td>
</tr>
</table>

<?php require 'piedepagina-admin.php' ?>


