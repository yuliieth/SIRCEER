<?php 
$html = '
<div style="margin-top:10px; width:100%;">
      <div style=" width:100%; background: white; margin-top: 12px; text-align:center; font-size: .1em;">
          <p style="font-size: 1.5em; font-family: Arial;">GOBERNACION DE RISARALDA</p>
      <div style="width:90;float:right;">
          <img style="80%;" src="../imagenes/gobernacion.png">
      </div>
      </div>




      <div style="background-color: white; width: 100%;">
            <p style="font-size: 1.5em; font-family: Arial;">Alianzas registradas a la fecha</p>
            <table>
            <tr>
            <td><strong>ID</strong></td>
            <td><strong>Nombre</strong></td>
            <td><strong>Fecha inicio</strong></td>
            <td><strong>Fecha final</strong></td>
            <td><strong>Cupos</strong></td>
            </tr>';
              foreach ($alianzas as $alianza) {
             $html .='<tr>
                <td>'.$alianza['id'].'</td>
                <td>'.$alianza['nombre'].'</td>
                <td>'.$alianza['fecha_inicio'].'</td>
                <td>'.$alianza['fecha_final'].'</td>
                <td>'.$alianza['cupos'].'</td>
                </tr>';
              }

         $html .='
            </table>
      
          </div>';

$mpdf = new mPDF('c','A4');
#$css = file_get_contents('../css/estilos.css');
#$mpdf->writeHTML($css);
$mpdf->writeHTML($html,2);
$mpdf->Output('ReporteAlianzas.pdf','I');
?>
