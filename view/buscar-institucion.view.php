<?php require("cabecera-admin.php") ?>
<?php require("header-menu.view.php") ?>


<section class="contenedor-busqueda">
	<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST">
		<input type="text" name="busqueda" id="busqueda" placeholder="Buscar...">
		<input type="submit" name="buscar" value="Buscar">
	</form>
</section>



<div style="overflow-x:auto; padding: 17px;">
	<!-- AQUI SE DESPLEGARA NUESTRA TABLA DE CONSULTA -->
	<table class="table_estudiantes">
		<tr>
			<th class="table_estudiantes_th">ID</th>
			<th class="table_estudiantes_th">NOMBRE</th>
			<th class="table_estudiantes_th">TELEFONO</th>
			<th class="table_estudiantes_th">SIGLAS</th>
			<th class="table_estudiantes_th">CALENDARIO</th>
			<th class="table_estudiantes_th">DANE</th>
		</tr>

	<?php foreach ($rows as $value) {?>
		<tr class="table_estudiantes_tr">
			<td class="table_estudiantes_td"><?php echo $value['id_institucion'] ?></td>
			<td class="table_estudiantes_td"><?php echo $value['name_institucion'] ?></td>
			<td class="table_estudiantes_td"><?php echo $value['telefono'] ?></td>
			<td class="table_estudiantes_td"><?php echo $value['siglas'] ?></td>
			<td class="table_estudiantes_td"><?php echo $value['calendario'] ?></td>
			<td class="table_estudiantes_td"><?php echo $value['DANE'] ?></td>
			<td class="table_estudiantes_td"><?php echo $value['sector'] ?></td>
			<td class="table_estudiantes_td"><?php echo $value['name_municipio'] ?></td>
			<!--
			<td class="table_estudiantes_td">
				<a href="<?php echo URL ?>gestion/gestionar-institucion.php?id=<?php echo urlencode($value['id_institucion'])?>&select=e">Gestionar</a>
			</td>
		-->
			<td class="table_estudiantes_td">
				<a href="<?php echo URL ?>gestion/editar-institucion.php?id=<?php echo urlencode($value['id_institucion'])?>&select=e">Editar</a>
			</td>
			<td class="table_estudiantes_td">
				<a href="<?php echo URL ?>php/eliminarInstitucion.php?id=<?php echo urlencode($value['id_institucion'])?>">Eliminar</a>
			</td>
			<td class="table_estudiantes_td">
				<a href="<?php echo URL ?>gestion/ver-institucion.php?id=<?php echo urlencode($value['id_institucion'])?>">Ver</a>
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




