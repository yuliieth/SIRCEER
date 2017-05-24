<?php require("cabecera-admin.php") ?>


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
			
			
			

			<div class="wrap-formulario">

<!--<table class="table-formulario">-->
	<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST">
		
			<input type="text" size="20" name="documento" placeholder="Documento de identidad">
			<input type="text" size="30" name="primer-nombre" placeholder="Primer nombre">
			<input type="text" size="30" name="segundo-nombre" placeholder="Segundo nombre">
		
	
			<input type="text" size="30" name="primer-apellido" placeholder="Primer apellido">
			<input type="text" size="30" name="segundo-apellido" placeholder="Segundo apellido">
			<input type="text" size="30" name="direccion" placeholder="Direccion">
			<br>
			<select  name="municipio" id="municipio">
			  <optgroup label="Risaralda">
				<option value="pereira">Pereira</option>
				<option value="dosquebradas">D/Quebradas</option>
				<option value="santa rosa">Santa rosa</option>
				<option value="apia">Apia</option>
				<option value="mistrato">Mistrato</option>
				<option value="belen de umbria">Belen de umbria</option>
				<option value="chinchina">Chinchina</option>
			  </optgroup>
			</select>		
		
			<input type="text" size="30" name="celular" placeholder="Celular">
			<input type="text" size="30" name="telefono" placeholder="Telefono">
		

	
			<input type="email" size="30" name="email" placeholder="E-mail">
			<input type="text" size="30" name="fecha-naci" placeholder="fecha de nacimiento">
		

	
			<input type="text" size="30" name="lugar-naci" placeholder="Lugar de nacimiento">
			<input type="number" size="30" name="estrato" placeholder="Estrato 1-5">
			<br>

		 
			<label>Desplazado</label>
			<label class="input-redit" for="des_si">Si</label>
			<input type="radio" id="des_si" value="si" name="despla">
			<label class="input-redit" for="des_no">No</label>
			<input type="radio" id="des_no" value="no" name="despla" checked>
		
			<label>Afrodescendiente</label>
			<label class="input-redit" for="afro-si">Si</label>
			<input type="radio" id="afro-si" value="si" name="afro">
			
			<label class="input-redit" for="afro-no">No</label>
			<input type="radio" id="afro-no" value="no" name="afro" checked>
			



			<label>Genero</label>
			<label class="input-redit" for="femenino">Mujer</label>
			<input type="radio" id="femenino" value="femenino" name="genero">
			<label class="input-redit" for="masculino">Hombre</label>
			<input type="radio" id="masculino" value="masculino" name="genero" checked>
		

			<br>
			<label>Color de ojos:</label>
			<label class="input-redit" for="negros">Negros</label>
			<input type="radio" id="negros" value="negros" name="ojos" checked>
			<label class="input-redit" for="azules">Azules</label>
			<input type="radio" id="azules" value="azules" name="ojos">
			<label class="input-redit" for="cafes">Cafes</label>
			<input type="radio" id="cafes" value="cafes" name="ojos">
			<label class="input-redit" for="marron">Marron</label>
			<input type="radio" id="marron" value="marron" name="ojos">

			<div class="input-redit alert error">
				Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dignissimos, voluptatem.
			</div>

			<div class="input-redit alert success">
				Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dignissimos, voluptatem.
			</div>
	
			<input type="submit" name="submit" class="btn btn-primary" value="Guardar">
		


	</form>
<!--</table>-->
</div>


							
		</td>
	</tr>
</table>




<?php require("piedepagina-admin.php") ?>