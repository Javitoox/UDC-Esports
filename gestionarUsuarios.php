<?php

 function alta_usuario($conexion,$nuevoUsuario) {
    try {
		$stmt = $conexion->prepare("CALL INSERTAR_USUARIOS(:dniUsuario,:nombreCompletoUsuario,:nickUsuario,:emailUsuario,:fechaNacimientoUsuario,:numTelefonoUsuario,:passUsuario,:confirmPassUsuario)");
		$stmt->bindParam(':dniUsuario',$nuevoUsuario['dniUsuario']);
		$stmt->bindParam(':nombreCompletoUsuario',$nuevoUsuario['nombreCompletoUsuario']);
		$stmt->bindParam(':nickUsuario',$nuevoUsuario['nickUsuario']);
		$stmt->bindParam(':emailUsuario',$nuevoUsuario['emailUsuario']);
		$stmt->bindParam(':emailUsuario',$nuevoUsuario['emailUsuario']);
		$stmt->bindParam(':fechaNacimientoUsuario',$nuevoUsuario['fechaNacimientoUsuario']);
		$stmt->bindParam(':passUsuario',$nuevoUsuario['passUsuario']);
		$stmt->bindParam(':confirmPassUsuario',$nuevoUsuario['confirmPassUsuario']);
		$stmt->execute();
		return asignar_seguimientos_usuario($conexion,$nuevoUsuario['dniUsuario'],$nuevoUsuario['seguimientos']);
	}catch(PDOException $e ) {
		$_SESSION['excepcion'] = "El usuario ya existe en la base de datos.".$e->GetMessage();
		return false;
	}
 }
 
 function asignar_seguimientos_usuario($conexion,$dniUsuario,$seguimientos){
 	try{
 		$stmt=$conexion->prepare("CALL INSERTAR_SEGUIMIENTOS(:dniUsuario,:dniJugador,NULL)");
 		foreach($seguimientos as $dniJugador){
 			$stmt->bindParam(':dniUsuario',$dniUsuario);
 			$stmt->bindParam(':dniJugador',$dniJugador);
			$stmt->execute();
 		}
		return true;
 	}catch(PDOException $e){
 		$_SESSION['excepcion'] = "Error al asignar los seguimientos del usuario.".$e->GetMessage();
		return false;
 	}
 	
 }
 

 function consultarUsuario($conexion,$nickUsuario,$passUsuario) {
	try{
	 	$consulta = "SELECT COUNT(*) AS TOTAL FROM USUARIOS WHERE nickUsuario=:nickUsuario AND 
	 	passUsuario=:passUsuario";
		$stmt = $conexion->prepare($consulta);
		$stmt->bindParam(':nickUsuario',$nickUsuario);
		$stmt->bindParam(':passUsuario',$passUsuario);
		$stmt->execute();
		return $stmt->fetchColumn();
	}catch(PDOException $e) {
		$_SESSION['excepcion'] = $e->GetMessage();
		header("Location: excepcion.php");
    }
 }

?>