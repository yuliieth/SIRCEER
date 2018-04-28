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
      <!--INFORMACION PERSONAL-->
            <p style="font-size: 1.5em; font-family: Arial;">Relación de estudiantes  </p>
         <table>

            <tr>
              <td><strong>Id</strong></td>
              <td><strong>Documento</strong></td>
              <td><strong>Primer nombre</strong></td>
              <td><strong>Segundo nombre</strong></td>
              <td><strong>Primer apellido</strong></td>
              <td><strong>Segundo apellido</strong></td>
              <td><strong>Sede</strong></td>
            </tr>"';
      
          foreach ($estudiantes_sedes as $value) {
              $html .= '
              <tr>
                <td>'. utf8_encode( $value['id_estudiante'] ).'</td>
                <td>'. utf8_encode( $value['documento'] ).'</td>
                <td>'. utf8_encode( $value['primer_nombre'] ).'</td>
                <td>'. utf8_encode( $value['segundo_nombre'] ).'</td>
                <td>'. utf8_encode( $value['primer_apellido'] ).'</td>
                <td>'. utf8_encode( $value['segundo_apellido'] ).'</td>
                <td>'. utf8_encode( $value['sede'] ).'</td>
            </tr>
              ';            
          }
          $html .='
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
$mpdf->Output('ReporteEstudiantes','I');
?>
<?php #require("../view/reportes-estudiantes.view.php") ?>