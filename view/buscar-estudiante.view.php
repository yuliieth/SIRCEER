<?php require("cabecera-admin.php") ?>
<?php require("header-menu.view.php") ?>


<section class="contenedor-busqueda">
		<input type="text" name="busqueda" id="busqueda" placeholder="Buscar...">
</section>



<div style="overflow-x:auto; padding: 17px;">
	<!-- AQUI SE DESPLEGARA NUESTRA TABLA DE CONSULTA -->
	<table class="table_estudiantes">
		<tr>
			<th class="table_estudiantes_th">Documento</th>
			<th class="table_estudiantes_th">Nombres</th>
			<th class="table_estudiantes_th">Apellidos</th>
			<th class="table_estudiantes_th">Edad</th>
			<th class="table_estudiantes_th">Grado</th>
			<th class="table_estudiantes_th">Municipio</th>
			<th class="table_estudiantes_th">Zona</th>
			<th class="table_estudiantes_th">Sede</th>
			<th class="table_estudiantes_th">Genero</th>

		</tr>

	<?php foreach ($rows as $value) {?>
		<tr class="table_estudiantes_tr">
			<td class="table_estudiantes_td"><?php echo $value['doc_estudiante'] ?></td>
			<td class="table_estudiantes_td"><?php echo $value['primer_nombre'] . " " .$value['segundo_nombre']?></td>
			<td class="table_estudiantes_td"><?php echo $value['primer_apellido'] . " " .$value['segundo_apellido']?></td>
			<td class="table_estudiantes_td"><?php echo $value['edad'] ?></td>
			<td class="table_estudiantes_td"><?php echo $value['grado'] ?></td>
			<td class="table_estudiantes_td"><?php echo $value['municipio'] ?></td>
			<td class="table_estudiantes_td"><?php echo $value['zona'] ?></td>
			<td class="table_estudiantes_td"><?php echo $value['sede'] ?></td>
			<td class="table_estudiantes_td"><?php echo $value['genero'] ?></td>
			<td class="table_estudiantes_td">
				<a href="<?php echo URL ?>gestion/gestionar-estudiante.php?id=<?php echo urlencode($value['doc_estudiante'])?>&select=e">Gestionar</a>
			</td>
			<td class="table_estudiantes_td">
				<a href="<?php echo URL ?>gestion/editar-estudiante.php?id=<?php echo urlencode($value['doc_estudiante'])?>&select=e">Editar</a>
			</td>
			<td class="table_estudiantes_td">
				<a href="<?php echo URL ?>php/eliminarEstudiante.php?id=<?php echo urlencode($value['doc_estudiante'])?>">Eliminar</a>
			</td>
		<?php
	}
	 ?>

	</table>
</div>




<div>
<?php require 'paginacion.view.php' ?>
</div>

<?php require("footer-menu.view.php") ?>	
<?php #require 'piedepagina-admin.php' ?>




