<?php require("cabecera-admin.php") ?>


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
			
			
			

			<div class="wrap-formulario">

<!--<table class="table-formulario">-->
	<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST">
		
			<input type="text" size="20" name="documento" placeholder="Documento*" required="">
			<input type="text" size="30" name="primer-nombre" placeholder="Primer nombre*" required="">
			<input type="text" size="30" name="segundo-nombre" placeholder="Segundo nombre*" required="">
			
	
			<input type="text" size="30" name="primer-apellido" placeholder="Primer apellido*" required="">
			<input type="text" size="30" name="segundo-apellido" placeholder="Segundo apellido*" required="">
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
		
			<input type="text" size="30" name="celular" placeholder="Celular*" required="">
			<input type="text" size="30" name="telefono" placeholder="Telefono">
		

	
			<input type="email" size="30" name="email" placeholder="E-mail" required="">
			<!--<input type="text" size="30" name="fecha-naci" placeholder="fecha de nacimiento*">-->
			<input type="date" name="fecha-naci" step="1" min="1950-01-01" max="2018-12-31" value="<?php echo date("Y-m-d");?>">

		

	
			<input type="text" size="30" name="lugar-naci" placeholder="Lugar de nacimiento*" required="">
			<input type="number" size="30" min="1" max="5" name="estrato" placeholder="Estrato 1-5*" required="">
			
			<br>
			<label class="labels">Desplazado*:</label>
			<label class="input-redit" for="des_si">Si</label>
			<input type="radio" id="des_si" value="si" name="despla">
			<label class="input-redit" for="des_no">No</label>
			<input type="radio" id="des_no" value="no" name="despla" checked>
			
			<br>
			<br>
			<label class="labels">Afrodescendiente*:</label>
			<label class="input-redit" for="afro-si">Si</label>
			<input type="radio" id="afro-si" value="si" name="afro">
			
			<label class="input-redit" for="afro-no">No</label>
			<input type="radio" id="afro-no" value="no" name="afro" checked>
			

			<br>
			<br>
			<label class="labels">Genero*:</label>
			<label class="input-redit" for="femenino">Mujer</label>
			<input type="radio" id="femenino" value="femenino" name="genero">
			<label class="input-redit" for="masculino">Hombre</label>
			<input type="radio" id="masculino" value="masculino" name="genero" checked>
		

			<br>
			<br>
			<label class="labels">Color de ojos*:</label>
			<label class="input-redit" for="negros">Negros</label>
			<input type="radio" id="negros" value="negros" name="ojos" checked>
			<label class="input-redit" for="azules">Azules</label>
			<input type="radio" id="azules" value="azules" name="ojos">
			<label class="input-redit" for="cafes">Cafes</label>
			<input type="radio" id="cafes" value="cafes" name="ojos">
			<label class="input-redit" for="marron">Marron</label>
			<input type="radio" id="marron" value="marron" name="ojos">
			<br>
			<br>
			
			<?php if (!empty($errores)): ?>
				<div class="input-redit alert error">
				<?php echo $errores;?>
			</div>	
			<?php elseif($enviado): ?>
			<div class="input-redit alert success">
				<p>Datos enviados correctamente</p>
			</div>
			<?php endif ?>
			

				
			<input type="reset" name="">
			<input type="submit" name="submit" class="btn btn-primary" value="Guardar">
		


	</form>
<!--</table>-->
</div>


							
		</td>
	</tr>
</table>




<?php require("piedepagina-admin.php") ?>