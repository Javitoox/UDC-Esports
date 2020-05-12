<?php

    require_once("gestionBD.php");
    require_once("gestionarUsuarios.php");
    
    session_start();
    $conexion = crearConexionBD();
    
    //comprobar si es nulo el oid_seg

    if(isset($_REQUEST['oid_seg']) == null ){ //Cuando se ha pulsado añadir
        //Pasarle un array de un solo elemento (el dni de un jugador)
        $dniUser = $_REQUEST['dniuser'];
        $dniJugador = $_REQUEST['dnijugador'];
        $newSeguimiento = creaSeguimiento($conexion,$dniUser,$dniJugador);
        header("Location: jugadores.php");

    }else{  //Cuando se ha pulsado eliminar 
        $oid_seg = $_REQUEST['oid_seg'];
        $removeSeguimiento = eliminarSeguimiento($conexion, $oid_seg);
        Header("Location: jugadores.php");
    }
    cerrarConexionBD($conexion);
?>