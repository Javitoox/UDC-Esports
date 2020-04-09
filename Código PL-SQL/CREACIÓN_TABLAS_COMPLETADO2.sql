---------------------------------------------------------------------
----------------------ELIMINACIÓN DE TABLAS--------------------------
---------------------------------------------------------------------
drop table Seguimientos;
drop table Usuarios;
drop table LineasDePedidos;
drop table Pedidos;
drop table Clientes;
drop table Productos;
drop table PosiblesFichajes;
drop table Encuestas;
drop table RedesSociales;
drop table Adscripciones;
drop table Partidos;
drop table Competiciones;
drop table Estadisticas;
drop table Ojeadores;
drop table Entrenadores;
drop table Jugadores;
drop table Videojuegos;

---------------------------------------------------------------------
------------------------CREACIÓN DE TABLAS---------------------------
---------------------------------------------------------------------
---*NUEVO*---
create table Usuarios
(dniUsuario varchar2(30),
nombreCompletoUsuario varchar2(75),
nickUsuario varchar2(50),
emailUsuario varchar2(75),
numTelefonoUsuario varchar2(15),
passUsuario varchar2(75),
confirmPassUsuario varchar2(75)
);
---------------------------------------------------------------------
create table Videojuegos
(OID_V integer,
nombreVideojuego varchar2(100),
fechaCreacion date,
introduccion varchar2(20)
);
---------------------------------------------------------------------
create table Jugadores
(dniJugador varchar2(30),
nombreJugador varchar2(50),
salarioJugador number(10,2),
numTelefonoJugador varchar2(15),
numAñosExperienciaJugador integer,
correoElectronicoJugador varchar2(50),
fechaEntrada date,
nombreVirtualJugador varchar2(20),
numRegalos integer,
nacionalidadJugador varchar2(100),
OID_V integer
);
---------------------------------------------------------------------
---*NUEVO*---
create table Seguimientos
(OID_SEG integer,
dniUsuario varchar2(30),
dniJugador varchar2(30),
opinion clob
);
---------------------------------------------------------------------
create table Entrenadores
(dniEntrenador varchar2(30),
nombreEntrenador varchar2(50),
salarioEntrenador number(10,2),
numTelefonoEntrenador varchar2(15),
numAñosExperienciaEntrenador integer,
correoElectronicoEntrenador varchar2(50),
nacionalidadEntrenador varchar2(100),
OID_V integer
);
---------------------------------------------------------------------
create table Ojeadores
(dniOjeador varchar2(30),
nombreOjeador varchar2(50),
salarioOjeador number(10,2),
numTelefonoOjeador varchar2(15),
numAñosExperienciaOjeador integer,
correoElectronicoOjeador varchar2(50),
nacionalidadOjeador varchar2(100),
OID_V integer
);
---------------------------------------------------------------------
create table Estadisticas
(OID_E integer,
ganado char(1),
tiempoDeJuego integer, --tiempo de juego en minutos
valoracion integer,
racha integer
); 
---------------------------------------------------------------------
create table Competiciones
(OID_COM integer,
nombreCompeticion varchar2(50),
premio number(10,2),
fechaCompeticion date,
costeInscripcion number(10,2),
ganada char(1)
); 
---------------------------------------------------------------------
create table Partidos
(OID_V integer,
OID_COM integer,
OID_E integer,
lugar varchar2(50),
fechaHora timestamp,
medio varchar2(50)
); 
---------------------------------------------------------------------
create table Adscripciones
(OID_AD integer,
fecha date,
fechaBaja date,
dniJugador varchar2(30), 
OID_COM integer
);
----------------------------------------------------------------------
create table RedesSociales
(nombreVirtualRed varchar2(50),
fechaCreacionRed date,
numSeguidores integer,
tipoRed varchar2(50),
dniJugador varchar2(30),
dniEntrenador varchar2(30)
);
-----------------------------------------------------------------------
create table Encuestas
(OID_EN integer,
fechaInicio date,
fechaFin date,
tipo varchar2(70),
nombreVirtualRed varchar2(50),
tipoRed varchar2(50)
);
------------------------------------------------------------------------
create table PosiblesFichajes
(nombreVirtual varchar2(50),
clausula number(10,2),
correo varchar2(100),
club varchar2(50),
nacionalidad varchar2(100),
dniOjeador varchar2(30)
);
-------------------------------------------------------------------------
create table Productos 
(nombreProducto varchar2(100),
precio number(10,2),
stock integer,
descripcion varchar2(1000),
tipoProducto varchar2(50),
OID_V integer
);
--------------------------------------------------------------------------
create table Clientes
(dniCliente varchar2(30),
nombreCompleto varchar2(100),
numTelefonoCliente varchar2(15),
correoCliente varchar2(100)
);
--------------------------------------------------------------------------
create table Pedidos
(identificador integer,
fechaPedido date,
dniCliente varchar2(30)
);
--------------------------------------------------------------------------
create table LineasDePedidos
(OID_LP integer,
cantidad integer,
subtotal number(10,2),
nombreProducto varchar2(50),
identificador integer
);

---------------------------------------------------------------------
-----------------------ATRIBUTOS NO NULOS----------------------------
---------------------------------------------------------------------

--Videojuegos
alter table Videojuegos modify (nombreVideojuego not null);
alter table Videojuegos modify (fechaCreacion not null);
alter table Videojuegos modify (introduccion not null);

--Jugadores
alter table Jugadores modify (nombreJugador not null);
alter table Jugadores modify (salarioJugador not null);
alter table Jugadores modify (numTelefonoJugador not null);
alter table Jugadores modify (numAñosExperienciaJugador not null);
alter table Jugadores modify (correoElectronicoJugador not null);
alter table Jugadores modify (nombreVirtualJugador not null);
alter table Jugadores modify (numRegalos not null);
alter table Jugadores modify (nacionalidadJugador not null);
alter table Jugadores modify (OID_V not null);

--Entrenadores
alter table Entrenadores modify (nombreEntrenador not null);
alter table Entrenadores modify (salarioEntrenador not null);
alter table Entrenadores modify (numTelefonoEntrenador not null);
alter table Entrenadores modify (numAñosExperienciaEntrenador not null);
alter table Entrenadores modify (correoElectronicoEntrenador not null);
alter table Entrenadores modify (nacionalidadEntrenador not null);
alter table Entrenadores modify (OID_V not null);

--Ojeadores
alter table Ojeadores modify (nombreOjeador not null);
alter table Ojeadores modify (salarioOjeador not null);
alter table Ojeadores modify (numTelefonoOjeador not null);
alter table Ojeadores modify (numAñosExperienciaOjeador not null);
alter table Ojeadores modify (correoElectronicoOjeador not null);
alter table Ojeadores modify (nacionalidadOjeador not null);
alter table Ojeadores modify (OID_V not null);

--Estadisticas
alter table Estadisticas modify (ganado not null);
alter table Estadisticas modify (tiempoDeJuego not null);
alter table Estadisticas modify (valoracion not null);
alter table Estadisticas modify (racha not null);

--Competiciones
alter table Competiciones modify (nombreCompeticion not null);
alter table Competiciones modify (premio not null);
alter table Competiciones modify (fechaCompeticion not null);
alter table Competiciones modify (costeInscripcion not null);

--Partidos
alter table Partidos modify (OID_COM not null);
alter table Partidos modify (lugar not null);
alter table Partidos modify (medio not null);

--Adscripciones
alter table Adscripciones modify (fecha not null);
alter table Adscripciones modify (dniJugador not null);
alter table Adscripciones modify (OID_COM not null);

--RedesSociales
alter table RedesSociales modify (fechaCreacionRed not null);
alter table RedesSociales modify (numSeguidores not null);

--Encuestas
alter table Encuestas modify (fechaInicio not null);
alter table Encuestas modify (fechaFin not null);
alter table Encuestas modify (tipo not null);
alter table Encuestas modify (nombreVirtualRed not null);
alter table Encuestas modify (tipoRed not null);

--PosiblesFichajes
alter table PosiblesFichajes modify (clausula not null);
alter table PosiblesFichajes modify (nacionalidad not null);

--Productos
alter table Productos modify (precio not null);
alter table Productos modify (stock not null);
alter table Productos modify (descripcion not null);
alter table Productos modify (tipoProducto not null);

--Clientes
alter table Clientes modify (nombreCompleto not null);
alter table Clientes modify (numTelefonoCliente not null);
alter table Clientes modify (correoCliente not null);

--Pedidos
alter table Pedidos modify (fechaPedido not null);
alter table Pedidos modify (dniCliente not null);

--LineasDePedidos
alter table LineasDePedidos modify (cantidad not null);
alter table LineasDePedidos modify (subtotal not null);
alter table LineasDePedidos modify (nombreProducto not null);
alter table LineasDePedidos modify (identificador not null);

---------------------------------------------------------------------
------------------------CLAVES PRIMARIAS-----------------------------
---------------------------------------------------------------------
--Usuarios
alter table Usuarios add constraint PK_Usuarios primary key (dniUsuario);
--Videojuegos
alter table Videojuegos add constraint PK_Videojuegos primary key (OID_V);
--Jugadores
alter table Jugadores add constraint PK_Jugadores primary key (dniJugador);
--Seguimientos
alter table Seguimientos add constraint PK_Seguimientos primary key (OID_SEG);
--Entrenadores
alter table Entrenadores add constraint PK_Entrenadores primary key (dniEntrenador);
--Ojeadores
alter table Ojeadores add constraint PK_Ojeadores primary key (dniOjeador);
--Estadisticas
alter table Estadisticas add constraint PK_Estadisticas primary key (OID_E);
--Competiciones
alter table Competiciones add constraint PK_Competiciones primary key (OID_COM);
--Partidos
alter table Partidos add constraint PK_Partidos primary key (fechaHora,OID_V);
--Adscripciones
alter table Adscripciones add constraint PK_Adscripciones primary key (OID_AD);
--RedesSociales
alter table RedesSociales add constraint PK_RedesSociales primary key (nombreVirtualRed,tipoRed);
--Encuestas
alter table Encuestas add constraint PK_Encuestas primary key (OID_EN);
--PosiblesFichajes
alter table PosiblesFichajes add constraint PK_PosiblesFichajes primary key (nombreVirtual,dniOjeador);
--Productos
alter table Productos add constraint PK_Productos primary key (nombreProducto);
--Clientes
alter table Clientes add constraint PK_Clientes primary key (dniCliente);
--Pedidos
alter table Pedidos add constraint PK_Pedidos primary key (identificador);
--LineasDePedidos
alter table LineasDePedidos add constraint PK_LineasDePedidos primary key (OID_LP);

---------------------------------------------------------------------
------------------------CLAVES ALTERNATIVAS--------------------------
---------------------------------------------------------------------

--Videojuegos
alter table Videojuegos add constraint AK_Videojuegos_nombre unique (nombreVideojuego);
--Jugadores
alter table Jugadores add constraint AK_Jugadores_correo unique (correoElectronicoJugador);
alter table Jugadores add constraint AK_Jugadores_nombreVirtual_v unique (nombreVirtualJugador,OID_V);
alter table Jugadores add constraint AK_Jugadores_telefono unique (numTelefonoJugador);
--Entrenadores
alter table Entrenadores add constraint AK_Entrenadores_correo unique (correoElectronicoEntrenador);
alter table Entrenadores add constraint AK_Entrenadores_telefono unique (numTelefonoEntrenador);
--Ojeadores
alter table Ojeadores add constraint AK_Ojeadores_correo unique (correoElectronicoOjeador);
alter table Ojeadores add constraint AK_Ojeadores_telefono unique (numTelefonoOjeador);
--Competiciones
alter table Competiciones add constraint AK_Competiciones_nombre_fecha unique (nombreCompeticion,fechaCompeticion);
--Protuctos
alter table Productos add constraint AK_Productos_descripcion unique (descripcion);
--Clientes
alter table Clientes add constraint AK_Clientes_correo unique (correoCliente);
alter table Clientes add constraint AK_Clientes_telefono unique (numTelefonoCliente);
--LineasDePedidos
alter table LineasDePedidos add constraint AK_LineasDePedidos_producto_id unique (nombreProducto,identificador);
--Triggers para asegurar que el correo y el teléfono de jugadores,entrenadores,ojeadores y posibles fichajes sean distintos

---------------------------------------------------------------------
--------------------------CLAVES AJENAS------------------------------
---------------------------------------------------------------------

--Jugadores
alter table Jugadores add constraint FK_Jugadores_videojuegos foreign key (OID_V) references Videojuegos on delete cascade;
--Seguimientos
alter table Seguimientos add constraint FK_Seguimientos_usuarios foreign key (dniUsuario) references Usuarios on delete cascade;
alter table Seguimientos add constraint FK_Seguimientos_jugadores foreign key (dniJugador) references Jugadores on delete cascade;
--Entrenadores
alter table Entrenadores add constraint FK_Entrenadores_videojuegos foreign key (OID_V) references Videojuegos on delete cascade;
--Ojeadores
alter table Ojeadores add constraint FK_Ojeadores_videojuegos foreign key (OID_V) references Videojuegos on delete cascade;
--Partidos
alter table Partidos add constraint FK_Partidos_videojuegos foreign key (OID_V) references Videojuegos on delete cascade;
alter table Partidos add constraint FK_Partidos_competiciones foreign key (OID_COM) references Competiciones on delete cascade;
alter table Partidos add constraint FK_Partidos_estadisticas foreign key (OID_E) references Estadisticas on delete cascade;
--Adscripciones
alter table Adscripciones add constraint FK_Adscripciones_competiciones foreign key (OID_COM) references 
Competiciones on delete cascade;
alter table Adscripciones add constraint FK_Adscripciones_jugadores foreign key (dniJugador) references Jugadores on delete cascade;
--RedesSociales
alter table RedesSociales add constraint FK_RedesSociales_jugadores foreign key (dniJugador) references Jugadores on delete cascade;
alter table RedesSociales add constraint FK_RedesSociales_entrenadores foreign key (dniEntrenador) references 
Entrenadores on delete cascade;
--Encuestas
alter table Encuestas add constraint FK_Encuestas_redes foreign key (nombreVirtualRed,tipoRed) references RedesSociales 
on delete cascade;
--PosiblesFichajes
alter table PosiblesFichajes add constraint FK_PosiblesFichajes_ojeadores foreign key (dniOjeador) references Ojeadores 
on delete cascade;
--Productos
alter table Productos add constraint FK_Productos_videojuegos foreign key (OID_V) references Videojuegos on delete cascade;
--Pedidos
alter table Pedidos add constraint FK_Pedidos_clientes foreign key (dniCliente) references Clientes on delete cascade;
--LineasDePedidos
alter table LineasDePedidos add constraint FK_LineasDePedidos_productos foreign key (nombreProducto) 
references Productos on delete cascade;
alter table LineasDePedidos add constraint FK_LineasDePedidos_pedidos foreign key (identificador) 
references Pedidos on delete cascade;

---------------------------------------------------------------------
--------------------------RESTRICCIONES------------------------------
---------------------------------------------------------------------

--Usuarios
alter table Usuarios add constraint Email_Usuarios check (regexp_like
(emailUsuario, '.*@.*\..+'));
--Videojuegos
alter table Videojuegos add constraint TipoIntroduccion check (introduccion in('Encuesta', 'PropioDelClub'));
--Jugadores
alter table Jugadores add constraint Correo_Jugadores check (regexp_like
(correoElectronicoJugador, '.*@.*\..+'));
alter table Jugadores add constraint NacionalidadJugador check (nacionalidadJugador in 
('Afganistán','Albania','Alemania','Andorra','Angola','Antigua y Barbuda','Arabia Saudita','Argelia','Argentina',
'Armenia','Australia','Austria','Azerbaiyán','Bahamas','Bangladés','Barbados','Baréin','Bélgica','Belice','Benín',
'Bielorrusia','Birmania','Bolivia','Bosnia y Herzegovina','Botsuana','Brasil','Brunéi','Bulgaria','Burkina Faso',
'Burundi','Bután','Cabo Verde','Camboya','Camerún','Canadá','Catar','Chad','Chile','China','Chipre','Ciudad del Vaticano',
'Colombia','Comoras','Corea del Norte','Corea del Sur','Costa de Marfil',
'Costa Rica','Croacia','Cuba','Dinamarca','Dominica','Ecuador','Egipto','El Salvador',
'Emiratos Árabes Unidos','Eritrea','Eslovaquia','Eslovenia','España','Estados Unidos',
'Estonia','Etiopía','Filipinas','Finlandia','Fiyi','Francia','Gabón','Gambia','Georgia',
'Ghana','Granada','Grecia','Guatemala','Guyana','Guinea','Guinea ecuatorial','Guinea-Bisáu',
'Haití','Honduras','Hungría','India','Indonesia','Irak','Irán','Irlanda','Islandia','Islas Marshall',
'Islas Salomón','Israel','Italia','Jamaica','Japón','Jordania','Kazajistán','Kenia','Kirguistán','Kiribati','Kuwait',
'Laos','Lesoto','Letonia','Líbano','Liberia','Libia','Liechtenstein','Lituania','Luxemburgo',
'Macedonia del Norte','Madagascar','Malasia','Malaui','Maldivas','Malí','Malta','Marruecos',
'Mauricio','Mauritana','México','Micronesia','Moldavia','Mónaco','Mongolia','Montenegro',
'Mozambique','Namibia','Nauru','Nepal','Nicaragua','Níger','Nigeria','Noruega','Nueva Zelanda',
'Omán','Países Bajos','Pakistán','Palaos','Panamá','Papúa Nueva Guinea','Paraguay','Perú',
'Polonia','Portugal','Reino Unido','República Centroafricana','República Checa',
'República del Congo','República Democrática del Congo',
'República Dominicana','República Sudafricana','Ruanda','Rumanía','Rusia',
'Samoa','San Cristóbal y Nieves','San Marino','San Vicente y las Granadinas',
'Santa Lucía','Santo Tomé y Príncipe','Senegal','Serbia','Seychelles','Sierra Leona',
'Singapur','Siria','Somalia','Sri Lanka','Suazilandia','Sudán','Sudán del Sur','Suecia',
'Suiza','Surinam','Tailandia','Tanzania','Tayikistán','Timor Oriental','Togo','Tonga',
'Trinidad y Tobago','Túnez','Turkmenistán','Turquía','Tuvalu','Ucrania','Uganda','Uruguay',
'Uzbekistán','Vanuatu','Venezuela','Vietnam',
'Yemen','Yibuti','Zambia','Zimbabue'));
--Entrenadores
alter table Entrenadores add constraint Correo_Entrenadores check (regexp_like
(correoElectronicoEntrenador, '.*@.*\..+'));
alter table Entrenadores add constraint NacionalidadEntrenador check (nacionalidadEntrenador in 
('Afganistán','Albania','Alemania','Andorra','Angola','Antigua y Barbuda','Arabia Saudita','Argelia','Argentina',
'Armenia','Australia','Austria','Azerbaiyán','Bahamas','Bangladés','Barbados','Baréin','Bélgica','Belice','Benín',
'Bielorrusia','Birmania','Bolivia','Bosnia y Herzegovina','Botsuana','Brasil','Brunéi','Bulgaria','Burkina Faso',
'Burundi','Bután','Cabo Verde','Camboya','Camerún','Canadá','Catar','Chad','Chile','China','Chipre','Ciudad del Vaticano',
'Colombia','Comoras','Corea del Norte','Corea del Sur','Costa de Marfil',
'Costa Rica','Croacia','Cuba','Dinamarca','Dominica','Ecuador','Egipto','El Salvador',
'Emiratos Árabes Unidos','Eritrea','Eslovaquia','Eslovenia','España','Estados Unidos',
'Estonia','Etiopía','Filipinas','Finlandia','Fiyi','Francia','Gabón','Gambia','Georgia',
'Ghana','Granada','Grecia','Guatemala','Guyana','Guinea','Guinea ecuatorial','Guinea-Bisáu',
'Haití','Honduras','Hungría','India','Indonesia','Irak','Irán','Irlanda','Islandia','Islas Marshall',
'Islas Salomón','Israel','Italia','Jamaica','Japón','Jordania','Kazajistán','Kenia','Kirguistán','Kiribati','Kuwait',
'Laos','Lesoto','Letonia','Líbano','Liberia','Libia','Liechtenstein','Lituania','Luxemburgo',
'Macedonia del Norte','Madagascar','Malasia','Malaui','Maldivas','Malí','Malta','Marruecos',
'Mauricio','Mauritana','México','Micronesia','Moldavia','Mónaco','Mongolia','Montenegro',
'Mozambique','Namibia','Nauru','Nepal','Nicaragua','Níger','Nigeria','Noruega','Nueva Zelanda',
'Omán','Países Bajos','Pakistán','Palaos','Panamá','Papúa Nueva Guinea','Paraguay','Perú',
'Polonia','Portugal','Reino Unido','República Centroafricana','República Checa',
'República del Congo','República Democrática del Congo',
'República Dominicana','República Sudafricana','Ruanda','Rumanía','Rusia',
'Samoa','San Cristóbal y Nieves','San Marino','San Vicente y las Granadinas',
'Santa Lucía','Santo Tomé y Príncipe','Senegal','Serbia','Seychelles','Sierra Leona',
'Singapur','Siria','Somalia','Sri Lanka','Suazilandia','Sudán','Sudán del Sur','Suecia',
'Suiza','Surinam','Tailandia','Tanzania','Tayikistán','Timor Oriental','Togo','Tonga',
'Trinidad y Tobago','Túnez','Turkmenistán','Turquía','Tuvalu','Ucrania','Uganda','Uruguay',
'Uzbekistán','Vanuatu','Venezuela','Vietnam',
'Yemen','Yibuti','Zambia','Zimbabue'));
--Ojeadores
alter table Ojeadores add constraint Correo_Ojeadores check (regexp_like
(correoElectronicoOjeador, '.*@.*\..+'));
alter table Ojeadores add constraint NacionalidadOjeador check (nacionalidadOjeador in 
('Afganistán','Albania','Alemania','Andorra','Angola','Antigua y Barbuda','Arabia Saudita','Argelia','Argentina',
'Armenia','Australia','Austria','Azerbaiyán','Bahamas','Bangladés','Barbados','Baréin','Bélgica','Belice','Benín',
'Bielorrusia','Birmania','Bolivia','Bosnia y Herzegovina','Botsuana','Brasil','Brunéi','Bulgaria','Burkina Faso',
'Burundi','Bután','Cabo Verde','Camboya','Camerún','Canadá','Catar','Chad','Chile','China','Chipre','Ciudad del Vaticano',
'Colombia','Comoras','Corea del Norte','Corea del Sur','Costa de Marfil',
'Costa Rica','Croacia','Cuba','Dinamarca','Dominica','Ecuador','Egipto','El Salvador',
'Emiratos Árabes Unidos','Eritrea','Eslovaquia','Eslovenia','España','Estados Unidos',
'Estonia','Etiopía','Filipinas','Finlandia','Fiyi','Francia','Gabón','Gambia','Georgia',
'Ghana','Granada','Grecia','Guatemala','Guyana','Guinea','Guinea ecuatorial','Guinea-Bisáu',
'Haití','Honduras','Hungría','India','Indonesia','Irak','Irán','Irlanda','Islandia','Islas Marshall',
'Islas Salomón','Israel','Italia','Jamaica','Japón','Jordania','Kazajistán','Kenia','Kirguistán','Kiribati','Kuwait',
'Laos','Lesoto','Letonia','Líbano','Liberia','Libia','Liechtenstein','Lituania','Luxemburgo',
'Macedonia del Norte','Madagascar','Malasia','Malaui','Maldivas','Malí','Malta','Marruecos',
'Mauricio','Mauritana','México','Micronesia','Moldavia','Mónaco','Mongolia','Montenegro',
'Mozambique','Namibia','Nauru','Nepal','Nicaragua','Níger','Nigeria','Noruega','Nueva Zelanda',
'Omán','Países Bajos','Pakistán','Palaos','Panamá','Papúa Nueva Guinea','Paraguay','Perú',
'Polonia','Portugal','Reino Unido','República Centroafricana','República Checa',
'República del Congo','República Democrática del Congo',
'República Dominicana','República Sudafricana','Ruanda','Rumanía','Rusia',
'Samoa','San Cristóbal y Nieves','San Marino','San Vicente y las Granadinas',
'Santa Lucía','Santo Tomé y Príncipe','Senegal','Serbia','Seychelles','Sierra Leona',
'Singapur','Siria','Somalia','Sri Lanka','Suazilandia','Sudán','Sudán del Sur','Suecia',
'Suiza','Surinam','Tailandia','Tanzania','Tayikistán','Timor Oriental','Togo','Tonga',
'Trinidad y Tobago','Túnez','Turkmenistán','Turquía','Tuvalu','Ucrania','Uganda','Uruguay',
'Uzbekistán','Vanuatu','Venezuela','Vietnam',
'Yemen','Yibuti','Zambia','Zimbabue'));
--Estadisticas
alter table Estadisticas add constraint Valoracion check (valoracion between 0 and 5);
alter table Estadisticas add constraint VerdaderoFalsoEstadistica check (ganado in ('1','0'));
--Competiciones
alter table Competiciones add constraint VerdaderoFalsoCompeticion check (ganada in ('1','0'));
--Partidos
alter table Partidos add constraint TipoTransmision check (medio in('Twitch', 'Radio','Televisado'));
--RedesSociales
alter table RedesSociales add constraint TipoRedSocial check(tipoRed in('YouTube','Twitter','QQ','Instagram',
'Google+','Twitch','Reddit','4chan','VK','WeChat','LinkedIn','Flickr',
'Telegram','Facebook'));
alter table RedesSociales add constraint Relacion check ((dniJugador is null and dniEntrenador is not null) 
or (dniEntrenador is null and dniJugador is not null));
--Encuestas
alter table Encuestas add constraint TipoEncuesta check(tipo in ('Informativa','Popular','IntroducciónNuevaLínea'));
--PosiblesFichajes
alter table PosiblesFichajes add constraint Correo_PosiblesFichajes check (regexp_like
(correo, '.*@.*\..+'));
alter table PosiblesFichajes add constraint NacionalidadPosibleFichaje check (nacionalidad in 
('Afganistán','Albania','Alemania','Andorra','Angola','Antigua y Barbuda','Arabia Saudita','Argelia','Argentina',
'Armenia','Australia','Austria','Azerbaiyán','Bahamas','Bangladés','Barbados','Baréin','Bélgica','Belice','Benín',
'Bielorrusia','Birmania','Bolivia','Bosnia y Herzegovina','Botsuana','Brasil','Brunéi','Bulgaria','Burkina Faso',
'Burundi','Bután','Cabo Verde','Camboya','Camerún','Canadá','Catar','Chad','Chile','China','Chipre','Ciudad del Vaticano',
'Colombia','Comoras','Corea del Norte','Corea del Sur','Costa de Marfil',
'Costa Rica','Croacia','Cuba','Dinamarca','Dominica','Ecuador','Egipto','El Salvador',
'Emiratos Árabes Unidos','Eritrea','Eslovaquia','Eslovenia','España','Estados Unidos',
'Estonia','Etiopía','Filipinas','Finlandia','Fiyi','Francia','Gabón','Gambia','Georgia',
'Ghana','Granada','Grecia','Guatemala','Guyana','Guinea','Guinea ecuatorial','Guinea-Bisáu',
'Haití','Honduras','Hungría','India','Indonesia','Irak','Irán','Irlanda','Islandia','Islas Marshall',
'Islas Salomón','Israel','Italia','Jamaica','Japón','Jordania','Kazajistán','Kenia','Kirguistán','Kiribati','Kuwait',
'Laos','Lesoto','Letonia','Líbano','Liberia','Libia','Liechtenstein','Lituania','Luxemburgo',
'Macedonia del Norte','Madagascar','Malasia','Malaui','Maldivas','Malí','Malta','Marruecos',
'Mauricio','Mauritana','México','Micronesia','Moldavia','Mónaco','Mongolia','Montenegro',
'Mozambique','Namibia','Nauru','Nepal','Nicaragua','Níger','Nigeria','Noruega','Nueva Zelanda',
'Omán','Países Bajos','Pakistán','Palaos','Panamá','Papúa Nueva Guinea','Paraguay','Perú',
'Polonia','Portugal','Reino Unido','República Centroafricana','República Checa',
'República del Congo','República Democrática del Congo',
'República Dominicana','República Sudafricana','Ruanda','Rumanía','Rusia',
'Samoa','San Cristóbal y Nieves','San Marino','San Vicente y las Granadinas',
'Santa Lucía','Santo Tomé y Príncipe','Senegal','Serbia','Seychelles','Sierra Leona',
'Singapur','Siria','Somalia','Sri Lanka','Suazilandia','Sudán','Sudán del Sur','Suecia',
'Suiza','Surinam','Tailandia','Tanzania','Tayikistán','Timor Oriental','Togo','Tonga',
'Trinidad y Tobago','Túnez','Turkmenistán','Turquía','Tuvalu','Ucrania','Uganda','Uruguay',
'Uzbekistán','Vanuatu','Venezuela','Vietnam',
'Yemen','Yibuti','Zambia','Zimbabue'));
--Productos
alter table Productos add constraint TipoProducto check(tipoProducto in('Electrónico','Textil','Otros'));
--Clientes
alter table Clientes add constraint Correo_Clientes check (regexp_like
(correoCliente, '.*@.*\..+'));

---------------------------------------------------------------------
---------------ATRIBUTOS ÚNICOS(NO CLAVES ALTERNATIVAS)--------------
---------------------------------------------------------------------

--Partidos
alter table Partidos add constraint ATRIBUTO_UNICO_estadistica unique (OID_E);
--PosiblesFichajes
alter table PosiblesFichajes add constraint ATRIBUTO_UNICO_correo unique (correo);

