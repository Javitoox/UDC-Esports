<?php
	session_start();

	require_once("gestionBD.php");
	require_once("gestionarUsuarios.php");

	if (isset($_SESSION["formulario"])) {
		$nuevoUsuario["dniUsuario"] = $_REQUEST["dniUsuario"];
		$nuevoUsuario["nombreCompletoUsuario"] = $_REQUEST["nombreCompletoUsuario"];
		$nuevoUsuario["nickUsuario"] = $_REQUEST["nickUsuario"];
		$nuevoUsuario["emailUsuario"] = $_REQUEST["emailUsuario"];
		$nuevoUsuario["numTelefonoUsuario"] = $_REQUEST["numTelefonoUsuario"];
		$nuevoUsuario["passUsuario"] = $_REQUEST["passUsuario"];
		$nuevoUsuario["confirmPassUsuario"] = $_REQUEST["confirmPassUsuario"];
		
		$_SESSION["formulario"] = $nuevoUsuario;		
	}
	else 
		Header("Location: registro.php");

	$conexion = crearConexionBD();                                         
	$errores = validarDatosUsuario($conexion, $nuevoUsuario);
	cerrarConexionBD($conexion);
	
	if (count($errores)>0) {
		$_SESSION["errores"] = $errores;
		Header('Location: registro.php');
	} else
		Header('Location: login.php');

///////////////////////////////////////////////////////////
// Validación en servidor del formulario de alta de usuario
///////////////////////////////////////////////////////////


function validarDatosUsuario($conexion, $nuevoUsuario){
	$errores=array();
	
	// Validación del NIF
	if($nuevoUsuario["dniUsuario"]=="") 
		$errores[] = "<p>El NIF no puede estar vacío</p>";
	else if(!preg_match("/^[0-9]{8}[A-Z]$/", $nuevoUsuario["dniUsuario"])){
		$errores[] = "<p>El NIF debe contener 8 números y una letra mayúscula: " . $nuevoUsuario["dniUsuario"]. "</p>";
	}
	// Validación del Nombre			
	if($nuevoUsuario["nombreCompletoUsuario"]=="") 
		$errores[] = "<p>El nombre no puede estar vacío</p>";
	
	// Validación del Nick			
	if($nuevoUsuario["nickUsuario"]=="") 
		$errores[] = "<p>El nick no puede estar vacío</p>";	
	
	// Validación del email
	if($nuevoUsuario["emailUsuario"]==""){ 
		$errores[] = "<p>El email no puede estar vacío</p>";
	}else if(!filter_var($nuevoUsuario["emailUsuario"], FILTER_VALIDATE_EMAIL)){
		$errores[] = "<p>El email es incorrecto: " . $nuevoUsuario["emailUsuario"]. "</p>";
	}
		
	// Validación del Número Telefónico
	if($nuevoUsuario["numTelefonoUsuario"]==""){ 
		$errores[] = "<p>El número telefónico no puede estar vacío.</p>";
	}else if(!preg_match('/^[0-9]{9}+$/', $nuevoUsuario["numTelefonoUsuario"])){
		$errores[] = "<p>El número telefónico es incorrecto: " . $nuevoUsuario["numTelefonoUsuario"]. "</p>";
	}
		
	// Validación de la contraseña
	if(!isset($nuevoUsuario["passUsuario"]) || strlen($nuevoUsuario["passUsuario"]) < 8){
		$errores [] = "<p>Contraseña no válida: debe tener al menos 8 caracteres.</p>";
	}else if(!preg_match("/[a-z]+/", $nuevoUsuario["passUsuario"]) || 
		!preg_match("/[A-Z]+/", $nuevoUsuario["passUsuario"]) || !preg_match("/[0-9]+/", $nuevoUsuario["passUsuario"])){
		$errores[] = "<p>Contraseña no válida: debe contener letras mayúsculas y minúsculas y dígitos.</p>";
	
	// Validación de la cofirmación de contraseña
	}else if($nuevoUsuario["passUsuario"] != $nuevoUsuario["confirmPassUsuario"]){
		$errores[] = "<p>La confirmación de contraseña no coincide con la contraseña.</p>";
	}
	
	// Validación de BD
	$dniUsuario=$nuevoUsuario["dniUsuario"];
	$emailUsuario=$nuevoUsuario["emailUsuario"];
	$nickUsuario=$nuevoUsuario["nickUsuario"];
	$numTelefonoUsuario=$nuevoUsuario["numTelefonoUsuario"];
	//----------------------------------------------------------------------------
	$columnasNIF=RepUsuario($conexion,$dniUsuario);
	$columnasMail=RepMail($conexion,$emailUsuario);
	$columnasNick=RepNick($conexion,$nickUsuario);
	$columnasNT=RepNT($conexion,$numTelefonoUsuario);
	
	
	if($columnasNIF || $columnasMail || $columnasNick || $columnasNT)
		$errores[] = "<p>El usuario ya existe.</p>";
}

function RepUsuario($conexion,$dniUsuario) {
 	$consulta = "SELECT COUNT(*) AS TOTAL FROM USUARIOS WHERE dniUsuario=:dniUsuario ";
	$stmt = $conexion->prepare($consulta);
	$stmt->bindParam(':dniUsuario',$dniUsuario);
	$stmt->execute();
	return $stmt->fetchColumn();
	
}

function RepMail($conexion,$emailUsuario) {
 	$consulta = "SELECT COUNT(*) AS TOTAL FROM USUARIOS WHERE emailUsuario=:emailUsuario ";
	$stmt = $conexion->prepare($consulta);
	$stmt->bindParam(':emailUsuario',$emailUsuario);
	$stmt->execute();
	return $stmt->fetchColumn();
	
}

function RepNick($conexion,$nickUsuario) {
 	$consulta = "SELECT COUNT(*) AS TOTAL FROM USUARIOS WHERE nickUsuario=:nickUsuario ";
	$stmt = $conexion->prepare($consulta);
	$stmt->bindParam(':nickUsuario',$nickUsuario);
	$stmt->execute();
	return $stmt->fetchColumn();
	
}
function RepNT($conexion,$numTelefonoUsuario) {
 	$consulta = "SELECT COUNT(*) AS TOTAL FROM USUARIOS WHERE numTelefonoUsuario=:numTelefonoUsuario ";
	$stmt = $conexion->prepare($consulta);
	$stmt->bindParam(':numTelefonoUsuario',$numTelefonoUsuario);
	$stmt->execute();
	return $stmt->fetchColumn();
	
}

?>

