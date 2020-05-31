<?php
    session_start();
    require_once('gestionBD.php');
    require_once('gestionMiembros.php');
    require_once('gestionJugadores.php');

    if(isset($_SESSION['formularioEnt'])){
        $nuevoEntrenador = $_SESSION['formularioEnt'];
        //Eliminamos las variables que no vamos a necesitar por ahora
		unset($_SESSION['formularioEnt']);
        unset($_SESSION['errores']);

    }else{
        Header("Location:gestion.php");
    } 
    $conexion = crearConexionBD();
    $dniEntrenador = $nuevoEntrenador['dniEntrenador'];
    $nuevoNombre = $nuevoEntrenador['nombreEntrenador'];
    $nuevoSalario = $nuevoEntrenador['salarioEnt'];
    $nuevoNumTelefono = $nuevoEntrenador['numTelefonoEnt'];
    $nuevoCorreoElectronico = $nuevoEntrenador['correoElectronicoEnt'];
    $nuevaNacionalidad = $nuevoEntrenador['nacionalidadEnt'];
    $nuevoNumExperiencia = $nuevoEntrenador['numExperienciaEnt'];

    $nuevosDatos = modificaEntrenador($conexion,$dniEntrenador,$nuevoNombre,$nuevoSalario,$nuevoNumTelefono,
    $nuevoCorreoElectronico,$nuevaNacionalidad,$nuevoNumExperiencia);

    header("Location: gestion.php");
    cerrarConexionBD($conexion);
?>