<?php
	session_start();

    require_once("gestionBD.php");
    require_once("consultasSql.php");
    require_once("gestionJugadores.php");


    //Comprobamos que para llegar aquí antes se ha tenido que pasar por el registro de un jugador
    if (isset($_SESSION['formulario'])) {
        $nuevoJugador["dniJugador"] = $_REQUEST["dniJugador"];
        $nuevoJugador["nombre"] = $_REQUEST["nombre"];
        $nuevoJugador["nombreVirtual"] = $_REQUEST["nombreVirtual"];
        $nuevoJugador["numTelefono"] = $_REQUEST["numTelefono"];
        $nuevoJugador["correoElectronico"] = $_REQUEST["correoElectronico"];
        $nuevoJugador["nacionalidad"] = $_REQUEST["nacionalidad"];
        $nuevoJugador["fentrada"] = $_REQUEST["fentrada"];
        $nuevoJugador["salario"] = $_REQUEST["salario"];
        $nuevoJugador["numExperiencia"] = $_REQUEST["numExperiencia"];
        $nuevoJugador["nombreVid"] = $_REQUEST["nombreVid"];

        $_SESSION["formulario"] = $nuevoJugador;
        
    }else Header('Location: gestion.php');
    
        $conexion = crearConexionBD();                                         
        $errores = validarDatosJugador($conexion, $nuevoJugador);
        cerrarConexionBD($conexion);

    //Comprobamos si hay errores de validación
	if (count($errores)>0) {
		$_SESSION["errores"] = $errores;
		Header('Location: gestion.php');
	} else{
    //Si todo ha ido bien iremos a accion_insertaMiembro.php donde se hará la inserción del nuevo jugador
        $tipo = $_REQUEST['tipo'];
        if($tipo == "insertar"){
            Header('Location: accion_insertaJugador.php');
        }else{ 
            Header('Location: accion_editaMiembro.php');
        }
    }
		
	// Validación en servidor del formulario de insertar jugadores
	function validarDatosJugador($conexion, $nuevoJugador){
        $errores=array();
    
        //Validación NIF
        if($nuevoJugador["dniJugador"]=="") 
            $errores[] = "<p><strong>El NIF no puede estar vacío.</strong></p>";
        else if(!preg_match("/^[0-9]{8}[A-Z]$/", $nuevoJugador["dniJugador"])){
            $errores[] = "<p><strong>El NIF debe contener 8 números y una letra mayúscula: " . $nuevoJugador["dniJugador"]. ".</strong></p>";
        }
        //Validación Nombre			
        if($nuevoJugador["nombre"]=="") 
        $errores[] = "<p><strong>El nombre no puede estar vacío.</strong></p>";

        //Validación Nick		
        //Comprobar que el jugador no existe en la BD
        $existeJugador = consultarJugador($conexion,$nuevoJugador["nombreVirtual"]);
        foreach($existeJugador as $cuenta){            
            if($cuenta["CUENTA"] >= 1) $errores[] = "<p><strong>El nickname ya existen en la base de datos.</strong></p>";
        }
        if($nuevoJugador["nombreVirtual"]==""){
            $errores[] = "<p><strong>El nick no puede estar vacío.</strong></p>";
        }

        //Validación Número Telefónico
        if($nuevoJugador["numTelefono"]==""){ 
            $errores[] = "<p><strong>El número de teléfono no puede estar vacío.</strong></p>";
        }else if(!preg_match('/^[0-9]{9}$/', $nuevoJugador["numTelefono"])){
            $errores[] = "<p><strong>El número de teléfono es incorrecto: " . $nuevoJugador["numTelefono"]. ".</strong></p>";
        }
        //Validación Email
        if($nuevoJugador["correoElectronico"]==""){ 
            $errores[] = "<p><strong>El email no puede estar vacío.</strong></p>";
        }else if(!filter_var($nuevoJugador["correoElectronico"], FILTER_VALIDATE_EMAIL)){
            $errores[] = "<p><strong>El email es incorrecto: " . $nuevoJugador["correoElectronico"]. ".</strong></p>";
        }
        //Validación Fecha Entrada
        $fechaEntrada = getFechaFormateada($nuevoJugador["fentrada"]);
        $fechaActual =  getFechaFormateada('now');
        
        if($nuevoJugador["fentrada"]==""){ 
            $errores[] = "<p><strong>La fecha de entrada no puede estar vacía.</strong></p>";
        }else if($fechaEntrada > $fechaActual){
            $errores[] = "<p><strong>La fecha de entrada " . $fechaEntrada. " no puede ser posterior a la fecha actual ". $fechaActual . "</strong></p>";
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

        if($nuevoJugador["nacionalidad"]==""){
            $errores[] = "<p><strong>La nacionalidad no puede estar vacía.</strong></p>";
        }else if(!(in_array($nuevoJugador["nacionalidad"], $nacionalidades))){
            $errores[] = "<p><strong>La nacionalidad " . $nuevoJugador["nacionalidad"]. " escogida no es correcta " . "</strong></p>";
        }
        
        //Validacion del Salario
        if($nuevoJugador["salario"]==""){ 
            $errores[] = "<p><strong>El salario no puede estar vacío.</strong></p>";
        }else if(!preg_match('/^\d{0,10}([.]\d{0,2})?$/ ', $nuevoJugador["salario"])){
            $errores[] = "<p><strong>El salario es incorrecto. Debe de contener 2 decimales como máximo y no puede contener más de 10 cifras.". "</strong></p>";
        }

        //Validacion numExperiencia
        if($nuevoJugador["numExperiencia"]==""){ 
            $errores[] = "<p><strong>El nº de años de experiencia no puede estar vacío.</strong></p>";
        }else if(!preg_match('/^[0-9]{0,38}$/' , $nuevoJugador["numExperiencia"])){
            $errores[] = "<p><strong>El nº de años de experiencia es incorrecto: " . $nuevoJugador["numExperiencia"]. ".</strong></p>";
        }
        //Validacion del videojuego
        if($nuevoJugador["nombreVid"] != "") $errores[] = "<p><strong>El nombre del videojuego no puede estar vacío.</strong></p>";  
        
        return $errores;    
    }
    function getFechaFormateada($fecha){ 
        $fechaEntradaJugador = date('Y/m/d', strtotime($fecha));	
		return $fechaEntradaJugador;
    }
    
    
?>
