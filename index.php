<?php session_start();
    require_once 'php/Conexion.php';
    require_once 'php/funciones.php';
    require_once 'admin/config.php';
    


    /*Comprobamos methodo de envio*/
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $usuario = strtolower( $_POST['usuario']);
    $pass = $_POST['pass'];
    $conexion = getConexion($bd_config);
    #var_dump($conexion);
    if (!$conexion) {
        echo "Error en conexion";
        #header("Location:login.php");
    }


        #Buscamos coincidencia en la base de datos
        $result = shearcUserLogin($usuario,$pass,$conexion);
       # var_dump($result);

        #Sy hay coincidencia se guardan datos y se verfica perfil
        if ($result != false) {
            $_SESSION['usuario']['user'] = $usuario;

            #Buscamos el nombre del perfil que tiene el usuario
            $perfil = shearcPerfilUser($result['id'],$conexion);
            #var_dump($perfil);
            $_SESSION['usuario']['perfil'] = $perfil;
            #var_dump($_SESSION);
            if ($_SESSION['usuario']['perfil'] == "ADMINISTRADOR") {?>
            <script type="text/javascript"> 
                window.location="<?php echo URL ?>admin/principal-admin.php"; 
            </script> 
            <?php //lo abro de nuevo
            }elseif (($_SESSION['usuario']['perfil'] == "REGULAR")) {?>
            <script type="text/javascript"> 
                window.location= "<?php echo URL ?>gestion/principal-gestion.php"; 
            </script> 
            <?php //lo abro de nuevo
                
            }else {
                ?>
            <script type="text/javascript"> 
                window.location= "<?php echo URL ?>gestion/errorOut.php"; 
            </script> 
            <?php //lo abro de nuevo
            }
            
        }else{
            ?>
            <script type="text/javascript"> 
                window.location= "<?php echo URL ?>gestion/errorOut.php"; 
            </script> 
            <?php //lo abro de nuevo
        }
        
    }//End POST

 ?>
<?php require("view/login.view.php") ?>