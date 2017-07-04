<?php require 'cabecera-admin.php' ?>

	<table id="estructura">
<tr>
	<td id="menu">&nbsp;
		<ul>
			<li>
            <i class="fa fa-plus fa-2x" aria-hidden="true"></i>
            <a href="../gestion/new_estudiante.php">Nuevo</a>
            </li>
			<li>
            <i class="fa fa-search-plus fa-2x" aria-hidden="true"></i>
            <a href="../gestion/buscar_estudiantes.php">Buscar</a>
            </li>
			<li>
            <i class="fa fa-flag-checkered fa-2x" aria-hidden="true"></i>
            <a href="../gestion/reportes-estudiantes.php">Reportes</a>
            </li>
			<li>
            <i class="fa fa-pie-chart fa-2x" aria-hidden="true"></i>
            <a href="../gestion/estadisticas-estudiantes.php">Estadisticas</a>
            </li>
		</ul>
	</td>
	<td id="pagina">
		
		
<div class="contenedor-busqueda">
		<input type="text" name="busqueda" id="busqueda" placeholder="Buscar...">
	</section>

	<div id="tabla_resultado">
	<!-- AQUI SE DESPLEGARA NUESTRA TABLA DE CONSULTA -->
	</div>
</div>	
					
	</td>
</tr>
</table>







	

<?php require 'piedepagina-admin.php' ?>


