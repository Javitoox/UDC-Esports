function updateCount(dniJugador) {
    var cs = $("#comenta-"+dniJugador).val().length;
    $('#contador_palabras-'+dniJugador).text(cs);
} 