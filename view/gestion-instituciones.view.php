<?php require 'cabecera-admin.php';?>
      
      <?php require("header-menu.view.php") ?>
      

<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
    <div class="wraper-charts">
        

        <div style="width:80%; height:250px;"  id="estudiantes"></div>
    </div>


<!--CODIGOS-->
<script type="text/javascript">

Highcharts.chart('estudiantes', {
    chart: {
        plotBackgroundColor: "#009E35",
        plotBorderWidth: 0,
        plotShadow: false,
        type: 'pie'
    },
    title: {
        text:  "Estudiantes registrados a la fecha"
    },
    tooltip: {
        pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
    },
    plotOptions: {
        pie: {
            allowPointSelect: true,
            cursor: 'pointer',
            dataLabels: {
                enabled: true,
                format: '<b>{point.name}</b>: {point.percentage:.1f} %',
                style: {
                    color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
                }
            }
        }
    },
    series: [{
        name: 'Brands',
        colorByPoint: true,
        data: [{
            name: 'Masculino',
            y: <?php echo $porceM ?>
        }, {
            name: 'Femenino',
            y: <?php echo $porceF ?> ,
            sliced: true,
            selected: true
        }]
    }]
});
        </script>   
      <?php require("footer-menu.view.php") ?>


      

    <?php #require 'piedepagina-admin.php'; ?>

