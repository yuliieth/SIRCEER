<?php 
$html = '
<div style="margin-top:10px; width:100%;">
      <div style=" width:100%; background: white; margin-top: 12px; text-align:center; font-size: .1em;">
          <p style="font-size: 1.5em; font-family: Arial;">GOBERNACION DE RISARALDA</p>
      <div style="width:90;float:right;">
          <img style="80%;" src="../imagenes/gobernacion1.jpg">
      </div>
      </div>




      <div style="background-color: white; width: 100%;">
      <!--INFORMACION PERSONAL-->
            <p style="font-size: 1.5em; font-family: Arial;">Informacion de la alianza</p>
            <table>

            <tr>
              <td><strong>ID:</strong></td>
              <td>'.$alianza['id_alianza'].'</td>
              <td><strong>Nombre:</strong></td>
              <td>'.$alianza['nombreAlianza'].'</td>
            </tr>

            <tr>
              <td><strong>Fecha de inicio:</strong></td>
              <td>'.$alianza['fecha_inicio'].'</td>
              <td><strong>Fecha final:</strong></td>
              <td>'.$alianza['fecha_final'].'</td>
            </tr>

            <tr>
              <td><strong>Cupos:</strong></td>
              <td>'.$alianza['cupos'].'</td>
            </tr>

           

            </table>
      
          </div>';

          $html .= '
            <div>
            <!--INFORMACION DE SUS INSTITUCIONES-->
            <p style="font-size: 1.5em; font-family: Arial;">INSTITUCIONES PERTENECIENTES A LA ALIANZA</p>
            <table>
            <tr>
             
            </tr>

            <tr>
              
            </tr>

            <tr>
              
            </tr>
            </table>
            </div>
          ';

          $html .= '
      <div>
    </div>';
$mpdf = new mPDF('c','A4');
#$css = file_get_contents('../css/estilos.css');
#$mpdf->writeHTML($css);
$mpdf->writeHTML($html,2);
$mpdf->Output('ReporteAlianza.pdf','I');
?>
