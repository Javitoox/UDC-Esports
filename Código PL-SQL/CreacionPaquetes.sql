/*=================================================================*/
/*                  Función auxiliar ASSERT_EQUALS                 */
/*=================================================================*/

create or replace FUNCTION ASSERT_EQUALS (salida BOOLEAN, salidaEsperada BOOLEAN)
    RETURN VARCHAR2 AS
    BEGIN
        IF(salida = salidaEsperada and salida = true) THEN 
            RETURN 'EXITO';
        ELSE
            RETURN 'FALLO';
        END IF;
    END ASSERT_EQUALS;
/

/*=================================================================*/
/*                      CABECERAS de paquetes                      */
/*=================================================================*/

--Tabla Videojuegos

create or replace PACKAGE PRUEBAS_VIDEOJUEGOS AS
    PROCEDURE inicializar;
    PROCEDURE insertar
        (nombrePrueba VARCHAR2, 
        w_nom_videojuego IN Videojuegos.nombreVideojuego%TYPE, 
        w_fechaCrea IN Videojuegos.fechaCreacion%TYPE, 
        w_intro IN Videojuegos.introduccion%TYPE, 
        salidaEsperada BOOLEAN);
    PROCEDURE actualizar
        (nombrePrueba VARCHAR2, 
        w_oid_v IN Videojuegos.OID_V%TYPE,
        w_nom_videojuego IN Videojuegos.nombreVideojuego%TYPE, 
        w_fechaCrea IN Videojuegos.fechaCreacion%TYPE, 
        w_intro IN Videojuegos.introduccion%TYPE, 
        salidaEsperada BOOLEAN);
    PROCEDURE eliminar
        (nombrePrueba VARCHAR2,
        w_oid_v IN Videojuegos.OID_V%TYPE, 
        salidaEsperada BOOLEAN);
        
END PRUEBAS_VIDEOJUEGOS;
/

--Tabla Pedidos

create or replace PACKAGE PRUEBAS_PEDIDOS AS
    PROCEDURE inicializar;
    PROCEDURE insertar
        (nombrePrueba VARCHAR2,  
        w_identificador IN pedidos.identificador%TYPE, w_fechaPedido IN pedidos.fechapedido%TYPE, w_dniCliente IN pedidos.dnicliente%TYPE, 
        salidaEsperada BOOLEAN);
    PROCEDURE actualizar
        (nombrePrueba VARCHAR2, w_identificador IN pedidos.identificador%TYPE, 
        w_fechaPedido IN pedidos.fechapedido%TYPE, salidaEsperada BOOLEAN);
    PROCEDURE eliminar
        (nombrePrueba VARCHAR2, w_identificador IN pedidos.identificador%TYPE, 
         salidaEsperada BOOLEAN);
END PRUEBAS_PEDIDOS;   

/  

--Tabla Estadísticas

create or replace PACKAGE PRUEBAS_ESTADISTICAS AS
    PROCEDURE inicializar;
    PROCEDURE insertar
         (nombrePrueba VARCHAR2, 
         w_ganado IN Estadisticas.ganado%TYPE,
         w_tiempoJuego IN Estadisticas.tiempoDeJuego%TYPE,
         w_valoracion IN Estadisticas.valoracion%TYPE,
         salidaEsperada BOOLEAN);
         
    PROCEDURE actualizar
         (nombrePrueba VARCHAR2,
         w_oid_e IN Estadisticas.OID_E%TYPE,
         w_ganado IN Estadisticas.ganado%TYPE,
         w_tiempoJuego IN Estadisticas.tiempoDeJuego%TYPE,
         w_valoracion IN Estadisticas.valoracion%TYPE,
         salidaEsperada BOOLEAN);
    
    PROCEDURE eliminar
         (nombrePrueba VARCHAR2,
         w_oid_e IN Estadisticas.OID_E%TYPE,
         salidaEsperada BOOLEAN);

END PRUEBAS_ESTADISTICAS;

/

--Tabla Ojeador
create or replace PACKAGE PRUEBAS_OJEADORES AS
    PROCEDURE inicializar;
    PROCEDURE insertar
         (nombrePrueba VARCHAR2, 
         w_dniOjeador IN Ojeadores.dniOjeador%TYPE,
         w_nombreOjeador IN Ojeadores.nombreOjeador%TYPE,
         w_salarioOjeador IN Ojeadores.salarioOjeador%TYPE,
         w_numTelefonoOjeador IN Ojeadores.numTelefonoOjeador%TYPE,
         w_numAñosExperienciaOjeador IN Ojeadores.numAñosExperienciaOjeador%TYPE,
         w_correoElectronicoOjeador IN Ojeadores.correoElectronicoOjeador%TYPE,
         w_nacionalidadOjeador IN Ojeadores.nacionalidadOjeador%TYPE,
         w_OID_V IN Ojeadores.OID_V%TYPE,
         salidaEsperada BOOLEAN);
            
    PROCEDURE actualizar
         (nombrePrueba VARCHAR2, 
         w_dniOjeador IN Ojeadores.dniOjeador%TYPE,
         w_nombreOjeador IN Ojeadores.nombreOjeador%TYPE,
         w_salarioOjeador IN Ojeadores.salarioOjeador%TYPE,
         w_numTelefonoOjeador IN Ojeadores.numTelefonoOjeador%TYPE,
         w_numAñosExperienciaOjeador IN Ojeadores.numAñosExperienciaOjeador%TYPE,
         w_correoElectronicoOjeador IN Ojeadores.correoElectronicoOjeador%TYPE,
         w_nacionalidadOjeador IN Ojeadores.nacionalidadOjeador%TYPE,
         salidaEsperada BOOLEAN);
    
    PROCEDURE eliminar
         (nombrePrueba VARCHAR2, 
         w_dniOjeador IN Ojeadores.dniOjeador%TYPE,
         salidaEsperada BOOLEAN);

END PRUEBAS_OJEADORES;

/

--Tabla Encuesta
create or replace PACKAGE PRUEBAS_ENCUESTAS AS
    PROCEDURE inicializar;
    PROCEDURE insertar 
        (nombrePrueba VARCHAR2, w_fechaInicio IN Encuestas.fechaInicio%TYPE,w_fechaFin IN Encuestas.fechaFin%TYPE,
         w_tipo IN Encuestas.tipo%TYPE,w_nombreVirtualRed IN Encuestas.nombreVirtualRed%TYPE, 
         w_tipoRed IN Encuestas.tipoRed%TYPE, salidaEsperada BOOLEAN);
    PROCEDURE actualizar 
        (nombrePrueba VARCHAR2, w_oid_en IN Encuestas.oid_en%TYPE, 
         w_fechaInicio IN Encuestas.fechaInicio%TYPE,w_fechaFin IN Encuestas.fechaFin%TYPE,
         w_tipo IN Encuestas.tipo%TYPE, salidaEsperada BOOLEAN);
    
    PROCEDURE eliminar 
        (nombrePrueba VARCHAR2, w_oid_en IN Encuestas.oid_en%TYPE, salidaEsperada BOOLEAN);

END PRUEBAS_ENCUESTAS;

/

--Tabla Productos
create or replace PACKAGE PRUEBAS_PRODUCTOS AS
    PROCEDURE inicializar;
    PROCEDURE insertar
         (nombrePrueba VARCHAR2, 
         w_nombreProducto IN Productos.nombreProducto%TYPE,
         w_precio IN Productos.precio%TYPE,
         w_stock IN Productos.stock%TYPE,
         w_descripcion IN Productos.descripcion%TYPE,
         w_tipoProducto IN Productos.tipoProducto%TYPE,
         w_OID_V IN Productos.OID_V%TYPE,
         salidaEsperada BOOLEAN);
    
    PROCEDURE actualizar
         (nombrePrueba VARCHAR2,
         w_nombreProducto IN Productos.nombreProducto%TYPE,
         w_precio IN Productos.precio%TYPE,
         w_stock IN Productos.stock%TYPE,
         w_descripcion IN Productos.descripcion%TYPE,
         w_tipoProducto IN Productos.tipoProducto%TYPE,
         salidaEsperada BOOLEAN);
         
    PROCEDURE eliminar
         (nombrePrueba VARCHAR2,
         w_nombreProducto IN Productos.nombreProducto%TYPE,
         salidaEsperada BOOLEAN);
         
END PRUEBAS_PRODUCTOS;

/

--Tabla Clientes
create or replace PACKAGE PRUEBAS_CLIENTES AS
    PROCEDURE inicializar;
    PROCEDURE insertar
         (nombrePrueba VARCHAR2, 
         w_dniCliente IN Clientes.dniCliente%TYPE,
         w_nombreCompleto IN Clientes.nombreCompleto%TYPE,
         w_numTelefonoCliente IN Clientes.numTelefonoCliente%TYPE,
         w_correoCliente IN Clientes.correoCliente%TYPE,
         salidaEsperada BOOLEAN);

    PROCEDURE actualizar
         (nombrePrueba VARCHAR2, 
         w_dniCliente IN Clientes.dniCliente%TYPE,
         w_nombreCompleto IN Clientes.nombreCompleto%TYPE,
         w_numTelefonoCliente IN Clientes.numTelefonoCliente%TYPE,
         w_correoCliente IN Clientes.correoCliente%TYPE,
         salidaEsperada BOOLEAN);
    
    PROCEDURE eliminar
         (nombrePrueba VARCHAR2,
         w_dniCliente IN Clientes.dniCliente%TYPE,
         salidaEsperada BOOLEAN);

END PRUEBAS_CLIENTES;

/

--Tabla Posibles fichajes
create or replace PACKAGE PRUEBAS_POSIBLESFICHAJES as
    PROCEDURE inicializar;
    PROCEDURE insertar 
        (nombrePrueba varchar2,w_nomvirt posiblesfichajes.nombrevirtual%type, 
         w_clau posiblesfichajes.clausula%type,w_co posiblesfichajes.correo%type, 
         w_clu posiblesfichajes.club%type,w_nac posiblesfichajes.nacionalidad%type,
         w_dni posiblesfichajes.dniojeador%type,salidaEsperada boolean); 
    
    PROCEDURE actualizar
        (nombrePrueba varchar2,w_nomvirt posiblesfichajes.nombrevirtual%type, 
         w_clau posiblesfichajes.clausula%type,w_co posiblesfichajes.correo%type, 
         w_clu posiblesfichajes.club%type,w_nac posiblesfichajes.nacionalidad%type,
         w_dni posiblesfichajes.dniojeador%type,salidaEsperada boolean);
    
    PROCEDURE eliminar
        (nombrePrueba varchar2,w_nomvirt posiblesfichajes.nombrevirtual%type,
         w_dni posiblesfichajes.dniojeador%type,salidaEsperada boolean);
    
END PRUEBAS_POSIBLESFICHAJES;
    
/

--Tabla Entrenadores
create or replace PACKAGE PRUEBAS_ENTRENADORES as
    PROCEDURE inicializar;
   
   PROCEDURE insertar 
         (nombrePrueba varchar2,w_dni entrenadores.dnientrenador%type,
         w_nom entrenadores.nombreentrenador%type,w_sal entrenadores.salarioentrenador%type,w_num entrenadores.numtelefonoentrenador%type,
         w_anios entrenadores.numAñosexperienciaentrenador%type,
         w_corr entrenadores.correoelectronicoentrenador%type,w_nac entrenadores.nacionalidadentrenador%type,
         w_oid_v entrenadores.oid_v%type,salidaEsperada boolean);
    
    PROCEDURE actualizar
         (nombrePrueba varchar2,w_dni entrenadores.dnientrenador%type,
         w_nom entrenadores.nombreentrenador%type,w_sal entrenadores.salarioentrenador%type,w_num entrenadores.numtelefonoentrenador%type,
         w_anios entrenadores.numAñosexperienciaentrenador%type,
         w_corr entrenadores.correoelectronicoentrenador%type,w_nac entrenadores.nacionalidadentrenador%type,
         w_oid_v entrenadores.oid_v%type,salidaEsperada boolean); 
    
    PROCEDURE eliminar
         (nombrePrueba varchar2,w_dni entrenadores.dnientrenador%type,salidaEsperada boolean); 

END PRUEBAS_ENTRENADORES;

/
--Tabla Competiciones
create or replace PACKAGE PRUEBAS_COMPETICIONES as
    PROCEDURE inicializar;
    
    PROCEDURE insertar 
         (nombrePrueba varchar2,w_nom competiciones.nombrecompeticion%type, w_pre competiciones.premio%type,
         w_fec competiciones.fechacompeticion%type,w_cost competiciones.costeinscripcion%type,
         w_gan competiciones.ganada%type,salidaEsperada boolean);    
    
    PROCEDURE actualizar
         (nombrePrueba varchar2,w_oid_c competiciones.oid_com%type,w_nom competiciones.nombrecompeticion%type, w_pre competiciones.premio%type,
         w_fec competiciones.fechacompeticion%type,w_cost competiciones.costeinscripcion%type,
         w_gan competiciones.ganada%type,salidaEsperada boolean); 
    
    PROCEDURE eliminar
         (nombrePrueba varchar2,w_oid_c competiciones.oid_com%type,salidaEsperada boolean); 

END PRUEBAS_COMPETICIONES;

/
--Tabla Jugadores
create or replace PACKAGE PRUEBAS_JUGADORES as
    PROCEDURE inicializar;
    PROCEDURE insertar 
         (nombrePrueba varchar2,w_dni jugadores.dnijugador%type,w_nom jugadores.nombrejugador%type, 
         w_sal jugadores.salariojugador%type,w_num jugadores.numtelefonojugador%type,
         w_anios jugadores.numAñosexperienciajugador%type,w_corr jugadores.correoelectronicojugador%type,
         w_fec jugadores.fechaentrada%type, w_nomvirt jugadores.nombrevirtualjugador%type,
         w_nmreg jugadores.numregalos%type,w_nac jugadores.nacionalidadjugador%type,w_oid_v jugadores.oid_v%type,
         salidaEsperada boolean); 
         
    PROCEDURE actualizar
         (nombrePrueba varchar2,w_dni jugadores.dnijugador%type,w_nom jugadores.nombrejugador%type, 
         w_sal jugadores.salariojugador%type,w_num jugadores.numtelefonojugador%type,
         w_anios jugadores.numAñosexperienciajugador%type,w_corr jugadores.correoelectronicojugador%type,
         w_fec jugadores.fechaentrada%type, w_nomvirt jugadores.nombrevirtualjugador%type,
         w_nmreg jugadores.numregalos%type,w_nac jugadores.nacionalidadjugador%type,w_oid_v jugadores.oid_v%type,
         salidaEsperada boolean);
    
    PROCEDURE eliminar
         (nombrePrueba varchar2,w_dni jugadores.dnijugador%type,salidaEsperada boolean); 

END PRUEBAS_JUGADORES;

/

--Tabla Adscripciones
create or replace PACKAGE PRUEBAS_ADSCRIPCIONES as
    PROCEDURE inicializar;
    PROCEDURE insertar 
         (nombrePrueba varchar2,w_fec adscripciones.fecha%type,w_fecbaj adscripciones.fechabaja%type, 
         w_dni adscripciones.dnijugador%type,w_oid_com adscripciones.oid_com%type,salidaEsperada boolean); 
         
    PROCEDURE actualizar
         (nombrePrueba varchar2,w_oid_ad adscripciones.oid_ad%type,w_fec adscripciones.fecha%type,w_fecbaj adscripciones.fechabaja%type, 
         w_dni adscripciones.dnijugador%type,w_oid_com adscripciones.oid_com%type,salidaEsperada boolean); 
         
    
    PROCEDURE eliminar
         (nombrePrueba varchar2,w_oid_ad adscripciones.oid_ad%type,salidaEsperada boolean); 

END PRUEBAS_ADSCRIPCIONES;

/

--Tabla Redes Sociales
create or replace PACKAGE PRUEBAS_REDESSOCIALES as
    PROCEDURE inicializar;
    PROCEDURE insertar 
         (nombrePrueba varchar2,w_nv redessociales.nombrevirtualred%type,w_fec redessociales.fechacreacionred%type,
         w_nms redessociales.numseguidores%type,w_tipo redessociales.tipored%type, 
         w_dni redessociales.dnijugador%type, w_dni_e redessociales.dnientrenador%type,salidaEsperada boolean);
    
    PROCEDURE actualizar
         (nombrePrueba varchar2,w_nvirt redessociales.nombrevirtualred%type,w_fec redessociales.fechacreacionred%type,
         w_nms redessociales.numseguidores%type,w_tipo redessociales.tipored%type, 
         w_dni redessociales.dnijugador%type, w_dni_e redessociales.dnientrenador%type,salidaEsperada boolean); 

    PROCEDURE eliminar(nombrePrueba varchar2,w_nvirt redessociales.nombrevirtualred%type,
	     w_tipo redessociales.tipored%type,salidaEsperada boolean);

END PRUEBAS_REDESSOCIALES;


/

create or replace PACKAGE PRUEBAS_LINEASDEPEDIDOS as
    PROCEDURE inicializar;
    PROCEDURE insertar 
         (nombrePrueba varchar2,w_can lineasdepedidos.cantidad%type,
         w_nom lineasdepedidos.nombreproducto%type,w_id lineasdepedidos.identificador%type,salidaEsperada boolean);
         
    PROCEDURE actualizar
         (nombrePrueba varchar2,w_oid_lp lineasdepedidos.oid_lp%type,w_can lineasdepedidos.cantidad%type,
         w_nom lineasdepedidos.nombreproducto%type,w_id lineasdepedidos.identificador%type,salidaEsperada boolean); 
         
    PROCEDURE eliminar
         (nombrePrueba varchar2,w_oid_lp lineasdepedidos.oid_lp%type,salidaEsperada boolean); 

END PRUEBAS_LINEASDEPEDIDOS;

/

create or replace PACKAGE PRUEBAS_PARTIDOS as
    PROCEDURE inicializar;
    PROCEDURE insertar 
         (nombrePrueba varchar2,w_oid_v partidos.oid_v%type,w_com partidos.oid_com%type,w_e partidos.oid_e%type,
         w_lug partidos.lugar%type,w_fec partidos.fechahora%type,w_m partidos.medio%type,salidaEsperada boolean); 
    
    PROCEDURE actualizar
         (nombrePrueba varchar2,w_oid_v partidos.oid_v%type,w_com partidos.oid_com%type,w_e partidos.oid_e%type,
         w_lug partidos.lugar%type,w_fec partidos.fechahora%type,w_m partidos.medio%type,salidaEsperada boolean);
         
         
         
    PROCEDURE eliminar
         (nombrePrueba varchar2,w_oid_v partidos.oid_v%type,w_fec partidos.fechahora%type,salidaEsperada boolean); 

END PRUEBAS_PARTIDOS;
/


/*=================================================================*/
/*                        CUERPOS de paquetes                      */
/*=================================================================*/

--Tabla videojuegos

create or replace PACKAGE BODY PRUEBAS_VIDEOJUEGOS AS
    /* INICIALIZACIÓN */
    PROCEDURE inicializar AS
    BEGIN
        /*Borrar contenido de la tabla*/
        DELETE FROM videojuegos;
    END inicializar;

    /* INSERCIÓN */
    PROCEDURE insertar (nombrePrueba VARCHAR2, 
        w_nom_videojuego IN Videojuegos.nombreVideojuego%TYPE, 
        w_fechaCrea IN Videojuegos.fechaCreacion%TYPE, 
        w_intro IN Videojuegos.introduccion%TYPE, 
        salidaEsperada BOOLEAN) AS 
        salida BOOLEAN := true;
        videojuego videojuegos%ROWTYPE;
        w_oid_v NUMBER;
   
   BEGIN
        /* Insertar Videojuego */
       insertar_videojuegos(w_nom_videojuego, w_fechaCrea, w_intro);
        
        /* Seleccionar videojuego y comprobar que los datos se han insertado correctamente */
        w_oid_v := sec_oid_v.currval;
        select * into videojuego FROM videojuegos WHERE videojuegos.oid_v = w_oid_v;
        IF(videojuego.nombrevideojuego<>w_nom_videojuego)THEN
            salida := false;
        END IF;
        
        IF(videojuego.fechacreacion<>w_fechaCrea)THEN
            salida := false;
        END IF;
        
        IF(videojuego.introduccion<>w_intro)THEN
            salida := false;
        END IF;
        
        COMMIT WORK;
        EXCEPTION
        WHEN OTHERS THEN
            dbms_output.put_line(nombrePrueba || ':' || ASSERT_EQUALS(salida, salidaEsperada));
            ROLLBACK;
        
        /* Mostrar resultado de la prueba */
        dbms_output.put_line(nombrePrueba || ':' || ASSERT_EQUALS(false, salidaEsperada));
        
        
    END insertar;
            
    /* ACTUALIZACIÓN */      
            
     PROCEDURE actualizar (nombrePrueba VARCHAR2,  
        w_oid_v IN Videojuegos.OID_V%TYPE,
        w_nom_videojuego IN Videojuegos.nombreVideojuego%TYPE, 
        w_fechaCrea IN Videojuegos.fechaCreacion%TYPE, 
        w_intro IN Videojuegos.introduccion%TYPE, 
        salidaEsperada BOOLEAN) AS 
        salida BOOLEAN := true;
        videojuego videojuegos%ROWTYPE;
    
    BEGIN
        /* Actualizar videojuego */
        UPDATE videojuegos SET nombreVideojuego = w_nom_videojuego, fechaCreacion = w_fechaCrea, introduccion = w_intro
        WHERE oid_v = w_oid_v;
        
        /* Seleccionar videojuego y comprobar que los campos se actualizaron correctamente */
        select * into videojuego from videojuegos where oid_v = w_oid_v;
        IF(videojuego.nombrevideojuego<>w_nom_videojuego)THEN
            salida := false;
        END IF;
        
        IF(videojuego.fechacreacion<>w_fechaCrea)THEN
            salida := false;
        END IF;
        
        IF(videojuego.introduccion<>w_intro)THEN
            salida := false;
        END IF;
        COMMIT WORK;
        
        /* Mostrar resultado de la prueba */
        dbms_output.put_line(nombrePrueba || ':' || ASSERT_EQUALS(salida, salidaEsperada));
        
        EXCEPTION
        WHEN OTHERS THEN
            dbms_output.put_line(nombrePrueba || ':' || ASSERT_EQUALS(false, salidaEsperada));
            ROLLBACK;
    END actualizar;
    
    PROCEDURE eliminar (nombrePrueba VARCHAR2,
        w_oid_v IN Videojuegos.OID_V%TYPE,
        salidaEsperada BOOLEAN) AS 
        salida BOOLEAN := true;
        n_videojuegos INTEGER;
        
    BEGIN
        /* Eliminar videojuego */
        DELETE FROM videojuegos where oid_v = w_oid_v;
        
        /* Verificar que el videojuego no se encuentra en la BD */
        select count(*) into n_videojuegos from videojuegos where oid_v = w_oid_v;
        IF(n_videojuegos <> 0) THEN
            salida := false;
        END IF;
        COMMIT WORK;
        
        /* Mostrar resultado de la prueba */
        dbms_output.put_line(nombrePrueba || ':' || ASSERT_EQUALS(salida, salidaEsperada));
        
        EXCEPTION
        WHEN OTHERS THEN
            dbms_output.put_line(nombrePrueba || ':' || ASSERT_EQUALS(false, salidaEsperada));
            ROLLBACK;
        
    END eliminar;

END;    
           
/
    
--Tabla Pedidos
create or replace PACKAGE BODY PRUEBAS_PEDIDOS AS
    /* INICIALIZACIÓN */
    PROCEDURE inicializar AS
    BEGIN
        /*Borrar contenido de la tabla*/
        DELETE FROM pedidos;
    END inicializar;

    /* INSERCIÓN */
    PROCEDURE insertar (nombrePrueba VARCHAR2, 
        w_identificador IN pedidos.identificador%TYPE, w_fechaPedido IN pedidos.fechapedido%TYPE, 
        w_dniCliente IN pedidos.dnicliente%TYPE,salidaEsperada BOOLEAN)AS 
        salida BOOLEAN := true;
        pedido pedidos%ROWTYPE;
   
   BEGIN
        /* Insertar Pedido */
        insertar_pedidos(w_identificador, w_fechaPedido, w_dniCliente);
        
        IF(pedido.fechaPedido<>w_fechaPedido)THEN
            salida := false;
        END IF;
       
        IF(pedido.dniCliente<>w_dniCliente)THEN
            salida := false;
        END IF;
        
        COMMIT WORK;
          
        /* Mostrar resultado de la prueba */
        dbms_output.put_line(nombrePrueba || ':' || ASSERT_EQUALS(salida, salidaEsperada));
        EXCEPTION
        WHEN OTHERS THEN
            dbms_output.put_line(nombrePrueba || ':' || ASSERT_EQUALS(false, salidaEsperada));
            ROLLBACK;
      
    END insertar;
            
    /* ACTUALIZACIÓN */      
            
     PROCEDURE actualizar (nombrePrueba VARCHAR2, w_identificador IN pedidos.identificador%TYPE, 
        w_fechaPedido IN pedidos.fechapedido%TYPE, salidaEsperada BOOLEAN) AS 
        salida BOOLEAN := true;
        pedido pedidos%ROWTYPE;
    
    BEGIN
        /* Actualizar pedido */
        UPDATE pedidos SET fechaPedido = w_fechaPedido WHERE identificador = w_identificador;
        
        /* Seleccionar pedido y comprobar que los campos se actualizaron correctamente */
        select * into pedido from pedidos where identificador = w_identificador;
        IF(pedido.fechaPedido<>w_fechaPedido)THEN
            salida := false;
        END IF;
        
        COMMIT WORK;
        
        /* Mostrar resultado de la prueba */
        dbms_output.put_line(nombrePrueba || ':' || ASSERT_EQUALS(salida, salidaEsperada));
        EXCEPTION
        WHEN OTHERS THEN
            dbms_output.put_line(nombrePrueba || ':' || ASSERT_EQUALS(false, salidaEsperada));
            ROLLBACK;
    END actualizar;
    
    PROCEDURE eliminar (nombrePrueba VARCHAR2, w_identificador IN pedidos.identificador%TYPE, 
        salidaEsperada BOOLEAN) AS 
        salida BOOLEAN := true;
        n_pedidos INTEGER;
        
    BEGIN
        /* Eliminar pedido */
        DELETE FROM pedidos where identificador = w_identificador;
        
        /* Verificar que el pedido no se encuentra en la BD */
        select count(*) into n_pedidos from pedidos where identificador = w_identificador;
        IF(n_pedidos <> 0) THEN
            salida := false;
        END IF;
        COMMIT WORK;
        
        /* Mostrar resultado de la prueba */
        dbms_output.put_line(nombrePrueba || ':' || ASSERT_EQUALS(salida, salidaEsperada));
        
        EXCEPTION
        WHEN OTHERS THEN
            dbms_output.put_line(nombrePrueba || ':' || ASSERT_EQUALS(false, salidaEsperada));
            ROLLBACK;
    END eliminar;

END;    
               
/

--Tabla estadística

create or replace PACKAGE BODY PRUEBAS_ESTADISTICAS AS
/* INICIALIZACIÓN */
    PROCEDURE inicializar AS
    BEGIN
        /*Borrar contenido de la tabla*/
        DELETE FROM estadisticas;
    END inicializar;

    /* INSERCIÓN */
    PROCEDURE insertar (nombrePrueba VARCHAR2, w_ganado IN Estadisticas.ganado%TYPE, 
        w_tiempoJuego IN Estadisticas.tiempoDeJuego%TYPE, w_valoracion IN Estadisticas.valoracion%TYPE,
        salidaEsperada BOOLEAN) AS 
        salida BOOLEAN := true;
        estadistica estadisticas%ROWTYPE;
        w_oid_e NUMBER;
   
   BEGIN
        /* Insertar estadistica */
        insertar_estadisticas(w_ganado, w_tiempoJuego, w_valoracion);
        
        /* Seleccionar estadistica y comprobar que los datos se han insertado correctamente */
        w_oid_e := sec_oid_e.currval;
        select * into estadistica FROM estadisticas WHERE estadisticas.oid_e = w_oid_e;
        
        IF(estadistica.ganado<>w_ganado)THEN
            salida := false;
        END IF;
        
        IF(estadistica.tiempoDeJuego<>w_tiempoJuego)THEN
            salida := false;
        END IF;
        
        IF(estadistica.valoracion<>w_valoracion)THEN
            salida := false;
        END IF;
        
        COMMIT WORK;
        
        /* Mostrar resultado de la prueba */
        dbms_output.put_line(nombrePrueba || ':' || ASSERT_EQUALS(salida, salidaEsperada));
        
        EXCEPTION
        WHEN OTHERS THEN
            dbms_output.put_line(nombrePrueba || ':' || ASSERT_EQUALS(false, salidaEsperada));
            ROLLBACK;
    END insertar;
            
    /* ACTUALIZACIÓN */      
            
     PROCEDURE actualizar (nombrePrueba VARCHAR2,w_oid_e IN Estadisticas.OID_E%TYPE,
        w_ganado IN Estadisticas.ganado%TYPE,w_tiempoJuego IN Estadisticas.tiempoDeJuego%TYPE,
        w_valoracion IN Estadisticas.valoracion%TYPE,salidaEsperada BOOLEAN ) AS 
        salida BOOLEAN := true;
        estadistica estadisticas%ROWTYPE;
    
    BEGIN
        /* Actualizar estadistica */
        UPDATE estadisticas SET ganado = w_ganado, tiempoDeJuego = w_tiempoJuego, valoracion = w_valoracion
        WHERE oid_e = w_oid_e;
        
        /* Seleccionar estadistica y comprobar que los campos se actualizaron correctamente */
        select * into estadistica from estadisticas where oid_e = w_oid_e;
        IF(estadistica.ganado<>w_ganado)THEN
            salida := false;
        END IF;
        
        IF(estadistica.tiempoDeJuego<>w_tiempoJuego)THEN
            salida := false;
        END IF;
        
        IF(estadistica.valoracion<>w_valoracion)THEN
            salida := false;
        END IF;
        
        COMMIT WORK;
        
        /* Mostrar resultado de la prueba */
        dbms_output.put_line(nombrePrueba || ':' || ASSERT_EQUALS(salida, salidaEsperada));
        
        EXCEPTION
        WHEN OTHERS THEN
            dbms_output.put_line(nombrePrueba || ':' || ASSERT_EQUALS(false, salidaEsperada));
            ROLLBACK;
    END actualizar;
    
    PROCEDURE eliminar (nombrePrueba VARCHAR2, w_oid_e IN estadisticas.oid_e%TYPE, 
        salidaEsperada BOOLEAN) AS 
        salida BOOLEAN := true;
        n_estadisticas INTEGER;
        
    BEGIN
        /* Eliminar estadistica */
        DELETE FROM estadisticas where oid_e = w_oid_e;
        
        /* Verificar que la estadistica no se encuentra en la BD */
        select count(*) into n_estadisticas from estadisticas where oid_e = w_oid_e;
        IF(n_estadisticas <> 0) THEN
            salida := false;
        END IF;
        COMMIT WORK;
        
        /* Mostrar resultado de la prueba */
        dbms_output.put_line(nombrePrueba || ':' || ASSERT_EQUALS(salida, salidaEsperada));
        
        EXCEPTION
        WHEN OTHERS THEN
            dbms_output.put_line(nombrePrueba || ':' || ASSERT_EQUALS(false, salidaEsperada));
            ROLLBACK;
    END eliminar;

END;    
        
        
/

--Tabla ojeador

create or replace PACKAGE BODY PRUEBAS_OJEADORES AS
    /* INICIALIZACIÓN */
    PROCEDURE inicializar AS
    BEGIN
        /*Borrar contenido de la tabla*/
        DELETE FROM videojuegos;
    END inicializar;

    /* INSERCIÓN */
    PROCEDURE insertar (nombrePrueba VARCHAR2, 
        w_dniOjeador IN Ojeadores.dniOjeador%TYPE, w_nombreOjeador IN Ojeadores.nombreOjeador%TYPE,
        w_salarioOjeador IN Ojeadores.salarioOjeador%TYPE,w_numTelefonoOjeador IN Ojeadores.numTelefonoOjeador%TYPE,
        w_numAñosExperienciaOjeador IN Ojeadores.numAñosExperienciaOjeador%TYPE,
        w_correoElectronicoOjeador IN Ojeadores.correoElectronicoOjeador%TYPE,
        w_nacionalidadOjeador IN Ojeadores.nacionalidadOjeador%TYPE,w_OID_V IN Ojeadores.OID_V%TYPE,
        salidaEsperada BOOLEAN) AS 
        salida BOOLEAN := true;
        ojeador ojeadores%ROWTYPE;
   
   BEGIN
        /* Insertar ojeador */
       insertar_ojeadores(w_dniOjeador,w_nombreOjeador,w_salarioOjeador,w_numTelefonoOjeador,
       w_numAñosExperienciaOjeador,w_correoElectronicoOjeador,w_nacionalidadOjeador,w_OID_V);
    
        /* Seleccionar ojeador y comprobar que los datos se han insertado correctamente */
       
        select * into ojeador FROM ojeadores WHERE ojeadores.dniOjeador = w_dniOjeador;
        IF(ojeador.nombreOjeador<>w_nombreOjeador)THEN
            salida := false;
        END IF;
        
        IF(ojeador.salarioOjeador<>w_salarioOjeador)THEN
            salida := false;
        END IF;
        
        IF(ojeador.numTelefonoOjeador<>w_numTelefonoOjeador)THEN
            salida := false;
        END IF;
        
        IF(ojeador.numAñosExperienciaOjeador<>w_numAñosExperienciaOjeador)THEN
            salida := false;
        END IF;
        
        IF(ojeador.correoElectronicoOjeador<>w_correoElectronicoOjeador)THEN
            salida := false;
        END IF;
        
        IF(ojeador.nacionalidadOjeador<>w_nacionalidadOjeador)THEN
            salida := false;
        END IF;
        
        IF(ojeador.oid_v<>w_oid_v)THEN
            salida := false;
        END IF;
        
        COMMIT WORK;
        
        /* Mostrar resultado de la prueba */
        dbms_output.put_line(nombrePrueba || ':' || ASSERT_EQUALS(salida, salidaEsperada));
        
        EXCEPTION
        WHEN OTHERS THEN
            dbms_output.put_line(nombrePrueba || ':' || ASSERT_EQUALS(false, salidaEsperada));
            ROLLBACK;
    END insertar;
            
    /* ACTUALIZACIÓN */      
            
     PROCEDURE actualizar (nombrePrueba VARCHAR2, 
        w_dniOjeador IN Ojeadores.dniOjeador%TYPE,
        w_nombreOjeador IN Ojeadores.nombreOjeador%TYPE,
        w_salarioOjeador IN Ojeadores.salarioOjeador%TYPE,
        w_numTelefonoOjeador IN Ojeadores.numTelefonoOjeador%TYPE,
        w_numAñosExperienciaOjeador IN Ojeadores.numAñosExperienciaOjeador%TYPE,
        w_correoElectronicoOjeador IN Ojeadores.correoElectronicoOjeador%TYPE,
        w_nacionalidadOjeador IN Ojeadores.nacionalidadOjeador%TYPE,
        salidaEsperada BOOLEAN) AS 
        salida BOOLEAN := true;
        ojeador ojeadores%ROWTYPE;
    
    BEGIN
        /* Actualizar ojeador */
        UPDATE ojeadores SET nombreOjeador = w_nombreOjeador, salarioOjeador = w_salarioOjeador, 
        numTelefonoOjeador = w_numTelefonoOjeador, numAñosExperienciaOjeador = w_numAñosExperienciaOjeador,
        correoElectronicoOjeador = w_correoElectronicoOjeador, nacionalidadOjeador = w_nacionalidadOjeador
        WHERE dniOjeador = w_dniOjeador;
        
        /* Seleccionar ojeador y comprobar que los campos se actualizaron correctamente */
        select * into ojeador from ojeadores where dniOjeador = w_dniOjeador;
        IF(ojeador.nombreOjeador<>w_nombreOjeador)THEN
            salida := false;
        END IF;
        
        IF(ojeador.salarioOjeador<>w_salarioOjeador)THEN
            salida := false;
        END IF;
        
        IF(ojeador.numTelefonoOjeador<>w_numTelefonoOjeador)THEN
            salida := false;
        END IF;
        
        IF(ojeador.numAñosExperienciaOjeador<>w_numAñosExperienciaOjeador)THEN
            salida := false;
        END IF;
        
        IF(ojeador.correoElectronicoOjeador<>w_correoElectronicoOjeador)THEN
            salida := false;
        END IF;
        
        IF(ojeador.nacionalidadOjeador<>w_nacionalidadOjeador)THEN
            salida := false;
        END IF;
        
        COMMIT WORK;
        
        /* Mostrar resultado de la prueba */
        dbms_output.put_line(nombrePrueba || ':' || ASSERT_EQUALS(salida, salidaEsperada));
        EXCEPTION
        WHEN OTHERS THEN
            dbms_output.put_line(nombrePrueba || ':' || ASSERT_EQUALS(false, salidaEsperada));
            ROLLBACK;
    
    END actualizar;
    
    PROCEDURE eliminar (nombrePrueba VARCHAR2, 
        w_dniOjeador IN Ojeadores.dniOjeador%TYPE,
        salidaEsperada BOOLEAN) AS 
        salida BOOLEAN := true;
        n_ojeadores INTEGER;
        
    BEGIN
        /* Eliminar ojeador */
        DELETE FROM ojeadores where dniOjeador = w_dniOjeador;
        
        /* Verificar que el ojeador no se encuentra en la BD */
        select count(*) into n_ojeadores from ojeadores where dniOjeador = w_dniOjeador;
        IF(n_ojeadores <> 0) THEN
            salida := false;
        END IF;
        COMMIT WORK;
        
        /* Mostrar resultado de la prueba */
        dbms_output.put_line(nombrePrueba || ':' || ASSERT_EQUALS(salida, salidaEsperada));
        
        EXCEPTION
        WHEN OTHERS THEN
            dbms_output.put_line(nombrePrueba || ':' || ASSERT_EQUALS(false, salidaEsperada));
            ROLLBACK;
    END eliminar;

END;    
        
        
/

--Tabla encuesta

create or replace PACKAGE BODY PRUEBAS_ENCUESTAS AS
    /* INICIALIZACIÓN */
    PROCEDURE inicializar AS
    BEGIN
        /*Borrar contenido de la tabla*/
        DELETE FROM encuestas;
    END inicializar;

    /* INSERCIÓN */
    PROCEDURE insertar (nombrePrueba VARCHAR2, 
        w_fechaInicio IN Encuestas.fechaInicio%TYPE,w_fechaFin IN Encuestas.fechaFin%TYPE,
        w_tipo IN Encuestas.tipo%TYPE,w_nombreVirtualRed IN Encuestas.nombreVirtualRed%TYPE, 
        w_tipoRed IN Encuestas.tipoRed%TYPE, salidaEsperada BOOLEAN) AS 
        salida BOOLEAN := true;
        encuesta encuestas%ROWTYPE;
        w_oid_en NUMBER;
   
   BEGIN
        /* Insertar Encuesta */
       INSERT INTO encuestas values (SEC_OID_EN.nextval, w_fechaInicio,w_fechaFin, w_tipo, w_nombreVirtualRed, 
        w_tipoRed);
    
        /* Seleccionar encuesta y comprobar que los datos se han insertado correctamente */
        w_oid_en := sec_oid_en.currval;
        select * into encuesta FROM encuestas WHERE encuestas.oid_en = w_oid_en;
        IF(encuesta.fechaInicio<>w_fechaInicio)THEN
            salida := false;
        END IF;
        
        IF(encuesta.fechafin<>w_fechaFin)THEN
            salida := false;
        END IF;
        
        IF(encuesta.tipo<>w_tipo)THEN
            salida := false;
        END IF;
        
        IF(encuesta.nombreVirtualRed<>w_nombreVirtualRed)THEN
            salida := false;
        END IF;
        
        IF(encuesta.tipoRed<>w_tipoRed)THEN
            salida := false;
        END IF;
        
        COMMIT WORK;
        
        /* Mostrar resultado de la prueba */
        dbms_output.put_line(nombrePrueba || ':' || ASSERT_EQUALS(salida, salidaEsperada));
        
        EXCEPTION
        WHEN OTHERS THEN
            dbms_output.put_line(nombrePrueba || ':' || ASSERT_EQUALS(false, salidaEsperada));
            ROLLBACK;
    END insertar;
            
    /* ACTUALIZACIÓN */      
            
     PROCEDURE actualizar (nombrePrueba VARCHAR2, w_oid_en IN Encuestas.oid_en%TYPE, 
        w_fechaInicio IN Encuestas.fechaInicio%TYPE,w_fechaFin IN Encuestas.fechaFin%TYPE,
        w_tipo IN Encuestas.tipo%TYPE, salidaEsperada BOOLEAN) AS 
        salida BOOLEAN := true;
        encuesta encuestas%ROWTYPE;
    
    BEGIN
        /* Actualizar encuesta */
        UPDATE encuestas SET fechaInicio = w_fechaInicio, fechaFin = w_fechaFin, tipo = w_tipo
        WHERE oid_en = w_oid_en;
        
        /* Seleccionar encuesta y comprobar que los campos se actualizaron correctamente */
        select * into encuesta from encuestas where oid_en = w_oid_en;
         IF(encuesta.fechaInicio<>w_fechaInicio)THEN
            salida := false;
        END IF;
        
        IF(encuesta.fechafin<>w_fechaFin)THEN
            salida := false;
        END IF;
        
        IF(encuesta.tipo<>w_tipo)THEN
            salida := false;
        END IF;
        
        COMMIT WORK;
        
        /* Mostrar resultado de la prueba */
        dbms_output.put_line(nombrePrueba || ':' || ASSERT_EQUALS(salida, salidaEsperada));
        
        EXCEPTION
        WHEN OTHERS THEN
            dbms_output.put_line(nombrePrueba || ':' || ASSERT_EQUALS(false, salidaEsperada));
            ROLLBACK;
    END actualizar;
    
    PROCEDURE eliminar (nombrePrueba VARCHAR2,
        w_oid_en IN encuestas.oid_en%TYPE,
        salidaEsperada BOOLEAN) AS 
        salida BOOLEAN := true;
        n_encuestas INTEGER;
        
    BEGIN
        /* Eliminar encuesta */
        DELETE FROM encuestas where oid_en = w_oid_en;
        
        /* Verificar que la encuesta no se encuentra en la BD */
        select count(*) into n_encuestas from encuestas where oid_en = w_oid_en;
        IF(n_encuestas <> 0) THEN
            salida := false;
        END IF;
        COMMIT WORK;
        
        /* Mostrar resultado de la prueba */
        dbms_output.put_line(nombrePrueba || ':' || ASSERT_EQUALS(salida, salidaEsperada));
        
        EXCEPTION
        WHEN OTHERS THEN
            dbms_output.put_line(nombrePrueba || ':' || ASSERT_EQUALS(false, salidaEsperada));
            ROLLBACK;
    END eliminar;

END;    
        
/

--Tabla producto

create or replace PACKAGE BODY PRUEBAS_PRODUCTOS AS
    /* INICIALIZACIÓN */
    PROCEDURE inicializar AS
    BEGIN
        /*Borrar contenido de la tabla*/
        DELETE FROM productos;
    END inicializar;

    /* INSERCIÓN */
    PROCEDURE insertar (nombrePrueba VARCHAR2, 
        w_nombreProducto IN Productos.nombreProducto%TYPE,w_precio IN Productos.precio%TYPE,
        w_stock IN Productos.stock%TYPE,w_descripcion IN Productos.descripcion%TYPE,
        w_tipoProducto IN Productos.tipoProducto%TYPE,w_OID_V IN Productos.OID_V%TYPE,
        salidaEsperada BOOLEAN) AS 
        salida BOOLEAN := true;
        producto productos%ROWTYPE;
   
   BEGIN
        /* Insertar producto */
       INSERT INTO productos values (w_nombreProducto, w_precio, w_stock, w_descripcion, w_tipoProducto, w_OID_V);
    
        /* Seleccionar producto y comprobar que los datos se han insertado correctamente */
        select * into producto FROM productos WHERE productos.nombreProducto = w_nombreProducto;
        IF(producto.precio<>w_precio)THEN
            salida := false;
        END IF;
        
        IF(producto.stock<>w_stock)THEN
            salida := false;
        END IF;
        
        IF(producto.descripcion<>w_descripcion)THEN
            salida := false;
        END IF;
        
        IF(producto.tipoProducto<>w_tipoProducto)THEN
            salida := false;
        END IF;
        
        IF(producto.OID_V<>w_OID_V)THEN
            salida := false;
        END IF;
        
        COMMIT WORK;
        
        /* Mostrar resultado de la prueba */
        dbms_output.put_line(nombrePrueba || ':' || ASSERT_EQUALS(salida, salidaEsperada));
        EXCEPTION
        WHEN OTHERS THEN
            dbms_output.put_line(nombrePrueba || ':' || ASSERT_EQUALS(false, salidaEsperada));
            ROLLBACK;
        
    END insertar;
            
    /* ACTUALIZACIÓN */      
            
     PROCEDURE actualizar (nombrePrueba VARCHAR2,
        w_nombreProducto IN Productos.nombreProducto%TYPE,
        w_precio IN Productos.precio%TYPE,
        w_stock IN Productos.stock%TYPE,
        w_descripcion IN Productos.descripcion%TYPE,
        w_tipoProducto IN Productos.tipoProducto%TYPE,
        salidaEsperada BOOLEAN) AS 
        salida BOOLEAN := true;
        producto productos%ROWTYPE;
    
    BEGIN
        /* Actualizar producto */
        UPDATE productos SET precio = w_precio, stock = w_stock, descripcion = w_descripcion, tipoProducto = w_tipoProducto 
        WHERE nombreProducto = w_nombreProducto;
        
        /* Seleccionar producto y comprobar que los campos se actualizaron correctamente */
        select * into producto from productos where nombreProducto = w_nombreProducto;
        IF(producto.precio<>w_precio)THEN
            salida := false;
        END IF;
        
        IF(producto.stock<>w_stock)THEN
            salida := false;
        END IF;
        
        IF(producto.descripcion<>w_descripcion)THEN
            salida := false;
        END IF;
        
        IF(producto.tipoProducto<>w_tipoProducto)THEN
            salida := false;
        END IF;
        
       
        COMMIT WORK;
        
        /* Mostrar resultado de la prueba */
        dbms_output.put_line(nombrePrueba || ':' || ASSERT_EQUALS(salida, salidaEsperada));
        
        EXCEPTION
        WHEN OTHERS THEN
            dbms_output.put_line(nombrePrueba || ':' || ASSERT_EQUALS(false, salidaEsperada));
            ROLLBACK;
    END actualizar;
    
    PROCEDURE eliminar (nombrePrueba VARCHAR2,
        w_nombreProducto IN Productos.nombreProducto%TYPE,
        salidaEsperada BOOLEAN) AS 
        salida BOOLEAN := true;
        n_productos INTEGER;
        
    BEGIN
        /* Eliminar producto */
        DELETE FROM productos where nombreProducto = w_nombreProducto;
        
        /* Verificar que el producto no se encuentra en la BD */
        select count(*) into n_productos from productos where nombreProducto = w_nombreProducto;
        IF(n_productos <> 0) THEN
            salida := false;
        END IF;
        COMMIT WORK;
        
        /* Mostrar resultado de la prueba */
        dbms_output.put_line(nombrePrueba || ':' || ASSERT_EQUALS(salida, salidaEsperada));
        
        EXCEPTION
        WHEN OTHERS THEN
            dbms_output.put_line(nombrePrueba || ':' || ASSERT_EQUALS(false, salidaEsperada));
            ROLLBACK;
    END eliminar;

END;    
        
        
/

--Tabla Cliente

create or replace PACKAGE BODY PRUEBAS_CLIENTES AS
    /* INICIALIZACIÓN */
    PROCEDURE inicializar AS
    BEGIN
        /*Borrar contenido de la tabla*/
        DELETE FROM clientes;
    END inicializar;

    /* INSERCIÓN */
    PROCEDURE insertar (nombrePrueba VARCHAR2, 
        w_dniCliente IN Clientes.dniCliente%TYPE,
        w_nombreCompleto IN Clientes.nombreCompleto%TYPE,
        w_numTelefonoCliente IN Clientes.numTelefonoCliente%TYPE,
        w_correoCliente IN Clientes.correoCliente%TYPE,
        salidaEsperada BOOLEAN) AS 
        salida BOOLEAN := true;
        cliente clientes%ROWTYPE;
   
   BEGIN
        /* Insertar cliente */
        insertar_clientes(w_dnicliente,w_nombreCompleto, w_numTelefonoCliente, w_correoCliente);
        
        /* Seleccionar cliente y comprobar que los datos se han insertado correctamente */
        select * into cliente FROM clientes WHERE clientes.dniCliente = w_dniCliente;
        IF(cliente.nombreCompleto<>w_nombreCompleto)THEN
            salida := false;
        END IF;
        
        IF(cliente.numTelefonoCliente<>w_numTelefonoCliente)THEN
            salida := false;
        END IF;
        
        IF(cliente.correoCliente<>w_correoCliente)THEN
            salida := false;
        END IF;
        
        COMMIT WORK;
        
        /* Mostrar resultado de la prueba */
        dbms_output.put_line(nombrePrueba || ':' || ASSERT_EQUALS(salida, salidaEsperada));
        EXCEPTION
        WHEN OTHERS THEN
            dbms_output.put_line(nombrePrueba || ':' || ASSERT_EQUALS(false, salidaEsperada));
            ROLLBACK;
        
    END insertar;
            
    /* ACTUALIZACIÓN */      
        
     PROCEDURE actualizar (nombrePrueba VARCHAR2, 
        w_dniCliente IN Clientes.dniCliente%TYPE,
        w_nombreCompleto IN Clientes.nombreCompleto%TYPE,
        w_numTelefonoCliente IN Clientes.numTelefonoCliente%TYPE,
        w_correoCliente IN Clientes.correoCliente%TYPE,
        salidaEsperada BOOLEAN) AS 
        salida BOOLEAN := true;
        cliente clientes%ROWTYPE;
    
    BEGIN
        /* Actualizar cliente */
        UPDATE clientes SET nombreCompleto = w_nombreCompleto, 
        numTelefonoCliente = w_numTelefonoCliente, correoCliente = w_correoCliente
        WHERE dniCliente = w_dniCliente;
        
        /* Seleccionar cliente y comprobar que los campos se actualizaron correctamente */
        select * into cliente from clientes where dniCliente = w_dniCliente;
        IF(cliente.nombreCompleto<>w_nombreCompleto)THEN
            salida := false;
        END IF;
        
        IF(cliente.numTelefonoCliente<>w_numTelefonoCliente)THEN
            salida := false;
        END IF;
        
        IF(cliente.correoCliente<>w_correoCliente)THEN
            salida := false;
        END IF;
        COMMIT WORK;
        
        /* Mostrar resultado de la prueba */
        dbms_output.put_line(nombrePrueba || ':' || ASSERT_EQUALS(salida, salidaEsperada));
        
        EXCEPTION
        WHEN OTHERS THEN
            dbms_output.put_line(nombrePrueba || ':' || ASSERT_EQUALS(false, salidaEsperada));
            ROLLBACK;
    END actualizar;
    
    PROCEDURE eliminar (nombrePrueba VARCHAR2,
        w_dniCliente IN Clientes.dniCliente%TYPE,
        salidaEsperada BOOLEAN) AS 
        salida BOOLEAN := true;
        n_clientes INTEGER;
        
    BEGIN
        /* Eliminar cliente */
        DELETE FROM clientes where dniCliente = w_dniCliente;
        
        /* Verificar que el cliente no se encuentra en la BD */
        select count(*) into n_clientes from clientes where dniCliente = w_dniCliente;
        IF(n_clientes <> 0) THEN
            salida := false;
        END IF;
        COMMIT WORK;
        
        /* Mostrar resultado de la prueba */
        dbms_output.put_line(nombrePrueba || ':' || ASSERT_EQUALS(salida, salidaEsperada));
        
        EXCEPTION
        WHEN OTHERS THEN
            dbms_output.put_line(nombrePrueba || ':' || ASSERT_EQUALS(false, salidaEsperada));
            ROLLBACK;
    END eliminar;

END;    
                
/

create or replace package body PRUEBAS_POSIBLESFICHAJES as
    procedure inicializar as
    begin
    delete from posiblesfichajes;
    end inicializar;
    
    procedure insertar (nombrePrueba varchar2,w_nomvirt posiblesfichajes.nombrevirtual%type, 
    w_clau posiblesfichajes.clausula%type,w_co posiblesfichajes.correo%type, 
    w_clu posiblesfichajes.club%type,w_nac posiblesfichajes.nacionalidad%type,w_dni posiblesfichajes.dniojeador%type,
    salidaEsperada boolean) as
    salida boolean:= true;
    posiblefichaje posiblesfichajes%ROWTYPE;
    begin
    --insert into posiblesfichajes values(w_nomvirt,w_clau,w_co,w_clu,w_nac,w_dni);
    insertar_posiblesfichajes(w_nomvirt,w_clau,w_co,w_clu,w_nac,w_dni);
    
    select * into posiblefichaje from posiblesfichajes where posiblesfichajes.nombrevirtual=w_nomvirt;
    
    IF(posiblefichaje.nombrevirtual<> w_nomvirt) then
        salida := false;
    END IF;
    
    IF(posiblefichaje.clausula<> w_clau) then
        salida := false;
    END IF;
    
    IF(posiblefichaje.correo <> w_co) then
        salida := false;
    END IF;
    
    IF(posiblefichaje.club <> w_clu) then
        salida := false;
    END IF;
    
    IF(posiblefichaje.nacionalidad <> w_nac) then
        salida := false;
    END IF;
    
    IF(posiblefichaje.dniOjeador  <> w_dni) then
        salida := false;
    END IF;
    commit work;

    DBMS_OUTPUT.PUT_LINE(nombrePrueba || ': ' || ASSERT_EQUALS(salida,salidaEsperada));

    EXCEPTION
    when others then
        DBMS_OUTPUT.PUT_LINE(nombrePrueba || ': ' || ASSERT_EQUALS(false,salidaEsperada));
    rollback;

    end insertar;
        
    procedure actualizar(nombrePrueba varchar2,w_nomvirt posiblesfichajes.nombrevirtual%type, 
    w_clau posiblesfichajes.clausula%type,w_co posiblesfichajes.correo%type, 
    w_clu posiblesfichajes.club%type,w_nac posiblesfichajes.nacionalidad%type,w_dni posiblesfichajes.dniojeador%type,
    salidaEsperada boolean) as
    salida boolean:= true;
    posiblefichaje posiblesfichajes%rowtype;
    begin 
    update posiblesfichajes set club=w_clu,clausula=w_clau, correo=w_co, nacionalidad=w_nac where dniojeador=w_dni and nombrevirtual=w_nomvirt;
    select * into posiblefichaje from posiblesfichajes where dniojeador=w_dni and nombrevirtual=w_nomvirt;
    
     IF(posiblefichaje.nombrevirtual<> w_nomvirt) then
        salida := false;
    END IF;
    
    IF(posiblefichaje.clausula<> w_clau) then
        salida := false;
    END IF;
    
    IF(posiblefichaje.correo <> w_co) then
        salida := false;
    END IF;
    
    IF(posiblefichaje.club <> w_clu) then
        salida := false;
    END IF;
    
    IF(posiblefichaje.nacionalidad <> w_nac) then
        salida := false;
    END IF;
    
    IF(posiblefichaje.dniOjeador  <> w_dni) then
        salida := false;
    END IF;
    commit work;
    DBMS_OUTPUT.PUT_LINE(nombrePrueba || ': ' || ASSERT_EQUALS(salida,salidaEsperada));
    
    exception
    when others then
        DBMS_OUTPUT.PUT_LINE(nombrePrueba || ': ' || ASSERT_EQUALS(false,salidaEsperada));
        rollback;
    
    end actualizar;
    
    procedure eliminar(nombrePrueba varchar2,w_nomvirt posiblesfichajes.nombrevirtual%type,
    w_dni posiblesfichajes.dniojeador%type,salidaEsperada boolean)as
    salida boolean := true;
    cnt integer;
    
    begin
    delete from posiblesfichajes where posiblesfichajes.nombrevirtual=w_nomvirt and posiblesfichajes.dniojeador=w_dni;
    select count(*) into cnt from posiblesfichajes where nombrevirtual=w_nomvirt and posiblesfichajes.dniojeador=w_dni;
    
    IF(cnt<>0) then
        salida:=false;
    END IF;
    commit work;
     
    DBMS_OUTPUT.PUT_LINE(nombrePrueba || ': ' || ASSERT_EQUALS(salida,salidaEsperada));
    
    exception
    when others then
        DBMS_OUTPUT.PUT_LINE(nombrePrueba || ': ' || ASSERT_EQUALS(false,salidaEsperada));
    rollback;
    
    end eliminar;
    end PRUEBAS_POSIBLESFICHAJES;
    
   /
 
create or replace 
package body PRUEBAS_ENTRENADORES as
    procedure inicializar as
    begin
    delete from entrenadores;
    end inicializar;
    
   procedure insertar (nombrePrueba varchar2,w_dni entrenadores.dnientrenador%type,
   w_nom entrenadores.nombreentrenador%type,w_sal entrenadores.salarioentrenador%type,w_num entrenadores.numtelefonoentrenador%type,
   w_anios entrenadores.numañosexperienciaentrenador%type,
   w_corr entrenadores.correoelectronicoentrenador%type,w_nac entrenadores.nacionalidadentrenador%type,
   w_oid_v entrenadores.oid_v%type,salidaEsperada boolean) as

    salida boolean:= true;
    entrenador entrenadores%ROWTYPE;
    begin
    --insert into entrenadores values(w_dni,w_nom, w_sal,w_num,w_anios,w_corr,w_nac,w_oid_v);
    insertar_entrenadores(w_dni,w_nom,w_sal,w_num,w_anios,w_corr,w_nac,w_oid_v);
    
    select * into entrenador from entrenadores where entrenadores.dnientrenador=w_dni;
    
    IF(entrenador.dnientrenador <> w_dni) then
        salida := false;
    END IF;
    
    IF(entrenador.nombreentrenador <> w_nom) then
        salida := false;
    END IF;
    
    IF(entrenador.salarioentrenador <> w_sal) then
        salida := false;
    END IF;
    
    IF(entrenador.numTelefonoentrenador <> w_num) then
        salida := false;
    END IF;
    
    IF(entrenador.numAñosExperienciaentrenador <> w_anios) then
        salida := false;
    END IF;
    
    IF(entrenador.correoElectronicoentrenador <> w_corr) then
        salida := false;
    END IF;
    
    IF(entrenador.nacionalidadentrenador <> w_nac) then
        salida := false;
    END IF;
    
    IF(entrenador.oid_v   <> w_oid_v) then
        salida := false;
    END IF;
    commit work;

    DBMS_OUTPUT.PUT_LINE(nombrePrueba || ': ' || ASSERT_EQUALS(salida,salidaEsperada));

    EXCEPTION
    when others then
        DBMS_OUTPUT.PUT_LINE(nombrePrueba || ': ' || ASSERT_EQUALS(false,salidaEsperada));
        rollback;

    end insertar;

    
    procedure actualizar(nombrePrueba varchar2,w_dni entrenadores.dnientrenador%type,
   w_nom entrenadores.nombreentrenador%type,w_sal entrenadores.salarioentrenador%type,w_num entrenadores.numtelefonoentrenador%type,
   w_anios entrenadores.numañosexperienciaentrenador%type,
   w_corr entrenadores.correoelectronicoentrenador%type,w_nac entrenadores.nacionalidadentrenador%type,
   w_oid_v entrenadores.oid_v%type,salidaEsperada boolean) as 
    salida boolean:= true;
    entrenador entrenadores%rowtype;
    
    begin 
    update entrenadores set salarioentrenador=w_sal, nombreentrenador=w_nom, numtelefonoentrenador=w_num, 
    numañosexperienciaentrenador=w_anios, correoelectronicoentrenador=w_corr,nacionalidadentrenador=w_nac, oid_v=w_oid_v
    where dnientrenador=w_dni;
    select * into entrenador from entrenadores where entrenadores.dnientrenador=w_dni;
    
    IF(entrenador.dnientrenador <> w_dni) then
        salida := false;
    END IF;
    
    IF(entrenador.nombreentrenador <> w_nom) then
        salida := false;
    END IF;
    
    IF(entrenador.salarioentrenador <> w_sal) then
        salida := false;
    END IF;
    
    IF(entrenador.numTelefonoentrenador <> w_num) then
        salida := false;
    END IF;
    
    IF(entrenador.numAñosExperienciaentrenador <> w_anios) then
        salida := false;
    END IF;
    
    IF(entrenador.correoElectronicoentrenador <> w_corr) then
        salida := false;
    END IF;
    
    IF(entrenador.nacionalidadentrenador <> w_nac) then
        salida := false;
    END IF;
    
    IF(entrenador.oid_v   <> w_oid_v) then
        salida := false;
    END IF;
    commit work;
    DBMS_OUTPUT.PUT_LINE(nombrePrueba || ': ' || ASSERT_EQUALS(salida,salidaEsperada));
    
    exception
    when others then
        DBMS_OUTPUT.PUT_LINE(nombrePrueba || ': ' || ASSERT_EQUALS(false,salidaEsperada));
        rollback;
    
    end actualizar;
    
    procedure eliminar(nombrePrueba varchar2,w_dni entrenadores.dnientrenador%type,salidaEsperada boolean) as
    salida boolean := true;
    cnt integer;
    begin
    delete from entrenadores where dnientrenador=w_dni;
    select count(*) into cnt from entrenadores where dnientrenador=w_dni;
    IF(cnt<>0) then
        salida:=false;
    END IF;
    commit work;
     
    DBMS_OUTPUT.PUT_LINE(nombrePrueba || ': ' || ASSERT_EQUALS(salida,salidaEsperada));
    
    exception
    when others then
        DBMS_OUTPUT.PUT_LINE(nombrePrueba || ': ' || ASSERT_EQUALS(false,salidaEsperada));
    rollback;
    
    end eliminar;
    
    
    end PRUEBAS_ENTRENADORES;

/ 

create or replace 
package body PRUEBAS_COMPETICIONES as
    procedure inicializar as
    begin
    delete from competiciones;
    end inicializar;
    
   procedure insertar (nombrePrueba varchar2,w_nom competiciones.nombrecompeticion%type, w_pre competiciones.premio%type,
    w_fec competiciones.fechacompeticion%type,w_cost competiciones.costeinscripcion%type,w_gan competiciones.ganada%type,salidaEsperada boolean)as 
    salida boolean:= true;
    competicion competiciones%ROWTYPE;
    w_oid_c competiciones.oid_com%type;
    
    begin
    insertar_competiciones(w_nom,w_pre,w_fec,w_cost,w_gan);
    w_oid_c:=sec_oid_com.currval;
   
    select * into competicion from competiciones where oid_com=w_oid_c;
    
    IF(competicion.oid_com<> w_oid_c) then
        salida := false;
    END IF;
    
    IF(competicion.nombrecompeticion<> w_nom) then
        salida := false;
    END IF;
    
    IF(competicion.premio <> w_pre) then
        salida := false;
    END IF;
    
    IF(competicion.fechacompeticion  <> w_fec) then
        salida := false;
    END IF;
    
    IF(competicion.costeinscripcion  <> w_cost) then
        salida := false;
    END IF;
    
    IF(competicion.ganada   <> w_gan) then
        salida := false;
    END IF;
    commit work;

    DBMS_OUTPUT.PUT_LINE(nombrePrueba || ': ' || ASSERT_EQUALS(salida,salidaEsperada));

    EXCEPTION
    when others then
        DBMS_OUTPUT.PUT_LINE(nombrePrueba || ': ' || ASSERT_EQUALS(false,salidaEsperada));
        rollback;

    end insertar;
    
   procedure actualizar(nombrePrueba varchar2,w_oid_c competiciones.oid_com%type,w_nom competiciones.nombrecompeticion%type, 
    w_pre competiciones.premio%type,w_fec competiciones.fechacompeticion%type,w_cost competiciones.costeinscripcion%type,
    w_gan competiciones.ganada%type,salidaEsperada boolean)  as
    salida boolean:= true;
    competicion competiciones%rowtype;
    begin 
    update competiciones set ganada=w_gan, nombrecompeticion=w_nom,premio=w_pre,fechacompeticion=w_fec,costeinscripcion=w_cost where oid_com=w_oid_c;
    select * into competicion from competiciones where oid_com=w_oid_c;
    
    IF(competicion.oid_com<> w_oid_c) then
        salida := false;
    END IF;
    
    IF(competicion.nombrecompeticion<> w_nom) then
        salida := false;
    END IF;
    
    IF(competicion.premio <> w_pre) then
        salida := false;
    END IF;
    
    IF(competicion.fechacompeticion  <> w_fec) then
        salida := false;
    END IF;
    
    IF(competicion.costeinscripcion  <> w_cost) then
        salida := false;
    END IF;
    
    IF(competicion.ganada   <> w_gan) then
        salida := false;
    END IF;
    
    commit work;
    DBMS_OUTPUT.PUT_LINE(nombrePrueba || ': ' || ASSERT_EQUALS(salida,salidaEsperada));
    
    exception
    when others then
        DBMS_OUTPUT.PUT_LINE(nombrePrueba || ': ' || ASSERT_EQUALS(false,salidaEsperada));
        rollback;
    
    end actualizar;
        
    procedure eliminar(nombrePrueba varchar2,w_oid_c competiciones.oid_com%type,salidaEsperada boolean) as 
    salida boolean := true;
    cnt integer;
    begin
    delete from competiciones where oid_com=w_oid_c;
    select count(*) into cnt from competiciones where oid_com=w_oid_c;
    IF(cnt<>0) then
        salida:=false;
    END IF;
    commit work;
     
    DBMS_OUTPUT.PUT_LINE(nombrePrueba || ': ' || ASSERT_EQUALS(salida,salidaEsperada));
    
    EXCEPTION
    when others then
        DBMS_OUTPUT.PUT_LINE(nombrePrueba || ': ' || ASSERT_EQUALS(false,salidaEsperada));
    rollback;
    
    END eliminar;
    
END PRUEBAS_COMPETICIONES;

/
    
create or replace package body PRUEBAS_JUGADORES as
    procedure inicializar as
    begin
    delete from jugadores;
    end inicializar;

    procedure insertar (nombrePrueba varchar2,w_dni jugadores.dnijugador%type,
    w_nom jugadores.nombrejugador%type, w_sal jugadores.salariojugador%type,
    w_num jugadores.numtelefonojugador%type,w_anios jugadores.numañosexperienciajugador%type
    ,w_corr jugadores.correoelectronicojugador%type,
    w_fec jugadores.fechaentrada%type, w_nomvirt jugadores.nombrevirtualjugador%type,
    w_nmreg jugadores.numregalos%type,w_nac jugadores.nacionalidadjugador%type,
    w_oid_v jugadores.oid_v%type,salidaEsperada boolean) as
    
    salida boolean:= true;
    jugador jugadores%ROWTYPE;
    
    begin
    --insert into jugadores values(w_dni,w_nom, w_sal,w_num,w_anios,w_corr,w_fec, w_nomvirt,w_nmreg,w_nac,w_oid_v);
    insertar_jugadores(w_dni,w_nom,w_sal,w_num,w_anios,w_corr,w_fec,w_nomvirt,w_nmreg,w_nac,w_oid_v);
    
    select * into jugador from jugadores where jugadores.dnijugador=w_dni;

    IF(jugador.dnijugador<> w_dni) then
    salida := false;
    END IF;
    
    IF(jugador.nombrejugador<> w_nom) then
    salida := false;
    END IF;
    
    IF(jugador.salariojugador <> w_sal) then
    salida := false;
    END IF;
    
    IF(jugador.numTelefonojugador  <> w_num) then
    salida := false;
    END IF;
    
    IF(jugador.numAñosExperienciajugador<>w_anios) then
    salida := false;
    END IF;
    
    IF(jugador.correoElectronicojugador<>w_corr) then
    salida := false;
    END IF;
    
    IF(jugador.fechaentrada<>w_fec) then
    salida := false;
    END IF;
    
    IF(jugador.nombrevirtualjugador<>w_nomvirt) then
    salida := false;
    END IF;
    
    IF(jugador.numregalos<>w_nmreg) then
    salida := false;
    END IF;
    
    IF(jugador.nacionalidadjugador<>w_nac) then
    salida := false;
    END IF;
    
    IF(jugador.oid_v<>w_oid_v) then
    salida := false;
    END IF;
    
    commit work;

    DBMS_OUTPUT.PUT_LINE(nombrePrueba || ': ' || ASSERT_EQUALS(salida,salidaEsperada));

    EXCEPTION
    when others then
        DBMS_OUTPUT.PUT_LINE(nombrePrueba || ': ' || ASSERT_EQUALS(false,salidaEsperada));
        rollback;

    END insertar;


    procedure actualizar(nombrePrueba varchar2,w_dni jugadores.dnijugador%type,
    w_nom jugadores.nombrejugador%type, w_sal jugadores.salariojugador%type,
    w_num jugadores.numtelefonojugador%type,w_anios jugadores.numañosexperienciajugador%type
    ,w_corr jugadores.correoelectronicojugador%type,
    w_fec jugadores.fechaentrada%type, w_nomvirt jugadores.nombrevirtualjugador%type,
    w_nmreg jugadores.numregalos%type,w_nac jugadores.nacionalidadjugador%type,
    w_oid_v jugadores.oid_v%type,salidaEsperada boolean) as
    salida boolean:= true;
    jugador jugadores%rowtype;
    begin 
    update jugadores set salariojugador=w_sal,nombrejugador=w_nom, numtelefonojugador=w_num, numañosexperienciajugador=w_anios,
    correoelectronicojugador=w_corr,fechaentrada=w_fec, nombrevirtualjugador =w_nomvirt,numregalos=w_nmreg,nacionalidadjugador=w_nac
    where dnijugador=w_dni;
    select * into jugador from jugadores where jugadores.dnijugador=w_dni;
    IF(jugador.dnijugador<> w_dni) then
    salida := false;
    END IF;
    
    IF(jugador.nombrejugador<> w_nom) then
    salida := false;
    END IF;
    
    IF(jugador.salariojugador <> w_sal) then
    salida := false;
    END IF;
    
    IF(jugador.numTelefonojugador  <> w_num) then
    salida := false;
    END IF;
    
    IF(jugador.numAñosExperienciajugador<>w_anios) then
    salida := false;
    END IF;
    
    IF(jugador.correoElectronicojugador<>w_corr) then
    salida := false;
    END IF;
    
    IF(jugador.fechaentrada<>w_fec) then
    salida := false;
    END IF;
    
    IF(jugador.nombrevirtualjugador<>w_nomvirt) then
    salida := false;
    END IF;
    
    IF(jugador.numregalos<>w_nmreg) then
    salida := false;
    END IF;
    
    IF(jugador.nacionalidadjugador<>w_nac) then
    salida := false;
    END IF;
    
    IF(jugador.oid_v<>w_oid_v) then
    salida := false;
    END IF;

    DBMS_OUTPUT.PUT_LINE(nombrePrueba || ': ' || ASSERT_EQUALS(salida,salidaEsperada));
    
    exception
    when others then
        DBMS_OUTPUT.PUT_LINE(nombrePrueba || ': ' || ASSERT_EQUALS(false,salidaEsperada));
        rollback;

    end actualizar;

    procedure eliminar(nombrePrueba varchar2,w_dni jugadores.dnijugador%type,salidaEsperada boolean) as 
    salida boolean := true;
    cnt integer;
    begin
    delete from jugadores where dnijugador=w_dni;
    select count(*) into cnt from jugadores where dnijugador=w_dni;
    if(cnt<>0) then
    salida:=false;
    end if;
    commit work;
     
    DBMS_OUTPUT.PUT_LINE(nombrePrueba || ': ' || ASSERT_EQUALS(salida,salidaEsperada));
    
    EXCEPTION

    when others then
        DBMS_OUTPUT.PUT_LINE(nombrePrueba || ': ' || ASSERT_EQUALS(false,salidaEsperada));
    rollback;

    end eliminar;

    end PRUEBAS_JUGADORES;
/

    create or replace package body PRUEBAS_ADSCRIPCIONES as
    procedure inicializar as
    begin
    delete from adscripciones;
    END inicializar;
    
    procedure insertar (nombrePrueba varchar2,w_fec adscripciones.fecha%type,
    w_fecbaj adscripciones.fechabaja%type, 
    w_dni adscripciones.dnijugador%type,
    w_oid_com adscripciones.oid_com%type,salidaEsperada boolean) as
    salida boolean:= true;
    w_oid_ad number;
    adscripcion adscripciones%ROWTYPE;
    
    
    begin

    --insert into adscripciones values(SEC_OID_AD.nextval,w_fec,w_fecbaj, w_dni, w_oid_com);
    insertar_adscripciones(w_fec,w_dni,w_oid_com);
    
    w_oid_ad:=sec_oid_ad.currval;
    select * into adscripcion from adscripciones where oid_ad=w_oid_ad;
    
    IF(adscripcion.oid_ad<> w_oid_ad) then
        salida := false;
    END IF;
    
    IF(adscripcion.fecha <> w_fec) then
        salida := false;
    END IF;
    
    IF(adscripcion.fechabaja <> w_fecbaj) then
        salida := false;
    END IF;
    
    IF(adscripcion.dnijugador  <> w_dni) then
        salida := false;
    END IF;
    
    IF(adscripcion.oid_com  <> w_oid_com) then
        salida := false;
    END IF;
    commit work;

    DBMS_OUTPUT.PUT_LINE(nombrePrueba || ': ' || ASSERT_EQUALS(salida,salidaEsperada));

    EXCEPTION
    when others then
        DBMS_OUTPUT.PUT_LINE(nombrePrueba || ': ' || ASSERT_EQUALS(false,salidaEsperada));
    rollback;

    END insertar;
    
    procedure actualizar(nombrePrueba varchar2,w_oid_ad adscripciones.oid_ad%type,w_fec adscripciones.fecha%type,w_fecbaj adscripciones.fechabaja%type, 
    w_dni adscripciones.dnijugador%type,
    w_oid_com adscripciones.oid_com%type,salidaEsperada boolean) as 
    salida boolean:= true;
    adscripcion adscripciones%rowtype;
    
    begin 
    update adscripciones set fecha=w_fec, fechabaja=w_fecbaj, dnijugador=w_dni where oid_ad=w_oid_ad;
    select * into adscripcion from adscripciones where oid_ad=w_oid_ad;
    
    IF(adscripcion.oid_ad<> w_oid_ad) then
        salida := false;
    END IF;
    
    IF(adscripcion.fecha <> w_fec) then
        salida := false;
    END IF;
    
    IF(adscripcion.fechabaja <> w_fecbaj) then
        salida := false;
    END IF;
    
    IF(adscripcion.dnijugador  <> w_dni) then
        salida := false;
    END IF;
    
    IF(adscripcion.oid_com  <> w_oid_com) then
        salida := false;
    END IF;

    
    commit work;
    DBMS_OUTPUT.PUT_LINE(nombrePrueba || ': ' || ASSERT_EQUALS(salida,salidaEsperada));
    
    EXCEPTION
    when others then
        DBMS_OUTPUT.PUT_LINE(nombrePrueba || ': ' || ASSERT_EQUALS(false,salidaEsperada));
        rollback;
    
    END actualizar;
        
    procedure eliminar(nombrePrueba varchar2,w_oid_ad adscripciones.oid_ad%type,salidaEsperada boolean) as

    salida boolean := true;
    cnt integer;
    begin
    delete from adscripciones where oid_ad=w_oid_ad;
    select count(*) into cnt from adscripciones where oid_ad=w_oid_ad;
    
    IF(cnt<>0) then
        salida:=false;
    END IF;
    
    commit work;
     
    DBMS_OUTPUT.PUT_LINE(nombrePrueba || ': ' || ASSERT_EQUALS(salida,salidaEsperada));
    
    exception
    when others then
        DBMS_OUTPUT.PUT_LINE(nombrePrueba || ': ' || ASSERT_EQUALS(false,salidaEsperada));
    rollback;
    
    end eliminar;
    end PRUEBAS_ADSCRIPCIONES;

/
          
    create or replace package body PRUEBAS_REDESSOCIALES as
    procedure inicializar as
    begin
    delete from redessociales;
    end inicializar;
    
    procedure insertar (nombrePrueba varchar2,w_nv redessociales.nombrevirtualred%type,w_fec redessociales.fechacreacionred%type,
    w_nms redessociales.numseguidores%type,w_tipo redessociales.tipored%type, w_dni redessociales.dnijugador%type, 
    w_dni_e redessociales.dnientrenador%type,salidaEsperada boolean)as 
    salida boolean:= true;
    red redessociales%ROWTYPE;

    
    begin
    --insert into redessociales values(w_nv,w_fec,w_nms,w_tipo, w_dni,w_dni_e);
    insertar_redessociales(w_nv,w_fec,w_nms,w_tipo,w_dni,w_dni_e);

    select * into red from redessociales where tipored=w_tipo and nombrevirtualred=w_nv;
    
    IF(red.nombrevirtualred<> w_nv) then
        salida := false;
    END IF;
    
    IF(red.fechacreacionred <> w_fec) then
        salida := false;
    END IF;
    
    IF(red.numseguidores <> w_nms) then
        salida := false;
    END IF;
    
    IF(red.tipored  <> w_tipo) then
        salida := false;
    END IF;
    
    IF(red.dnijugador  <> w_dni) then
        salida := false;
    END IF;
    
    IF(red.dnientrenador  <> w_dni_e) then
        salida := false;
    END IF;
    commit work;

    DBMS_OUTPUT.PUT_LINE(nombrePrueba || ': ' || ASSERT_EQUALS(salida,salidaEsperada));

    exception
    when others then
        DBMS_OUTPUT.PUT_LINE(nombrePrueba || ': ' || ASSERT_EQUALS(false,salidaEsperada));
    rollback;

    end insertar;
    
    procedure actualizar(nombrePrueba varchar2,w_nvirt redessociales.nombrevirtualred%type,w_fec redessociales.fechacreacionred%type,
    w_nms redessociales.numseguidores%type,w_tipo redessociales.tipored%type, w_dni redessociales.dnijugador%type, 
    w_dni_e redessociales.dnientrenador%type,salidaEsperada boolean)as 
    salida boolean:= true;
    red redessociales%rowtype;
    begin 

    update redessociales set numseguidores=w_nms,fechacreacionred=w_fec, dnijugador=w_dni,dnientrenador=w_dni_e where tipored=w_tipo and nombrevirtualred=w_nvirt;
    select * into red from redessociales where tipored=w_tipo and nombrevirtualred=w_nvirt;
    
    IF(red.nombrevirtualred<> w_nvirt) then
        salida := false;
    END IF;
    
    IF(red.fechacreacionred <> w_fec) then
        salida := false;
    END IF;
    
    IF(red.numseguidores <> w_nms) then
        salida := false;
    END IF;
    
    IF(red.tipored  <> w_tipo) then
        salida := false;
    END IF;
    
    IF(red.dnijugador  <> w_dni) then
        salida := false;
    END IF;
    
    IF(red.dnientrenador  <> w_dni_e) then
        salida := false;
    END IF;
    commit work;
    DBMS_OUTPUT.PUT_LINE(nombrePrueba || ': ' || ASSERT_EQUALS(salida,salidaEsperada));
    
    EXCEPTION
    when others then
        DBMS_OUTPUT.PUT_LINE(nombrePrueba || ': ' || ASSERT_EQUALS(false,salidaEsperada));
        rollback;
    
    END actualizar;
        
    procedure eliminar(nombrePrueba varchar2,w_nvirt redessociales.nombrevirtualred%type,w_tipo redessociales.tipored%type,salidaEsperada boolean) as
    salida boolean := true;
    cnt integer;
    begin

    delete from redessociales where tipored=w_tipo and nombrevirtualred=w_nvirt;
    select count(*) into cnt from redessociales where  tipored=w_tipo and nombrevirtualred=w_nvirt;

    IF(cnt<>0) then
        salida:=false;
    END IF;
    
    commit work;
     
    DBMS_OUTPUT.PUT_LINE(nombrePrueba || ': ' || ASSERT_EQUALS(salida,salidaEsperada));
    
    EXCEPTION
    when others then
        DBMS_OUTPUT.PUT_LINE(nombrePrueba || ': ' || ASSERT_EQUALS(false,salidaEsperada));
    rollback;
    
    END eliminar;
    END PRUEBAS_REDESSOCIALES;

/
    

create or replace 
package body PRUEBAS_LINEASDEPEDIDOS as
    procedure inicializar as
    begin
    delete from lineasdepedidos;
    END inicializar;
    
   procedure insertar (nombrePrueba varchar2,w_can lineasdepedidos.cantidad%type,
    w_nom lineasdepedidos.nombreproducto%type,w_id lineasdepedidos.identificador%type,salidaEsperada boolean) as
    salida boolean:= true;
    lp lineasdepedidos%ROWTYPE;
    w_oid_lp lineasdepedidos.oid_lp%type;
    
    begin
    
    --insert into lineasdepedidos values(SEC_OID_LP.nextval,w_can,w_sub,w_nom,w_id);
    insertar_lineasdepedidos(w_can,w_nom,w_id);
    
    w_oid_lp:=sec_oid_lp.currval;
    select * into lp from lineasdepedidos where oid_lp=w_oid_lp;
    
    IF(lp.oid_lp<> w_oid_lp) then
        salida := false;
    END IF;
    
    IF(lp.cantidad <> w_can) then
        salida := false;
    END IF;
    
    IF(lp.nombreproducto  <> w_nom) then
        salida := false;
    END IF;
    
    IF(lp.identificador  <> w_id) then
        salida := false;
    END IF;
    
    commit work;

    DBMS_OUTPUT.PUT_LINE(nombrePrueba || ': ' || ASSERT_EQUALS(salida,salidaEsperada));

    exception
    when others then
        DBMS_OUTPUT.PUT_LINE(nombrePrueba || ': ' || ASSERT_EQUALS(false,salidaEsperada));
    rollback;

    END insertar;
    
    procedure actualizar(nombrePrueba varchar2,w_oid_lp lineasdepedidos.oid_lp%type,w_can lineasdepedidos.cantidad%type,
    w_nom lineasdepedidos.nombreproducto%type,w_id lineasdepedidos.identificador%type,salidaEsperada boolean) as 
    salida boolean:= true;
    lp lineasdepedidos%rowtype;
    
    begin 
    update lineasdepedidos set cantidad=w_can, nombreproducto=w_nom, identificador=w_id where oid_lp=w_oid_lp;
    select * into lp from lineasdepedidos where oid_lp=w_oid_lp;
    
     IF(lp.oid_lp<> w_oid_lp) then
        salida := false;
    END IF;
    
    IF(lp.cantidad <> w_can) then
        salida := false;
    END IF;
    
    IF(lp.nombreproducto  <> w_nom) then
        salida := false;
    END IF;
    
    IF(lp.identificador  <> w_id) then
        salida := false;
    END IF;
    
    commit work;
    DBMS_OUTPUT.PUT_LINE(nombrePrueba || ': ' || ASSERT_EQUALS(salida,salidaEsperada));
    
    EXCEPTION
    when others then
        DBMS_OUTPUT.PUT_LINE(nombrePrueba || ': ' || ASSERT_EQUALS(false,salidaEsperada));
        rollback;
    
    END actualizar;
        
    procedure eliminar
    (nombrePrueba varchar2,w_oid_lp lineasdepedidos.oid_lp%type,salidaEsperada boolean) as
    salida boolean := true;
    cnt integer;
    begin
    delete from lineasdepedidos where oid_lp=w_oid_lp;
    select count(*) into cnt from lineasdepedidos where oid_lp=w_oid_lp;
    
    IF(cnt<>0) then
        salida:=false;
    END IF;
    
    commit work;
     
    DBMS_OUTPUT.PUT_LINE(nombrePrueba || ': ' || ASSERT_EQUALS(salida,salidaEsperada));
    
    EXCEPTION
    when others then
        DBMS_OUTPUT.PUT_LINE(nombrePrueba || ': ' || ASSERT_EQUALS(false,salidaEsperada));
    rollback;
    
    END eliminar;
    
    END PRUEBAS_LINEASDEPEDIDOS;
/

create or replace package body PRUEBAS_PARTIDOS as
    procedure inicializar as
    begin
    delete from partidos;
    end inicializar;
    
    procedure insertar (nombrePrueba varchar2,w_oid_v partidos.oid_v%type,w_com partidos.oid_com%type,w_e partidos.oid_e%type,
    w_lug partidos.lugar%type,w_fec partidos.fechahora%type,w_m partidos.medio%type,salidaEsperada boolean) as
    salida boolean:= true;
    par partidos%ROWTYPE;
    
    begin
   -- insert into partidos values(w_oid_v,w_com,w_e,w_lug,w_fec,w_m);
    insertar_partidos(w_oid_v,w_com,w_e,w_lug,w_fec,w_m);
    
    select * into par from partidos where oid_v=w_oid_v and fechahora=w_fec;
    
    IF(par.oid_v<> w_oid_v) then
        salida := false;
    END IF;
    
    IF(par.oid_com<> w_com) then
        salida := false;
    END IF;
    
    IF(par.oid_e  <> w_e) then
        salida := false;
    END IF;
    
    IF(par.lugar  <> w_lug) then
        salida := false;
    END IF;
    
    IF(par.fechahora  <> w_fec) then
        salida := false;
    END IF;
    
    IF(par.medio  <> w_m) then
        salida := false;
    END IF;
    
    commit work;

    DBMS_OUTPUT.PUT_LINE(nombrePrueba || ': ' || ASSERT_EQUALS(salida,salidaEsperada));

    EXCEPTION
    when others then
        DBMS_OUTPUT.PUT_LINE(nombrePrueba || ': ' || ASSERT_EQUALS(false,salidaEsperada));
    rollback;

    END insertar;
    
    procedure actualizar
         (nombrePrueba varchar2,w_oid_v partidos.oid_v%type,w_com partidos.oid_com%type,w_e partidos.oid_e%type,
    w_lug partidos.lugar%type,w_fec partidos.fechahora%type,w_m partidos.medio%type,salidaEsperada boolean) 
         as salida boolean:= true;
    par partidos%rowtype;
    begin 
    
    update partidos set oid_com=w_com, oid_e=w_e, lugar=w_lug,medio=w_m where oid_v=w_oid_v and fechahora=w_fec;
    select * into par from partidos where oid_v=w_oid_v and fechahora=w_fec;
    
   IF(par.oid_v<> w_oid_v) then
        salida := false;
    END IF;
    
    IF(par.oid_com<> w_com) then
        salida := false;
    END IF;
    
    IF(par.oid_e  <> w_e) then
        salida := false;
    END IF;
    
    IF(par.lugar  <> w_lug) then
        salida := false;
    END IF;
    
    IF(par.fechahora  <> w_fec) then
        salida := false;
    END IF;
    
    IF(par.medio  <> w_m) then
        salida := false;
    END IF;
    
    
    commit work;
    DBMS_OUTPUT.PUT_LINE(nombrePrueba || ': ' || ASSERT_EQUALS(salida,salidaEsperada));
    
    EXCEPTION
    when others then
        DBMS_OUTPUT.PUT_LINE(nombrePrueba || ': ' || ASSERT_EQUALS(false,salidaEsperada));
        rollback;
    
    END actualizar;
        
    PROCEDURE eliminar(nombrePrueba varchar2,w_oid_v partidos.oid_v%type,w_fec partidos.fechahora%type,salidaEsperada boolean) as
    salida boolean := true;
    cnt integer;
    begin
    
    delete from partidos where oid_v=w_oid_v and fechahora=w_fec;
    select count(*) into cnt from partidos where oid_v=w_oid_v and fechahora=w_fec;
    
    IF(cnt<>0) then
        salida:=false;
    END IF;
    commit work;
     
    DBMS_OUTPUT.PUT_LINE(nombrePrueba || ': ' || ASSERT_EQUALS(salida,salidaEsperada));
    
    exception
    when others then
        DBMS_OUTPUT.PUT_LINE(nombrePrueba || ': ' || ASSERT_EQUALS(false,salidaEsperada));
    rollback;
    
    END eliminar;
    
    END PRUEBAS_PARTIDOS;

/