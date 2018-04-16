<?php 
$html = '

<div style="margin-top:10px; width:100%;">
      <div style=" width:100%; background: white; margin-top: 12px; text-align:center; font-size: .1em;">
          <p style="font-size: 1.5em; font-family: Arial;">GOBERNACIÓN DE RISARALDA</p>
      <div style="width:90;float:right;">
          <img style="80%;" src="../imagenes/gobernacion.png">
      </div>

      </div>




      <div style="background-color: white; width: 100%;">
            <p style="font-size: 1.5em; font-family: Arial;">DATOS DE UNIVERSIDAD</p>
            <table>

            <tr>
              <td>ID</td>
              <td><strong>NOMBRE</strong></td>
              <td><strong>TELEFONO</strong></td>
              <td><strong>EMAIL</strong></td>
              <td><strong>DIRECCIÓN</strong></td>
            </tr>
            <tr>
            <td>'.$universidad['id'].'</td>
            <td>'.$universidad['nombre'].'</td>
            <td>'.$universidad['telefono'].'</td>
            <td>'.$universidad['email'].'</td>
            <td>'.$universidad['direccion'].'</td>
            </tr>

            </table>
  </div>    
</div>';

$mpdf = new mPDF('c','A4');
#$css = file_get_contents('../css/estilos.css');
#$mpdf->writeHTML($css);
$mpdf->writeHTML($html,2);
$mpdf->Output('ReporteUniversidad.pdf','I');
?>
