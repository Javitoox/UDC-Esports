<?php

    require_once("gestionBD.php");
    require_once("gestionarUsuarios.php");
    
    session_start();
    $conexion = crearConexionBD();

    if(isset($_REQUEST['comenta']) != null ){ //Ha comentado
        $opinion = $_REQUEST['comenta'];
        $dniUsuario = $_REQUEST['dniusuario'];
        $dniJugador = $_REQUEST['dnijugador'];
        $creaOpinion = añadeOpinion($conexion, $dniUsuario, $dniJugador, $opinion);
        Header("Location: misSeguimientos.php");
    }
    cerrarConexionBD($conexion);

    
?>
