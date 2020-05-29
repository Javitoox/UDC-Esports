// Control con jquery
$(document).ready(function(){
	
	$("#registro_formulario").on("submit", function() {
				return validateForm1();
			});
	
	$("#login_formulario").on("submit", function() {
				return validateForm2();
			});
	$("#formularioPerfil").on("submitPerfil", function() {
				return validateForm3();
			});
	$("#cambiarPassPerfil").on("submitPass", function() {
				return validateForm4();
			});
	
});
function validateForm1() {
		var noValidation = document.getElementById("registro_formulario").novalidate;
		if (!noValidation){
			var valid1=nifValidation();
			var valid2=nameValidation();
			var valid3=nickValidation();
			var valid4=emailValidation();
			var valid5=dateValidation();
			var valid6=phoneValidation();
			var valid7=passwordValidation();
			var valid8=retypeValidation();
			return (valid1.length==0) && (valid2.length==0) && (valid3.length==0) && (valid4.length==0) && 
			(valid5.length==0) && (valid6.length==0) && (valid7.length==0) && (valid8.length==0);
		}
		else 
			return true;		
}

function validateForm2() {
		var noValidation = document.getElementById("login_formulario").novalidate;
		if (!noValidation){
			var valid1=nickValidation();
			var valid2=passwordValidation();
			return (valid1.length==0) && (valid2.length==0);
		}
		else 
			return true;		
}
function validateForm3() {
		var noValidation = document.getElementById("formularioPerfil").novalidate;
		if (!noValidation){
			var valid1=nameValidation();
			var valid2=nickValidation();
			var valid3=emailValidation();
			var valid4=phoneValidation();

			return (valid1.length==0) && (valid2.length==0) && (valid3.length==0) && (valid4.length==0);
		}
		else 
			return true;		
}
function validateForm4() {
		var noValidation = document.getElementById("cambiarPassPerfil").novalidate;
		if (!noValidation){
			var valid1=passwordValidation();
			var valid2=retypeValidation();
			return (valid1.length==0) && (valid2.length==0);
		}
		else 
			return true;		
}
	
function nifValidation(){
	var errores="";
	var nif=document.getElementById("dniUsuario").value;
	var expreg=/^[0-9]{8}[A-Z]$/;
	if(nif==""){
		errores+="<p><strong>El NIF no puede estar vacío.</strong></p>";
	}else if(!expreg.test(nif)){
		errores+="<p><strong>El NIF debe contener 8 números y una letra mayúscula: "+nif+".</strong></p>";
	}
	if(errores!=""){
		document.getElementById("dniUsuario").removeAttribute("style");
		if($('#val_nif').length){
			document.getElementById("val_nif").innerHTML=errores;
		}else{
			document.getElementById("div_errores").innerHTML=document.getElementById("div_errores").innerHTML+"<div id='val_nif'>"+errores+"</div>";
		}
	}else{
		document.getElementById("dniUsuario").setAttribute("style","background-color: #9CF0BF;");
		if($('#val_nif').length){
			document.getElementById("val_nif").innerHTML="";
		}
	}
	return errores;
}

function nameValidation(){
	var errores="";
	var name=document.getElementById("nombreCompletoUsuario").value;
	if(name==""){
		errores+="<p><strong>El nombre no puede estar vacío.</strong></p>";
	}
	if(errores!=""){
		document.getElementById("nombreCompletoUsuario").removeAttribute("style");
		if($('#val_name').length){
			document.getElementById("val_name").innerHTML=errores;
		}else{
			document.getElementById("div_errores").innerHTML=document.getElementById("div_errores").innerHTML+"<div id='val_name'>"+errores+"</div>";
		}
	}else{
		document.getElementById("nombreCompletoUsuario").setAttribute("style","background-color: #9CF0BF;");
		if($('#val_name').length){
			document.getElementById("val_name").innerHTML="";	
		}
	}
	return errores;
}

function nickValidation(){
	var errores="";
	var nick=document.getElementById("nickUsuario").value;
	if(nick==""){
		errores+="<p><strong>El nick no puede estar vacío.</strong></p>";
	}
	if(errores!=""){
		document.getElementById("nickUsuario").removeAttribute("style");
		if($('#val_nick').length){
			document.getElementById("val_nick").innerHTML=errores;
		}else{
			document.getElementById("div_errores").innerHTML=document.getElementById("div_errores").innerHTML+"<div id='val_nick'>"+errores+"</div>";
		}
	}else{
		document.getElementById("nickUsuario").setAttribute("style","background-color: #9CF0BF;");
		if($('#val_nick').length){
			document.getElementById("val_nick").innerHTML="";
		}
	}
	return errores;
}

function emailValidation(){
	var errores="";
	var email=document.getElementById("emailUsuario").value;
	var expreg=/^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?(?:\.[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?)*$/;
	if(email==""){
		errores+="<p><strong>El email no puede estar vacío.</strong></p>";
	}else if(!expreg.test(email)){
		errores+="<p><strong>El email es incorrecto: " +email+ ".</strong></p>";
	}
	if(errores!=""){
		document.getElementById("emailUsuario").removeAttribute("style");
		if($('#val_email').length){
			document.getElementById("val_email").innerHTML=errores;
		}else{
			document.getElementById("div_errores").innerHTML=document.getElementById("div_errores").innerHTML+"<div id='val_email'>"+errores+"</div>";	
		}
	}else{
		document.getElementById("emailUsuario").setAttribute("style","background-color: #9CF0BF;");
		if($('#val_email').length){
			document.getElementById("val_email").innerHTML="";
		}
	}
	return errores;
}

function dateValidation(){
	var errores="";
	var fecha=document.getElementById("fechaNacimientoUsuario").value;
	var fecha_aux=fecha.split("-");
	var fecha1 =new Date(parseInt(fecha_aux[0]),parseInt(fecha_aux[1]-1),parseInt(fecha_aux[2]));
	var fecha2=new Date();
	if(fecha==""){
		errores+="<p><strong>La fecha de nacimiento no puede estar vacía.</strong></p>";
	}else if(fecha1 > fecha2){
		errores+="<p><strong>La fecha de nacimiento "+fecha1.getFullYear() + "/" + (fecha1.getMonth() +1) + "/" + fecha1.getDate()+" no puede ser posterior a la fecha actual "+fecha2.getFullYear() + "/" + (fecha2.getMonth() +1) + "/" + fecha2.getDate()+"</strong></p>";
	}
	if(errores!=""){
		document.getElementById("fechaNacimientoUsuario").removeAttribute("style");
		if($('#val_fecha').length){
			document.getElementById("val_fecha").innerHTML=errores;
		}else{
			document.getElementById("div_errores").innerHTML=document.getElementById("div_errores").innerHTML+"<div id='val_fecha'>"+errores+"</div>";
		}
	}else{
		document.getElementById("fechaNacimientoUsuario").setAttribute("style","background-color: #9CF0BF;");
		if($('#val_fecha').length){
			document.getElementById("val_fecha").innerHTML="";
		}
	}
	return errores;
}

function phoneValidation(){
	var errores="";
	var tel=document.getElementById("numTelefonoUsuario").value;
	var expreg=/^[0-9]{9}$/;
	if(tel==""){
		errores+="<p><strong>El número de teléfono no puede estar vacío.</strong></p>";
	}else if(!expreg.test(tel)){
		errores+="<p><strong>El número de teléfono es incorrecto: " +tel+ ".</strong></p>";
	}
	
	if(errores!=""){
		document.getElementById("numTelefonoUsuario").removeAttribute("style");
		if($('#val_tele').length){
			document.getElementById("val_tele").innerHTML=errores;
		}else{
			document.getElementById("div_errores").innerHTML=document.getElementById("div_errores").innerHTML+"<div id='val_tele'>"+errores+"</div>";
		}
	}else{
		document.getElementById("numTelefonoUsuario").setAttribute("style","background-color: #9CF0BF;");
		if($('#val_tele').length){
			document.getElementById("val_tele").innerHTML="";
		}
	}
	return errores;
}

function passwordValidation(){
	var errores="";
	var pass=document.getElementById("passUsuario").value;
	var expreg1=/[a-z]+/;
	var expreg2=/[A-Z]+/;
	var expreg3=/[0-9]+/;
	if(pass.length<8){
		errores+="<p><strong>Contraseña no válida: debe tener al menos 8 caracteres.</strong></p>";
	}else if(!expreg1.test(pass) || !expreg2.test(pass) || !expreg3.test(pass)){
		errores+="<p><strong>Contraseña no válida: debe contener letras mayúsculas y minúsculas y dígitos.</strong></p>";
	}
	
	if(errores!=""){
		document.getElementById("passUsuario").removeAttribute("style");
		if($('#val_pass').length){
			document.getElementById("val_pass").innerHTML=errores;
		}else{
			document.getElementById("div_errores").innerHTML=document.getElementById("div_errores").innerHTML+"<div id='val_pass'>"+errores+"</div>";	
		}
	}else{
		document.getElementById("passUsuario").setAttribute("style","background-color: #9CF0BF;");
		if($('#val_pass').length){
			document.getElementById("val_pass").innerHTML="";
		}
	}
	return errores;
}

function retypeValidation(){
	var errores="";
	var confirmpass=document.getElementById("confirmPassUsuario").value;
	var pass=document.getElementById("passUsuario").value;
	if(confirmpass!=pass){
		errores+="<p><strong>La confirmación de contraseña no coincide con la contraseña.</strong></p>";
	}
	
	if(errores!=""){
		document.getElementById("confirmPassUsuario").removeAttribute("style");
		if($('#val_confirmpass').length){
			document.getElementById("val_confirmpass").innerHTML=errores;
		}else{
			document.getElementById("div_errores").innerHTML=document.getElementById("div_errores").innerHTML+"<div id='val_confirmpass'>"+errores+"</div>";	
		}
	}else{
		document.getElementById("confirmPassUsuario").setAttribute("style","background-color: #9CF0BF;");
		if($('#val_confirmpass').length){
			document.getElementById("val_confirmpass").innerHTML="";
		}
	}
	return errores;
}

function passwordStrength(password){
	var letters = {};
	var length = password.length;
	for(x = 0, length; x < length; x++) {
		var l = password.charAt(x);
		letters[l] = (isNaN(letters[l])? 1 : letters[l] + 1);
	}
	return Object.keys(letters).length / length;
}

function passwordColor(){
	var passField = document.getElementById("passUsuario");
	var strength = passwordStrength(passField.value);
	
	if(!isNaN(strength)){
		$("#passUsuario").css("background-color","red");
		if(passwordValidation()!=""){
			$("#passUsuario").css("background-color","red");
		}else if(strength > 0.7){
			$("#passUsuario").css("background-color","green");
		}else if(strength > 0.4){
			$("#passUsuario").css("background-color","yellow");
		}
	}else{
		$("#passUsuario").css("background-color","lightyellow");
	}
	
}

