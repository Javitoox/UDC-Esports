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
		$nombre=$_POST["nombreCompletoUsuario"];
		$nick=$_POST["nickUsuario"];
		$mail=$_POST["emailUsuario"];
		$dni=$_POST["dni"];
		$num=$_POST["numTelefonoUsuario"];	
			
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
	if(isset($_POST["submitPass"]) && isset($_POST["submitPass"])) {         
		$pass = $_POST["passUsuario"];
		$Cpass = $_POST["confirmPassUsuario"];
		
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
    <script src="https://code.jquery.com/jquery-3.1.1.min.js" type="text/javascript"></script>
	<script src="js/alta_usuario.js" type="text/javascript"></script>
</head>

	
<body>
    <?php 
    if(isset($_SESSION['ADMIN'])){
    	include_once("navegacion_ADMIN.php"); 
    }else{
    	include_once("navegacion.php");
    }
    ?>
    
    
    <div id="div_errores" class="error"></div>
    
       	    <center>

    <div class="col-5 col-tab-5 myTable">
    
   	 			 
			 
 
    <div>
    	<form action="perfil.php" id="formularioPerfil" method="POST" >
    	
    		<div>
    			<label>Nombre Completo:</label>
				<input oninput="nameValidation()" type="text" id="nombreCompletoUsuario" name="nombreCompletoUsuario" value="<?php echo $nameUser?>" ><br>
			</div>
			<div><label>Usuario:</label>
				<input oninput="nickValidation()" type="text" id="nickUsuario" name="nickUsuario" value="<?php echo $nickUsuario?>" ><br>
			</div>
			<div><label>Email:</label>
				<input oninput="emailValidation()" type="text" id="emailUsuario" name="emailUsuario" value="<?php echo $mailUser?>" ><br>
			</div>
			<div><label>DNI/NIF:</label>
				<input readonly="" type="text" id="dni" name="dni" value="<?php echo $dniUser?>" ><br>
			</div>
			<div><label>Numero Teléfono:</label>
				<input readonly="" oninput="phoneValidation()" type="text" id="numTelefonoUsuario" name="numTelefonoUsuario" value="<?php echo $numUser?>" ><br>
			</div>
			<div><label>Contraseña Actual:</label>
				<input type="text" id="pass" name="pass" value="<?php echo $passUser?>" ><br>
			</div>
				<input class="changeProfile" type="submit" name="submitPerfil" value="Modificar Perfil">
				</form>
    </div>
    	&nbsp
		&nbsp
		&nbsp
		&nbsp
		&nbsp
		&nbsp
    

	
		<form action="perfil.php" id="cambiarPassPerfil" method="POST">
  			<label>Nueva Contraseña:</label><input oninput="passwordValidation()" onkeyup="passwordColor()" class="passUsuario" type="password" id="passUsuario" name="passUsuario" value=""><br>
  			<label>Confirmar Contraseña:</label><input oninput="retypeValidation()" class="confirmPassUsuario" type="password" id="confirmPassUsuario" name="confirmPassUsuario" value=""><br>
  			<input class="changePass" type="submit" name="submitPass" value="Cambiar Contraseña">
		</form> 
	</div>
	</center>
</body>
</html>