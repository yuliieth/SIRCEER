<?php 
$html = '
<header>
      <div id="logo">
        <img src="../imagenes/gobernacion1.jpg">
      </div>
      <h1><strong>GOBERNACION DE RISARALDA</strong></h1>
      <div style = "background: #fff;">
        <div >Secretaria de eduacion de Risaralda</div>
        <p style = "font-family: monospace; color: blue;">Lugar:</p>
        <div>Dirección: Calle 19 No 13-17-Código Postal 660004 - PEREIRA - RISARALDA - COLOMBIA NIT: 891.480.085-7</div>
        <div>telefono</div>
        <div><a href="mailto:company@example.com">company@example.com</a></div>
      </div>
      
    </header>
    <main>
      <table style = width: 100%;
  border-collapse: collapse;
  border-spacing: 0;
  margin-bottom: 20px;>

  <!--Encabezados-->
        <thead>
          <tr>
            <th style = "font-family: monospace; color: red;">Primer nombre</th>
            <th style = "font-family: monospace; color: red;">Segundo nombre</th>
            <th style = "font-family: monospace; color: red;" >Primer apellido</th>
            <th style = "font-family: monospace; color: red;" >Segundo apellido</th>
            <th style = "font-family: monospace; color: red;" >Email</th>
            <th style = "font-family: monospace; color: red;" >Fecha de nacimiento</th>
            <th style = "font-family: monospace; color: red;" >Edad</th>
            <th style = "font-family: monospace; color: red;" >Estrato</th>
            <th style = "font-family: monospace; color: red;" >Zona</th>
            <th style = "font-family: monospace; color: red;" >Desplazado</th>
          </tr>
        </thead>
        <tbody>';

        $html .= ' 
          <tr>
            <td style = text-align: center;>'.$estudiante['primer_nombre'].'</td>
            <td style = text-align: center;>'.$estudiante['segundo_nombre'].'</td>
            <td class="unit">'.$estudiante['primer_apellido'].'</td>
            <td class="qty">'.$estudiante['segundo_apellido'].'</td>
            <td class="qty">'.$estudiante['email'].'</td>
            <td class="qty">'.$estudiante['fecha_naci'].'</td>
            <td class="total">'.$estudiante['edad'].'</td>
            <td class="total">'.$estudiante['estrato'].'</td>
            <td class="total">'.$estudiante['zona'].'</td>
            <td class="total">'.$estudiante['desplazado'].'</td>
          </tr>';
          $html .= '
        </tbody>
      </table>
      <div id="notices">
      <br>
      <br>
      <br>
        <div>NOTICE:</div>
        <div class="notice">Escribir una leyenda</div>
      </div>
    </main>';
$mpdf = new mPDF('c','A4');
#$css = file_get_contents('../css/estilos.css');
#$mpdf->writeHTML($css);
$mpdf->writeHTML($html,2);
$mpdf->Output('ReporteEstudiante','I');
?>
<?php #require("../view/reportes-estudiantes.view.php") ?>