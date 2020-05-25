<!DOCTYPE html>
<html lang="es">
<head>
	<title>Inicio</title>
	<?php include_once("headComun.php"); ?>
	<link rel="stylesheet" type="text/css" href="css/navegacion.css">
	<script type="text/javascript" src="js/codigoJS.js"></script>
</head>
	
<body>
	<?php include_once("fondo.php"); ?>

	<div class="topnav" id="myTopnav">
		
		<a href="index.php"><img id="imglogo" src="images/logo.png" alt="Logo"></a>
		<br><a href="jugadores.php">Jugadores</a>
		<a href="navegacion.php">Resultados</a>
		<a href="misSeguimientos.php">Mis Seguimientos</a>
		<a href="navegacion.php">Sobre Nosotros</a>
		<a href="perfil.php">Perfil</a>

		<div class="dropdown">
		  <button class="dropbtn">Nuestras Redes 
		  </button>
		  <div class="dropdown-content">
			<a href="https://www.instagram.com/udcesports/" target="_blank">
			<img id="imgIg" src="images/insta.png" alt="Icono Instagram">&nbsp&nbsp Instagram &nbsp&nbsp</a>
			<a href="https://www.twitch.tv/udconstantinaesports/" target="_blank">
			<img id="imgTwitch" src="images/twich.png" alt="Icono Twitch">&nbsp&nbsp Twitch &nbsp&nbsp</a>
			<a href="https://twitter.com/udcesports?lang=es" target="_blank">
			<img id="imgTwitter" src="images/twitter.png" alt="Icono Twitter">&nbsp Twitter &nbsp&nbsp</a>
		  </div>
		</div> 
		<a href="javascript:void(0);" style="font-size:15px;" class="icon" onclick="myFunction()">&#9776;</a>
	  </div>
	  <br><br><br><br>
</body>
</html>