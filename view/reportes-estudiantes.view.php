<?php require "cabecera-admin.php"; ?>
<table id="estructura">
	<tr>
		<td id="menu">&nbsp;
			<ul>
				<li>
                <i class="fa fa-plus fa-2x" aria-hidden="true"></i>
                <a href="../admin/new_estudiante.php">Nuevo</a>
                </li>
				<li>
                <i class="fa fa-search-plus fa-2x" aria-hidden="true"></i>
                <a href="../admin/buscar_estudiantes.php">Buscar</a>
                </li>
				<li>
                <i class="fa fa-flag-checkered fa-2x" aria-hidden="true"></i>
                <a href="../admin/reportes-estudiantes.php">Reportes</a>
                </li>
				<li>
                <i class="fa fa-pie-chart fa-2x" aria-hidden="true"></i>
                <a href="../admin/estadisticas-estudiantes.php">Estadisticas</a>
                </li>
			</ul>
		</td>
		<td id="pagina">
			
			<?php 
$last_line = shell_exec("java -jar C:\\xampp\htdocs\\DesarrolloWeb\\PracticaPHP\\SRCEER\\jar\\srceerJavaJar.jar");
				#java -jar C:\Users\AlexisRuiz\Desktop\ejecutar\Ejecutar.jar
				if ($last_line == null) {
					echo "Ocurrio un error ejecutando el JAR";
				}
				echo $last_line;
			 ?>
							
		</td>
	</tr>
</table>
<?php require "piedepagina-admin.php"; ?>