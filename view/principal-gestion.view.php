<?php require'cabecera-admin.php' ?>
<div class="background">

    <div class="wraper-odometer"> 
    	<p>Estudiantes registrados:</p> <br> <p class="odometer" id="odometerE"></p> 
    </div>
    <div class="wraper-odometer">
        <p>Programas registrados:</p> <br> <p class="odometer" id="odometerP"></p>
    </div>
    <div class="wraper-odometer"> 
    	<p>Instituciones registradas:</p> <br> <p class="odometer" id="odometerI"></p> 
    </div>
    <div class="wraper-odometer"> 
    	<p>Alianzas registradas:</p> <br> <p class="odometer" id="odometerA"></p> 
    </div>
</div>
<script>
setTimeout(function(){
 odometerE.innerHTML = <?php echo $porceM ?>;
 odometerP.innerHTML = <?php echo $porceM ?>;
 odometerI.innerHTML = <?php echo $porceM ?>;
 odometerA.innerHTML = <?php echo $porceM ?>;
}, 1000);

</script>

<?php require 'piedepagina-admin.php' ?>
	