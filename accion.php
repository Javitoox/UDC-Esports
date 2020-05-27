<?php
	session_start();

	require_once("gestionBD.php");
	require_once("gestionarUsuarios.php");
		
	//Comprobar que hemos llegado a esta página porque se ha rellenado el formulario
	if (isset($_SESSION["formulario"])) {
		$nuevoUsuario = $_SESSION["formulario"];
		//Eliminamos las variables que no vamos a necesitar por ahora
		unset($_SESSION['formulario']);
		unset($_SESSION['errores']);
	}
	else 
		Header("Location:registro.php");	

	$conexion = crearConexionBD(); 
	
?>

<!DOCTYPE html>
<html lang="es">
<head>
<title>Acción</title>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
  <meta name="viewport" content="width=device-width; initial-scale=1.0">
  <link rel="shortcut icon" href="images/logo.png">
  <link rel="apple-touch-icon" href="images/logo.png">
</head>

<body>
	<?php
		include_once("fondo.php");

		/*Comprobamos que el nuevo usuario no existe ya en la base de datos(debe tener distinto
		nickUsuario, dniUsuario, emailUsuario y numTelefonoUsuario)*/
			
		if (alta_usuario($conexion, $nuevoUsuario)){
			$_SESSION["login"]=$nuevoUsuario["nickUsuario"];
			//Controlamos el inicio de sesión del administrador
			if($nuevoUsuario["passUsuario"]=="ADMIN_JHSIJhdskhu65dhUHD76Ahusuhads6"){
				$_SESSION['ADMIN']="1";
			}
			//A continuación enviaremos a la página de inicio
	        header("Location: index.php");
		}else { 
		header("Location: registro.php");
        }
	?>
</body>
</html>
<?php
	cerrarConexionBD($conexion);
?>