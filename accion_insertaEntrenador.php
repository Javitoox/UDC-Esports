<?php
    session_start();
    require_once("gestionBD.php");
    require_once("gestionMiembros.php");
    require_once("consultasSql.php");

    if(isset($_SESSION["formularioEnt"])){
        $nuevoEntrenador = $_SESSION["formularioEnt"];
        //Eliminamos las variables que no vamos a necesitar por ahora
		unset($_SESSION['formularioEnt']);
        unset($_SESSION['errores']);
    }else{ 
        Header("Location:gestion.php");
    }
    $conexion = crearConexionBD();

    //Sacamos las variables del nuevo entrenador que queremos insertar

    $nombreVideojuego = $nuevoEntrenador['nombreVid'];
    $dniEntrenador = $nuevoEntrenador['dniEntrenador'];
    $nombre = $nuevoEntrenador['nombreEntrenador'];
    $numTelefono = $nuevoEntrenador['numTelefonoEnt'];
    $correo = $nuevoEntrenador['correoElectronicoEnt'];
    $nacionalidad = $nuevoEntrenador['nacionalidadEnt'];
    $salario = $nuevoEntrenador['salarioEnt'];
    $numExperiencia = $nuevoEntrenador['numExperienciaEnt'];

    $obtenOIDV = obtenOID_V($conexion, $nombreVideojuego);
    $oid_videojuego = $obtenOIDV['OID_V'];
    
    $insertaEntrenador = insertaEntrenador($conexion,$oid_videojuego, $dniEntrenador, $nombre, $numTelefono, $correo, 
    $nacionalidad, $salario, $numExperiencia);
    header("Location:gestion.php");
   
    cerrarConexionBD($conexion);
?>