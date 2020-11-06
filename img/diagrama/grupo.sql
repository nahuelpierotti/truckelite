create database truckelite;
use truckelite;

create table Usuario(
 id_usuario integer,
 dni integer,
 user_name varchar(50),
 rol varchar(60),
 nombre varchar(50),
 telefono integer,
 mail varchar(60),
 clave varchar(40),
primary key (id_usuario));


CREATE TABLE Supervisor(
id_usuario integer,
PRIMARY KEY(id_usuario),
FOREIGN KEY (id_usuario) references Usuario(id_usuario)
); 

CREATE TABLE Chofer(
id_usuario integer,
Licencia varchar(50),
PRIMARY KEY(id_usuario),
FOREIGN KEY (id_usuario) references Usuario(id_usuario)
); 


CREATE TABLE Mecanico(
id_usuario integer,
PRIMARY KEY(id_usuario),
FOREIGN KEY (id_usuario) references Usuario(id_usuario)
); 


CREATE TABLE Administrador(
id_usuario integer,
PRIMARY KEY(id_usuario),
FOREIGN KEY (id_usuario) references Usuario(id_usuario)
); 




create table Vehiculo(
id_vehiculo integer,
calendario_service date,
posicion_actual varchar(100),
reportes varchar(70),
alarmas varchar(50),
estado boolean,
primary key(id_vehiculo)
);


create table Tractor(
patente varchar(20),
motor varchar(50),
chasis varchar(50),
modelo varchar(50),
marca varchar (50),
id_vehiculo integer,
primary key (patente),
foreign key(id_vehiculo)references Vehiculo(id_vehiculo));

create table Acoplado(
patente_acoplado varchar(50),
tipo varchar(50),
chasis_acoplado varchar(50),
patente_t varchar(20),
primary key (patente_acoplado),
foreign key(patente_t) references Tractor(patente));

create table Mantenimiento(
fecha_sevice date,
km_unidad double,
costo double,
interno_externo varchar(50),
repuestos_cambiados integer,
id_mantenimiento integer,
id_mecanico integer,
id_vehiculo integer,
primary key(id_mantenimiento),
foreign key (id_mecanico)references Mecanico(id_usuario),
foreign key(id_vehiculo)references Vehiculo(id_vehiculo)
);

create table Viaje(
id_viaje integer,
combustible_consumido integer,
combustible_consumido_previsto integer,
tipo_de_carga varchar(100),
fecha date,
destino varchar(50),
origen varchar (50),
desviacion varchar(50),
tiempo time,
tiempo_previsto time,
km_recorrido double,
km_recorrido_previsto double,
cliente varchar(50),
id_chofer integer,
id_vehiculo integer,
primary key(id_viaje),
foreign key(id_chofer)references Chofer(id_usuario),
foreign key(id_vehiculo) references Vehiculo(id_vehiculo));


INSERT INTO Usuario
(id_usuario, dni, user_name, rol, nombre,telefono,mail,clave)
values
(1, 123450, "pepito66", "conductor", "Pedro",12345678,"pedro123@hotmal.com",123456789),
(2, 123451, "taladro88", "administrador", "Leonel",87654321,"leonel123@yahoo.com",12345678),
(3, 123452, "pepo1236", "mecanico", "Ruben",87456321,"ruben123@hotmail.com",1234567),
(4, 123453, "bubaloo894", "supervisor", "Juan",12365478,"juan123@gmail.com",123456),
(5, 123454, "nosequeponer65485", "conductor", "Jose",96325874,"jose123@gmail.com",12345),
(6, 123455, "simba3451", "mecanico", "Axel",14785236,"axelabalosss@gmail.com",1234);

INSERT INTO Chofer
(id_usuario,Licencia)
values
(1,"vigente"),
(3,"no vigente");

