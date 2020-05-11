<?php
    session_start();
    require_once("gestionBD.php");
    require_once("consultasSql.php");
?>

<!DOCTYPE html>
<html lang="es">
<head>
<title>Gestion</title>
    <?php include_once("headComun.php"); ?>
    <link rel="stylesheet" type="text/css" href="css/gestion.css">
    
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
            <th style="width:60%;">Jugadores <br>
            <input type="text" class = "search" id="myInputJug" onkeyup="buscaJugador()" placeholder="Busca un jugador" title="Type in a name">
            </th>
            <th style="width:60%;"></th>
            <th style="width:60%;"></th>
        
            </tr>
            <?php
            foreach($jugadores as $jugador){
                ?>
                <tr>
                <?php
                ?><td><?php echo $jugador["NOMBREJUGADOR"] ?></td>
                <td><button><img height = 25px src="images/editar.png"></button></td>
                <td><button><img height = 25px src="images/eliminar.jpg"></button></td>
                
                </tr>
                <?php
            }
            ?>
        </div>
        <div class="tabla2">
        <table id="myTable2">
            <tr>
            <th style="width:60%;">Entrenadores <br>
            <input type="text" class = "search" id="myInputEnt" onkeyup="buscaEntrenador()" placeholder="Busca un entrenador" title="Type in a name">
            </th>
            <th style="width:60%;"></th>
            <th style="width:60%;"></th>
        
            </tr>
            <?php
            foreach($entrenadores as $entrenador){
                ?>
                <tr>
                <?php
                ?><td><?php echo $entrenador["NOMBREENTRENADOR"] ?></td>
                <td><button><img height = 25px src="images/editar.png"></button></td>
                <td><button><img height = 25px src="images/eliminar.jpg"></button></td>
                
                </tr>
                <?php
            }
            ?>

        </div>
        &nbsp;&nbsp;
        <div class="tabla2">
        <table id="myTable3">
            <tr>
            <th style="width:60%;">Ojeadores <br>
            <input type="text" class = "search" id="myInputOj" onkeyup="buscaOjeador()" placeholder="Busca un ojeador" title="Type in a name"><br>
            </th>
            <th style="width:60%;"></th>
            <th style="width:60%;"></th>
        
            </tr>
            <?php
            foreach($ojeadores as $ojeador){
                ?>
                <tr>
                <?php
                ?><td><?php echo $ojeador["NOMBREOJEADOR"] ?></td>
                <td><button><img height = 25px src="images/editar.png"></button></td>
                <td><button><img height = 25px src="images/eliminar.jpg"></button></td>
                
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