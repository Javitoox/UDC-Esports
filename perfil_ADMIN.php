<?php
    session_start();
    require_once("gestionBD.php");
    require_once("consultasSql.php");

    if(isset($_SESSION['login'])){
        $nickUsuario = $_SESSION['login'];
    }else{
        header("Location: login.php");
    }
?>

<!DOCTYPE html>
<html lang="es">
<head>
<title>Perfil_ADMIN</title>
    <?php include_once("headComun.php"); ?>
    <link rel="stylesheet" type="text/css" href="css/perfil_ADMIN.css">
    
</head>

<body>
    <?php include_once("fondo.php"); ?>
    <?php include_once("navegacion_ADMIN.php"); ?>
   
    <?php
    $conexion = crearConexionBD();
    if(isset($_POST['dnijugador'])){
        $dnijugador = $_REQUEST['dnijugador'];
        $obtenJug = obtenJugadorPorDni($conexion, $dnijugador);
        $nombre = $obtenJug["NOMBREJUGADOR"];
        $nombreVirtual = $obtenJug["NOMBREVIRTUALJUGADOR"];
        $salario = $obtenJug["SALARIOJUGADOR"];
        $numTelefono = $obtenJug["NUMTELEFONOJUGADOR"];
        $correoElectronico = $obtenJug["CORREOELECTRONICOJUGADOR"];
        $nacionalidad = $obtenJug["NACIONALIDADJUGADOR"];
        $fechaEntrada = $obtenJug["FECHAENTRADA"];
        $numRegalos = $obtenJug["NUMREGALOS"];
        $numExperiencia = $obtenJug["NUMAÑOSEXPERIENCIAJUGADOR"];

        $jugadores = obtenJugador($conexion);
        foreach($jugadores as $jugador){
            if($nombre = $jugador["NOMBREJUGADOR"]){
                ?>
                <!-- div para mostrar los errores -->
                <!-- action = validacion de datos -->
                <div class="col-10 col-tab-10">
                <form action="accion_editaMiembros.php" method="POST">
                    <center><p>Perfil del JUGADOR</p></center>
                    <!--un campo hidden que sea el dni-->
                    <input id="dniJugador" name="dniJugador" type="hidden" value="<?php echo $dnijugador;?>">
                    <div><label for="nombre">Nombre completo:<em></em></label>
                    <input id="nombre" placeholder="Nombre Completo" name="nombre" type="text" value="<?php echo $nombre;?>">
                    </div>
                    <div><label for="nombreVirtual">Nombre virtual:<em></em></label>
                    <input id="nombreVirtual" placeholder="Nombre Virtual" name="nombreVirtual" type="text" value="<?php echo $nombreVirtual;?>">
                    </div>
                    <div><label for="salario">Salario actual:<em></em></label>
                    <input id="salario" placeholder="Salario" name="salario" type="text" value="<?php echo $salario;?>">
                    </div>
                    <div><label for="numTelefono">Número de teléfono:<em></em></label>
                    <input id="numTelefono" placeholder="Numero de Teléfono" name="numTelefono" type="text" value="<?php echo $numTelefono;?>">
                    </div>
                    <div><label for="correoElectronico">Correo electrónico:<em></em></label>
                    <input id="correoElectronico" placeholder="Correo Electrónico" name="correoElectronico" type="text" value="<?php echo $correoElectronico;?>">
                    </div>
                    <div><label for="nacionalidad">Nacionalidad:<em></em></label>
                    <input id="nacionalidad" placeholder="Nacionalidad" name="nacionalidad" type="text" value="<?php echo $nacionalidad;?>">
                    </div>
                    <div><label for="fentrada">Fecha entrada:<em></em></label>
                    <input id="fentrada" placeholder="Fecha Entrada" name="fentrada" type="text" value="<?php echo $fechaEntrada;?>">
                    </div>
                    <div><label for="numExperiencia">Nº años de experiencia:<em></em></label>
                    <input id="numExperiencia" placeholder="Nº Años de Experiencia" name="numExperiencia" type="text" value="<?php echo $numExperiencia;?>">
                    </div>
                    <div><label for="numRegalos">Nº de regalos:<em></em></label>
                    <input id="numRegalos" placeholder="Nº de regalos" name="numRegalos" type="text" value="<?php echo $numRegalos;?>">
                    </div>
                    <center><input class="boton" id="boton" name="boton" type="submit" value="Modificar Datos" /></center><br/>
                </form>
                </div>

                <?php

            break;
            }
        }

    }else if(isset($_REQUEST['dnientrenador'])){
        $dniEntrenador = $_REQUEST['dnientrenador'];
        $obtenEntrenador = obtenEntrenadorPorDni($conexion, $dniEntrenador);
        $nombre = $obtenEntrenador["NOMBREENTRENADOR"];
        $salario = $obtenEntrenador["SALARIOENTRENADOR"];
        $numTelefono = $obtenEntrenador["NUMTELEFONOENTRENADOR"];
        $correoElectronico = $obtenEntrenador["CORREOELECTRONICOENTRENADOR"];
        $nacionalidad = $obtenEntrenador["NACIONALIDADENTRENADOR"];
        $numExperiencia = $obtenEntrenador["NUMAÑOSEXPERIENCIAENTRENADOR"];
        $oidV = $obtenEntrenador["OID_V"];

        $entrenadores = obtenEntrenadores($conexion);
        foreach($entrenadores as $entrenador){
            if($nombre = $entrenador["NOMBREENTRENADOR"]){
                ?>
                <div class="col-10 col-tab-10">
                <form action="accion_editaMiembros.php" method="POST">
                    <center><p>Perfil del ENTRENADOR</p></center>    
                    <!--un campo hidden que sea el dni y otro que sea el oid_v-->
                    <input id="dniEntrenador" name="dniEntrenador" type="hidden" value="<?php echo $dniEntrenador;?>">
                    <input id="oidV" name="oidV" type="hidden" value="<?php echo $oidV;?>">
                    <div><label for="nombre">Nombre Completo:<em></em></label>
                    <input id="nombre" placeholder="Nombre Completo" name="nombre" type="text" value="<?php echo $nombre;?>">
                    </div>
                    <div><label for="salario">Salario:<em></em></label>
                    <input id="salario" placeholder="Salario" name="salario" type="text" value="<?php echo $salario;?>">
                    </div>
                    <div><label for="numTelefono">Número de Teléfono:<em></em></label>
                    <input id="numTelefono" placeholder="Número de Teléfono" name="numTelefono" type="text" value="<?php echo $numTelefono;?>">
                    </div>
                    <div><label for="correo">Correo Electrónico:<em></em></label>
                    <input id="correo" placeholder="Correo Electrónico" name="correo" type="text" value="<?php echo $correoElectronico;?>">
                    </div>
                    <div><label for="nacionalidad">Nacionalidad:<em></em></label>
                    <input id="nacionalidad" placeholder="Nacionalidad" name="nacionalidad" type="text" value="<?php echo $nacionalidad;?>">
                    </div>
                    <div><label for="numExperiencia">Nº años de Experiencia:<em></em></label>
                    <input id="numExperiencia" placeholder="Nº de años de Experiencia" name="numExperiencia" type="text" value="<?php echo $numExperiencia;?>">
                    </div>
                    <center><input class="boton" id="boton" name="boton" type="submit" value="Modificar Datos" /></center><br/>
                </form>
                </div>
                <?php
            break;
            }
        }

    }else if(isset($_REQUEST['dniojeador'])){
        $dniOjeador = $_REQUEST['dniojeador'];
        $obtenOjeador = obtenOjeadorPorDni($conexion, $dniOjeador);
        $nombre = $obtenOjeador['NOMBREOJEADOR'];
        $salario = $obtenOjeador['SALARIOOJEADOR'];
        $numTelefono = $obtenOjeador['NUMTELEFONOOJEADOR'];
        $correoElectronico = $obtenOjeador['CORREOELECTRONICOOJEADOR'];
        $nacionalidad = $obtenOjeador['NACIONALIDADOJEADOR'];
        $numExperiencia = $obtenOjeador['NUMAÑOSEXPERIENCIAOJEADOR'];

        $ojeadores = obtenOjeadores($conexion);
        foreach($ojeadores as $ojeador){
            if($nombre = $ojeador['NOMBREOJEADOR']){
                ?>
                <div class="col-10 col-tab-10">
                <form action="accion_editaMiembros.php" method="POST">
                    <center><p>Perfil del OJEADOR</p></center>    
                    <!--un campo hidden que sea el dni y otro que sea el oid_v-->
                    <input id="dniOjeador" name="dniOjeador" type="hidden" value="<?php echo $dniOjeador;?>">
                    <div><label for="nombre">Nombre Completo:<em></em></label>
                    <input id="nombre" placeholder="Nombre Completo" name="nombre" type="text" value="<?php echo $nombre;?>">
                    </div>
                    <div><label for="salario">Salario:<em></em></label>
                    <input id="salario" placeholder="Salario" name="salario" type="text" value="<?php echo $salario;?>">
                    </div>
                    <div><label for="numTelefono">Número de Teléfono:<em></em></label>
                    <input id="numTelefono" placeholder="Número de Teléfono" name="numTelefono" type="text" value="<?php echo $numTelefono;?>">
                    </div>
                    <div><label for="correo">Correo Electrónico:<em></em></label>
                    <input id="correo" placeholder="Correo Electrónico" name="correo" type="text" value="<?php echo $correoElectronico;?>">
                    </div>
                    <div><label for="nacionalidad">Nacionalidad:<em></em></label>
                    <input id="nacionalidad" placeholder="Nacionalidad" name="nacionalidad" type="text" value="<?php echo $nacionalidad;?>">
                    </div>
                    <div><label for="numExperiencia">Nº años de Experiencia:<em></em></label>
                    <input id="numExperiencia" placeholder="Nº de años de Experiencia" name="numExperiencia" type="text" value="<?php echo $numExperiencia;?>">
                    </div>
                    <center><input class="boton" id="boton" name="boton" type="submit" value="Modificar Datos" /></center><br/>
                </form>
                </div>
                <?php
            break;
            }
        }
         
    }else{
        ?>
        <script> 
        alert("Debe seleccionar el miembro del club que desea modificar."); 
        window.location='gestion.php'; 
        </script>
        <?php   
    }
    cerrarConexionBD($conexion);
?>
</body>
</html>