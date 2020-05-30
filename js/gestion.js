$(document).ready(function(){
	

	
    $("#jugadores_formulario").on("boton", function() {
                return validateForm4();
            });
	
	$("#crearEntrenador").on("submit", function() {
				return validateForm5();
			});
			
	$("#crearOjeador").on("submit", function() {
				return validateForm6();
			});
			
	$("#fechai").on("submit", function() {
				return validateForm7();
			});
	$("#fecha").on("submit", function() {
				return validateForm8();
			});
	$("#fecha1").on("submit", function() {
				return validateForm9();
			});
	$("#fecha2").on("submit", function() {
				return validateForm10();
			});
	
	
});

function validateForm4() {
	var noValidation = document.getElementById("jugadores_formulario").novalidate;
	if (!noValidation){
		var valid1=nifValidationJ();
		var valid2=nameValidationJ();
		var valid3=nickValidationJ();
		var valid4=phoneValidationJ();
		var valid5=emailValidationJ();
		var valid6=nacionalidadValidationJ();
		var valid7=fentradaValidationJ(); 
		var valid8=salarioValidationJ();
		var valid9=numExperienciaValidationJ();
		
		return (valid1.length==0) && (valid2.length==0) && (valid3.length==0) && (valid4.length==0) && 
		(valid5.length==0) && (valid6.length==0) && (valid7.length==0) && (valid8.length==0) && (valid9.length==0);
	}
	else 
		return true;		
}

function validateForm5() {
		var noValidation = document.getElementById("crearEntrenador").novalidate;
		if (!noValidation){
			var valid1=nifValidationE();
			var valid2=nameValidationE();
			var valid4=emailValidationE();
			var valid6=phoneValidationE();
			var valid7=experValidationE();
			var valid8= salarioValidationE();
			var valid9= nacionalidadValidationE();


			return (valid1.length==0) && (valid2.length==0) && (valid4.length==0) && 
			 (valid6.length==0)&&(valid7.length==0)&&(valid8.length==0)&&(valid9.length==0);
		}
		else 
			return true;		
}

function validateForm6() {
		var noValidation = document.getElementById("crearOjeador").novalidate;
		
		if (!noValidation){
			var valid1=nifValidationO();
			var valid2=nameValidationO();
			var valid4=emailValidationO();
			var valid6=phoneValidationO();
			var valid7=experValidationO();
			var valid8= salarioValidationO();
			var valid9= nacionalidadValidationO();


			return (valid1.length==0) && (valid2.length==0) && (valid4.length==0) && 
			 (valid6.length==0)&&(valid7.length==0)&&(valid8.length==0)&&(valid9.length==0);
		}
		else 
			return true;		
}
function validateForm7() {
		var noValidation = document.getElementById("fechai").novalidate;
		
		if (!noValidation){
			var valid1=dateValidation();
			


			return (valid1.length==0) ;
		}
		else 
			return true;		
}
function validateForm8() {
		var noValidation = document.getElementById("fecha").novalidate;
		
		if (!noValidation){
			var valid1=dateValidation1();
			


			return (valid1.length==0) ;
		}
		else 
			return true;		
}
function validateForm9() {
		var noValidation = document.getElementById("fecha1").novalidate;
		
		if (!noValidation){
			var valid1=dateValidation11();
			


			return (valid1.length==0) ;
		}
		else 
			return true;		
}
function validateForm10() {
		var noValidation = document.getElementById("fecha2").novalidate;
		
		if (!noValidation){
			var valid1=dateValidation2();
			


			return (valid1.length==0) ;
		}
		else 
			return true;		
}

function nifValidationJ(){
	var errores="";
	var nif=document.getElementById("dniJugador").value;
	var expreg=/^[0-9]{8}[A-Z]$/;
	if(nif==""){
		errores+="<p><strong>El NIF no puede estar vacío.</strong></p>";
	}else if(!expreg.test(nif)){
		errores+="<p><strong>El NIF debe contener 8 números y una letra mayúscula: "+nif+".</strong></p>";
	}
	if(errores!=""){
		document.getElementById("dniJugador").removeAttribute("style");
		if($('#val_nif').length){
			document.getElementById("val_nif").innerHTML=errores;
		}else{
			document.getElementById("div_errores").innerHTML=document.getElementById("div_errores").innerHTML+"<div id='val_nif'>"+errores+"</div>";
		}
	}else{
		document.getElementById("dniJugador").setAttribute("style","background-color: #9CF0BF;");
		if($('#val_nif').length){
			document.getElementById("val_nif").innerHTML="";
		}
	}
	return errores;
}
function nameValidationJ(){
	var errores="";
	var name=document.getElementById("nombre").value;
	if(name==""){
		errores+="<p><strong>El nombre no puede estar vacío.</strong></p>";
	}
	if(errores!=""){
		document.getElementById("nombre").removeAttribute("style");
		if($('#val_name').length){
			document.getElementById("val_name").innerHTML=errores;
		}else{
			document.getElementById("div_errores").innerHTML=document.getElementById("div_errores").innerHTML+"<div id='val_name'>"+errores+"</div>";
		}
	}else{
		document.getElementById("nombre").setAttribute("style","background-color: #9CF0BF;");
		if($('#val_name').length){
			document.getElementById("val_name").innerHTML="";	
		}
	}
	return errores;
}

function nickValidationJ(){
	var errores="";
	var nick=document.getElementById("nombreVirtual").value;
	if(nick==""){
		errores+="<p><strong>El nick no puede estar vacío.</strong></p>";
	}
	if(errores!=""){
		document.getElementById("nombreVirtual").removeAttribute("style");
		if($('#val_nick').length){
			document.getElementById("val_nick").innerHTML=errores;
		}else{
			document.getElementById("div_errores").innerHTML=document.getElementById("div_errores").innerHTML+"<div id='val_nick'>"+errores+"</div>";
		}
	}else{
		document.getElementById("nombreVirtual").setAttribute("style","background-color: #9CF0BF;");
		if($('#val_nick').length){
			document.getElementById("val_nick").innerHTML="";
		}
	}
	return errores;
}

function emailValidationJ(){
	var errores="";
	var email=document.getElementById("correoElectronico").value;
	var expreg=/^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?(?:\.[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?)*$/;
	if(email==""){
		errores+="<p><strong>El email no puede estar vacío.</strong></p>";
	}else if(!expreg.test(email)){
		errores+="<p><strong>El email es incorrecto: " +email+ ".</strong></p>";
	}
	if(errores!=""){
		document.getElementById("correoElectronico").removeAttribute("style");
		if($('#val_email').length){
			document.getElementById("val_email").innerHTML=errores;
		}else{
			document.getElementById("div_errores").innerHTML=document.getElementById("div_errores").innerHTML+"<div id='val_email'>"+errores+"</div>";	
		}
	}else{
		document.getElementById("correoElectronico").setAttribute("style","background-color: #9CF0BF;");
		if($('#val_email').length){
			document.getElementById("val_email").innerHTML="";
		}
	}
	return errores;
}

function phoneValidationJ(){
	var errores="";
	var tel=document.getElementById("numTelefono").value;
	var expreg=/^[0-9]{9}$/;
	if(tel==""){
		errores+="<p><strong>El número de teléfono no puede estar vacío.</strong></p>";
	}else if(!expreg.test(tel)){
		errores+="<p><strong>El número de teléfono es incorrecto: " +tel+ ".</strong></p>";
	}
	
	if(errores!=""){
		document.getElementById("numTelefono").removeAttribute("style");
		if($('#val_tele').length){
			document.getElementById("val_tele").innerHTML=errores;
		}else{
			document.getElementById("div_errores").innerHTML=document.getElementById("div_errores").innerHTML+"<div id='val_tele'>"+errores+"</div>";
		}
	}else{
		document.getElementById("numTelefono").setAttribute("style","background-color: #9CF0BF;");
		if($('#val_tele').length){
			document.getElementById("val_tele").innerHTML="";
		}
	}
	return errores;
}
function salarioValidationJ(){
	var errores="";
	var email=document.getElementById("salario").value;
	var expreg=/^\d{0,10}([.]\d{0,2})?$/;
	if(email==""){
		errores+="<p><strong>El email no puede estar vacío.</strong></p>";
	}else if(!expreg.test(email)){
		errores+="<p><strong>El email es incorrecto: " +email+ ".</strong></p>";
	}
	if(errores!=""){
		document.getElementById("salario").removeAttribute("style");
		if($('#val_salario').length){
			document.getElementById("val_salario").innerHTML=errores;
		}else{
			document.getElementById("div_errores").innerHTML=document.getElementById("div_errores").innerHTML+"<div id='val_salario'>"+errores+"</div>";	
		}
	}else{
		document.getElementById("salario").setAttribute("style","background-color: #9CF0BF;");
		if($('#val_salario').length){
			document.getElementById("val_salario").innerHTML="";
		}
	}
	return errores;
}

function nacionalidadValidationJ(){
	var errores="";
	var nacionalidad=document.getElementById("nacionalidad").value;
	var expreg=['Afganistán','Albania','Alemania','Andorra','Angola','Antigua y Barbuda','Arabia Saudita','Argelia','Argentina',
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
        'Yemen','Yibuti','Zambia','Zimbabue'];
        
	if(nacionalidad==""){
		errores+="<p><strong>La nacionalidad no puede estar vacía.</strong></p>";
	}else if(!expreg.includes(nacionalidad)){
		errores+="<p><strong>La nacionalidad: " +nacionalidad+ ".</strong></p>";
	}
	if(errores!=""){
		document.getElementById("nacionalidad").removeAttribute("style");
		if($('#val_nacionalidad').length){
			document.getElementById("val_nacionalidad").innerHTML=errores;
		}else{
			document.getElementById("div_errores").innerHTML=document.getElementById("div_errores").innerHTML+"<div id='val_nacionalidad'>"+errores+"</div>";	
		}
	}else{
		document.getElementById("nacionalidad").setAttribute("style","background-color: #9CF0BF;");
		if($('#val_nacionalidad').length){
			document.getElementById("val_nacionalidad").innerHTML="";
		}
	}
	return errores;
}
function numExperienciaValidationJ(){
    var errores="";
    var ex=document.getElementById("numExperiencia").value;
    var expreg=/^[0-9]{0,38}$/;
    if(ex==""){
        errores+="<p><strong>El número de años de experiencia no puede estar vacío.</strong></p>";
    }else if(!expreg.test(ex)){
        errores+="<p><strong>El número de años de experiencia es incorrecto: " +ex+ ".</strong></p>";
    }
    if(errores!=""){
        document.getElementById("numExperiencia").removeAttribute("style");
        if($('#val_salario').length){
            document.getElementById("val_salario").innerHTML=errores;
        }else{
            document.getElementById("div_errores").innerHTML=document.getElementById("div_errores").innerHTML+"<div id='val_salario'>"+errores+"</div>";
        }
    }else{
        document.getElementById("numExperiencia").setAttribute("style","background-color: #9CF0BF;");
        if($('#val_salario').length){
            document.getElementById("val_salario").innerHTML="";
        }
    }
    return errores;
}
function fentradaValidationJ(){
    var errores="";
    var fecha=document.getElementById("fentrada").value;
    var fecha_aux=fecha.split("-");
    var fecha1 =new Date(parseInt(fecha_aux[0]),parseInt(fecha_aux[1]-1),parseInt(fecha_aux[2]));
    var fecha2=new Date();
    if(fecha==""){
        errores+="<p><strong>La fecha de entrada no puede estar vacía.</strong></p>";
    }else if(fecha1 > fecha2){
        errores+="<p><strong>La fecha de entrada "+fecha1.getFullYear() + "/" + (fecha1.getMonth() +1) + "/" + fecha1.getDate()+" no puede ser posterior a la fecha actual "+fecha2.getFullYear() + "/" + (fecha2.getMonth() +1) + "/" + fecha2.getDate()+"</strong></p>";
    }
    if(errores!=""){
        document.getElementById("fentrada").removeAttribute("style");
        if($('#val_fecha').length){
            document.getElementById("val_fecha").innerHTML=errores;
        }else{
            document.getElementById("div_errores").innerHTML=document.getElementById("div_errores").innerHTML+"<div id='val_fecha'>"+errores+"</div>";
        }
    }else{
        document.getElementById("fentrada").setAttribute("style","background-color: #9CF0BF;");
        if($('#val_fecha').length){
            document.getElementById("val_fecha").innerHTML="";
        }
    }
    return errores;
}

function dateValidation(){
	var errores="";
	var fecha=document.getElementById("fechai").value;
	var fecha_aux=fecha.split("-");
	var fecha1 =new Date(parseInt(fecha_aux[0]),parseInt(fecha_aux[1]-1),parseInt(fecha_aux[2]));
	var fecha2=new Date();
	if(fecha==""){
		errores+="<p><strong>La fecha de nacimiento no puede estar vacía.</strong></p>";
	}else if(fecha1 > fecha2){
		errores+="<p><strong>La fecha de nacimiento "+fecha1.getFullYear() + "/" + (fecha1.getMonth() +1) + "/" + fecha1.getDate()+" no puede ser posterior a la fecha actual "+fecha2.getFullYear() + "/" + (fecha2.getMonth() +1) + "/" + fecha2.getDate()+"</strong></p>";
	}
	if(errores!=""){
		document.getElementById("fechai").removeAttribute("style");
		if($('#val_fecha').length){
			document.getElementById("val_fecha").innerHTML=errores;
		}else{
			document.getElementById("div_errores").innerHTML=document.getElementById("div_errores").innerHTML+"<div id='val_fecha'>"+errores+"</div>";
		}
	}else{
		document.getElementById("fechai").setAttribute("style","background-color: #9CF0BF;");
		if($('#val_fecha').length){
			document.getElementById("val_fecha").innerHTML="";
		}
	}
	return errores;
}
function dateValidation1(){
	var errores="";
	var fecha=document.getElementById("fecha").value;
	var fecha_aux=fecha.split("-");
	var fecha1 =new Date(parseInt(fecha_aux[0]),parseInt(fecha_aux[1]-1),parseInt(fecha_aux[2]));
	var fecha2=new Date();
	if(fecha==""){
		errores+="<p><strong>La fecha de nacimiento no puede estar vacía.</strong></p>";
	}else if(fecha1 > fecha2){
		errores+="<p><strong>La fecha de nacimiento "+fecha1.getFullYear() + "/" + (fecha1.getMonth() +1) + "/" + fecha1.getDate()+" no puede ser posterior a la fecha actual "+fecha2.getFullYear() + "/" + (fecha2.getMonth() +1) + "/" + fecha2.getDate()+"</strong></p>";
	}
	if(errores!=""){
		document.getElementById("fecha").removeAttribute("style");
		if($('#val_fecha').length){
			document.getElementById("val_fecha").innerHTML=errores;
		}else{
			document.getElementById("div_errores").innerHTML=document.getElementById("div_errores").innerHTML+"<div id='val_fecha'>"+errores+"</div>";
		}
	}else{
		document.getElementById("fecha").setAttribute("style","background-color: #9CF0BF;");
		if($('#val_fecha').length){
			document.getElementById("val_fecha").innerHTML="";
		}
	}
	return errores;
}
function dateValidation11(){
	var errores="";
	var fecha=document.getElementById("fecha1").value;
	var fecha_aux=fecha.split("-");
	var fecha1 =new Date(parseInt(fecha_aux[0]),parseInt(fecha_aux[1]-1),parseInt(fecha_aux[2]));
	var fecha2=new Date();
	if(fecha==""){
		errores+="<p><strong>La fecha de nacimiento no puede estar vacía.</strong></p>";
	}else if(fecha1 > fecha2){
		errores+="<p><strong>La fecha de nacimiento "+fecha1.getFullYear() + "/" + (fecha1.getMonth() +1) + "/" + fecha1.getDate()+" no puede ser posterior a la fecha actual "+fecha2.getFullYear() + "/" + (fecha2.getMonth() +1) + "/" + fecha2.getDate()+"</strong></p>";
	}
	if(errores!=""){
		document.getElementById("fecha1").removeAttribute("style");
		if($('#val_fecha').length){
			document.getElementById("val_fecha").innerHTML=errores;
		}else{
			document.getElementById("div_errores").innerHTML=document.getElementById("div_errores").innerHTML+"<div id='val_fecha'>"+errores+"</div>";
		}
	}else{
		document.getElementById("fecha1").setAttribute("style","background-color: #9CF0BF;");
		if($('#val_fecha').length){
			document.getElementById("val_fecha").innerHTML="";
		}
	}
	return errores;
}
function dateValidation22(){
	var errores="";
	var fecha=document.getElementById("fecha2").value;
	var fecha_aux=fecha.split("-");
	var fecha1 =new Date(parseInt(fecha_aux[0]),parseInt(fecha_aux[1]-1),parseInt(fecha_aux[2]));
	var fecha2=new Date();
	if(fecha==""){
		errores+="<p><strong>La fecha de nacimiento no puede estar vacía.</strong></p>";
	}else if(fecha1 > fecha2){
		errores+="<p><strong>La fecha de nacimiento "+fecha1.getFullYear() + "/" + (fecha1.getMonth() +1) + "/" + fecha1.getDate()+" no puede ser posterior a la fecha actual "+fecha2.getFullYear() + "/" + (fecha2.getMonth() +1) + "/" + fecha2.getDate()+"</strong></p>";
	}
	if(errores!=""){
		document.getElementById("fecha2").removeAttribute("style");
		if($('#val_fecha').length){
			document.getElementById("val_fecha").innerHTML=errores;
		}else{
			document.getElementById("div_errores").innerHTML=document.getElementById("div_errores").innerHTML+"<div id='val_fecha'>"+errores+"</div>";
		}
	}else{
		document.getElementById("fecha2").setAttribute("style","background-color: #9CF0BF;");
		if($('#val_fecha').length){
			document.getElementById("val_fecha").innerHTML="";
		}
	}
	return errores;
}
	
function nifValidationE(){
	var errores="";
	var nif=document.getElementById("dniEntrenador").value;
	var expreg=/^[0-9]{8}[A-Z]$/;
	if(nif==""){
		errores+="<p><strong>El NIF no puede estar vacío.</strong></p>";
	}else if(!expreg.test(nif)){
		errores+="<p><strong>El NIF debe contener 8 números y una letra mayúscula: "+nif+".</strong></p>";
	}
	if(errores!=""){
		document.getElementById("dniEntrenador").removeAttribute("style");
		if($('#val_nif').length){
			document.getElementById("val_nif").innerHTML=errores;
		}else{
			document.getElementById("div_errores").innerHTML=document.getElementById("div_errores").innerHTML+"<div id='val_nif'>"+errores+"</div>";
		}
	}else{
		document.getElementById("dniEntrenador").setAttribute("style","background-color: #9CF0BF;");
		if($('#val_nif').length){
			document.getElementById("val_nif").innerHTML="";
		}
	}
	return errores;
}

function nameValidationE(){
	var errores="";
	var name=document.getElementById("nombreEntrenador").value;
	if(name==""){
		errores+="<p><strong>El nombre no puede estar vacío.</strong></p>";
	}
	if(errores!=""){
		document.getElementById("nombreEntrenador").removeAttribute("style");
		if($('#val_name').length){
			document.getElementById("val_name").innerHTML=errores;
		}else{
			document.getElementById("div_errores").innerHTML=document.getElementById("div_errores").innerHTML+"<div id='val_name'>"+errores+"</div>";
		}
	}else{
		document.getElementById("nombreEntrenador").setAttribute("style","background-color: #9CF0BF;");
		if($('#val_name').length){
			document.getElementById("val_name").innerHTML="";	
		}
	}
	return errores;
}


function emailValidationE(){
	var errores="";
	var email=document.getElementById("correoElectronicoEnt").value;
	var expreg=/^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?(?:\.[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?)*$/;
	if(email==""){
		errores+="<p><strong>El email no puede estar vacío.</strong></p>";
	}else if(!expreg.test(email)){
		errores+="<p><strong>El email es incorrecto: " +email+ ".</strong></p>";
	}
	if(errores!=""){
		document.getElementById("correoElectronicoEnt").removeAttribute("style");
		if($('#val_email').length){
			document.getElementById("val_email").innerHTML=errores;
		}else{
			document.getElementById("div_errores").innerHTML=document.getElementById("div_errores").innerHTML+"<div id='val_email'>"+errores+"</div>";	
		}
	}else{
		document.getElementById("correoElectronicoEnt").setAttribute("style","background-color: #9CF0BF;");
		if($('#val_email').length){
			document.getElementById("val_email").innerHTML="";
		}
	}
	return errores;
}



function phoneValidationE(){
	var errores="";
	var tel=document.getElementById("numTelefonoEnt").value;
	var expreg=/^[0-9]{9}$/;
	if(tel==""){
		errores+="<p><strong>El número de teléfono no puede estar vacío.</strong></p>";
	}else if(!expreg.test(tel)){
		errores+="<p><strong>El número de teléfono es incorrecto: " +tel+ ".</strong></p>";
	}
	
	if(errores!=""){
		document.getElementById("numTelefonoEnt").removeAttribute("style");
		if($('#val_tele').length){
			document.getElementById("val_tele").innerHTML=errores;
		}else{
			document.getElementById("div_errores").innerHTML=document.getElementById("div_errores").innerHTML+"<div id='val_tele'>"+errores+"</div>";
		}
	}else{
		document.getElementById("numTelefonoEnt").setAttribute("style","background-color: #9CF0BF;");
		if($('#val_tele').length){
			document.getElementById("val_tele").innerHTML="";
		}
	}
	return errores;
}
function experValidationE(){
	var errores="";
	var ex=document.getElementById("numExperienciaEnt").value;
	var expreg=/^[0-9]{0,38}$/;
	if(ex==""){
		errores+="<p><strong>Los años de experiencia no puede estar vacío.</strong></p>";
	}else if(!expreg.test(ex)){
		errores+="<p><strong>Los años de experiencia son incorrectos: " +ex+ ".</strong></p>";
	}
	
	if(errores!=""){
		document.getElementById("numExperienciaEnt").removeAttribute("style");
		if($('#val_exper').length){
			document.getElementById("val_exper").innerHTML=errores;
		}else{
			document.getElementById("div_errores").innerHTML=document.getElementById("div_errores").innerHTML+"<div id='val_exper'>"+errores+"</div>";
		}
	}else{
		document.getElementById("numExperienciaEnt").setAttribute("style","background-color: #9CF0BF;");
		if($('#val_exper').length){
			document.getElementById("val_exper").innerHTML="";
		}
	}
	return errores;
}
function salarioValidationE(){
	var errores="";
	var sal=document.getElementById("salarioEnt").value;
	var expreg=/^[0-9]+.[0-9]{2}$/;
	if(sal==""){
		errores+="<p><strong>El salario no puede estar vacío.</strong></p>";
	}else if(!expreg.test(sal)){
		errores+="<p><strong>El salario es incorrecto: " +email+ ".</strong></p>";
	}
	if(errores!=""){
		document.getElementById("salarioEnt").removeAttribute("style");
		if($('#val_salario').length){
			document.getElementById("val_salario").innerHTML=errores;
		}else{
			document.getElementById("div_errores").innerHTML=document.getElementById("div_errores").innerHTML+"<div id='val_salario'>"+errores+"</div>";	
		}
	}else{
		document.getElementById("salarioEnt").setAttribute("style","background-color: #9CF0BF;");
		if($('#val_salario').length){
			document.getElementById("val_salario").innerHTML="";
		}
	}
	return errores;
}
function nacionalidadValidationE(){
	var errores="";
	var nac=document.getElementById("nacionalidadEnt").value;
	var list=['Afganistán','Albania','Alemania','Andorra','Angola','Antigua y Barbuda','Arabia Saudita','Argelia','Argentina',
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
        'Yemen','Yibuti','Zambia','Zimbabue'];
        
	if(nac==""){
		errores+="<p><strong>La nacionalidad no puede estar vacía.</strong></p>";
	}else if(!list.includes(nac)){
		errores+="<p><strong>La nacionalidad es incorrecta: " +nac+ ".</strong></p>";
	}
	if(errores!=""){
		document.getElementById("nacionalidadEnt").removeAttribute("style");
		if($('#val_nacionalidad').length){
			document.getElementById("val_nacionalidad").innerHTML=errores;
		}else{
			document.getElementById("div_errores").innerHTML=document.getElementById("div_errores").innerHTML+"<div id='val_nacionalidad'>"+errores+"</div>";	
		}
	}else{
		document.getElementById("nacionalidadEnt").setAttribute("style","background-color: #9CF0BF;");
		if($('#val_nacionalidad').length){
			document.getElementById("val_nacionalidad").innerHTML="";
		}
	}
	return errores;
}
function nifValidationO(){
	var errores="";
	var nif=document.getElementById("dniOjeador").value;
	var expreg=/^[0-9]{8}[A-Z]$/;
	if(nif==""){
		errores+="<p><strong>El NIF no puede estar vacío.</strong></p>";
	}else if(!expreg.test(nif)){
		errores+="<p><strong>El NIF debe contener 8 números y una letra mayúscula: "+nif+".</strong></p>";
	}
	if(errores!=""){
		document.getElementById("dniOjeador").removeAttribute("style");
		if($('#val_nif').length){
			document.getElementById("val_nif").innerHTML=errores;
		}else{
			document.getElementById("div_errores").innerHTML=document.getElementById("div_errores").innerHTML+"<div id='val_nif'>"+errores+"</div>";
		}
	}else{
		document.getElementById("dniOjeador").setAttribute("style","background-color: #9CF0BF;");
		if($('#val_nif').length){
			document.getElementById("val_nif").innerHTML="";
		}
	}
	return errores;
}

function nameValidationO(){
	var errores="";
	var name=document.getElementById("nombreOjeador").value;
	if(name==""){
		errores+="<p><strong>El nombre no puede estar vacío.</strong></p>";
	}
	if(errores!=""){
		document.getElementById("nombreOjeador").removeAttribute("style");
		if($('#val_name').length){
			document.getElementById("val_name").innerHTML=errores;
		}else{
			document.getElementById("div_errores").innerHTML=document.getElementById("div_errores").innerHTML+"<div id='val_name'>"+errores+"</div>";
		}
	}else{
		document.getElementById("nombreOjeador").setAttribute("style","background-color: #9CF0BF;");
		if($('#val_name').length){
			document.getElementById("val_name").innerHTML="";	
		}
	}
	return errores;
}


function emailValidationO(){
	var errores="";
	var email=document.getElementById("correoElectronicoOj").value;
	var expreg=/^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?(?:\.[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?)*$/;
	if(email==""){
		errores+="<p><strong>El email no puede estar vacío.</strong></p>";
	}else if(!expreg.test(email)){
		errores+="<p><strong>El email es incorrecto: " +email+ ".</strong></p>";
	}
	if(errores!=""){
		document.getElementById("correoElectronicoOj").removeAttribute("style");
		if($('#val_email').length){
			document.getElementById("val_email").innerHTML=errores;
		}else{
			document.getElementById("div_errores").innerHTML=document.getElementById("div_errores").innerHTML+"<div id='val_email'>"+errores+"</div>";	
		}
	}else{
		document.getElementById("correoElectronicoOj").setAttribute("style","background-color: #9CF0BF;");
		if($('#val_email').length){
			document.getElementById("val_email").innerHTML="";
		}
	}
	return errores;
}



function phoneValidationO(){
	var errores="";
	var tel=document.getElementById("numTelefonoOj").value;
	var expreg=/^[0-9]{9}$/;
	if(tel==""){
		errores+="<p><strong>El número de teléfono no puede estar vacío.</strong></p>";
	}else if(!expreg.test(tel)){
		errores+="<p><strong>El número de teléfono es incorrecto: " +tel+ ".</strong></p>";
	}
	
	if(errores!=""){
		document.getElementById("numTelefonoOj").removeAttribute("style");
		if($('#val_tele').length){
			document.getElementById("val_tele").innerHTML=errores;
		}else{
			document.getElementById("div_errores").innerHTML=document.getElementById("div_errores").innerHTML+"<div id='val_tele'>"+errores+"</div>";
		}
	}else{
		document.getElementById("numTelefonoOj").setAttribute("style","background-color: #9CF0BF;");
		if($('#val_tele').length){
			document.getElementById("val_tele").innerHTML="";
		}
	}
	return errores;
}
function experValidationO(){
	var errores="";
	var ex=document.getElementById("numExperienciaOj").value;
	var expreg=/^[0-9]{0,38}$/;
	if(ex==""){
		errores+="<p><strong>Los años de experiencia no puede estar vacío.</strong></p>";
	}else if(!expreg.test(ex)){
		errores+="<p><strong>Los años de experiencia son incorrectos: " +ex+ ".</strong></p>";
	}
	
	if(errores!=""){
		document.getElementById("numExperienciaOj").removeAttribute("style");
		if($('#val_tele').length){
			document.getElementById("val_exper").innerHTML=errores;
		}else{
			document.getElementById("div_errores").innerHTML=document.getElementById("div_errores").innerHTML+"<div id='val_exper'>"+errores+"</div>";
		}
	}else{
		document.getElementById("numExperienciaOj").setAttribute("style","background-color: #9CF0BF;");
		if($('#val_exper').length){
			document.getElementById("val_exper").innerHTML="";
		}
	}
	return errores;
}
function salarioValidationO(){
	var errores="";
	var sal=document.getElementById("salarioOj").value;
	var expreg=/^[0-9]+.[0-9]{2}$/;
	if(sal==""){
		errores+="<p><strong>El salario no puede estar vacío.</strong></p>";
	}else if(!expreg.test(sal)){
		errores+="<p><strong>El salario es incorrecto: " +sal+ ".</strong></p>";
	}
	if(errores!=""){
		document.getElementById("salarioOj").removeAttribute("style");
		if($('#val_salario').length){
			document.getElementById("val_salario").innerHTML=errores;
		}else{
			document.getElementById("div_errores").innerHTML=document.getElementById("div_errores").innerHTML+"<div id='val_salario'>"+errores+"</div>";	
		}
	}else{
		document.getElementById("salarioOj").setAttribute("style","background-color: #9CF0BF;");
		if($('#val_salario').length){
			document.getElementById("val_salario").innerHTML="";
		}
	}
	return errores;
}
function nacionalidadValidationO(){
	var errores="";
	var nac=document.getElementById("nacionalidadOj").value;
	var list=['Afganistán','Albania','Alemania','Andorra','Angola','Antigua y Barbuda','Arabia Saudita','Argelia','Argentina',
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
        'Yemen','Yibuti','Zambia','Zimbabue'];
        
	if(nac==""){
		errores+="<p><strong>La nacionalidad no puede estar vacía.</strong></p>";
	}else if(!list.includes(nac)){
		errores+="<p><strong>La nacionalidad es incorrecta: " +nac+ ".</strong></p>";
	}
	if(errores!=""){
		document.getElementById("nacionalidadOj").removeAttribute("style");
		if($('#val_nacionalidad').length){
			document.getElementById("val_nacionalidad").innerHTML=errores;
		}else{
			document.getElementById("div_errores").innerHTML=document.getElementById("div_errores").innerHTML+"<div id='val_nacionalidad'>"+errores+"</div>";	
		}
	}else{
		document.getElementById("nacionalidadOj").setAttribute("style","background-color: #9CF0BF;");
		if($('#val_nacionalidad').length){
			document.getElementById("val_nacionalidad").innerHTML="";
		}
	}
	return errores;
}

