<?php require("cabecera-admin.php") ?>
<?php require("header-menu.view.php") ?>			
<!--CONTENIDO-->

<div class="wrap-formulario">

	<!--<table class="table-formulario">-->
	<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST">
		<input type="text" size="30" name="nombre" placeholder="Nombre*" required>
		<input type="text" size="30" name="codigosnies" placeholder="Codigo SNIES*" required>
		<input type="text" size="30" name="semestres" placeholder="Semestres*">	
			
		<br>
		<input type="text" size="30" name="creditos" placeholder="Creditos*" required>	
		<select name="nivel-academico" id="nivel-academico">
			<option value="tecnico">Tecnico</option>
			<option value="tecnologo">Tecnologo</option>
			<option value="ingenieria">Ingenieria</option>
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
<!--<?php require("piedepagina-admin.php") ?>-->