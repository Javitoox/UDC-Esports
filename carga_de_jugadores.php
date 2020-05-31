<?php
    require_once("gestionBD.php");
    require_once("gestionMiembros.php");
    require_once("gestionJugadores.php");


    //Solo llegaremos a este script por la llamada AJAX tras pulsar en un videojuedo de la vista de jugadores
    if(isset($_POST["oid_oculto"]) && isset($_POST["nombre_oculto"]) && isset($_POST["dni_oculto"])){
    	$conexion = crearConexionBD();
		$jugadores = obtenJugador($conexion);
        $mejoresJugadores = listarMejoresJugadores($conexion);
		$mejoresJugadores_array= array();
		foreach($mejoresJugadores as $jug){
			$mejoresJugadores_array[]=$jug["NOMBREVIRTUALJUGADOR"];
		}
		
        
		foreach($jugadores as $jugador) {
            if($jugador["OID_V"] == $_POST["oid_oculto"]){
                $nombreVirtual = $jugador["NOMBREVIRTUALJUGADOR"];
                $nacionalidad = $jugador["NACIONALIDADJUGADOR"];
                $añosExperiencia = $jugador["NUMAÑOSEXPERIENCIAJUGADOR"];
                $dniJugador = $jugador["DNIJUGADOR"];
                $nombreV = $_POST["nombre_oculto"];

                ?>
                <div class = "jugador">
                	<?php
                	if(in_array($nombreVirtual,$mejoresJugadores_array)){
                	?>
                	<img class="trofeo" src="images/cup_png.png">
                	<?php
                	}
                	?>
                    <form method= "get" id = "botones" action="controlador_seguimiento.php">
                        <?php  
                        $seguimiento = existeSeguimiento($conexion, $_POST["dni_oculto"], $dniJugador);
                        
                        // 2 campos hidden (dnijugador, dniusuario)
                        ?>
                        <input name ="dniju" type="hidden" value="<?php echo $dniJugador?>">
					    <input name ="dnius" type="hidden" value="<?php echo $_POST["dni_oculto"]?>">
                        
                        <?php
                        if($seguimiento==""){
                            ?>
                            <button id="añadir" name="añadir" type="submit" class="añadir_jugador">
                            <img height = 25px src="images/mas.png" class="añadir_jugador"></button>
                            <?php
                        }else{
                            ?>
                            <button id="eliminar" name="eliminar" type="submit" class="eliminar_jugador">
                            <img height = 25px src="images/menos.png" class="eliminar_jugador"></button>
                            <?php
                        }
                        ?>
                    </form>
                    <?php
                
                    echo "<br><br><br>" . $nombreVirtual . "<br>". $nacionalidad. "<br>" . "Años de experiencia: ". $añosExperiencia. "<br><br>";
                    
                    ?>
                    <img height = 20px src="images/insta.png" onclick = "location.href='https://www.instagram.com/udcesports/'"  alt="Instagram">
                    <img height = 20px src="images/twitter.png" onclick = "location.href='https://www.twitch.tv/udconstantinaesports/'" alt="Twitter">
                    <img height = 20px src="images/twich.png" onclick = "location.href='https://twitter.com/udcesports?lang=es'" alt="Twitter">
                </div>
   
                <?php
            }   
        }
        cerrarConexionBD($conexion);
		unset($_POST["oid_oculto"]);
		unset($_POST["nombre_oculto"]);
		unset($_POST["dni_oculto"]);
    }
?>