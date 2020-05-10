<?php
    session_start();

    if(isset($_REQUEST["DNIJUGADOR"])){
        $login["DNIJUGADOR"] = $_REQUEST["DNIJUGADOR"];
        $_SESSION["login"] = $jugador;

    }else{

    }
?>