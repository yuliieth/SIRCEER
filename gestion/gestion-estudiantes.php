<?php session_start(); ?>
<?php  
require_once '../admin/config.php';
require_once '../php/funciones.php';
require_once '../php/Conexion.php';
validateSession();
$cn = getConexion($bd_config);
#Chart estudiantes by genero
$totalE=countEntityWithOutWhere("estudiantes",$cn);
$totalM=contarGeneroEstudiantes('estudiantes','generos','genero_id','nombre','MASCULINO',$cn);
$totalF=contarGeneroEstudiantes('estudiantes','generos','genero_id','nombre','FEMENINO',$cn);
$leyenda = "Estudiantes registrados a la fecha ";
#var_dump($totalM);
#var_dump($totalF);
#var_dump($totalE);

if ($totalE != 0) {
	# code...

#realizando operaciones

$porceM=($totalM / $totalE)*100;
$porceF=($totalF / $totalE)*100;
#var_dump($porceM);
#var_dump($porceF);
#var_dump($porceM);


#Chart estudiantes by zona
$totalZR=contarGeneroEstudiantes('estudiantes','zonas','zona_id','nombre','RURAL',$cn);
$totalZU=contarGeneroEstudiantes('estudiantes','zonas','zona_id','nombre','URBANA',$cn);
$totalNRZ=contarGeneroEstudiantes('estudiantes','zonas','zona_id','nombre','NO APLICA',$cn);
#Realizando calculo
$porceZR = ($totalZR / $totalE)*100;
$porceZU = ($totalZU / $totalE)*100;
$porceNRZ = ($totalNRZ / $totalE)*100;


#Chart estudiantes_tipo_poblacion
$totalMes=contarGeneroEstudiantes('estudiantes','tipos_poblacion','tipo_poblaion_id','nombre','NO APLICA',$cn);
$totalInd=contarGeneroEstudiantes('estudiantes','tipos_poblacion','tipo_poblaion_id','nombre','INDIGENA',$cn);
$totalAfr=contarGeneroEstudiantes('estudiantes','tipos_poblacion','tipo_poblaion_id','nombre','AFRODESCENDIENTE',$cn);

$porceMes = (($totalMes/$totalE)*100);
$porceInd = (($totalInd/$totalE)*100);
$porceAfr = (($totalAfr/$totalE)*100);

#Chart estudiantes victimas del conflicto
$totalDes=contarGeneroEstudiantes('estudiantes','situaciones_sociales','situacion_social_id','nombre','DESPLAZADO',$cn);
$totalVC=contarGeneroEstudiantes('estudiantes','situaciones_sociales','situacion_social_id','nombre','VICTIMAS DEL CONFLICTO',$cn);
$totalVu=contarGeneroEstudiantes('estudiantes','situaciones_sociales','situacion_social_id','nombre','NO APLICA',$cn);
$totalEP=contarGeneroEstudiantes('estudiantes','situaciones_sociales','situacion_social_id','nombre','EXTREMA POBREZA',$cn);
#Calculando
$porceDes = (($totalDes/$totalE)*100);
$porceVC = (($totalVC/$totalE)*100);
$porceVu = (($totalVu/$totalE)*100);
$porceEP = (($totalEP/$totalE)*100);



#Chart estudiantes mayores y menores de edad
$totalVu=countEntityWithWhere("estudiante","situacion",'Vulnerable',$cn);
$porceDes = (($totalDes/$totalE)*100);
}
?>
<?php require'../view/gestion-estudiantes.view.php' ?>