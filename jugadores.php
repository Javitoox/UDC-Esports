<?php
    session_start();
    require_once("gestionBD.php");
    require_once("gestionMiembros.php");
    require_once("gestionJugadores.php");
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
    <script src="https://code.jquery.com/jquery-3.1.1.min.js" type="text/javascript"></script>
    <script src="js/eventos_jugadores.js" type="text/javascript"></script>
</head>

<body>
    <?php 
    if(isset($_SESSION['ADMIN'])){
    	include_once("navegacion_ADMIN.php"); 
    }else{
    	include_once("navegacion.php");
    }
    ?>

    <h4>JUGADORES POR VIDEOJUEGO</h4>
    
    <?php

    $conexion = crearConexionBD(); 
    $dniUsuario = obtenDniUsuario($conexion, $nickUsuario);
    $videojuegos = obtenVideojuegos($conexion);
    $dniUser = $dniUsuario["DNIUSUARIO"];
     ?>
     <input id="oid_oculto" type="hidden" />
     <input id="nombre_oculto" type="hidden" />
     <input id="dni_oculto" type="hidden" />
     <?php
    foreach($videojuegos as $videojuego) {
        $nombre_videojuego = $videojuego["NOMBREVIDEOJUEGO"];

        ?>
        <center><p class="videojuego" type="button" id="boton-<?php echo $videojuego["OID_V"];?>" 
        	onmouseover="cargarDatos('<?php echo $videojuego["OID_V"];?>',
        	'<?php echo $nombre_videojuego;?>','<?php echo $dniUser;?>')">
        <?php echo $nombre_videojuego;?></p>
        <input id="comprueba-<?php echo $videojuego["OID_V"];?>" type="hidden"/>
        <?php
        $victoria = obtenNumVictorias($conexion, $videojuego["OID_V"]);
        if($victoria["CUENTA"] > 0){
            echo "<p>" . "Número de victorias: " . $victoria["CUENTA"] . "</p>";
        }else{
            echo "<p>" . "El equipo no presenta victorias" . "</p>";
        }   
        ?>
        </center>
        <center>
        	<div id="id-<?php echo $videojuego["OID_V"];?>"></div>
        	<!-- Control con jquery y ayax para la carga de los jugadores -->
        </center>
        <?php
    }
    cerrarConexionBD($conexion);
    ?>
    
</body>
</html>