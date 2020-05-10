<?php
	session_start();
	
	require_once("gestionBD.php");
	require_once("gestionJugadores.php");

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
	}
?>

<!DOCTYPE html>
<html lang="es">
<head>
<title>Registro</title>
	<?php include_once("headComun.php"); ?>
	<link rel="stylesheet" type="text/css" href="css/formulario.css">
	<link rel="stylesheet" type="text/css" href="css/error_form.css">
</head>
<body>
	<?php include_once("fondo.php"); ?>
	
	<h2>REGÍSTRATE</h2>
	
	<?php 
		if (isset($errores) && count($errores)>0) {
			//Mostramos los errores en el caso de que los haya 
	    	echo "<div id=\"div_errores\" class=\"error\">";
			echo "<h4> Errores en el formulario:</h4>";
    		foreach($errores as $error) echo $error; 
    		echo "</div>";
  		}
	?>
	
	<div class="col-10 col-tab-10">
	<form method="get" action="validacion.php" novalidate>
		<div>
			<input class="campo" name="dniUsuario" type="text" placeholder="DNI/NIF" value="<?php echo $formulario['dniUsuario'];?>" required>
		</div>
		<div>
			<input class="campo" name="nombreCompletoUsuario" type="text" placeholder="Nombre Completo" maxlength="80" value="<?php echo $formulario['nombreCompletoUsuario'];?>" required/>
		</div>
		<div>
			<input class="campo" name="nickUsuario" type="text" placeholder="Usuario" maxlength="40" value="<?php echo $formulario['nickUsuario'];?>" required/>
		</div>
		<div>
			<input class="campo" name="emailUsuario" type="emailUsuario" placeholder="Email" value="<?php echo $formulario['emailUsuario'];?>" required/>
		</div>
		<div>
			<input class="campo" name="fechaNacimientoUsuario" type="date" placeholder="Fecha de nacimiento" value="<?php echo $formulario['fechaNacimientoUsuario'];?>" required/>
		</div>
		<div>
			<input class="campo" name="numTelefonoUsuario" type="tel" placeholder="Teléfono" value="<?php echo $formulario['numTelefonoUsuario'];?>" required/>
		</div>
		<div>
			<input class="campo" name="passUsuario" type="password" placeholder="Contraseña" value="<?php echo $formulario["passUsuario"];?>" required/>
		</div>
		<div>
			<input class="campo" name="confirmPassUsuario" type="password" placeholder="Confirmar contraseña" value="<?php echo $formulario["confirmPassUsuario"];?>" required/>
		</div>
		<div><label id="seg" for="seguimientos"><strong>¿Tienes algún jugador favorito?¡Te recomendamos estos!</strong></label><br/>
				<select multiple name="seguimientos[]" id="seguimientos" required>
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