<?php 
$html = '
<div style="margin-top:10px; width:100%;">
      <div style=" width:100%; background: white; margin-top: 12px; text-align:center; font-size: .1em;">
          <p style="font-size: 1.5em; font-family: Arial;">GOBERNACION DE RISARALDA</p>
      <div style="width:90;float:right;">
          <img style="80%;" src="../imagenes/gobernacion.png">
      </div>
      '. $fecha_sistema; $html .='
      </div>




      <div style="background-color: white; width: 100%;">
            <p style="font-size: 1.5em; font-family: Arial;">Programas registrados a la fecha</p>
            <table>
            <tr>
            <td><strong>SNIES</strong></td>
            <td><strong>Nombre</strong></td>
            <td><strong># Semestres</strong></td>
            <td><strong># Creditos</strong></td>
            <td><strong># Institucion</strong></td>
          
            </tr>';
              foreach ($programas as $programa) {
             $html .='<tr>
                <td>'.$programa['snies'].'</td>
                <td>'.$programa['nombre'].'</td>
                <td>'.$programa['num_semestres'].'</td>
                <td>'.$programa['num_creditos'].'</td>
                <td>'.$programa['nombre_institucion'].'</td>
                </tr>';
              }

         $html .='
            </table>
      
          </div>';

$mpdf = new mPDF('c','A4');
#$css = file_get_contents('../css/estilos.css');
#$mpdf->writeHTML($css);
$mpdf->writeHTML($html,2);
$mpdf->Output('ReporteProgramas.pdf','I');
?>
