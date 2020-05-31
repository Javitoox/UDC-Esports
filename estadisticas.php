<?php
    session_start();
    require_once("gestionBD.php");
	require_once("consultasEstadisticas.php");
	require_once("consultasSql.php");
	require_once("gestionJugadores.php");
    require_once("gestionarUsuarios.php");

    if(isset($_SESSION['login'])){
        $nickUsuario = $_SESSION['login'];
    }else{
        Header("Location: login.php");
    }
	
	$conexion = crearConexionBD(); 
	
	$nombreVideojuegoElegido="";
	if(isset($_REQUEST["nVideojuegos"])) {
		$nombreVideojuegoElegido=$_REQUEST["nVideojuegos"];
		$_SESSION["nVideojuegos"]=$nombreVideojuegoElegido;
	}
	
	
	
	$fechaElegida="";
	if(isset($_POST["fecha"]) ) {
		$fechaElegida=$_POST["fecha"];
		if($fechaElegida==""){
			echo "<font color='red' class='error'><strong>Las fechas son incompatibles.</strong></font>";
			
		}
	}
	
?>
<!DOCTYPE html>
<html lang="es">
<head>
<title>Resultados</title>
    <?php include_once("headComun.php"); ?>
    <link rel="stylesheet" type="text/css" href="css/error_form.css">
    <link rel="stylesheet" type="text/css" href="css/perfil.css">
    <link rel="stylesheet" type="text/css" href="css/estadisticas.css">
  
</head>

<body>
	<?php 
    if(isset($_SESSION['ADMIN'])){
    	include_once("navegacion_ADMIN.php"); 
    }else{
    	include_once("navegacion.php");
    }
    ?>
    <?php 
   	    $nombreElegido=$nombreVideojuegoElegido;                  
		if($nombreElegido!=""){
			$nombre_Videojuego=$nombreElegido;
		}else{
			$nombre_Videojuego=$_SESSION["nVideojuegos"];
		}
    	
		$IDVideojuego=obtenOID_V($conexion, $nombre_Videojuego);
		$competicionesJugadas=competiciones_jugadas($conexion, $nombre_Videojuego);
		$competicionesJugadasConcrete=competiciones_jugadas_concrete($conexion, $nombre_Videojuego);
   		$competicionesGanadas=competiciones_ganadas($conexion, $nombre_Videojuego);
		$partidosTotales=partidos_totales($conexion, $nombre_Videojuego);
		$partidosGanados=cantidad_partidos_ganados($conexion, $nombre_Videojuego);
		$partidosPerdidos=cantidad_partidos_perdidos($conexion, $nombre_Videojuego);
		$partidosJugadosConcrete=partidos_jugados_concrete($conexion, $nombre_Videojuego);
		$rachaActualPorVideojuego=racha_videojuego($conexion, $nombre_Videojuego);
		$competicionesGanadasConcrete=competiciones_ganadas_concrete($conexion, $nombre_Videojuego);
		$mejorJugadosEstadisticas= mejorJugadorEstadisticas($conexion,$nombre_Videojuego);
		if($partidosGanados[0]!=0 || $partidosTotales[0]!=0){
			$porcentajeVictorias=($partidosGanados[0]*100)/$partidosTotales[0];
		}else{
			$porcentajeVictorias=0;
		}
    
    ?>
    <form class="col-3 formularioCalendario" action="estadisticas.php" method="post">
    	<input class="calendarF" id="fecha" name="fecha" type="date">
    	<input type="submit" name="Insertar" value="Buscar">
	</form>
	<center><h1 class="tittle">UDConstantina <?php ECHO $nombre_Videojuego ?></h1></center>
	
	<img class="image" src="images/logo.png">
	<h2 class="col-3 scroll"><?php  partidosDestallados($partidosJugadosConcrete,$fechaElegida) ?></h2>
	<div class="col-3 stadisticData">
		<h1>Partidos jugados:  <?php  ECHO $partidosTotales[0] ?></h1> 
		<h1>Partidos ganados:  <?php  ECHO $partidosGanados[0] ?></h1> 
		<h1>Partidos perdidos:  <?php  ECHO $partidosPerdidos[0] ?></h1> 
		<h1>Porcentaje de victorias:  <?php  ECHO $porcentajeVictorias."%" ?></h1> 
		<h1>Racha actual del equipo:  <?php  ECHO $rachaActualPorVideojuego[0] ?></h1>
		<h1>Hemos competido en <?php  ECHO $competicionesJugadas[0] ?>  ocasiones:  <?php echo "<br />"; ECHO nombreCompeticiones($competicionesJugadasConcrete) ?></h1>
		<h1>Hemos ganado <?php  ECHO $competicionesGanadas[0] ?> veces :  <?php echo "<br />"; nombreCompeticionesGanadas($competicionesGanadasConcrete) ?></h1>
	
	</div>
	<div class="col-tab-10 col-3 mejorJugadorEstadisticas">
		<h1>MEJOR JUGADOR DEL EQUIPO</h1>
		<h2 ><?php mejorJugadorEstats($mejorJugadosEstadisticas) ?></h2>	
	</div>
	
	<?php 
	function nombreCompeticiones($competicionesJugadasConcrete){
		foreach($competicionesJugadasConcrete as $competicion) {
			$nombre_competicion = $competicion[0];
			ECHO "-".$nombre_competicion."<br />";
		}
	}
	?>
	<?php 
	function mejorJugadorEstats($mejorJugadosEstadisticas){
		foreach($mejorJugadosEstadisticas as $estadistica) {
			$nombre=$estadistica["NOMBREJUGADOR"];
			$nick=$estadistica["NOMBREVIRTUALJUGADOR"];
			$nacionalidad=$estadistica["NACIONALIDADJUGADOR"];
			$aniosDeExperiencia=$estadistica["NUMAÑOSEXPERIENCIAJUGADOR"];
			ECHO "<br />Nombre: ".$nombre."<br />Nick: ".$nick."<br />Nacionalidad: ".$nacionalidad."<br />Años de experiencia: ".$aniosDeExperiencia;
		}
	}
	?>	
	<?php 
	function nombreCompeticionesGanadas($competicionesGanadasConcrete){
		foreach($competicionesGanadasConcrete as $competicion) {
			$nombre_competicion = $competicion[0];
			ECHO "-".$nombre_competicion."<br />";
		}
	}
	?>
	<?php 
	function partidosDestallados($partidosJugadosConcrete,$fechaElegida){
		foreach($partidosJugadosConcrete as $partido) {
			$lugar = $partido["LUGAR"];
			$fecha=$partido["FECHACOMPETICION"];
			$premio=$partido["PREMIO"];
			$medio=$partido["MEDIO"];
			$ganada=$partido["GANADA"];
			
			if($ganada!=1){
				if($fechaElegida!=""){
					$fechaFormateada=date("d/m/y", strtotime($fechaElegida));
					if($fecha==$fechaFormateada ){
						ECHO "Lugar: ".$lugar."<br />Fecha: ".$fecha."<br /> Premio: ".$premio."€<br /> Medio: ".$medio."<br /> Resultado: "."Perdido <br />";
					}
					
				}else{
					ECHO "Lugar: ".$lugar."<br />Fecha: ".$fecha."<br />Premio: ".$premio."€<br />Medio: ".$medio."<br /> Resultado:"."Perdido <br />";	
				}
				
			}else{
				if($fechaElegida!="" ){
					$fechaFormateada=date("d/m/y", strtotime($fechaElegida));
					if($fecha==$fechaFormateada ){
						ECHO "Lugar: ".$lugar."<br />Fecha: ".$fecha."<br /> Premio: ".$premio."€<br /> Medio: ".$medio."<br /> Resultado: "."Ganada <br />";
					}
				}else{
					ECHO "Lugar: ".$lugar."<br />Fecha: ".$fecha."<br />Premio: ".$premio."€<br />Medio: ".$medio."<br /> Resultado:"."Ganado <br />";
				}
			}
			echo "<br/>";
		}
	}
	?>
	
 </body>