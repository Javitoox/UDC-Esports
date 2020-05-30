<?php
    session_start();
    require_once("gestionBD.php");
    require_once("consultasSql.php");
    require_once("gestionJugadores.php");
	    require_once("gestionMiembros.php");
	

    if(isset($_SESSION['login'])){
        $nickUsuario = $_SESSION['login'];
    }else{
        Header("Location: login.php");
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
    <title>Gestion</title>
    <?php include_once("headComun.php"); ?>
    <link rel="stylesheet" type="text/css" href="css/gestion.css">
   	<link rel="stylesheet" type="text/css" href="css/formulario.css">
	<link rel="stylesheet" type="text/css" href="css/error_form.css">
    <script type="text/javascript" src="js/codigoJS.js"></script>
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
    

    <div class="comun">
        <?php $conexion = crearConexionBD();
        $jugadores = obtenJugador($conexion);
        $entrenadores = obtenEntrenadores($conexion);
        $ojeadores = obtenOjeadores($conexion);?>
        
        
	
<div class="tabla1">
            <!-- formulario -->
            <div class="formulario" id="creaJugador">
            <form method="get" action="validacion_jugadores.php" id="jugadores_formulario">
                Insertar un JUGADOR
                <div>
                <input name="tipo" value="insertar" type="hidden">
                </div>
                <div><label for="dniJugador">DNI Jugador:<em></em></label>
                <input oninput="nifValidationJ()" id="dniJugador" name="dniJugador" placeholder="DNI Jugador" value="<?php echo $formulario['dniJugador'];?>" type="text" required>
                </div>
                <div><label for="nombre">Nombre completo:<em></em></label>
                <input oninput="nameValidationJ()" id="nombre" placeholder="Nombre Completo" name="nombre" maxlength="50" type="text" value="<?php echo $formulario['nombre'];?>" required >
                </div>
                <div><label for="nombreVirtual">Nombre virtual:<em></em></label>
                <input oninput="nickValidationJ()" id="nombreVirtual" placeholder="Nombre Virtual" maxlength="20" name="nombreVirtual" type="text" value="<?php echo $formulario['nombreVirtual'];?>"required>
                </div>
                <div><label for="numTelefono">Número de teléfono:<em></em></label>
                <input oninput="phoneValidationJ()" id="numTelefono" placeholder="Numero de Teléfono" name="numTelefono" maxlength="15" type="text"value="<?php echo $formulario['numTelefono'];?>"required>
                </div>
                <div><label for="correoElectronico">Correo electrónico:<em></em></label>
                <input oninput="emailValidationJ()" id="correoElectronico" placeholder="Correo Electrónico" name="correoElectronico" maxlength="50" type="text"value="<?php echo $formulario['correoElectronico'];?>" required>
                </div>
                <div><label for="nacionalidad">Nacionalidad:<em></em></label>
                <input oninput="nacionalidadValidationJ()" id="nacionalidad" placeholder="Nacionalidad" name="nacionalidad" type="text" maxlength="15" value="<?php echo $formulario['nacionalidad'];?>"required>
                </div>
                <div><label for="fentrada">Fecha entrada:<em></em></label>
                <input id="fentrada" oninput="fentradaValidationJ()" placeholder="Fecha Entrada" name="fentrada" type="date" value="<?php echo $formulario['fentrada'];?>"required>
                </div>
                <div><label for="salario">Salario actual:<em></em></label>
                <input id="salario" oninput="salarioValidationJ()" placeholder="Salario" name="salario" maxlength="10"type="text" >
                </div>
                <div><label for="numExperiencia">Años de experiencia:<em></em></label>
                <input id="numExperiencia" oninput="numExperienciaValidationJ()" placeholder="Nº Años de Experiencia" maxlength="38" name="numExperiencia" type="text" value="<?php echo $formulario['numExperiencia'];?>"required>
                </div>
                <!--Videojuego (oid_v y el nombre) -->
                <div><label for="nombreVid">Videojuego:<em></em></label>
                <select name="nombreVid" id="nombreVid" required>
       		
       				<?php $videojuegos = obtenVideojuegos($conexion);
       					foreach($videojuegos as $videojuego){
    		    			
							echo "<option  value='".$videojuego["NOMBREVIDEOJUEGO"]."' label='".$videojuego["NOMBREVIDEOJUEGO"]."'/>";
    			
				
    					}
    		
    		?>
				</select>
                </div>
                <input class="boton" id="boton" name="boton" type="submit" value="Añadir Jugador"/><br/>
            </form>
            <div id="cerrar"><a href="javascript:cierraFormularioYAbreTabla()"><img height = 30px src="images/cerrar.png" alt=""></a></div>
            </div>

            <table id=tablaAparece></table>

            <table id="myTable">
            <tr>
            <th style="width:60%;">Jugadores
            
            <input type="text" class = "search" id="myInputJug" onkeyup="buscaJugador()" placeholder="Busca un jugador" title="Type in a name">
               
            </th>
            <th style="width:60%;"></th>
            <th style="width:60%;">
            <button id="creaJ" name="añadir" type="submit" class="añadir_jugador">
            <a href="javascript:abreFormularioYCierraTabla()">
            <img id="añade" height = 25px src="images/mas.png" class="añadir_jugador">
            </a></button></th>
        
            </tr>
            <?php
            foreach($jugadores as $jugador){
                ?>
                <tr>
                <?php
                ?><td><?php echo $jugador["NOMBREJUGADOR"] ?></td>
                <form  method= "post" action="perfil_ADMIN.php">
                    <?php 
                    $dniJugador = $jugador["DNIJUGADOR"];
                    ?>
                    <input id="dnijugador" name ="dnijugador" type="hidden" value="<?php echo $dniJugador?>">
                    <td><button id="editar" name="editar"><img height = 25px src="images/editar.png"></button></td>
    
                </form>
                <form  method= "get" action="accion_eliminaMiembro.php">
                    <?php 
                    $dniJugador = $jugador["DNIJUGADOR"];
                    ?>
                    <input id="dnijugador" name ="dnijugador" type="hidden" value="<?php echo $dniJugador?>">
                    <td><button id="eliminar" name="eliminar"><img height = 25px src="images/eliminar.jpg"></button></td>
                </form>
                </tr>
                <?php
            }
            ?>
        </div>
        <div class="tabla2">
            <!--formulario -->
            <div class="formulario2" id ="creaEntrenador">
                <form method="post" action="validacion_entrenadores.php" id="crearEntrenador">
                Insertar un ENTRENADOR
                <div><label for="dniEntrenador">DNI Entrenador:<em></em></label>
                <input oninput="nifValidationE()" id="dniEntrenador" name="dniEntrenador" placeholder="DNI Entrenador" type="text" maxlength="30" value="<?php echo $formularioEnt['dniEntrenador'];?>" required>
                </div>
                <div><label for="nombreEntrenador">Nombre completo:<em></em></label>
                <input oninput="nameValidationE()" id="nombreEntrenador" placeholder="Nombre Completo" name="nombreEntrenador" maxlength="50" type="text" value="<?php echo $formularioEnt['nombreEntrenador'];?>" required>
                </div>
                <div><label for="numTelefonoEnt">Número de teléfono:<em></em></label>
                <input oninput="phoneValidationE()" id="numTelefonoEnt" placeholder="Numero de Teléfono" name="numTelefonoEnt" type="text" maxlength="15" value="<?php echo $formularioEnt['numTelefonoEnt'];?>" required>
                </div>
                <div><label for="correoElectronicoEnt">Correo electrónico:<em></em></label>
                <input oninput="emailValidationE()" id="correoElectronicoEnt" placeholder="Correo Electrónico" name="correoElectronicoEnt" maxlength="50" value="<?php echo $formularioEnt['correoElectronicoEnt'];?>" type="text" required>
                </div>
                <div><label for="nacionalidadEnt">Nacionalidad:<em></em></label>
                <input oninput="nacionalidadValidationE()" id="nacionalidadEnt" placeholder="Nacionalidad" name="nacionalidadEnt" type="text" maxlength="100" value="<?php echo $formularioEnt['nacionalidadEnt'];?>" required>
                </div>
                <div><label for="salarioEnt">Salario actual:<em></em></label>
                <input oninput="salarioValidationE()" id="salarioEnt" placeholder="Salario" name="salarioEnt" type="text" maxlength="10"  value="<?php echo $formularioEnt['salarioEnt'];?>" required>
                </div>
                <div><label for="numExperienciaEnt">Años de experiencia:<em></em></label>
                <input oninput="experValidationE()" id="numExperienciaEnt" placeholder="Nº Años de Experiencia" name="numExperienciaEnt" maxlength="38" type="text" value="<?php echo $formularioEnt['numExperienciaEnt'];?>" required>
                </div>
                <!--Videojuego (oid_v y el nombre) -->
                <div><label for="videojuego">Videojuego:<em></em></label>
                 <select name="nombreVid" id="nombreVid" required>
       		
       				<?php $videojuegos = obtenVideojuegos($conexion);
       					foreach($videojuegos as $videojuego){
    		    			
							echo "<option  value='".$videojuego["NOMBREVIDEOJUEGO"]."' label='".$videojuego["NOMBREVIDEOJUEGO"]."'/>";
    			
				
    					}
    		
    		?>
				</select>

                </div>
                <input class="boton" id="boton" name="boton" type="submit" value="Añadir Entrenador" /><br/>
                </form>

                <div id="cerrarEntrenador"><a href="javascript:cierraFormularioEntrenadorYAbreTabla()"><img height = 30px src="images/cerrar.png" alt=""></a></div>
            </div>
        <table id=tablaAparece2></table>     
        <table id="myTable2">
            <tr>
            <th style="width:60%;">Entrenadores
           
            <input type="text" class = "search" id="myInputEnt" onkeyup="buscaEntrenador()" placeholder="Busca un entrenador" title="Type in a name">
            </th>
            <th style="width:60%;"></th>
            <th style="width:60%;">
            <button id="creaEnt" name="añadir" type="submit" class="añadir_entrenador">
            <a href="javascript:abreFormularioEntrenadorYCierraTabla()">
            <img id="añade" height = 25px src="images/mas.png" class="añadir_entrenador">
            </a></button>
            </th>
        
            </tr>
            <?php
            foreach($entrenadores as $entrenador){
                ?>
                <tr>
                <?php
                ?><td><?php echo $entrenador["NOMBREENTRENADOR"] ?></td>
                <form  method= "post" action="perfil_ADMIN.php">
                    <?php 
                    $dniEntrenador = $entrenador["DNIENTRENADOR"];
                    ?>
                    <input id="dnientrenador" name ="dnientrenador" type="hidden" value="<?php echo $dniEntrenador?>">
                    <td><button id="editar" name="editar"><img height = 25px src="images/editar.png"></button></td>
    
                </form>
                <form  method= "get" action="accion_eliminaMiembro.php">
                    <?php 
                    $dniEntrenador = $entrenador["DNIENTRENADOR"];
                    ?>
                    <input id="dnientrenador" name ="dnientrenador" type="hidden" value="<?php echo $dniEntrenador?>">
                    <td><button id="eliminar" name="eliminar"><img height = 25px src="images/eliminar.jpg"></button></td>
                </form>
                
                </tr>
                <?php
            }
            ?>

        </div>
        &nbsp;&nbsp;
        <div class="tabla3">
            <!-- formulario -->
            <div class="formulario3"  id="creaOjeador">
            <form method="get" action="validacion_ojeador.php" id="crearOjeador">
            Insertar un OJEADOR
                <div><label for="dniOjeador">DNI Ojeador:<em></em></label>
                <input oninput="nifValidationO()" id="dniOjeador" name="dniOjeador" placeholder="DNI Ojeador" type="text" required>
                </div>
                <div><label for="nombreOjeador">Nombre completo:<em></em></label>
                <input oninput="nameValidationO()" id="nombreOjeador" placeholder="Nombre Completo" name="nombreOjeador" type="text" required>
                </div>
                <div><label for="numTelefonoOj">Número de teléfono:<em></em></label>
                <input oninput="phoneValidationO()" id="numTelefonoOj" placeholder="Numero de Teléfono" name="numTelefonoOj" type="text" required>
                </div>
                <div><label for="correoElectronicoOj">Correo electrónico:<em></em></label>
                <input oninput="emailValidationO()" id="correoElectronicoOj" placeholder="Correo Electrónico" name="correoElectronicoOj" type="text" required>
                </div>
                <div><label for="nacionalidadOj">Nacionalidad:<em></em></label>
                <input oninput="nacionalidadValidationO()" id="nacionalidadOj" placeholder="Nacionalidad" name="nacionalidadOj" type="text" required>
                </div>
                <div><label for="salarioOj">Salario actual:<em></em></label>
                <input oninput="salarioValidationO()" id="salarioOj" placeholder="Salario" name="salarioOj" type="text" required>
                </div>
                <div><label for="numExperienciaOj">Años de experiencia:<em></em></label>
                <input oninput="experValidationO()" id="numExperienciaOj" placeholder="Nº Años de Experiencia" name="numExperienciaOj" type="text" required>
                </div>
                <!--Videojuego (oid_v y el nombre) -->
                <div><label for="videojuego">Videojuego:<em></em></label>
                 <select name="nombreVid" id="nombreVid" required>
       		
       				<?php $videojuegos = obtenVideojuegos($conexion);
       					foreach($videojuegos as $videojuego){
    		    			
							echo "<option  value='".$videojuego["NOMBREVIDEOJUEGO"]."' label='".$videojuego["NOMBREVIDEOJUEGO"]."'/>";
    			
				
    						}
    		
    		?>
				</select>

                </div>
                
               
                <input class="boton" id="boton" name="boton" type="submit" value="Añadir Ojeador" /><br/>

            </form>
            <div id="cerrarOjeador"><a href="javascript:cierraFormularioOjeadorYAbreTabla()"><img height = 30px src="images/cerrar.png" alt=""></a></div>
            </div>
        <table id=tablaAparece3></table>     
        <table id="myTable3">
            <tr>
            <th style="width:60%;">Ojeadores
            <input type="text" class = "search" id="myInputOj" onkeyup="buscaOjeador()" placeholder="Busca un ojeador" title="Type in a name"><br>
            </th>
            <th style="width:60%;"></th>
            <th style="width:60%;">
            <button id="creaOj" name="añadir" type="submit" class="añadir_ojeador">
            <a href="javascript:abreFormularioOjeadorYCierraTabla()">
            <img id="añade" height = 25px src="images/mas.png" class="añadir_ojeador">
            </a></button></th>
        
            </tr>
            <?php
            foreach($ojeadores as $ojeador){
                ?>
                <tr>
                <?php
                ?><td><?php echo $ojeador["NOMBREOJEADOR"] ?></td>
                <form  method= "post" action="perfil_ADMIN.php">
                    <?php 
                    $dniOjeador = $ojeador["DNIOJEADOR"];
                    ?>
                    <input id="dniojeador" name ="dniojeador" type="hidden" value="<?php echo $dniOjeador?>">
                    <td><button id="editar" name="editar"><img height = 25px src="images/editar.png"></button></td>
                
                </form>
                <form  method= "get" action="accion_eliminaMiembro.php">
                    <?php 
                    $dniOjeador = $ojeador["DNIOJEADOR"];
                    ?>
                    <input id="dniojeador" name ="dniojeador" type="hidden" value="<?php echo $dniOjeador?>">
                    <td><button id="eliminar" name="eliminar"><img height = 25px src="images/eliminar.jpg"></button></td>                        
                </form>
                </tr>
                <?php
                
            }
            
            
            ?>
        </div>
    </div>
</body>
</html>