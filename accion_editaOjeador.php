<?php
    require_once('gestionBD.php');
    require_once('gestionMiembros.php');
    require_once('gestionJugadores.php');

    $conexion = crearConexionBD();

    if(isset($_SESSION['formulario'])){
        $nuevoOjeador = $_SESSION['formulario'];
        //Eliminamos las variables que no vamos a necesitar por ahora
		unset($_SESSION['formulario']);
        unset($_SESSION['errores']);

    }else //Header("Location:gestion.php");
    
        $dniOjeador = $_REQUEST['dniOjeador'];
        $nuevoNombre = $_REQUEST['nombre'];
        $nuevoSalario = $_REQUEST['salario'];
        $nuevoNumTelefono = $_REQUEST['numTelefono'];
        $nuevoCorreoElectronico = $_REQUEST['correo'];
        $nuevaNacionalidad = $_REQUEST['nacionalidad'];
        $nuevoNumExperiencia = $_REQUEST['numExperiencia'];
        
        $nuevosDatos =  modificaOjeador($conexion,$dniOjeador,$nuevoNombre, $nuevoSalario, $nuevoNumTelefono, $nuevoCorreoElectronico, $nuevaNacionalidad,
        $nuevoNumExperiencia);

        //validaciones
        header("Location: gestion.php");

    
    cerrarConexionBD($conexion);
?>