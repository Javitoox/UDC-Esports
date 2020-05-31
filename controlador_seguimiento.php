<?php

    require_once("gestionBD.php");
    require_once("gestionarUsuarios.php");
    
    session_start();
    $conexion = crearConexionBD();
    
	$dniUser = $_REQUEST['dnius'];
    $dniJugador = $_REQUEST['dniju'];
    if(!isset($_REQUEST['eliminar'])){ //Cuando se ha pulsado añadir
        creaSeguimiento($conexion,$dniUser,$dniJugador);
        Header("Location: jugadores.php");

    }else{  //Cuando se ha pulsado eliminar
        eliminarSeguimiento($conexion, $dniUser, $dniJugador);
        Header("Location: jugadores.php");
    }
    cerrarConexionBD($conexion);
	
?>
