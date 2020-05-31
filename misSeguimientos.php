<?php
    session_start();
    require_once("gestionBD.php");
    require_once("gestionMiembros.php");
    require_once("gestionJugadores.php");
    require_once("gestionarUsuarios.php");

    if(isset($_SESSION['login'])){
        $nickUsuario = $_SESSION['login'];
    }else{
        Header("Location: login.php");
    } 
    if (isset($_SESSION['errores'])){
        $errores = $_SESSION['errores'];
        unset($_SESSION["errores"]);
    }  
?>

<!DOCTYPE html>
<html lang="es">
<head>
<title>Mis Seguimientos</title>
    <?php include_once("headComun.php"); ?>
    <link rel="stylesheet" type="text/css" href="css/misSeguimientos.css">
    <link rel="stylesheet" type="text/css" href="css/error_form.css">
    <script src="https://code.jquery.com/jquery-3.1.1.min.js" type="text/javascript"></script>
    <script type="text/javascript" src="js/gestion.js"></script>
    <script src="js/utiles.js" type="text/javascript"></script>
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
    $dniUsuario = obtenDniUsuario($conexion, $nickUsuario);
    $dniUser = $dniUsuario["DNIUSUARIO"];
    
    $jugadores = obtenJugador($conexion);
    foreach($jugadores as $jugador) {
        $dniJugador = $jugador["DNIJUGADOR"];

        //Comprobar que el usuario lo ha añadido a su seguimiento
        $seguimiento = existeSeguimiento($conexion, $dniUser, $dniJugador);
        //en caso afirmativo obtenemos los datos requeridos
        if($seguimiento != ""){
            $seguimiento = tieneSeguimiento($conexion, $dniJugador);
            $opinionesJug = array(); //diccionario
            foreach($seguimiento as $seg){
                $nombreUsuario = obtenNombreUsuarioPorDNI($conexion, $seg[2]);
                if(array_key_exists($seg[0], $opinionesJug)){
                    //Para el resto de usuarios que ya han opinado sobre un jugador
                    if($seg[1] != ""){
                        $opinionesJug[$seg[0]] .=  "<b>" . $nombreUsuario[0] . "</b>" . ": " . $seg[1] . "<br>";
                    }
                }else{
                    //Para el usuario
                    if($seg[1] != ""){
                        $opinionesJug[$seg[0]] = "<b>" . $nombreUsuario[0] . "</b>" . ": " . $seg[1] . "<br>";
                    }else{
                        $opinionesJug[$seg[0]] = "";
                    }
                }
            }
            foreach($opinionesJug as $jugador=>$opinion){ //jugador es la clave
                ?>
                <center>
                <div class="comun">
                    <!--Botón para eliminar de tus seguimientos -->
                    <form method= "post" action="controlador_seguimiento.php">
                        <input name ="dnius" type="hidden" value="<?php echo $dniUser?>">
                        <input name ="dniju" type="hidden" value="<?php echo $dniJugador?>">
                        <button id="eliminar" name="eliminar" type="submit" class="eliminar_jugador">
                        <img height = 20px src="images/menos.png" class="eliminar_jugador"></button>
                    </form>
                    <h2>OPINIONES SOBRE EL JUGADOR:</h2>
                    <div class= "jugador">
                    <h3>
                    <?php
                    echo $jugador;
                    ?>
                    <a href="https://www.instagram.com/udcesports/" target="_blank">
                    <img id="imgIg" src="images/insta.png" alt="Icono Instagram"></a>
                    <a href="https://www.twitch.tv/udconstantinaesports/" target="_blank">
                    <img id="imgTwitch" src="images/twich.png" alt="Icono Twitch"></a>
                    <a href="https://twitter.com/udcesports?lang=es" target="_blank">
                    <img id="imgTwitter" src="images/twitter.png" alt="Icono Twitter"></a>
                    </h3>
    
                    </div>
                    <div class="opinion">
                        <?php
                        echo  $opinion;
                        ?>
                    </div>
                   <span id="contador_palabras-<?php echo $dniJugador?>"></span>
                    <!--Input para escribir opinion -->
                    <form method="post" id = "opinion" action="controlador_opinion.php" onsubmit="return validateForm11('<?php echo $dniJugador;?>')">
                        <input id="dniusuario" name ="dniusuario" type="hidden" value="<?php echo $dniUser?>">
                        <input id="dnijugador" name ="dnijugador" type="hidden" value="<?php echo $dniJugador?>">
                        <textarea oninput="comentaValidation('<?php echo $dniJugador;?>')" id="comenta-<?php echo $dniJugador;?>" onkeyup="updateCount('<?php echo $dniJugador;?>')" 
                        name="comenta" class="comenta" cols="30" rows="10" minlength= "2" maxlength="1000" placeholder="Añade tu opinión sobre este jugador..."></textarea>
                        <button id="opina" name="comentar" type="submit" class="comentar_jugador">
                        <img height = 25px src="images/enviar.png" class="enviar_comentario"></button><br>
                    </form>
                </div>
                </center>
                <?php
            }
        }
    }
    cerrarConexionBD($conexion);
    ?>
</body>
</html>