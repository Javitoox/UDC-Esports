<?php
    session_start();
    require_once("gestionBD.php");
    require_once("gestionMiembros.php");
    $conexion = crearConexionBD();

    //validaciones de los campos

    if(isset($_REQUEST["oidV"])){
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
    }else{
        header("Location:gestion.php");
    }
    cerrarConexionBD($conexion);
?>