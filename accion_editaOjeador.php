<?php
    session_start();
    require_once('gestionBD.php');
    require_once('gestionMiembros.php');
    require_once('gestionJugadores.php');

    $conexion = crearConexionBD();

    if(isset($_SESSION['formularioOj'])){
        $nuevoOjeador = $_SESSION['formularioOj'];
        //Eliminamos las variables que no vamos a necesitar por ahora
		unset($_SESSION['formularioOj']);
        unset($_SESSION['errores']);

    }else{
        Header("Location:gestion.php");
    } 
    $dniOjeador = $nuevoOjeador['dniOjeador'];
    $nuevoNombre = $nuevoOjeador['nombreOjeador'];
    $nuevoSalario = $nuevoOjeador['salarioOj'];
    $nuevoNumTelefono = $nuevoOjeador['numTelefonoOj'];
    $nuevoCorreoElectronico = $nuevoOjeador['correoElectronicoOj'];
    $nuevaNacionalidad = $nuevoOjeador['nacionalidadOj'];
    $nuevoNumExperiencia = $nuevoOjeador['numExperienciaOj'];
    
    $nuevosDatos = modificaOjeador($conexion,$dniOjeador,$nuevoNombre, $nuevoSalario, $nuevoNumTelefono, $nuevoCorreoElectronico, $nuevaNacionalidad,
    $nuevoNumExperiencia);

    header("Location: gestion.php");

    cerrarConexionBD($conexion);
?>