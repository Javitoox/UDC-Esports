<?php
    //Listado de los mejores jugadores de cada línea de videojuego
    function listarMejoresJugadores($conexion){
		try{
			$consulta="SELECT t2.nombreVideojuego,dniJugador,nombreJugador,salarioJugador,numTelefonoJugador,numAñosExperienciaJugador,
			correoElectronicoJugador,fechaEntrada,nombreVirtualJugador,numRegalos,nacionalidadJugador
			FROM
			(SELECT nombreVideoJuego,MAX(ganados) maximo
			FROM
			(SELECT COUNT(*) ganados,dniJugador FROM Jugadores NATURAL JOIN Adscripciones NATURAL JOIN Competiciones NATURAL JOIN 
			Partidos NATURAL JOIN Estadisticas WHERE(fechaBaja>fechaHora OR fechaBaja IS NULL) AND ganado LIKE '1' GROUP BY dniJugador)
			NATURAL JOIN Jugadores NATURAL JOIN Videojuegos GROUP BY nombreVideojuego) t1 ,
			(SELECT nombreVideojuego,ganados,dniJugador,nombreJugador,salarioJugador,numTelefonoJugador,numAñosExperienciaJugador,
			correoElectronicoJugador,fechaEntrada,nombreVirtualJugador,numRegalos,nacionalidadJugador
			FROM 
			(SELECT COUNT(*) ganados,dniJugador FROM Jugadores NATURAL JOIN Adscripciones NATURAL JOIN Competiciones NATURAL JOIN 
			Partidos NATURAL JOIN Estadisticas WHERE(fechaBaja>fechaHora OR fechaBaja IS NULL) AND ganado LIKE '1' GROUP BY dniJugador)
			NATURAL JOIN Jugadores NATURAL JOIN Videojuegos) t2 WHERE t2.nombreVideojuego=t1.nombreVideojuego and t2.ganados=t1.maximo";
			$stmt = $conexion->query($consulta);
			return $stmt;
		}catch(PDOException $e) {
			$_SESSION['excepcion'] = $e->GetMessage();
			header("Location: excepcion.php");
		}
	}
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
	function eliminaJugador($conexion, $dnijugador){
		try{
            $consulta = "DELETE from jugadores where dnijugador =: dnijugador";
			$stmt = $conexion->prepare($consulta);
			$stmt->bindParam(':dnijugador',$dnijugador);
			$stmt->execute();
            return true;
		}catch(PDOException $e){
			$_SESSION['excepcion'] = "Error al borrar al jugador.".$e->GetMessage();
			return false;
		}
	}
	
	function modificaJugador($conexion, $dniJugador, $nuevoNombre, $nuevoNombreVirtual, $nuevoSalario, 
	$nuevoNumTelefono, $nuevoCorreoElectronico, $nuevaNacionalidad, $nuevaFechaEntrada, $nuevoNumExperiencia){
		try{
            $consulta = "UPDATE jugadores set salariojugador=:salariojugador,nombrejugador=:nombrejugador, numtelefonojugador=:numtelefonojugador, 
			numañosexperienciajugador=:numañosexperienciajugador,correoelectronicojugador=:correoelectronicojugador,fechaentrada=:fechaentrada, 
			nombrevirtualjugador=:nombrevirtualjugador,nacionalidadjugador=:nacionalidadjugador
			where dnijugador=:dnijugador";
			$stmt = $conexion->prepare($consulta);
			$stmt->bindParam(':dnijugador',$dniJugador);
			$stmt->bindParam(':nombrejugador',$nuevoNombre);
			$stmt->bindParam(':nombrevirtualjugador',$nuevoNombreVirtual);
			$stmt->bindParam(':salariojugador',$nuevoSalario);
			$stmt->bindParam(':numtelefonojugador',$nuevoNumTelefono);
			$stmt->bindParam(':correoelectronicojugador',$nuevoCorreoElectronico);
			$stmt->bindParam(':nacionalidadjugador',$nuevaNacionalidad);
			$stmt->bindParam(':fechaentrada',$nuevaFechaEntrada);
			$stmt->bindParam(':numañosexperienciajugador',$nuevoNumExperiencia);
			$stmt->execute();
			return true;
		}catch(PDOException $e){
			$_SESSION['excepcion'] = "Error al actualizar los datos del jugador.".$e->GetMessage();
			header("Location:excepcion.php");
		}
	}

	function modificaEntrenador($conexion,$dniEntrenador,$nuevoNombre,$nuevoSalario,$nuevoNumTelefono,
	$nuevoCorreoElectronico,$nuevaNacionalidad,$nuevoNumExperiencia){
		try{
            $consulta = "UPDATE entrenadores set salarioentrenador=:salarioentrenador, nombreentrenador=:nombreentrenador, 
			numtelefonoentrenador=:numtelefonoentrenador, numañosexperienciaentrenador=:numañosexperienciaentrenador, correoelectronicoentrenador=:correoelectronicoentrenador,
			nacionalidadentrenador=:nacionalidadentrenador where dnientrenador=:dnientrenador";
			$stmt = $conexion->prepare($consulta);
			$stmt->bindParam(':dnientrenador',$dniEntrenador);
			$stmt->bindParam(':nombreentrenador',$nuevoNombre);
			$stmt->bindParam(':salarioentrenador',$nuevoSalario);
			$stmt->bindParam(':numtelefonoentrenador',$nuevoNumTelefono);
			$stmt->bindParam(':correoelectronicoentrenador',$nuevoCorreoElectronico);
			$stmt->bindParam(':nacionalidadentrenador',$nuevaNacionalidad);
			$stmt->bindParam(':numañosexperienciaentrenador',$nuevoNumExperiencia);
			$stmt->execute();
            return true;
		}catch(PDOException $e){
			$_SESSION['excepcion'] = "Error al actualizar los datos del entrenador.".$e->GetMessage();
			header("Location:excepcion.php");
		}
	}
	
	function modificaOjeador($conexion,$dniOjeador,$nuevoNombre, $nuevoSalario, $nuevoNumTelefono, $nuevoCorreoElectronico, $nuevaNacionalidad,
	$nuevoNumExperiencia){
		try{
            $consulta = "UPDATE ojeadores SET nombreOjeador =: nombreOjeador, salarioOjeador =: salarioOjeador, 
			numTelefonoOjeador =: numTelefonoOjeador, numAñosExperienciaOjeador =: numAñosExperienciaOjeador,
			correoElectronicoOjeador =: correoElectronicoOjeador, nacionalidadOjeador =: nacionalidadOjeador
			WHERE dniOjeador =: dniOjeador";
			$stmt = $conexion->prepare($consulta);
			$stmt->bindParam(':dniOjeador',$dniOjeador);
			$stmt->bindParam(':nombreOjeador',$nuevoNombre);
			$stmt->bindParam(':salarioOjeador',$nuevoSalario);
			$stmt->bindParam(':numTelefonoOjeador',$nuevoNumTelefono);
			$stmt->bindParam(':correoElectronicoOjeador',$nuevoCorreoElectronico);
			$stmt->bindParam(':nacionalidadOjeador',$nuevaNacionalidad);
			$stmt->bindParam(':numAñosExperienciaOjeador',$nuevoNumExperiencia);
			$stmt->execute();
            return true;
		}catch(PDOException $e){
			$_SESSION['excepcion'] = "Error al actualizar los datos del ojeador.".$e->GetMessage();
			header("Location:excepcion.php");
		}
	}

	function insertaJugador($conexion,$oidV, $dniJugador, $nombre, $nombreVirtual, $salario, $numTelefono, 
	$correoElectronico, $nacionalidad, $fechaEntrada, $numRegalos, $numExperiencia){
		try{
			$consulta = "CALL INSERTAR_JUGADORES(:dnijugador,:nombrejugador,:salariojugador,:numtelefonojugador,:numañosexperienciajugador,:correoelectronicojugador,
			:fechaentrada,:nombrevirtualjugador,:numregalos,:nacionalidadjugador,:oid_v)";
			$stmt=$conexion->prepare($consulta);
			$stmt->bindParam(':oid_v',$oidV);
			$stmt->bindParam(':dnijugador',$dniJugador);
			$stmt->bindParam(':nombrejugador', $nombre);
			$stmt->bindParam(':nombrevirtualjugador', $nombreVirtual);
			$stmt->bindParam(':salariojugador', $salario);
			$stmt->bindParam(':numtelefonojugador', $numTelefono);
			$stmt->bindParam(':correoelectronicojugador', $correoElectronico);
			$stmt->bindParam(':nacionalidadjugador', $nacionalidad);
			$stmt->bindParam(':fechaentrada', $fechaEntrada);
			$stmt->bindParam(':numregalos', $numRegalos);
			$stmt->bindParam(':numañosexperienciajugador', $numExperiencia);

			$stmt->execute();
			return true;
		 }catch(PDOException $e){
			$_SESSION['excepcion'] = "Error al añadir el jugador.".$e->GetMessage();
			header("Location:excepcion.php");
		 }
	}
	function consultarJugador($conexion,$nombreVirtual) {
        try{
            $consulta = "SELECT COUNT(*) as CUENTA FROM jugadores WHERE
            nombrevirtualjugador=:nombrevirtualjugador";
			
            $stmt = $conexion->prepare($consulta);
            $stmt->bindParam(':nombrevirtualjugador',$nombreVirtual);
            $stmt->execute();
            return $stmt->fetch();
        }catch(PDOException $e) {
            $_SESSION['excepcion'] = $e->GetMessage();
            header("Location: excepcion.php");
        }
    }
	
?>