<?php require 'cabecera-admin.php' ?>
<?php require("header-menu.view.php") ?>
<div class="contenedor-busqueda">
		<input type="text" name="busqueda" id="busqueda" placeholder="Buscar...">
	</section>

	<div id="wraper_resultado">
	<table class="tabla_resultados">
	<tr class="row-primary">
			<td class="cell">NOMBRES</td>
			<td class="cell">EDAD</td>
			<td class="cell">OJOS</td>
			<td class="cell">ESTRATO</td>
			<td class="cell">GENERO</td>
			<!--<td class="cell">INSTITUTO</td>
			<td class="cell">PROGRAMA</td>
			<td class="cell">SEMESTRE</td>-->
			<td class="cell">DESPLAZADO</td>
			<td class="cell">AFRO</td>
			<td class="cell">ESTADO</td>
			<td class="cell"></td>
			<td class="cell"></td>
	</tr>

		<?php foreach ($estudiantes as $filaAlumnos) {?>
			

		<tr class="row-secundaria"<?php 
			if ($filaAlumnos['estado'] == 0) {
				echo " style='background-color: rgb(232,64,68);'";
			}elseif($filaAlumnos['estado'] == 1){
				echo " style='background-color:rgb(132,242,127);'";
			}
		 ?>>
			<td class="cell"> <?php echo  $filaAlumnos['primer_nombre']." ".$filaAlumnos['primer_apellido']?></td>
			<td class="cell"> <?php echo  $filaAlumnos['edad']?></td>
			<td class="cell"> <?php echo  $filaAlumnos['ojos']?></td>
			<td class="cell"> <?php echo  $filaAlumnos['estrato']?></td>
			<td class="cell"> <?php echo  $filaAlumnos['genero']?></td>
			<td class="cell"> <?php echo  $filaAlumnos['desplazado']?></td>
			<td class="cell"> <?php echo  $filaAlumnos['afrodescendiente']?></td>
			<td class="cell"> <?php echo  $filaAlumnos['estado']?></td>
			<!--<td> <?php echo  $filaAlumnos['nameInstitute']?></td>
			<td> <?php echo  $filaAlumnos['namePrograma']?></td>
			<td> <?php echo  $filaAlumnos['periodo']?></td>
			<td> <?php echo  $filaAlumnos['documento']?></td>-->
			<td class="cell"> <a class="links-crud" href="<?php echo URL ?>gestion/gestionar-estudiante.php?id=<?php echo urlencode($filaAlumnos['documento'])?>">Gestionar</a></td>
			<td class="cell"> <a class="links-crud" href="<?php echo URL ?>gestion/editar-estudiante.php?id=<?php echo urlencode($filaAlumnos['documento'])?>">Editar</a></td>
			<td class="cell"> <a class="links-crud" href="<?php echo URL ?>php/eliminarEstudiante.php?id=<?php echo urlencode($filaAlumnos['documento'])?>">Eliminar</a></td>
			<td class="cell"> <a class="links-crud" target="_blank" href="<?php echo URL ?>gestion/ver-estudiante.php?id=<?php echo urlencode($filaAlumnos['documento'])?>">Ver</a></td>
		 </tr>



		<?php } ?>
		
	</div>
</div>	
					
	</td>
</tr>
</table>

<?php require 'piedepagina-admin.php' ?>


