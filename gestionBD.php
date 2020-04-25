<?php

function crearConexionBD()
{
	$host="oci:dbname=localhost/XE;charset=UTF8";
	$usuario="UDC";
	$password="UDC";

	try{
		$conexion=new PDO($host,$usuario,$password,array(PDO::ATTR_PERSISTENT => true));
    	$conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		return $conexion;
	}catch(PDOException $e){
		//Reenviamos el mensajes a excepcion.php en el caso de que se produzca una excepción
		$_SESSION['excepcion'] = $e->GetMessage();
		header("Location:excepcion.php");
	}
}

function cerrarConexionBD($conexion){
	$conexion=null;
}

?>