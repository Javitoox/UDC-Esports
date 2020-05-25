<?php
    session_start();
    require_once("gestionBD.php");
	require_once("gestionJugadores.php");
    require_once("gestionarUsuarios.php");

    if(isset($_SESSION['login'])){
        $nickUsuario = $_SESSION['login'];
    }else{
        Header("Location: login.php");
    }
	
	$conexion = crearConexionBD(); 
	
	$dniUsuario = obtenDniUsuario($conexion, $nickUsuario);
	$dniUser = $dniUsuario["DNIUSUARIO"];
	$mailUsuario=obtenEmailUsuario($conexion, $nickUsuario);
	$mailUser = $mailUsuario["EMAILUSUARIO"];
	$nameUsuario= obtenNombreUsuario($conexion, $nickUsuario);
	$nameUser=$nameUsuario["NOMBRECOMPLETOUSUARIO"];
	$numUsuario=obtenNumeroUsuario($conexion, $nickUsuario);
	$numUser=$numUsuario["NUMTELEFONOUSUARIO"];
	$passUsuario=obtenPassUsuario($conexion, $nickUsuario);
	$passUser=$passUsuario["PASSUSUARIO"];
	
	
	if(isset($_POST["submit"]) && !empty($_POST["submit"])) {
		$pass = $_POST["Npass"];
		$Cpass = $_POST["CNpass"];
		changePass($conexion,$dniUser,$pass);
	}
?>
	
<!DOCTYPE html>
<html lang="es">
<head>
<title>Perfil</title>
    <?php include_once("headComun.php"); ?>
    <link rel="stylesheet" type="text/css" href="css/error_form.css">
    <link rel="stylesheet" type="text/css" href="css/perfil.css">
    
</head>

<body>
    <?php include_once("fondo.php"); ?>
    <?php include_once("navegacion.php"); ?>
    
    <div class="col-3">
   	 			 <h2 id="nComplField">Nombre Completo:</h2>
   		 		 <h2 id="userField">Usuario:</h2>
    	 		 <h2 id="mailField">Email:</h2>
   		 		 <h2 id="dniField">DNI/NIF:</h2>
  				 <h2 id="tlfField">Teléfono:</h2>
   				 <h2 id="passField">Contraseña actual:</h2>
   				 <h2 id="passCField">Nueva Contraseña:</h2>
   				 <h2 id="CpassField">Confirmar contraseña:</h2>
    </div>
    
   <div class="col-3">
	     <h2 id="nComplValue"><?php echo $nameUser?></h2>
	     <h2 id="userValue"><?php echo $nickUsuario?></h2>
	     <h2 id="mailValue"><?php echo $mailUser?></h2>
	     <h2 id="dniValue"><?php echo $dniUser?></h2>
	     <h2 id="tlfValue"><?php echo $numUser?></h2>
	     <h2 id="passValue"><?php echo $passUser?></h2>
	</div>
	
	<div >
		<form action="perfil.php" method="POST" class="col-3">
  			<input class="newPass" type="password" id="Npass" name="Npass" value=""><br>
  			<input class="newConfirmPass" type="password" id="CNpass" name="CNpass" value=""><br>
  			<input type="submit" name="submit" value="Enviar Formulario">
  			<div class="changePass">
    			<span class="boton" type="submit" onclick="alert('La contraseña se ha cambiado correctamente.')"> Cambiar Contraseña </span>
    		</div>
		</form> 
	</div>


    <div class="exampleImage">
    	<!-- <img src="images/examplephoto.jpg"> !--> 

    </div>
     

 <div>