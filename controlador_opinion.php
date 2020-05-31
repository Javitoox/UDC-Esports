<?php

    require_once("gestionBD.php");
    require_once("gestionarUsuarios.php");
    
    session_start();
    $conexion = crearConexionBD();

    if(isset($_REQUEST['comenta']) != null ){ //Ha comentado
        $errores=array();
    
            $opinion = $_REQUEST['comenta'];
            $dniUsuario = $_REQUEST['dniusuario'];
            $dniJugador = $_REQUEST['dnijugador'];
            if(!preg_match("/^[^$%&|<>#()¬·{}~;ºª]*$/",  $opinion)){
                $errores[] = "<p><strong>La opinion no debe contener caracteres especiales: " . $opinion. ".</strong></p>";
                $_SESSION["errores"] = $errores;
                Header("Location: misSeguimientos.php");
            }else{
                ayadeOpinion($conexion, $dniUsuario, $dniJugador, $opinion);
                Header("Location: misSeguimientos.php");
            }
        }
        cerrarConexionBD($conexion);
    
    
?>


