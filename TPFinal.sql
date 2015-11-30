CREATE DATABASE EmpresaLogistica;
USE EmpresaLogistica;

CREATE TABLE IF NOT EXISTS cliente (
	id 			int 		AUTO_INCREMENT,
	rs			varchar(50)	NOT NULL,
    email		varchar(50)	NOT NULL,
    telefono	int			NOT	NULL,
	PRIMARY KEY (id)
);

INSERT INTO cliente(id, rs, email, telefono) 
VALUES	(1, 'Empresa OMEGA', 'omega@gmail.com', 46530685);


CREATE TABLE IF NOT EXISTS cargo (
	id 			int			AUTO_INCREMENT,
	descripcion	varchar(50) NOT NULL,
	PRIMARY KEY (id)
);

INSERT INTO cargo (id, descripcion) 
VALUES	(1, 'Chofer'),
		(2, 'Administrador'),
		(3, 'Supervisor'),
		(4, 'Mecanico');


CREATE TABLE IF NOT EXISTS rol (
	id 				int 		AUTO_INCREMENT,
	descripcion 	varchar(50) NOT NULL,
	PRIMARY KEY (id)
);

INSERT INTO rol (id, descripcion) 
VALUES	(1, 'Chofer'),
		(2, 'Administrador'),
		(3, 'Supervisor');


CREATE TABLE IF NOT EXISTS empleado (
	id 					int 			AUTO_INCREMENT,
    dni					int	 			NOT NULL,
    fecha_nac 			DATE			NOT NULL,
	nombre 				varchar(50)		NOT NULL,
	apellido 			varchar(50)		NOT NULL,
    domicilio			varchar(50)		NOT NULL,
    localidad			varchar(50)		NOT NULL,
	provincia			varchar(50)		NOT NULL,	
    lic					varchar(5)		NOT NULL,	
    telefono			int				NOT NULL,	
	id_cargo 			int				NOT NULL,
    id_rol				int				NOT NULL,	
	usuario 			varchar(50)		NOT NULL,
	password 			varchar(50)		NOT NULL,
	PRIMARY KEY (id),
	FOREIGN KEY (id_cargo) 	REFERENCES cargo (id),
	FOREIGN KEY (id_rol) 	REFERENCES rol 	 (id)
);

INSERT INTO empleado (id, dni, fecha_nac, nombre, apellido, domicilio, localidad, provincia, lic, telefono, id_cargo, id_rol, usuario, password)
VALUES (1, 33742030, '1988-04-27', 'Julian' , 'Butron', 'Necochea 4200', 'Tablada'  , 'Buenos Aires', 'B2', 44530384, 3, 3, 'supervisor', md5(1234)),
	   (2, 42042030, '1989-05-07', 'Marcelo', 'Gerez' , 'Gibraltar 200', 'San Justo', 'Buenos Aires', 'C2', 54530384, 2, 2, 'admin',	  md5(1234)),
	   (3, 39742030, '1990-03-22', 'Juan'	, 'Perez' , 'Ibarrola 2100', 'Mataderos', 'Buenos Aires', 'C1', 64530384, 1, 1, 'usuario',	  md5(1234)),
       (4, 32742030, '1992-10-10', 'Carlos'	, 'Guzman', 'Pringles 5200', 'Tapiales' , 'Buenos Aires', 'C2', 24530384, 4, 1, 'usuario2',	  md5(1234));

CREATE TABLE IF NOT EXISTS vehiculo (
	id						int				AUTO_INCREMENT,
	patente 				varchar(10) 	NOT NULL,
    chasis					varchar(50)		NOT NULL,
    marca					varchar(30)		NOT NULL,
    motor					varchar(30)		NOT NULL,	
	modelo 					varchar(30)		NOT NULL,
	fabricacion				int				NOT NULL,
	PRIMARY KEY (id)
);

INSERT INTO vehiculo (id, patente, chasis, marca, motor, modelo, fabricacion)
VALUES (1, 'DAF350', '12000255JH', 'Iveco', 'F5666210', 'Euro', 2010 );

CREATE TABLE IF NOT EXISTS mantenimiento (
	cod 		int 			AUTO_INCREMENT,
    fecha		DATE		    NOT NULL,
    id_vehiculo int				NOT NULL,	
    km			int				NOT NULL,
    id_mecanico int				NULL,
    mecanico_ext varchar(5)		NOT NULL,
    repuesto	varchar(100)	NOT NULL,
    costo		decimal(10,2)	NOT NULL,
	PRIMARY KEY (cod),
	FOREIGN KEY (id_vehiculo)	REFERENCES vehiculo (id),
	FOREIGN KEY (id_mecanico)	REFERENCES empleado (id)
);
INSERT INTO mantenimiento(cod, fecha, id_vehiculo, km, id_mecanico, mecanico_ext, repuesto, costo)
VALUES (1, '2015-11-15', 1, 2500, 4, 'NO', 'Aceite', 5000),
	   (2, '2015-11-19', 1, 3500, 4, 'NO', 'Frenos', 12000),
       (3, '2015-11-22', 1, 7500, 4, 'NO', 'Neumatico', 32000);

CREATE TABLE IF NOT EXISTS viaje (
	cod 			int 			AUTO_INCREMENT,
	fecha_partida	DATETIME		NOT NULL,
	fecha_llegada   DATETIME		NOT NULL,
	id_cliente 		int 			NOT NULL,
	tipo_carga		varchar(50) 	NOT NULL,
	domicilio_o		varchar(50)		NOT NULL,
    ciudad_o		varchar(50)		NOT NULL,
    provincia_o		varchar(50)		NOT NULL,
    pais_o			varchar(50)		NOT NULL,
	domicilio_d		varchar(50)		NOT NULL,
    ciudad_d		varchar(50)		NOT NULL,
    provincia_d		varchar(50)		NOT NULL,
    pais_d			varchar(50)		NOT NULL,
    id_vehiculo		int				NOT NULL,
    id_chofer		int				NOT NULL,
    combustible		int				NOT NULL,
    km				int				NOT NULL,
    horas			int				NOT NULL,
	PRIMARY KEY (cod),
	FOREIGN KEY (id_cliente)	 REFERENCES cliente (id),
	FOREIGN KEY (id_chofer)		 REFERENCES empleado(id),
    FOREIGN KEY (id_vehiculo) 	 REFERENCES vehiculo(id)
);
INSERT INTO viaje (cod, fecha_partida, fecha_llegada, id_cliente, tipo_carga, domicilio_o, ciudad_o, provincia_o, pais_o, domicilio_d, ciudad_d, provincia_d, pais_d, id_vehiculo, id_chofer, combustible, km, horas) 
VALUES (1, '2015-11-02 06:00:00', '2015-11-10 07:00:00', 1, 'Carga 1', 'Pedriel 2500', 'Tablada'  , 'Buenos Aires', 'Argentina', 'Cerrito 5411', 'Viedma'   , 'Rio Negro', 'Argentina', 1, 3, 1525, 2200, 20),
	   (2, '2015-11-15 09:30:00', '2015-11-19 10:00:00', 1, 'Carga 2', 'Nazca 2500'  , 'San Justo', 'Buenos Aires', 'Argentina', 'Montevideo 411', 'Posadas', 'Misiones' , 'Argentina', 1, 3, 2700, 3100, 26);

CREATE TABLE IF NOT EXISTS coordenadas(
	id			int				AUTO_INCREMENT,
	Lat			varchar(50)		NOT NULL,
	Lng			varchar(50)		NOT NULL,
	Pos			varchar(50)		NOT NULL,
	PRIMARY KEY(id)
);
CREATE TABLE IF NOT EXISTS consumo_combustible(
	cod			int				AUTO_INCREMENT,
	id_chofer	int				NOT NULL,
	fecha	    DATE			NOT NULL,
	id_vehiculo int				NOT NULL,
	litros		int				NOT NULL,
	importe		int				NOT NULL,
	id_coordenadas int			NOT NULL,
	PRIMARY KEY(cod),
	FOREIGN KEY(id_chofer)	    REFERENCES empleado(id),
	FOREIGN KEY(id_vehiculo)	REFERENCES vehiculo(id),
	FOREIGN KEY(id_coordenadas) REFERENCES coordenadas(id)	
);

CREATE TABLE IF NOT EXISTS alarmas (
	id				int 			AUTO_INCREMENT,
	id_chofer		int				NOT NULL,
	fecha			DATETIME		NOT NULL,
	id_vehiculo		int				NOT NULL,
	km_rec			int				NOT NULL,
	PRIMARY KEY(id),
	FOREIGN KEY(id_chofer)	REFERENCES empleado(id),
	FOREIGN KEY(id_vehiculo)REFERENCES vehiculo(id)
);

INSERT INTO alarmas(id, id_chofer, fecha, id_vehiculo, km_rec)
VALUES (1, 3, '2015-11-20 22:00:00', 1, 2500),
	   (2, 3, '2015-11-05 15:00:00', 1, 1200);