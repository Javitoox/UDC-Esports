<?php
    session_start();
    require_once("gestionBD.php");
    require_once("gestionMiembros.php");
    require_once("gestionJugadores.php");
    require_once("consultasSql.php");

    if(isset($_SESSION['login']) && isset($_SESSION['ADMIN'])){
        $nickUsuario = $_SESSION['login'];
    }else{
        header("Location: login.php");
    }
    if (!isset($_SESSION['formulario'])) {
		$formulario['dniJugador'] = "";
		$formulario['nombre'] = "";
		$formulario['nombreVirtual'] = "";
		$formulario['numTelefono'] = "";
		$formulario['correoElectronico'] = "";
		$formulario['nacionalidad'] = "";
		$formulario['fentrada'] = "";
		$formulario['salario'] = "";
        $formulario['numExperiencia'] = "";
        $formulario['nombreVid'] = "";
		$_SESSION['formulario'] = $formulario;
	}else{
		$formulario = $_SESSION['formulario'];
    }
    if(!isset($_SESSION['formularioEnt'])){
        $formularioEnt['dniEntrenador'] = "";
		$formularioEnt['nombreEntrenador'] = "";
		$formularioEnt['numTelefonoEnt'] = "";
		$formularioEnt['correoElectronicoEnt'] = "";
		$formularioEnt['nacionalidadEnt'] = "";
		$formularioEnt['salarioEnt'] = "";
        $formularioEnt['numExperienciaEnt'] = "";
        $formularioEnt['nombreVid'] = "";
        $_SESSION['formularioEnt'] = $formularioEnt;
    }else{
        $formularioEnt = $_SESSION['formularioEnt'];
    }
    if(!isset($_SESSION['formularioOj'])){
        $formularioOj['dniOjeador'] = "";
		$formularioOj['nombreOjeador'] = "";
		$formularioOj['numTelefonoOj'] = "";
		$formularioOj['correoElectronicoOj'] = "";
		$formularioOj['nacionalidadOj'] = "";
        $formularioOj['salarioOj'] = "";
        $formularioOj['numExperienciaOj'] = "";
        $formularioOj['nombreVid'] = "";
        $_SESSION['formularioOj'] = $formularioOj;
    }else{
        $formularioOj = $_SESSION['formularioOj'];
    }

    //Comprobamos si han llegado errores de validación		
	if (isset($_SESSION['errores'])){
		$errores = $_SESSION['errores'];
		unset($_SESSION["errores"]);
    }
?>

<!DOCTYPE html>
<html lang="es">
<head>
<title>Perfil_ADMIN</title>
    <?php include_once("headComun.php"); ?>
    <link rel="stylesheet" type="text/css" href="css/perfil_ADMIN.css">
    <script src="https://code.jquery.com/jquery-3.1.1.min.js" type="text/javascript"></script>
    <script type="text/javascript" src="js/gestion.js"></script>
</head>

<body>
    <?php 
    if(isset($_SESSION['ADMIN'])){
    	include_once("navegacion_ADMIN.php"); 
    }else{
    	include_once("navegacion.php");
    }
    ?>

    <div id="div_errores" class="error">
		<?php
		if (isset($errores) && count($errores)>0) {
			//Mostramos los errores en el caso de que los haya 
    		foreach($errores as $error) echo $error; 
  		}
	    ?>
	</div>
    
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
        $oidV = $obtenJug["OID_V"];
        $nombreVideojuego = obtenVideojuegoPorOID($conexion,$oidV);
        
        $jugadores = obtenJugador($conexion);
        foreach($jugadores as $jugador){
            if($nombre == $jugador["NOMBREJUGADOR"]){
                ?>
                
                <div class="col-tab-10">
                <form action="validacion_jugadores.php" method="get" id="jugadores_formulario">
                    <center><p>Perfil del JUGADOR</p></center>

                    <input name="tipo" value="actualizar" type="hidden">
                    <input oninput="nifValidationJ()" class="dniJugador" name="dniJugador" type="hidden" value="<?php echo $dnijugador;?>">
                    <div><label for="nombre">Nombre completo:<em></em></label>
                    <input oninput="nameValidationJ()" placeholder="Nombre Completo" name="nombre" type="text" value="<?php echo $nombre;?>">
                    </div>
                    <div><label for="nombreVirtual">Nombre virtual:<em></em></label>
                    <input oninput="nickValidationJ()" class="nombreVirtual" placeholder="Nombre Virtual" name="nombreVirtual" type="text" value="<?php echo $nombreVirtual;?>">
                    </div>
                    <div><label for="salario">Salario actual:<em></em></label>
                    <input oninput="salarioValidationJ()" id="salario" placeholder="Salario" name="salario" type="text" value="<?php echo $salario;?>">
                    </div>
                    <div><label for="numTelefono">Número de teléfono:<em></em></label>
                    <input oninput="phoneValidationJ()" id="numTelefono" placeholder="Numero de Teléfono" name="numTelefono" type="text" value="<?php echo $numTelefono;?>">
                    </div>
                    <div><label for="correoElectronico">Correo electrónico:<em></em></label>
                    <input oninput="emailValidationJ()" id="correoElectronico" placeholder="Correo Electrónico" name="correoElectronico" type="text" value="<?php echo $correoElectronico;?>">
                    </div>
                    <div><label for="nacionalidad">Nacionalidad:<em></em></label>
                    <input oninput="nacionalidadValidationJ()" id="nacionalidad" placeholder="Nacionalidad" name="nacionalidad" type="text" value="<?php echo $nacionalidad;?>">
                    </div>
                    <div><label for="fentrada">Fecha entrada:<em></em></label>
                    <input oninput="fentradaValidationJ()" id="fentrada" placeholder="Fecha Entrada" name="fentrada" type="text" value="<?php echo $fechaEntrada;?>">
                    </div>
                    <div><label for="numExperiencia">Nº años de experiencia:<em></em></label>
                    <input oninput="numExperienciaValidationJ()" id="numExperiencia" placeholder="Nº Años de Experiencia" name="numExperiencia" type="text" value="<?php echo $numExperiencia;?>">
                    </div>
                    <div><label for="numRegalos">Nº de regalos:<em></em></label>
                    <input readonly="" id="numRegalos" name="numRegalos" type="text" value="<?php echo $numRegalos;?>">
                    </div>
                    <div><label for="nombreVid">Videojuego:<em></em></label>
                    <input readonly="" id="nombreVid" name="nombreVid" type="text" value="<?php echo $nombreVideojuego["NOMBREVIDEOJUEGO"];?>">
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
        $nombreVideojuego = obtenVideojuegoPorOID($conexion,$oidV);

        $entrenadores = obtenEntrenadores($conexion);
        foreach($entrenadores as $entrenador){
            if($nombre == $entrenador["NOMBREENTRENADOR"]){
                ?>
                <div class="col-tab-10">
                <form action="validacion_entrenadores.php" method="POST" id="crearEntrenador">
                    <center><p>Perfil del ENTRENADOR</p></center>    
                    <input name="tipo" value="actualizar" type="hidden">
                    <input oninput="nifValidationE()" id="dniEntrenador" name="dniEntrenador" type="hidden" value="<?php echo $dniEntrenador;?>">
                    <input id="oidV" name="oidV" type="hidden" value="<?php echo $oidV;?>">
                    <div><label for="nombre">Nombre Completo:<em></em></label>
                    <input oninput="nameValidationE()" id="nombreEntrenador" name="nombreEntrenador" placeholder="Nombre Completo" type="text" value="<?php echo $nombre;?>">
                    </div>
                    <div><label for="salario">Salario:<em></em></label>
                    <input oninput="salarioValidationE()" id="salarioEnt" placeholder="Salario" name="salarioEnt" type="text" value="<?php echo $salario;?>">
                    </div>
                    <div><label for="numTelefono">Número de Teléfono:<em></em></label>
                    <input oninput="phoneValidationE()" id="numTelefonoEnt" placeholder="Número de Teléfono" name="numTelefonoEnt" type="text" value="<?php echo $numTelefono;?>">
                    </div>
                    <div><label for="correo">Correo Electrónico:<em></em></label>
                    <input oninput="emailValidationE()" id="correoElectronicoEnt" placeholder="Correo Electrónico" name="correoElectronicoEnt" type="text" value="<?php echo $correoElectronico;?>">
                    </div>
                    <div><label for="nacionalidad">Nacionalidad:<em></em></label>
                    <input oninput="nacionalidadValidationE()" id="nacionalidadEnt" placeholder="Nacionalidad" name="nacionalidadEnt" type="text" value="<?php echo $nacionalidad;?>">
                    </div>
                    <div><label for="numExperiencia">Nº años de Experiencia:<em></em></label>
                    <input oninput="experValidationE()" id="numExperienciaEnt" placeholder="Nº de años de Experiencia" name="numExperienciaEnt" type="text" value="<?php echo $numExperiencia;?>">
                    </div>
                    <div><label for="nombreVideojuego">Videojuego:<em></em></label>
                    <input readonly="" id="nombreVid" name="nombreVid" type="text" value="<?php echo $nombreVideojuego["NOMBREVIDEOJUEGO"];?>">
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
        $oidV = $obtenOjeador["OID_V"];
        $nombreVideojuego = obtenVideojuegoPorOID($conexion,$oidV);

        $ojeadores = obtenOjeadores($conexion);
        foreach($ojeadores as $ojeador){
            if($nombre == $ojeador['NOMBREOJEADOR']){
                ?>
                <div class="col-10 col-tab-10">
                <form action="validacion_ojeador.php" method="POST" id="crearOjeador" novalidate="">
                <center><p>Perfil del OJEADOR</p></center>    
                    <input name="tipo" value="actualizar" type="hidden">
                    <input oninput="nifValidationO()" id="dniOjeador" name="dniOjeador" type="hidden" value="<?php echo $dniOjeador;?>">
                    <div><label for="nombre">Nombre Completo:<em></em></label>
                    <input oninput="nameValidationO()" id="nombreOjeador" placeholder="Nombre Completo" name="nombreOjeador" type="text" value="<?php echo $nombre;?>">
                    </div>
                    <div><label for="salario">Salario:<em></em></label>
                    <input oninput="salarioValidationO()" id="salarioOj" placeholder="Salario" name="salarioOj" type="text" value="<?php echo $salario;?>">
                    </div>
                    <div><label for="numTelefono">Número de Teléfono:<em></em></label>
                    <input oninput="phoneValidationO()" id="numTelefonoOj" placeholder="Número de Teléfono" name="numTelefonoOj" type="text" value="<?php echo $numTelefono;?>">
                    </div>
                    <div><label for="correo">Correo Electrónico:<em></em></label>
                    <input oninput="emailValidationO()" id="correoElectronicoOj" placeholder="Correo Electrónico" name="correoElectronicoOj" type="text" value="<?php echo $correoElectronico;?>">
                    </div>
                    <div><label for="nacionalidad">Nacionalidad:<em></em></label>
                    <input oninput="nacionalidadValidationO()" id="nacionalidadOj" placeholder="Nacionalidad" name="nacionalidadOj" type="text" value="<?php echo $nacionalidad;?>">
                    </div>
                    <div><label for="numExperiencia">Nº años de Experiencia:<em></em></label>
                    <input oninput="experValidationO()" id="numExperienciaOj" placeholder="Nº de años de Experiencia" name="numExperienciaOj" type="text" value="<?php echo $numExperiencia;?>">
                    </div>
                    <div><label for="nombreVideojuego">Videojuego:<em></em></label>
                    <input disabled=true id="nombreVid" name="nombreVid" type="text" value="<?php echo $nombreVideojuego["NOMBREVIDEOJUEGO"];;?>">
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