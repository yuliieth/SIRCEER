<?php require("cabecera-admin.php") ?>
<?php require("header-menu.view.php") ?>
<<<<<<< HEAD
				
<?php // content="text/plain; charset=utf-8"
require_once ('../libs/jpgraph/jpgraph.php');
require_once ('../libs/jpgraph/jpgraph_bar.php');

$datay=array(20,30,50,80);
$datay2=array(430,645,223,690);
$datazero=array(0,0,0,0);

// Create the graph.
$graph = new Graph(450,200);
$graph->clearTheme();
$graph->title->Set('Example with 2 scale bars');

// Setup Y and Y2 scales with some "grace"
$graph->SetScale("textlin");
$graph->SetY2Scale("lin");
$graph->yaxis->scale->SetGrace(30);
$graph->y2axis->scale->SetGrace(30);

//$graph->ygrid->Show(true,true);
$graph->ygrid->SetColor('gray','lightgray@0.5');

// Setup graph colors
$graph->SetMarginColor('white');
$graph->y2axis->SetColor('darkred');


// Create the "dummy" 0 bplot
$bplotzero = new BarPlot($datazero);

// Create the "Y" axis group
$ybplot1 = new BarPlot($datay);
$ybplot1->value->Show();
$ybplot = new GroupBarPlot(array($ybplot1,$bplotzero));

// Create the "Y2" axis group
$ybplot2 = new BarPlot($datay2);
$ybplot2->value->Show();
$ybplot2->value->SetColor('darkred');
$ybplot2->SetFillColor('darkred');
$y2bplot = new GroupBarPlot(array($bplotzero,$ybplot2));

// Add the grouped bar plots to the graph
$graph->Add($ybplot);
$graph->AddY2($y2bplot);

// .. and finally stroke the image back to browser
$graph->Stroke();
?>
	
=======
	
<?php   
 /* Include all the classes */ 
>>>>>>> 5d58a9dbdd4a166612e160e5599148d8bede4faf

include("../pChart2.0/class/pDraw.class.php"); 

include("../pChart2.0/class/pImage.class.php"); 

include("../pChart2.0/class/pData.class.php");

 

/* Create and populate the pData object */
 $MyData = new pData();  
 $MyData->addPoints(array(60,30,10),"Answers");
 $MyData->setAxisName(0,"Answers (%)");
 $MyData->addPoints(array("I do agree  ","I disagree  ","No opinion  "),"Options");
 $MyData->setAbscissa("Options");

 /* Create the pChart object */
 $myPicture = new pImage(500,220,$MyData);

 /* Write the chart title */ 
 $myPicture->setFontProperties(array("FontName"=>"fonts/Forgotte.ttf","FontSize"=>15));
 $myPicture->drawText(20,34,"Q: Flexibility is a key point of this library",array("FontSize"=>20));

 /* Define the default font */ 
 $myPicture->setFontProperties(array("FontName"=>"../fonts/pf_arma_five.ttf","FontSize"=>6));

 /* Set the graph area */ 
 $myPicture->setGraphArea(70,60,480,200);
 $myPicture->drawGradientArea(70,60,480,200,DIRECTION_HORIZONTAL,array("StartR"=>200,"StartG"=>200,"StartB"=>200,"EndR"=>255,"EndG"=>255,"EndB"=>255,"Alpha"=>30));

 /* Draw the chart scale */ 
 $scaleSettings = array("AxisAlpha"=>10,"TickAlpha"=>10,"DrawXLines"=>FALSE,"Mode"=>SCALE_MODE_START0,"GridR"=>0,"GridG"=>0,"GridB"=>0,"GridAlpha"=>10,"Pos"=>SCALE_POS_TOPBOTTOM);
 $myPicture->drawScale($scaleSettings); 

 /* Turn on shadow computing */ 
 $myPicture->setShadow(TRUE,array("X"=>1,"Y"=>1,"R"=>0,"G"=>0,"B"=>0,"Alpha"=>10));

 /* Draw the chart */ 
 $myPicture->drawBarChart(array("DisplayValues"=>TRUE,"DisplayShadow"=>TRUE,"DisplayPos"=>LABEL_POS_INSIDE,"Rounded"=>TRUE,"Surrounding"=>30));

 /* Render the picture (choose the best way) */
 #$myPicture->autoOutput("../imagenes/example.drawBarChart.poll.png");
 $myPicture->Stroke();
?>
<?php require("footer-menu.view.php") ?>	
<?php require 'piedepagina-admin.php' ?>


