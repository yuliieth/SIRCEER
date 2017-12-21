<?php require("cabecera-admin.php") ?>
<?php require("header-menu.view.php") ?>			
<!--CONTENIDO-->
<script type="text/javascript">
	function cargarHojaExcel()
	{
		if(document.formulario_hoja_calculo.excel.value=="")
		{
			alert("Suba un archivo");
			document.formulario_hoja_calculo.excel.focus();
			return false;
		}		

		document.formulario_hoja_calculo.action = "importar-estudiantes.php";
		document.formulario_hoja_calculo.submit();
	}
</script>
	
		<form   method="POST" name="formulario_hoja_calculo" enctype="multipart/form-data">
			<p>Subir excel</p> <br>
		  <p><input type="file" name="excel" id="excel" /></p><br>
		  <p><input type="button" value="subir" onclick="cargarHojaExcel();" /></p>
		</form>

<!--END CONTENIDO-->
<?php require("footer-menu.view.php") ?>					
<?php #require("piedepagina-admin.php") ?>
