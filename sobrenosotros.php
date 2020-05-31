<?php
    session_start();
    require_once("gestionBD.php");
    require_once("consultasSql.php");

    if(isset($_SESSION['login'])){
        $nickUsuario = $_SESSION['login'];
    }else{
        Header("Location: login.php");
    }
    if (isset($_SESSION['errores'])){
        $errores = $_SESSION['errores'];
        unset($_SESSION["errores"]);
    }
		$conexion = crearConexionBD();
		
		if(isset($_GET['enviar'])){
        $cuerpo = '
        <!DOCTYPE html>
        <html>
        <head>
         <title></title>
        </head>
        <body>
        '.$_GET['cuerpo'].'
        </body>
        </html>';

        //para el envío en formato HTML
        $headers  = "MIME-Version: 1.0\r\n";
        $headers .= "Content-type: text/html; charset=iso-8859-1\r\n";

        //dirección del remitente
        $headers .= "From: ".$_GET['nombre']." <".$_GET['emisor'].">\r\n";

        //Una Dirección de respuesta, si queremos que sea distinta que la del remitente
        $headers .= "Reply-To: ".$_GET['emisor']."\r\n";

        //Direcciones que recibián copia
        //$headers .= "Cc: ejemplo2@gmail.com\r\n";

        //direcciones que recibirán copia oculta
        //$headers .= "Bcc: ejemplo3@yahoo.com\r\n";
        if(mail('almafe2510@gmail.com',$_GET['asunto'],$cuerpo,$headers)){
    		echo "<script>alert('Funcion \"mail()\" ejecutada, por favor verifique su bandeja de correo.');</script>";
    	}else{
    		echo "<script>alert('No se pudo enviar el mail, por favor verifique su configuracion de correo SMTP saliente.');</script>";
    	}
    }
	
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <title>Sobre Nosostros</title>
    <?php include_once("headComun.php"); ?>
    <link rel="stylesheet" type="text/css" href="css/sobrenosotros.css">
    <link rel="stylesheet" type="text/css" href="css/error_form.css">
    <script src="https://code.jquery.com/jquery-3.1.1.min.js" type="text/javascript"></script>
    <script type="text/javascript" src="js/gestion.js"></script>
</head>

<body>
    <?php include_once("fondo.php"); 
	
    if(isset($_SESSION['ADMIN'])){
    	include_once("navegacion_ADMIN.php"); 
    }else{
    	include_once("navegacion.php");
    }
    ?>

    <div id="div_errores" class="error">
        <?php
        if (isset($errores) && count($errores)>0) {
            //Mostramos los errores en el caso de que los haya 
            foreach($errores as $error) echo $error; 
          }
        ?>
    </div>
        
    <div class="col-6 col-tab-6 myTable">
   		<h4>¿Quiénes somos?</h4>
   		<img id="imglogo" src="images/logo.png" alt="Logo"></a>
   		<div class="texto">
   		<p>&nbsp&nbsp&nbsp&nbsp U.D. Constantina eSports busca fomentar la creación de contenido audiovisual, 
               innovación y la exploración de un sector joven además de estar en continuo movimiento 
               explorando nuevos territorios de competición y nuevos segmentos de la misma llegando a 
               los públicos más jóvenes además de los adultos con el objetivo de crear un nuevo modelo 
               de entretenimiento y ocio único buscando conseguir la felicidad y el afecto de nuestros 
               seguidores y fans además de ser una de las entidades deportivas de referencia en el sector. 
          </p>
        
          <p>&nbsp&nbsp&nbsp&nbsp U.D. Constantina eSports quiere ser algo más que una entidad deportiva o de ocio, busca ser 
               una familia Fiel y con una Unidad de Bloque firme y fuerte consolidando así una comunidad propia 
               en la que los valores como el respeto, la comprensión e igualdad vayan por delante siendo referente 
               además por su compromiso con la sociedad. 
               
        </p>
</div>
    </div>

	<div class="col-4 col-tab-4">
		
<div class="myTable3">
   		<h4>¡Síguenos!</h4>
   		<div class="enlaces">
			<a href="https://www.instagram.com/udcesports/" target="_blank">
			<img id="imgIg" src="images/insta.png" alt="Icono Instagram">&nbsp&nbsp Instagram &nbsp&nbsp</a></br>
			<a href="https://www.twitch.tv/udconstantinaesports/" target="_blank">
			<img id="imgTwitch" src="images/twich.png" alt="Icono Twitch">&nbsp&nbsp Twitch &nbsp&nbsp</a></br>
			<a href="https://twitter.com/udcesports?lang=es" target="_blank">
			<img id="imgTwitter" src="images/twitter.png" alt="Icono Twitter">&nbsp Twitter &nbsp&nbsp</a></br>
   		</div>

</div>
<div class="myTable2">
	   		<h4>¿En qué podemos ayudarte?</h4>

	<form method="get" action="controlador_nosotros.php" id="nosotros">
    <label>Asunto:</label>
            <input type="text" maxlength="55" name="asunto" value="" placeholder="Asunto" ></br>
            <label>De:</label>
            <input type="text" maxlength="25" oninput="nameValidationJ()" id="nombre" name="nombre" value="" required placeholder="Tu Nombre">
            <input oninput="emailValidationJ()" id="correoElectronico" type="email" maxlength="25" name="correoElectronico" required  placeholder="Email remitente" value=""></br>
            <div><textarea oninput="comentaValidation2()" id="cuerpo" name="cuerpo" placeholder="Contenido del mensaje" cols="57" rows="10"></textarea></div></br>
            <input type="submit" name="enviar" value="Enviar correo">
    </form>
</div>

</div>
<?
cerrarConexionBD($conexion);
?>


</body>
</html>