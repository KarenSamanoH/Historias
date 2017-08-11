create database historias;

use historias;

create table tienda(IDTienda int not null auto_increment primary key,
					Nombre varchar (50),
                    Direccion varchar (50));

create table perfiles(IDPerfiles int not null auto_increment primary key,
					Perfil varchar (50));

create table empresa(IDEmpresa int not null auto_increment primary key,
					Empresa varchar (50),
                    Contacto varchar (50),
                    Cargo varchar(50),
                    RFC varchar (50),
                    CURP varchar(50),
                    Calle varchar(50),
                    Ciudad varchar(50),
                    Estado varchar(50),
					CP int,
                    Colonia varchar(50));

create table cuenta(IDCuenta int not null auto_increment primary key,
					NombreCuenta varchar(100),
                    Contrasena varchar(50),
                    IDPerfiles int not null,
                    foreign key (IDPerfiles) references perfiles (IDPerfiles));
                    
create table agente(IDAgente int not null auto_increment primary key,
					IDCuenta int not null,
                    foreign key (IDCuenta) references cuenta (IDCuenta),
                    IDPerfiles int not null,
                    foreign key (IDPerfiles) references perfiles (IDPerfiles),
                    Nombre varchar(50),
                    Apellidos varchar (50),
                    Telefono int (50),
                    Email varchar (50),
					IDTienda int not null,
                    foreign key (IDTienda) references tienda (IDTienda));
                    
create table cliente(IDCliente int not null auto_increment primary key,
					Nombre1 varchar(50),
                    Apellidos1 varchar(50),
                    Nombre2 varchar(50),
                    Apellidos2 varchar(50),
                    Calle varchar(50),
                    Ciudad varchar(50),
                    Estado varchar(50),
					CP int,
				   Colonia varchar(50),
                    Telefono int,
                    Celular1 int,
                    Celular2 int,
                    Email1 varchar (50),
                    Email2 varchar (50),
                    FechaAlta date,
                    IDAgente int not null,
                    foreign key (IDAgente) references agente (IDAgente),
                    IDEmpresa int not null,
                    foreign key (IDEmpresa) references empresa (IDEmpresa),
                    EstatusCompra varchar(50),
                    Comentarios varchar(50),
                    TipoEvento varchar(50),
                    TipoCliente varchar(50),
                    Expo varchar(50),
					FechaExpo date);

insert into perfiles (Perfil) values ('Agente');
insert into perfiles (Perfil) values ('Cliente');
insert into perfiles (Perfil) values ('Admo');

insert into cuenta (NombreCuenta,Contrasena,IDPerfiles) values ('KarenS',123,1);
select*from cuenta

insert into Tienda (Nombre,Direccion) values ('Polanco','Polanco');
select*from Tienda

insert into Agente (IDcuenta,IDPerfiles,Nombre,Apellidos,Telefono,Email,IDTienda) 
values (2,1,'Hola','Samano',55226633,'Karen@greats.com',1);
select*from Agente;

insert into cliente (Nombre1,Apellidos1,CP,Telefono,IDAgente,IDEmpresa) values ('Nuevo','Ccgfcnte',5846,654645,1,1); select*from cliente

load data local infile "C:/xampp/htdocs/Historias/Clientes.csv" into table cliente
fields terminated by ','
LINES TERMINATED BY '\n'

use historias
load data local infile "C:/xampp/htdocs/Historias/CP.csv" into table catalogoproceso
fields terminated by ','
LINES TERMINATED BY '\n'




