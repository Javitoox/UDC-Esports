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
<title>Error</title>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
  <meta name="viewport" content="width=device-width; initial-scale=1.0">
  <link rel="shortcut icon" href="images/logo.png">
  <link rel="apple-touch-icon" href="images/logo.png">
  <link rel="stylesheet" type="text/css" href="css/login.css" />
  <title>Login</title>
</head>

<body>



<main>

	<?php if (isset($login)) {
		echo "<div class=\"error\">";
		echo "Error en la contraseña o no existe el usuario.";
		echo "</div>";
	}	
	?>
	
	<form action="login.php" method="post">
		<div>
		<input placeholder="Usuario:" type="text" name="nickUsuario" id="nickUsuario" />
		</div>	
		<div>
		<input  placeholder="Contraseña: " type="password" name="passUsuario" id="passUsuario" />
		</div>
		
		<input type="submit" name="submit" value="submit" />
	</form>
		
	<p>¿No estás registrado? <a href="registro.php">¡Registrate!</a></p>
</main>


</body>
</html>

