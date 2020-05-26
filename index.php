<?php
    //Próximamente controlaremos la sesión del usuario para ir a la pantalla de inicio o login
    session_start();
    require_once("gestionBD.php");

    if(!isset($_SESSION['login'])){
        header("Location: login.php");
    }
    
?>
<!DOCTYPE html>
<html lang="es">
<head>
<title>Jugadores</title>
	<?php include_once("headComun.php"); ?>
    <link rel="stylesheet" type="text/css" href="css/index.css">
    <link href="https://fonts.googleapis.com/css2?family=Indie+Flower&display=swap" rel="stylesheet">
    
</head>

<body>
    <?php include_once("fondo.php"); ?>
    <?php include_once("navegacion.php"); ?>
    
<div class="patrocinadores">
    <p>
        <img class="col-mitad col-tab-mitad"  src="images/ASNTaller.png" alt="ASN">
        <img class="col-reduce col-tab-mitad" src="images/niut.png" alt="niut">
        <img class="col-mitad col-tab-mitad"  src="images/fortnite.png" alt="fortnite">
        <img class="col-mitad col-tab-mitad"  src="images/pokemon.png" alt="pokemon">
        <img class="col-mitad col-tab-mitad"  src="images/dragonball.png" alt="dragonball">
        <img class="col-mitad col-tab-mitad"  src="images/csgo.png" alt="csgo">
        <img class="col-mitad col-tab-mitad"  src="images/leaguelegends.png" alt="league">
    </p>
</div>
</body>
</html>