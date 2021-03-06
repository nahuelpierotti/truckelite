DROP DATABASE IF EXISTS grupo09;

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
posicion_actual VARCHAR(100),
kilometraje DOUBLE NOT NULL,
alarma DOUBLE NOT NULL,
estado BOOLEAN NOT NULL,
PRIMARY KEY(id_vehiculo),
FOREIGN KEY(fk_tractor) REFERENCES Tractor(patente)
);

CREATE TABLE Mantenimiento(
fecha_service DATE,
km_unidad DOUBLE,
costo DOUBLE,
interno_externo VARCHAR(50),
repuestos_cambiados VARCHAR(30),
id_mantenimiento INT NOT NULL AUTO_INCREMENT,
id_mecanico INT NOT NULL,
id_vehiculo INT NOT NULL,
PRIMARY KEY(id_mantenimiento),
FOREIGN KEY (id_mecanico) REFERENCES Mecanico(id_usuario),
FOREIGN KEY(id_vehiculo) REFERENCES Vehiculo(id_vehiculo)
);

CREATE TABLE Imo_class(
id INT AUTO_INCREMENT KEY,
tipo VARCHAR(200) NOT NULL,
descripcion VARCHAR(500) NOT NULL);

CREATE TABLE Imo_subclass(
id INT AUTO_INCREMENT KEY,
id_class INT NOT NULL,
tipo VARCHAR(250) NOT NULL,
descripcion VARCHAR(518) NOT NULL,
FOREIGN KEY (id_class) REFERENCES Imo_class(id)
);

CREATE TABLE Tipo_carga(
id INT AUTO_INCREMENT KEY,
descripcion VARCHAR(200) NOT NULL);

CREATE TABLE Cliente(
id INT AUTO_INCREMENT,
denominacion VARCHAR(250) NOT NULL,
cuit VARCHAR(12) NOT NULL,
direccion VARCHAR(250) NOT NULL,
telefono VARCHAR(100) NOT NULL,
email VARCHAR(250),
contacto1 VARCHAR(200),
contacto2 VARCHAR(200),
PRIMARY KEY (id)
);

CREATE TABLE Viaje(
id_viaje INT NOT NULL AUTO_INCREMENT,
id_cliente INT NOT NULL,
id_chofer INT NOT NULL,
id_vehiculo INT NOT NULL,
estado BOOLEAN NOT NULL,
fecha DATE NOT NULL,
destino VARCHAR(50) NOT NULL,
origen VARCHAR(50) NOT NULL,
combustible_consumido_previsto INT NOT NULL,
tiempo_previsto TIME NOT NULL,
km_recorrido_previsto DOUBLE NOT NULL,
eta DATE NOT NULL,
etd DATE NOT NULL,
combustible_consumido INT,
km_recorrido DOUBLE,
tiempo TIME,
desviacion DOUBLE,
eta_real DATE,
etd_real DATE,
PRIMARY KEY(id_viaje),
FOREIGN KEY(id_chofer) REFERENCES Chofer(id_usuario),
FOREIGN KEY(id_vehiculo) REFERENCES Vehiculo(id_vehiculo),
FOREIGN KEY(id_cliente) REFERENCES Cliente(id));

CREATE TABLE Carga(
id INT AUTO_INCREMENT KEY,
tipo_carga INT,
peso VARCHAR(20) NOT NULL,
hazard boolean NOT NULL,
imo_class INT,
imo_subclass INT,
reefer boolean NOT NULL,
temperatura VARCHAR(10),
id_viaje INT NOT NULL,
FOREIGN KEY (tipo_carga) REFERENCES Tipo_carga(id),
FOREIGN KEY (imo_class) REFERENCES Imo_class(id),
FOREIGN KEY (imo_subclass) REFERENCES Imo_subclass(id),
FOREIGN KEY (id_viaje) REFERENCES Viaje(id_viaje)
 );

CREATE TABLE Proforma(
id INT AUTO_INCREMENT,
id_viaje INT NOT NULL,
viaticos DOUBLE NOT NULL,
costo_combustible DOUBLE NOT NULL,
peajes DOUBLE NOT NULL,
pesajes DOUBLE NOT NULL,
extras DOUBLE NOT NULL,
fee DOUBLE NOT NULL,
total DOUBLE NOT NULL,
viaticos_real DOUBLE,
costo_combustible_real DOUBLE,
peajes_real DOUBLE,
pesajes_real DOUBLE,
extras_real DOUBLE,
total_real DOUBLE,
PRIMARY KEY (id),
FOREIGN KEY (id_viaje) REFERENCES Viaje(id_viaje)
);

CREATE TABLE Reporte(
id_reporte INT AUTO_INCREMENT,
id_viaje INT NOT NULL,
fecha DATE NOT NULL,
peajes DOUBLE,
pesajes DOUBLE,
lugar_carga_combustible VARCHAR (50),
costo_carga_combustible DOUBLE,
cantidad_carga_combustible DOUBLE,
lugar_hospedaje VARCHAR (50),
costo_hospedaje DOUBLE,
PRIMARY KEY (id_reporte),
FOREIGN KEY (id_viaje) REFERENCES Viaje(id_viaje)
);

INSERT INTO Imo_class
(tipo,descripcion)VALUES
('Class 1','Explosives'),
('Class 2','Flammable Gas'),
('Class 3','Flammable Liquids'),
('Class 4','Flammable Solids or Substances'),
('Class 5','Oxidizing substances and organic peroxides'),
('Class 6','Toxic substances'),
('Class 7','Radioactive Material'),
('Class 8','Corrosive substances'),
('Class 9','Miscellaneous dangerous substances and articles');

INSERT INTO Imo_subclass
(id_class,tipo,descripcion)VALUES
(1,'Subclass 1.1','Consists of explosives that have a mass explosion hazard. A mass explosion is one which affects almost the entire load instantaneously.'),
(1,'Subclass 1.2','Consists of explosives that have a projection hazard but not a mass explosion hazard.'),
(1,'Subclass 1.3','Consists of explosives that have a fire hazard and either a minor blast hazard or a minor projection hazard or, both but not a mass explosion hazard.'),
(1,'Subclass 1.4','Consists of explosives that present a minor explosion hazard. The explosive effects are largely confined to the package and no projection of fragments of appreciable size or range is to be expected. An external fire must not cause virtually instantaneous explosion of almost the entire contents of the package.'),
(1,'Subclass 1.5','Consists of very insensitive explosives. This division is comprised of substances which have a mass explosion hazard but are so insensitive that there is very little probability of initiation or of transition from burning to detonation under normal conditions of transport'),
(1,'Subclass 1.6','Consists of extremely insensitive articles which do not have a mass explosive hazard. This division is comprised of articles which contain only extremely insensitive detonating substances and which demonstrate a negligible probability of accidental initiation or propagation.'),
(2,'Subclass 2.1. Flammable gases', 'This is any type of gas that is ignitable when it comes in contact with a heat source, such as propylene, ethane, or butane. The label must contain a symbol with a black or white flame on a red background, with the number “2” at the bottom.'),
(2,'Subclass 2.2. Non-flammable, non-toxic gases', 'These are gases that displace oxygen, causing asphyxiation; one example of these gases is helium. The label contains an image of a black or white bottle of gas on a green background, with the number “2” at the bottom.'),
(2,'Subclass 2.3. Toxic gases.', 'These are gases that can cause serious injury or death when inhaled. They can be flammable, corrosive, or oxidizing, such as chlorine. The label contains an image of a black skull over black crossbones. The background is white and it contains the number “2” at the bottom.'),
(4,'Subclass 4.1. Flammable solids, self-reactive substances, and desensitized explosives.', 'These solids are liable to spontaneous combustion. The label contains a black flame on a white background with seven vertical red stripes and the number “4” at the bottom.'),
(4,'Subclass 4.2. Spontaneously flammable substances.', 'This means that they could suddenly ignite when they come in contact with the air or during transport. Examples include coal, ferrous metal shavings, wet cotton, etc. The label contains a black flame on a background that is white on top and red on the bottom, with the number “4”.'),
(4,'Subclass 4.3. Substances that emit flammable gases when they come in contact with water.','Some of the most common materials in this subclass include sodium, potassium, and calcium carbide. The label contains a black or white flame on a blue background with the number “4” at the bottom.'),
(5,'Subclass 5.1. Oxidizing substances.','Liquids or solids that can cause combustion or create a flammable environment. One example is ammonium nitrate. The label contains a black flame on top of a circle, with a yellow background and the number “5.1” at the bottom.'),
(5,'Subclass 5.2. Organic peroxides.','These substances are derived from hydrogen peroxide. They are highly dangerous and may only be transported in certain quantities in special cargo units. The label contains a black or white flame with a background that is red on top and yellow on the bottom. It also contains the number “5.2” at the bottom.'),
(6,'Subclass 6.1. Toxic substances.','These are substances that may cause death by inhalation, cutaneous absorption, or ingestion. Examples include methanol and dichloromethane. The label for this subclass contains a black skull and crossbones over a white background (like the label for Class 2.3, toxic gases) but is distinguished by the number “6” at the bottom.'),
(6,'Subclass 6.2. Infectious substances.','These substances contain pathogens (microorganisms) that could cause disease. Some examples include diagnostic specimens, material for preparing vaccines, secretions, blood, excrement, lab cultures, etc. The label for this subclass may contain the words “Infectious substances” or “In case of damage, flood, or fire, alert the health authorities immediately” at the bottom. The label includes a symbol made up of three black crescent moons on top of a circle, with a white background and the number “6” at the bottom.'),
(7,'Category I.','Packages with a maximum surface radiation level of 0.5 mrem/hr or containers that do not contain packages with higher categories. The label for this category is white with a black trefoil shape; below this is the word “Radioactive”, followed by a small red vertical line. The label also contains the words “Contents,” “Quantity,” and “Activity,” as well as the number “7” at the bottom.'),
(7,'Category II.','Packages with a surface radiation level greater than 0.5 mrem/hr, but no more than 50 mrem/hr . The transport index must not exceed 1.0; this can also apply to containers with a transport index not exceeding 1.0 with no Category III packages visible.'),
(7,'Category III.','Packages with a maximum surface radiation level of 200 mrem/hr, or containers whose transport index is less than or equal to 1.0 and which are transporting visible Category III packages.'),
(7,'Category IV.','Fissionable materials. This label is white and must contain the word “FISSIONABLE” in black at the top. At the bottom is a box that says “Critical Care Index” and the number “7”.');

INSERT INTO Tipo_carga(descripcion)
            VALUES("Granel"),
                  ("Liquida"),
                  ("20 pies"),
                  ("40 pies"),
                  ("Jaula"),
                  ("CarCarrier");

INSERT INTO Usuario(user_name, nombre, dni, rol, telefono, mail, clave)
VALUES('npie','Nahuel',31832665,'Administrador',46353072,'npierotti@alumno.unlam.edu.ar','e10adc3949ba59abbe56e057f20f883e'),
      ("pepe", "Pepe Garcia", 40041115, "Chofer", 44321833,"pepe_argento@hotmail.com", '0abe4fbd0f59745b3b1516cae7fcb3a3'),
      ("admin", "Matias Romero", 38615940, "Administrador", 44549625,"matiasromero@hotmail.com", "21232f297a57a5a743894a0e4a801fc3"),
      ("gusmecanico", "Gustavo Vidal", 38615941, "Mecanico", 44549620,"gustavovidal@hotmail.com", "f3fcf52d139a0467bb45593638c6f6a8"),
      ("diegosupervisor", "Diego Lopez", 38615943, "Supervisor", 44549624,"diegolopez@hotmail.com", "6cf72b8aff4551861c20d5a28ffb4113"),
      ('milito','Diego Milito','40081161',null, '46353072', 'nahuelpierotti@gmail.com', 'e10adc3949ba59abbe56e057f20f883e');


INSERT INTO Chofer(id_usuario,licencia)
            VALUES(2,'Profesional');
            
INSERT INTO Administrador(id_usuario)
            VALUES(1),
				  (3);
                  
INSERT INTO Supervisor(id_usuario)
            VALUES(5);
            
INSERT INTO Mecanico(id_usuario)
            VALUES(4);

INSERT INTO Cliente(denominacion,cuit,direccion,telefono,email,contacto1,contacto2)
	         VALUES('Cliente Los Andes', '20333606853', 'Villa Allende', '1199379211', 'losAndes@hotmail.com', 'Contacto 1', 'Contacto 2'),
                   ('La Pampa SA', '30465585408', 'Aruba 38', '1122568804', 'pampasa@gmail.com', 'ppsa@hotmal.com', '1180802776');

INSERT INTO Acoplado(patente_acoplado, tipo, chasis_acoplado)
			VALUES('AA100AS', 'Araña', 585822),
				  ('AC125AD', 'Araña', 605737),
				  ('AC296AS', 'Jaula', 882174),
				  ('AB318AD', 'Jaula', 595287),
				  ('AB405AG', 'Tanque', 583419),
				  ('AD427AS', 'Tanque', 703673),
				  ('AB581AD', 'Granel', 761560),
				  ('AD602AG', 'Granel', 555608),
				  ('AD100AZ', 'CarCarrier', 730027),
				  ('AD100AQ', 'CarCarrier', 730502);      

INSERT INTO Tractor(patente,motor,chasis,modelo,marca,fk_acoplado)
            VALUES('AA123CD','53879558','L53879558','Cursor','IVECO','AA100AS'),
                  ('AB198QZ','18389741','V18389741','G410','SCANIA','AC125AD'),
                  ('AD200XS','57193968','R57193968','Cursor','IVECO','AC296AS'),
                  ('AA211ZX','82836641','N82836641','Cursor','IVECO','AB318AD'),
                  ('AD678QD','23849041','C23849041','Actros 1846','M.BENZ','AB405AG'),
                  ('AA534QD','21357689','A21357689','G460','SCANIA','AD427AS'),
                  ('AC438QW','54712451','W54712451','G310','SCANIA','AB581AD'),
                  ('AC989QW','64092078','F64092078','Actros 1846','M.BENZ','AD602AG'),
                  ('AB966QD','32632699','B32632699','Actros 1846','M.BENZ','AD100AZ'),
                  ('AC822QD','60916748','J60916748','Actros 1846','M.BENZ','AD100AQ');

INSERT INTO Vehiculo(fk_tractor,posicion_actual,kilometraje,alarma,estado)
            VALUES('AA123CD','-34.668339,-58.567455',3023,4670,TRUE),
                  ('AB198QZ','-34.668339,-58.567455',102.9,5000,TRUE),
                  ('AD200XS','-34.6728225,-58.5616453',1100,1000,FALSE),
                  ('AA211ZX','-34.668339,-58.567455',980.221,1530,TRUE),
                  ('AD678QD','-34.668339,-58.567455',4512,4900,TRUE),
                  ('AA534QD','-34.668339,-58.567455',629,700,TRUE),
                  ('AC438QW','-34.6728225,-58.5616453',456,400,FALSE),
                  ('AC989QW','-34.668339,-58.567455',3000,3210,TRUE),
                  ('AB966QD','-34.668339,-58.567455',531,610,TRUE),
                  ('AC822QD','-34.668339,-58.567455',18000,18020,TRUE);

