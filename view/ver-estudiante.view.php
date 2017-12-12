<?php 
$html = '
<div style="margin-top:10px; width:100%;">
      <div style=" width:100%; background: white; margin-top: 12px; text-align:center; font-size: .1em;">
          <p style="font-size: 1.5em; font-family: Arial;">GOBERNACIÓN DE RISARALDA</p>
      <div style="width:100;float:right;">
          <img style="50%;" src="../imagenes/gobernacion.png">
      </div>
      </div>




      <div style="background-color: white; width: 100%;">
      <!--INFORMACION PERSONAL-->
            <p style="font-size: 1.5em; font-family: Arial;">Informacion personal del estudiante</p>
            <table>

            <tr>
              <td><strong>Documento:</strong></td>
              <td>'.$estudiante['doc_estudiante'].'</td>
              <td><strong>Tipo de documento:</strong></td>
              <td>'.$estudiante['tipo_docu'].'</td>
            </tr>

            <tr>
              <td><strong>Nombres:</strong></td>
              <td>'.$estudiante['primer_nombre'].' '.$estudiante['segundo_nombre'].'</td>
              <td><strong>Apellidos:</strong></td>
              <td>'.$estudiante['primer_apellido'].' '.$estudiante['segundo_apellido'].'</td>
            </tr>

            <tr>
              <td><strong>Email:</strong></td>
              <td>'.$estudiante['email'].'</td>
              <td><strong>Fecha de nacimiento:</strong></td>
              <td>'.$estudiante['fecha_naci'].'</td>
            </tr>

            <tr>
              <td><strong>Edad</strong></td>
              <td>'.$estudiante['edad'].'</td>
              <td><strong>Estrato</strong></td>
              <td>'.$estudiante['estrato'].'</td>
            </tr>


            <tr>
              <td><strong>Zona</strong></td>
              <td>'.$estudiante['zona'].'</td>
              <td><strong>Situación</strong></td>
              <td>'.$estudiante['situacion'].'</td>
            </tr>

            <tr>
              <td><strong>Tipo de población:</strong></td>
              <td>'.$estudiante['tipo_poblacion'].'</td>
              <td><strong>Color de ojos:</strong></td>
              <td>'.$estudiante['ojos'].'</td>
            </tr>

            <tr>
              <td><strong>Genero:</strong></td>
              <td>'.$estudiante['genero'].'</td>
            </tr>
  
          <tr>
              <td><strong>Municipio de residencia:</strong></td>
              <td>'.$estudiante['nameMuniResi'].'</td>
              <td><strong>Municipio de nacimiento:</strong></td>
              <td>'.$estudiante['nameMuniNaci'].'</td>
            </tr>            

            <tr>
              <td><strong>Discapacidades:</strong></td>
              <td>'.$estudiante['discapacidades'].'</td>
              <td><strong>Direcion de residencia:</strong></td>
              <td>'.$estudiante['direccion_residencia'].'</td>
            </tr>

            <tr>
              <td><strong>Fecha de registro:</strong></td>
              <td>'.$estudiante['fecha_registro'].'</td>
              <td><strong>Barrio de residencia:</strong></td>
              <td>'.$estudiante['barrio_residencia'].'</td>
            </tr>

            <tr>
              <td><strong>Observaciones:</strong></td>
              <td>'.$estudiante['observaciones'].'</td>
            </tr>
            
            
            
            

            </table>
      
          </div>';

          $html .= '
            <div>
            <!--INFORMACION ESCOLAR-->
            <p style="font-size: 1.5em; font-family: Arial;">Información escolar del estudiante</p>
            <table>
            <tr>
              <td><strong>Esta estudiando:</strong></td>
              <td>'.$estudiante['namePrograma'].'</td>
              <td><strong>En la institución:</strong></td>
              <td>'.$estudiante['nameInstitute'].'</td>
            </tr>

            <tr>
              <td><strong>Semestre:</strong></td>
              <td>'.$estudiante['semestre'].'</td>
              <td><strong>Periodo:</strong></td>
              <td>'.$estudiante['periodo'].'</td>
            </tr>

            <tr>
              <td><strong>Grado en curso</strong></td>
              <td>'.$estudiante['grado'].'</td>
              <td><strong>Promedio:</strong></td>';
              if (  $estudiante['promedio'] )  {
                $html .= '<td>'.$estudiante['promedio'].'</td>';  
              }else
              {
                $html .= '<td>Sin asignar</td>';
              }
              $html .='              
            </tr>
            </table>
            </div>
          ';

          $html .= '
      <div id="notices">
    </div>';
$mpdf = new mPDF('c','A4');
#$css = file_get_contents('../css/estilos.css');
#$mpdf->writeHTML($css);
$mpdf->writeHTML($html,2);
$mpdf->Output('ReporteEstudiante.pdf','I');
?>
<?php #require("../view/reportes-estudiantes.view.php") ?>