--------------------------------------------REGLAS DE NEGOCIO----------------------------------------------------------
--RN-001: Almacenamiento de redes sociales necesarias
create or replace trigger limiteredesscocialesjugador
before insert on redessociales
for each row 
declare 
suma integer;
tot integer;
begin 
select min(numseguidores) into suma from redessociales where :new.dniJugador = dniJugador;
select count(*) into tot from redessociales where  :new.dniJugador = dniJugador;
if(tot=3)then
if(suma >:new.numseguidores) then
RAISE_APPLICATION_ERROR(-20001, 'Demasiadas redes sociales.');
if(suma = :new.numseguidores) then
RAISE_APPLICATION_ERROR(0, 'Permanecen las mismas redes sociales.');

else
DBMS_OUTPUT.PUT_LINE('Cambiando redes sociales...'); 
delete redessociales where numseguidores=suma;
end if;
end if;
end if;
end;
/
create or replace trigger limiteredesscocialesentrenador
before insert on redessociales
for each row 
declare
suma integer;
tot integer;
begin 
select min(numseguidores) into suma from redessociales where :new.dniEntrenador = dniEntrenador;
select count(*) into tot from redessociales where  :new.dniEntrenador = dniEntrenador;
if(tot=3)then
if(suma >:new.numseguidores) then
RAISE_APPLICATION_ERROR(-20002, 'Demasiadas redes sociales.');
else
DBMS_OUTPUT.PUT_LINE('Cambiando redes sociales...'); 
delete redessociales where numseguidores=suma;
end if;
end if;
end;
/
--RN-002: Prohibición de eliminación de posibles fichajes
create or replace trigger borradodeposiblesfichajes
before delete on posiblesfichajes
FOR EACH ROW
DECLARE
PRAGMA AUTONOMOUS_TRANSACTION;
nume integer;
nump integer;
BEGIN
select distinct videojuegos.oid_v into nump from videojuegos,ojeadores,posiblesfichajes 
where videojuegos.oid_v=ojeadores.oid_v and ojeadores.dniojeador=:old.dniojeador;
select count(*) into nume from jugadores where nombrevirtualjugador=:old.nombrevirtual and oid_v=nump;
IF (nume=1) 
THEN
RAISE_APPLICATION_ERROR(-20607,'No se puede borrar los datos de '||:old.nombrevirtual);
else
DBMS_OUTPUT.PUT_LINE('Borrando posible fichaje...'); 
commit work;
END If;
END;
/
--RN-003: Conmemoración por superar los 40 partidos con el club
create or replace trigger numeroregalos
before insert on partidos
FOR EACH ROW
DECLARE
cursor c is select dnijugador from jugadores where oid_v=:new.oid_v;
numeropartidos integer;
BEGIN
  FOR c1 IN c
  LOOP 
  numeropartidos:=cuentanumeropartidos(c1.dnijugador); 
  IF MOD(numeropartidos,40) = 0 
  THEN
  UPDATE jugadores SET numregalos=numregalos+1 WHERE dnijugador=c1.dnijugador;
  END IF;
  END LOOP;
END;
/
--RN-004: Prohibición de inscripción de una línea de videojuegos
create or replace trigger numlimiteadscripciones
before insert on adscripciones
FOR EACH ROW
DECLARE
ads INTEGER;
oide integer;
BEGIN
select count(*) into ads from adscripciones,jugadores,competiciones where adscripciones.dnijugador=jugadores.dnijugador and competiciones.oid_com=adscripciones.oid_com and competiciones.ganada is null and jugadores.dnijugador=:new.dnijugador;
select oid_v into oide from jugadores where dnijugador=:new.dnijugador;
ads := ads + 1;
IF (ads >= 5) THEN
raise_application_error
(-20605,'Superado el limite de lineas de videojuegos ' || oide || ' por competición');
END IF;
END;
/
--RN-005: Extensión del contrato del entrenador
create or replace trigger renovacionentrenador
after update of ganada on competiciones
for each row 
declare 
PRAGMA AUTONOMOUS_TRANSACTION;
dni integer;
gan integer;
tot integer;
begin 
select distinct entrenadores.oid_v into dni from entrenadores,videojuegos,partidos,competiciones
where entrenadores.oid_v=videojuegos.oid_v and videojuegos.oid_v=partidos.oid_v and partidos.oid_com=competiciones.oid_com 
and competiciones.oid_com=:new.oid_com;
select count(*)  into tot from partidos,entrenadores, videojuegos, competiciones where 
partidos.oid_v=videojuegos.oid_v and entrenadores.oid_v=videojuegos.oid_v and 
competiciones.oid_com=partidos.oid_com and competiciones.oid_com=:new.oid_com;
select count(*)  into gan from partidos,entrenadores, videojuegos, competiciones, estadisticas 
where partidos.oid_e=estadisticas.oid_e and estadisticas.ganado ='1' and partidos.oid_v=videojuegos.oid_v 
and entrenadores.oid_v=videojuegos.oid_v and competiciones.oid_com=partidos.oid_com and competiciones.oid_com=:new.oid_com;
if(gan/tot >=0.7)then 
update entrenadores set salarioentrenador=salarioentrenador*1.2 where oid_v=dni;
DBMS_OUTPUT.PUT_LINE('El porcentaje ganado es: ' || (gan/(tot))*100||'%');
DBMS_OUTPUT.PUT_LINE('Renovación automática...');
end if;
if(gan/tot <0.7) then
DBMS_OUTPUT.PUT_LINE('El porcentaje ganado es: ' || (gan/(tot))*100||'%');
DBMS_OUTPUT.PUT_LINE('No se ha conseguido la renovación de contrato');
end if;
commit work;
end;
/
--RN-006: Límite de aumento de salario
create or replace TRIGGER aumentosalarialjugador
BEFORE UPDATE OF Salariojugador ON jugadores
FOR EACH ROW
DECLARE
BEGIN
IF :NEW.Salariojugador > :OLD.Salariojugador*1.30
THEN raise_application_error
(-20641,'No se puede aumentar el salario más de un 30%');
END IF;
END;
/
create or replace TRIGGER aumentosalarialentrenador
BEFORE UPDATE OF salarioentrenador ON entrenadores
FOR EACH ROW
DECLARE
BEGIN
IF :NEW.salarioentrenador > :OLD.salarioentrenador*1.30
THEN raise_application_error
(-20640,'No se puede aumentar el salario más de un 30%');
END IF;
END;
/
create or replace TRIGGER aumentosalarialojeador
BEFORE UPDATE OF Salarioojeador ON ojeadores
FOR EACH ROW
DECLARE
BEGIN
IF :NEW.Salarioojeador > :OLD.Salarioojeador*1.30
THEN raise_application_error
(-20642,'No se puede aumentar el salario más de un 30%');
END IF;
END;
/
--RN-007: Rebajas de productos
create or replace trigger descuento
before insert on LineasDePedidos
for each row 
declare 
begin 
if(:new.cantidad >= 20) then
DBMS_OUTPUT.PUT_LINE('Aplicando descuento...'); 
:new.subtotal :=:new.subtotal*0.2;
end if;
end;
/
--RN-008: Límite de costes de competición
create or replace trigger limitedecostescompeticiones
before insert on competiciones
FOR EACH ROW
DECLARE
suma INTEGER;
BEGIN
SELECT SUM(costeInscripcion) INTO suma FROM competiciones where ganada is null;
suma := suma + :NEW.costeInscripcion;
if(:new.ganada is null) then
IF (suma > 10000) THEN
raise_application_error
(-20604,'Superado el limite de gastos');
END IF;
end if;
END;
/
--RN-010: Stock vacío
create or replace trigger controlstock
after insert on lineasdepedidos
for each row 
declare 
PRAGMA AUTONOMOUS_TRANSACTION;
cnt integer;
begin 
select productos.stock into cnt from productos where productos.nombreproducto=:new.nombreproducto;
if(:new.cantidad > cnt) then 
raise_application_error(-20243, 'Productos en stock: '||cnt);
end if;
if((:new.cantidad <cnt)) then 
update productos set stock=cnt-(:new.cantidad) where nombreproducto=:new.nombreproducto;
end if;
if((:new.cantidad =cnt)) then 
DBMS_OUTPUT.PUT_LINE('Es necesario reponer el stock...'); 
update productos set stock=(:new.cantidad-cnt) where nombreproducto=:new.nombreproducto;
end if;
commit work;
end;
/
--------------------------------------------TRIGGERS CREACIÓN TABLAS----------------------------------------------------------
--Triggers para asegurar que el correo y el teléfono de jugadores,entrenadores,ojeadores y posibles fichajes sean distintos
create or replace trigger Correo_Jugador
before insert or update on Jugadores
for each row 
declare
cursor correosEntrenadores is select correoElectronicoEntrenador from entrenadores where :new.correoElectronicoJugador=
correoElectronicoEntrenador;
cursor correosOjeadores is select correoElectronicoOjeador from ojeadores where :new.correoElectronicoJugador=
correoElectronicoOjeador;
cursor correosPosiblesFichajes is select correo from posiblesfichajes natural join ojeadores where oid_v<>:new.oid_v and
:new.correoElectronicoJugador=correo;
registroEntrenadores correosEntrenadores%rowtype;
registroOjeadores correosOjeadores%rowtype;
registroPosiblesFichajes correosPosiblesFichajes%rowtype;
begin
    open correosEntrenadores;
    open correosOjeadores;
    open correosPosiblesFichajes;
    fetch correosEntrenadores into registroEntrenadores;
    fetch correosOjeadores into registroOjeadores;
    fetch correosPosiblesFichajes into registroPosiblesFichajes;
    if (not correosEntrenadores%notfound) or (not correosOjeadores%notfound) or (not correosPosiblesFichajes%notfound) 
    then
    raise_application_error(-20900,'Correo repetido');
    end if;
end;
/
create or replace trigger Telefono_Jugador
before insert or update on Jugadores
for each row 
declare
cursor telefonosEntrenadores is select numTelefonoEntrenador from entrenadores where :new.numTelefonoJugador=
numTelefonoEntrenador;
cursor telefonosOjeadores is select numTelefonoOjeador from ojeadores where :new.numTelefonoJugador=
numTelefonoOjeador;
registroEntrenadores telefonosEntrenadores%rowtype;
registroOjeadores telefonosOjeadores%rowtype;
begin
    open telefonosEntrenadores;
    open telefonosOjeadores;
    fetch telefonosEntrenadores into registroEntrenadores;
    fetch telefonosOjeadores into registroOjeadores;
    if (not telefonosEntrenadores%notfound) or (not telefonosOjeadores%notfound)
    then
    raise_application_error(-20901,'Teléfono repetido');
    end if;
end;
/
create or replace trigger Correo_Entrenador
before insert or update on Entrenadores
for each row 
declare
cursor correosJugadores is select correoElectronicoJugador from jugadores where :new.correoElectronicoEntrenador=
correoElectronicoJugador;
cursor correosOjeadores is select correoElectronicoOjeador from ojeadores where :new.correoElectronicoEntrenador=
correoElectronicoOjeador;
cursor correosPosiblesFichajes is select correo from posiblesfichajes where :new.correoElectronicoEntrenador=correo;
registroJugadores correosJugadores%rowtype;
registroOjeadores correosOjeadores%rowtype;
registroPosiblesFichajes correosPosiblesFichajes%rowtype;
begin
    open correosJugadores;
    open correosOjeadores;
    open correosPosiblesFichajes;
    fetch correosJugadores into registroJugadores;
    fetch correosOjeadores into registroOjeadores;
    fetch correosPosiblesFichajes into registroPosiblesFichajes;
    if (not correosJugadores%notfound) or (not correosOjeadores%notfound) or (not correosPosiblesFichajes%notfound) 
    then
    raise_application_error(-20902,'Correo repetido');
    end if;
end;
/
create or replace trigger Telefono_Entrenador
before insert or update on Entrenadores
for each row 
declare
cursor telefonosJugadores is select numTelefonoJugador from jugadores where :new.numTelefonoEntrenador=
numTelefonoJugador;
cursor telefonosOjeadores is select numTelefonoOjeador from ojeadores where :new.numTelefonoEntrenador=
numTelefonoOjeador;
registroJugadores telefonosJugadores%rowtype;
registroOjeadores telefonosOjeadores%rowtype;
begin
    open telefonosJugadores;
    open telefonosOjeadores;
    fetch telefonosJugadores into registroJugadores;
    fetch telefonosOjeadores into registroOjeadores;
    if (not telefonosJugadores%notfound) or (not telefonosOjeadores%notfound)
    then
    raise_application_error(-20903,'Teléfono repetido');
    end if;
end;
/
create or replace trigger Correo_Ojeador
before insert or update on Ojeadores
for each row 
declare
cursor correosJugadores is select correoElectronicoJugador from jugadores where :new.correoElectronicoOjeador=
correoElectronicoJugador;
cursor correosEntrenadores is select correoElectronicoEntrenador from entrenadores where :new.correoElectronicoOjeador=
correoElectronicoEntrenador;
cursor correosPosiblesFichajes is select correo from posiblesfichajes where :new.correoElectronicoOjeador=correo;
registroJugadores correosJugadores%rowtype;
registroEntrenadores correosEntrenadores%rowtype;
registroPosiblesFichajes correosPosiblesFichajes%rowtype;
begin
    open correosJugadores;
    open correosEntrenadores;
    open correosPosiblesFichajes;
    fetch correosJugadores into registroJugadores;
    fetch correosEntrenadores into registroEntrenadores;
    fetch correosPosiblesFichajes into registroPosiblesFichajes;
    if (not correosJugadores%notfound) or (not correosEntrenadores%notfound) or (not correosPosiblesFichajes%notfound) 
    then
    raise_application_error(-20904,'Correo repetido');
    end if;
end;
/
create or replace trigger Telefono_Ojeador
before insert or update on Ojeadores
for each row 
declare
cursor telefonosJugadores is select numTelefonoJugador from jugadores where :new.numTelefonoOjeador=
numTelefonoJugador;
cursor telefonosEntrenadores is select numTelefonoEntrenador from entrenadores where :new.numTelefonoOjeador=
numTelefonoEntrenador;
registroJugadores telefonosJugadores%rowtype;
registroEntrenadores telefonosEntrenadores%rowtype;
begin
    open telefonosJugadores;
    open telefonosEntrenadores;
    fetch telefonosJugadores into registroJugadores;
    fetch telefonosEntrenadores into registroEntrenadores;
    if (not telefonosJugadores%notfound) or (not telefonosEntrenadores%notfound)
    then
    raise_application_error(-20905,'Teléfono repetido');
    end if;
end;
/
create or replace trigger Correo_PosibleFichaje
before insert or update on PosiblesFichajes
for each row 
declare
cursor correosJugadores is select correoElectronicoJugador from jugadores where :new.correo=
correoElectronicoJugador;
cursor correosEntrenadores is select correoElectronicoEntrenador from entrenadores where :new.correo=
correoElectronicoEntrenador;
cursor correosOjeadores is select correoElectronicoOjeador from ojeadores where :new.correo=correoElectronicoOjeador;
registroJugadores correosJugadores%rowtype;
registroEntrenadores correosEntrenadores%rowtype;
registroOjeadores correosOjeadores%rowtype;
begin
    open correosJugadores;
    open correosEntrenadores;
    open correosOjeadores;
    fetch correosJugadores into registroJugadores;
    fetch correosEntrenadores into registroEntrenadores;
    fetch correosOjeadores into registroOjeadores;
    if (not correosJugadores%notfound) or (not correosEntrenadores%notfound) or (not correosOjeadores%notfound) 
    then
    raise_application_error(-20906,'Correo repetido');
    end if;
end;
/
--------------------------------------------TRIGGERS ATRIBUTOS DERIVADOS----------------------------------------------------------
--Atributo derivado subtotal
create or replace trigger T_SUB_LP
before insert on LineasDePedidos
for each row
begin
 select productos.precio*(:new.cantidad) into :new.subtotal from productos where productos.nombreproducto=:new.nombreproducto;
end;
/
--Atributo derivado racha
create or replace trigger T_RACHA_E
before insert or update on Estadisticas
for each row
declare 
PRAGMA AUTONOMOUS_TRANSACTION;
numero integer;
oldRacha estadisticas.racha%type;
maximo integer;
begin
    select count(*) into numero from estadisticas;
    if numero=0
    then
       if :new.ganado='1'
       then
       select 1 into :new.racha from dual;
       else
       select 0 into :new.racha from dual;
       end if;
    else
    select max(oid_e) into maximo from estadisticas;
    select racha into oldRacha from estadisticas where oid_e=maximo;
    if :new.ganado='1'
       then
       select oldRacha+1 into :new.racha from dual;
       else
       select 0 into :new.racha from dual;
       end if;
    end if;
commit work;
end;