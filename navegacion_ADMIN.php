<!DOCTYPE html>
<html lang="es">
<head>
<title>Inicio</title>
	<?php include_once("headComun.php"); ?>
	<link rel="stylesheet" type="text/css" href="css/navegacion.css">
</head>
	
<body>
	<?php include_once("fondo.php"); ?>

	<div class="topnav" id="myTopnav">
		
		<a href="index.php"><img id="imglogo" src="images/logo.png" alt="Logo"></a>
		<br><a href="jugadores.php">Jugadores</a>
		<a href="navegacion_ADMIN.php">Resultados</a>
		<a href="navegacion_ADMIN.php">Mis Seguimientos</a>
        <a href="navegacion_ADMIN.php">Sobre Nosotros</a>
        <a href="gestion.php">Gestión</a>
        <a href="navegacion_ADMIN.php">Encuestas</a>
        <a href="navegacion_ADMIN.php">Información</a>
		<a href="perfil_ADMIN.php">Perfil</a>

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