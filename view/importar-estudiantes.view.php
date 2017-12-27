<?php require("cabecera-admin.php") ?>
<?php require("header-menu.view.php") ?>			
<!--CONTENIDO-->

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

<!--END CONTENIDO-->
<?php require("footer-menu.view.php") ?>					
<?php #require("piedepagina-admin.php") ?>
