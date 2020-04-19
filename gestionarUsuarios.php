<?php

 function alta_usuario($conexion,$nuevoUsuario) {
	$resultado=true;
    try {
		$stmt = $conexion->prepare("CALL INSERTAR_USUARIOS(:dniUsuario,:nombreCompletoUsuario,:nickUsuario,:emailUsuario,:numTelefonoUsuario,:passUsuario,:confirmPassUsuario)");
		$stmt->bindParam(':dniUsuario',$nuevoUsuario['dniUsuario']);
		$stmt->bindParam(':nombreCompletoUsuario',$nuevoUsuario['nombreCompletoUsuario']);
		$stmt->bindParam(':nickUsuario',$nuevoUsuario['nickUsuario']);
		$stmt->bindParam(':emailUsuario',$nuevoUsuario['emailUsuario']);
		$stmt->bindParam(':numTelefonoUsuario',$nuevoUsuario['numTelefonoUsuario']);
		$stmt->bindParam(':passUsuario',$nuevoUsuario['passUsuario']);
		$stmt->bindParam(':confirmPassUsuario',$nuevoUsuario['confirmPassUsuario']);
		$stmt->execute();
	}catch(PDOException $e ) {
		$_SESSION['excepcion'] = "El usuario ya existe en la base de datos.".$e->GetMessage();
		$resultado=false;
	}
	return $resultado;
}

function consultarUsuario($conexion,$nickUsuario,$passUsuario) {
 	$consulta = "SELECT COUNT(*) AS TOTAL FROM USUARIOS WHERE nickUsuario=:nickUsuario AND 
 	passUsuario=:passUsuario";
	$stmt = $conexion->prepare($consulta);
	$stmt->bindParam(':nickUsuario',$nickUsuario);
	$stmt->bindParam(':passUsuario',$passUsuario);
	$stmt->execute();
	return $stmt->fetchColumn();
	
}

?>