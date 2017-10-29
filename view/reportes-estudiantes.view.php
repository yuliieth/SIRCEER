<?php require("cabecera-admin.php") ?>
<?php require("header-menu.view.php") ?>      
<!--CONTENIDO-->

  <div class="wraper">
    <div class="encabezado">
      <h1>Reportes de estudiantes</h1>
    </div>
    <div class="wraper-contenido">
      <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST">


        <label for="Edad">Edad:</label>
        <input type="number" name="edad" min="0" max="25" >

        <label for="zona">Zona:</label>
        <select name="zona" id="zona">
          <option value="0">No aplica</option>
          <option value="Urbana">Urbana</option>
          <option value="Rural">Rural</option>
        </select>

        <label for="afro">Afro:</label>
        <select name="afro" id="afro">
          <option value="0">No aplica</option>
          <option value="si">Si</option>
        </select>

        <label for="estrato">Estrato:</label>
        <select name="estrato" id="estrato">
          <option value="0">No aplica</option>
          <option value="1">1</option>
          <option value="2">2</option>
          <option value="3">3</option>
          <option value="4">4</option>
          <option value="5">5</option>
        </select>
        <br>
        

        <label for="desplazado">Desplazado:</label>
        <select name="desplazado" id="desplazado">
          <option value="0">No aplica</option>
          <option value="si">Si</option>
        </select>


        <label for="ojos">Ojos:</label>
        <select name="ojos" id="estrato">
          <option value="0">No aplica</option>
          <option value="Negros">Negros</option>
          <option value="Cafes">Cafes</option>
          <option value="Verdes">Verdes</option>
          <option value="Azules">Azules</option>
        </select>


        <label for="victima_conflicto">Victima del conflicto:</label>
        <select name="victima_conflicto" id="estrato">
          <option value="0">No aplica</option>
          <option value="Si">Si</option>
        </select>

        <input type="submit" name="generar" value="Generar">
      </form>
    </div>
  </div>
              
  <!--END CONTENIDO-->
<?php require("footer-menu.view.php") ?>          
<?php require("piedepagina-admin.php") ?>
<?php
/*
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
*/
?>