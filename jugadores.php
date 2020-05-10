<?php
    session_start();
    require_once("gestionBD.php");
    require_once("gestionJugadores.php");
?>

<!DOCTYPE html>
<html lang="es">
<head>
<title>Login</title>
	<?php include_once("headComun.php"); ?>
  	<link rel="stylesheet" type="text/css" href="css/formulario.css">
    <link rel="stylesheet" type="text/css" href="css/error_form.css">
    <link rel="stylesheet" type="text/css" href="css/jugadores.css">
    <link href="https://fonts.googleapis.com/css2?family=Indie+Flower&display=swap" rel="stylesheet">
    
</head>

<body>
    <?php include_once("fondo.php"); ?>
    <?php include_once("navegacion.php"); ?>

    <?php
    function obtenVideojuegos($conexion){
        try{
            $consulta= "SELECT * from videojuegos";
            $stmt = $conexion->query($consulta);
            return $stmt;
        }catch(PDOException $e) {
            $_SESSION['excepcion'] = $e->GetMessage();
            header("Location: excepcion.php");
        }
    }
    ?>
    <?php
    function obtenJugador($conexion){
        try{
            $consulta = "SELECT * from jugadores";
            $stmt = $conexion->query($consulta);
            return $stmt;
        }catch(PDOException $e){
            $_SESSION['excepcion'] = $e->GetMessage();
            header("Location: excepcion.php");
        }   
    }
    ?>   
    
    <?php
    function obtenNumVictorias($conexion, $oid_v){
        try{
            $consulta = "SELECT oid_v, count(distinct nombrecompeticion) as cuenta from competiciones natural join 
            partidos natural join videojuegos where oid_v=:oid_v and ganada='1' group by oid_v";
            $stmt = $conexion->prepare($consulta);
		    $stmt->bindParam(':oid_v',$oid_v);
            $stmt->execute();
		    return $stmt->fetch();
        }catch(PDOException $e){
            $_SESSION['excepcion'] = $e->GetMessage();
            header("Location: excepcion.php");
        } 
    }
    ?>

    <h4>JUGADORES POR VIDEOJUEGO</h4>
    
    <?php

    $conexion = crearConexionBD(); 
    $videojuegos = obtenVideojuegos($conexion);

    foreach($videojuegos as $videojuego) {
        $nombre_videojuego = $videojuego["NOMBREVIDEOJUEGO"];

        ?>
        <center><buttom class="videojuego" type="button">
        <?php echo "$nombre_videojuego" ?></buttom><br>
        <?php
        $victoria = obtenNumVictorias($conexion, $videojuego["OID_V"]);
        if($victoria["CUENTA"] > 0){
            echo "Número de victorias: ", $victoria["CUENTA"];
        }else{
            echo "No hay victorias";
        }    
            ?>
            </center>
            <?php
        $jugadores = obtenJugador($conexion);
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

                ?>
                <p class = "jugador">
                    <?php
                    echo "<br><br><br>" , $nombreVirtual, "<br>", $nacionalidad, "<br>" , "Años de experiencia: ", $añosExperiencia, "<br><br>";
                    ?>
                    <img height = 20px src="images/insta.png" alt="Instagram">
                    <img height = 20px src="images/twitter.png" alt="Twitter">
                    <img height = 20px src="images/twich.png" alt="Twitter">
                </p>
                

                <form id = "botones" action="controlador_jugador.php">
                    <button id="añadir" name="añadir" type="submit" class="añadir_jugador" 
                    value=<?php $dniJugador ?>>
                    <img height = 25px src="images/mas.png" class="añadir_jugador"></button>
                    
                    <button id="añadir" name="eliminar" type="submit" class="eliminar_jugador">
                    <img height = 25px src="images/menos.png" class="eliminar_jugador"></button>
                </form>
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