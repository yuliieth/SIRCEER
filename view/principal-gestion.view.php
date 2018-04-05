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
    <div class="wraper-odometer"> 
        <p>Universidades registradas:</p> <br> <p class="odometer" id="odometerU"></p> 
    </div>
</div>
<script>
setTimeout(function(){
 odometerE.innerHTML = <?php echo $totalE ?>;
 odometerP.innerHTML = <?php echo $totalP ?>;
 odometerI.innerHTML = <?php echo $totalI ?>;
 odometerA.innerHTML = <?php echo $totalA ?>;
 odometerU.innerHTML = <?php echo $totalU ?>;
}, 1000);

</script>

<?php require 'piedepagina-admin.php' ?>

	