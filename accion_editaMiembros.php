<?php
    require_once('gestionBD.php');
    require_once('gestionMiembros.php');

    $conexion = crearConexionBD();

    //Podríamos poner que si se intenta modificar el num de regalos que no te deje porque es un trigger que 
    //salta al superar los 40 partidos ganados (usaríamos también la función de contar el número de partidos que
    //lleva y tal).

     //validaciones de los nuevos datos insertados.
            //si es correcto que salga el mensaje en gestión.
            //si es incorrecto que salga el mensaje en el perfil.
            
    //modificar a un jugador
    if(isset($_REQUEST['dniJugador'])){
        //datos antiguos
        $dniJugador = $_REQUEST['dniJugador'];
        $datosAntiguos = obtenJugadorPorDni($conexion, $dniJugador);
        $nombre = $datosAntiguos['NOMBREJUGADOR'];
        $nombreVirtual = $datosAntiguos['NOMBREVIRTUALJUGADOR'];
        $salario = $datosAntiguos['SALARIOJUGADOR'];
        $numTelefono = $datosAntiguos['NUMTELEFONOJUGADOR'];
        $correoElectronico =$datosAntiguos['CORREOELECTRONICOJUGADOR'];
        $nacionalidad = $datosAntiguos['NACIONALIDADJUGADOR'];
        $fechaEntrada = $datosAntiguos['FECHAENTRADA'];
        $numRegalos = $datosAntiguos['NUMREGALOS'];
        $numExperiencia = $datosAntiguos['NUMAÑOSEXPERIENCIAJUGADOR'];
        
        //nuevos datos
        $nuevoNombre = $_REQUEST['nombre'];
        $nuevoNombreVirtual = $_REQUEST['nombreVirtual'];
        $nuevoSalario = $_REQUEST['salario'];
        $nuevoNumTelefono = $_REQUEST['numTelefono'];
        $nuevoCorreoElectronico = $_REQUEST['correoElectronico'];
        $nuevaNacionalidad = $_REQUEST['nacionalidad'];
        $nuevaFechaEntrada = $_REQUEST['fentrada'];
        $nuevoNumRegalos = $_REQUEST['numRegalos'];
        $nuevoNumExperiencia = $_REQUEST['numExperiencia'];

        //comprobamos si hay alguno distinto.
        //if($nombre != $nuevoNombre){
            $nuevosDatos = modificaJugador($conexion, $dniJugador, $nuevoNombre, $nuevoNombreVirtual, $nuevoSalario, 
            $nuevoNumTelefono, $nuevoCorreoElectronico, $nuevaNacionalidad, $nuevaFechaEntrada, $nuevoNumRegalos, 
            $nuevoNumExperiencia);
        //}else{
            ?>
            <form method="post" action="perfil_ADMIN.php" >
            <input id="dnijugador" name="dnijugador" type="hidden" value="<?php echo $dniJugador;?>">
            </form>
            <?php
            header("Location: perfil_ADMIN.php");
        //}

        //validaciones
        //header("Location: gestion.php");

    //modificar un entrenador
    }else if(isset($_REQUEST['dniEntrenador'])){
        $dniEntrenador = $_REQUEST['dniEntrenador'];
        $nuevoNombre = $_REQUEST['nombre'];
        $nuevoSalario = $_REQUEST['salario'];
        $nuevoNumTelefono = $_REQUEST['numTelefono'];
        $nuevoCorreoElectronico = $_REQUEST['correo'];
        $nuevaNacionalidad = $_REQUEST['nacionalidad'];
        $nuevoNumExperiencia = $_REQUEST['numExperiencia'];
        $oidV = $_REQUEST['oidV'];

        $nuevosDatos = modificaEntrenador($conexion,$dniEntrenador,$nuevoNombre,$nuevoSalario,$nuevoNumTelefono,
        $nuevoCorreoElectronico,$nuevaNacionalidad,$nuevoNumExperiencia, $oidV);

        //validaciones
        header("Location: gestion.php");

    }else if(isset($_REQUEST['dniOjeador'])){
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

    }else{
        ?>
        <form method="post" action="perfil_ADMIN.php" >
        <input id="dnijugador" name="dnijugador" type="hidden" value="<?php echo $dniJugador;?>">
        </form>
        <?php
        header("Location: gestion.php");
    }
    cerrarConexionBD($conexion);
?>