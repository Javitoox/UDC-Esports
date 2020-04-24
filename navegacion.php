<!DOCTYPE html>
<html lang="es">
<head>
<title>Inicio</title>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<meta name="viewport" content="width=device-width; initial-scale=1.0">
	<link rel="shortcut icon" href="images/logo.png">
	<link rel="apple-touch-icon" href="images/logo.png">
	<link rel="stylesheet" type="text/css" href="css/navegacion.css">
</head>
	
<body>
	<?php include_once("fondo.php"); ?>

	<div class="topnav" id="myTopnav">
		
		<a href="navegacion.php"><img id="imglogo" src="images/logo.png" alt="Logo"></a>
		<br><a href="navegacion.php">Jugadores</a>
		<a href="navegacion.php">Resultados</a>
		<a href="navegacion.php">Mis Seguimientos</a>
		<a href="navegacion.php">Sobre Nosotros</a>
		<a href="navegacion.php">Perfil</a>

		<div class="dropdown">
		  <button class="dropbtn">Nuestras Redes 
		  </button>
		  <div class="dropdown-content">
			<a href="https://www.instagram.com/udcesports/" target="_blank">
			<img id="imgIg" src="images/insta.png">&nbsp Instagram</a>
			<a href="https://www.twitch.tv/udconstantinaesports/" target="_blank">
			<img id="imgTwitch" src="images/twich.png">&nbsp Twitch</a>
			<a href="https://twitter.com/udcesports?lang=es" target="_blank">
			<img id="imgTwitter" src="images/twitter.png">&nbsp Twitter</a>
		  </div>
		</div> 
		<a href="javascript:void(0);" style="font-size:15px;" class="icon" onclick="myFunction()">&#9776;</a>
	  </div>
	  
	  <script>
	
	/*Lo que hace es agregar o no la clase "responsive". Se activará si se hace clic en 
	el icono del menú (topnav) que, estará disponible para móviles.*/ 

	  function myFunction() {
		var x = document.getElementById("myTopnav");
		if (x.className === "topnav") {
		  x.className += " responsive";
		} else {
		  x.className = "topnav";
		}
	  }
	  </script>

</body>
</html>