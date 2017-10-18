<?php 
$html = '
<div style="margin-top:10px; width:100%;">
      <div style=" width:100%; background: white; margin-top: 12px; text-align:center; font-size: .1em;">
          <h2>GOBERNACION DE RISARALDA</h2>
      <div style="width:90;float:right;">
          <img style="80%;" src="../imagenes/gobernacion1.jpg">
      </div>
      </div>




      <div style="background-color: white; width: 100%;">
            <label><strong>Primer nombre</strong></label>&nbsp;&nbsp;
            <label>'.$estudiante['primer_nombre'].'<label>
            <label><strong>Segundo nombre</strong><label>&nbsp;&nbsp;
            <label>'.$estudiante['segundo_nombre'].'<label><br>
            <label><strong>Primer apellido</strong><label>&nbsp;&nbsp;
            <label>'.$estudiante['primer_apellido'].'<label>
            <label><strong>Segundo apellido</strong><label>&nbsp;&nbsp;
            <label>'.$estudiante['segundo_apellido'].'<label><br>
            <label><strong>Email</strong><label>&nbsp;&nbsp;
            <label>'.$estudiante['email'].'<label>
            <label><strong>Fecha de nacimiento</strong><label>&nbsp;&nbsp;
            <label>'.$estudiante['fecha_naci'].'<label><br>
            <label><strong>Edad</strong>&nbsp;&nbsp;
            <label>'.$estudiante['edad'].'<label>
            <label><strong>Estrato</strong>&nbsp;&nbsp;
            <label>'.$estudiante['estrato'].'<label>
            <label><strong>Zona</strong><label>&nbsp;&nbsp;
            <label>'.$estudiante['zona'].'<label>
            <label><strong>Desplazado</strong><label>&nbsp;&nbsp;
            <label>'.$estudiante['desplazado'].'<label>
          </div>';
          $html .= '
      <div id="notices">
    </div>';
$mpdf = new mPDF('c','A4');
#$css = file_get_contents('../css/estilos.css');
#$mpdf->writeHTML($css);
$mpdf->writeHTML($html,2);
$mpdf->Output('ReporteEstudiante','I');
?>
<?php #require("../view/reportes-estudiantes.view.php") ?>