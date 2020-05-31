<?php

    require_once("gestionBD.php");
    
    session_start();
    $conexion = crearConexionBD();

    if(isset($_REQUEST['cuerpo']) != null ){ //Ha comentado
        $errores=array();
    
            $cuerpo = $_REQUEST['cuerpo'];
            $nombre = $_REQUEST['nombre'];
            $correoElectronico = $_REQUEST['correoElectronico'];
			$errores=array();
			if($cuerpo==""){
				$errores[] = "<p><strong>El cuerpo no puede estar vacío.</strong></p>";
			}else if(!preg_match("/^[^$%&|<>#()¬·{}~;ºª]*$/",  $cuerpo)){
                $errores[] = "<p><strong>El cuerpo no debe contener caracteres especiales: " . $cuerpo. ".</strong></p>";
            }
            
			if($nombre==""){
				$errores[] = "<p><strong>El nombre no puede estar vacío.</strong></p>";
			}
			
			if($correoElectronico==""){ 
				$errores[] = "<p><strong>El email no puede estar vacío.</strong></p>";
			}else if(!filter_var($correoElectronico, FILTER_VALIDATE_EMAIL)){
				$errores[] = "<p><strong>El email es incorrecto: " . $correoElectronico. ".</strong></p>";
			}
			if (count($errores)>0){
				$_SESSION["errores"] = $errores;
			}
			Header("Location: sobrenosotros.php");
        }
        cerrarConexionBD($conexion);
?>
