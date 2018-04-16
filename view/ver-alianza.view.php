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
            <p style="font-size: 1.5em; font-family: Arial;">DATOS DE LA ALIANZA</p>
            <table>

            <tr>
              <td>ID</td>
              <td><strong>Nombre</strong></td>
              <td><strong>Fecha de inicio</strong></td>
              <td><strong>Fecha terminacion</strong></td>
              <td><strong>Numero de cupos</strong></td>
            </tr>
            <tr>
            <td>'.$alianza['id'].'</td>
            <td>'.$alianza['nombre'].'</td>
            <td>'.$alianza['fecha_inicio'].'</td>
            <td>'.$alianza['fecha_final'].'</td>
            <td>'.$alianza['cupos'].'</td>
            </tr>

            </table>
          </div>
    </div>';
$mpdf = new mPDF('c','A4');
#$css = file_get_contents('../css/estilos.css');
#$mpdf->writeHTML($css);
$mpdf->writeHTML($html,2);
$mpdf->Output('ReporteAlianza.pdf','I');
?>
