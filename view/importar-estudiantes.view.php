<?php require("cabecera-admin.php") ?>
<?php require("header-menu.view.php") ?>			
<!--CONTENIDO-->
<script type="text/javascript">
	function validarCargue()
	{
		if (document.frm_archivo.myfile.value=="") 
		{
			alert("Debe cargar una hoja de calculo");
			document.frm_archivo.myfile.focus();
			return false;
		}

		document.frm_archivo.action = "../gestion/importar-estudiantes.php";
		document.submit();
	}
</script>
<!--Formulario-->
<form  action="<?php echo $_SERVER['PHP_SELF']; ?>"  name="frm_archivo" enctype="multipart/form-data" method="post" >
Fichero a recibir: <input type="file" name="myfile"/><br/>
<input type="submit" value="Enviar" name="Importar">
</form>
	

	<?php if ($estado): ?>
		
<table>
<?php 
	for ($i=2; $i <= $numRows; $i++) { 
		$tipoDocumento = $objPHPEXCEL ->getActiveSheet()->getCell('A'.$i)->getCalculatedValue();
		$documento = $objPHPEXCEL ->getActiveSheet()->getCell('B'.$i)->getCalculatedValue();
		$primerNombre = $objPHPEXCEL ->getActiveSheet()->getCell('C'.$i)->getCalculatedValue();
		$segundoNombre = $objPHPEXCEL ->getActiveSheet()->getCell('D'.$i)->getCalculatedValue();
		$primerApellido = $objPHPEXCEL ->getActiveSheet()->getCell('E'.$i)->getCalculatedValue();
		$segundoApellido = $objPHPEXCEL ->getActiveSheet()->getCell('F'.$i)->getCalculatedValue();
		$tipoSangre = $objPHPEXCEL ->getActiveSheet()->getCell('G'.$i)->getCalculatedValue();
		$telefono = $objPHPEXCEL ->getActiveSheet()->getCell('H'.$i)->getCalculatedValue();
		$email = $objPHPEXCEL ->getActiveSheet()->getCell('I'.$i)->getCalculatedValue();
		$fechaNaci = $objPHPEXCEL ->getActiveSheet()->getCell('G'.$i)->getCalculatedValue();
		$edad = $objPHPEXCEL ->getActiveSheet()->getCell('J'.$i)->getCalculatedValue();
		$muniNaci = $objPHPEXCEL ->getActiveSheet()->getCell('K'.$i)->getCalculatedValue();
		$direResi = $objPHPEXCEL ->getActiveSheet()->getCell('L'.$i)->getCalculatedValue();
		$barrioResi = $objPHPEXCEL ->getActiveSheet()->getCell('M'.$i)->getCalculatedValue();
		$muniResi = $objPHPEXCEL ->getActiveSheet()->getCell('N'.$i)->getCalculatedValue();
		$estrato = $objPHPEXCEL ->getActiveSheet()->getCell('O'.$i)->getCalculatedValue();
		$zona = $objPHPEXCEL ->getActiveSheet()->getCell('P'.$i)->getCalculatedValue();
		$EPS = $objPHPEXCEL ->getActiveSheet()->getCell('Q'.$i)->getCalculatedValue();
		$situacion = $objPHPEXCEL ->getActiveSheet()->getCell('R'.$i)->getCalculatedValue();
		$tipoPoblacion = $objPHPEXCEL ->getActiveSheet()->getCell('S'.$i)->getCalculatedValue();
		$ojos = $objPHPEXCEL ->getActiveSheet()->getCell('T'.$i)->getCalculatedValue();
		$genero = $objPHPEXCEL ->getActiveSheet()->getCell('U'.$i)->getCalculatedValue();
		$discapacidad = $objPHPEXCEL ->getActiveSheet()->getCell('U'.$i)->getCalculatedValue();
		$colegio = $objPHPEXCEL ->getActiveSheet()->getCell('V'.$i)->getCalculatedValue();
		$situacionAcademica = $objPHPEXCEL ->getActiveSheet()->getCell('W'.$i)->getCalculatedValue();
		$grado = $objPHPEXCEL ->getActiveSheet()->getCell('X'.$i)->getCalculatedValue();
		$observacion = $objPHPEXCEL ->getActiveSheet()->getCell('Y'.$i)->getCalculatedValue();

		?>
	<tr>
		<td><?php echo $tipoDocumento ?></td>
		<td><?php echo $documento ?></td>
		<td><?php echo $primerNombre ?></td>
		<td><?php echo $segundoNombre ?></td>
		<td><?php echo $primerApellido ?></td>
		<td><?php echo $segundoApellido ?></td>
		<td><?php echo $tipoSangre ?></td>
		<td><?php echo $telefono ?></td>
		<td><?php echo $email ?></td>
		<td><?php echo $fechaNaci ?></td>
		<td><?php echo $edad ?></td>
		<td><?php echo $muniNaci ?></td>
		<td><?php echo $direResi ?></td>
		<td><?php echo $barrioResi ?></td>
		<td><?php echo $muniResi ?></td>
		<td><?php echo $estrato ?></td>
		<td><?php echo $zona ?></td>
		<td><?php echo $EPS ?></td>
		<td><?php echo $situacion ?></td>
		<td><?php echo $tipoPoblacion ?></td>
		<td><?php echo $ojos ?></td>
		<td><?php echo $genero ?></td>
		<td><?php echo $discapacidad ?></td>
		<td><?php echo $colegio ?></td>
		<td><?php echo $situacionAcademica ?></td>
		<td><?php echo $grado ?></td>
		<td><?php echo $observacion ?></td>
	</tr>

		
		<?php 
	}
 ?>
</table>
	<?php endif ?>
<!--END CONTENIDO-->
<?php require("footer-menu.view.php") ?>					
<?php require("piedepagina-admin.php") ?>

