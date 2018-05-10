<div id="bodymenu">
	
	<!--<div class="itemCero"></div>-->

	<div class="itemUno">
		<i class="fa fa-user fa-2x" aria-hidden="true"></i>
					<a href="gestion-estudiantes.php?select=e">ESTUDIANTES</a>
	</div>

	<div class="itemDos">
		<i class="fa fa-graduation-cap fa-2x" aria-hidden="true"></i>
							<a href="gestion-instituciones.php?select=i">INSTITUCIONES</a></li>
	</div>
	<div class="itemTres">
		<i class="fa fa-tasks fa-2x" aria-hidden="true"></i>
							<a href="gestion-programas.php?select=p">PROGRAMAS</a></li>
	</div>
	<div class="itemCuatro">
		<i class="fa fa-university fa-2x" aria-hidden="true"></i>
						<a href="gestion-universidades.php?select=u">UNIVERSIDADES</a>
	</div>

	<div class="itemCinco">
		<i class="fa fa-handshake-o fa-2x" aria-hidden="true"></i>
							<a href="gestion-alianzas.php?select=a">ALIANZAS</a>

	</div>

	<div class="itemSeis">
		<i class="fa fa-map-marker fa-2x" aria-hidden="true"></i>
		<a href="gestion-sedes.php?select=s">SEDES</a>
	</div>

	<div class="sessionuser">
		<i class="fa fa-sign-out fa-3x" aria-hidden="true"></i><a href="<?php echo URL ?>php/cerrar-sesion.php"><?php echo $_SESSION['usuario']['user'] ?></a>
	</div>
		
</div>
<div class="contenedor">