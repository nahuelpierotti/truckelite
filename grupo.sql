CREATE DATABASE grupo09;

USE grupo09;

CREATE TABLE Usuario(
 id_usuario INT NOT NULL AUTO_INCREMENT,
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

CREATE TABLE Acoplado(
patente_acoplado VARCHAR(8) NOT NULL,
tipo VARCHAR(20),
chasis_acoplado VARCHAR(7) UNIQUE,
PRIMARY KEY (patente_acoplado)
);

CREATE TABLE Tractor(
patente VARCHAR(8) NOT NULL,
motor VARCHAR(9) NOT NULL UNIQUE,
chasis VARCHAR(10) NOT NULL UNIQUE,
modelo VARCHAR(20) NOT NULL,
marca VARCHAR (20) NOT NULL,
fk_acoplado VARCHAR(8) UNIQUE,
PRIMARY KEY (patente),
FOREIGN KEY(fk_acoplado) REFERENCES Acoplado(patente_acoplado)
);

CREATE TABLE Vehiculo(
id_vehiculo INT NOT NULL AUTO_INCREMENT,
fk_tractor VARCHAR(8) NOT NULL UNIQUE,
calendario_service DATE,
posicion_actual VARCHAR(100),
reportes VARCHAR(70),
alarmas VARCHAR(50),
estado VARCHAR(30),
PRIMARY KEY(id_vehiculo),
FOREIGN KEY(fk_tractor) REFERENCES Tractor(patente)
);

CREATE TABLE Mantenimiento(
fecha_service DATE,
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

INSERT INTO Usuario(user_name, nombre, dni, rol, telefono, mail, clave)
			VALUES("admin", 
				   "Pepe Garcia" , 
					34561789, 
				    "Administrador", 
                    44321833,
                    "pepe@hotmail.com",
                    "21232f297a57a5a743894a0e4a801fc3");