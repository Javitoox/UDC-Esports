<?php
	session_start();
  	
  	include_once("gestionBD.php");
 	include_once("gestionarUsuarios.php");
	

	if (isset($_POST['submit'])){
		$nickUsuario= $_POST['nickUsuario'];
		$passUsuario = $_POST['passUsuario'];

		$conexion = crearConexionBD();
		$num_usuarios = consultarUsuario($conexion,$nickUsuario,$passUsuario);
		cerrarConexionBD($conexion);	
	
		if ($num_usuarios == 0)
			$login = "error";	
		else {
			$_SESSION['login'] = $nickUsuario;
			Header("Location: index.php");
		}	
	}


?>

<!DOCTYPE html>
<html lang="es">
<head>
<title>Login</title>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
  <meta name="viewport" content="width=device-width; initial-scale=1.0">
  <link rel="shortcut icon" href="images/logo.png">
  <link rel="apple-touch-icon" href="images/logo.png">
  <link rel="stylesheet" type="text/css" href="css/formulario.css">
  <link rel="stylesheet" type="text/css" href="css/error_form.css">
</head>

<body>
	<?php include_once("fondo.php"); ?>
	
	<h2>INICIAR SESIÓN</h2>

	<?php if (isset($login)) {
		echo "<div class=\"error\">";
		echo "Error en la contraseña o no existe el usuario.";
		echo "</div>";
	}	
	?>
	
	<div class="col-10 col-tab-10">
	<form action="login.php" method="post">
		<div>
		<input class="campo" placeholder="Usuario" type="text" name="nickUsuario" id="nickUsuario" />
		</div>	
		<div>
		<input class="campo"  placeholder="Contraseña" type="password" name="passUsuario" id="passUsuario" />
		</div>
		<div id="boton">
		<input type="submit" value="Iniciar Sesión" />
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

