<?php
    session_start();
    require_once("gestionBD.php");
    require_once("consultasSql.php");
	require_once("gestionMiembros.php");
	
    if(isset($_SESSION["formularioOj"])){
        $nuevoOjeador = $_SESSION["formularioOj"];
        //Eliminamos las variables que no vamos a necesitar por ahora
		unset($_SESSION['formularioOj']);
        unset($_SESSION['errores']);

    }else Header("Location:gestion.php");
    
    $conexion = crearConexionBD();

    //Sacamos las variables del nuevo ojeador que queremos insertar

    $nombreVideojuego = $nuevoOjeador['nombreVid'];
    $dniOjeador = $nuevoOjeador['dniOjeador'];
    $nombreOjeador = $nuevoOjeador['nombreOjeador'];
    $numTelefonoOj = $nuevoOjeador['numTelefonoOj'];
    $correoElectronicoOj = $nuevoOjeador['correoElectronicoOj'];
    $nacionalidadOj = $nuevoOjeador['nacionalidadOj'];
    $salarioOj = $nuevoOjeador['salarioOj'];
    $numExperienciaOj = $nuevoOjeador['numExperienciaOj'];

    $obtenOIDV = obtenOID_V($conexion, $nombreVideojuego);
    $oid_videojuego = $obtenOIDV['OID_V'];

    $insertaOjeador = insertaOjeador($conexion,$oid_videojuego, $dniOjeador, $nombreOjeador, $numTelefonoOj, $correoElectronicoOj, 
    $nacionalidadOj, $salarioOj, $numExperienciaOj);
    header("Location:gestion.php");

    cerrarConexionBD($conexion);
?>