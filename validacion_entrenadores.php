<?php
	session_start();

    require_once("gestionBD.php");
    require_once("consultasSql.php");
    require_once("gestionJugadores.php");

    //Comprobamos que para llegar aquí antes se ha tenido que pasar por el registro de un jugador
    if (isset($_SESSION['formularioEnt'])) {
        $nuevoEntrenador['dniEntrenador'] = $_REQUEST["dniEntrenador"];
		$nuevoEntrenador['nombreEntrenador'] = $_REQUEST["nombreEntrenador"];
		$nuevoEntrenador['numTelefonoEnt'] = $_REQUEST["numTelefonoEnt"];
		$nuevoEntrenador['correoElectronicoEnt'] = $_REQUEST["correoElectronicoEnt"];
		$nuevoEntrenador['nacionalidadEnt'] = $_REQUEST["nacionalidadEnt"];
		$nuevoEntrenador['salarioEnt'] = $_REQUEST["salarioEnt"];
        $nuevoEntrenador['numExperienciaEnt'] = $_REQUEST["numExperienciaEnt"];
        $nuevoEntrenador['nombreVid'] = $_REQUEST["nombreVid"];

        $_SESSION["formularioEnt"] = $nuevoEntrenador;
        
    }else Header('Location: gestion.php');
    
        $conexion = crearConexionBD();                                         
        $errores = validarDatosEntrenador($conexion, $nuevoEntrenador);
        cerrarConexionBD($conexion);

    //Comprobamos si hay errores de validación
	if (count($errores)>0) {
		$_SESSION["errores"] = $errores;
		Header('Location: gestion.php');
	} else{
    //Si todo ha ido bien iremos a accion_insertaMiembro.php donde se hará la inserción del nuevo jugador
		Header('Location: accion_insertaEntrenador.php');
    }
		
	// Validación en servidor del formulario de insertar jugadores
	function validarDatosEntrenador($conexion, $nuevoEntrenador){
        $errores=array();
    
        //Validación NIF
        if($nuevoEntrenador["dniEntrenador"]=="") 
            $errores[] = "<p><strong>El NIF no puede estar vacío.</strong></p>";
        else if(!preg_match("/^[0-9]{8}[A-Z]$/", $nuevoEntrenador["dniEntrenador"])){
            $errores[] = "<p><strong>El NIF debe contener 8 números y una letra mayúscula: " . $nuevoEntrenador["dniEntrenador"]. ".</strong></p>";
        }
        //Validación Nombre			
        if($nuevoEntrenador["nombreEntrenador"]=="") 
        $errores[] = "<p><strong>El nombre no puede estar vacío.</strong></p>";

        //Validación Número Telefónico
        if($nuevoEntrenador["numTelefonoEnt"]==""){ 
            $errores[] = "<p><strong>El número de teléfono no puede estar vacío.</strong></p>";
        }else if(!preg_match('/^[0-9]{9}$/', $nuevoEntrenador["numTelefonoEnt"])){
            $errores[] = "<p><strong>El número de teléfono es incorrecto: " . $nuevoEntrenador["numTelefonoEnt"]. ".</strong></p>";
        }
        //Validación Email
        if($nuevoEntrenador["correoElectronicoEnt"]==""){ 
            $errores[] = "<p><strong>El email no puede estar vacío.</strong></p>";
        }else if(!filter_var($nuevoEntrenador["correoElectronicoEnt"], FILTER_VALIDATE_EMAIL)){
            $errores[] = "<p><strong>El email es incorrecto: " . $nuevoEntrenador["correoElectronicoEnt"]. ".</strong></p>";
        }
       
        //Validacion nacionalidad
        $nacionalidades = array('Afganistán','Albania','Alemania','Andorra','Angola','Antigua y Barbuda','Arabia Saudita','Argelia','Argentina',
        'Armenia','Australia','Austria','Azerbaiyán','Bahamas','Bangladés','Barbados','Baréin','Bélgica','Belice','Benín',
        'Bielorrusia','Birmania','Bolivia','Bosnia y Herzegovina','Botsuana','Brasil','Brunéi','Bulgaria','Burkina Faso',
        'Burundi','Bután','Cabo Verde','Camboya','Camerún','Canadá','Catar','Chad','Chile','China','Chipre','Ciudad del Vaticano',
        'Colombia','Comoras','Corea del Norte','Corea del Sur','Costa de Marfil',
        'Costa Rica','Croacia','Cuba','Dinamarca','Dominica','Ecuador','Egipto','El Salvador',
        'Emiratos Árabes Unidos','Eritrea','Eslovaquia','Eslovenia','España','Estados Unidos',
        'Estonia','Etiopía','Filipinas','Finlandia','Fiyi','Francia','Gabón','Gambia','Georgia',
        'Ghana','Granada','Grecia','Guatemala','Guyana','Guinea','Guinea ecuatorial','Guinea-Bisáu',
        'Haití','Honduras','Hungría','India','Indonesia','Irak','Irán','Irlanda','Islandia','Islas Marshall',
        'Islas Salomón','Israel','Italia','Jamaica','Japón','Jordania','Kazajistán','Kenia','Kirguistán','Kiribati','Kuwait',
        'Laos','Lesoto','Letonia','Líbano','Liberia','Libia','Liechtenstein','Lituania','Luxemburgo',
        'Macedonia del Norte','Madagascar','Malasia','Malaui','Maldivas','Malí','Malta','Marruecos',
        'Mauricio','Mauritana','México','Micronesia','Moldavia','Mónaco','Mongolia','Montenegro',
        'Mozambique','Namibia','Nauru','Nepal','Nicaragua','Níger','Nigeria','Noruega','Nueva Zelanda',
        'Omán','Países Bajos','Pakistán','Palaos','Panamá','Papúa Nueva Guinea','Paraguay','Perú',
        'Polonia','Portugal','Reino Unido','República Centroafricana','República Checa',
        'República del Congo','República Democrática del Congo',
        'República Dominicana','República Sudafricana','Ruanda','Rumanía','Rusia',
        'Samoa','San Cristóbal y Nieves','San Marino','San Vicente y las Granadinas',
        'Santa Lucía','Santo Tomé y Príncipe','Senegal','Serbia','Seychelles','Sierra Leona',
        'Singapur','Siria','Somalia','Sri Lanka','Suazilandia','Sudán','Sudán del Sur','Suecia',
        'Suiza','Surinam','Tailandia','Tanzania','Tayikistán','Timor Oriental','Togo','Tonga',
        'Trinidad y Tobago','Túnez','Turkmenistán','Turquía','Tuvalu','Ucrania','Uganda','Uruguay',
        'Uzbekistán','Vanuatu','Venezuela','Vietnam',
        'Yemen','Yibuti','Zambia','Zimbabue');

        if($nuevoEntrenador["nacionalidadEnt"]==""){
            $errores[] = "<p><strong>La nacionalidad no puede estar vacía.</strong></p>";
        }else if(!(in_array($nuevoEntrenador["nacionalidadEnt"], $nacionalidades))){
            $errores[] = "<p><strong>La nacionalidad " . $nuevoEntrenador["nacionalidadEnt"]. " escogida no es correcta " . "</strong></p>";
        }
        
        //Validacion del Salario
        if($nuevoEntrenador["salarioEnt"]==""){ 
            $errores[] = "<p><strong>El salario no puede estar vacío.</strong></p>";
        }else if(!preg_match('/^\d{0,10}([.]\d{0,2})?$/ ', $nuevoEntrenador["salarioEnt"])){
            $errores[] = "<p><strong>El salario es incorrecto. Debe de contener 2 decimales como máximo y no puede contener más de 10 cifras.". "</strong></p>";
        }

        //Validacion numExperiencia
        if($nuevoEntrenador["numExperienciaEnt"]==""){ 
            $errores[] = "<p><strong>El nº de años de experiencia no puede estar vacío.</strong></p>";
        }else if(!preg_match('/^[0-9]{0,38}$/' , $nuevoEntrenador["numExperienciaEnt"])){
            $errores[] = "<p><strong>El nº de años de experiencia es incorrecto: " . $nuevoEntrenador["numExperienciaEnt"]. ".</strong></p>";
        }
        //Validacion del videojuego
        $error = validarVideojuego($conexion, $nuevoEntrenador["nombreVid"]);
        if($error != "") $errores[] = $error;

    
    return $errores;    
    }

    function getFechaFormateada($fecha){ 
        $fechaEntradaJugador = date('Y/m/d', strtotime($fecha));	
		return $fechaEntradaJugador;
    }
    function validarVideojuego($conexion, $videojuego){
        $videojuegoSelecionado =   array();
        $videojuegoSelecionado[] = $videojuego;
        $error = "";
        $videojuego_db = array();
        $videojuegos = obtenVideojuegos($conexion);
        foreach($videojuegos as $vid){
            $videojuego_db[] = $vid["NOMBREVIDEOJUEGO"];
        }
        
        if(count(array_intersect($videojuego_db, $videojuegoSelecionado)) < count($videojuegoSelecionado)){
			$error = $error ."<p><strong>El videojuego seleccionado no es válido</strong></p>";
		}
        return $error;
    }
    
?>



