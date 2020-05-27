SET SERVEROUTPUT ON;

DECLARE 
    oid_v INTEGER;
    oid_e INTEGER;
    oid_en INTEGER;
    oid_lp INTEGER;

BEGIN 
    --pruebas_jugadores.insertar('PA-002', '11111111R', 'Carmen García', null, '342534333', null, null, null, null, null, null, 1, false);
    --pruebas_jugadores.insertar('PA-003 (dni repetido)', '80945781H','Felipe Gonzalez',400,'492760429',3,'maldemal@gmail.com','17/01/13','felip234',0,'Uruguay',5,true);
    --pruebas_entrenadores.insertar('PA-002', '29583995Z', 'Caparros', 100, '696111190', 10,'cap@gmail.com','España',1,true);
    --pruebas_entrenadores.insertar('PA-003 (dni repetido)', '29584995Z', 'Maquiavelo', 100, '686111190', 2,'maquiav@gmail.com','España',1,false);
    --pruebas_partidos.insertar('PA-004', 1,1,1,'Pizjuán',null,'Twitch',false);
    --pruebas_partidos.insertar('PA-005', 1,1,17,'Pizjuán',sysdate+1,'Twitch',true);
    --pruebas_partidos.insertar('PA-006', 1,1,18,'Pizjuán','04/06/19 22:13:30,30','Twitch',true);
    --pruebas_estadisticas.insertar('PA-007 - Inserción estadística errónea', null, 65, 6, false);
    --pruebas_videojuegos.insertar('PA-008 - Inserción de videojuego CORRECTA', 'Poker', '22/02/2016', 'PropioDelClub', true);
    --pruebas_videojuegos.insertar('PA-009 - Inserción de videojuego ERRÓNEA', 'Poker', '22/02/2016', 'PropioDelClub', false);
    --pruebas_videojuegos.insertar('PA-010 - Inserción de videojuego sin mostrar la razón de la misma', 'Fifa2', sysdate, null, false);
    --pruebas_encuestas.insertar('PA-012', '13/02/2018', '25/02/2018', null, 'gago', 'Instagram', false);
    --pruebas_encuestas.insertar('PA-013', '13/02/2018', null, 'Popular', 'gago', 'Instagram', false);
    --pruebas_adscripciones.insertar('PA-015',null,null,'10945781A',8,false);
    --pruebas_adscripciones.insertar('PA-016',sysdate,null,'10945781A',8,true);
    --pruebas_adscripciones.insertar('PA-017',sysdate,sysdate-1,'29584995B',8,false);
    --pruebas_ojeadores.insertar('PA-018 - Inserción ojeador incorrecta', '25372533F', 'Manolo', null, '542735413', 15, 'null', 'España', 26, false);
    --pruebas_posiblesfichajes.insertar('PA-020', 'ramonex25',1,null,null,'España','49121212M',true);
    --pruebas_productos.insertar('PA-021', 'Camiseta', 50, 20, 'Camiseta ideal no te arrepentirás!', null, 2, false);
    --pruebas_productos.insertar('PA-022', 'Chapita', 2, 50, 'Un pin bonito precioso', 'Otros', null, true);
    --pruebas_clientes.insertar('PA-023', null, 'JoseJuan', null, null, false);
    --pruebas_pedidos.insertar('PA-024 - Inserción pedido con identificador igual a 1', 1, '30/04/2019', '67263810L', false);
    --pruebas_redessociales.insertar('PA-026','galdayt',sysdate,101,'YouTube','60905000R',null,false);
    --pruebas_redessociales.insertar('PA-027','galdaig',sysdate,53000,'Instagram','60905000R',null,true);
    --pruebas_redessociales.insertar('PA-028','galdared',sysdate,50000,'Reddit','60905000R',null,true);
    --pruebas_posiblesfichajes.eliminar('PA-030', 'Amoledwera','62129212H', true);
    --pruebas_partidos.insertar('PA-031',1,1,19,'La Cartuja','23/12/19 14:13:30,30','Twitch',true);
    --pruebas_partidos.insertar('PA-032',1,1,20,'La Cartuja','23/12/19 13:13:30,30','Twitch',true);
    --pruebas_adscripciones.insertar('PA-035',sysdate,null,'10945781A',13,false);
    --pruebas_adscripciones.insertar('PA-036',sysdate,null,'10945781E',2,true);
    --pruebas_competiciones.actualizar('PA-037 (RN-005))',1,'1',true);
    --pruebas_competiciones.actualizar('PA-038',2,'0',true);
    --pruebas_jugadores.actualizar('PA-039', '10945781A',700,false);
    --pruebas_ojeadores.actualizar('PA-039 (el salario ha aumentado más de un 30%)', '25372533F', 'Manolololo', 2000, '542735413', 15, 'manolito@gmail.com', 'España', false);
    --pruebas_jugadores.actualizar('PA-040', '10945781A',600,true); 
    --pruebas_pedidos.insertar('Insertar pedido','51','06/04/2019','40042388F',true);
    --pruebas_pedidos.insertar('Insertar pedido','52','06/04/2019','40042388F',true);
    --pruebas_pedidos.insertar('Insertar pedido','53','06/04/2019','40042388F',true);
    --pruebas_pedidos.insertar('Insertar pedido','54','06/04/2019','40042388F',true);
    --pruebas_pedidos.insertar('Insertar pedido',50,'06/04/2019','40042388F',true);
    --pruebas_lineasdepedidos.insertar('PA-041',23,'Pegatina LoL',50,true);
    --pruebas_lineasdepedidos.insertar('PA-042',19,'Pegatina LoL',51,true);
    --pruebas_competiciones.insertar('PA-043','FT',2000,sysdate,9999,null,false);
    --pruebas_competiciones.insertar('PA-044','KiyT',2000,sysdate,99,null,true);
    --pruebas_estadisticas.insertar('PA-045 - Inserción estadística errónea', '1', 65, 6, false);
    --pruebas_estadisticas.insertar('PA-046 - Inserción estadística correcta', '1', 40, 1, true);
    --pruebas_lineasdepedidos.insertar('PA-047',2000,'Pegatina LoL',52,false);
    --pruebas_lineasdepedidos.insertar('PA-048',1,'Pegatina LoL',53,true);
    --pruebas_lineasdepedidos.insertar('PA-049',74,'Pegatina LoL',54,true);
    
    --pruebas_ojeadores.insertar('Prueba 1 - Inserción ojeador correcta', '25372533F', 'Manolo', 1000, '542735413', 15, 'manolito@gmail.com', 'España', 2, true);
    --pruebas_ojeadores.actualizar('Prueba 2 - Actualización ojeador correcta', '25372533F', 'Manolo', 1300, '542735413', 15, 'manolito@gmail.com', 'España', true);
    --pruebas_ojeadores.eliminar('Prueba 3 - Eliminar ojeador', '25372533F', true); 
    --pruebas_estadisticas.actualizar('Prueba 4 - Actualización estadística registrada', 17, '1', 65, 3, true);
    --pruebas_estadisticas.actualizar('Prueba 5 - Actualización estadística registrada', 17, '0', 65, 3, true);
    --pruebas_estadisticas.actualizar('Prueba 6 - Actualización estadística no registrada', 19, '1', 65, 3, false);
    --pruebas_estadisticas.eliminar('Prueba 7 - Eliminación estadística existente', 17, true);
    --pruebas_estadisticas.eliminar('Prueba 8 - Eliminación estadística no existente', 20, false);
    --pruebas_competiciones.eliminar('Prueba 9 - Eliminar competiciones',1,true);
    --pruebas_estadisticas.insertar('Prueba 10 - Insertar estadistica','1',60,1, true);
    --pruebas_estadisticas.insertar('Prueba 11 - Insertar estadistica','1',60,1, true);
    --pruebas_encuestas.actualizar('Prueba 12 - Actualización de encuesta', 6, '13/02/2018', '25/02/2018', 'Informativa', true);
    --pruebas_encuestas.eliminar('Prueba 13 - Eliminar encuesta', 1, true);
    --pruebas_posiblesfichajes.eliminar('Prueba 14 - Eliminar posible fichaje inexistente', 'Destroyer','29584995F', false);
    --pruebas_posiblesfichajes.eliminar('Prueba 15 - Eliminar posible fichaje', 'Juan777','92127212K', true);
    --pruebas_productos.insertar('Prueba 16 - Insertar producto', 'Tazaomg', 10, 30, 'Bonita taza de desayuno', 'Otros', 26, true);
    --pruebas_productos.insertar('Prueba 17 - Insertar producto', 'Ratón luces', 50, 20, 'El buen ratón potente', 'Electrónico', 1, true);
    --pruebas_productos.actualizar('Prueba 18 - Actualizar producto', 'Ratón luces', 60, 20, 'El buen ratón potente', 'Electrónico', true);
    --pruebas_productos.eliminar('Prueba 19 - Eliminar producto', 'Ratón luces', true); 
    --pruebas_clientes.insertar('Prueba 20 - Inserción cliente', '37654322S', 'Antonio', '743232323', 'antoñito@gmail.com', true); 
    --pruebas_clientes.actualizar('Prueba 21 - Actualizar cliente', '37654322S', 'Antonio', '743222222', 'antoñito@gmail.com', true);
    --pruebas_pedidos.insertar('Prueba 23 - Inserción pedido', 58, '11/02/2020', '45263455R', true);
    --pruebas_pedidos.insertar('Prueba 24 - Intento de inserción de pedido errónea', null, '06/02/2019', '90022388F', false);
    --pruebas_videojuegos.actualizar('Prueba 25 - Actualización nombre', 15, 'Fifa2.0', '12/12/2012', 'PropioDelClub', true);
    --pruebas_videojuegos.eliminar('Prueba 26 - Eliminar videojuego', 15, true);
    --pruebas_videojuegos.eliminar('Prueba 27 - Eliminar videojuego no existente', 20, false);
    --pruebas_pedidos.actualizar('Prueba 28 - Actualizar pedido existente', 1, '12/02/2018', true);
    --pruebas_pedidos.eliminar('Prueba 29 - Eliminar pedido' , 50, true);    
  
    --pruebas_jugadores.insertar('Insertar jugador (era posible fichaje creado en PA-020)', '49121212M','Ramón Santos',500,'222760423',1,'ramonc@gmail.com','10/01/13','ramonex25',0,'España',8,true);
    --Intentamos eliminar los datos de ese posible fichaje... 
    --pruebas_posiblesfichajes.eliminar('PA-029', 'ramonex25','49121212M', false);
    
    /* ======================================================== */
    /*          ACTUALIZACIÓN Y ELIMINACIÓN DE USUARIOS         */
    /* ======================================================== */
    pruebas_usuarios.insertar('Insertar usuario','29584995A','Manolo Diaz', 'manolo120','man9uel@gmail.com', '20/05/2000','887723461','Pollito22', 'Pollito22', true);
    pruebas_usuarios.insertar('Insertar usuario','29584995B','Lola Suarez', 'lola20','lolasVV@gmail.com', '20/05/2000','887723462','Pollito22', 'Pollito22', true);
    pruebas_usuarios.insertar('Insertar usuario','29584995C','Maria Lara', 'mariaMsV','mariaMsV@gmail.com', '20/05/2000','887723463','Pollito22', 'Pollito22', true);
    pruebas_usuarios.insertar('Insertar usuario','29584995D','Roberto Gutirrez', 'roberttGz','roberttGz@gmail.com', '20/05/2000','887723464','Pollito22', 'Pollito22', true);
    pruebas_usuarios.insertar('Insertar usuario','29584995E','Pepe Lopez', 'ppkma0','ppkma0@gmail.com', '20/05/2000','887723465','Pollito22', 'Pollito22', true);
    pruebas_usuarios.insertar('Insertar usuario','29584995F','Fernando Hidalgo', 'tufer_23','tufer_23@gmail.com', '20/05/2000','887723466','Pollito22', 'Pollito22', true);
    pruebas_usuarios.insertar('Insertar usuario','xxxxxxxxx','ADMIN', 'ADMIN','udconstantina@gmail.com', '01/01/2000','000000000','ADMIN_JHSIJhdskhu65dhUHD76Ahusuhads6', 'ADMIN_JHSIJhdskhu65dhUHD76Ahusuhads6', true);

    pruebas_seguimientos.insertar('Insertar seguimiento','29584995A','10945781A', 'El mejor jugador del mundo', true);
    pruebas_seguimientos.insertar('Insertar seguimiento','29584995A','10945781B', 'Buen partido el de ayer', true);
    pruebas_seguimientos.insertar('Insertar seguimiento','29584995A','10945781C', '-You are the best', true);
    pruebas_seguimientos.insertar('Insertar seguimiento','29584995C','10945781B', 'omg u r amazing!', true);
    pruebas_seguimientos.insertar('Insertar seguimiento','29584995A','10945781D', 'toma toma que bien jugado', true);
    pruebas_seguimientos.insertar('Insertar seguimiento','29584995E','10945781A', 'deberias mejorar no crees?', true);
    pruebas_seguimientos.insertar('Insertar seguimiento','29584995C','10945781D', 'bua que mal todo', true);
    pruebas_seguimientos.insertar('Insertar seguimiento','29584995F','10945781B', 'crushcrushcrush te quiero', true);
    pruebas_seguimientos.insertar('Insertar seguimiento','29584995D','10945781A', 'para mi eres el mejor<3', true);
    pruebas_seguimientos.insertar('Insertar seguimiento','29584995F','20945781F', 'F pero F F', true);


    /*
    (nombrePrueba VARCHAR2,
        w_dniUsuario IN Seguimientos.dniUsuario%TYPE,
        w_dniJugador IN Seguimientos.dniJugador%TYPE,
        w_opinion IN Seguimientos.opinion%TYPE,
        salidaEsperada BOOLEAN)*/
    /*
    nombrePrueba VARCHAR2,
        w_dniUsuario IN Usuarios.dniUsuario%TYPE,
        w_nombre_usuario IN Usuarios.nombreCompletoUsuario%TYPE,
        w_nick_usuario IN Usuarios.nickUsuario%TYPE,
        w_email_usuario IN Usuarios.emailUsuario%TYPE,
        w_fechaNacimientoUsuario IN Usuarios.fechaNacimientoUsuario%TYPE,
        w_num_usuario IN Usuarios.numTelefonoUsuario%TYPE,
        w_passUsuario IN Usuarios.passUsuario%TYPE,
        w_confirmPass IN Usuarios.confirmPassUsuario%TYPE,
        salidaEsperada BOOLEAN
    */
    /*
    pruebas_usuarios.actualizar('Actualizar usuario', '29584995A', 'Alzate', 'alz2010', 'alzate@gmail.com', '696742091', 'Alzatillo23', 'Alzatillo23', true);
    pruebas_usuarios.actualizar('Actualizar usuario', '29584995B', 'Vega', 'vega2010', 'vega@gmail.com', '696742092', 'Veguita23', 'Veguita23', true);
    pruebas_usuarios.actualizar('Actualizar usuario', '29584995C', 'Fali', 'fali2010', 'fali@gmail.com', '696742093', 'Fali23', 'Fali23', true);
    pruebas_usuarios.actualizar('Actualizar usuario', '29584995D', 'Pombo', 'pombo2010', 'pombo@gmail.com', '696742094', 'Pombo23', 'Pombo23', true);
    pruebas_usuarios.actualizar('Actualizar usuario', '29584995E', 'Choco', 'choco2010', 'choco@gmail.com', '696742096', 'Choco23', 'Choco23', true);
    pruebas_usuarios.actualizar('Actualizar usuario', '29584995F', 'Puig', 'puig2010', 'puig@gmail.com', '696742097', 'Puig23', 'Puig23', true);
    pruebas_usuarios.actualizar('Actualizar usuario', '29584995G', 'Rose', 'rose2010', 'rose@gmail.com', '696742098', 'Rose23', 'Rose23', true);
    pruebas_usuarios.actualizar('Actualizar usuario', '29584995H', 'Ben', 'ben2010', 'ben@gmail.com', '696742099', 'Ben23', 'Ben23', true);
    pruebas_usuarios.actualizar('Actualizar usuario', '29584995I', 'Harry', 'harry2010', 'harry@gmail.com', '696742011', 'Harry23', 'Harry23', true);
    pruebas_usuarios.actualizar('Actualizar usuario', '29584995J', 'Kane', 'kane2010', 'kane@gmail.com', '696742021', 'Kane23', 'Kane23', true);
    pruebas_usuarios.actualizar('Actualizar usuario', '29584995K', 'Maguire', 'maguire2010', 'maguire@gmail.com', '696742031', 'Maguire23', 'Maguire23', true);
    pruebas_usuarios.actualizar('Actualizar usuario', '29584995L', 'Joelinton', 'joelinton2010', 'joelinton@gmail.com', '616742098', 'Joelinton23', 'Joelinton23', true);
    pruebas_usuarios.actualizar('Actualizar usuario', '29584995M', 'Ayew', 'ayew2010', 'ayew@gmail.com', '626742099', 'Ayew23', 'Ayew23', true);
    pruebas_usuarios.actualizar('Actualizar usuario', '29584995N', 'Allan', 'allan2010', 'allan@gmail.com', '636742011', 'Allan23', 'Allan23', true);
    pruebas_usuarios.actualizar('Actualizar usuario', '29584995O', 'Milik', 'milik2010', 'milik@gmail.com', '646742021', 'Milik23', 'Milik23', true);
    pruebas_usuarios.actualizar('Actualizar usuario', '29584995P', 'Noble', 'noble2010', 'noble@gmail.com', '656742031', 'Noble23', 'Noble23', true);
    pruebas_usuarios.actualizar('Actualizar usuario', '29584995Q', 'Michail', 'michail2010', 'michail@gmail.com', '666742031', 'Michail23', 'Michail23', true);
    pruebas_usuarios.actualizar('Actualizar usuario', '29584995R', 'Fornals', 'fornals2010', 'fornals@gmail.com', '676742031', 'Fornals23', 'Fornals23', true);
    pruebas_usuarios.actualizar('Actualizar usuario', '29584995S', 'Sissoko', 'sissoko2010', 'sissoko@gmail.com', '686742031', 'Sissoko23', 'Sissoko23', true);
    pruebas_usuarios.actualizar('Actualizar usuario', '29584995T', 'Ten-Hag', 'ten2010', 'tenhag@gmail.com', '696742031', 'Tenhag23', 'Tenhag23', true);


    pruebas_usuarios.eliminar('Eliminar usuario', '29584995A', true);
    pruebas_usuarios.eliminar('Eliminar usuario', '29584995B', true);
    pruebas_usuarios.eliminar('Eliminar usuario', '29584995C', true);
    pruebas_usuarios.eliminar('Eliminar usuario', '29584995D', true);
    pruebas_usuarios.eliminar('Eliminar usuario', '29584995E', true);
    pruebas_usuarios.eliminar('Eliminar usuario', '29584995F', true);
    pruebas_usuarios.eliminar('Eliminar usuario', '29584995G', true);
    pruebas_usuarios.eliminar('Eliminar usuario', '29584995H', true);
    pruebas_usuarios.eliminar('Eliminar usuario', '29584995I', true);
    pruebas_usuarios.eliminar('Eliminar usuario', '29584995J', true);
    pruebas_usuarios.eliminar('Eliminar usuario', '29584995L', true);
    pruebas_usuarios.eliminar('Eliminar usuario', '29584995M', true);
    */


    /* ======================================================== */
    /*        ACTUALIZACIÓN Y ELIMINACIÓN DE SEGUIMIENTOS       */
    /* ======================================================== */
    /*
    pruebas_seguimientos.actualizar('Actualizar seguimiento', 1, 'Good Player', true);
    pruebas_seguimientos.actualizar('Actualizar seguimiento', 2, 'Awesome Player', true);
    pruebas_seguimientos.actualizar('Actualizar seguimiento', 3, 'Nice Player', true);
    pruebas_seguimientos.actualizar('Actualizar seguimiento', 4, 'Incredible Player', true);
    pruebas_seguimientos.actualizar('Actualizar seguimiento', 5, 'Big Player', true);
    pruebas_seguimientos.actualizar('Actualizar seguimiento', 6, 'Intelligent Player', true);
    pruebas_seguimientos.actualizar('Actualizar seguimiento', 7, 'Smart Player', true);
    pruebas_seguimientos.actualizar('Actualizar seguimiento', 8, 'Peaky Player', true); 
    pruebas_seguimientos.actualizar('Actualizar seguimiento', 9, 'Handsome Player', true);
    pruebas_seguimientos.actualizar('Actualizar seguimiento', 10, 'Beautiful Player', true);
    pruebas_seguimientos.actualizar('Actualizar seguimiento', 11, 'Freaking Player', true);
    pruebas_seguimientos.actualizar('Actualizar seguimiento', 12, 'Best Player', true);
    pruebas_seguimientos.actualizar('Actualizar seguimiento', 13, 'OMG', true);
    pruebas_seguimientos.actualizar('Actualizar seguimiento', 14, 'Tall Player', true);
    pruebas_seguimientos.actualizar('Actualizar seguimiento', 15, 'Small Player', true);
    pruebas_seguimientos.actualizar('Actualizar seguimiento', 16, 'Tiny Player', true);
    pruebas_seguimientos.actualizar('Actualizar seguimiento', 17, 'Amazing Player', true);
    pruebas_seguimientos.actualizar('Actualizar seguimiento', 18, 'Marvelous Player', true);
    pruebas_seguimientos.actualizar('Actualizar seguimiento', 19, 'Tactical Player', true);
    pruebas_seguimientos.actualizar('Actualizar seguimiento', 20, 'Heavy Player', true);
    pruebas_seguimientos.actualizar('Actualizar seguimiento', 21, 'Fast Player', true);
    pruebas_seguimientos.actualizar('Actualizar seguimiento', 22, 'Poweful Player', true);
    pruebas_seguimientos.actualizar('Actualizar seguimiento', 23, 'Young Player', true);


    pruebas_seguimientos.eliminar('Eliminar seguimiento', 1, true);
    pruebas_seguimientos.eliminar('Eliminar seguimiento', 2, true);
    pruebas_seguimientos.eliminar('Eliminar seguimiento', 3, true);
    pruebas_seguimientos.eliminar('Eliminar seguimiento', 4, true);
    pruebas_seguimientos.eliminar('Eliminar seguimiento', 5, true);
    pruebas_seguimientos.eliminar('Eliminar seguimiento', 6, true);
    pruebas_seguimientos.eliminar('Eliminar seguimiento', 7, true);
    pruebas_seguimientos.eliminar('Eliminar seguimiento', 8, true);
    pruebas_seguimientos.eliminar('Eliminar seguimiento', 9, true);
    pruebas_seguimientos.eliminar('Eliminar seguimiento', 10, true);
    pruebas_seguimientos.eliminar('Eliminar seguimiento', 11, true);
    pruebas_seguimientos.eliminar('Eliminar seguimiento', 12, true);
    pruebas_seguimientos.eliminar('Eliminar seguimiento', 13, true);
    pruebas_seguimientos.eliminar('Eliminar seguimiento', 14, true);
    pruebas_seguimientos.eliminar('Eliminar seguimiento', 15, true);
    pruebas_seguimientos.eliminar('Eliminar seguimiento', 16, true);
    pruebas_seguimientos.eliminar('Eliminar seguimiento', 17, true);
    pruebas_seguimientos.eliminar('Eliminar seguimiento', 18, true);
    */
END;