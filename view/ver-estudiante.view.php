<?php 
$html = '
<link rel="icon" href="<?php echo URL; ?>imagenes/favicon.png">
<div style="margin-top:10px; width:100%;">
      <div style=" width:100%; background: white; margin-top: 12px; text-align:center; font-size: .1em;">
          <p style="font-size: 1.5em; font-family: Arial;">GOBERNACIÓN DE RISARALDA</p>
      <div style="width:100;float:right;">
          <img style="50%;" src="../imagenes/gobernacion.png">
      </div>
      </div>




      <div style="background-color: white; width: 100%;">
      <!--INFORMACION PERSONAL-->
            <p style="font-size: 1.5em; font-family: Arial;">Datos del estudiante</p>
            <table>

            <tr>
              <td><strong>Documento:</strong></td>
              <td>'.$estudiante['documento'].'</td>
              <td><strong>Tipo de documento:</strong></td>
              <td>'.$estudiante['tipos_documento'].'</td>
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
              <td>'.$estudiante['fecha_nacimiento'].'</td>
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
              <td><strong>EPS:</strong></td>
              <td>'.$estudiante['EPS'].'</td>
            </tr>

            <tr>
              <td><strong>Tipo de población:</strong></td>
              <td>'.$estudiante['tipo_poblacion'].'</td>
              <td><strong>Color de ojos:</strong></td>
              <td>'.$estudiante['ojos'].'</td>
            </tr>

            <tr>
              <td><strong>Tipo de sangre:</strong></td>
              <td>'.$estudiante['sangre'].'</td>
              <td><strong>Fuente de recurso:</strong></td>
              <td>'.$estudiante['fuente_recurso'].'</td>
            </tr>

            <tr>
              <td><strong>Genero:</strong></td>
              <td>'.$estudiante['genero'].'</td>
              <td><strong>Situación academica:</strong></td>
              <td>'.$estudiante['situacion_academica'].'</td>
              
            </tr>
  
          <tr>
              <td><strong>Municipio de residencia:</strong></td>
              <td>'.$estudiante['municipios'].'</td>
              <td><strong>situacion social:</strong></td>
              <td>'.$estudiante['situacion_social'].'</td>
            </tr>            

            <tr>
              <td><strong>Discapacidades:</strong></td>
              <td>'.$estudiante['discapacidades'].'</td>
              <td><strong>Direcion de residencia:</strong></td>
              <td>'.$estudiante['direccion_residencia'].'</td>
            </tr>

            <tr>
              <td><strong>Fecha de registro:</strong></td>
              <td>'.$estudiante['fecha_inicio'].'</td>
              <td><strong>Fecha fin:</strong></td>
              <td>'.$estudiante['fecha_fin'].'</td>
            </tr>

            <tr>
              <td><strong>Internado:</strong></td>
              <td>'.$estudiante['internado'].'</td>
              <td><strong>Observaciones:</strong></td>
              <td>'.$estudiante['observacion'].'</td>
            </tr>

            <tr>
              <td><strong>Telefono:</strong></td>
              <td>'.$estudiante['telefono_contacto'].'</td>
              <td><strong>Servicio siocial:</strong></td>
              <td>'.$estudiante['servicio_social'].'</td>
            </tr>

            <tr>
            </tr>
            
            
            
            

            </table>
      
          </div>';

          $html .= '
            <div>
            <!--INFORMACION ESCOLAR-->
            <p style="font-size: 1.5em; font-family: Arial;">Información educacion basica</p>
            <table>
            <tr>
              <td><strong>Institucion secundaria:</strong></td>
              <td>'.$estudiante['sede'].'</td>
            </tr>
            </table>

            <p style="font-size: 1.5em; font-family: Arial;">Información academica educacion superior</p>
            <table>
            <tr>
              <td><strong>Programa de estudio:</strong></td>
              <td>'.$estudiante['nombre_programa'].'</td>
              <td><strong>Universidad:</strong></td>
              <td>'.$estudiante['universidad'].'</td>
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
                $html .= '<td style="Color: blue;">'.$estudiante['promedio'].'</td>';  
              }else
              {
                $html .= '<td style="Color: blue;">Promedio sin asignar</td>';
              }
              $html .='              
            </tr>
            </table>
              
              <p style="font-size: 1.5em; font-family: Arial;">Historial semestral</p>
            <table width="100%">
              <tr>
                <td><strong>Año</strong></td>
                <td><strong>Semestre</strong></td>
                <td><strong>Periodo</strong></td>
                <td><strong>Promedio</strong></td>
                <td><strong>Fecha modificación<strong></td>
              </tr>';
              foreach ($historial as $value) {
                $html .= '
              <tr>
                <td>'. $value['anio'] .'</td>
                <td>'. $value['semestre'] .'</td>
                <td>'. $value['periodo'] .'</td>
                <td>'. $value['promedio'] .'</td>
                <td>'. $value['fecha_modificacion'] .'</td>
            </tr>
              ';            
              }
             $html .=' </table>
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