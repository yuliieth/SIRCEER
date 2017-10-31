<?php require 'cabecera-admin.php';?>
<?php require("header-menu.view.php") ?>
<div class="contenedor">
<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST">
	<table>
		<th><p><strong>Alianza</strong></p></th>
	<tr>
		<td><label for="id">ID</label></td>
		<td><input type="text" readonly="" value="<?php echo $alianza['id']; ?>" name="id" ><br></td>
		<td><label for="nombre">Nombre</label></td>
		<td><input type="text" value="<?php echo $alianza['nombre']?>" name="nombre" disabled=""></td>
	</tr>
	
		<th><p><strong>Vincular instituciones:</strong></p></th>
	<tr>
		<td>Seleccione las instutuciones</td>
		<td>
			<select name="institucion" id="">
			<?php foreach ($instituciones as $valor): ?>
				<option value="<?php echo $valor['id'] ?>"><?php echo $valor['nombre'] ?></option>
			<?php endforeach ?>
		</select>	
		</td>
		<td>
			<select name="institucion" id="">
			<?php foreach ($instituciones as $valor): ?>
				<option value="<?php echo $valor['id'] ?>"><?php echo $valor['nombre'] ?></option>
			<?php endforeach ?>
		</select>
		</td>
	</tr>
		<tr>
		<td></td>
		<td>
		<select name="institucion" id="">
			<?php foreach ($instituciones as $valor): ?>
				<option value="<?php echo $valor['id'] ?>"><?php echo $valor['nombre'] ?></option>
			<?php endforeach ?>
		</select>
		</td>
	</tr>
	
		<tr>
			<td></td>
			<td></td>
			<td></td>
			<td><input type="submit" value="enviar"></td>
		</tr>
	
	</table>
	</form>
</div>
<?php require("footer-menu.view.php") ?>
<?php require'piedepagina-admin.php' ?>