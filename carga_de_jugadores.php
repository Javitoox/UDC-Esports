<?php
    require_once("gestionBD.php");
    require_once("gestionMiembros.php");

    //Solo llegaremos a este script por la llamada AJAX tras pulsar en un videojuedo de la vista de jugadores
    if(isset($_POST["oid_oculto"]) && isset($_POST["nombre_oculto"]) && isset($_POST["dni_oculto"])){
    	$conexion = crearConexionBD();
		$jugadores = obtenJugador($conexion);
        $mejoresJugadores = listarMejoresJugadores($conexion);
        
		foreach($jugadores as $jugador) {
            if($jugador["OID_V"] == $_POST["oid_oculto"]){
                $nombreVirtual = $jugador["NOMBREVIRTUALJUGADOR"];
                $nacionalidad = $jugador["NACIONALIDADJUGADOR"];
                $añosExperiencia = $jugador["NUMAÑOSEXPERIENCIAJUGADOR"];
                $dniJugador = $jugador["DNIJUGADOR"];
                $nombreV = $_POST["nombre_oculto"];

                ?>
                <div class = "jugador">
                    <form method= "get" id = "botones" action="controlador_seguimiento.php">
                        <?php  
                        $seguimiento = existeSeguimiento($conexion, $_POST["dni_oculto"], $dniJugador);
                        $oid_seg = obtenOID_SEG($conexion, $_POST["dni_oculto"], $dniJugador);
                        $OID_SEG = $oid_seg["OID_SEG"];
                        
                        // 2 campos hidden (dnijugador, dniusuario)
                        ?>
                        <input id="dnijugador" name ="dnijugador" type="hidden" value="<?php echo $dniJugador?>">
					    <input id="dniuser" name ="dniuser" type="hidden" value="<?php echo $_POST["dni_oculto"]?>">
                        
                        <?php
                        if($OID_SEG == 0){
                            ?>
                            <button id="añadir" name="añadir" type="submit" class="añadir_jugador">
                            <img height = 25px src="images/mas.png" class="añadir_jugador"></button>
                            <?php
                        }else{
                            ?>
                            <!-- 1 campos hidden (oid_seg)-->
                            <input id="oid_seg" name ="oid_seg" type="hidden" value="<?php echo $OID_SEG?>">
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