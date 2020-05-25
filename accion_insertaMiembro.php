<?php
    session_start();
    require_once("gestionBD.php");
    require_once("gestionMiembros.php");
    $conexion = crearConexionBD();

    //validaciones de los campos

    if(isset($_REQUEST["oidVJugador"])){
        $nombreVideojuego = $_REQUEST['nombreVid'];
        $dniJugador = $_REQUEST['dniJugador'];
        $nombre = $_REQUEST['nombre'];
        $nombreVirtual = $_REQUEST['nombreVirtual'];
        $salario = $_REQUEST['salario'];
        $numTelefono = $_REQUEST['numTelefono'];
        $correoElectronico = $_REQUEST['correoElectronico'];
        $nacionalidad = $_REQUEST['nacionalidad'];
        $fechaEntrada = $_REQUEST['fentrada'];
        $numRegalos = $_REQUEST['numRegalos'];
        $numExperiencia = $_REQUEST['numExperiencia'];

        $obtenOIDV = obtenOID_V($conexion, $nombreVideojuego);
        $oid_videojuego = $obtenOIDV['OID_V'];
        
        $insertaJugador = insertaJugador($conexion,$oid_videojuego, $dniJugador, $nombre, $nombreVirtual, $salario, $numTelefono, 
        $correoElectronico, $nacionalidad, $fechaEntrada, $numRegalos, $numExperiencia);
        header("Location:gestion.php");

    }else if(isset($_REQUEST["oidVEntrenador"])){
        $nombreVideojuego = $_REQUEST['nombreVid'];
        $dniEntrenador = $_REQUEST['dniEntrenador'];
        $nombre = $_REQUEST['nombreEntrenador'];
        $numTelefono = $_REQUEST['numTelefonoEnt'];
        $correo = $_REQUEST['correoElectronicoEnt'];
        $nacionalidad = $_REQUEST['nacionalidadEnt'];
        $salario = $_REQUEST['salarioEnt'];
        $numExperiencia = $_REQUEST['numExperienciaEnt'];

        $obtenOIDV = obtenOID_V($conexion, $nombreVideojuego);
        $oid_videojuego = $obtenOIDV['OID_V'];

        $insertaEntrenador = insertaEntrenador($conexion,$oid_videojuego, $dniEntrenador, $nombre, $numTelefono, $correo, 
        $nacionalidad, $salario, $numExperiencia);
        header("Location:gestion.php");

    }else if(isset($_REQUEST["oidVOjeador"])){
        $nombreVideojuego = $_REQUEST['nombreVid'];
        $dniOjeador = $_REQUEST['dniOjeador'];
        $nombre = $_REQUEST['nombreOjeador'];
        $numTelefono = $_REQUEST['numTelefonoOj'];
        $correo = $_REQUEST['correoElectronicoOj'];
        $nacionalidad = $_REQUEST['nacionalidadOj'];
        $salario = $_REQUEST['salarioOj'];
        $numExperiencia = $_REQUEST['numExperienciaOj'];

        $obtenOIDV = obtenOID_V($conexion, $nombreVideojuego);
        $oid_videojuego = $obtenOIDV['OID_V'];

        $insertaOjeador = insertaOjeador($conexion,$oid_videojuego, $dniOjeador, $nombre, $numTelefono, $correo, 
        $nacionalidad, $salario, $numExperiencia);
        header("Location:gestion.php");
         
    }else{
        header("Location:gestion.php");
    }
    cerrarConexionBD($conexion);
?>