<?php require("cabecera-admin.php") ?>

<div class="formulario">

<!--<table class="table-formulario">-->
	<form action="new_estudiante.php" method="POST">
		<tr>
			<td><input type="text" size="20" name="documento" placeholder="Documento de identidad"></td>
			<td><input type="text" size="30" name="primer-nombre" placeholder="Primer nombre"></td>
			<td><input type="text" size="30" name="segundo-nombre" placeholder="Segundo nombre"></td>
		</tr>
		
		<tr>
			<td><input type="text" size="30" name="primer-apellido" placeholder="Primer apellido"></td>
			<td><input type="text" size="30" name="segundo-apellido" placeholder="Segundo apellido"></td>
			<td><input type="text" size="30" name="direccion" placeholder="Direccion"></td>
		</tr>
		

		<tr>
			<td><input type="text" size="30" name="celular" placeholder="Celular"></td>
			<td><input type="text" size="30" name="telefono" placeholder="Telefono"></td>
		</tr>

		<tr>
			<td><input type="text" size="30" name="email" placeholder="E-mail"></td>
			<td><input type="text" size="30" name="fecha-naci" placeholder="fecha de nacimiento"></td>
		</tr>

		<tr>
			<td><input type="text" size="30" name="lugar-naci" placeholder="Lugar de nacimiento"></td>
			<td><input type="text" size="30" name="estrato" placeholder="Estrato"></td>
			<td><input type="text" size="30" name="descendencia" placeholder="Descedencia"></td>
			<td><input type="submit" value="Enviar"></td>
		</tr>


	</form>
<!--</table>-->
</div>

<?php require("piedepagina-admin.php") ?>