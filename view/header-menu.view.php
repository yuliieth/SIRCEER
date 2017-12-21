<?php 
                if (isset($_GET['select'])) {
                        switch ($_GET['select']) {
                                case 'e':
                                        ?>
        <table id="estructura">
        <tr>
                <td id="menu">&nbsp;
                        <ul>
                                <li>

                <i class="fa fa-plus fa-2x" aria-hidden="true"></i>
                <a href="../gestion/new-estudiante.php?select=e">Nuevo</a>
                </li>
                                <li>
                <i class="fa fa-search-plus fa-2x" aria-hidden="true"></i>
                <a href="../gestion/buscar-estudiantes.php?select=e">Buscar</a>
                </li>
                                <li>
                <i class="fa fa-flag-checkered fa-2x" aria-hidden="true"></i>
                <a href="../gestion/reportes-estudiantes.php?select=e">Reportes</a>
                </li>
                                <li>
                <i class="fa fa-pie-chart fa-2x" aria-hidden="true"></i>
                <a href="../gestion/importar-estudiantes.php?select=e">Importar</a>
                                </li>
                
                        </ul>
                </td>
                <td id="pagina">
                <?php  
                break;

            case 'i':
                ?>

        <table id="estructura">
        <tr>
                <td id="menu">&nbsp;
                        <ul>
                                <li>
                <i class="fa fa-plus fa-2x" aria-hidden="true"></i>
                <a href="../gestion/new-institucion.php?select=i">Nuevo</a>
                </li>
                                <li>
                <i class="fa fa-search-plus fa-2x" aria-hidden="true"></i>
                <a href="../gestion/buscar-institucion.php?select=i">Buscar</a>
                </li>
                                <li>
                <i class="fa fa-flag-checkered fa-2x" aria-hidden="true"></i>
                <a href="../gestion/reportes-institutos.php?select=i">Reportes</a>
                </li>
                               <!-- <li>
                <i class="fa fa-pie-chart fa-2x" aria-hidden="true"></i>
                <a href="../gestion/estadisticas-institutos.php?select=i">Estadisticas</a>
                </li>
-->
                                <!--<li>
                <i class="fa fa-search-plus fa-2x" aria-hidden="true"></i>
                <a href="../gestion/simat-institutos.php?select=i">Consultar SIMAT</a>
                </li>-->
                        </ul>
                </td>
                <td id="pagina">

<?php  

                                        break;

                                case 'p':
                                        
?>

<table id="estructura">
        <tr>
                <td id="menu">&nbsp;
                        <ul>
                                <li>
                <i class="fa fa-plus fa-2x" aria-hidden="true"></i>
                <a href="../gestion/new-programa.php?select=p">Nuevo</a>
                </li>
                                <li>
                <i class="fa fa-search-plus fa-2x" aria-hidden="true"></i>
                <a href="../gestion/buscar-programa.php?select=p">Buscar</a>
                </li>
                                <li>
                <i class="fa fa-flag-checkered fa-2x" aria-hidden="true"></i>
                <a href="../gestion/reportes-programas.php?select=p">Reportes</a>
                </li>
                                <!--<li>
                <i class="fa fa-pie-chart fa-2x" aria-hidden="true"></i>
                <a href="../gestion/estadisticas-programas.php?select=p">Estadisticas</a>
                </li>
-->                                <!--<li>
                <i class="fa fa-search-plus fa-2x" aria-hidden="true"></i>
                <a href="../gestion/simat-programas.php?select=p">Consultar SIMAT</a>
                </li>-->
                        </ul>
                </td>
                <td id="pagina">


<?php
                                        break;


        case 'a':
                                        
?>

<table id="estructura">
        <tr>
                <td id="menu">&nbsp;
                        <ul>
                                <li>
                <i class="fa fa-plus fa-2x" aria-hidden="true"></i>
                <a href="../gestion/new-alianza.php?select=a">Nuevo</a>
                </li>
                                <li>
                <i class="fa fa-search-plus fa-2x" aria-hidden="true"></i>
                <a href="../gestion/buscar-alianza.php?select=a">Buscar</a>
                </li>
                                <li>
                <i class="fa fa-flag-checkered fa-2x" aria-hidden="true"></i>
                <a href="../gestion/reportes-alianzas.php?select=a">Reportes</a>
                </li>
                                <!--<li>
                <i class="fa fa-pie-chart fa-2x" aria-hidden="true"></i>
                <a href="../gestion/estadisticas-alianzas.php?select=a">Estadisticas</a>
                </li>
-->                        </ul>
                </td>
                <td id="pagina">


<?php
                                        break;
                                
                                default:
                                        echo "Error de menu";
                                        break;
                        }
                }
 ?>