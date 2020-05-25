<?php

    require_once("gestionBD.php");
    require_once("gestionarUsuarios.php");
    
    session_start();
    $conexion = crearConexionBD();
    
    //comprobar si es nulo el oid_seg

    if(isset($_REQUEST['oid_seg']) == null){ //Cuando se ha pulsado añadir
        $dniUser = $_REQUEST['dniuser'];
        $dniJugador = $_REQUEST['dnijugador'];
        $newSeguimiento = creaSeguimiento($conexion,$dniUser,$dniJugador);
        Header("Location: jugadores.php");

    }else{  //Cuando se ha pulsado eliminar
        $oid_seg = $_REQUEST['oid_seg'];
        $removeSeguimiento = eliminarSeguimiento($conexion, $oid_seg);
        Header("Location: jugadores.php");
    }
    cerrarConexionBD($conexion);

    //modificar el else. La opinión del seguimiento se debe mantener.
?>
