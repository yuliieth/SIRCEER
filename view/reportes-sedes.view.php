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
            <p style="font-size: 1.5em; font-family: Arial;">SEDES REGISTRADAS</p>
            <table>
            <tr>
            <td><strong>NOMBRE</strong></td>
            <td><strong>DANE</strong></td>
            <td><strong>CONSECUTIVO</strong></td>
            
            
          
            </tr>';
              foreach ($sedes as $sede) {
             $html .='<tr>
                
                <td>'. utf8_encode( $sede['nombre']).'</td>
                <td>'.$sede['codigo_dane_sede'].'</td>
                <td>'.$sede['consecutivo'].'</td>
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
