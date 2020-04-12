SET SERVEROUTPUT ON;

DECLARE 
    oid_v INTEGER;
    oid_e INTEGER;
    oid_en INTEGER;
    oid_lp INTEGER;
    oid_com INTEGER;
    oid_ad INTEGER;
BEGIN

/* ======================================================== */
/*                  INICIALIZACIÓN DE TABLAS                */
/* ======================================================== */

/*
    pruebas_lineasdepedidos.inicializar;
    pruebas_pedidos.inicializar;
    pruebas_clientes.inicializar;
    pruebas_productos.inicializar;
    pruebas_posiblesfichajes.inicializar;
    pruebas_encuestas.inicializar;
    pruebas_redessociales.inicializar;
    pruebas_adscripciones.inicializar;
    pruebas_partidos.inicializar;
    pruebas_competiciones.inicializar;
    pruebas_estadisticas.inicializar; 
    pruebas_ojeadores.inicializar;
    pruebas_entrenadores.inicializar;
    pruebas_jugadores.inicializar;
    pruebas_videojuegos.inicializar;
*/

         /* ======================================================== */
         /*                   INSERCIÓN DE VIDEOJUEGOS               */
         /* ======================================================== */


    pruebas_videojuegos.insertar('Insertar videojuego', 'Fortnite', '01/02/2013', 'PropioDelClub', true);
    pruebas_videojuegos.insertar('Insertar videojuego', 'PokemonGo', '05/02/2013', 'Encuesta', true);
    pruebas_videojuegos.insertar('Insertar videojuego', 'Overwatch', '05/02/2013', 'Encuesta', true);
    pruebas_videojuegos.insertar('Insertar videojuego', 'God of War', '10/10/2013', 'PropioDelClub', true);
    pruebas_videojuegos.insertar('Insertar videojuego', 'Tetris', '15/08/2013', 'PropioDelClub', true);
    pruebas_videojuegos.insertar('Insertar videojuego', 'Assassin s Creed', '11/03/2013', 'PropioDelClub', true);
    pruebas_videojuegos.insertar('Insertar videojuego', 'The Legend of Zelda', '31/08/2013', 'Encuesta', true);
    pruebas_videojuegos.insertar('Insertar videojuego', 'Super Mario Bros', '28/09/2014', 'Encuesta', true);
    pruebas_videojuegos.insertar('Insertar videojuego', 'Resident Evil', '26/02/2014', 'PropioDelClub', true);
    pruebas_videojuegos.insertar('Insertar videojuego', 'Age of Empires ', '12/03/2014', 'Encuesta', true);
    pruebas_videojuegos.insertar('Insertar Videojuego','Clash of Clans','01/01/14','PropioDelClub',true);
    pruebas_videojuegos.insertar('Insertar Videojuego','League of Leguend','01/01/14','PropioDelClub',true);
    pruebas_videojuegos.insertar('Insertar Videojuego','Rainbow Six Siege','01/01/14','PropioDelClub',true);
    pruebas_videojuegos.insertar('Insertar Videojuego','WOW','01/01/14','PropioDelClub',true);

    oid_v := SEC_OID_V.currval;


        /* ======================================================== */
        /*                    INSERCIÓN DE JUGADORES                */
        /* ======================================================== */


    pruebas_jugadores.insertar('Insertar jugador', '10945781A','Lucas Hoyos',500,'132760423',1,'luchoy@gmail.com','10/01/13','luchoy',0,'Ecuador',1,true);
    pruebas_jugadores.insertar('Insertar jugador', '10945781B','Alberto Domínguez',505,'422760421',6,'albdom@gmail.com','11/01/13','albdom',0,'España',1,true);
    pruebas_jugadores.insertar('Insertar jugador', '10945781C','Láic Abram',400,'433760422',7,'loicab@gmail.com','12/01/13','loicab',0,'Francia',1,true);
    pruebas_jugadores.insertar('Insertar jugador', '10945781D','Manuel Brizuela',300,'432740424',8,'manubri@gmail.com','13/01/13','manubri',0,'Argentina',1,true);
    
    pruebas_jugadores.insertar('Insertar jugador', '10945781E','Mauro dos Santos',100,'492760425',9,'mauro2sant@gmail.com','14/01/13','mauro2sant',0,'Ecuador',3,true);
    pruebas_jugadores.insertar('Insertar jugador', '10045000S','Benjamin Baton',400,'432706413',8,'bejcu@gmail.com','20/01/13','cucufa',0,'España',3,true);
    pruebas_jugadores.insertar('Insertar jugador', '20945781F','Felipe Gago',500,'433760426',1,'fegag@gmail.com','15/01/13','fegag',0,'Venezuela',3,true);
    pruebas_jugadores.insertar('Insertar jugador', '20945781G','Nicolás Domínguez',500,'432790427',2,'nicoldom@gmail.com','16/01/13','nicoldom',0,'Bolivia',3,true);
    
    pruebas_jugadores.insertar('Insertar jugador', '2945781H','Luca Robertone',400,'132760428',3,'lucorber@gmail.com','17/01/13','lucober',0,'Uruguay',2,true);
    pruebas_jugadores.insertar('Insertar jugador', '20945781I','Pablo Galdamós',300,'432260429',4,'pagal@gmail.com','18/01/13','pagal',0,'Ecuador',2,true);
    pruebas_jugadores.insertar('Insertar jugador', '20945781J','Luciano Orellano',200,'432760323',5,'luciore@gmail.com','19/01/13','luciore',0,'España',2,true);
    pruebas_jugadores.insertar('Insertar jugador', '20945781K','Ángel Barreal',700,'402160423',6,'angba@gmail.com','20/01/13','angba',0,'Portugal',2,true);
    
    pruebas_jugadores.insertar('Insertar jugador', '20945781L','Lucas Amarilla',800,'630060423',7,'luyellow@gmail.com','21/01/13','luyellow',0,'España',4,true);
    pruebas_jugadores.insertar('Insertar jugador', '20945781M','Mauricio Romero',400,'462760423',8,'mauro@gmail.com','22/01/13','mauro',0,'México',4,true);
    pruebas_jugadores.insertar('Insertar jugador', '30945781N','Nino Bazán',600,'432060123',9,'ninobb@gmail.com','23/01/13','ninobb',0,'España',4,true);
    pruebas_jugadores.insertar('Insertar jugador', '30925000O','Gustavo Giménez',300,'462761420',3,'gugi@gmail.com','25/01/13','gugime123',0,'España',4,true);
    
    pruebas_jugadores.insertar('Insertar jugador', '30915000P','Héctor de la Fuente',400,'412760410',2,'hecdlf@gmail.com','26/01/13','hectdelafu',0,'España',5,true);
    pruebas_jugadores.insertar('Insertar jugador', '30940000Q','Tomás Guidara',500,'432761593',7,'tomgui@gmail.com','27/01/13','tomygui',0,'España',5,true);
    pruebas_jugadores.insertar('Insertar jugador', '30905000R','Francisco Ortega',500,'497210423',8,'frao@gmail.com','28/01/13','frortegui',0,'España',5,true);
    pruebas_jugadores.insertar('Insertar jugador', '40935000T','Thiago Almada',200,'121760423',5,'thalm@gmail.com','24/01/13','thalm22',0,'España',5,true);
    
    pruebas_jugadores.insertar('Insertar jugador', '40945781A','Maria Hoyos',500,'432750423',5,'marial@gmail.com','10/01/13','mariate',0,'Ecuador',6,true);
    pruebas_jugadores.insertar('Insertar jugador', '40945781B','Elena Domínguez',505,'432767421',6,'elenaitor@gmail.com','11/01/13','elenn',0,'España',6,true);
    pruebas_jugadores.insertar('Insertar jugador', '40945781C','Juan Abram',400,'452760422',7,'juanilloter@gmail.com','12/01/13','juanillott',0,'Francia',6,true);
    pruebas_jugadores.insertar('Insertar jugador', '40945781D','Carlos Brizuela',300,'432764424',8,'carlobaute@gmail.com','13/01/13','bizuelita',0,'Argentina',6,true);
    
    pruebas_jugadores.insertar('Insertar jugador', '40945781E','Abraham dos Santos',100,'452760425',9,'abrahamateo@gmail.com','14/01/13','abrahammm',0,'Ecuador',7,true);
    pruebas_jugadores.insertar('Insertar jugador', '50045000S','Sebastián Baton',400,'432709423',8,'sebaselautentico@gmail.com','20/01/13','zebas',0,'España',7,true);
    pruebas_jugadores.insertar('Insertar jugador', '50945781F','Paco Gago',500,'432960426',1,'paquitoporras@gmail.com','15/01/13','paquitogago55',0,'Venezuela',7,true);
    pruebas_jugadores.insertar('Insertar jugador', '50945781G','Julián Domínguez',500,'431760427',2,'julian123@gmail.com','16/01/13','dominguitomg',0,'Bolivia',7,true);
    
    pruebas_jugadores.insertar('Insertar jugador', '50945781H','Samuel Robertone',400,'432760418',3,'samueer@gmail.com','17/01/13','samuellin',0,'Uruguay',8,true);
    pruebas_jugadores.insertar('Insertar jugador', '50945781I','Juan Galdamós',300,'232760429',4,'juanol@gmail.com','18/01/13','elrol',0,'Ecuador',8,true);
    pruebas_jugadores.insertar('Insertar jugador', '50945781J','Daniel Orellano',200,'932762323',5,'danielol@gmail.com','19/01/13','dsgpolaris',0,'España',8,true);
    pruebas_jugadores.insertar('Insertar jugador', '60945781K','Pedro Barreal',700,'412160423',6,'pedropero@gmail.com','20/01/19','fierro',0,'Portugal',8,true);
    
    
    pruebas_jugadores.insertar('Insertar jugador', '60945781L','David Amarilla',800,'430160423',7,'davideslol@gmail.com','21/01/13','amarillito',0,'España',9,true);
    pruebas_jugadores.insertar('Insertar jugador', '60945781M','Juan Romero',400,'402760473',8,'juanmauro@gmail.com','22/01/13','tomillo',0,'México',9,true);
    pruebas_jugadores.insertar('Insertar jugador', '60945781N','Pedro Bazán',600,'632160423',9,'pedropiedra@gmail.com','23/01/13','pedrinbar',0,'España',9,true);
    pruebas_jugadores.insertar('Insertar jugador', '60925000O','Antonio Giménez',300,'492760420',3,'antoinelal@gmail.com','25/01/13','antoinerelad',0,'España',9,true);
    
    
    pruebas_jugadores.insertar('Insertar jugador', '60915000P','Santiago de la Fuente',400,'432780400',2,'santitt@gmail.com','26/01/13','santiaguito',0,'España',9,true);
    pruebas_jugadores.insertar('Insertar jugador', '60940000Q','Tomás Muñoz',500,'452761523',7,'tmas@gmail.com','27/01/13','tamastur',0,'España',10,true);
    pruebas_jugadores.insertar('Insertar jugador', '60905000R','Francisco Heredia',500,'457260423',8,'fracis@gmail.com','28/01/13','erfran999',0,'España',10,true);
    pruebas_jugadores.insertar('Insertar jugador', '60935000T','Fran Almada',200,'511760423',5,'franchesco@gmail.com','24/01/13','aladilla',0,'España',8,true);
    
    
    pruebas_jugadores.insertar('Insertar jugador', '60945781A','Alberto Hoyos',500,'432760453',5,'alberti@gmail.com','10/01/13','hoyosmaster',0,'Ecuador',10,true);
    pruebas_jugadores.insertar('Insertar jugador', '60945781B','Mauro Domínguez',505,'452760421',6,'maurodomi@gmail.com','11/01/13','marmar',0,'España',10,true);
    pruebas_jugadores.insertar('Insertar jugador', '770945781C','Lucas Abram',400,'432760452',7,'luquitas@gmail.com','12/01/13','luquitalol',0,'Francia',10,true);
    pruebas_jugadores.insertar('Insertar jugador', '70945781D','Felipe Brizuela',300,'452760424',8,'felipezzzz@gmail.com','13/01/13','felipez123',0,'Argentina',10,true);
    
    
    pruebas_jugadores.insertar('Insertar jugador', '70945781E','Gustavo dos Santos',100,'472760425',9,'gustavito@gmail.com','14/01/13','gustavo69',0,'Ecuador',3,true);
    pruebas_jugadores.insertar('Insertar jugador', '70045000S','Óscar Baton',400,'432706723',8,'osquitass@gmail.com','20/01/13','ripper',0,'España',3,true);
    pruebas_jugadores.insertar('Insertar jugador', '70945781F','Leo Gago',500,'612760426',1,'leoleos@gmail.com','15/01/13','darknet',0,'Venezuela',4,true);
    pruebas_jugadores.insertar('Insertar jugador', '87094578G','Sara Domínguez',500,'462760927',2,'saritalag@gmail.com','16/01/13','sweetlol',0,'Bolivia',4,true);  
    pruebas_jugadores.insertar('Insertar jugador', '80945781H','Felipe Robertone',400,'492760428',3,'felipxxx@gmail.com','17/01/13','csilol',0,'Uruguay',5,true);


        /* ======================================================== */
        /*                  INSERCIÓN DE ENTRENADORES               */
        /* ======================================================== */
        

    pruebas_entrenadores.insertar('Insertar entrenador', '29564321D','Diego Villalonga',500,'834388138',5,'diegv@gmail.com','Ecuador',1,true);
    pruebas_entrenadores.insertar('Insertar entrenador', '21534321E','José Bustos',505,'239180219',6,'joseb@gmail.com','España',1,true);
    pruebas_entrenadores.insertar('Insertar entrenador', '22553219F','Manolo Domenech',400,'600180219',7,'manod@gmail.com','Francia',2,true);
    pruebas_entrenadores.insertar('Insertar entrenador', '13564341G','Antonio Valero',300,'662180219',8,'antv@gmail.com','Argentina',2,true);
    pruebas_entrenadores.insertar('Insertar entrenador', '12345821H','Manolo Cardo',100,'668180219',9,'manuca@gmail.com','Ecuador',3,true);
    pruebas_entrenadores.insertar('Insertar entrenador', '98754221I','José Antonio Viera',500,'667180219',1,'josseav@gmail.com','Venezuela',4,true);
    pruebas_entrenadores.insertar('Insertar entrenador', '97123872J','Tolo Plaza',500,'666180219',2,'tp@gmail.com','Bolivia',4,true);
    pruebas_entrenadores.insertar('Insertar entrenador', '65445232K','Ruiz Sosa',400,'748180219',3,'rzss@gmail.com','Uruguay',5,true);
    pruebas_entrenadores.insertar('Insertar entrenador', '65345325L','Julián Rubio',300,'630180219',4,'jurub@gmail.com','Ecuador',5,true);
    pruebas_entrenadores.insertar('Insertar entrenador', '57231812M','Luciano Martín',200,'640180219',5,'lumart@gmail.com','España',6,true);
    pruebas_entrenadores.insertar('Insertar entrenador', '94201823N','Antonio Rincón',700,'674180219',6,'antcorner@gmail.com','Portugal',6,true);
    pruebas_entrenadores.insertar('Insertar entrenador', '92176392W','Fermin Galeote',800,'601180009',7,'fermga@gmail.com','España',7,true);
    pruebas_entrenadores.insertar('Insertar entrenador', '62135832O','Paco Gallardo',400,'622180219',8,'pacg@gmail.com','México',7,true);
    pruebas_entrenadores.insertar('Insertar entrenador', '21637524P','Luis Tevenet',600,'792180219',9,'luistv@gmail.com','España',8,true);
    pruebas_entrenadores.insertar('Insertar entrenador', '79263124Q','Jose Lara',200,'610180219',5,'jlara@gmail.com','España',8,true);
    pruebas_entrenadores.insertar('Insertar entrenador', '21832138R','Óscar Tosato',300,'649180219',3,'oscartos@gmail.com','España',9,true);
    pruebas_entrenadores.insertar('Insertar entrenador', '72136234S','Carlos Galbis',400,'642180219',2,'carlgal@gmail.com','España',9,true);
    pruebas_entrenadores.insertar('Insertar entrenador', '37912623T','Fernando Guillamán',500,'612180219',7,'ferguill@gmail.com','España',10,true);
    pruebas_entrenadores.insertar('Insertar entrenador', '93218532U','Ramón Tejada',500,'659180219',8,'ramt@gmail.com','España',10,true);
    pruebas_entrenadores.insertar('Insertar entrenador', '91234562Z','Santiago Casado',400,'650100210',8,'santicas@gmail.com','España',3,true);
    pruebas_entrenadores.insertar('Insertar entrenador', '19564321A','José Muñoz',500,'834387138',5,'joselitox@gmail.com','Francia',11,true);
    pruebas_entrenadores.insertar('Insertar entrenador', '21534321B','Antonio Casado',505,'269180819',6,'antoine@gmail.com','España',11,true);
    pruebas_entrenadores.insertar('Insertar entrenador', '52553219C','Weich Domenech',400,'630180210',7,'wdomenech@gmail.com','Francia',12,true);
    pruebas_entrenadores.insertar('Insertar entrenador', '53564341D','Pepe Valero',300,'662170289',3,'pepevalero@gmail.com','Argentina',12,true);
    pruebas_entrenadores.insertar('Insertar entrenador', '32345821E','Daniel Cardo',100,'668280819',4,'cardane@gmail.com','Alemania',13,true);
    pruebas_entrenadores.insertar('Insertar entrenador', '78754221F','Maribel Viera',500,'665188219',1,'maribell@gmail.com','España',14,true);
    pruebas_entrenadores.insertar('Insertar entrenador', '27123872G','Fernando Plaza',500,'626180219',2,'fernanditocosta@gmail.com','Bolivia',4,true);
    pruebas_entrenadores.insertar('Insertar entrenador', '65445232H','Maite Sosa',400,'748187819',3,'maitegal@gmail.com','Uruguay',5,true);
    pruebas_entrenadores.insertar('Insertar entrenador', '75345325F','Alba Rubio',300,'630184819',4,'albita@gmail.com','Ecuador',14,true);
    pruebas_entrenadores.insertar('Insertar entrenador', '47231812I','Sara Martín',200,'640168219',5,'sarala@gmail.com','España',6,true);
    pruebas_entrenadores.insertar('Insertar entrenador', '34201823J','Juan Martas',700,'674128219',6,'juanitomar@gmail.com','Portugal',6,true);
    pruebas_entrenadores.insertar('Insertar entrenador', '02176392K','Carlos Galeote',800,'628180009',2,'carlosgal@gmail.com','España',7,true);
    pruebas_entrenadores.insertar('Insertar entrenador', '62135832L','Pedro Gallardo',400,'618180219',8,'pedrolambo@gmail.com','México',9,true);
    pruebas_entrenadores.insertar('Insertar entrenador', '31637524P','Federico Munez',600,'118180219',4,'lorca@gmail.com','España',11,true);
    pruebas_entrenadores.insertar('Insertar entrenador', '89263124N','Pedro Lara',200,'610185819',5,'piererelle@gmail.com','España',12,true);
    pruebas_entrenadores.insertar('Insertar entrenador', '51832138O','Luis Gonzáles',300,'643880219',3,'losluis@gmail.com','España',13,true);
    pruebas_entrenadores.insertar('Insertar entrenador', '12136234P','Manuel Talmos',400,'642880219',2,'manulel@gmail.com','España',14,true);
    pruebas_entrenadores.insertar('Insertar entrenador', '97912623Q','Elliot Trump',500,'612182219',1,'trump@gmail.com','España',10,true);
    pruebas_entrenadores.insertar('Insertar entrenador', '73218532R','Antonio Tejado',500,'658280219',2,'anteh@gmail.com','España',10,true);
    pruebas_entrenadores.insertar('Insertar entrenador', '11234562S','Santiago Almeida',400,'620180210',2,'sanAlmeida@gmail.com','España',13,true);
    

   
        /* ======================================================== */
        /*                   INSERCIÓN DE OJEADORES                 */
        /* ======================================================== */

   
     pruebas_ojeadores.insertar('Insertar ojeador', '18421212F', 'Martin Martinez', 1200, '423533232', 1, 'martinperez@gmail.com', 'Argentina', 1, true);
     pruebas_ojeadores.insertar('Insertar ojeador', '62111212G', 'David Gomez', 900, '559836323', 2, 'davidtrainer@gmail.com', 'España',2 , true);
     pruebas_ojeadores.insertar('Insertar ojeador', '22121212H', 'Mario Alonso', 1300, '663242323', 3, 'marioys@gmail.com', 'España', 3, true);
     pruebas_ojeadores.insertar('Insertar ojeador', '32121219I', 'Marcos Zid', 1200, '732732323', 3, 'markoss@gmail.com', 'España', 4, true);
     pruebas_ojeadores.insertar('Insertar ojeador', '42921213A', 'Laura Ramos', 1000, '995222323', 2, 'lauritarojass@gmail.com', 'Francia', 5, true);
     pruebas_ojeadores.insertar('Insertar ojeador', '12121292K', 'Jorge Blanco', 1500, '996272323', 1, 'mjorgex@gmail.com', 'Estados Unidos', 6, true);
     pruebas_ojeadores.insertar('Insertar ojeador', '82129212Z', 'Isabel Sevillano', 1200, '192932323', 2, 'isabella@gmail.com', 'Madagascar', 7, true);
     pruebas_ojeadores.insertar('Insertar ojeador', '49121212M', 'Bea Muñoz', 1300, '222252523', 3, 'beatrizgomez@gmail.com', 'España', 8, true);
     pruebas_ojeadores.insertar('Insertar ojeador', '82921212O', 'Lucas Iglesias', 1100, '123232323', 4, 'ludelucas@gmail.com', 'Alemania', 9, true);
     pruebas_ojeadores.insertar('Insertar ojeador', '48121212A', 'Pablo Lopez', 1000, '425272323', 3, 'pablogil@gmail.com', 'China', 10, true);
     pruebas_ojeadores.insertar('Insertar ojeador', '12111212F', 'Julián Casado', 1200, '482232323', 2, 'juliom@gmail.com', 'España', 1, true);
     pruebas_ojeadores.insertar('Insertar ojeador', '62121912G', 'Pablo Abascal', 900, '552331323', 2, 'pabloit@gmail.com', 'España',2 , true);
     pruebas_ojeadores.insertar('Insertar ojeador', '92321212H', 'Maria Vidal', 1300, '660292323', 1, 'mariaAS@gmail.com', 'España', 3, true);
     pruebas_ojeadores.insertar('Insertar ojeador', '72171212I', 'Alba Rico', 1200, '772538323', 1, 'albamov@gmail.com', 'España', 4, true);
     pruebas_ojeadores.insertar('Insertar ojeador', '02321212J', 'Daniela Soria ', 1000, '480232323', 1, 'danielaEEUU@gmail.com', 'Francia', 5, true);
     pruebas_ojeadores.insertar('Insertar ojeador', '32421212K', 'Fernando Melendez', 1500, '142232323', 1, 'fernand@gmail.com', 'Estados Unidos', 6, true);
     pruebas_ojeadores.insertar('Insertar ojeador', '62221212Z', 'Pedro Martin', 1200, '112432323', 2, 'piere234@gmail.com', 'España', 7, true);
     pruebas_ojeadores.insertar('Insertar ojeador', '72126212M', 'Laura Ruano', 1300, '222562323', 3, 'lerler@gmail.com', 'España', 8, true);
     pruebas_ojeadores.insertar('Insertar ojeador', '82321212O', 'Alejandro Ortega', 1100, '6922232323', 4, 'alez@gmail.com', 'Alemania', 9, true);
     pruebas_ojeadores.insertar('Insertar ojeador', '92121092A', 'Manuel Barragan', 1000, '427232323', 3, 'manu@gmail.com', 'China', 10, true);
     pruebas_ojeadores.insertar('Insertar ojeador', '32121212F', 'Carlos Castillo', 1200, '448332323', 2, 'carlitos@gmail.com', 'Argentina', 11, true);
     pruebas_ojeadores.insertar('Insertar ojeador', '52191212G', 'Ignacio Moreno', 900, '559432323', 3, 'igna@gmail.com', 'España',2 , true);
     pruebas_ojeadores.insertar('Insertar ojeador', '62129212H', 'Maribel Trenado', 1300, '625232323', 1, 'mariii@gmail.com', 'España', 13, true);
     pruebas_ojeadores.insertar('Insertar ojeador', '22126212I', 'Miguel Rubio', 1200, '773632323', 5, 'mije@gmail.com', 'España', 4, true);
     pruebas_ojeadores.insertar('Insertar ojeador', '62126212J', 'Paco Galvez', 1000, '882257323', 3, 'paquitoo@gmail.com', 'Francia', 5, true);
     pruebas_ojeadores.insertar('Insertar ojeador', '82121212K', 'Javier Luna', 1500, '997832323', 2, 'erjavi@gmail.com', 'Estados Unidos', 6, true);
     pruebas_ojeadores.insertar('Insertar ojeador', '42171212Z', 'Pedro Abel', 1200, '1123392323', 3, 'iptrieto@gmail.com', 'España', 7, true);
     pruebas_ojeadores.insertar('Insertar ojeador', '32321212M', 'Álvaro Bernal', 1300, '2282272323', 2, 'alvarito697@gmail.com', 'España', 8, true);
     pruebas_ojeadores.insertar('Insertar ojeador', '92131212O', 'Matías Londra', 1100, '124233323', 1, 'matt@gmail.com', 'Alemania', 9, true);
     pruebas_ojeadores.insertar('Insertar ojeador', '12191212A', 'Rafael Bunny', 1000, '44223323', 4, 'rafaelle@gmail.com', 'China', 10, true);
     pruebas_ojeadores.insertar('Insertar ojeador', '02921212F', 'David Gil', 1200, '442838323', 3, 'davidess@gmail.com', 'Argentina', 1, true);
     pruebas_ojeadores.insertar('Insertar ojeador', '32321212G', 'Pedro Calahorro', 900, '552252323', 1, 'pedrito359@gmail.com', 'España',12 , true);
     pruebas_ojeadores.insertar('Insertar ojeador', '52121212H', 'Mario Caravaca', 1300, '662939323', 3, 'marioconil@gmail.com', 'España', 13, true);
     pruebas_ojeadores.insertar('Insertar ojeador', '62131212I', 'Marcos Higuera', 1200, '772222323', 2, 'marcoscasas@gmail.com', 'España', 14, true);
     pruebas_ojeadores.insertar('Insertar ojeador', '72124212J', 'Laura Miret', 1000, '882031323', 1, 'lauritalau@gmail.com', 'Francia', 11, true);
     pruebas_ojeadores.insertar('Insertar ojeador', '92127212K', 'Jorge Sanfrutos', 1500, '992033323', 2, 'jj@gmail.com', 'Estados Unidos', 6, true);
     pruebas_ojeadores.insertar('Insertar ojeador', '22127212Z', 'Isabel Hoffman', 1200, '110242323', 3, 'isabella123@gmail.com', 'España', 7, true);
     pruebas_ojeadores.insertar('Insertar ojeador', '52123212M', 'Bea Martinez', 1300, '222233283', 2, 'beagonzo@gmail.com', 'España', 8, true);
     pruebas_ojeadores.insertar('Insertar ojeador', '12125212O', 'Lucas Elias', 1100, '1220232023', 1, 'luquitas2@gmail.com', 'Alemania', 9, true);
     pruebas_ojeadores.insertar('Insertar ojeador', '82126212C', 'Pablo Reina', 1000, '422032822', 1, 'pablogila@gmail.com', 'China', 10, true);
   
    
    
        /* ======================================================== */
        /*                  INSERCIÓN DE ESTADÍSTICAS               */
        /* ======================================================== */


    pruebas_estadisticas.insertar('Insertar estadistica','1',100,3, true);
    pruebas_estadisticas.insertar('Insertar estadistica','0',60,0, true);
    pruebas_estadisticas.insertar('Insertar estadistica','1',70,4, true);
    pruebas_estadisticas.insertar('Insertar estadistica','1',74,1, true);
    pruebas_estadisticas.insertar('Insertar estadistica','1',87,3, true);
    pruebas_estadisticas.insertar('Insertar estadistica','0',335,5, true);
    pruebas_estadisticas.insertar('Insertar estadistica','0',80,3, true);
    pruebas_estadisticas.insertar('Insertar estadistica','1',90,2, true);

    pruebas_estadisticas.insertar('Insertar estadistica','0',69,2, true);
    pruebas_estadisticas.insertar('Insertar estadistica','1',124,1, true);
    
    pruebas_estadisticas.insertar('Insertar estadistica','1',100,1, true);
    pruebas_estadisticas.insertar('Insertar estadistica','1',60,1, true);
    
    pruebas_estadisticas.insertar('Insertar estadistica','1',120,1, true);
    pruebas_estadisticas.insertar('Insertar estadistica','1',30,1, true);
    
    pruebas_estadisticas.insertar('Insertar estadistica','1',220,1, true);
    pruebas_estadisticas.insertar('Insertar estadistica','1',60,1, true);
    
    pruebas_estadisticas.insertar('Insertar estadistica','1',70,3, true);
    pruebas_estadisticas.insertar('Insertar estadistica','1',80,4, true);

    pruebas_estadisticas.insertar('Insertar estadistica','1',70,3, true);
    pruebas_estadisticas.insertar('Insertar estadistica','1',80,4, true);

    oid_e := SEC_OID_E.currval;


   

        /* ======================================================== */
        /*                 INSERCIÓN DE COMPETICIONES               */
        /* ======================================================== */


    pruebas_competiciones.insertar('Insertar competiciones','Fortnite World Cup',1000,'25/01/16',200,null,true);
    pruebas_competiciones.insertar('Insertar competiciones', 'OverChristmas',1500,'22/12/16',100,'1',true);
    pruebas_competiciones.insertar('Insertar competiciones','PokemonGoSpain',1200,'20/01/16',90,null,true);
    pruebas_competiciones.insertar('Insertar competiciones','GoW World Tour',1000,'30/06/16',170,null,true);
    pruebas_competiciones.insertar('Insertar competiciones', 'Tetris 64',1300,'12/11/16',200,'1',true);
    pruebas_competiciones.insertar('Insertar competiciones','Creed Cup',1400,'02/03/16',300,'1',true);
    pruebas_competiciones.insertar('Insertar competiciones','Zelda Rupias Cup',1570,'24/04/17',150,null,true);
    pruebas_competiciones.insertar('Insertar competiciones', 'Mario Bros Cup2',1590,'13/05/17',160,'1',true);
    pruebas_competiciones.insertar('Insertar competiciones','RE Cup',2500,'11/01/17',170,'1',true);
    pruebas_competiciones.insertar('Insertar competiciones','AoE World Tounrment',1100,'21/02/17',180,null,true);
    pruebas_competiciones.insertar('Insertar competiciones','Grefg Fortnite Cup',1000,'02/05/17',220,'1',true);
    pruebas_competiciones.insertar('Insertar competiciones','Fortnite Tour',1000,'02/06/17',220,null,true);
 
    oid_com := SEC_OID_COM.currval;

        /* ======================================================== */
        /*                    INSERCIÓN DE PARTIDOS                 */
        /* ======================================================== */

    pruebas_partidos.insertar('Insertar partidos',2,2,1,'La Cartuja','23/12/19 12:13:30,30','Twitch',true);
    pruebas_partidos.insertar('Insertar partidos',2,2,2,'Hipódromo','23/12/19 22:13:30,30','Radio',true);
    pruebas_partidos.insertar('Insertar partidos',3,3,3,'WiZink','24/06/18 22:13:20,30','Televisado',true);
    pruebas_partidos.insertar('Insertar partidos',3,3,4,'Polideportivo Constantina','23/01/19 11:13:30,30','Twitch',true);
    pruebas_partidos.insertar('Insertar partidos',5,5,5,'Parque de los Principes','12/11/19 10:13:30,30','Radio',true);
    pruebas_partidos.insertar('Insertar partidos',6,6,6,'Carpa Municipal','03/02/19 20:13:30,30','Twitch',true);
    pruebas_partidos.insertar('Insertar partidos',8,8,7,'Plaza España','14/05/19 21:13:30,30','Radio',true);
    pruebas_partidos.insertar('Insertar partidos',9,9,8,'El Retiro','12/01/19 23:13:30,30','Televisado',true);
    pruebas_partidos.insertar('Insertar partidos',1,11,9,'Parque Wesling','03/05/19 12:13:30,30','Twitch',true);
    pruebas_partidos.insertar('Insertar partidos',8,8,10,'Mingorrubio','15/05/19 13:13:30,30','Radio',true);
    pruebas_partidos.insertar('Insertar partidos',9,9,11,'La Cartuja','13/01/19 14:13:30,30','Twitch',true);
    pruebas_partidos.insertar('Insertar partidos',1,11,12,'Nuevo Azteca','04/05/19 15:13:30,30','Televisado',true);
    pruebas_partidos.insertar('Insertar partidos',1,1,13,'La Cartuja','03/05/19 18:13:30,30','Televisado',true);
    pruebas_partidos.insertar('Insertar partidos',1,1,14,'Parque Wesling','04/06/19 15:13:30,30','Televisado',true);
    pruebas_partidos.insertar('Insertar partidos',7,7,15,'La Cartuja','02/06/19 15:13:30,30','Televisado',true);
    pruebas_partidos.insertar('Insertar partidos',7,7,16,'La Cartuja','04/06/19 15:13:30,30','Televisado',true);

  

        /* ======================================================== */
        /*                  INSERCIÓN DE ADSCRIPCIONES              */
        /* ======================================================== */


    pruebas_adscripciones.insertar('Insertar adscripción','24/01/16','26/01/16','10945781A',1,true);
    pruebas_adscripciones.insertar('Insertar adscripción','24/01/16',null,'10945781B',1,true);
    pruebas_adscripciones.insertar('Insertar adscripción','24/01/16',null,'10945781C',1,true);
    pruebas_adscripciones.insertar('Insertar adscripción','24/01/16',null,'10945781D',1,true);
    
    pruebas_adscripciones.insertar('Insertar adscripción','01/05/17',null,'10945781A',11,true);
    pruebas_adscripciones.insertar('Insertar adscripción','01/05/17',null,'10945781B',11,true);
    pruebas_adscripciones.insertar('Insertar adscripción','01/05/17',null,'10945781C',11,true);
    pruebas_adscripciones.insertar('Insertar adscripción','01/05/17',null,'10945781D',11,true);
    
    pruebas_adscripciones.insertar('Insertar adscripción','24/11/16',null,'10945781E',2,true);
    pruebas_adscripciones.insertar('Insertar adscripción','24/11/16',null,'10045000S',2,true);
    pruebas_adscripciones.insertar('Insertar adscripción','24/11/16',null,'20945781F',2,true);
    pruebas_adscripciones.insertar('Insertar adscripción','24/11/16',null,'20945781G',2,true);
    
    
    pruebas_adscripciones.insertar('Insertar adscripción','10/01/16','12/01/16','2945781H',3,true);
    pruebas_adscripciones.insertar('Insertar adscripción','14/01/16',null,'20945781I',3,true);
    pruebas_adscripciones.insertar('Insertar adscripción','14/01/16',null,'20945781J',3,true);
    pruebas_adscripciones.insertar('Insertar adscripción','14/01/16',null,'20945781K',3,true);
   
    pruebas_adscripciones.insertar('Insertar adscripción','30/05/16',null,'20945781L',4,true);
    pruebas_adscripciones.insertar('Insertar adscripción','30/05/16',null,'20945781M',4,true);
    pruebas_adscripciones.insertar('Insertar adscripción','30/05/16','02/06/16','30945781N',4,true);
    pruebas_adscripciones.insertar('Insertar adscripción','30/05/16',null,'30925000O',4,true);
    
    pruebas_adscripciones.insertar('Insertar adscripción','10/11/16',null,'30915000P',5,true);
    pruebas_adscripciones.insertar('Insertar adscripción','10/11/16',null,'30940000Q',5,true);
    pruebas_adscripciones.insertar('Insertar adscripción','10/11/16',null,'30905000R',5,true);
    pruebas_adscripciones.insertar('Insertar adscripción','10/11/16',null,'40935000T',5,true);
       
    pruebas_adscripciones.insertar('Insertar adscripción','02/02/16',null,'40945781A',6,true);
    pruebas_adscripciones.insertar('Insertar adscripción','02/02/16',null,'40945781B',6,true);
    pruebas_adscripciones.insertar('Insertar adscripción','02/02/16',null,'40945781C',6,true);
    pruebas_adscripciones.insertar('Insertar adscripción','02/02/16',null,'40945781D',6,true);
    
    pruebas_adscripciones.insertar('Insertar adscripción','24/04/17',null,'40945781E',7,true);
    pruebas_adscripciones.insertar('Insertar adscripción','24/04/17',null,'50045000S',7,true);
    pruebas_adscripciones.insertar('Insertar adscripción','24/04/17',null,'50945781F',7,true);
    pruebas_adscripciones.insertar('Insertar adscripción','24/04/17',null,'50945781G',7,true);
    
    pruebas_adscripciones.insertar('Insertar adscripción','10/05/17',null,'50945781H',8,true);
    pruebas_adscripciones.insertar('Insertar adscripción','10/05/17',null,'50945781I',8,true);
    pruebas_adscripciones.insertar('Insertar adscripción','10/05/17',null,'50945781J',8,true);
    pruebas_adscripciones.insertar('Insertar adscripción','10/05/17',null,'60945781K',8,true);
    
    pruebas_adscripciones.insertar('Insertar adscripción','10/01/17',null,'60945781L',9,true);
    pruebas_adscripciones.insertar('Insertar adscripción','10/01/17',null,'60945781M',9,true);
    pruebas_adscripciones.insertar('Insertar adscripción','10/01/17',null,'60945781N',9,true);
    pruebas_adscripciones.insertar('Insertar adscripción','10/01/17',null,'60925000O',9,true);
    
    pruebas_adscripciones.insertar('Insertar adscripción','15/02/17',null,'60915000P',10,true);
    pruebas_adscripciones.insertar('Insertar adscripción','15/02/17',null,'60940000Q',10,true);
    pruebas_adscripciones.insertar('Insertar adscripción','15/02/17',null,'60905000R',10,true);
    pruebas_adscripciones.insertar('Insertar adscripción','15/02/17',null,'60935000T',10,true);

    oid_ad := SEC_OID_AD.currval;

        /* ======================================================== */
        /*                 INSERCIÓN DE REDES SOCIALES              */
        /* ======================================================== */

   
    pruebas_redessociales.insertar('Insertar red social','manolitort','03/09/2017',2300,'Reddit','10945781D',null,true);
    pruebas_redessociales.insertar('Insertar red social','manolitotw','03/09/2017',230000,'Twitter','10945781D',null,true);
    pruebas_redessociales.insertar('Insertar red social','laritaoficial','03/10/2015',72000,'Twitter','870945781G',null,true);
    pruebas_redessociales.insertar('Insertar red social','laritaa10','15/10/2015',82000,'Instagram','870945781G',null,true);
    pruebas_redessociales.insertar('Insertar red social','toliitofdez','25/10/2015',820000,'Instagram','30905000R',null,true);
    pruebas_redessociales.insertar('Insertar red social','toliitofdezoficial','25/11/2019',820000,'Facebook','30905000R',null,true);
    pruebas_redessociales.insertar('Insertar red social','domenech13','25/11/2016',122200,'Facebook','60945781B',null,true);
    pruebas_redessociales.insertar('Insertar red social','domenech13fb','25/11/2016',122200,'Facebook','60945781B',null,true);
    pruebas_redessociales.insertar('Insertar red social','domenech13ig','15/11/2018',122000,'Instagram','60945781B',null,true);
    pruebas_redessociales.insertar('Insertar red social','iluh','23/09/2017',1300,'Reddit','30915000P',null,true);
    pruebas_redessociales.insertar('Insertar red social','iluhIG','23/10/2017',1300,'Instagram','30915000P',null,true);
    pruebas_redessociales.insertar('Insertar red social','10ventetig','23/03/2013',2300,'Instagram','50945781J',null,true);
    pruebas_redessociales.insertar('Insertar red social','10ventet','23/03/2013',23000,'Twitter','50945781J',null,true);
    pruebas_redessociales.insertar('Insertar red social','10ventet','23/03/2013',23000,'Instagram','50945781J',null,true);
    pruebas_redessociales.insertar('Insertar red social','casadox','19/03/2017',2200,'Facebook','60945781L',null,true);
    pruebas_redessociales.insertar('Insertar red social','casadox1g','19/03/2017',2220,'Instagram','60945781L',null,true);
    pruebas_redessociales.insertar('Insertar red social','luchoy','22/02/14',1000,'Twitter','50945781H',null,true);	
    pruebas_redessociales.insertar('Insertar red social','luchoy123','22/05/15',1000,'Instagram','50945781H',null,true);	
    pruebas_redessociales.insertar('Insertar red social','luchoy666','22/06/16',1000,'Facebook'	,'50945781H',null,true);	
    pruebas_redessociales.insertar('Insertar red social','luyellow','22/06/17',2000,'QQ','20945781K',null,true);
    pruebas_redessociales.insertar('Insertar red social','lugreen','01/11/17','1500','Reddit','20945781K',null,true);
    pruebas_redessociales.insertar('Insertar red social','nibb4u','01/12/18',4500,'Twitter','30945781N',null,true);
    pruebas_redessociales.insertar('Insertar red social','nibb4uig','01/01/19',14500,'Instagram','30945781N',null,true);
    pruebas_redessociales.insertar('Insertar red social','2saints', '01/11/19', 500, 'Instagram','30945781N',null,true);	
    pruebas_redessociales.insertar('Insertar red social','th10alm', '01/11/19', 25500, 'Instagram','60945781K',null,true);	
    pruebas_redessociales.insertar('Insertar red social','thiago10', '01/11/19', 10500, 'Twitter','60945781K',null,true);
    pruebas_redessociales.insertar('Insertar red social','frote40', '11/12/16', 1500, 'Facebook','60940000Q',null,true);	
    pruebas_redessociales.insertar('Insertar red social','froteqq40', '01/10/18', 500, 'QQ','60940000Q',null,true);	
    pruebas_redessociales.insertar('Insertar red social','galdamesOMG', '21/10/18', 255500, 'YouTube','60940000Q',null,true);	
    pruebas_redessociales.insertar('Insertar red social','illogalda', '31/12/18', 50000, 'Twitter','60905000R',null,true);	
    pruebas_redessociales.insertar('Insertar red social','illogalda', '21/12/17', 53290, 'QQ','60905000R',null,true);	
    pruebas_redessociales.insertar('Insertar red social','illogalda', '20/02/17', 5230, 'Facebook','60905000R',null,true);	
    pruebas_redessociales.insertar('Insertar red social','gago', '20/12/17', 50230, 'Twitter','40945781A',null,true);	
    pruebas_redessociales.insertar('Insertar red social','gago5oficial', '24/02/17', 76230, 'Instagram','40945781A',null,true);	


        /* ======================================================== */
        /*                   INSERCIÓN DE ENCUESTAS                 */
        /* ======================================================== */
                                                                                                                                                      

    pruebas_encuestas.insertar('Insertar encuesta', '01/01/2017', '02/01/2017', 'Informativa','gago5oficial', 'Instagram',true);
    pruebas_encuestas.insertar('Insertar encuesta', '03/05/2017', '06/05/2017', 'Popular','illogalda', 'Twitter',true);
    pruebas_encuestas.insertar('Insertar encuesta', '12/03/2018', '31/08/2017', 'Informativa','thiago10', 'Twitter',true);
    pruebas_encuestas.insertar('Insertar encuesta', '22/05/2018', '24/05/2018', 'Popular','iluh','Reddit',true);
    pruebas_encuestas.insertar('Insertar encuesta', '21/08/2017', '25/08/2017', 'Informativa','manolitort','Reddit',true);
    pruebas_encuestas.insertar('Insertar encuesta', '04/01/2019', '05/01/2019', 'Informativa','nibb4uig','Instagram',true);
    pruebas_encuestas.insertar('Insertar encuesta', '30/03/2018', '1/04/2018', 'Popular','gago', 'Twitter',true);
    pruebas_encuestas.insertar('Insertar encuesta', '16/11/2018', '20/11/2018', 'Popular','gago', 'Twitter',true);
    pruebas_encuestas.insertar('Insertar encuesta', '18/04/2017', '19/04/2017', 'Informativa','toliitofdezoficial','Facebook',true);
    pruebas_encuestas.insertar('Insertar encuesta', '26/10/2018', '30/10/2018', 'Popular','iluh','Reddit',true);  
    pruebas_encuestas.insertar('Insertar encuesta', '01/01/2019', '02/01/2019', 'Informativa','10ventet','Twitter',true);
    pruebas_encuestas.insertar('Insertar encuesta', '03/05/2019', '06/05/2019', 'Popular','toliitofdezoficial','Facebook',true);
    pruebas_encuestas.insertar('Insertar encuesta', '12/03/2019', '31/08/2019', 'Informativa','iluh','Reddit',true);
    pruebas_encuestas.insertar('Insertar encuesta', '22/05/2019', '24/05/2019', 'Popular','gago5oficial','Instagram',true);
    pruebas_encuestas.insertar('Insertar encuesta', '21/08/2019', '25/08/2019', 'Informativa','domenech13ig','Instagram',true);
    pruebas_encuestas.insertar('Insertar encuesta', '04/04/2019', '04/05/2019', 'Informativa','domenech13','Facebook',true);
    pruebas_encuestas.insertar('Insertar encuesta', '30/03/2019', '1/04/2019', 'Popular','10ventet','Twitter',true);
    pruebas_encuestas.insertar('Insertar encuesta', '16/11/2019', '20/11/2019', 'Popular','iluh','Reddit',true);
    pruebas_encuestas.insertar('Insertar encuesta', '18/04/2019', '19/04/2019', 'Informativa','10ventet','Twitter',true);
    pruebas_encuestas.insertar('Insertar encuesta', '26/10/2019', '30/10/2019', 'Popular','gago', 'Twitter',true);
    
  
    oid_en := sec_oid_en.currval;
    

        /* ======================================================== */
        /*                INSERCIÓN DE POSIBLE FICHAJE              */
        /* ======================================================== */

    pruebas_posiblesfichajes.insertar('Insertar posible fichaje','Peji123',0,'peji@gmail.com',null,'España','52123212M',true);
    pruebas_posiblesfichajes.insertar('Insertar posible fichaje','JaviCanijo',200,'jcan@gmail.com','Heretics','México','62129212H',true);
    pruebas_posiblesfichajes.insertar('Insertar posible fichaje','DaibateTW',100,'daib@gmail.com','EchoFox','Ecuador','62129212H',true);
    pruebas_posiblesfichajes.insertar('Insertar posible fichaje','LuchoYT',330,'lucho@gmail.com','OpTic Gaming','Bolivia','49121212M',true);
    pruebas_posiblesfichajes.insertar('Insertar posible fichaje','KibambabalaXD',450,'kimba@gmail.com','Fnatic','Camerún','52123212M',true);
    pruebas_posiblesfichajes.insertar('Insertar posible fichaje','Simosismo',100,'simo@gmail.com','Inmortals','Marruecos','92127212K',true);
    pruebas_posiblesfichajes.insertar('Insertar posible fichaje','Valenscott',0,'valen@gmail.com','100 Thieves','Italia','32321212M',true);
    pruebas_posiblesfichajes.insertar('Insertar posible fichaje','Caroexpens',240,'caro@gmail.com','G2 Esports','España','62129212H',true);
    pruebas_posiblesfichajes.insertar('Insertar posible fichaje','Lassocalss',120,'lasso@gmail.com','CLG','Argentina','49121212M',true);
    pruebas_posiblesfichajes.insertar('Insertar posible fichaje','Borjita666',160,'borjal@gmail.com','Liquid','España','62129212H',true);
    pruebas_posiblesfichajes.insertar('Insertar posible fichaje','CurritoOMG',400,'curro@gmail.com','Cloud9','España','52123212M',true);
    pruebas_posiblesfichajes.insertar('Insertar posible fichaje','IlloLarita',0,'larita@gmail.com',null,'España','62129212H',true);
    pruebas_posiblesfichajes.insertar('Insertar posible fichaje', 'Juan777',1,'juanlazar@gmail.com',null,'España','92127212K',true);
    pruebas_posiblesfichajes.insertar('Insertar posible fichaje', 'Destroyer',0,'desgames@gmail.com',null,'España','62129212H',true);
    pruebas_posiblesfichajes.insertar('Insertar posible fichaje','ElChol',0,'chol@gmail.com',null,'España','62129212H',true);
    pruebas_posiblesfichajes.insertar('Insertar posible fichaje','Davidin',200,'davidin@gmail.com','Heretics','México','62129212H',true);
    pruebas_posiblesfichajes.insertar('Insertar posible fichaje','Espadalol',100,'davidtamayo@gmail.com','EchoFox','Ecuador','32321212M',true);
    pruebas_posiblesfichajes.insertar('Insertar posible fichaje','Kingkang',330,'kingYT@gmail.com','OpTic Gaming','Bolivia','62129212H',true);
    pruebas_posiblesfichajes.insertar('Insertar posible fichaje','ExplosiveYT',450,'Explosiveee@gmail.com','Fnatic','Camerún','62129212H',true);
    pruebas_posiblesfichajes.insertar('Insertar posible fichaje','Leloriso',100,'Leo@gmail.com','Inmortals','España','32321212M',true);
    pruebas_posiblesfichajes.insertar('Insertar posible fichaje','Extravis',0,'Valeria@gmail.com','100 Thieves','Italia','62129212H',true);
    pruebas_posiblesfichajes.insertar('Insertar posible fichaje','Pensiar',240,'Julianna@gmail.com','G2 Esports','España','62129212H',true);
    pruebas_posiblesfichajes.insertar('Insertar posible fichaje','Alcampar',120,'campanar@gmail.com','CLG','Argentina','62129212H',true);
    pruebas_posiblesfichajes.insertar('Insertar posible fichaje','Raul456',160,'raulero@gmail.com','Liquid','España','62129212H',true);
    pruebas_posiblesfichajes.insertar('Insertar posible fichaje','Lisadas',400,'lisa@gmail.com','Cloud9','España','32321212M',true);
    pruebas_posiblesfichajes.insertar('Insertar posible fichaje','Personidas',0,'miquell@gmail.com',null,'España','62129212H',true);
    pruebas_posiblesfichajes.insertar('Insertar posible fichaje', 'LeonorSol',1,'leonores@gmail.com',null,'España','32321212M',true);
    pruebas_posiblesfichajes.insertar('Insertar posible fichaje', 'BenitoMar',0,'benice@gmail.com',null,'España','52123212M',true);
    pruebas_posiblesfichajes.insertar('Insertar posible fichaje','HierbaBuena',0,'perez@gmail.com',null,'España','62129212H',true);
    pruebas_posiblesfichajes.insertar('Insertar posible fichaje','Shooter999',200,'alocao@gmail.com','Heretics','México','92127212K',true);
    pruebas_posiblesfichajes.insertar('Insertar posible fichaje','Illuminati555',100,'papateño@gmail.com','EchoFox','Ecuador','62129212H',true);
    pruebas_posiblesfichajes.insertar('Insertar posible fichaje','FIFAraul',330,'fisura@gmail.com','OpTic Gaming','Bolivia','62129212H',true);
    pruebas_posiblesfichajes.insertar('Insertar posible fichaje','Pepa123',450,'pepaa@gmail.com','Fnatic','España','52123212M',true);
    pruebas_posiblesfichajes.insertar('Insertar posible fichaje','Scott01',0,'scottilnn@gmail.com','100 Thieves','Italia','49121212M',true);
    pruebas_posiblesfichajes.insertar('Insertar posible fichaje','Expertx',240,'lepp@gmail.com','G2 Esports','España','92127212K',true);
    pruebas_posiblesfichajes.insertar('Insertar posible fichaje','Lerinasx',120,'leirep@gmail.com','CLG','Argentina','52123212M',true);
    pruebas_posiblesfichajes.insertar('Insertar posible fichaje','Amoledwera',160,'aromera@gmail.com','Liquid','España','62129212H',true);
    pruebas_posiblesfichajes.insertar('Insertar posible fichaje','Warnatione',400,'peoma@gmail.com','Cloud9','España','49121212M',true);
    pruebas_posiblesfichajes.insertar('Insertar posible fichaje','DevilBlownw',0,'pilir@gmail.com',null,'España','62129212H',true);
    pruebas_posiblesfichajes.insertar('Insertar posible fichaje', 'Sweetera',1,'rosaliav@gmail.com',null,'España','32321212M',true);
    pruebas_posiblesfichajes.insertar('Insertar posible fichaje', 'Soniazz',0,'sonialv@gmail.com',null,'España','49121212M',true);

  
        /* ======================================================== */
        /*                    INSERCIÓN DE PRODUCTOS                */
        /* ======================================================== */

    
    pruebas_productos.insertar('Insertar producto', 'Chandal club modelo niño', 45, 10, 'Ideal para hacer deporte', 'Textil', null, true);
    pruebas_productos.insertar('Insertar producto', 'Camiseta Fortnite', 20, 10, 'Disponible en varios colores', 'Textil', 1, true);
    pruebas_productos.insertar('Insertar producto', 'Raton pequeño', 50, 15, 'No ocupa mucho espacio', 'Electrónico', null, true);
    pruebas_productos.insertar('Insertar producto', 'Auriculares inalámbricos', 7, 10, 'Muy buena calidad de audio', 'Electrónico', null, true);
    pruebas_productos.insertar('Insertar producto', 'Bolígrafos Tetris', 3, 20, 'Disponible en 5 colores', 'Otros', 5, true);
    pruebas_productos.insertar('Insertar producto', 'Teclado RGB', 50, 5, 'Con sonidos especiales de los personajes del Mario Bros', 'Electrónico', 8, true);
    pruebas_productos.insertar('Insertar producto', 'Chandal club modelo adulto', 60, 10, 'Ideal para hacer deporte, disponible en varios colores', 'Textil', null, true);
    pruebas_productos.insertar('Insertar producto', 'Reloj pokemon', 37, 17, 'Posee dibujo de un pokemon aleatorio', 'Electrónico', 2, true);
    pruebas_productos.insertar('Insertar producto', 'Manta de pelos', 25, 10, 'Ideal para noches frías de invierno', 'Textil', null, true);
    pruebas_productos.insertar('Insertar producto', 'Funda móvil', 15, 30, 'Disponible para varios modelos', 'Otros', null, true);
    pruebas_productos.insertar('Insertar producto', 'Imán nevera', 2, 100, 'Decora tu nevera', 'Otros', null, true);
    pruebas_productos.insertar('Insertar producto', 'Camiseta LoL', 20, 50, 'Elígela de tu campeón favorito', 'Textil', 12, true);
    pruebas_productos.insertar('Insertar producto', 'Raton mediano', 15, 10, 'Con hasta 2000dpi', 'Electrónico', null, true);
    pruebas_productos.insertar('Insertar producto', 'Auriculares con cable', 3, 10, 'Calidad a un precio reduccido', 'Electrónico', null, true);
    pruebas_productos.insertar('Insertar producto', 'Pegatina LoL', 1, 200, 'Decora tus cuadernos', 'Otros', 12, true);
    pruebas_productos.insertar('Insertar producto', 'Teclado Mecánico', 150, 10, 'Teclado con cherry mx-Blue', 'Electrónico', null, true);
    pruebas_productos.insertar('Insertar producto', 'Chandal Logotipo', 75, 35, 'Branding, ideal para clientes', 'Textil', null, true);
    pruebas_productos.insertar('Insertar producto', 'Reloj WoW', 19, 8, 'Digital y totalmente metálico', 'Electrónico', 9, true);
    pruebas_productos.insertar('Insertar producto', 'Cantimplora LoL',5, 19, 'Ideal para ir de acampada', 'Otros', 12, true);
    pruebas_productos.insertar('Insertar producto', 'Funda tablet', 15, 20, 'Con bordes de silicona ajustable', 'Otros', null, true);
    pruebas_productos.insertar('Insertar producto', 'Luces Led', 45, 20, 'Ilumina tu cuarto', 'Electrónico', null, true);
    pruebas_productos.insertar('Insertar producto', 'Alfombrilla ratón', 4, 30, 'Antideslizante y de gran tamaño 16:9', 'Otros', null, true);
    pruebas_productos.insertar('Insertar producto', 'Taza sportacus', 7, 20, 'Desayuna de froma divertida', 'Otros', null, true);
    pruebas_productos.insertar('Insertar producto', 'Toalla Mario-Bros', 25, 8, 'Para llevarsela a la playa', 'Textil', 8, true);
    pruebas_productos.insertar('Insertar producto', 'Taza Lol',5, 20, 'Ideal para mojar las galletas', 'Otros', 12, true);
    pruebas_productos.insertar('Insertar producto', 'Lámpara Azul', 19, 10, 'Intensidad ajustable', 'Otros', null, true);
 

        /* ======================================================== */
        /*                  INSERCIÓN DE CLIENTE              */
        /* ======================================================== */


    pruebas_clientes.insertar('Insertar cliente', '45263455R', 'Lola', '996867543', 'lolaflores@gmail.com', true);
    pruebas_clientes.insertar('Insertar cliente', '53672388F', 'Ramón', '356673424', 'ramoncete@hotmail.com', true);
    pruebas_clientes.insertar('Insertar cliente', '46672388G', 'Pepe', '227673424', 'pepito@gmail.com', true);
    pruebas_clientes.insertar('Insertar cliente', '90022388F', 'Daniel', '248763424', 'danieeee@hotmail.com', true);
    pruebas_clientes.insertar('Insertar cliente', '65435288R', 'Lorenzo', '163453424', 'lorenxo@gmail.com', true);
    pruebas_clientes.insertar('Insertar cliente', '13672399P', 'Julio', '111373421', 'julio2509@hotmail.com', true);
    pruebas_clientes.insertar('Insertar cliente', '33372388P', 'Raquel', '2253443424', 'rakel.2@hotmail.com', true);
    pruebas_clientes.insertar('Insertar cliente', '22222388O', 'Clara', '999273424', 'claramh@gmail.com', true);
    pruebas_clientes.insertar('Insertar cliente', '53672388M', 'María', '446573424', 'meryrdgz@gmail.com', true);
    pruebas_clientes.insertar('Insertar cliente', '67263810L', 'Pablo', '666273426', 'pablito@hotmail.com', true);
    pruebas_clientes.insertar('Insertar cliente', '15243455R', 'Julián', '696867543', 'jul@gmail.com', true);
    pruebas_clientes.insertar('Insertar cliente', '23662388F', 'Sara', '653623424', 'sarita@hotmail.com', true);
    pruebas_clientes.insertar('Insertar cliente', '36622388G', 'Maribel', '663673424', 'lamari@gmail.com', true);
    pruebas_clientes.insertar('Insertar cliente', '50082388F', 'Javier', '647163424', 'javitoox@hotmail.com', true);
    pruebas_clientes.insertar('Insertar cliente', '85415288R', 'Pedro', '623953424', 'pedrito@gmail.com', true);
    pruebas_clientes.insertar('Insertar cliente', '23692399P', 'Isabel', '611673421', 'mariaisa@hotmail.com', true);
    pruebas_clientes.insertar('Insertar cliente', '43322388P', 'María', '6236443424', 'mery123@hotmail.com', true);
    pruebas_clientes.insertar('Insertar cliente', '51242388O', 'Óscar', '699273424', 'osquita@gmail.com', true);
    pruebas_clientes.insertar('Insertar cliente', '23662388M', 'Maria', '646873424', 'merytt@gmail.com', true);
    pruebas_clientes.insertar('Insertar cliente', '02283810W', 'Pablo', '666273427', 'pablohuelvav@hotmail.com', true);
    pruebas_clientes.insertar('Insertar cliente', '25213455R', 'Daniel', '697867543', 'dan@gmail.com', true);
    pruebas_clientes.insertar('Insertar cliente', '33692388F', 'Juan', '642673424', 'juanito33e@hotmail.com', true);
    pruebas_clientes.insertar('Insertar cliente', '76612388G', 'Manuel', '623673434', 'manolo@gmail.com', true);
    pruebas_clientes.insertar('Insertar cliente', '10002388F', 'Santiago', '645763494', 'santt19@hotmail.com', true);
    pruebas_clientes.insertar('Insertar cliente', '85415288C', 'Juan', '623453415', 'juanitoelcomecoco@gmail.com', true);
    pruebas_clientes.insertar('Insertar cliente', '24622390P', 'Julio', '991673421', 'ponciopilato@hotmail.com', true);
    pruebas_clientes.insertar('Insertar cliente', '53312380R', 'Miriam', '6233553124', 'miryy@hotmail.com', true);
    pruebas_clientes.insertar('Insertar cliente', '932123890', 'Laura', '699873435', 'laurelvan@gmail.com', true);
    pruebas_clientes.insertar('Insertar cliente', '12612388X', 'Pedro', '647373424', 'merydianox@gmail.com', true);
    pruebas_clientes.insertar('Insertar cliente', '97213821L', 'Alejandro','369689426', 'alexxxi@hotmail.com', true);
    pruebas_clientes.insertar('Insertar cliente', '75212455R', 'Pedro', '992862543', 'pedritoXD@hotmail.com', true);
    pruebas_clientes.insertar('Insertar cliente', '63612228F', 'Juan', '777713424', 'illojuan25@hotmail.com', true);
    pruebas_clientes.insertar('Insertar cliente', '46672378G', 'Pepe', '652373424', 'pepejaval@gmail.com', true);
    pruebas_clientes.insertar('Insertar cliente', '30045388F', 'María', '641763114', 'mollym@hotmail.com', true);
    pruebas_clientes.insertar('Insertar cliente', '05425299R', 'David', '680953424', 'davides@gmail.com', true);
    pruebas_clientes.insertar('Insertar cliente', '23602399P', 'Francisco','611603421', 'francisx@hotmail.com', true);
    pruebas_clientes.insertar('Insertar cliente', '93302588P', 'Alex', '623413424', 'alexitox@hotmail.com', true);
    pruebas_clientes.insertar('Insertar cliente', '31212388O', 'Muller','609673424', 'muller@gmail.com', true);
    pruebas_clientes.insertar('Insertar cliente', '13632388M', 'Daniel','646270424', 'dannn@gmail.com', true);
    pruebas_clientes.insertar('Insertar cliente', '62253812L', 'Pablo','960173426', 'pabloesco@hotmail.com', true);
    pruebas_clientes.insertar('Insertar cliente', '53212388P', 'Luis', '6231443124', 'luista@hotmail.com', true);
    pruebas_clientes.insertar('Insertar cliente', '22212388O', 'Fran', '691673424', 'francisk@gmail.com', true);
    pruebas_clientes.insertar('Insertar cliente', '23612388M', 'Julián', '606373424', 'juliano@gmail.com', true);
    pruebas_clientes.insertar('Insertar cliente', '27213810L', 'Fernando','369673026', 'fernafloo@hotmail.com', true);
    pruebas_clientes.insertar('Insertar cliente', '25213445R', 'Luisma', '692866541', 'luistaw@gmail.com', true);
    pruebas_clientes.insertar('Insertar cliente', '23911388F', 'Mónica', '654512423', 'moniquet@hotmail.com', true);
    pruebas_clientes.insertar('Insertar cliente', '36672388G', 'Laura', '653273429', 'laureltop@gmail.com', true);
    pruebas_clientes.insertar('Insertar cliente', '40042388F', 'Daniela', '641763324', 'daniela1234@hotmail.com', true);
    pruebas_clientes.insertar('Insertar cliente', '45425288R', 'Rosa', '620953421', 'rositaaa@gmail.com', true);
    pruebas_clientes.insertar('Insertar cliente', '53692399P', 'Carolina','612603420', 'caroline@hotmail.com', true);
    pruebas_clientes.insertar('Insertar cliente', '53302388P', 'Penélope', '623403404', 'reina@hotmail.com', true);
    pruebas_clientes.insertar('Insertar cliente', '51212388O', 'Mia','609623424','miamia@gmail.com', true);
    pruebas_clientes.insertar('Insertar cliente', '63632388M', 'Ingrid','606270424', 'wismichu@gmail.com', true);
    pruebas_clientes.insertar('Insertar cliente', '32253812L', 'Lizy','900173426', 'lizyp@hotmail.com', true);



        /* ======================================================== */
        /*                     INSERCIÓN DE PEDIDOS                 */
        /* ======================================================== */


   pruebas_pedidos.insertar('Insertar pedido',1,'01/02/2015', '40042388F', true);
   pruebas_pedidos.insertar('Insertar pedido',2,'02/02/2015', '51212388O', true);
   pruebas_pedidos.insertar('Insertar pedido',3,'03/03/2015', '40042388F', true);
   pruebas_pedidos.insertar('Insertar pedido',4,'04/04/2015', '76612388G', true);
   pruebas_pedidos.insertar('Insertar pedido',5,'05/05/2015', '45263455R', true);
   pruebas_pedidos.insertar('Insertar pedido',6,'06/05/2015', '10002388F', true);
   pruebas_pedidos.insertar('Insertar pedido',7,'06/05/2015', '45263455R', true);
   pruebas_pedidos.insertar('Insertar pedido',8,'07/06/2015', '22222388O', true);
   pruebas_pedidos.insertar('Insertar pedido',9,'07/06/2015', '45263455R', true);
   pruebas_pedidos.insertar('Insertar pedido',10,'08/07/2015', '51212388O', true);
   pruebas_pedidos.insertar('Insertar pedido',11,'01/02/2016', '45263455R', true);
   pruebas_pedidos.insertar('Insertar pedido',12,'02/02/2016', '76612388G', true);
   pruebas_pedidos.insertar('Insertar pedido',13,'03/03/2016', '40042388F', true);
   pruebas_pedidos.insertar('Insertar pedido',14,'04/04/2016', '45263455R', true);
   pruebas_pedidos.insertar('Insertar pedido',15,'05/05/2016', '10002388F', true);
   pruebas_pedidos.insertar('Insertar pedido',16,'06/05/2016', '76612388G', true);
   pruebas_pedidos.insertar('Insertar pedido',17,'06/05/2016', '45263455R', true);
   pruebas_pedidos.insertar('Insertar pedido',18,'07/06/2016', '22222388O', true);
   pruebas_pedidos.insertar('Insertar pedido',19,'07/06/2016', '51212388O', true);
   pruebas_pedidos.insertar('Insertar pedido',20,'08/07/2016', '45263455R', true);
   pruebas_pedidos.insertar('Insertar pedido',21,'09/07/2017','51212388O',true);
   pruebas_pedidos.insertar('Insertar pedido',22,'05/06/2017','45263455R',true);
   pruebas_pedidos.insertar('Insertar pedido',23,'06/04/2017','25213455R',true);
   pruebas_pedidos.insertar('Insertar pedido',24,'01/02/2017', '22222388O', true);
   pruebas_pedidos.insertar('Insertar pedido',25,'12/02/2017', '25213455R', true);
   pruebas_pedidos.insertar('Insertar pedido',26,'23/03/2018', '10002388F', true);
   pruebas_pedidos.insertar('Insertar pedido',27,'04/04/2018', '25213455R', true);
   pruebas_pedidos.insertar('Insertar pedido',28,'15/05/2018', '76612388G', true);
   pruebas_pedidos.insertar('Insertar pedido',29,'06/05/2018', '22222388O', true);
   pruebas_pedidos.insertar('Insertar pedido',30,'26/05/2018', '25213455R', true);
   pruebas_pedidos.insertar('Insertar pedido',31,'07/06/2018', '40042388F', true);
   pruebas_pedidos.insertar('Insertar pedido',32,'17/06/2018', '25213455R', true);
   pruebas_pedidos.insertar('Insertar pedido',33,'08/09/2018', '76612388G', true);
   pruebas_pedidos.insertar('Insertar pedido',34,'09/07/2018','25213455R',true);
   pruebas_pedidos.insertar('Insertar pedido',35,'05/06/2018','25213455R',true);
   pruebas_pedidos.insertar('Insertar pedido',36,'06/04/2018','10002388F',true);
   pruebas_pedidos.insertar('Insertar pedido',37,'01/02/2018', '25213455R', true);
   pruebas_pedidos.insertar('Insertar pedido',38,'12/02/2019', '76612388G', true);
   pruebas_pedidos.insertar('Insertar pedido',39,'23/03/2019', '25213455R', true);
   pruebas_pedidos.insertar('Insertar pedido',40,'04/04/2019', '40042388F', true);
   pruebas_pedidos.insertar('Insertar pedido',41,'15/05/2019', '25213455R', true);
   pruebas_pedidos.insertar('Insertar pedido',42,'06/05/2019', '25213455R', true);
   pruebas_pedidos.insertar('Insertar pedido',43,'26/05/2019', '22222388O', true);
   pruebas_pedidos.insertar('Insertar pedido',44,'07/06/2019', '51212388O', true);
   pruebas_pedidos.insertar('Insertar pedido',45,'17/06/2019', '25213455R', true);
   pruebas_pedidos.insertar('Insertar pedido',46,'08/09/2019', '10002388F', true);
   pruebas_pedidos.insertar('Insertar pedido',47,'09/07/2019','25213455R',true);
   pruebas_pedidos.insertar('Insertar pedido',48,'05/06/2019','22222388O',true);
   pruebas_pedidos.insertar('Insertar pedido',49,'06/04/2019','40042388F',true);


 

        /* ======================================================== */
        /*                INSERCIÓN DE LINEAS DE PEDIDOS            */
        /* ======================================================== */

    
    pruebas_lineasdepedidos.insertar('Insertar lineadepedido',2,'Camiseta Fortnite',1,true);
    pruebas_lineasdepedidos.insertar('Insertar lineadepedido',8,'Camiseta Fortnite',2,true);
    pruebas_lineasdepedidos.insertar('Insertar lineadepedido',7,'Bolígrafos Tetris',3,true);
    pruebas_lineasdepedidos.insertar('Insertar lineadepedido',8,'Funda móvil',4,true);
    pruebas_lineasdepedidos.insertar('Insertar lineadepedido',8,'Funda móvil',5,true);
    pruebas_lineasdepedidos.insertar('Insertar lineadepedido',8,'Funda móvil',6,true);
    pruebas_lineasdepedidos.insertar('Insertar lineadepedido',3,'Manta de pelos',7, true);
    pruebas_lineasdepedidos.insertar('Insertar lineadepedido',2,'Teclado RGB',8,true);
    pruebas_lineasdepedidos.insertar('Insertar lineadepedido',2,'Teclado RGB',9,true);
    pruebas_lineasdepedidos.insertar('Insertar lineadepedido',8,'Chandal club modelo adulto',10,true);
    pruebas_lineasdepedidos.insertar('Insertar lineadepedido',7,'Bolígrafos Tetris',13,true);
    pruebas_lineasdepedidos.insertar('Insertar lineadepedido',2,'Funda móvil',15,true);
    pruebas_lineasdepedidos.insertar('Insertar lineadepedido',1,'Funda móvil',16,true);
    pruebas_lineasdepedidos.insertar('Insertar lineadepedido',3,'Manta de pelos',17, true);
    pruebas_lineasdepedidos.insertar('Insertar lineadepedido',1,'Teclado RGB',18,true);
    pruebas_lineasdepedidos.insertar('Insertar lineadepedido',2,'Manta de pelos',19,true);
    pruebas_lineasdepedidos.insertar('Insertar lineadepedido',1,'Chandal club modelo adulto',20,true);
    pruebas_lineasdepedidos.insertar('Insertar lineadepedido',2,'Funda móvil',21,true);
    pruebas_lineasdepedidos.insertar('Insertar lineadepedido',8,'Chandal Logotipo',22,true);
    pruebas_lineasdepedidos.insertar('Insertar lineadepedido',4,'Bolígrafos Tetris',23,true);
    pruebas_lineasdepedidos.insertar('Insertar lineadepedido',2,'Alfombrilla ratón',24,true);
    pruebas_lineasdepedidos.insertar('Insertar lineadepedido',3,'Alfombrilla ratón',25,true);
    pruebas_lineasdepedidos.insertar('Insertar lineadepedido',8,'Imán nevera',26,true);
    pruebas_lineasdepedidos.insertar('Insertar lineadepedido',3,'Imán nevera',27, true);
    pruebas_lineasdepedidos.insertar('Insertar lineadepedido',2,'Imán nevera',28,true);
    pruebas_lineasdepedidos.insertar('Insertar lineadepedido',2,'Imán nevera',29,true);
    pruebas_lineasdepedidos.insertar('Insertar lineadepedido',8,'Imán nevera',30,true);
    pruebas_lineasdepedidos.insertar('Insertar lineadepedido',2,'Pegatina LoL',31,true);
    pruebas_lineasdepedidos.insertar('Insertar lineadepedido',8,'Pegatina LoL',32,true);
    pruebas_lineasdepedidos.insertar('Insertar lineadepedido',7,'Pegatina LoL',33,true);
    pruebas_lineasdepedidos.insertar('Insertar lineadepedido',8,'Pegatina LoL',34,true);
    pruebas_lineasdepedidos.insertar('Insertar lineadepedido',8,'Pegatina LoL',35,true);
    pruebas_lineasdepedidos.insertar('Insertar lineadepedido',1,'Funda tablet',36,true);
    pruebas_lineasdepedidos.insertar('Insertar lineadepedido',3,'Funda tablet',37, true);
    pruebas_lineasdepedidos.insertar('Insertar lineadepedido',2,'Funda tablet',38,true);
    pruebas_lineasdepedidos.insertar('Insertar lineadepedido',2,'Funda tablet',39,true);
    pruebas_lineasdepedidos.insertar('Insertar lineadepedido',8,'Teclado Mecánico',40,true);
    pruebas_lineasdepedidos.insertar('Insertar lineadepedido',2,'Teclado Mecánico',41,true);
    pruebas_lineasdepedidos.insertar('Insertar lineadepedido',3,'Alfombrilla ratón',42,true);
    pruebas_lineasdepedidos.insertar('Insertar lineadepedido',1,'Alfombrilla ratón',43,true);
    pruebas_lineasdepedidos.insertar('Insertar lineadepedido',2,'Alfombrilla ratón',44,true);
    pruebas_lineasdepedidos.insertar('Insertar lineadepedido',3,'Raton pequeño',45,true);
    pruebas_lineasdepedidos.insertar('Insertar lineadepedido',2,'Raton pequeño',46,true);
    pruebas_lineasdepedidos.insertar('Insertar lineadepedido',1,'Raton pequeño',47, true);
    pruebas_lineasdepedidos.insertar('Insertar lineadepedido',2,'Pegatina LoL',48,true);
    pruebas_lineasdepedidos.insertar('Insertar lineadepedido',2,'Pegatina LoL',49,true);
    
    oid_lp := SEC_OID_LP.currval;

	

  

END;