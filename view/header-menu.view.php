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
                <a href="../gestion/new_estudiante.php">Nuevo</a>
                </li>
                                <li>
                <i class="fa fa-search-plus fa-2x" aria-hidden="true"></i>
                <a href="../gestion/buscar_estudiantes.php">Buscar</a>
                </li>
                                <li>
                <i class="fa fa-flag-checkered fa-2x" aria-hidden="true"></i>
                <a href="../gestion/reportes-estudiantes.php">Reportes</a>
                </li>
                                <li>
                <i class="fa fa-pie-chart fa-2x" aria-hidden="true"></i>
                <a href="../gestion/estadisticas-estudiantes.php">Estadisticas</a>
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
                <a href="../gestion/new-institucion.php">Nuevo</a>
                </li>
                                <li>
                <i class="fa fa-search-plus fa-2x" aria-hidden="true"></i>
                <a href="../gestion/buscar-institucion.php">Buscar</a>
                </li>
                                <li>
                <i class="fa fa-flag-checkered fa-2x" aria-hidden="true"></i>
                <a href="../gestion/reportes-institucion.php">Reportes</a>
                </li>
                                <li>
                <i class="fa fa-pie-chart fa-2x" aria-hidden="true"></i>
                <a href="../gestion/estadisticas-institucion.php">Estadisticas</a>
                </li>
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
                <a href="../gestion/new-programa.php">Nuevo</a>
                </li>
                                <li>
                <i class="fa fa-search-plus fa-2x" aria-hidden="true"></i>
                <a href="../gestion/buscar-programa.php">Buscar</a>
                </li>
                                <li>
                <i class="fa fa-flag-checkered fa-2x" aria-hidden="true"></i>
                <a href="../gestion/reportes-programa.php">Reportes</a>
                </li>
                                <li>
                <i class="fa fa-pie-chart fa-2x" aria-hidden="true"></i>
                <a href="../gestion/estadisticas-programa.php">Estadisticas</a>
                </li>
                        </ul>
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