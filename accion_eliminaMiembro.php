<?php
    //Se llega a esta vista cuando se ha pulsado el botón de eliminar
    require_once("gestionBD.php");
    require_once("gestionMiembros.php");

    session_start();
    $conexion = crearConexionBD();

    //elimina jugador
    if(isset($_REQUEST['dnijugador'])){  
        $dniJugador = $_REQUEST['dnijugador'];
        $eliminaJugador =  eliminaJugador($conexion, $dniJugador);
        header("Location:gestion.php");
           
    //elimina entrenador
    }else if(isset($_REQUEST['dnientrenador'])){
        $dniEntrenador = $_REQUEST['dnientrenador'];
        $eliminaEntrenador = eliminaEntrenador($conexion, $dniEntrenador);
        header("Location:gestion.php");
        
    //elimina ojeador
    }else if(isset($_REQUEST['dniojeador'])){
        $dniOjeador = $_REQUEST['dniojeador'];
        $eliminaOjeador = eliminaOjeador($conexion, $dniOjeador);
        header("Location:gestion.php");
       
    }else{
        header("Location:gestion.php");
    }
    cerrarConexionBD($conexion);

?>