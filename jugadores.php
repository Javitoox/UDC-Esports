<?php

    session_start();
    require_once("gestionBD.php");
    require_once("gestionJugadores.php");
    require_once("gestionarUsuarios.php");
    require_once("consultasSql.php");

    if(isset($_SESSION['login'])){
        $nickUsuario = $_SESSION['login'];
    }else{
        Header("Location: login.php");
    }   
?>

<!DOCTYPE html>
<html lang="es">
<head>
<title>Jugadores</title>
	<?php include_once("headComun.php"); ?>
    <link rel="stylesheet" type="text/css" href="css/jugadores.css">
    <link href="https://fonts.googleapis.com/css2?family=Indie+Flower&display=swap" rel="stylesheet">
    
</head>

<body>
    <?php include_once("fondo.php"); ?>
    <?php include_once("navegacion.php"); ?>

    <h4>JUGADORES POR VIDEOJUEGO</h4>
    
    <?php

    $conexion = crearConexionBD(); 
    $dniUsuario = obtenDniUsuario($conexion, $nickUsuario);
    $videojuegos = obtenVideojuegos($conexion);
    $dniUser = $dniUsuario["DNIUSUARIO"];
    
    foreach($videojuegos as $videojuego) {
        $nombre_videojuego = $videojuego["NOMBREVIDEOJUEGO"];

        ?>
        <center><p class="videojuego" type="button">
        <?php echo "$nombre_videojuego"?></p>
        <?php
        $victoria = obtenNumVictorias($conexion, $videojuego["OID_V"]);
        if($victoria["CUENTA"] > 0){
            echo "<p>" . "Número de victorias: " . $victoria["CUENTA"] . "</p>";
        }else{
            echo "<p>" . "El equipo no presenta victorias" . "</p>";
        }    
        ?>
        </center>
        <?php
        $jugadores = obtenJugador($conexion);
        $mejoresJugadores = listarMejoresJugadores($conexion);
        
        ?>
        <center>
        <?php
        foreach($jugadores as $jugador) {

            if($jugador["OID_V"] == $videojuego["OID_V"]){
                $nombreVirtual = $jugador["NOMBREVIRTUALJUGADOR"];
                $nacionalidad = $jugador["NACIONALIDADJUGADOR"];
                $añosExperiencia = $jugador["NUMAÑOSEXPERIENCIAJUGADOR"];
                $dniJugador = $jugador["DNIJUGADOR"];
                $nombreV = $videojuego["NOMBREVIDEOJUEGO"];
                
                //Para el mejor jugador de cada videojuego. Falta poner la imagen donde corresponda.
                //Están separados ya por videojuego.
                /*
                foreach($mejoresJugadores as $mejor){
                    $mejores = $mejor["NOMBREVIRTUALJUGADOR"];
                    $oidMejores = obtenOID_V_Mejores($conexion, $mejores);
                    if($oidMejores["OID_V"] == $videojuego["OID_V"]){
                        echo $mejores ." ";
                    }   
                }
                */
                
                ?>
                <div class = "jugador">
                    <form method= "get" id = "botones" action="controlador_jugadores.php">
                        <?php  
                        $seguimiento = existeSeguimiento($conexion, $dniUser, $dniJugador);
                        $oid_seg = obtenOID_SEG($conexion, $dniUser, $dniJugador);
                        $OID_SEG = $oid_seg["OID_SEG"];
                        
                        // 2 campos hidden (dnijugador, dniusuario)
                        ?>
                        <input id="dnijugador" name ="dnijugador" type="hidden" value="<?php echo $dniJugador?>">
					    <input id="dniuser" name ="dniuser" type="hidden" value="<?php echo $dniUser?>">
                        
                        <?php
                        if($OID_SEG == 0){
                            ?>
                            <button id="añadir" name="añadir" type="submit" class="añadir_jugador">
                            <img height = 25px src="images/mas.png" class="añadir_jugador"></button>
                            <?php
                        }else{
                            ?>
                            <!-- 1 campos hidden (oid_seg)-->
                            <input id="oid_seg" name ="oid_seg" type="hidden" value="<?php echo $OID_SEG?>">
                            <button id="eliminar" name="eliminar" type="submit" class="eliminar_jugador">
                            <img height = 25px src="images/menos.png" class="eliminar_jugador"></button>
                            <?php
                        }
                        ?>
                    </form>
                    <?php
                     
                    echo "<br><br><br>" . $nombreVirtual . "<br>". $nacionalidad. "<br>" . "Años de experiencia: ". $añosExperiencia. "<br><br>";
                    
                    ?>
                    <img height = 20px src="images/insta.png" onclick = "location.href='https://www.instagram.com/udcesports/'"  alt="Instagram">
                    <img height = 20px src="images/twitter.png" onclick = "location.href='https://www.twitch.tv/udconstantinaesports/'" alt="Twitter">
                    <img height = 20px src="images/twich.png" onclick = "location.href='https://twitter.com/udcesports?lang=es'" alt="Twitter">
                </div>
   
                <?php
            }   
        }
        ?>
        </center>
        <?php


    }
    cerrarConexionBD($conexion);
    ?>
    
</body>
</html>