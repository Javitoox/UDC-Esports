<?php
    session_start();
    require_once("gestionBD.php");
    require_once("consultasSql.php");

    if(isset($_SESSION['login'])){
        $nickUsuario = $_SESSION['login'];
    }else{
        Header("Location: login.php");
    }
		$conexion = crearConexionBD();
		$rachas=racha($conexion);
		$dnis=dniOjeadores($conexion);
?>

<!DOCTYPE html>
<html lang="es">
<head>
	<title>Información</title>
<?php include_once("headComun.php"); ?>
    <link rel="stylesheet" type="text/css" href="css/informacion.css">  
    <script src="https://code.jquery.com/jquery-3.1.1.min.js" type="text/javascript"></script>
    <script src="js/gestion.js" type="text/javascript"></script>
 
</head>

<body>
    <?php include_once("fondo.php"); 
	
    if(isset($_SESSION['ADMIN'])){
    	include_once("navegacion_ADMIN.php"); 
    }else{
    	include_once("navegacion.php");
    }
    
    ?>
    <div class="col-3 col-tab-3 myTable">
   		<h4>Jugadores fichados</h4>
   		
   		<form method="get" action="informacion.php" id="fechai">
		<div>
			<input oninput="dateValidation()" class="campo" id="fechai" name="fecha" type="date" placeholder="Fecha" value="" required>
		</div>
		<div>
		    <input type="submit" value="Escoger fecha"/>

		</div>
		</form>

	<?php
		
		if (!isset($_GET['fecha'])){
			$fecha = "12-1-2000";
			
		}else{
			$fecha = $_GET['fecha'];
			$newDate = date("d/m/Y", strtotime($fecha));			
			$_SESSION["fecha"]=$newDate;
			
			
		}
		$newDate = date("d/m/Y", strtotime($fecha));
	
	
	
	
	if(isset($_SESSION["fecha"])){
		$fichajes =jugadoresFichados($conexion, date("d/m/Y", strtotime($_SESSION["fecha"]))); 
	}else{
		$fichajes =jugadoresFichados($conexion, $newDate); 

	}
	
	?>
	<div id="scroll">
        <?php 
		foreach($fichajes as $fichaje){
			
			echo $fichaje["NOMBREJUGADOR"] . "</br>";
			
		}
		
        ?>
        
       </div>
       </div>

       <div class="col-3 col-tab-3 myTable2">
          		<h4>Posibles fichajes</h4>

  <form method="get" action="informacion.php">     
   <select name="dni">
       		
       <?php foreach($dnis as $dni){
    		    			
	echo "<option  value='".$dni["DNIOJEADOR"]."' label='".$dni["DNIOJEADOR"]."'/>";
    			
				
    	}
    		    		
			
    		
    		?>
</select>
		    <input type="submit" value="Escoger DNI"/>
	</form>
	<?php 
	
	
		if(isset($_GET["dni"])){
			$posibles=posiblesFichajes($conexion, $_GET["dni"]);
			$_SESSION['dni']=$_GET["dni"];
		}else{
			
		$posibles=posiblesFichajes($conexion, '02321212J');
		}
		
		if(isset($_SESSION['dni'])){
			$posibles=posiblesFichajes($conexion, $_SESSION['dni']);
		}else{
			$posibles=posiblesFichajes($conexion, '02321212J');
			
		}
			
		
	?>
	<div id="scroll">
	<?php
	foreach($posibles as $posible){
		
		echo $posible["NOMBREVIRTUAL"] . "</br>";
		
	}
	
	
	
	
	
	?>
	</div>
	</div>
	
	   	<div class="col-3 col-tab-3 myTable3">
   		<h4 id="v">Videojuegos en racha</h4>

    
   <div id="scroll">
        <?php 
		foreach($rachas as $racha){
			
			echo $racha["NOMBREVIDEOJUEGO"] . "</br>";
			
		}
		
        ?>
        
       </div>
       </div>
<?
cerrarConexionBD($conexion);
?>
</body>
</html>