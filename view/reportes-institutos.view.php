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
            <p style="font-size: 1.5em; font-family: Arial;">Instituciones registradas a la fecha</p>
            <table>
            <tr>
            <td><strong>Id</strong></td>
            <td><strong>Nombre</strong></td>
            <td><strong>Telefono</strong></td>
            <td><strong>Email</strong></td>
            <td><strong>Direccion</strong></td>
          
            </tr>';
              foreach ($instituciones as $instituto) {
             $html .='<tr>
                <td>'.$instituto['id'].'</td>
                <td>'.$instituto['nombre'].'</td>
                <td>'.$instituto['telefono'].'</td>
                <td>'.$instituto['email'].'</td>
                <td>'.$instituto['direccion'].'</td>
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
