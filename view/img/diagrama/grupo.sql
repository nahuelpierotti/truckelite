CREATE DATABASE grupo09;
USE grupo09;

CREATE TABLE Usuario(
 id_usuario INT NOT NULL ,
 dni INT UNIQUE NOT NULL,
 user_name VARCHAR(50) UNIQUE NOT NULL,
 rol VARCHAR(60),
 nombre VARCHAR(50) NOT NULL,
 telefono LONG,
 mail VARCHAR(60) UNIQUE NOT NULL,
 clave VARCHAR(40) NOT NULL,
 PRIMARY KEY(id_usuario));


CREATE TABLE Supervisor(	
id_usuario INT NOT NULL,
PRIMARY KEY(id_usuario),
FOREIGN KEY (id_usuario) REFERENCES Usuario(id_usuario)
); 

CREATE TABLE Chofer(
id_usuario INT NOT NULL,
Licencia VARCHAR(50),
PRIMARY KEY(id_usuario),
FOREIGN KEY (id_usuario) REFERENCES Usuario(id_usuario)
); 


CREATE TABLE Mecanico(
id_usuario INT NOT NULL,
PRIMARY KEY(id_usuario),
FOREIGN KEY (id_usuario) REFERENCES Usuario(id_usuario)
); 


CREATE TABLE Administrador(
id_usuario INT NOT NULL,
PRIMARY KEY(id_usuario),
FOREIGN KEY (id_usuario) REFERENCES Usuario(id_usuario)
); 




CREATE TABLE Vehiculo(
id_vehiculo INT NOT NULL,
calendario_service DATE,
posicion_actual VARCHAR(100),
reportes VARCHAR(70),
alarmas VARCHAR(50),
estado BOOLEAN,
PRIMARY KEY(id_vehiculo)
);


CREATE TABLE Tractor(
patente VARCHAR(20) NOT NULL,
motor VARCHAR(50),
chasis VARCHAR(50),
modelo VARCHAR(50),
marca VARCHAR (50),
id_vehiculo INT NOT NULL,
PRIMARY KEY (patente),
FOREIGN KEY(id_vehiculo) REFERENCES Vehiculo(id_vehiculo));

CREATE TABLE Acoplado(
patente_acoplado VARCHAR(50) NOT NULL,
tipo VARCHAR(50),
chasis_acoplado VARCHAR(50),
patente_t VARCHAR(20),
PRIMARY KEY (patente_acoplado),
FOREIGN KEY(patente_t) REFERENCES Tractor(patente));

CREATE TABLE Mantenimiento(
fecha_sevice DATE,
km_unidad DOUBLE,
costo DOUBLE,
interno_externo VARCHAR(50),
repuestos_cambiados INT,
id_mantenimiento INT,
id_mecanico INT NOT NULL,
id_vehiculo INT NOT NULL,
PRIMARY KEY(id_mantenimiento),
FOREIGN KEY (id_mecanico) REFERENCES Mecanico(id_usuario),
FOREIGN KEY(id_vehiculo) REFERENCES Vehiculo(id_vehiculo)
);

CREATE TABLE Viaje(
id_viaje INT NOT NULL,
combustible_consumido INT,
combustible_consumido_previsto INT,
tipo_de_carga VARCHAR(100),
fecha DATE,
destino VARCHAR(50),
origen VARCHAR(50),
desviacion VARCHAR(50),
tiempo TIME,
tiempo_previsto TIME,
km_recorrido DOUBLE,
km_recorrido_previsto DOUBLE,
cliente VARCHAR(50),
id_chofer INT NOT NULL,
id_vehiculo INT NOT NULL,
PRIMARY KEY(id_viaje),
FOREIGN KEY(id_chofer)REFERENCES Chofer(id_usuario),
FOREIGN KEY(id_vehiculo) REFERENCES Vehiculo(id_vehiculo));


INSERT INTO Usuario
(id_usuario, dni, user_name, rol, nombre,telefono,mail,clave)
VALUES
(1, 35600493, "pepeadmin", "administrador", "pepe",44547777,"pedro123@hotmal.com","soyadmin");

