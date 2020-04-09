set serveroutput on;

execute observacion_ojeador('62129212H');
/
execute jugadores_influyentes;
/
declare
videojuego videojuegos.nombreVideojuego%type;
fecha1 competiciones.fechaCompeticion%type;
fecha2 competiciones.fechaCompeticion%type;
begin
videojuego:='Fortnite';
fecha1:= '12-8-2000';
fecha2:=sysdate;
DBMS_OUTPUT.PUT_LINE('El premio por ganar la competición es de: '||premio_videojuego(videojuego,fecha1,fecha2)||'€');
end;
/
execute racha_videojuegos;
/
execute gasto_clientes;
/
execute productos_populares;
/
execute mejores_jugadores;
/
execute estadisticas_partidos('Fortnite','Fortnite World Cup');
/
execute control_encuestas('12-1-2000');
/
execute jugadores_fichados('1-1-2000');
/
execute participantes_competiciones('1-1-2000',sysdate);
/
execute informe_producto('Camiseta Fortnite');
/
declare
nombre competiciones.nombrecompeticion%type;
fecha competiciones.fechaCompeticion%type;
begin
nombre:='Grefg Fortnite Cup';
fecha:= '02/05/17';
DBMS_OUTPUT.PUT_LINE('El porcentaje de victorias es del: '||porcentaje_victorias(nombre,fecha)||'%');
end;   
    






