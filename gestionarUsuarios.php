<?php

 function alta_usuario($conexion,$dniUsuario,$nombreCompletoUsuario,$nickUsuario,$emailUsuario,$numTelefonoUsuario,$passUsuario,$confirmPassUsuario) {

	
		$resultado=true;
		$columnas=consultarUsuario($conexion,$dniUsuario);		
		if (!$columnas){
			try {
				$stmt = $conexion->prepare("CALL INSERTAR_USUARIOS(:dniUsuario,:nombreCompletoUsuario,:nickUsuario,:emailUsuario,:numTelefonoUsuario,:passUsuario,:confirmPassUsuario)");
				$stmt->bindParam(':dniUsuario',$dniUsuario);
				$stmt->bindParam(':nombreCompletoUsuario',$nombreCompletoUsuario);
				$stmt->bindParam(':nickUsuario',$nickUsuario);
				$stmt->bindParam(':emailUsuario',$emailUsuario);
				$stmt->bindParam(':numTelefonoUsuario',$numTelefonoUsuario);
				$stmt->bindParam(':passUsuario',$passUsuario);
				$stmt->bindParam(':confirmPassUsuario',$confirmPassUsuario);
				$stmt->execute();
			}catch(PDOException $e ) {
				echo "El usuario no puede ser añadido." . $e->GetMessage();
			}
		} else{
			$resultado=false;

		}	
			
	$fila = null;
	$usuarios=null;
	return $resultado;
}

function consultarUsuario($conexion,$dniUsuario) {
 	$consulta = "SELECT COUNT(*) AS TOTAL FROM USUARIOS WHERE dniUsuario=:dniUsuario ";
	$stmt = $conexion->prepare($consulta);
	$stmt->bindParam(':dniUsuario',$dniUsuario);
	$stmt->execute();
	return $stmt->fetchColumn();
	
}
