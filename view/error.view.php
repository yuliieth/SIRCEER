<?php 	session_start();
require_once '../php/funciones.php';
validateSession();
require("cabecera-admin.php") ?>

<p style="font-size: 3em; font-family: monospace, Helvetica, Verdana; color: green; font-weight: 900; text-align: center; margin-top: 200px;">
	Lo sentimos ha ocurrido un error
</p>	

<?php require("footer-menu.view.php") ?>	
<?php require 'piedepagina-admin.php' ?>