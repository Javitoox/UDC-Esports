<?php
    session_start();
    require_once("gestionBD.php");
    require_once("gestionJugadores.php");
	require_once("consultasSql.php");
	

    if(isset($_SESSION["formulario"])){
        $nuevoJugador = $_SESSION["formulario"];
        //Eliminamos las variables que no vamos a necesitar por ahora
		unset($_SESSION['formulario']);
        unset($_SESSION['errores']);

    }else Header("Location:gestion.php");

    $conexion = crearConexionBD();

    //Sacamos las variables del nuevo jugador que queremos insertar
    $nombreVideojuego = $nuevoJugador['nombreVid'];
    $dniJugador = $nuevoJugador['dniJugador'];
    $nombre = $nuevoJugador['nombre'];
    $nombreVirtual = $nuevoJugador['nombreVirtual'];
    $salario = $nuevoJugador['salario'];
    $numTelefono = $nuevoJugador['numTelefono'];
    $correoElectronico = $nuevoJugador['correoElectronico'];
    $nacionalidad = $nuevoJugador['nacionalidad'];
    $fechaEntrada = $nuevoJugador['fentrada'];
    $numRegalos = $nuevoJugador['numRegalos'];  //comprobar
    $numExperiencia = $nuevoJugador['numExperiencia'];
    $fechaEntradaParseada = date('d/m/Y', strtotime($fechaEntrada));
    
    $obtenOIDV = obtenOID_V($conexion, $nombreVideojuego);
    $oid_videojuego = $obtenOIDV['OID_V'];
    $insertaJugador = insertaJugador($conexion,$oid_videojuego, $dniJugador, $nombre, $nombreVirtual, $salario, $numTelefono, 
    $correoElectronico, $nacionalidad, $fechaEntradaParseada, $numRegalos, $numExperiencia);
    
    header("Location:gestion.php");

    cerrarConexionBD($conexion);
    
?>