<?php
	session_start();
  	
  	include_once("gestionBD.php");
 	include_once("gestionarUsuarios.php");
	
    //Comprobamos si el usuario le ha dado ha Inciar Sesión
	if (isset($_POST['submit'])){
		$nickUsuario= $_POST['nickUsuario'];
		$passUsuario = $_POST['passUsuario'];

		$conexion = crearConexionBD();
		$num_usuarios = consultarUsuario($conexion,$nickUsuario,$passUsuario);
		cerrarConexionBD($conexion);	
	    
		//Si la variable es cero significa que no se ha encontrado el usuario
		if (!$num_usuarios){
			$login = "error";
		}
		else {
			$_SESSION['login'] = $nickUsuario;
			//Controlamos el inicio de sesión del administrador
			if($passUsuario=="ADMIN_JHSIJhdskhu65dhUHD76Ahusuhads6"){
				$_SESSION['ADMIN']="1";
			}
			//A continuación enviaremos el usuario a la pantalla de inicio
			Header("Location: index.php");
		}	
	}
?>

<!DOCTYPE html>
<html lang="es">
<head>
<title>Login</title>
	<?php include_once("headComun.php"); ?>
  	<link rel="stylesheet" type="text/css" href="css/formulario.css">
  	<link rel="stylesheet" type="text/css" href="css/error_form.css">
  	<script src="https://code.jquery.com/jquery-3.1.1.min.js" type="text/javascript"></script>
	<script src="js/alta_usuario.js" type="text/javascript"></script>
</head>

<body>
	<?php include_once("fondo.php"); ?>
	
	<h2>INICIAR SESIÓN</h2>
     
	<div id="div_errores" class="error">
		<?php
		if (isset($login)) {
		//Mostramos los errores en el caso de que los haya
		echo "<p><strong>Error en la contraseña o no existe el usuario.</strong></p>";
	    }?>
	</div>
	
	<div class="col-10 col-tab-10">
	<form action="login.php" method="post" id="login_formulario">
		<div>
		<input class="campo" placeholder="Usuario" maxlength="40" type="text" oninput="nickValidation()" name="nickUsuario" id="nickUsuario" value="<?php echo isset($nickUsuario)?$nickUsuario:'';?>" required/>
		</div>	
		<div>
		<input class="campo"  placeholder="Contraseña" type="password" oninput="passwordValidation()" name="passUsuario" id="passUsuario" value="<?php echo isset($passUsuario)?$nickUsuario:'';?>" required/>
		</div>
		<div id="boton">
		<input name="submit" type="submit" value="Iniciar Sesión" />
		</div>
	</form>
	
	<div id="pie">
	<a href="registro.php">Regístrate</a>
	<a href="https://twitter.com/udcesports?lang=es">Twitter</a>
	<a href="https://www.instagram.com/udcesports/">Instagram</a>
	<a href="https://www.twitch.tv/udconstantinaesports/">Twitch</a>
	</div>
	</div>

</body>
</html>