<?php
    //Controlamos la sesión del usuario para ir a la pantalla de inicio o login
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
    <script src="https://plugins.flockler.com/embed/17266cdec2e02f5939154bb749af1952/17266d0a7a20050b3316187b9b8d334c" async></script>
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
		$conexion = crearConexionBD();
        $resultados=ultimosResultados($conexion);
        cerrarConexionBD($conexion);
	?>
    
    <div id="flockler-embed-17266d0a7a20050b3316187b9b8d334c" class="col-10 col-tab-10 myTable">
    </div>
    
    <div class="col-5 col-tab-5 myTable2">
    	<h4>Últimos resultados</h4>
    	<center><table class="table">
    		 <tr>
        <th id="t">EQUIPO</th>
        <th id="t2">GANADO</th>
        </tr>
    	<?php
    	
            foreach($resultados as $resultado){  
                if($resultado["GANADO"]==1){
                    echo 
                    "<tr>
                        <td id='t'>".$resultado["NOMBREVIDEOJUEGO"]."</td> 
                        <td id='t2'>Victoria</td>
                    </tr>";
                    
                }else{
                    echo 
                    "<tr>
                        <td id='t'>".$resultado["NOMBREVIDEOJUEGO"]."</td> 
                        <td id='t2'>Derrota</td>
                    </tr>";
                }   
            }
            ?>
        </table>
        </center>
    </div>
        
    <div class="col-10 col-tab-10 patrocinadores">
        <p>
        <p>
        <img class="col-mitad col-tab-mitad"  src="images/ASNTaller.png" alt="ASN">
        <img class="col-reduce col-tab-mitad" src="images/niut.png" alt="niut" height="120px">
        <img class="col-mitad col-tab-mitad"  src="images/fortnite.png" alt="fortnite">
        <img class="col-mitad col-tab-mitad"  src="images/pokemon.png" alt="pokemon">
        <img class="col-mitad col-tab-mitad"  src="images/dragonball.png" alt="dragonball">
        <img class="col-mitad col-tab-mitad"  src="images/csgo.png" alt="csgo">
        <img class="col-mitad col-tab-mitad"  src="images/leaguelegends.png" alt="league">
    </p>
        </p>
    </div>
            
</body>
</html>