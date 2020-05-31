<?php
    session_start();
    require_once("gestionBD.php");
    require_once("consultasSql.php");

    if(isset($_SESSION['login']) && isset($_SESSION['ADMIN'])){
        $nickUsuario = $_SESSION['login'];
    }else{
        Header("Location: login.php");
    }
	
	if (isset($_SESSION["paginacion"])) 
	$paginacion = $_SESSION["paginacion"]; 
	$pagina_seleccionada = isset($_GET["PAG_NUM"])? (int)$_GET["PAG_NUM"]:(isset($paginacion)? (int)$paginacion["PAG_NUM"]: 1);
	$pag_tam = isset($_GET["PAG_TAM"])? (int)$_GET["PAG_TAM"]:(isset($paginacion)? (int)$paginacion["PAG_TAM"]: 5);
	if ($pagina_seleccionada < 1) $pagina_seleccionada = 1;
	if ($pag_tam < 1) $pag_tam = 5;
		
	// Antes de seguir, borramos las variables de sección para no confundirnos más adelante
	unset($_SESSION["paginacion"]);
	
	if (isset($_SESSION["paginacions"])) 
	$paginacions = $_SESSION["paginacions"]; 
	$pagina_seleccionadas = isset($_GET["PAG_NUMS"])? (int)$_GET["PAG_NUMS"]:(isset($paginacions)? (int)$paginacions["PAG_NUMS"]: 1);
	$pag_tams = isset($_GET["PAG_TAMS"])? (int)$_GET["PAG_TAMS"]:(isset($paginacions)? (int)$paginacions["PAG_TAMS"]: 5);
	if ($pagina_seleccionadas < 1) $pagina_seleccionadas = 1;
	if ($pag_tams < 1) $pag_tams = 5;
		
	// Antes de seguir, borramos las variables de sección para no confundirnos más adelante
	unset($_SESSION["paginacions"]);
	
	if (isset($_SESSION["paginacionss"])) 
	$paginacionss = $_SESSION["paginacionss"]; 
	$pagina_seleccionadass = isset($_GET["PAG_NUMSS"])? (int)$_GET["PAG_NUMSS"]:(isset($paginacionss)? (int)$paginacionss["PAG_NUMSS"]: 1);
	$pag_tamss = isset($_GET["PAG_TAMSS"])? (int)$_GET["PAG_TAMSS"]:(isset($paginacionss)? (int)$paginacionss["PAG_TAMSS"]: 5);
	if ($pagina_seleccionadass < 1) $pagina_seleccionadass = 1;
	if ($pag_tamss < 1) $pag_tamss = 5;
		
	// Antes de seguir, borramos las variables de sección para no confundirnos más adelante
	unset($_SESSION["paginacionss"]);	
	
	$conexion = crearConexionBD();
   
?>

<!DOCTYPE html>
<html lang="es">
<head>
<title>Encuestas</title>
    <?php include_once("headComun.php"); ?>
    <link rel="stylesheet" type="text/css" href="css/encuestas.css">
</head>

<body>
    <?php 
    if(isset($_SESSION['ADMIN'])){
    	include_once("navegacion_ADMIN.php"); 
    }else{
    	include_once("navegacion.php");
    }
    ?>

   	<div class="col-3 col-tab-3 myTable">
   		<h4>Jugadores sin encuestas</h4>
   		
   		<form method="get" action="encuestas.php" novalidate>
		<div>
			<input class="campo" name="nombre" type="date" placeholder="DNI/NIF" value="" required>
		</div>
		<div>
		    <input type="submit" value="Escoger fecha"/>

		</div>
		</form>

	<?php
		
		if (!isset($_GET['nombre'])){
			$nombre = "12-1-2000";
			
		}else{
			$nombre = $_GET['nombre'];
			$newDate = date("d/m/Y", strtotime($nombre));			
			$_SESSION["nombre"]=$newDate;
			
			
		}
		$newDate = date("d/m/Y", strtotime($nombre));
	
	
	
	
	if(isset($_SESSION["nombre"])){
		$query ="SELECT nombreJugador from jugadores minus 
						(SELECT nombreJugador from encuestas natural join redessociales natural join jugadores 
						where fechainicio between '".date("d/m/Y", strtotime($_SESSION["nombre"]))."' and sysdate)"; 
	}else{
		$query ="SELECT nombreJugador from jugadores minus 
						(SELECT nombreJugador from encuestas natural join redessociales natural join jugadores 
						where fechainicio between '".$newDate."' and sysdate)"; 
	}
	
	
		$total_registros = total_consulta($conexion,$query);
		$total_paginas = (int) ($total_registros / $pag_tam);
		if ($total_registros % $pag_tam > 0) $total_paginas++; 
		if ($pagina_seleccionada > $total_paginas) $pagina_seleccionada = $total_paginas;
	
	// Generamos los valores de sesión para página e intervalo para volver a ella después de una operación
		$paginacion["PAG_NUM"] = $pagina_seleccionada;
		$paginacion["PAG_TAM"] = $pag_tam;
		$_SESSION["paginacion"] = $paginacion;
		
		
		$filas = consulta_paginada($conexion,$query,$pagina_seleccionada,$pag_tam);
		
		foreach($filas as $fila) {
	?>
	<?php 
		echo $fila["NOMBREJUGADOR"]."</br>";
				  } 
	?>

						<nav>
		<div class="enlaces1">
			<?php
				for( $pagina = 1; $pagina <= $total_paginas; $pagina++ ) 
					if ( $pagina == $pagina_seleccionada) { 	?>
						<span class="current"><?php echo $pagina; ?></span>
			<?php }	else { ?>			
						<a href="encuestas.php?PAG_NUM=<?php echo $pagina; ?>&PAG_TAM=<?php echo $pag_tam; ?>"><?php echo $pagina; ?></a>
			<?php } ?>			
		</div>
		
		<form method="get" action="encuestas.php">
			<input id="PAG_NUM" name="PAG_NUM" type="hidden" value="<?php echo $pagina_seleccionada?>"/>
			Mostrando 
			<input id="PAG_TAM" name="PAG_TAM" type="number" 
				min="1" max="<?php echo $total_registros;?>" 
				value="<?php echo $pag_tam?>" autofocus="autofocus" /> 
			entradas de <?php echo $total_registros?>
			<input type="submit" value="Cambiar">
		</form>
	</nav>
</div>
			
						
		
   	<div class="col-3 col-tab-3 myTable2">
   		<h4>Entrenadores sin encuestas</h4>
   		
   		<form method="get" action="encuestas.php" novalidate>
		<div>
			<input class="campo" name="nombre1" type="date" placeholder="DNI/NIF" value="" required>
		</div>
		<div>
		    <input type="submit" value="Escoger fecha"/>

		</div>
		</form>

	<?php
		
		if (!isset($_GET['nombre1'])){
			$nombre1 = "12-1-2000";
			
		}else{
			$nombre1 = $_GET['nombre1'];
			$newDate1 = date("d/m/Y", strtotime($nombre1));			
			$_SESSION["nombre1"]=$newDate1;
			
			
		}
	$newDate1 = date("d/m/Y", strtotime($nombre1));
	if(isset($_SESSION["nombre1"])){
	$query2="SELECT nombreEntrenador from entrenadores minus 
						(SELECT nombreEntrenador from encuestas natural join redessociales natural join entrenadores
						where fechainicio between '".date("d/m/Y", strtotime($_SESSION["nombre1"]))."' and sysdate)";
	}else{
		$query2="SELECT nombreEntrenador from entrenadores minus 
						(SELECT nombreEntrenador from encuestas natural join redessociales natural join entrenadores
						where fechainicio between '".$newDate1."' and sysdate)";
		
	}
						
						
		$total_registross = total_consulta($conexion,$query2);
		
		$total_paginass = (int) ($total_registross / $pag_tams);
		
		
		
		if ($total_registross % $pag_tams > 0) $total_paginass++; 
		if ($pagina_seleccionadas > $total_paginass) $pagina_seleccionada = $total_paginass;
	
	// Generamos los valores de sesión para página e intervalo para volver a ella después de una operación
		$paginacions["PAG_NUMS"] = $pagina_seleccionadas;
		$paginacions["PAG_TAMS"] = $pag_tams;
		$_SESSION["paginacions"] = $paginacions;
		
		$filass = consulta_paginada($conexion,$query2,$pagina_seleccionadas,$pag_tams);
		foreach($filass as $fila) {
	?>
			<?php 
				echo $fila["NOMBREENTRENADOR"]."</br>";
				 } 
			?>
		<nav>
		<div id="enlaces">
			<?php
				for( $paginas = 1; $paginas <= $total_paginass; $paginas++ ) 
					if ( $paginas == $pagina_seleccionadas) { 	?>
						<span class="current"><?php echo $paginas; ?></span>
			<?php }	else { ?>			
						<a href="encuestas.php?PAG_NUMS=<?php echo $paginas; ?>&PAG_TAMS=<?php echo $pag_tams; ?>"><?php echo $paginas; ?></a>
			<?php } ?>			
		</div>
		
		<form method="get" action="encuestas.php">
			<input id="PAG_NUMS" name="PAG_NUMS" type="hidden" value="<?php echo $pagina_seleccionadas?>"/>
			Mostrando 
			<input id="PAG_TAMS" name="PAG_TAMS" type="number" 
				min="1" max="<?php echo $total_registross;?>" 
				value="<?php echo $pag_tams?>" autofocus="autofocus" /> 
			entradas de <?php echo $total_registross?>
			<input type="submit" value="Cambiar">
		</form>
	</nav>
						</div>

<div class="col-3 col-tab-3 myTable3">
   		<h4>Miembros con encuestas</h4>
<form method="get" action="encuestas.php" novalidate>
		<div>
			<input class="campo" name="nombre2" type="date" placeholder="DNI/NIF" value="" required>
		</div>
		<div>
		    <input type="submit" value="Escoger fecha"/>

		</div>
		</form>
	<?php
		
		if (!isset($_GET['nombre2'])){
			$nombre2 = "12-1-2020";
			
		}else{
			$nombre2 = $_GET['nombre2'];
			$newDate2 = date("d/m/Y", strtotime($nombre2));			
			$_SESSION["nombre2"]=$newDate2;
			
			
		}
		
	$newDate2 = date("d/m/Y", strtotime($nombre2));
	if(isset($_SESSION["nombre2"])){
		
	
						
		$query3="SELECT nombreJugador, count(*) as NUMEROENCUESTAS from encuestas natural join redessociales natural join jugadores 
				where fechainicio between '".date("d/m/Y", strtotime($_SESSION["nombre2"]))."' and sysdate group by nombreJugador UNION
				SELECT nombreEntrenador, count(*) as NUMEROENCUESTAS from encuestas natural join redessociales natural join entrenadores 
				where fechainicio between '".date("d/m/Y", strtotime($_SESSION["nombre2"]))."' and sysdate group by nombreEntrenador";
	}else{
		$query3="SELECT nombreJugador, count(*) as NUMEROENCUESTAS from encuestas natural join redessociales natural join jugadores 
				where fechainicio between '".$newDate2."' and sysdate group by nombreJugador UNION
				SELECT nombreEntrenador, count(*) as NUMEROENCUESTAS from encuestas natural join redessociales natural join entrenadores 
				where fechainicio between '".$newDate2."' and sysdate group by nombreEntrenador";
		
	}
						
						
		
		$total_registrosss = total_consulta($conexion,$query3);
		
		$total_paginasss = (int) ($total_registrosss / $pag_tamss);
		
		
		
		if ($total_registrosss % $pag_tamss > 0) $total_paginasss++; 
		if ($pagina_seleccionadass > $total_paginasss) $pagina_seleccionadas = $total_paginasss;
	
	// Generamos los valores de sesión para página e intervalo para volver a ella después de una operación
		$paginacionss["PAG_NUMSS"] = $pagina_seleccionadass;
		$paginacionss["PAG_TAMSS"] = $pag_tamss;
		$_SESSION["paginacionss"] = $paginacionss;
		$filasss = consulta_paginada($conexion,$query3,$pagina_seleccionadass,$pag_tamss);
		foreach($filasss as $fila) {
	?>
		
			<?php 
				echo $fila["NOMBREJUGADOR"] . "  " . $fila["NUMEROENCUESTAS"] . " encuestas" ."</br>";
					
					} 
			?>
						
		<nav>
			<div id="enlaces">
			<?php
				for( $paginass = 1; $paginass <= $total_paginasss; $paginass++ ) 
					if ( $paginass == $pagina_seleccionadass) { 	?>
						<span class="current"><?php echo $paginass; ?></span>
			<?php }	else { ?>			
						<a href="encuestas.php?PAG_NUMSS=<?php echo $paginass; ?>&PAG_TAMSS=<?php echo $pag_tamss; ?>"><?php echo $paginass; ?></a>
			<?php } ?>			
		</div>
		
		<form method="get" action="encuestas.php">
			<input id="PAG_NUMSS" name="PAG_NUMSS" type="hidden" value="<?php echo $pagina_seleccionadass?>"/>
			Mostrando 
			<input id="PAG_TAMSS" name="PAG_TAMSS" type="number" 
				min="1" max="<?php echo $total_registrosss;?>" 
				value="<?php echo $pag_tamss?>" autofocus="autofocus" /> 
			entradas de <?php echo $total_registrosss?>
			<input type="submit" value="Cambiar">
		</form>
	</nav>
	</div>
	
        
   </body>
  
</html>