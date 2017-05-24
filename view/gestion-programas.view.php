<?php require 'cabecera-admin.php' ?>
<?php /*Este require debe moverse a su archivo paralelo*/ require_once '../php/Conexion.php' ?>
	


	<?php 
		/*
		1 Number of Men
		2 Number of women
		3 Number peoples
		4 Find percent: Number man or womens divided total
		*/

		$conexion = getConexion();
		if ($conexion == null) {
			echo "Fallo la conexion";
		}

		$sql = "SELECT SQL_CALC_FOUND_ROWS * FROM estudiantes";
		$num = $conexion->prepare($sql);
		$num->execute();
		$num = $num->fetchAll();
		//var_dump($num);

		$numStudent = $conexion->query("SELECT FOUND_ROWS() AS total");
		$numStudent = $numStudent->fetch()['total'];
		//echo " el es : {$numStudent}";

		$sql ="SELECT  COUNT(genero)  FROM estudiantes WHERE genero='femenino'";
		$numWomen = $conexion->query($sql);
		$numWomen = $numWomen->fetchColumn();
		//echo "{$numWomen}";

		$numMen = $numStudent - $numWomen;
		//echo "{$numMen}";

	 ?>

<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>

	
<table id="estructura">
	<tr>
		<td id="menu">&nbsp;
			<ul>
				<li>
                <i class="fa fa-plus fa-2x" aria-hidden="true"></i>
                <a href="../admin/new_estudiante.php">Nuevo</a>
                </li>
				<li>
                <i class="fa fa-search-plus fa-2x" aria-hidden="true"></i>
                <a href="../admin/buscar_estudiantes.php">Buscar</a>
                </li>
				<li>
                <i class="fa fa-flag-checkered fa-2x" aria-hidden="true"></i>
                <a href="../admin/reportes-estudiantes.php">Reportes</a>
                </li>
				<li>
                <i class="fa fa-pie-chart fa-2x" aria-hidden="true"></i>
                <a href="../admin/estadisticas-estudiantes.php">Estadisticas</a>
                </li>
			</ul>
		</td>
		<td id="pagina">
			
GESTION PROGRAMAS  
<div id="container" style="min-width: 310px; height: 400px; max-width: 800px; margin: 0 auto">
                 
</div>			
		</td>
	</tr>
</table>


<script type="text/javascript">

Highcharts.chart('container', {
    chart: {
        type: 'area'
    },
    title: {
        text: 'Historico y estimacion de programas por especialidad'
    },
    subtitle: {
        text: 'Source: Gobernacion de Risaralda'
    },
    xAxis: {
        categories: ['2011', '2012', '2013', '2014', '2015', '2016', '2017'],
        tickmarkPlacement: 'on',
        title: {
            enabled: false
        }
    },
    yAxis: {
        title: {
            text: 'Percent'
        }
    },
    tooltip: {
        pointFormat: '<span style="color:{series.color}">{series.name}</span>: <b>{point.percentage:.1f}%</b> ({point.y:,.0f} Miles)<br/>',
        split: true
    },
    plotOptions: {
        area: {
            stacking: 'percent',
            lineColor: '#ffffff',
            lineWidth: 1,
            marker: {
                lineWidth: 1,
                lineColor: '#ffffff'
            }
        }
    },
    series: [{
        name: 'Men',
        data: [502, 635, 809, 947, 1402, 3634, <?php echo $numMen ?> ]
    }, {
        name: 'Women',
        data: [106, 107, 111, 133, 221, 767, <?php echo $numWomen ?> ]
    }]
});
		</script>

<?php require'piedepagina-admin.php' ?>
