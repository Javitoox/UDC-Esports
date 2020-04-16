<?php 
	session_start();
	
	//$excepcion = $_SESSION["excepcion"];
	$excepcion = "julian dominfgue buteryo";
	unset($_SESSION["excepcion"]);
	
?>

<!DOCTYPE html>
<html lang="es">
<head>
<title>Error</title>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
  <meta name="viewport" content="width=device-width; initial-scale=1.0">
  <link rel="shortcut icon" href="images/logo.png">
  <link rel="apple-touch-icon" href="images/logo.png">
  <link rel="stylesheet" type="text/css" href="css/excepcion.css" />
  <title>Gestión de biblioteca: ¡Se ha producido un problema!</title>
</head>
<body>	
	
	
	<div>
		<h1>Opss! :( </h1>
		<center><img id="pikachu" src="images/pikachu.jpg" /></center>
	</div>
	<div id="frase">
		<h2  >Se ha producido un error.</h2>  
		
		<h4>Por favor,<a href="excepcion.php"> inténtelo de nuevo.</a></h4>
	</div>	
		
	<div id="error" class='excepcion'>	
		 <?php echo "Información relativa al problema: $excepcion;" ?>
	</div>

</body>
</html>