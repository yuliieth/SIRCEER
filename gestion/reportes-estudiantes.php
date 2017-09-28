<?php session_start(); ?>
<?php  
require_once '../admin/config.php';
require_once '../php/funciones.php';
require_once '../php/Conexion.php';
require_once '../mpdf60/mpdf.php';
validateSession();
$cn = getConexion($bd_config);
comprobarConexion($cn);
$estudiantes = getAllSubject("estudiante",$cn);
#var_dump($estudiantes);
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
            <th style = "font-family: monospace; color: red;" >Edad</th>
          </tr>
        </thead>
        <tbody>';

        foreach ($estudiantes as $value) {
        $html .= ' 
          <tr>
            <td style = text-align: center;>'.$value['primer_nombre'].'</td>
            <td style = text-align: center;>'.$value['segundo_nombre'].'</td>
            <td class="unit">'.$value['primer_apellido'].'</td>
            <td class="qty">'.$value['segundo_apellido'].'</td>
            <td class="total">'.$value['edad'].'</td>
          </tr>';
              }
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
$mpdf->writeHTML($html);
$mpdf->Output('ReporteEstudiante','I');
?>
<?php #require("../view/reportes-estudiantes.view.php") ?>