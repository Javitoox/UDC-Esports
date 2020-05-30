<?php
    //Próximamente controlaremos la sesión del usuario para ir a la pantalla de inicio o login
    session_start();
	require_once("gestionBD.php");
    require_once("consultasSql.php");
	
    if(isset($_SESSION['login'])){
        $nickUsuario = $_SESSION['login'];
    }else{
        header("Location: login.php");
    }   
    
?>
<!DOCTYPE html>
<html lang="es">
<head>
<title>Inicio</title>
	<?php include_once("headComun.php"); ?>
    <link rel="stylesheet" type="text/css" href="css/index.css">
    <!-- <link href="https://fonts.googleapis.com/css2?family=Indie+Flower&display=swap" rel="stylesheet"> -->
    
</head>

<body>
    <?php include_once("fondo.php"); ?>
    <?php include_once("navegacion.php");
		$conexion = crearConexionBD();
		$resultados=ultimosResultados($conexion);
	
	
	 ?>
    
 <div class="col-8 col-tab-8 myTable">
   		<h4>Últimas Noticias</h4>
   		<p>Hola</p>
   		<p>Hola</p>
		<p>Hola</p>
   		<p>Hola</p>
   		<p>Hola</p>
   		
   	

</div>
    
    <div class="col-2 col-tab-2 myTable2">
    	<h4>Últimos resultados</h4>
    	<table class="table">
    		 <tr>
    <th>EQUIPO</th>
    <th>LUGAR</th>
    <th>GANADO</th>
  	</tr>
    	<?php
    	
    	foreach($resultados as $resultado){
    		
			if($resultado["GANADO"]==1){
				echo "  	<tr>
			
			<td>".$resultado["NOMBREVIDEOJUEGO"]."</td> <td>".$resultado["LUGAR"]."</td> 
			<td>Victoria</td>
			    	</tr>
			";
				
				
			}else{
				
				echo "  	<tr>
			
			<td>".$resultado["NOMBREVIDEOJUEGO"]."</td> <td>".$resultado["LUGAR"]."</td> 
			<td>Derrota</td>
			    	</tr>
			";
				
			}
    		
			
			
			
    	}
    	
    	
    	?>
    	
    	</table>
    	
    </div>
    
<div class="col-10 col-tab-10 patrocinadores">
    <p>
        <img class="col-mitad col-tab-mitad"  src="images/ASNTaller.png" alt="ASN">
        <img class="col-reduce col-tab-mitad" src="images/niut.png" alt="niut">
        <img class="col-mitad col-tab-mitad"  src="images/fortnite.png" alt="fortnite">
        <img class="col-mitad col-tab-mitad"  src="images/pokemon.png" alt="pokemon">
        <img class="col-mitad col-tab-mitad"  src="images/dragonball.png" alt="dragonball">
        <img class="col-mitad col-tab-mitad"  src="images/csgo.png" alt="csgo">
        <img class="col-mitad col-tab-mitad"  src="images/leaguelegends.png" alt="league">
    </p>
</div>
</body>
</html>