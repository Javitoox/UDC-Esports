<?php
    
	function obtenJugador($conexion){
        try{
            $consulta = "SELECT * from jugadores";
            $stmt = $conexion->query($consulta);
            return $stmt;
        }catch(PDOException $e){
            $_SESSION['excepcion'] = $e->GetMessage();
            header("Location: excepcion.php");
        }   
    }

    function obtenNumVictorias($conexion, $oid_v){
        try{
            $consulta = "SELECT oid_v, count(distinct nombrecompeticion) as cuenta from competiciones natural join 
            partidos natural join videojuegos where oid_v=:oid_v and ganada='1' group by oid_v";
            $stmt = $conexion->prepare($consulta);
		    $stmt->bindParam(':oid_v',$oid_v);
            $stmt->execute();
		    return $stmt->fetch();
        }catch(PDOException $e){
            $_SESSION['excepcion'] = $e->GetMessage();
            header("Location: excepcion.php");
        } 
    }

    function obtenEntrenadores($conexion){
        try{
            $consulta = "SELECT * from entrenadores";
            $stmt = $conexion->query($consulta);
            return $stmt;
        }catch(PDOException $e){
            $_SESSION['excepcion'] = $e->GetMessage();
            header("Location: excepcion.php");
        }  
    }

    function obtenOjeadores($conexion){
        try{
            $consulta = "SELECT * from ojeadores";
            $stmt = $conexion->query($consulta);
            return $stmt;
        }catch(PDOException $e){
            $_SESSION['excepcion'] = $e->GetMessage();
            header("Location: excepcion.php");
        }  
    }

    function obtenDniUsuario($conexion, $nickUsuario){
        try{
            $consulta = "SELECT dniusuario from usuarios where nickusuario =: nickUsuario";
            $stmt = $conexion->prepare($consulta);
		    $stmt->bindParam(':nickusuario',$nickUsuario);
            $stmt->execute();
		    return $stmt->fetch();
        }catch(PDOException $e){
            $_SESSION['excepcion'] = $e->GetMessage();
            header("Location: excepcion.php");
        }  
    }

    function existeSeguimiento($conexion, $dniusuario, $dnijugador){
        try{
            $consulta = "SELECT * from seguimientos where dniusuario =: dniusuario and dnijugador =: dnijugador";
            $stmt = $conexion->prepare($consulta);
            $stmt->bindParam(':dniusuario',$dniusuario);
            $stmt->bindParam(':dnijugador',$dnijugador);
            $stmt->execute();
		    return $stmt->fetch();
        }catch(PDOException $e){
            $_SESSION['excepcion'] = $e->GetMessage();
            header("Location: excepcion.php");
        }  
    }

    function obtenOID_SEG($conexion, $dniusuario, $dnijugador){
        try{
            $consulta = "SELECT distinct oid_seg from seguimientos where dnijugador =:dnijugador  and dniusuario=: dniusuario";
            $stmt = $conexion->prepare($consulta);
            $stmt->bindParam(':dniusuario',$dniusuario);
            $stmt->bindParam(':dnijugador',$dnijugador);
            $stmt->execute();
		    return $stmt->fetch();
        }catch(PDOException $e){
            $_SESSION['excepcion'] = $e->GetMessage();
            header("Location: excepcion.php");
        }  
    }

    function tieneSeguimiento($conexion, $dnijugador){
        try{
            $consulta = "SELECT nombrevirtualjugador, opinion, dniusuario from jugadores natural join seguimientos where dnijugador=:dnijugador";
            $stmt = $conexion->prepare($consulta);
            $stmt->bindParam(':dnijugador',$dnijugador);
            $stmt->execute();
		    return $stmt;
        }catch(PDOException $e){
            $_SESSION['excepcion'] = $e->GetMessage();
            header("Location: excepcion.php");
        }  
    }
    function obtenOID_V_Mejores($conexion, $nombrevirtualjugador){
        try{
            $consulta = "SELECT oid_v from jugadores where nombrevirtualjugador=:nombrevirtualjugador";
            $stmt = $conexion->prepare($consulta);
            $stmt->bindParam('nombrevirtualjugador', $nombrevirtualjugador);
            $stmt->execute();
		    return $stmt->fetch();
        }catch(PDOException $e){
            $_SESSION['excepcion'] = $e->GetMessage();
            header("Location: excepcion.php");
        }
    }

    function eliminaEntrenador($conexion, $dnientrenador){
		try{
            $consulta = "DELETE from entrenadores where dnientrenador =: dnientrenador";
			$stmt = $conexion->prepare($consulta);
			$stmt->bindParam(':dnientrenador',$dnientrenador);
			$stmt->execute();
            return true;
		}catch(PDOException $e){
			$_SESSION['excepcion'] = "Error al borrar al entrenador.".$e->GetMessage();
			return false;
		}
    }

    function eliminaOjeador($conexion, $dniojeador){
		try{
            $consulta = "DELETE from ojeadores where dniojeador =: dniojeador";
			$stmt = $conexion->prepare($consulta);
			$stmt->bindParam(':dniojeador',$dniojeador);
			$stmt->execute();
            return true;
		}catch(PDOException $e){
			$_SESSION['excepcion'] = "Error al borrar al ojeador.".$e->GetMessage();
			return false;
		}
    }

    function obtenJugadorPorDni($conexion, $dnijugador){
        try{
            $consulta = "SELECT * from jugadores where dnijugador=:dnijugador";
            $stmt = $conexion->prepare($consulta);
            $stmt->bindParam('dnijugador', $dnijugador);
            $stmt->execute();
		    return $stmt->fetch();
        }catch(PDOException $e){
            $_SESSION['excepcion'] = $e->GetMessage();
            header("Location: excepcion.php");
        }
    }

    function obtenEntrenadorPorDni($conexion, $dnientrenador){
        try{
            $consulta = "SELECT * from entrenadores where dnientrenador=:dnientrenador";
            $stmt = $conexion->prepare($consulta);
            $stmt->bindParam('dnientrenador', $dnientrenador);
            $stmt->execute();
		    return $stmt->fetch();
        }catch(PDOException $e){
            $_SESSION['excepcion'] = $e->GetMessage();
            header("Location: excepcion.php");
        }
    }
    
    function obtenOjeadorPorDni($conexion, $dniojeador){
        try{
            $consulta = "SELECT * from ojeadores where dniojeador=:dniojeador";
            $stmt = $conexion->prepare($consulta);
            $stmt->bindParam('dniojeador', $dniojeador);
            $stmt->execute();
		    return $stmt->fetch();
        }catch(PDOException $e){
            $_SESSION['excepcion'] = $e->GetMessage();
            header("Location: excepcion.php");
        }
    }

	
	
	

	

	
	
    
?>
