<?php
	session_start();

    require_once("gestionBD.php");
    require_once("consultasSql.php");
    require_once("gestionJugadores.php");

    //Comprobamos que para llegar aquí antes se ha tenido que pasar por el registro de un jugador
    if (isset($_SESSION['formularioOj'])) {
        $nuevoOjeador['dniOjeador'] = $_REQUEST["dniOjeador"];
		$nuevoOjeador['nombreOjeador'] = $_REQUEST["nombreOjeador"];
		$nuevoOjeador['numTelefonoOj'] = $_REQUEST["numTelefonoOj"];
		$nuevoOjeador['correoElectronicoOj'] = $_REQUEST["correoElectronicoOj"];
		$nuevoOjeador['nacionalidadOj'] = $_REQUEST["nacionalidadOj"];
        $nuevoOjeador['salarioOj'] = $_REQUEST["salarioOj"];
        $nuevoOjeador['numExperienciaOj'] = $_REQUEST["numExperienciaOj"];
        $nuevoOjeador['nombreVid'] = $_REQUEST["nombreVid"];

        $_SESSION["formularioOj"] = $nuevoOjeador;
        
    }else Header('Location: gestion.php');
    
        $conexion = crearConexionBD();                                         
        $errores = validarDatosOjeador($conexion, $nuevoOjeador);
        cerrarConexionBD($conexion);

    //Comprobamos si hay errores de validación
	if (count($errores)>0) {
		$_SESSION["errores"] = $errores;
		Header('Location: gestion.php');
	} else{
        $tipo = $_REQUEST['tipo'];
        if($tipo == "insertar"){
            //Si todo ha ido bien iremos a accion_insertaMiembro.php donde se hará la inserción del nuevo ojeador
            Header('Location: accion_insertaOjeador.php');
        }else{
            //Si todo ha ido bien iremos a accion_editaMiembro.php donde se hará la actualizacion del ojeador
            Header('Location: accion_editaOjeador.php');
        }
    }
		
	// Validación en servidor del formulario de insertar jugadores
	function validarDatosOjeador($conexion, $nuevoOjeador){
        $errores=array();
    
        //Validación NIF
        if($nuevoOjeador["dniOjeador"]=="") 
            $errores[] = "<p><strong>El NIF no puede estar vacío.</strong></p>";
        else if(!preg_match("/^[0-9]{8}[A-Z]$/", $nuevoOjeador["dniOjeador"])){
            $errores[] = "<p><strong>El NIF debe contener 8 números y una letra mayúscula: " . $nuevoOjeador["dniOjeador"]. ".</strong></p>";
        }
        //Validación Nombre			
        if($nuevoOjeador["nombreOjeador"]=="") 
        $errores[] = "<p><strong>El nombre no puede estar vacío.</strong></p>";

        //Validación Número Telefónico
        if($nuevoOjeador["numTelefonoOj"]==""){ 
            $errores[] = "<p><strong>El número de teléfono no puede estar vacío.</strong></p>";
        }else if(!preg_match('/^[0-9]{9}$/', $nuevoOjeador["numTelefonoOj"])){
            $errores[] = "<p><strong>El número de teléfono es incorrecto: " . $nuevoOjeador["numTelefonoOj"]. ".</strong></p>";
        }
        //Validación Email
        if($nuevoOjeador["correoElectronicoOj"]==""){ 
            $errores[] = "<p><strong>El email no puede estar vacío.</strong></p>";
        }else if(!filter_var($nuevoOjeador["correoElectronicoOj"], FILTER_VALIDATE_EMAIL)){
            $errores[] = "<p><strong>El email es incorrecto: " . $nuevoOjeador["correoElectronicoOj"]. ".</strong></p>";
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

        if($nuevoOjeador["nacionalidadOj"]==""){
            $errores[] = "<p><strong>La nacionalidad no puede estar vacía.</strong></p>";
        }else if(!(in_array($nuevoOjeador["nacionalidadOj"], $nacionalidades))){
            $errores[] = "<p><strong>La nacionalidad " . $nuevoOjeador["nacionalidadOj"]. " escogida no es correcta " . "</strong></p>";
        }
        
        //Validacion del Salario
        if($nuevoOjeador["salarioOj"]==""){ 
            $errores[] = "<p><strong>El salario no puede estar vacío...</strong></p>";
        }else if(!preg_match('/^\d{0,10}([.]\d{0,2})?$/ ', $nuevoOjeador["salarioOj"])){
            $errores[] = "<p><strong>El salario es incorrecto. Debe de contener 2 decimales como máximo y no puede contener más de 10 cifras.". "</strong></p>";
        }

        //Validacion numExperiencia
        if($nuevoOjeador["numExperienciaOj"]==""){ 
            $errores[] = "<p><strong>El nº de años de experiencia no puede estar vacío.</strong></p>";
        }else if(!preg_match('/^[0-9]{0,38}$/' , $nuevoOjeador["numExperienciaOj"])){
            $errores[] = "<p><strong>El nº de años de experiencia es incorrecto: " . $nuevoOjeador["numExperienciaOj"]. ".</strong></p>";
        }   
    }

    function getFechaFormateada($fecha){ 
        $fechaEntradaJugador = date('Y/m/d', strtotime($fecha));	
		return $fechaEntradaJugador;
    }
?>
