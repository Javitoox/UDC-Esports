function validateForm() {
		var noValidation = document.getElementById("altaUsuario").novalidate;
		if (!noValidation){
			var valid1=nifValidation();
		    var valid2=nameValidation();
		    var valid3=nickValidation();
		    var valid4=emailValidation();
		    var valid5=dateValidation();
		    var valid6=phoneValidation();
		    var valid7=passwordValidation();
		    var valid8=retypeValidation();
			return ((valid1.length==0) && (valid2.length==0) && (valid3.length==0) && (valid4.length==0)
			&& (valid5.length==0) && (valid6.length==0) && (valid7.length==0) && (valid8.length==0));
		}
		else 
			return true;		
}
	
function nifValidation(){
	var errores="";
	var nif=document.getElementById("dniUsuario").value;
	var expreg=/^[0-9]{8}[A-Z]$/;
	if(nif==""){
		errores+="El NIF no puede estar vacío.";
	}else if(!expreg.test(nif)){
		errores+="<El NIF debe contener 8 números y una letra mayúscula: "+nif;
	}
	if(errores!=""){
		document.getElementById("dniUsuario").setCustomValidity("errores");
	}else{
		
	}
	return errores;
}

function nameValidation(){
	
}

function nickValidation(){
	
}

function emailValidation(){
	
}

function dateValidation(){
	
}

function phoneValidation(){
	
}

function passwordValidation(){
	
}

function retypeValidation(){
	
}
