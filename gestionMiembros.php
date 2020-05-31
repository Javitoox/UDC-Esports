<?php
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
            $consulta = "SELECT * from seguimientos where dniusuario = :dniusuario and dnijugador = :dnijugador and opinion is null";
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
	
    function insertaEntrenador($conexion,$oid_videojuego, $dniEntrenador, $nombre, $numTelefono, $correo, $nacionalidad, 
    $salario, $numExperiencia){
		try{
			$consulta = "CALL INSERTAR_ENTRENADORES(:dnientrenador,:nombreentrenador,:salarioentrenador,:numtelefonoentrenador,:numañosexperienciaentrenador,:correoelectronicoentrenador,
			:nacionalidadentrenador,:oid_v)";
			$stmt=$conexion->prepare($consulta);
			$stmt->bindParam(':oid_v',$oid_videojuego);
			$stmt->bindParam(':dnientrenador',$dniEntrenador);
			$stmt->bindParam(':nombreentrenador', $nombre);
			$stmt->bindParam(':salarioentrenador', $salario);
			$stmt->bindParam(':numtelefonoentrenador', $numTelefono);
			$stmt->bindParam(':correoelectronicoentrenador', $correo);
			$stmt->bindParam(':nacionalidadentrenador', $nacionalidad);
			$stmt->bindParam(':numañosexperienciaentrenador', $numExperiencia);

			$stmt->execute();
			return true;
		 }catch(PDOException $e){
			 $_SESSION['excepcion'] = "Error al añadir el entrenador.".$e->GetMessage();
			return false;
		 }
    }
    function insertaOjeador($conexion,$oid_videojuego, $dniOjeador, $nombre, $numTelefono, $correo, 
    $nacionalidad, $salario, $numExperiencia){
        try{
			$consulta = "CALL INSERTAR_OJEADORES(:dniojeador,:nombreojeador,:salarioojeador,:numtelefonoojeador,:numañosexperienciaojeador,:correoelectronicoojeador,
			:nacionalidadojeador,:oid_v)";
			$stmt=$conexion->prepare($consulta);
			$stmt->bindParam(':oid_v',$oid_videojuego);
			$stmt->bindParam(':dniojeador',$dniOjeador);
			$stmt->bindParam(':nombreojeador', $nombre);
			$stmt->bindParam(':salarioojeador', $salario);
			$stmt->bindParam(':numtelefonoojeador', $numTelefono);
			$stmt->bindParam(':correoelectronicoojeador', $correo);
			$stmt->bindParam(':nacionalidadojeador', $nacionalidad);
			$stmt->bindParam(':numañosexperienciaojeador', $numExperiencia);

			$stmt->execute();
			return true;
		 }catch(PDOException $e){
			 $_SESSION['excepcion'] = "Error al añadir el ojeador.".$e->GetMessage();
			return false;
		 }
	}
	function dniOjeadores($conexion){
		try{
			$consulta="SELECT dniojeador from ojeadores";
			$stmt = $conexion->prepare($consulta);
			$stmt->execute();
			return $stmt;
		}catch(PDOException $e){
			
			$_SESSION['excepcion'] = $e->GetMessage();
            header("Location: excepcion.php");
			
		}
	}
	function jugadoresFichados($conexion,$fecha){
		try{
			$consulta="SELECT nombrejugador from
						(SELECT nombrevirtual,oid_v videojuego,clausula,club from posiblesfichajes natural join ojeadores natural join videojuegos)
						natural join jugadores where nombrevirtual=nombrevirtualjugador and videojuego=oid_v and (fechaentrada between :fecha and sysdate)";
			$stmt = $conexion->prepare($consulta);
			$stmt->bindParam(':fecha',$fecha);			
			
			$stmt->execute();
			return $stmt;
		}catch(PDOException $e){
			
			$_SESSION['excepcion'] = $e->GetMessage();
            header("Location: excepcion.php");
			
		}
		
	}
	function posiblesFichajes($conexion,$dni){
		try{
			$consulta="select nombreVirtual from posiblesfichajes  
						natural join ojeadores natural join videojuegos where dniOjeador= :dni and nombreVirtual not in 
						(select nombreVirtualJugador from jugadores natural join videojuegos where oid_v=oid_v)";
			$stmt = $conexion->prepare($consulta);
			$stmt->bindParam(':dni',$dni);			
			$stmt->execute();
			return $stmt;
		}catch(PDOException $e){
			
			$_SESSION['excepcion'] = $e->GetMessage();
            header("Location: excepcion.php");
			
		}	
	}
?>
