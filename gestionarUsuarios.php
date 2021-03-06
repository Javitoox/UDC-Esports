<?php

 function alta_usuario($conexion,$nuevoUsuario) { 
	$fechaNacimiento = date('d/m/Y', strtotime($nuevoUsuario["fechaNacimientoUsuario"]));
	 
    try {
		$stmt = $conexion->prepare("CALL INSERTAR_USUARIOS(:dniUsuario,:nombreCompletoUsuario,:nickUsuario,:emailUsuario,:fechaNacimientoUsuario,:numTelefonoUsuario,:passUsuario,:confirmPassUsuario)");
		$stmt->bindParam(':dniUsuario',$nuevoUsuario['dniUsuario']);
		$stmt->bindParam(':nombreCompletoUsuario',$nuevoUsuario['nombreCompletoUsuario']);
		$stmt->bindParam(':nickUsuario',$nuevoUsuario['nickUsuario']);
		$stmt->bindParam(':emailUsuario',$nuevoUsuario['emailUsuario']);
		$stmt->bindParam(':fechaNacimientoUsuario',$fechaNacimiento);
		$stmt->bindParam(':numTelefonoUsuario',$nuevoUsuario['numTelefonoUsuario']);
		$stmt->bindParam(':passUsuario',$nuevoUsuario['passUsuario']);
		$stmt->bindParam(':confirmPassUsuario',$nuevoUsuario['confirmPassUsuario']);
		$stmt->execute();
		return asignar_seguimientos_usuario($conexion,$nuevoUsuario['dniUsuario'],$nuevoUsuario['seguimientos']);
	}catch(PDOException $e ) {
		$errores=array();
		$errores[]="<p><strong>El usuario ya existe en la aplicación.</strong></p>";
		$_SESSION['errores'] =$errores;
		return false;
	}
 }
 
 function asignar_seguimientos_usuario($conexion,$dniUsuario,$seguimientos){
 	try{
		$stmt=$conexion->prepare("CALL INSERTAR_SEGUIMIENTOS(:dniUsuario,:dniJugador,NULL)");
		//Hacemos un foreach porque un usuario puede tener más de un seguimiento.
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

 function eliminarSeguimiento($conexion, $dniUser, $dniJugador){
	try{
		$consulta = "DELETE from seguimientos where dniusuario = :dniUser and dnijugador = :dniJugador and opinion is null";
		$stmt=$conexion->prepare($consulta);
		$stmt->bindParam(':dniUser',$dniUser);
		$stmt->bindParam(':dniJugador',$dniJugador);
		$stmt->execute();
 	}catch(PDOException $e){
 		$_SESSION['excepcion'] = "Error al eliminar el seguimiento del usuario.".$e->GetMessage();
		header("Location:excepcion.php");
 	}
 }
 
 function creaSeguimiento($conexion,$dniUsuario,$dniJugador){
	try{
		$consulta = "CALL INSERTAR_SEGUIMIENTOS(:dniUsuario,:dniJugador,NULL)";
		$stmt=$conexion->prepare($consulta);
		$stmt->bindParam(':dniUsuario',$dniUsuario);
		$stmt->bindParam(':dniJugador',$dniJugador);
		$stmt->execute();
 	}catch(PDOException $e){
 		$_SESSION['excepcion'] = "Error al crear el seguimiento.".$e->GetMessage();
		header("Location:excepcion.php");
	}
 }
 function ayadeOpinion($conexion, $dniusuario, $dnijugador, $opinion){
	try{
		$consulta = "CALL INSERTAR_SEGUIMIENTOS(:dniusuario,:dnijugador,:opinion)";
		$stmt=$conexion->prepare($consulta);
		$stmt->bindParam(':dniusuario',$dniusuario);
		$stmt->bindParam(':dnijugador',$dnijugador);
		$stmt->bindParam(':opinion', $opinion);
		$stmt->execute();
 	}catch(PDOException $e){
 		$_SESSION['excepcion'] = "Error al añadir la opinión.".$e->GetMessage();
		header("Location:excepcion.php");
	}
 }
 
function obtenEmailUsuario($conexion, $nickUsuario){
        try{
            $consulta = "SELECT emailUsuario from usuarios where nickusuario =: nickUsuario";
            $stmt = $conexion->prepare($consulta);
		    $stmt->bindParam(':nickusuario',$nickUsuario);
            $stmt->execute();
		    return $stmt->fetch();
        }catch(PDOException $e){
            $_SESSION['excepcion'] = $e->GetMessage();
            header("Location: excepcion.php");
        }  
	}
function obtenNombreUsuarioPorDNI($conexion, $dniusuario){
		try{
			$consulta = "SELECT nombrecompletousuario from usuarios where dniusuario =: dniusuario";
			$stmt = $conexion->prepare($consulta);
			$stmt->bindParam('dniusuario', $dniusuario);
			$stmt->execute();
			return $stmt->fetch();
		}catch(PDOException $e){
			$_SESSION['excepcion'] = $e->GetMessage();
			header("Location: excepcion.php");
		}
}	

function obtenNumeroUsuario($conexion, $nickUsuario){
        try{
            $consulta = "SELECT numTelefonoUsuario from usuarios where nickusuario =: nickUsuario";
            $stmt = $conexion->prepare($consulta);
		    $stmt->bindParam(':nickusuario',$nickUsuario);
            $stmt->execute();
		    return $stmt->fetch();
        }catch(PDOException $e){
            $_SESSION['excepcion'] = $e->GetMessage();
            header("Location: excepcion.php");
        }  
    }
function obtenNombreUsuario($conexion, $nickUsuario){
        try{
            $consulta = "SELECT nombreCompletoUsuario from usuarios where nickusuario =: nickusuario";
            $stmt = $conexion->prepare($consulta);
		    $stmt->bindParam(':nickusuario',$nickUsuario);
            $stmt->execute();
		    return $stmt->fetch();
        }catch(PDOException $e){
            $_SESSION['excepcion'] = $e->GetMessage();
            header("Location: excepcion.php");
        }  
    }
	
function obtenPassUsuario($conexion, $nickUsuario){
        try{
            $consulta = "SELECT passUsuario from usuarios where nickusuario =: nickUsuario";
            $stmt = $conexion->prepare($consulta);
		    $stmt->bindParam(':nickusuario',$nickUsuario);
            $stmt->execute();
		    return $stmt->fetch();
        }catch(PDOException $e){
            $_SESSION['excepcion'] = $e->GetMessage();
            header("Location: excepcion.php");
        }  
    }
function obtenDniUsuarioR($conexion, $nickUsuario){
        try{
            $consulta = "SELECT dniUsuario from usuarios where nickusuario =: nickUsuario";
            $stmt = $conexion->prepare($consulta);
		    $stmt->bindParam(':nickusuario',$nickUsuario);
            $stmt->execute();
		    return $stmt->fetch();
        }catch(PDOException $e){
            $_SESSION['excepcion'] = $e->GetMessage();
            header("Location: excepcion.php");
        }  
    }	
function changePass($conexion, $userDni, $newPass){
      	 	try{
       	 	    $consulta = "UPDATE USUARIOS SET PASSUSUARIO =: newpass WHERE DNIUSUARIO =: dni";
			    $stmt = $conexion->prepare($consulta);
			    $stmt->bindParam(':dni',$userDni);
				$stmt->bindParam(':newpass',$newPass);
				$stmt->execute();
				return true;
     	   }catch(PDOException $e){
     	       $_SESSION['excepcion'] = $e->GetMessage();
			   return false;
     	   }  
    }

function changeCPass($conexion, $userDni,$pass){
      	 	try{
       	 	    $consulta = "UPDATE USUARIOS SET CONFIRMPASSUSUARIO = :pass WHERE DNIUSUARIO = :dni";
				$stmt = $conexion->prepare($consulta);
				$stmt->bindParam(':dni',$userDni);
				$stmt->bindParam(':pass',$pass);
				$stmt->execute();
				return true;
     	   }catch(PDOException $e){
     	       $_SESSION['excepcion'] = $e->GetMessage();
			   return false;
     	   }  
    }
function changeProfile($conexion,$nombre,$nick,$mail,$numt,$dni){
      	 	try{
       	 	    $consultaNombre = "UPDATE USUARIOS SET NOMBRECOMPLETOUSUARIO = :nombre WHERE DNIUSUARIO = :dni";
				$stmt = $conexion->prepare($consultaNombre);
				$stmt->bindParam(':dni',$dni);
				$stmt->bindParam(':nombre',$nombre);
				$stmt->execute();
				
				$consultaNick = "UPDATE USUARIOS SET NICKUSUARIO = :nick WHERE DNIUSUARIO = :dni";
				$stmtN = $conexion->prepare($consultaNick);
				$stmtN->bindParam(':dni',$dni);
				$stmtN->bindParam(':nick',$nick);
				$stmtN->execute();
				
				
				$consultaMail = "UPDATE USUARIOS SET EMAILUSUARIO = :mail WHERE DNIUSUARIO = :dni";
				$stmtM = $conexion->prepare($consultaMail);
				$stmtM->bindParam(':dni',$dni);
				$stmtM->bindParam(':mail',$mail);
				$stmtM->execute();
				
				$consultaTel = "UPDATE USUARIOS SET NUMTELEFONOUSUARIO = :num WHERE DNIUSUARIO = :dni";
				$stmtT = $conexion->prepare($consultaTel);
				$stmtT->bindParam(':dni',$dni);
				$stmtT->bindParam(':num',$numt);
				$stmtT->execute();

				
				return true;
     	   }catch(PDOException $e){
     	       $_SESSION['excepcion'] = $e->GetMessage();
			   return false;
     	   }  
    }
?>

