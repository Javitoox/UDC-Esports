<?php

    require_once("gestionBD.php");
    require_once("gestionarUsuarios.php");
    
    session_start();
    $conexion = crearConexionBD();

    if(isset($_REQUEST['comenta']) != null ){ //Ha comentado
        $errores=array();
    
            $opinion = $_REQUEST['comenta'];
            $dniUsuario = $_REQUEST['dniusuario'];
            $dniJugador = $_REQUEST['dnijugador'];
			$errores=array();
			if($opinion==""){
				$errores[] = "<p><strong>La opinion no puede ser vacía.</strong></p>";
			}else if(!preg_match("/^[^$%&|<>#()¬·{}~;ºª]*$/",  $opinion)){
                $errores[] = "<p><strong>La opinion no debe contener caracteres especiales: " . $opinion. ".</strong></p>";
            }else{
                ayadeOpinion($conexion, $dniUsuario, $dniJugador, $opinion);
            }
			if (count($errores)>0){
				$_SESSION["errores"] = $errores;
			}
			Header("Location: misSeguimientos.php");
        }
        cerrarConexionBD($conexion);
?>


