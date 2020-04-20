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
?>