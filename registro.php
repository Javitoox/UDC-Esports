<?php
	session_start();

	if (!isset($_SESSION['formulario'])) {
		$formulario['dniUsuario'] = "";
		$formulario['nombreCompletoUsuario'] = "";
		$formulario['nickUsuario'] = "";
		$formulario['emailUsuario'] = "";
		$formulario['numTelefonoUsuario'] = "";
		$formulario['passUsuario'] = "";
		$formulario['confirmPassUsuario'] = "";
	
		$_SESSION['formulario'] = $formulario;
	}
	
	else
		$formulario = $_SESSION['formulario'];
			
	if (isset($_SESSION['errores']))
		$errores = $_SESSION['errores'];
?>

<!DOCTYPE html>
<html lang="es">
<head>
<title>Registro</title>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<meta name="viewport" content="width=device-width; initial-scale=1.0">
	<link rel="shortcut icon" href="images/logo.png">
	<link rel="apple-touch-icon" href="images/logo.png">
	<link rel="stylesheet" type="text/css" href="css/formulario.css">
</head>
<body>
	<?php include_once("fondo.php"); ?>
	
	<?php 
		if (isset($errores) && count($errores)>0) { 
	    	echo "<div id=\"div_errores\" class=\"error\">";
			echo "<h4> Errores en el formulario:</h4>";
    		foreach($errores as $error) echo $error; 
    		echo "</div>";
  		}
	?>
	
	<h1 id="cabecera">REGÍSTRATE</h1>
	
	<form id="altaUsuario" method="get" action="validacion_alta_usuario.php" novalidate>
		
		<div>
			<input name="dniUsuario" type="text" placeholder="DNI/NIF" value="<?php echo $formulario['dniUsuario'];?>" required>
		</div>
		<div>
			<input name="nombreCompletoUsuario" type="text" placeholder="Nombre Completo" maxlength="80" value="<?php echo $formulario['nombreCompletoUsuario'];?>" required/>
		</div>
		<div>
			<input name="nickUsuario" type="text" placeholder="Usuario" maxlength="40" value="<?php echo $formulario['nickUsuario'];?>" required/>
		</div>
		<div>
			<input name="emailUsuario" type="emailUsuario" placeholder="Email" value="<?php echo $formulario['emailUsuario'];?>" required/>
		</div>
		<div>
			<input name="numTelefonoUsuario" type="tel" placeholder="Teléfono" value="<?php echo $formulario['numTelefonoUsuario'];?>" required/>
		</div>
		<div>
			<input name="passUsuario" type="password" placeholder="Contraseña" value="<?php echo $formulario["passUsuario"];?>" required/>
		</div>
		<div>
			<input name="confirmPassUsuario" type="password" placeholder="Confirmar contraseña" value="<?php echo $formulario["confirmPassUsuario"];?>" required/>
		</div>
		<div id="boton">
		    <input type="submit" value="Regístrate"/>
		</div>
		
	</form>
	
</body>
</html>