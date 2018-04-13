
<?php require("cabecera-admin.php") ?>
<?php require("header-menu.view.php") ?>			
<!--CONTENIDO-->
<h2> <strong> Nuevo programa </strong></h2>
<div class="wrap-formulario">

	<!--<table class="table-formulario">-->
	<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST">
		<input type="text" size="30" name="nombre" placeholder="Nombre*" required>
		<input type="text" size="30" name="codigosnies" placeholder="Codigo SNIES*" required>
		<input type="text" size="30" name="semestres" placeholder="Numero de semestres*">	
			
		<br>
		<input type="text"  name="valor_semestre" placeholder="Valor del semestre*" required>

		<select name="nivel-academico" id="nivel-academico">
			<?php foreach ($niveles as $valor): ?>
				<option value="<?php echo $valor['id'] ?>"><?php echo $valor['nombre'] ?></option>
			<?php endforeach ?>
		</select>

		<br>
		<select name="institucion" id="">
			<?php foreach ($universidades as $valor): ?>
				<option value="<?php echo $valor['id'] ?>"><?php echo $valor['nombre'] ?></option>
			<?php endforeach ?>
		</select>	


		<br>
		<select name="jornada" id="">
			<?php foreach ($jornadas as $valor): ?>
				<option value="<?php echo $valor['id'] ?>"><?php echo $valor['nombre'] ?></option>
			<?php endforeach ?>
		</select>	
		
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
<!--END CONTENIDO-->				
<?php #require("piedepagina-admin.php") ?>