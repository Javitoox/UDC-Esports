--RF-001: Porcentaje de victorias
create or replace function porcentaje_victorias(wnombrecompeticion competiciones.nombrecompeticion%type,
wfechacompeticion competiciones.fechacompeticion%type)
return number is resultado number(5,2);
partidos_jugados number;
partidos_ganados number;
begin
    select count(*) into partidos_jugados from competiciones natural join partidos natural join estadisticas
    where nombrecompeticion=wnombrecompeticion and fechacompeticion=wfechacompeticion;
    select count(*) into partidos_ganados from competiciones natural join partidos natural join estadisticas
    where nombrecompeticion=wnombrecompeticion and fechacompeticion=wfechacompeticion and ganado='1';
    resultado:= (100*partidos_ganados)/partidos_jugados;
    return resultado;
end;
/
--RF-002: Informes sobre productos
create or replace procedure informe_producto(wnombreproducto productos.nombreproducto%type)
is
cursor c is select nombreproducto,cantidad,precio,stock,tipoproducto,descripcion from
(select nombreproducto,sum(cantidad) cantidad from productos natural join lineasdepedidos group by nombreproducto having 
nombreproducto like wnombreproducto) natural join productos;
registro c%rowtype;
begin
     open c;
     fetch c into registro;
     if c%notfound
     then
      DBMS_OUTPUT.PUT_LINE('Producto no encontrado');
     else
      DBMS_OUTPUT.PUT_LINE('Nombre del producto: ' || registro.nombreproducto || chr(10) ||
     'Cantidad demandada: ' || registro.cantidad || chr(10) ||
     'Precio: ' || registro.precio || chr(10) ||
     'Stock: ' || registro.stock || chr(10) ||
     'Tipo de producto: ' || registro.tipoproducto || chr(10) ||
     'Descripción: '|| registro.descripcion);
     end if;
end;
/
--RF-003: Listados sobre participantes en competiciones
create or replace procedure participantes_competiciones(fecha1 date, fecha2 date)
is
cursor c is select nombrejugador,dnijugador,participaciones
from (select dnijugador ,count(*) participaciones from 
(select distinct dnijugador,oid_com from jugadores natural join adscripciones where fecha between fecha1 and fecha2)
group by dnijugador) natural join jugadores;
begin
    DBMS_OUTPUT.PUT_LINE('--Participaciones:');
    for c1 in c
    loop
    DBMS_OUTPUT.PUT_LINE('-Nombre de jugador: ' || c1.nombrejugador || '; DNI: ' || c1.dnijugador || '; Participaciones: '
    || c1.participaciones);
    end loop;
end;
/
--RF-004: Informes sobre jugadores fichados
create or replace procedure jugadores_fichados(wfecha date)
is
cursor c is select dnijugador,nombrejugador,clausula,club,salariojugador,numtelefonojugador,numañosexperienciajugador,correoelectronicojugador,
fechaentrada,nombrevirtualjugador,numregalos,nacionalidadjugador from
(select nombrevirtual,oid_v videojuego,clausula,club from posiblesfichajes natural join ojeadores natural join videojuegos)
natural join jugadores where nombrevirtual=nombrevirtualjugador and videojuego=oid_v and (fechaentrada between wfecha and sysdate);
begin
    DBMS_OUTPUT.PUT_LINE('--Fichajes:');
    for c1 in c 
    loop
    DBMS_OUTPUT.PUT_LINE(
    'DNI: ' || c1.dnijugador || chr(10) ||
    'Nombre: ' || c1.nombrejugador || chr(10) ||
    'Precio de compra: ' || c1.clausula || chr(10) ||
    'Club proveniente: ' || c1.club || chr(10) ||
    'Salario: ' || c1.salariojugador || chr(10) ||
    'Teléfono: '|| c1.numtelefonojugador || chr(10) ||
    'Experiencia: '|| c1.numañosexperienciajugador || chr(10)||
    'Correo: '|| c1.correoelectronicojugador || chr(10) ||
    'Fecha entrada: '|| c1.fechaentrada || chr(10) ||
    'Nombre virtual: '|| c1.nombrevirtualjugador || chr(10) ||
    'Número de regalos: '|| c1.numregalos || chr(10) ||
    'Nacionalidad: '|| c1.nacionalidadjugador);
    DBMS_OUTPUT.PUT_LINE('------------------------------------------------');
    end loop;
end;
/
--RF-005: Control de las encuestas
create or replace procedure control_encuestas(wfecha date)
is
cursor jugadores_c is 
select nombreJugador from jugadores minus 
(select nombreJugador from encuestas natural join redessociales natural join jugadores 
where fechainicio between wfecha and sysdate);
cursor entrenadores_c is 
select nombreEntrenador from entrenadores minus 
(select nombreEntrenador from encuestas natural join redessociales natural join entrenadores
where fechainicio between wfecha and sysdate);
j jugadores_c%rowtype;
e entrenadores_c%rowtype;
begin
    DBMS_OUTPUT.PUT_LINE('--Miembros no participantes en encuestas:');
    DBMS_OUTPUT.PUT_LINE('-Jugadores:');
    open jugadores_c;
    fetch jugadores_c into j;
    if jugadores_c%notfound
    then
    DBMS_OUTPUT.PUT_LINE('0');
    else
    loop 
     exit when jugadores_c%notfound;
     DBMS_OUTPUT.PUT_LINE(j.nombrejugador);
     fetch jugadores_c into j;
    end loop;
    close jugadores_c;
    end if;
    DBMS_OUTPUT.PUT_LINE('-Entrenadores:');
    open entrenadores_c;
    fetch entrenadores_c into e;
    if entrenadores_c%notfound
    then
     DBMS_OUTPUT.PUT_LINE('0');
     else
    loop 
     exit when entrenadores_c%notfound;
     DBMS_OUTPUT.PUT_LINE(e.nombreentrenador);
     fetch entrenadores_c into e;
    end loop;
    close entrenadores_c;
    end if;
end;
/
--RF-006: Estadísticas de partidos
create or replace procedure estadisticas_partidos(wnombreVideojuego videojuegos.nombrevideojuego%type
,wnombreCompeticion competiciones.nombrecompeticion%type)
is
cursor c is select lugar,fechahora,medio,ganado,tiempodejuego,valoracion,racha 
from competiciones natural join partidos natural join videojuegos natural join 
estadisticas where nombreVideojuego=wnombreVideojuego and nombreCompeticion=wnombreCompeticion;
begin
    DBMS_OUTPUT.PUT_LINE('--Partidos de la línea de videojuego ' || wnombreVideojuego || ' en la competición ' 
    || wnombreCompeticion || ':');
    for c1 in c
    loop
    DBMS_OUTPUT.PUT_LINE('-Estadísticas del partido disputado en ' || c1.lugar || ' a través de ' || c1.medio || 
    ' en fecha ' || c1.fechahora || ':');
    DBMS_OUTPUT.PUT_LINE('Perdido/Ganado: ' || c1.ganado || chr(10) ||
    'Tiempo de juego: ' || c1.tiempodejuego || chr(10) ||
    'Valoración de 0 a 5: ' || c1.valoracion || chr(10) ||
    'Racha: ' || c1.racha );
    end loop;
end;
/
--RF-007: Mejores jugadores
create or replace procedure mejores_jugadores
is 
cursor c is 
select t2.nombrevideojuego,dnijugador,nombrejugador,salariojugador,numtelefonojugador,numañosexperienciajugador,
correoelectronicojugador,fechaentrada,nombrevirtualjugador,numregalos,nacionalidadjugador
from
(select nombrevideojuego,max(ganados) maximo
from
(select count(*) ganados,dnijugador from jugadores natural join adscripciones natural join competiciones natural join 
partidos natural join estadisticas where(fechabaja>fechahora or fechabaja is null) and ganado like '1' group by dnijugador)
natural join jugadores natural join videojuegos group by nombrevideojuego) t1 ,
(select nombrevideojuego,ganados,dnijugador,nombrejugador,salariojugador,numtelefonojugador,numañosexperienciajugador,
correoelectronicojugador,fechaentrada,nombrevirtualjugador,numregalos,nacionalidadjugador
from 
(select count(*) ganados,dnijugador from jugadores natural join adscripciones natural join competiciones natural join 
partidos natural join estadisticas where(fechabaja>fechahora or fechabaja is null) and ganado like '1' group by dnijugador)
natural join jugadores natural join videojuegos) t2 where t2.nombrevideojuego=t1.nombrevideojuego and t2.ganados=t1.maximo;
begin
    DBMS_OUTPUT.PUT_LINE('--Mejores jugadores:');
    for c1 in c 
    loop
    DBMS_OUTPUT.PUT_LINE('Videojuego: ' || c1.nombrevideojuego || chr(10) ||
    'DNI: ' || c1.dnijugador || chr(10) ||
    'Nombre: ' || c1.nombrejugador || chr(10) ||
    'Salario: ' || c1.salariojugador || chr(10) ||
    'Teléfono: '|| c1.numtelefonojugador || chr(10) ||
    'Experiencia: '|| c1.numañosexperienciajugador || chr(10)||
    'Correo: '|| c1.correoelectronicojugador || chr(10) ||
    'Fecha entrada: '|| c1.fechaentrada || chr(10) ||
    'Nombre virtual: '|| c1.nombrevirtualjugador || chr(10) ||
    'Número de regalos: '|| c1.numregalos || chr(10) ||
    'Nacionalidad: '|| c1.nacionalidadjugador);
    DBMS_OUTPUT.PUT_LINE('------------------------------------------------');
    end loop;
end;
/
--RF-008: Posibles fichajes
create or replace procedure observacion_ojeador(wdni ojeadores.dniojeador%type)
is 
videojuego videojuegos.oid_v%type;
cursor c is select nombreVirtual,nombreVideojuego,clausula,correo,club,nacionalidad from posiblesfichajes  
natural join ojeadores natural join videojuegos where dniOjeador=wdni and nombreVirtual not in 
(select nombreVirtualJugador from jugadores natural join videojuegos where oid_v=videojuego);
begin
    select oid_v into videojuego from ojeadores natural join videojuegos where wdni=dniOjeador;
    DBMS_OUTPUT.PUT_LINE('--El ojeador con DNI ' || wdni || ' ojea en este momento a los posibles fichajes con los siguientes informes:');
    for c1 in c
    loop
    DBMS_OUTPUT.PUT_LINE('Nombre virtual: '|| c1.nombreVirtual || chr(10)||
    'Videojuego: ' || c1.nombreVideojuego || chr(10) ||
    'Cláusula: ' || c1.clausula || chr(10) ||
    'Correo: ' || c1.correo || chr(10) ||
    'Club: ' || c1.club || chr(10) ||
    'Nacionalidad: '|| c1.nacionalidad);
    DBMS_OUTPUT.PUT_LINE('------------------------------------------------');
    end loop;
end;
/
--RF-009: Jugadores más influyentes
create or replace procedure jugadores_influyentes
is
cursor c is select nombreJugador,nombreVideojuego from
(select * from (select dniJugador,sum(numSeguidores) seguidores from jugadores natural join redessociales group by dniJugador),
(select max(seguidores) followers ,oid_v
from (select dniJugador,sum(numSeguidores) seguidores from jugadores natural join redessociales group by dniJugador) 
natural join jugadores group by oid_v) 
where seguidores=followers) natural join jugadores natural join videojuegos;
begin
     DBMS_OUTPUT.PUT_LINE('--Jugadores más influyentes:');
     for c1 in c
     loop
     DBMS_OUTPUT.PUT_LINE(c1.nombreVideojuego || ': '|| c1.nombreJugador);
     end loop;
end;
/
--RF-010: Premios totales
create or replace function premio_videojuego(wnombreVideojuego videojuegos.nombreVideojuego%type,fecha1 date,
fecha2 date) return number is resultado number;
begin
select sum(premio) into resultado 
from (select distinct oid_com,premio from competiciones natural join partidos natural join videojuegos where 
nombreVideojuego=wnombreVideojuego and (fechaCompeticion between fecha1 and fecha2) and ganada='1'); 
return resultado;
end;
/
--RF-011: Racha de líneas de videojuegos
create or replace procedure racha_videojuegos
is 
cursor c is select nombreVideojuego,fechaCreacion,introduccion
 from (select oid_v,max(oid_e) oid_E from estadisticas natural join partidos group by oid_v)
 natural join estadisticas natural join videojuegos where racha > 5;
begin
   DBMS_OUTPUT.PUT_LINE('--Videojuegos con buen rendimiento:');
   for c1 in c
     loop
     DBMS_OUTPUT.PUT_LINE('-' || c1.nombreVideojuego || ' fundado el ' || c1.fechaCreacion || ' por ' ||  c1.introduccion);
     end loop;
end;
/
--RF-012: Gastos de clientes
create or replace procedure gasto_clientes
is 
cursor c is select nombreCompleto,correoCliente,total from
(select sum(subtotal) total,dnicliente from clientes natural join pedidos natural join lineasdepedidos group by dnicliente)
natural join clientes order by total desc;
begin
  DBMS_OUTPUT.PUT_LINE('--Gastos de clientes:');
  for c1 in c
     loop
     DBMS_OUTPUT.PUT_LINE('Gasto total de ' || c1.nombreCompleto || ' con correo ' || c1.correoCliente || ': ' || c1.total
     || ' euros');
     end loop;
end;
/
--RF-013: Productos populares
create or replace procedure productos_populares
is
numClientes integer;
cursor c is select nombreProducto,descripcion,nombreVideojuego from
(select nombreProducto,descripcion,oid_v from
(select nombreProducto p from
(select distinct dniCliente,nombreProducto from lineasdepedidos natural join pedidos) 
group by nombreProducto having count(*)=2),productos where p=productos.nombreproducto) p left join videojuegos on
p.oid_v=videojuegos.oid_v;
registro c%rowtype;
begin
    select count(*) into numClientes from clientes;
    DBMS_OUTPUT.PUT_LINE('--Productos comprados por todos los clientes:');
    open c;
    fetch c into registro;
    if c%notfound
    then
    DBMS_OUTPUT.PUT_LINE('0');
    else
     loop
     exit when c%notfound;
     if(registro.nombreVideojuego is null)
     then
     DBMS_OUTPUT.PUT_LINE('-' || registro.nombreProducto || ' con descripción:' );
     else
     DBMS_OUTPUT.PUT_LINE('-' || registro.nombreProducto || ' de ' || registro.nombreVideojuego || ' con descripción:' );
     end if;
     DBMS_OUTPUT.PUT_LINE(registro.descripcion);
     fetch c into registro;
     end loop;
    end if;
    close c;
end;
/
-- FUNCIÓN ASOCIADA A LA RN-003
create or replace function cuentanumeropartidos(dni jugadores.dnijugador%type)
return integer is resultado integer;
begin
    select count(*) numpartidos into resultado from jugadores natural join adscripciones natural join competiciones natural join 
    partidos where (fechabaja>fechahora or fechabaja is null) and dnijugador=dni;
    resultado := resultado +1;
    return resultado;
end;