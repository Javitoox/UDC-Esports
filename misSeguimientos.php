<?php

    session_start();
    require_once("gestionBD.php");
    require_once("gestionMiembros.php");
    require_once("gestionarUsuarios.php");

    if(isset($_SESSION['login'])){
        $nickUsuario = $_SESSION['login'];
    }else{
        Header("Location: login.php");
    }   
?>

<!DOCTYPE html>
<html lang="es">
<head>
<title>Mis Seguimientos</title>
    <?php include_once("headComun.php"); ?>
    <link rel="stylesheet" type="text/css" href="css/misSeguimientos.css">

</head>

<body>
    <?php include_once("fondo.php"); ?>
    <?php include_once("navegacion.php"); ?>

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
                $nombreUsuario = obtenNombreUsuario($conexion, $seg[2]);
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
            $oid_seg = obtenOID_SEG($conexion, $dniUser, $dniJugador);
            $OID_SEG = $oid_seg["OID_SEG"];
            foreach($opinionesJug as $jugador=>$opinion){ //jugador es la clave
                ?>
                <center>
                <div class="comun">
                    <!--Botón para eliminar de tus seguimientos -->
                    <form method= "get" action="controlador_seguimiento.php">
                        <input id="oid_seg" name ="oid_seg" type="hidden" value="<?php echo $OID_SEG?>">
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
                   
                    <!--Input para escribir opinion -->
                    <form method="post" id = "opinion" action="controlador_opinion.php">
                        <input id="dniusuario" name ="dniusuario" type="hidden" value="<?php echo $dniUser?>">
                        <input id="dnijugador" name ="dnijugador" type="hidden" value="<?php echo $dniJugador?>">
                        <textarea id= "comenta" name="comenta" cols="30" rows="10" minlength= "2" maxlength="1000" placeholder="Añade tu opinión sobre este jugador..."></textarea>
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