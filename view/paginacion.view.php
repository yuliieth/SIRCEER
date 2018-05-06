<?php $numero_paginas = numero_paginas($config_global['result_por_pagina'],$name_bd,$cn) ?>
<?php $file = $_SERVER['PHP_SELF']; ?>
<?php $file  =  explode('/', $file);

$select = "";

switch ($file['4']) {

	case 'buscar-estudiantes.php':
		$select = 'select=e';
		break;

	case 'buscar-institucion.php':
		$select = 'select=i';
		break;

	case 'buscar-programa.php':
		$select = 'select=p';
		break;

	case 'buscar-universidad.php':
		$select = 'select=u';
		break;

	case 'buscar-alianza.php':
		$select = 'select=a';
		break;

	case 'buscar-sede.php':
		$select = 'select=s';
		break;
	
	default:
		
		break;
}

?>
<section class="paginacion">

	<ul>
		<?php if ($pagina == 1): ?>
			<li class="disabled">&laquo;</li>
		<?php else: ?>
			<li><a href="<?php echo $file['4'] ?>?<?php echo $select ?>&p=<?php echo $pagina - 1?>">&laquo;</a></li>
		<?php endif ?>


	
		<?php for ($i=1; $i <=$numero_paginas ; $i++) { ?>
		<?php if ($pagina == $i): ?>
			<li class="active"><a href="<?php echo $file['4'] ?>?<?php echo $select ?>&p=<?php echo $i ?>"><?php echo $i ?></a></li>
		<?php else: ?>
			<li><a href="<?php echo $file['4'] ?>?<?php echo $select ?>&p=<?php echo $i ?>"><?php echo $i ?></a>
		<?php endif ?>
		<?php } ?>



<?php if ($pagina == $numero_paginas): ?>
	<li class="disabled">&raquo;</a></li>
	<?php else: ?>
	<li><a href="<?php echo $file['4'] ?>?<?php echo $select ?>&p=<?php echo $pagina + 1 ?>">&raquo;</a></li>	
<?php endif ?>
		
	</ul>
</section>