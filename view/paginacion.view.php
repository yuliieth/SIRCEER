<?php $numero_paginas = numero_paginas($config_global['estudiantes_por_pagina'],$cn) ?>
<?php #echo $numero_paginas ?>
<section class="paginacion">

	<ul>
		<?php if ($pagina == 1): ?>
			<li class="disabled">&laquo;</li>
		<?php else: ?>
			<li><a href="buscar-estudiantes.php?select=e&p=<?php echo $pagina - 1?>">&laquo;</a></li>
		<?php endif ?>


	
		<?php for ($i=1; $i <=$numero_paginas ; $i++) { ?>
		<?php if ($pagina == $i): ?>
			<li class="active"><a href="buscar-estudiantes.php?select=e&p=<?php echo $i ?>"><?php echo $i ?></a></li>
		<?php else: ?>
			<li><a href="buscar-estudiantes.php?select=e&p=<?php echo $i ?>"><?php echo $i ?></a>
		<?php endif ?>
		<?php } ?>



<?php if ($pagina == $numero_paginas): ?>
	<li class="disabled">&raquo;</a></li>
	<?php else: ?>
	<li><a href="buscar-estudiantes.php?select=e&p=<?php echo $pagina + 1 ?>">&raquo;</a></li>	
<?php endif ?>
		
	</ul>
</section>