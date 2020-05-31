/*Lo que hace es agregar o no la clase "responsive". Se activará si se hace clic en 
el icono del menú (topnav) que, estará disponible para móviles.*/ 

function myFunction() {
    var x = document.getElementById("myTopnav");
    if (x.className === "topnav") {
        x.className += " responsive";
    } else {
        x.className = "topnav";
    }
}

function buscaJugador() {
    var input, filter, table, tr, td, i, txtValue;
    input = document.getElementById("myInputJug");     
    filter = input.value.toUpperCase();     
    table = document.getElementById("myTable"); 
    tr = table.getElementsByTagName("tr");      
    for (i = 0; i < tr.length; i++) {           
        td = tr[i].getElementsByTagName("td")[0];  
        if (td) {
        txtValue =  td.innerText;      
            if (txtValue.toUpperCase().indexOf(filter) > -1) {
                tr[i].style.display = "";
            } else {
                tr[i].style.display = "none";
            }
        }       
    }
}

function buscaEntrenador() {
    var input, filter, table, tr, td, i, txtValue;
    input = document.getElementById("myInputEnt");     
    filter = input.value.toUpperCase();     
    table = document.getElementById("myTable2"); 
    tr = table.getElementsByTagName("tr");      
    for (i = 0; i < tr.length; i++) {           
        td = tr[i].getElementsByTagName("td")[0];  
        if (td) {
        txtValue =  td.innerText;      
            if (txtValue.toUpperCase().indexOf(filter) > -1) {
                tr[i].style.display = "";
            } else {
                tr[i].style.display = "none";
            }
        }       
    }
}

function buscaOjeador() {
    var input, filter, table, tr, td, i, txtValue;
    input = document.getElementById("myInputOj");     
    filter = input.value.toUpperCase();     
    table = document.getElementById("myTable3"); 
    tr = table.getElementsByTagName("tr");      
    for (i = 0; i < tr.length; i++) {           
        td = tr[i].getElementsByTagName("td")[0];  
        if (td) {
        txtValue =  td.innerText;      
            if (txtValue.toUpperCase().indexOf(filter) > -1) {
                tr[i].style.display = "";
            } else {
                tr[i].style.display = "none";
            }
        }       
    }
}

function abreFormularioYCierraTabla(){
    document.getElementById("tablaAparece").style.display="block";
    document.getElementById("creaJugador").style.display="block";
    document.getElementById("myTable").style.display="none";
    document.getElementById("creaEnt").style.display="none";
    document.getElementById("creaOj").style.display="none";
   
}

function cierraFormularioYAbreTabla(){
    document.getElementById("creaJugador").style.display="none";
    document.getElementById("myTable").style.display="block";
    document.getElementById("tablaAparece").style.display="none";
    document.getElementById("creaEnt").style.display="block";
    document.getElementById("creaOj").style.display="block";
   
}
function abreFormularioEntrenadorYCierraTabla(){
    document.getElementById("creaEntrenador").style.display="block";
    document.getElementById("myTable2").style.display="none";
    document.getElementById("tablaAparece2").style.display="block";
    document.getElementById("creaJ").style.display="none";
    document.getElementById("creaOj").style.display="none";
    

}
function cierraFormularioEntrenadorYAbreTabla(){
    document.getElementById("creaEntrenador").style.display="none";
    document.getElementById("myTable2").style.display="block";
    document.getElementById("tablaAparece2").style.display="none";
    document.getElementById("creaJ").style.display="block";
    document.getElementById("creaOj").style.display="block";
   

}
function abreFormularioOjeadorYCierraTabla(){
    document.getElementById("creaOjeador").style.display="block";
    document.getElementById("myTable3").style.display="none";
    document.getElementById("tablaAparece3").style.display="block";
    document.getElementById("creaJ").style.display="none";
    document.getElementById("creaEnt").style.display="none";
   

}
function cierraFormularioOjeadorYAbreTabla(){
    document.getElementById("creaOjeador").style.display="none";
    document.getElementById("myTable3").style.display="block";
    document.getElementById("tablaAparece3").style.display="none";
    document.getElementById("creaJ").style.display="block";
    document.getElementById("creaEnt").style.display="block";
    

}