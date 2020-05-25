<?php
    session_start();
    require_once("gestionBD.php");
    require_once("consultasSql.php");
    require_once("gestionMiembros.php");


    if(isset($_SESSION['login'])){
        $nickUsuario = $_SESSION['login'];
    }else{
        Header("Location: login.php");
    }

?>

<!DOCTYPE html>
<html lang="es">
<head>
<title>Gestion</title>
    <?php include_once("headComun.php"); ?>
    <link rel="stylesheet" type="text/css" href="css/gestion.css">  
    <script type="text/javascript" src="jquery-3.5.1.min.js"></script>  
</head>

<body>
    <?php include_once("fondo.php"); ?>
    <?php include_once("navegacion_ADMIN.php"); ?>
   
    <div class="comun">
        <?php $conexion = crearConexionBD();
        $jugadores = obtenJugador($conexion);
        $entrenadores = obtenEntrenadores($conexion);
        $ojeadores = obtenOjeadores($conexion);?>
        
        <div class="tabla1">

            <table id="myTable">
            <tr>
            <th style="width:60%;">Jugadores
            <!-- formulario -->
            <div class="formulario" id="crea">
            <form method="post" action="accion_insertaMiembro.php">
                Insertar un JUGADOR
                <div><label for="dniJugador">DNI Jugador:<em></em></label>
                <input id="dniJugador" name="dniJugador" placeholder="DNI Jugador" type="text" required>
                </div>
                <div><label for="nombre">Nombre completo:<em></em></label>
                <input id="nombre" placeholder="Nombre Completo" name="nombre" type="text" required>
                </div>
                <div><label for="nombreVirtual">Nombre virtual:<em></em></label>
                <input id="nombreVirtual" placeholder="Nombre Virtual" name="nombreVirtual" type="text" required>
                </div>
                <div><label for="numTelefono">Número de teléfono:<em></em></label>
                <input id="numTelefono" placeholder="Numero de Teléfono" name="numTelefono" type="text" required>
                </div>
                <div><label for="correoElectronico">Correo electrónico:<em></em></label>
                <input id="correoElectronico" placeholder="Correo Electrónico" name="correoElectronico" type="text" required>
                </div>
                <div><label for="nacionalidad">Nacionalidad:<em></em></label>
                <input id="nacionalidad" placeholder="Nacionalidad" name="nacionalidad" type="text" required>
                </div>
                <div><label for="fentrada">Fecha entrada:<em></em></label>
                <input id="fentrada" placeholder="Fecha Entrada" name="fentrada" type="text" required>
                </div>
                <div><label for="salario">Salario actual:<em></em></label>
                <input id="salario" placeholder="Salario" name="salario" type="text" required>
                </div>
                <div><label for="numExperiencia">Nº años de experiencia:<em></em></label>
                <input id="numExperiencia" placeholder="Nº Años de Experiencia" name="numExperiencia" type="text" required>
                </div>
                <div><label for="numRegalos">Nº de regalos:<em></em></label>
                <input id="numRegalos" placeholder="Nº de regalos" name="numRegalos" type="text" required>
                </div>
                <!--Videojuego (oid_v y el nombre) -->
                <div><label for="videojuego">Videojuego:<em></em></label>
                <input list="videojuegos" name="nombreVid" id="nombreVid" required/>
				<datalist id="videojuegos">
                    <?php $videojuegos = obtenVideojuegos($conexion);
                    foreach($videojuegos as $videojuego){
                        $nombreVideojuego = $videojuego["NOMBREVIDEOJUEGO"];
                        $oidV = $videojuego["OID_V"];
                        ?><input id="oidV" name= "oidV" type="hidden"value="<?php echo $oidV;?>">
                        <option id="nombreVid" name= "nombreVid" value="<?php echo $nombreVideojuego;?>">

                        </option><?php
                    }
                    ?>
				</datalist>
                </div>
                <center><input class="boton" id="boton" name="boton" type="submit" value="Añadir Jugador" /></center><br/>
            </form>


            <div id="cerrar"><a href="javascript:cierraFormulario()"><img height = 30px src="images/cerrar.png" alt=""></a></div>
            </div>
           
            <input type="text" class = "search" id="myInputJug" onkeyup="buscaJugador()" placeholder="Busca un jugador" title="Type in a name">
               
            </th>
            <th style="width:60%;"></th>
            <th style="width:60%;">
            <button id="crea" name="añadir" type="submit" class="añadir_jugador">
            <a href="javascript:abreFormulario()">
            <img id="añade" height = 25px src="images/mas.png" class="añadir_jugador">
            </a></button></th>
        
            </tr>
            <?php
            foreach($jugadores as $jugador){
                ?>
                <tr>
                <?php
                ?><td><?php echo $jugador["NOMBREJUGADOR"] ?></td>
                <form  method= "post" action="perfil_ADMIN.php">
                    <?php 
                    $dniJugador = $jugador["DNIJUGADOR"];
                    ?>
                    <input id="dnijugador" name ="dnijugador" type="hidden" value="<?php echo $dniJugador?>">
                    <td><button id="editar" name="editar"><img height = 25px src="images/editar.png"></button></td>
    
                </form>
                <form  method= "get" action="accion_eliminaMiembro.php">
                    <?php 
                    $dniJugador = $jugador["DNIJUGADOR"];
                    ?>
                    <input id="dnijugador" name ="dnijugador" type="hidden" value="<?php echo $dniJugador?>">
                    <td><button id="eliminar" name="eliminar"><img height = 25px src="images/eliminar.jpg"></button></td>
                </form>
                </tr>
                <?php
            }
            ?>
        </div>
        <div class="tabla2">
        <table id="myTable2">
            <tr>
            <th style="width:60%;">Entrenadores
            <!--formulario -->
            <div class="formulario" id ="creaEntrenador">
                <form method="post" action="">
                Insertar un ENTRENADOR
                <div><label for="dniEntrenador">DNI Entrenador:<em></em></label>
                <input id="dniEntrenador" name="dniEntrenador" placeholder="DNI Entrenador" type="text" required>
                </div>
                <div><label for="nombreEntrenador">Nombre completo:<em></em></label>
                <input id="nombreEntrenador" placeholder="Nombre Completo" name="nombreEntrenador" type="text" required>
                </div>
                <div><label for="numTelefonoEnt">Número de teléfono:<em></em></label>
                <input id="numTelefonoEnt" placeholder="Numero de Teléfono" name="numTelefonoEnt" type="text" required>
                </div>
                <div><label for="correoElectronicoEnt">Correo electrónico:<em></em></label>
                <input id="correoElectronicoEnt" placeholder="Correo Electrónico" name="correoElectronicoEnt" type="text" required>
                </div>
                <div><label for="nacionalidadEnt">Nacionalidad:<em></em></label>
                <input id="nacionalidadEnt" placeholder="Nacionalidad" name="nacionalidadEnt" type="text" required>
                </div>
                <div><label for="salarioEnt">Salario actual:<em></em></label>
                <input id="salarioEnt" placeholder="Salario" name="salarioEnt" type="text" required>
                </div>
                <div><label for="numExperienciaEnt">Nº años de experiencia:<em></em></label>
                <input id="numExperienciaEnt" placeholder="Nº Años de Experiencia" name="numExperienciaEnt" type="text" required>
                </div>
            
                <!--Videojuego (oid_v y el nombre) -->
                <div><label for="videojuego">Videojuego:<em></em></label>
                <input list="videojuegos" name="nombreVid" id="nombreVid" required/>
				<datalist id="videojuegos">
                    <?php $videojuegos = obtenVideojuegos($conexion);
                    foreach($videojuegos as $videojuego){
                        $nombreVideojuego = $videojuego["NOMBREVIDEOJUEGO"];
                        $oidV = $videojuego["OID_V"];
                        ?><input id="oidV" name= "oidV" type="hidden"value="<?php echo $oidV;?>">
                        <option id="nombreVid" name= "nombreVid" value="<?php echo $nombreVideojuego;?>">

                        </option><?php
                    }
                    ?>
				</datalist>
                </div>
                <center><input class="boton" id="boton" name="boton" type="submit" value="Añadir Entrenador" /></center><br/>
            




                </form>

                <div id="cerrarEntrenador"><a href="javascript:cierraFormularioEntrenador()"><img height = 30px src="images/cerrar.png" alt=""></a></div>
            </div>
           
            <input type="text" class = "search" id="myInputEnt" onkeyup="buscaEntrenador()" placeholder="Busca un entrenador" title="Type in a name">
            </th>
            <th style="width:60%;"></th>
            <th style="width:60%;">
            <button id="creaEntrenador" name="añadir" type="submit" class="añadir_entrenador">
            <a href="javascript:abreFormularioEntrenador()">
            <img id="añade" height = 25px src="images/mas.png" class="añadir_entrenador">
            </a></button>
            </th>
        
            </tr>
            <?php
            foreach($entrenadores as $entrenador){
                ?>
                <tr>
                <?php
                ?><td><?php echo $entrenador["NOMBREENTRENADOR"] ?></td>
                <form  method= "post" action="perfil_ADMIN.php">
                    <?php 
                    $dniEntrenador = $entrenador["DNIENTRENADOR"];
                    ?>
                    <input id="dnientrenador" name ="dnientrenador" type="hidden" value="<?php echo $dniEntrenador?>">
                    <td><button id="editar" name="editar"><img height = 25px src="images/editar.png"></button></td>
    
                </form>
                <form  method= "get" action="accion_eliminaMiembro.php">
                    <?php 
                    $dniEntrenador = $entrenador["DNIENTRENADOR"];
                    ?>
                    <input id="dnientrenador" name ="dnientrenador" type="hidden" value="<?php echo $dniEntrenador?>">
                    <td><button id="eliminar" name="eliminar"><img height = 25px src="images/eliminar.jpg"></button></td>
                </form>
                
                </tr>
                <?php
            }
            ?>

        </div>
        &nbsp;&nbsp;
        <div class="tabla3">
        <table id="myTable3">
            <tr>
            <th style="width:60%;">Ojeadores
            <!-- formulario -->
            <div class="formulario" id="creaOjeador">
            <form action=""></form>
            <div id="cerrarOjeador"><a href="javascript:cierraFormularioOjeador()"><img height = 30px src="images/cerrar.png" alt=""></a></div>
            </div>
           
            <input type="text" class = "search" id="myInputOj" onkeyup="buscaOjeador()" placeholder="Busca un ojeador" title="Type in a name"><br>
            </th>
            <th style="width:60%;"></th>
            <th style="width:60%;">
            <button id="creaOjeador" name="añadir" type="submit" class="añadir_ojeador">
            <a href="javascript:abreFormularioOjeador()">
            <img id="añade" height = 25px src="images/mas.png" class="añadir_ojeador">
            </a></button></th>
        
            </tr>
            <?php
            foreach($ojeadores as $ojeador){
                ?>
                <tr>
                <?php
                ?><td><?php echo $ojeador["NOMBREOJEADOR"] ?></td>
                <form  method= "post" action="perfil_ADMIN.php">
                    <?php 
                    $dniOjeador = $ojeador["DNIOJEADOR"];
                    ?>
                    <input id="dniojeador" name ="dniojeador" type="hidden" value="<?php echo $dniOjeador?>">
                    <td><button id="editar" name="editar"><img height = 25px src="images/editar.png"></button></td>
                
                </form>
                <form  method= "get" action="accion_eliminaMiembro.php">
                    <?php 
                    $dniOjeador = $ojeador["DNIOJEADOR"];
                    ?>
                    <input id="dniojeador" name ="dniojeador" type="hidden" value="<?php echo $dniOjeador?>">
                    <td><button id="eliminar" name="eliminar"><img height = 25px src="images/eliminar.jpg"></button></td>
                </form>
                </tr>
                <?php
            }
            ?>

        </div>
    </div>

    <?php
 
    ?>

    <script>
    function buscaJugador() {
        var input, filter, table, tr, td, i, txtValue;
        input = document.getElementById("myInputJug");     
        filter = input.value.toUpperCase();     
        table = document.getElementById("myTable"); 
        tr = table.getElementsByTagName("tr");      
        for (i = 0; i < tr.length; i++) {           
            td = tr[i].getElementsByTagName("td")[0];  
            if (td) {
            txtValue =  td.innerText;      
                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                    tr[i].style.display = "";
                } else {
                    tr[i].style.display = "none";
                }
            }       
        }
    }
    </script>
    
    <script>
        function abreFormulario(){
            document.getElementById("crea").style.display="block";
        }
        function cierraFormulario(){
            document.getElementById("crea").style.display="none";
        }
        function abreFormularioEntrenador(){
            document.getElementById("creaEntrenador").style.display="block";
        }
        function cierraFormularioEntrenador(){
            document.getElementById("creaEntrenador").style.display="none";
        }
        function abreFormularioOjeador(){
            document.getElementById("creaOjeador").style.display="block";
        }
        function cierraFormularioOjeador(){
            document.getElementById("creaOjeador").style.display="none";
        }

    </script>
    
    
    <script>
    function buscaEntrenador() {
        var input, filter, table, tr, td, i, txtValue;
        input = document.getElementById("myInputEnt");     
        filter = input.value.toUpperCase();     
        table = document.getElementById("myTable2"); 
        tr = table.getElementsByTagName("tr");      
        for (i = 0; i < tr.length; i++) {           
            td = tr[i].getElementsByTagName("td")[0];  
            if (td) {
            txtValue =  td.innerText;      
                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                    tr[i].style.display = "";
                } else {
                    tr[i].style.display = "none";
                }
            }       
        }
    }
    </script>

    <script>
    function buscaOjeador() {
        var input, filter, table, tr, td, i, txtValue;
        input = document.getElementById("myInputOj");     
        filter = input.value.toUpperCase();     
        table = document.getElementById("myTable3"); 
        tr = table.getElementsByTagName("tr");      
        for (i = 0; i < tr.length; i++) {           
            td = tr[i].getElementsByTagName("td")[0];  
            if (td) {
            txtValue =  td.innerText;      
                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                    tr[i].style.display = "";
                } else {
                    tr[i].style.display = "none";
                }
            }       
        }
    }
    </script>

</body>
</html>