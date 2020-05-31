<?php
    session_start();
    require_once('gestionBD.php');
    require_once('gestionMiembros.php');
    require_once('gestionJugadores.php');

    if(isset($_SESSION["formulario"])){
        $nuevoJugador = $_SESSION["formulario"];
        //Eliminamos las variables que no vamos a necesitar por ahora
		unset($_SESSION["formulario"]);
        unset($_SESSION['errores']);
    }else{
        Header("Location:gestion.php");
    }    
    $conexion = crearConexionBD();

    $nuevoNombre = $nuevoJugador['nombre'];
    $nuevoNombreVirtual = $nuevoJugador['nombreVirtual'];
    $nuevoSalario = $nuevoJugador['salario'];
    $nuevoNumTelefono = $nuevoJugador['numTelefono'];
    $nuevoCorreoElectronico = $nuevoJugador['correoElectronico'];
    $nuevaNacionalidad = $nuevoJugador['nacionalidad'];
    $nuevaFechaEntrada = $nuevoJugador['fentrada'];
    
    $nuevoNumExperiencia = $nuevoJugador['numExperiencia'];
    $dniJugador = $nuevoJugador['dniJugador'];
    
    $nuevosDatos = modificaJugador($conexion, $dniJugador, $nuevoNombre, $nuevoNombreVirtual, $nuevoSalario, 
    $nuevoNumTelefono, $nuevoCorreoElectronico, $nuevaNacionalidad, $nuevaFechaEntrada, 
    $nuevoNumExperiencia);

    header("Location: gestion.php");

    cerrarConexionBD($conexion);
?>