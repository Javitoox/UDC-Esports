<?php
	session_start();

	require_once("gestionBD.php");
	require_once("gestionarUsuarios.php");

    //Comprobamos que para llegar aquí antes se ha tenido que pasar por el registro
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
	
	//Comprobamos si hay errores de validación
	if (count($errores)>0) {
		$_SESSION["errores"] = $errores;
		Header('Location: registro.php');
	} else
		Header('Location: accion.php');

// Validación en servidor del formulario de alta de usuario
function validarDatosUsuario($conexion, $nuevoUsuario){
	$errores=array();
	
	//Validación NIF
	if($nuevoUsuario["dniUsuario"]=="") 
		$errores[] = "<p>El NIF no puede estar vacío.</p>";
	else if(!preg_match("/^[0-9]{8}[A-Z]$/", $nuevoUsuario["dniUsuario"])){
		$errores[] = "<p>El NIF debe contener 8 números y una letra mayúscula: " . $nuevoUsuario["dniUsuario"]. ".</p>";
	}
	//Validación Nombre			
	if($nuevoUsuario["nombreCompletoUsuario"]=="") 
		$errores[] = "<p>El nombre no puede estar vacío.</p>";
	
	//Validación Nick			
	if($nuevoUsuario["nickUsuario"]=="") 
		$errores[] = "<p>El nick no puede estar vacío.</p>";	
	
	//Validación Email
	if($nuevoUsuario["emailUsuario"]==""){ 
		$errores[] = "<p>El email no puede estar vacío.</p>";
	}else if(!filter_var($nuevoUsuario["emailUsuario"], FILTER_VALIDATE_EMAIL)){
		$errores[] = "<p>El email es incorrecto: " . $nuevoUsuario["emailUsuario"]. ".</p>";
	}
		
	//Validación Número Telefónico
	if($nuevoUsuario["numTelefonoUsuario"]==""){ 
		$errores[] = "<p>El número telefónico no puede estar vacío.</p>";
	}else if(!preg_match('/^[0-9]{9}+$/', $nuevoUsuario["numTelefonoUsuario"])){
		$errores[] = "<p>El número telefónico es incorrecto: " . $nuevoUsuario["numTelefonoUsuario"]. ".</p>";
	}
		
	//Validación Contraseña
	if(!isset($nuevoUsuario["passUsuario"]) || strlen($nuevoUsuario["passUsuario"]) < 8){
		$errores [] = "<p>Contraseña no válida: debe tener al menos 8 caracteres.</p>";
	}else if(!preg_match("/[a-z]+/", $nuevoUsuario["passUsuario"]) || 
		!preg_match("/[A-Z]+/", $nuevoUsuario["passUsuario"]) || !preg_match("/[0-9]+/", $nuevoUsuario["passUsuario"])){
		$errores[] = "<p>Contraseña no válida: debe contener letras mayúsculas y minúsculas y dígitos.</p>";
	
	//Validación Confirmación contraseña
	}else if($nuevoUsuario["passUsuario"] != $nuevoUsuario["confirmPassUsuario"]){
		$errores[] = "<p>La confirmación de contraseña no coincide con la contraseña.</p>";
	}
		
	return $errores;
}

?>