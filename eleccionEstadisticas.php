<?php
    session_start();
    require_once("gestionBD.php");
    require_once("gestionMiembros.php");
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

    <h4>Elige un Videojuego para ver las estadísticas del equipo</h4>
    
    <?php

    
    $conexion = crearConexionBD(); 
    $videojuegos = obtenVideojuegos($conexion);
    foreach($videojuegos as $videojuego) {
        $nombre_videojuego = $videojuego["NOMBREVIDEOJUEGO"];

        ?>
        <form action="estadisticas.php" method="GET">
        <input  id="nVideojuegos" name="nVideojuegos" type="hidden" value="<?php echo $videojuego["NOMBREVIDEOJUEGO"];?>">
 	    <center><input class="videojuego" type="submit" value="<?php echo $videojuego["NOMBREVIDEOJUEGO"];?>" >
		</form>
       
        
        </center>
        <?php
    }
    cerrarConexionBD($conexion);
    ?>
    
</body>
</html>