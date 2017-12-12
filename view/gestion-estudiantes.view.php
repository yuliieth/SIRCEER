<?php require 'cabecera-admin.php';
require_once '../admin/config.php'; ?>
      
      <?php require("header-menu.view.php") ?>
      

<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>

    <div class="wraper-charts">
        

        <div style="width:43%; height:226px; float: left;"  id="estudiantes_genero"></div>
        <div style="width:43%; height:226px; float: left;"  id="estudiantes_zona"></div>
        <div style="width:43%; height:226px; float: left;"  id="estudiantes_tipo_poblacion"></div>
        <div style="width:43%; height:226px; float: left;"  id="estudiantes_victimas_conflicto"></div>
        <!--<div style="width:43%; height:222px; float: left;"  id="estudiantes_menores_mayores_edad"></div>-->
    </div>


<!--CODIGOS-->
<script type="text/javascript">

Highcharts.chart('estudiantes_genero', {
    chart: {
        plotBackgroundColor: "#009E35",
        plotBorderWidth: 0,
        plotShadow: false,
        type: 'pie'
    },
    title: {
        text:  "Estudiantes por género"
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




Highcharts.chart('estudiantes_zona', {
    chart: {
        plotBackgroundColor: "#009E35",
        plotBorderWidth: 0,
        plotShadow: false,
        type: 'pie'
    },
    title: {
        text:  "Estudiantes de zonas urbanas y rurales"
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
            name: 'Urbana',
            y: <?php echo $porceZU ?>
        }, {
            name: 'Rural',
            y: <?php echo $porceZR ?> ,
            sliced: true,
            selected: true
        }]
    }]
});





Highcharts.chart('estudiantes_tipo_poblacion', {
    chart: {
        plotBackgroundColor: "#009E35",
        plotBorderWidth: 0,
        plotShadow: false,
        type: 'pie'
    },
    title: {
        text:  "Estudiantes por tipo de población"
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
            name: 'Mestizo',
            y: <?php echo $porceMes ?>
        }, {
            name: 'Indigena',
            y: <?php echo $porceInd ?> ,
            sliced: true,
            selected: true
        },{
            name: 'Afro',
            y: <?php echo $porceAfr ?>
        }
        ]
    }]
});



Highcharts.chart('estudiantes_victimas_conflicto', {
    chart: {
        plotBackgroundColor: "#009E35",
        plotBorderWidth: 0,
        plotShadow: false,
        type: 'pie'
    },
    title: {
        text:  "Estudiantes por situación"
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
            name: 'Desplazado',
            y: <?php echo $porceDes ?>
        }, {
            name: 'Victima del conflicto',
            y: <?php echo $porceVC ?> ,
            sliced: true,
            selected: true
        },{
            name: 'Vulnerable',
            y: <?php echo $porceVu ?>
        }
        ]
    }]
});


Highcharts.chart('estudiantes_menores_mayores_edad', {
    chart: {
        plotBackgroundColor: "#009E35",
        plotBorderWidth: 0,
        plotShadow: true,
        type: 'pie'
    },
    title: {
        text:  "Estudiantes menores y mayores de edad"
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
            name: 'Desplazado',
            y: <?php echo $porceDes ?>
        }, {
            name: 'Victima del conflicto',
            y: <?php echo $porceVC ?> ,
            sliced: true,
            selected: true
        },{
            name: 'Vulnerable',
            y: <?php echo $porceVu ?>
        }
        ]
    }]
});

        </script>	
      <?php require("footer-menu.view.php") ?>


      

    <?php #require 'piedepagina-admin.php'; ?>

