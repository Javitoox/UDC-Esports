<?php 
	session_start();

    //Recogemos el mensaje de error y el destino que ha podido llegar para la redirección
    $destino=null;
	if(isset($_SESSION["destino"])){
		$destino=$_SESSION["destino"];
		unset($_SESSION["destino"]);
	}
	$excepcion = $_SESSION["excepcion"];
	unset($_SESSION["excepcion"]);
	
?>

<!DOCTYPE html>
<html lang="es">
<head>
<title>Excepcion</title>
	<?php include_once("headComun.php"); ?>
  	<link rel="stylesheet" type="text/css" href="css/excepcion.css" />
</head>
<body>	
	
	<div>
		<h1>Opss! :( </h1>
		<center><img id="pikachu" src="images/pikachu.jpg"/></center>
	</div>
	<div id="frase">
		<h2  >Se ha producido un error.</h2>  
		
		<h4>Por favor,
			<?php //Comprobamos si se ha pasado un destino, en caso contrario enviaremos al index.php
			if($destino!=null){
				echo "<a href='$destino'>pinche aquí</a>";
			}else{
				echo "<a href='index.php'>pinche aquí</a>";
			}
			?> 
			e inténtelo de nuevo.</h4>
	</div>	
		
	<div id="error" class='excepcion'>	
		 <?php echo "Información relativa al problema:$excepcion"; ?>
	</div>
</body>
</html>