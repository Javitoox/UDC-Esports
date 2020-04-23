------------------------------------------------------------------
------------------ELIMINACIÓN DE SECUENCIAS-----------------------
------------------------------------------------------------------

DROP SEQUENCE SEC_OID_LP;
DROP SEQUENCE SEC_OID_EN;
DROP SEQUENCE SEC_OID_AD;
DROP SEQUENCE SEC_OID_COM;
DROP SEQUENCE SEC_OID_E;
DROP SEQUENCE SEC_OID_V;
DROP SEQUENCE SEC_OID_SEG;

-------------------------------------------------------------------
--------------------CREACIÓN DE SECUENCIAS-------------------------
-------------------------------------------------------------------

CREATE SEQUENCE SEC_OID_V 
INCREMENT BY 1 
START WITH 1;
/
CREATE SEQUENCE SEC_OID_E 
INCREMENT BY 1 
START WITH 1;
/
CREATE SEQUENCE SEC_OID_COM 
INCREMENT BY 1 
START WITH 1;
/
CREATE SEQUENCE SEC_OID_AD 
INCREMENT BY 1 
START WITH 1;
/
CREATE SEQUENCE SEC_OID_EN 
INCREMENT BY 1 
START WITH 1;
/
CREATE SEQUENCE SEC_OID_LP 
INCREMENT BY 1 
START WITH 1;
/
CREATE SEQUENCE SEC_OID_SEG
INCREMENT BY 1 
START WITH 1;
/

---------------------------------------------------------------
-------------TRIGGERS ASOCIADOS A SECUENCIAS-------------------
---------------------------------------------------------------

CREATE OR REPLACE TRIGGER T_OID_V
BEFORE INSERT ON Videojuegos
FOR EACH ROW 
BEGIN
	SELECT SEC_OID_V.NEXTVAL INTO :NEW.OID_V  FROM DUAL;
END;
/

CREATE OR REPLACE TRIGGER T_OID_E
BEFORE INSERT ON Estadisticas
FOR EACH ROW
BEGIN
	SELECT SEC_OID_E.NEXTVAL INTO :NEW.OID_E FROM DUAL;
END;
/

CREATE OR REPLACE TRIGGER T_OID_COM
BEFORE INSERT ON Competiciones
FOR EACH ROW
BEGIN
	SELECT SEC_OID_COM.NEXTVAL INTO :NEW.OID_COM FROM DUAL;
END;
/

CREATE OR REPLACE TRIGGER T_OID_AD
BEFORE INSERT ON Adscripciones
FOR EACH ROW
BEGIN
	SELECT SEC_OID_AD.NEXTVAL INTO :NEW.OID_AD FROM DUAL;
END;
/

CREATE OR REPLACE TRIGGER T_OID_EN
BEFORE INSERT ON Encuestas
FOR EACH ROW
BEGIN
	SELECT SEC_OID_EN.NEXTVAL INTO :NEW.OID_EN FROM DUAL;
END;
/

CREATE OR REPLACE TRIGGER T_OID_LP
BEFORE INSERT ON LineasDePedidos
FOR EACH ROW
BEGIN
	SELECT SEC_OID_LP.NEXTVAL INTO :NEW.OID_LP FROM DUAL;
END;
/
CREATE OR REPLACE TRIGGER T_OID_SEG
BEFORE INSERT ON Seguimientos
FOR EACH ROW
BEGIN
	SELECT SEC_OID_SEG.NEXTVAL INTO :NEW.OID_SEG FROM DUAL;
END;
/

----------------------------------------------------------
---------------INSERCIÓN DE VALORES-----------------------
----------------------------------------------------------

create or replace PROCEDURE insertar_videojuegos
(w_nombreVideojuego IN Videojuegos.nombreVideojuego%TYPE,
w_fechaCreacion IN Videojuegos.fechaCreacion%TYPE,
w_introduccion IN Videojuegos.introduccion%TYPE) 
IS
BEGIN
INSERT INTO Videojuegos (nombreVideojuego,fechaCreacion,introduccion) 
VALUES (w_nombreVideojuego,w_fechaCreacion,w_introduccion);
END;
/
------------------------------------------------------------
create or replace PROCEDURE insertar_jugadores
(w_dniJugador IN Jugadores.dniJugador%TYPE,
w_nombreJugador IN Jugadores.nombreJugador%TYPE,
w_salarioJugador IN Jugadores.salarioJugador%TYPE,
w_numTelefonoJugador IN Jugadores.numTelefonoJugador%TYPE,
w_numAñosExperienciaJugador IN Jugadores.numAñosExperienciaJugador%TYPE,
w_correoElectronicoJugador IN Jugadores.correoElectronicoJugador%TYPE,
w_fechaEntrada IN Jugadores.fechaEntrada%TYPE,
w_nombreVirtualJugador IN Jugadores.nombreVirtualJugador%TYPE,
w_numRegalos IN Jugadores.numRegalos%TYPE,
w_nacionalidadJugador IN Jugadores.nacionalidadJugador%TYPE,
w_OID_V IN Jugadores.OID_V%TYPE) 
IS
BEGIN
INSERT INTO Jugadores (dniJugador,nombreJugador,salarioJugador,numTelefonoJugador,numAñosExperienciaJugador,correoElectronicoJugador,fechaEntrada,nombreVirtualJugador,numRegalos,nacionalidadJugador,OID_V) 
VALUES (w_dniJugador,w_nombreJugador,w_salarioJugador,w_numTelefonoJugador,w_numAñosExperienciaJugador,w_correoElectronicoJugador,w_fechaEntrada,w_nombreVirtualJugador,w_numRegalos,w_nacionalidadJugador,w_OID_V);
END;
/
------------------------------------------------------------
create or replace PROCEDURE insertar_entrenadores
(w_dniEntrenador IN Entrenadores.dniEntrenador%TYPE,
w_nombreEntrenador IN Entrenadores.nombreEntrenador%TYPE,
w_salarioEntrenador IN Entrenadores.salarioEntrenador%TYPE,
w_numTelefonoEntrenador IN Entrenadores.numTelefonoEntrenador%TYPE,
w_numAñosExpEntrenador IN Entrenadores.numAñosExperienciaEntrenador%TYPE,
w_correoElectronicoEntrenador IN Entrenadores.correoElectronicoEntrenador%TYPE,
w_nacionalidadEntrenador IN Entrenadores.nacionalidadEntrenador%TYPE,
w_OID_V IN Entrenadores.OID_V%TYPE)
IS
BEGIN
INSERT INTO Entrenadores (dniEntrenador,nombreEntrenador,salarioEntrenador,numTelefonoEntrenador,numAñosExperienciaEntrenador,correoElectronicoEntrenador,nacionalidadEntrenador,OID_V) 
VALUES (w_dniEntrenador,w_nombreEntrenador,w_salarioEntrenador,w_numTelefonoEntrenador,w_numAñosExpEntrenador,w_correoElectronicoEntrenador,w_nacionalidadEntrenador,w_OID_V);
END;
/
---------------------------------------------------------------
create or replace PROCEDURE insertar_ojeadores
(w_dniOjeador IN Ojeadores.dniOjeador%TYPE,
w_nombreOjeador IN Ojeadores.nombreOjeador%TYPE,
w_salarioOjeador IN Ojeadores.salarioOjeador%TYPE,
w_numTelefonoOjeador IN Ojeadores.numTelefonoOjeador%TYPE,
w_numAñosExperienciaOjeador IN Ojeadores.numAñosExperienciaOjeador%TYPE,
w_correoElectronicoOjeador IN Ojeadores.correoElectronicoOjeador%TYPE,
w_nacionalidadOjeador IN Ojeadores.nacionalidadOjeador%TYPE,
w_OID_V IN Ojeadores.OID_V%TYPE)
IS  
BEGIN
INSERT INTO Ojeadores (dniOjeador,nombreOjeador,salarioOjeador,numTelefonoOjeador,numAñosExperienciaOjeador,correoElectronicoOjeador,nacionalidadOjeador,OID_V) 
VALUES (w_dniOjeador,w_nombreOjeador,w_salarioOjeador,w_numTelefonoOjeador,w_numAñosExperienciaOjeador,w_correoElectronicoOjeador,w_nacionalidadOjeador,w_OID_V);
END;
/
----------------------------------------------------------------
create or replace PROCEDURE insertar_estadisticas
(w_ganado IN Estadisticas.ganado%TYPE,
w_tiempoDeJuego IN Estadisticas.tiempoDeJuego%TYPE,
w_valoracion IN Estadisticas.valoracion%TYPE)
IS  
BEGIN
INSERT INTO Estadisticas (ganado,tiempoDeJuego,valoracion) 
VALUES (w_ganado,w_tiempoDeJuego,w_valoracion);
END;
/
----------------------------------------------------------------
create or replace PROCEDURE insertar_competiciones
(w_nombreCompeticion IN Competiciones.nombreCompeticion%TYPE,
w_premio IN Competiciones.premio%TYPE,
w_fechaCompeticion IN Competiciones.fechaCompeticion%TYPE,
w_costeInscripcion IN Competiciones.costeInscripcion%TYPE,
w_ganada IN Competiciones.ganada%TYPE)
IS  
BEGIN
INSERT INTO Competiciones (nombreCompeticion,premio,fechaCompeticion,costeInscripcion,ganada) 
VALUES (w_nombreCompeticion,w_premio,w_fechaCompeticion,w_costeInscripcion,w_ganada);
END;
/
----------------------------------------------------------------
create or replace PROCEDURE insertar_partidos
(w_OID_V IN Partidos.OID_V%TYPE,
w_OID_COM IN Partidos.OID_COM%TYPE,
w_OID_E IN Partidos.OID_E%TYPE,
w_lugar IN Partidos.lugar%TYPE,
w_fechaHora IN Partidos.fechaHora%TYPE,
w_medio IN Partidos.medio%TYPE)
IS  
BEGIN
INSERT INTO Partidos (OID_V,OID_COM,OID_E,lugar,fechaHora,medio) 
VALUES (w_OID_V,w_OID_COM,w_OID_E,w_lugar,w_fechaHora,w_medio);
END;
/
----------------------------------------------------------------
create or replace PROCEDURE insertar_adscripciones
(w_fecha IN Adscripciones.fecha%TYPE,
w_dniJugador IN Adscripciones.dniJugador%TYPE,
w_OID_COM IN Adscripciones.OID_COM%TYPE)
IS  
BEGIN
INSERT INTO Adscripciones (fecha,dniJugador,OID_COM) 
VALUES (w_fecha,w_dniJugador,w_OID_COM);
END;
/
---------------------------------------------------------------
create or replace PROCEDURE insertar_redesSociales
(w_nombreVirtualRed IN RedesSociales.nombreVirtualRed%TYPE,
w_fechaCreacionRed IN RedesSociales.fechaCreacionRed%TYPE,
w_numSeguidores IN RedesSociales.numSeguidores%TYPE,
w_tipoRed IN RedesSociales.tipoRed%TYPE,
w_dniJugador IN RedesSociales.dniJugador%TYPE,
w_dniEntrenador IN RedesSociales.dniEntrenador%TYPE)
IS  
BEGIN
INSERT INTO RedesSociales (nombreVirtualRed,fechaCreacionRed,numSeguidores,tipoRed,dniJugador,dniEntrenador) 
VALUES (w_nombreVirtualRed,w_fechaCreacionRed,w_numSeguidores,w_tipoRed,w_dniJugador,w_dniEntrenador);
END;
/
----------------------------------------------------------------
create or replace PROCEDURE insertar_encuestas
(w_fechaInicio IN Encuestas.fechaInicio%TYPE,
w_fechaFin IN Encuestas.fechaFin%TYPE,
w_tipo IN Encuestas.tipo%TYPE,
w_nombreVirtualRed IN Encuestas.nombreVirtualRed%TYPE,
w_tipoRed IN Encuestas.tipoRed%TYPE)
IS  
BEGIN
INSERT INTO Encuestas (fechaInicio,fechaFin,tipo,nombreVirtualRed,tipoRed) 
VALUES (w_fechaInicio,w_fechaFin,w_tipo,w_nombreVirtualRed,w_tipoRed);
END;
/
----------------------------------------------------------------
create or replace PROCEDURE insertar_posiblesFichajes
(w_nombreVirtual IN PosiblesFichajes.nombreVirtual%TYPE,
w_clausula IN PosiblesFichajes.clausula%TYPE,
w_correo IN PosiblesFichajes.correo%TYPE,
w_club IN PosiblesFichajes.club%TYPE,
w_nacionalidad IN PosiblesFichajes.nacionalidad%TYPE,
w_dniOjeador IN PosiblesFichajes.dniOjeador%TYPE)
IS  
BEGIN
INSERT INTO PosiblesFichajes (nombreVirtual,clausula,correo,club,nacionalidad,dniOjeador) 
VALUES (w_nombreVirtual,w_clausula,w_correo,w_club,w_nacionalidad,w_dniOjeador);
END;
/
----------------------------------------------------------------
create or replace PROCEDURE insertar_productos
(w_nombreProducto IN Productos.nombreProducto%TYPE,
w_precio IN Productos.precio%TYPE,
w_stock IN productos.stock%TYPE,
w_descripcion IN Productos.descripcion%TYPE,
w_tipoProducto IN Productos.tipoProducto%TYPE,
w_OID_V IN Productos.OID_V%TYPE)
IS  
BEGIN
INSERT INTO Productos (nombreProducto,precio,stock,descripcion,tipoProducto,OID_V) 
VALUES (w_nombreProducto,w_precio,w_stock,w_descripcion,w_tipoProducto,w_OID_V);
END;
/
----------------------------------------------------------------
create or replace PROCEDURE insertar_clientes
(w_dniCliente IN Clientes.dniCliente%TYPE,
w_nombreCompleto IN Clientes.nombreCompleto%TYPE,
w_numTelefonoCliente IN Clientes.numTelefonoCliente%TYPE,
w_correoCliente IN Clientes.correoCliente%TYPE)
IS  
BEGIN
INSERT INTO Clientes (dnicliente,nombreCompleto,numTelefonoCliente,correoCliente) 
VALUES (w_dnicliente,w_nombreCompleto,w_numTelefonoCliente,w_correoCliente);
END;
/
-----------------------------------------------------------------
create or replace PROCEDURE insertar_pedidos
(w_identificador IN Pedidos.identificador%TYPE,
w_fechaPedido IN Pedidos.fechaPedido%TYPE,
w_dniCliente IN Pedidos.dniCliente%TYPE)
IS  
BEGIN
INSERT INTO Pedidos (identificador, fechaPedido,dniCliente) 
VALUES (w_identificador, w_fechaPedido,w_dniCliente);
END;
/
------------------------------------------------------------------
create or replace PROCEDURE insertar_lineasDePedidos
(w_cantidad IN LineasDePedidos.cantidad%TYPE,
w_nombreProducto IN LineasDePedidos.nombreProducto%TYPE,
w_identificador IN LineasDePedidos.identificador%TYPE)
IS  
BEGIN
INSERT INTO LineasDePedidos (cantidad,nombreProducto,identificador) 
VALUES (w_cantidad,w_nombreProducto,w_identificador);
END;
/
------------------------------------------------------------------
create or replace PROCEDURE insertar_usuarios
(w_dniUsuario IN Usuarios.dniUsuario%TYPE,
w_nombreCompletoUsuario IN Usuarios.nombreCompletoUsuario%TYPE,
w_nickUsuario IN Usuarios.nickUsuario%TYPE,
w_emailUsuario IN Usuarios.emailUsuario%TYPE,
w_fechaNacimientoUsuario IN Usuarios.fechaNacimientoUsuario%TYPE,
w_numTelefonoUsuario IN Usuarios.numTelefonoUsuario%TYPE,
w_passUsuario IN Usuarios.passUsuario%TYPE,
w_confirmPassUsuario IN Usuarios.confirmPassUsuario%TYPE)
IS  
BEGIN
INSERT INTO Usuarios (dniUsuario,nombreCompletoUsuario,nickUsuario,emailUsuario,fechaNacimientoUsuario,numTelefonoUsuario,
passUsuario,confirmPassUsuario) 
VALUES (w_dniUsuario,w_nombreCompletoUsuario,w_nickUsuario,w_emailUsuario,to_date(w_fechaNacimientoUsuario,'dd/mm/YYYY'),w_numTelefonoUsuario,
w_passUsuario,w_confirmPassUsuario);
END;
/
------------------------------------------------------------------
create or replace PROCEDURE insertar_seguimientos
(w_dniUsuario IN Seguimientos.dniUsuario%TYPE,
w_dniJugador IN Seguimientos.dniJugador%TYPE,
w_opinion IN Seguimientos.opinion%TYPE)
IS  
BEGIN
INSERT INTO Seguimientos (dniUsuario,dniJugador,opinion) 
VALUES (w_dniUsuario,w_dniJugador,w_opinion);
END;
/
------------------------------------------------------------------
------------------------------------------------------------------
------------------------------------------------------------------