<?php require("cabecera-admin.php") ?>
<?php require("header-menu.view.php") ?>			
<!--CONTENIDO-->
<?php var_dump($_POST); ?>
<!--Formulario-->
<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" enctype="multipart/form-data" method="post" >
Fichero a recibir: <input type="file" name="myfile"/><br/>
<input type="submit" value="Enviar" name="Importar">
</form>

<?php if ($estado): ?>
	
<table border=1>
	<tr>
		<td>Nombres</td>
		<td>Apellidos</td>
		<td>Telefono</td>
		<td>Direccion</td>
		<td>Email</td>
	</tr>

<?php 
	for ($i=1; $i <= $numRows ; $i++) { 
		$nombres = $ocjPHPEXCEL->getActiveSheet()->getCell('A'.$i)->getCalculatedValue();
		$apellidos = $ocjPHPEXCEL->getActiveSheet()->getCell('B'.$i)->getCalculatedValue();
		$telefeno = $ocjPHPEXCEL->getActiveSheet()->getCell('C'.$i)->getCalculatedValue();
		$direccion = $ocjPHPEXCEL->getActiveSheet()->getCell('D'.$i)->getCalculatedValue();
		$email = $ocjPHPEXCEL->getActiveSheet()->getCell('C'.$i)->getCalculatedValue();


	}?>
	<tr>
 		<td><?php echo $nombres ?></td>
 		<td><?php echo $apellidos ?></td>
 		<td><?php echo $telefeno ?></td>
 		<td><?php echo $direccion ?></td>
 		<td><?php echo $email ?></td>
	
	</tr> 
</table>
<?php endif ?>
	

<!--END CONTENIDO-->
<?php require("footer-menu.view.php") ?>					
<?php require("piedepagina-admin.php") ?>

