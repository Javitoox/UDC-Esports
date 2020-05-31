<?php
    session_start();
    require_once("gestionBD.php");
    require_once("consultasSql.php");

    if(isset($_SESSION['login'])){
        $nickUsuario = $_SESSION['login'];
    }else{
        Header("Location: login.php");
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
    <script type="text/javascript" src="jquery-3.5.1.min.js"></script>  
</head>

<body>
    <?php include_once("fondo.php"); 
	
    if(isset($_SESSION['ADMIN'])){
    	include_once("navegacion_ADMIN.php"); 
    }else{
    	include_once("navegacion.php");
    }
    
    ?>
	 
    
    <div class="col-3 col-tab-3 myTable">
   		<h4>¿Quiénes somos?</h4>
   		<p>U.D. Constantina eSports busca fomentar la creación de contenido audiovisual, 
               innovación y la exploración de un sector joven además de estar en continuo movimiento 
               explorando nuevos territorios de competición y nuevos segmentos de la misma llegando a 
               los públicos más jóvenes además de los adultos con el objetivo de crear un nuevo modelo 
               de entretenimiento y ocio único buscando conseguir la felicidad y el afecto de nuestros 
               seguidores y fans además de ser una de las entidades deportivas de referencia en el sector. 
             
               U.D. Constantina eSports quiere ser algo más que una entidad deportiva o de ocio, busca ser 
               una familia Fiel y con una Unidad de Bloque firme y fuerte consolidando así una comunidad propia 
               en la que los valores como el respeto, la comprensión e igualdad vayan por delante siendo referente 
               además por su compromiso con la sociedad. 
        </p>

    </div>

	
<div class="col-3 col-tab-3 myTable2">
	   		<h4>¿En qué podemos ayudarte?</h4>

	<form method="get">
            <label>Asunto:</label>
            <input type="text" size="55" name="asunto" value="" required  placeholder="Asunto" ></br>
            <label>De:</label>
            <input type="text" size="25" name="nombre" value="" required placeholder="Tu Nombre">
            <input type="email" size="25" name="emisor" required  placeholder="Email remitente" value=""></br>
            <textarea name="cuerpo" placeholder="Contenido del mensaje" cols="57" rows="10"></textarea></br>
            <input type="submit" name="enviar" value="Enviar correo">
    </form>
</div>

<div class="col-3 col-tab-3 myTable3">
   		<h4>¿Síguenos!</h4>
   		<div class="enlaces">
			<a href="https://www.instagram.com/udcesports/" target="_blank">
			<img id="imgIg" src="images/insta.png" alt="Icono Instagram">&nbsp&nbsp Instagram &nbsp&nbsp</a></br>
			<a href="https://www.twitch.tv/udconstantinaesports/" target="_blank">
			<img id="imgTwitch" src="images/twich.png" alt="Icono Twitch">&nbsp&nbsp Twitch &nbsp&nbsp</a></br>
			<a href="https://twitter.com/udcesports?lang=es" target="_blank">
			<img id="imgTwitter" src="images/twitter.png" alt="Icono Twitter">&nbsp Twitter &nbsp&nbsp</a></br>
   		</div>

</div>

<?
cerrarConexionBD($conexion);
?>


</body>
</html>