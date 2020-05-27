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
	
	$dniUsuario = obtenDniUsuarioR($conexion, $nickUsuario);
	$dniUser = $dniUsuario["DNIUSUARIO"];
	$mailUsuario=obtenEmailUsuario($conexion, $nickUsuario);
	$mailUser = $mailUsuario["EMAILUSUARIO"];
	$nameUsuario= obtenNombreUsuario($conexion, $nickUsuario);
	$nameUser=$nameUsuario["NOMBRECOMPLETOUSUARIO"];
	$numUsuario=obtenNumeroUsuario($conexion, $nickUsuario);
	$numUser=$numUsuario["NUMTELEFONOUSUARIO"];
	$passUsuario=obtenPassUsuario($conexion, $nickUsuario);
	$passUser=$passUsuario["PASSUSUARIO"];
	
	
	if(isset($_POST["submitPerfil"]) && !empty($_POST["submitPerfil"])) {
		$nombre=$_POST["nombre"];
		$nick=$_POST["nick"];
		$mail=$_POST["mail"];
		$dni=$_POST["dni"];
		$num=$_POST["num"];	
			
	if($nombre==""){
		echo "<br><br><br><br><font color='red'><strong>El nombre de usuario no puede estar vacío.</strong></font>";
	}else if($nick==""){
		echo "<br><br><br><br><font color='red'><strong>El nick del usuario no puede estar vacío.</strong></font>";	
	}else if($mail==""){ 
		echo "<br><br><br><br><font color='red'><strong>El email del usuario no puede estar vacío.</strong></font>";	
	}else if(!filter_var($mail, FILTER_VALIDATE_EMAIL)){
		echo "<br><br><br><br><font color='red'><strong>El email no posee el formato adecuado.</strong></font>";
	}else if($num==""){ 
		echo "<br><br><br><br><font color='red'><strong>El numero telefonico del usuario no puede estar vacío.</strong></font>";	
	}else if(!preg_match('/^[0-9]{9}+$/', $num)){
		echo "<br><br><br><br><font color='red'><strong>El numero telefonico es incorrecto.</strong></font>";
	}else{
		changeProfile($conexion,$nombre,$nick,$mail,$num,$dni);
		header("Location: login.php");
	}
	}
	if(isset($_POST["submit"]) && !empty($_POST["submit"])) {
		$pass = $_POST["Npass"];
		$Cpass = $_POST["CNpass"];
		
		if(!isset($pass) || strlen($pass) < 8){
			echo "<br><br><br><br><font color='red'><strong>Contraseña no válida: debe tener al menos 8 caracteres.</strong></font>";
		}else if(!preg_match("/[a-z]+/", $pass) || !preg_match("/[A-Z]+/", $pass) || !preg_match("/[0-9]+/", $pass)){
			echo "<br><br><br><br><font color='red'><strong>Contraseña no válida: debe contener letras mayúsculas y minúsculas y dígitos.</strong></font>";
		}else if($pass != $Cpass){
			echo  "<br><br><br><br><font color='red'><strong>La confirmación de contraseña no coincide con la contraseña.</strong></font>";
		}else{
			changeCPass($conexion, $dniUser,$pass);
			changePass($conexion,$dniUser,$pass);
			header("Location: login.php");
			
		}
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
    <?php 
    if(isset($_SESSION['ADMIN'])){
    	include_once("navegacion_ADMIN.php"); 
    }else{
    	include_once("navegacion.php");
    }
    ?>
    
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
    <div>
    	<form action="perfil.php" method="POST" class="form col-3">
			<input   type="text" id="nombre" name="nombre" value="<?php echo $nameUser?>"><br>
			<input  type="text" id="nick" name="nick" value="<?php echo $nickUsuario?>"><br>
			<input  type="text" id="mail" name="mail" value="<?php echo $mailUser?>"><br>
			<input  type="text" id="dni" name="dni" value="<?php echo $dniUser?>" ><br>
			<input   type="text" id="num" name="num" value="<?php echo $numUser?>"><br>
			<input  type="text" id="pass" name="pass" value="<?php echo $passUser?>" ><br>
			<input  class="changeProfile" type="submit" name="submitPerfil" value="Modificar Perfil">
    </div>
    
	<div >
		<form action="perfil.php" method="POST" class="col-3">
  			<input class="newPass" type="password" id="Npass" name="Npass" value=""><br>
  			<input class="newConfirmPass" type="password" id="CNpass" name="CNpass" value=""><br>
  			<input class="changePass" type="submit" name="submit" value="Cambiar Contraseña">
		</form> 
	</div>


 <div>