<?php
    require_once('gestionBD.php');
    require_once('gestionMiembros.php');
    require_once('gestionJugadores.php');

    if(isset($_SESSION['formulario'])){
        $nuevoEntrenador = $_SESSION['formulario'];
        //Eliminamos las variables que no vamos a necesitar por ahora
		unset($_SESSION['formulario']);
        unset($_SESSION['errores']);

    }else //Header("Location:gestion.php");

    $conexion = crearConexionBD();
    $dniEntrenador = $nuevoEntrenador['dniEntrenador'];
    $nuevoNombre = $nuevoEntrenador['nombre'];
    $nuevoSalario = $nuevoEntrenador['salario'];
    $nuevoNumTelefono = $nuevoEntrenador['numTelefono'];
    $nuevoCorreoElectronico = $nuevoEntrenador['correo'];
    $nuevaNacionalidad = $nuevoEntrenador['nacionalidad'];
    $nuevoNumExperiencia = $nuevoEntrenador['numExperiencia'];
    $oidV = $nuevoEntrenador['oidV'];

    $nuevosDatos = modificaEntrenador($conexion,$dniEntrenador,$nuevoNombre,$nuevoSalario,$nuevoNumTelefono,
    $nuevoCorreoElectronico,$nuevaNacionalidad,$nuevoNumExperiencia, $oidV);

    //validaciones
    header("Location: gestion.php");
    cerrarConexionBD($conexion);
?>