<?php


function competiciones_jugadas($conexion, $nombreVideojuego){
	try {
		$consulta= "SELECT COUNT(DISTINCT competiciones.nombrecompeticion) FROM VIDEOJUEGOS NATURAL JOIN PARTIDOS NATURAL JOIN COMPETICIONES WHERE OID_V=(SELECT OID_V FROM VIDEOJUEGOS WHERE NOMBREVIDEOJUEGO=:nvideojuego)" ;
;
		$stmt = $conexion->prepare($consulta);
		$stmt->bindParam( ':nvideojuego', $nombreVideojuego );
		$stmt->execute();
		return $stmt->fetch();
	}	
	catch ( PDOException $e ) {
		$_SESSION['excepcion'] = $e->GetMessage();
		header("Location: excepcion.php");
	}
}


function competiciones_ganadas($conexion, $nombreVideojuego){
	try {
		$consulta= "SELECT COUNT(DISTINCT competiciones.nombrecompeticion) FROM VIDEOJUEGOS NATURAL JOIN PARTIDOS NATURAL JOIN COMPETICIONES WHERE OID_V=(SELECT OID_V FROM VIDEOJUEGOS WHERE NOMBREVIDEOJUEGO=:nvideojuego) AND competiciones.ganada='1'";
		$stmt = $conexion->prepare($consulta);
		$stmt->bindParam( ':nvideojuego', $nombreVideojuego );
		$stmt->execute();
		return $stmt->fetch();
	}	
	catch ( PDOException $e ) {
		$_SESSION['excepcion'] = $e->GetMessage();
		header("Location: excepcion.php");
	}
} 

function competiciones_jugadas_concrete($conexion, $nombreVideojuego){
	try {
		$consulta= "SELECT DISTINCT NOMBRECOMPETICION FROM VIDEOJUEGOS NATURAL JOIN PARTIDOS NATURAL JOIN COMPETICIONES WHERE OID_V=(SELECT OID_V FROM VIDEOJUEGOS WHERE NOMBREVIDEOJUEGO=:nvideojuego)";
		$stmt = $conexion->prepare($consulta);
		$stmt->bindParam(':nvideojuego', $nombreVideojuego);
		$stmt->execute();
		return $stmt;
	}	
	catch ( PDOException $e ) {
		$_SESSION['excepcion'] = $e->GetMessage();
		header("Location: excepcion.php");
	}
} 

function competiciones_ganadas_concrete($conexion, $nombreVideojuego){
	try {
		$consulta= "SELECT DISTINCT NOMBRECOMPETICION FROM VIDEOJUEGOS NATURAL JOIN PARTIDOS NATURAL JOIN COMPETICIONES WHERE OID_V=(SELECT OID_V FROM VIDEOJUEGOS WHERE NOMBREVIDEOJUEGO=:nvideojuego) AND GANADA='1'";
		$stmt = $conexion->prepare($consulta);
		$stmt->bindParam(':nvideojuego', $nombreVideojuego);
		$stmt->execute();
		return $stmt;
	}	
	catch ( PDOException $e ) {
		$_SESSION['excepcion'] = $e->GetMessage();
		header("Location: excepcion.php");
	}
} 

function partidos_totales($conexion, $nombreVideojuego){
	try {
		$consulta= "SELECT COUNT(*)  FROM VIDEOJUEGOS NATURAL JOIN PARTIDOS NATURAL JOIN COMPETICIONES WHERE OID_V=(SELECT OID_V FROM VIDEOJUEGOS WHERE NOMBREVIDEOJUEGO=:nvideojuego)";
		$stmt = $conexion->prepare($consulta);
		$stmt->bindParam(':nvideojuego', $nombreVideojuego);
		$stmt->execute();
		return $stmt->fetch();
	}	
	catch ( PDOException $e ) {
		$_SESSION['excepcion'] = $e->GetMessage();
		header("Location: excepcion.php");
	}
} 

function cantidad_partidos_ganados($conexion, $nombreVideojuego){
	try {
		$consulta= "SELECT COUNT(*)  FROM VIDEOJUEGOS NATURAL JOIN PARTIDOS NATURAL JOIN COMPETICIONES WHERE OID_V=(SELECT OID_V FROM VIDEOJUEGOS WHERE NOMBREVIDEOJUEGO=:nvideojuego AND GANADA='1')";
		$stmt = $conexion->prepare($consulta);
		$stmt->bindParam(':nvideojuego', $nombreVideojuego);
		$stmt->execute();
		return $stmt->fetch();
	}	
	catch ( PDOException $e ) {
		$_SESSION['excepcion'] = $e->GetMessage();
		header("Location: excepcion.php");
	}
} 

function cantidad_partidos_perdidos($conexion, $nombreVideojuego){
	try {
		$consulta= "SELECT COUNT(*)  FROM VIDEOJUEGOS NATURAL JOIN PARTIDOS NATURAL JOIN COMPETICIONES WHERE OID_V=(SELECT OID_V FROM VIDEOJUEGOS WHERE NOMBREVIDEOJUEGO=:nvideojuego AND  GANADA IS NULL)";
		$stmt = $conexion->prepare($consulta);
		$stmt->bindParam(':nvideojuego', $nombreVideojuego);
		$stmt->execute();
		return $stmt->fetch();
	}	
	catch ( PDOException $e ) {
		$_SESSION['excepcion'] = $e->GetMessage();
		header("Location: excepcion.php");
	}
} 


function partidos_jugados_concrete($conexion, $nombreVideojuego){
	try {
		$consulta= "SELECT *  FROM VIDEOJUEGOS NATURAL JOIN PARTIDOS NATURAL JOIN COMPETICIONES WHERE OID_V=(SELECT OID_V FROM VIDEOJUEGOS WHERE NOMBREVIDEOJUEGO=:nvideojuego)";
		$stmt = $conexion->prepare($consulta);
		$stmt->bindParam(':nvideojuego', $nombreVideojuego);
		$stmt->execute();
		$array = $stmt->fetchAll();
		return $array;
	}	
	catch ( PDOException $e ) {
		$_SESSION['excepcion'] = $e->GetMessage();
		header("Location: excepcion.php");
	}
} 


function racha_videojuego($conexion, $nombreVideojuego){
	try {
		$consulta= "Select racha  from estadisticas natural join partidos natural join videojuegos where FECHAHORA=(SELECT MAX(FECHAHORA) from estadisticas natural join partidos natural join videojuegos where nombrevideojuego=:nvideojuego) AND NOMBREVIDEOJUEGO=:nvideojuego";
		$stmt = $conexion->prepare($consulta);
		$stmt->bindParam(':nvideojuego', $nombreVideojuego);
		$stmt->execute();
		return $stmt->fetch();
	}	
	catch ( PDOException $e ) {
		$_SESSION['excepcion'] = $e->GetMessage();
		header("Location: excepcion.php");
	}
} 

 function mejorJugadorEstadisticas($conexion,$nombreVideojuego){
		try{
			$consulta="SELECT DISTINCT t2.nombreVideojuego,dniJugador,nombreJugador,salarioJugador,numTelefonoJugador,numAñosExperienciaJugador,
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
			NATURAL JOIN Jugadores NATURAL JOIN Videojuegos) t2 WHERE t2.nombreVideojuego=:nvideojuego and t2.ganados=t1.maximo AND ROWNUM = 1";
			$stmt = $conexion->prepare($consulta);
			$stmt->bindParam(':nvideojuego', $nombreVideojuego);
			$stmt->execute();
			return $stmt->fetchAll();
		}catch(PDOException $e) {
			$_SESSION['excepcion'] = $e->GetMessage();
			header("Location: excepcion.php");
		}
	}

?>