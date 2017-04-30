var chart = AmCharts.makeChart("chartdiv", {
	"type": "serial",
     "theme": "light",
	"categoryField": "year",
	"rotate": true,
	"startDuration": 1,
	"categoryAxis": {
		"gridPosition": "start",
		"position": "left"
	},
	"trendLines": [],
	"graphs": [
		{
			"balloonText": "Mujer:[[value]]",
			"fillAlphas": 0.8,
			"id": "AmGraph-1",
			"lineAlpha": 0.2,
			"title": "Mujer",
			"type": "column",
			"valueField": "Mujer"
		},
		{
			"balloonText": "Hombre:[[value]]",
			"fillAlphas": 0.8,
			"id": "AmGraph-2",
			"lineAlpha": 0.2,
			"title": "Hombre",
			"type": "column",
			"valueField": "Hombre"
		}
	],
	"guides": [],
	"valueAxes": [
		{
			"id": "ValueAxis-1",
			"position": "top",
			"axisAlpha": 0
		}
	],
	"allLabels": [],
	"balloon": {},
	"titles": [],
	"dataProvider": [
		{
			"year": 2013,
			"Mujer": 23.5,
			"Hombre": 18.1
		},
		{
			"year": 2014,
			"Mujer": 26.2,
			"Hombre": 22.8
		},
		{
			"year": 2015,
			"Mujer": 30.1,
			"Hombre": 23.9
		},
		{
			"year": 2016,
			"Mujer": 29.5,
			"Hombre": 25.1
		},
		{
			"year": 2017,
			"Mujer": 24.6,
			"expenses": 25
		}
	],
    "export": {
    	"enabled": true
     }

});