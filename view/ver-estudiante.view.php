<?php 
#https://www.youtube.com/watch?v=RjtZVCm5fhc&t=202s
$html = '
<header>
      <div id="logo">
        <img src="../imagenes/gobernacion1.jpg">
      </div>
      <div style = "">
        <p style = "font-family: monospace; color: red;">Gobernacion de Risaralda</p>
        <div>Calle 22 # 11<br/> Pereira, Risaralda</div>
        <div>xxxxxxxxx</div>
        <div><a href="mailto:company@example.com">correo de la gobernacion</a></div>
      </div>
      <div id="project">
      <h1>Datos del estudiante</h1>
    </header>
    <main>
      <table style = width: 100%;
  border-collapse: collapse;
  border-spacing: 0;
  margin-bottom: 20px;>
        <thead>
          <tr>
            <th style = "font-family: monospace; color: red;">SERVICE</th>
            <th style = "font-family: monospace; color: red;">DESCRIPTION</th>
            <th style = "font-family: monospace; color: red;" >PRICE</th>
            <th style = "font-family: monospace; color: red;" >QTY</th>
            <th style = "font-family: monospace; color: red;" >TOTAL</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td style = text-align: center;>Design</td>
            <td style = text-align: center;>Creating a recognizable design solution based on the companys existing visual identity</td>
            <td class="unit">$40.00</td>
            <td class="qty">26</td>
            <td class="total">$1,040.00</td>
          </tr>
          <tr>
            <td class="service">Development</td>
            <td class="desc">Developing a Content Management System-based Website</td>
            <td class="unit">$40.00</td>
            <td class="qty">80</td>
            <td class="total">$3,200.00</td>
          </tr>
          <tr>
            <td class="service">SEO</td>
            <td class="desc">Optimize the site for search engines (SEO)</td>
            <td class="unit">$40.00</td>
            <td class="qty">20</td>
            <td class="total">$800.00</td>
          </tr>
          <tr>
            <td class="service">Training</td>
            <td class="desc">Initial training sessions for staff responsible for uploading web content</td>
            <td class="unit">$40.00</td>
            <td class="qty">4</td>
            <td class="total">$160.00</td>
          </tr>
          <tr>
            <td colspan="4">SUBTOTAL</td>
            <td class="total">$5,200.00</td>
          </tr>
          <tr>
            <td colspan="4">TAX 25%</td>
            <td class="total">$1,300.00</td>
          </tr>
          <tr>
            <td colspan="4" class="grand total">GRAND TOTAL</td>
            <td class="grand total">$6,500.00</td>
          </tr>
        </tbody>
      </table>
      <div id="notices">
        <div>NOTICE:</div>
        <div class="notice">A finance charge of 1.5% will be made on unpaid balances after 30 days.</div>
      </div>
    </main>';
$mpdf = new mPDF('c','A4');
#$css = file_get_contents('../css/estilos.css');
#$mpdf->writeHTML($css);
$mpdf->writeHTML($html,2);
$mpdf->Output('ReporteEstudiante','I');
?>
<?php #require("../view/reportes-estudiantes.view.php") ?>