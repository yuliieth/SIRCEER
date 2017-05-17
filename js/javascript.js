var chart = AmCharts.makeChart("chartdiv", {
	"type": "serial",
	"dataProvider: "data.ph",
     "theme": "light",
	}
	"categoryField": "Año",
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
			"Año": 2013,
			"Mujer": 23.5,
			"Hombre": 18.1
		},
		{
			"Año": 2014,
			"Mujer": 26.2,
			"Hombre": 22.8
		},
		{
			"Año": 2015,
			"Mujer": 30.1,
			"Hombre": 23.9
		},
		{
			"Año": 2016,
			"Mujer": 29.5,
			"Hombre": 25.1
		},
		{
			"Año": 2017,
			"Mujer": 24.6,
			"Hombre": 25
		}
	],
    "export": {
    	"enabled": true
     }

});