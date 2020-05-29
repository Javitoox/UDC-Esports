<?php
	session_start();
	
	require_once("gestionBD.php");
	require_once("gestionMiembros.php");

    //En el caso de que no exista sesión asignamos valores por defecto
	if (!isset($_SESSION['formulario'])) {
		$formulario['dniUsuario'] = "";
		$formulario['nombreCompletoUsuario'] = "";
		$formulario['nickUsuario'] = "";
		$formulario['emailUsuario'] = "";
		$formulario['fechaNacimientoUsuario'] = "";
		$formulario['numTelefonoUsuario'] = "";
		$formulario['passUsuario'] = "";
		$formulario['confirmPassUsuario'] = "";
		$formulario['seguimientos']=array();
	
		$_SESSION['formulario'] = $formulario;
	}else{
		$formulario = $_SESSION['formulario'];
	}
	
	//Comprobamos si han llegado errores de validación		
	if (isset($_SESSION['errores'])){
		$errores = $_SESSION['errores'];
		unset($_SESSION["errores"]);
	}
?>

<!DOCTYPE html>
<html lang="es">
<head>
<title>Registro</title>
	<?php include_once("headComun.php"); ?>
	<link rel="stylesheet" type="text/css" href="css/formulario.css">
	<link rel="stylesheet" type="text/css" href="css/error_form.css">
	<script src="https://code.jquery.com/jquery-3.1.1.min.js" type="text/javascript"></script>
	<script src="js/alta_usuario.js" type="text/javascript"></script>
</head>
<body>
	<?php include_once("fondo.php"); ?>
	
	<h2>REGÍSTRATE</h2>
	
	<div id="div_errores" class="error">
		<?php
		if (isset($errores) && count($errores)>0) {
			//Mostramos los errores en el caso de que los haya 
    		foreach($errores as $error) echo $error; 
  		}
	    ?>
	</div>
	
	<div class="col-10 col-tab-10">
	<form method="get" action="validacion.php" id="registro_formulario">
		<div>
			<input oninput="nifValidation()" class="campo" name="dniUsuario" id="dniUsuario" type="text" placeholder="DNI/NIF" value="<?php echo $formulario['dniUsuario'];?>" required>
		</div>
		<div>
			<input oninput="nameValidation()" class="campo" name="nombreCompletoUsuario" id="nombreCompletoUsuario" type="text" placeholder="Nombre Completo" maxlength="80" value="<?php echo $formulario['nombreCompletoUsuario'];?>" required/>
		</div>
		<div>
			<input oninput="nickValidation()" class="campo" name="nickUsuario" id="nickUsuario" type="text" placeholder="Usuario" maxlength="40" value="<?php echo $formulario['nickUsuario'];?>" required/>
		</div>
		<div>
			<input oninput="emailValidation()" class="campo" name="emailUsuario" id="emailUsuario" type="email" placeholder="Email" value="<?php echo $formulario['emailUsuario'];?>" required/>
		</div>
		<div>
			<input oninput="dateValidation()" class="campo" name="fechaNacimientoUsuario" id="fechaNacimientoUsuario" type="date" placeholder="Fecha de nacimiento" value="<?php echo $formulario['fechaNacimientoUsuario'];?>" required/>
		</div>
		<div>
			<input oninput="phoneValidation()" class="campo" name="numTelefonoUsuario" id="numTelefonoUsuario" type="tel" placeholder="Teléfono" value="<?php echo $formulario['numTelefonoUsuario'];?>" required/>
		</div>
		<div>
			<input oninput="passwordValidation()" onkeyup="passwordColor()" class="campo" name="passUsuario" id="passUsuario" type="password" placeholder="Contraseña" value="<?php echo $formulario["passUsuario"];?>" required/>
		</div>
		<div>
			<input oninput="retypeValidation()" class="campo" name="confirmPassUsuario" id="confirmPassUsuario" type="password" placeholder="Confirmar contraseña" value="<?php echo $formulario["confirmPassUsuario"];?>" required/>
		</div>
		<div><label id="seg" for="seguimientos"><strong>¿Tienes algún jugador favorito?¡Te recomendamos estos!</strong></label><br/>
				<select multiple name="seguimientos[]" id="seguimientos">
					<?php
					$conexion = crearConexionBD();  
					//Obtenemos a los mejores jugadores del club según los partidos ganados y los mostramor para elegir
						$jugadores = listarMejoresJugadores($conexion);

				  		foreach($jugadores as $jugador) {  
				  			if(in_array($jugador['DNIJUGADOR'], $formulario['seguimientos'])){ 
								echo "<option value='".$jugador["DNIJUGADOR"]."' label='".$jugador["NOMBREVIRTUALJUGADOR"]."' selected/>";
							}else{
								echo "<option value='".$jugador["DNIJUGADOR"]."' label='".$jugador["NOMBREVIRTUALJUGADOR"]."'/>";
							}
						}
					cerrarConexionBD($conexion);
					?>
				</select>
		</div>
		
		<div id="boton">
		    <input type="submit" value="Regístrate"/>
		</div>
		
	</form>
	</div>
	
</body>
</html>