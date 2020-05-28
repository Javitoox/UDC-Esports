$(document).ready(function(){	
	
        $(".videojuego").on("click",function(){
        	var oid_oculto=document.getElementById("oid_oculto").value;
        	if(document.getElementById("comprueba-"+oid_oculto).value=="1"){
        		$("#id-"+oid_oculto).hide(300);
        	    $("#id-"+oid_oculto).empty();
        	    document.getElementById("comprueba-"+oid_oculto).removeAttribute("value");
        	}else{
        		$("#id-"+oid_oculto).load("carga_de_jugadores.php",{oid_oculto: oid_oculto, 
				nombre_oculto: document.getElementById("nombre_oculto").value,
				dni_oculto: document.getElementById("dni_oculto").value},function(responseTxt,status,xhr){
					if(status=="success"){
					   $("#id-"+oid_oculto).hide().show(300);
					}else if(status=="error")
					   alert("Error en carga de datos: "+xhr.status+"/"+xhr.statusText);
				});
			    document.getElementById("comprueba-"+oid_oculto).setAttribute("value","1");	
        	}
    	});
    	    	
});

function cargarDatos(oid,nombre,dni){
	document.getElementById("oid_oculto").value=oid;
	document.getElementById("nombre_oculto").value=nombre;
	document.getElementById("dni_oculto").value=dni;
}
