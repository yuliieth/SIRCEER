<?php session_start(); ?>
<?php  
require_once '../admin/config.php';
require_once '../php/funciones.php';
require_once '../php/Conexion.php';
validateSession();
$cn = getConexion($bd_config);
#Chart estudiantes by genero
$totalE=countEntityWithOutWhere("estudiante",$cn);
$totalM=countEntityWithWhere("estudiante","genero",'M',$cn);
$totalF=countEntityWithWhere("estudiante","genero",'F',$cn);
$leyenda = "Estudiantes registrados a la fecha ";
#var_dump($totalM);
#var_dump($totalF);
#var_dump($totalE);
#realizando operaciones
$porceM = 0;
$porceF = 0;
$porceM=($totalM / $totalE)*100;
$porceF=($totalF / $totalE)*100;
#var_dump($porceM);
#var_dump($porceF);
#var_dump($porceM);


#Chart estudiantes by zona
$totalZR=countEntityWithWhere("estudiante","zona",'Rural',$cn);
$totalZU=countEntityWithWhere("estudiante","zona",'Urbana',$cn);
#Realizando calculo
$porceZR = ($totalZR / $totalE)*100;
$porceZU = ($totalZU / $totalE)*100;


#Chart estudiantes_tipo_poblacion
$totalMes=countEntityWithWhere("estudiante","tipo_poblacion",'Mestizo',$cn);
$totalInd=countEntityWithWhere("estudiante","tipo_poblacion",'Indigena',$cn);
$totalAfr=countEntityWithWhere("estudiante","tipo_poblacion",'Afro',$cn);

$porceMes = (($totalMes/$totalE)*100);
$porceInd = (($totalInd/$totalE)*100);
$porceAfr = (($totalAfr/$totalE)*100);

#Chart estudiantes victimas del conflicto
$totalDes=countEntityWithWhere("estudiante","situacion",'Desplazado',$cn);
$totalVC=countEntityWithWhere("estudiante","situacion",'Victima conflicto',$cn);
$totalVu=countEntityWithWhere("estudiante","situacion",'Vulnerable',$cn);
#Calculando
$porceDes = (($totalDes/$totalE)*100);
$porceVC = (($totalVC/$totalE)*100);
$porceVu = (($totalVu/$totalE)*100);



#Chart estudiantes mayores y menores de edad
$totalVu=countEntityWithWhere("estudiante","situacion",'Vulnerable',$cn);
$porceDes = (($totalDes/$totalE)*100);

?>
<?php require'../view/gestion-estudiantes.view.php' ?>