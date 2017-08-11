create database Historias
use Historias


/*Tabla de perfiles*/

create table perfiles(
			Primary key (IDPerfiles),
			IDPerfiles int not null auto_increment,
			Perfil varchar (50) not null)
			Engine = InnoDB;

insert into perfiles (Perfil) values ('Agente');
insert into perfiles (Perfil) values ('Cliente');
insert into perfiles (Perfil) values ('Admo');

select*from perfiles

/*Tabla de cuenta*/

create table cuenta(
			Primary key (IDCuenta),
			IDCuenta int not null auto_increment,
			NombreCuenta varchar (100) not null,
			Contrasena varchar(30) not null,
			IDPerfiles int not null,
            foreign key (IDPerfiles) references perfiles (IDPerfiles)
			)Engine = InnoDB;
            
insert into cuenta (NombreCuenta,Contrasena,IDPerfiles) values ('KarenS',123,1);
select*from cuenta

/*Tabla de tienda*/

create table Tienda
			(IDTienda int primary key auto_increment not null,
			Nombre varchar (50),
            Direccion varchar (50))Engine = InnoDB;
            
insert into Tienda (Nombre,Direccion) values ('Polanco','Polanco');
select*from Tienda


/*Tabla de agente*/

create table Agente
			(IDAgente int primary key auto_increment not null,
            IDCuenta int not null,
            foreign key (IDCuenta) references cuenta (IDCuenta),
            IDPerfiles int not null,
            foreign key (IDPerfiles) references perfiles (IDPerfiles),
            Nombre varchar (50) not null,
            Apellidos varchar (50) not null,
            Telefono int (50) not null,
            Email varchar(50) not null,
            IDTienda int not null,
            foreign key (IDTienda) references Tienda (IDTienda)
            )Engine = InnoDB;

insert into Agente (IDcuenta,IDPerfiles,Nombre,Apellidos,Telefono,Email,IDTienda) 
values (2,1,'Hola','Samano',55226633,'Karen@greats.com',1);
select*from Agente;
            
            
	/*Tabla de Empresa*/
    
create table Empresa
			(IDEmpresa int primary key auto_increment not null,
            Empresa varchar (50) not null,
            Contacto varchar (50) null,
            Cargo varchar (50)  null,
            RFC varchar (50) null,
            CURP varchar (50) null,
            Calle varchar(50) null,
            Ciudad varchar(50) null,
            Estado varchar(50) null,
            CP int  null,
            Colonia varchar(50) null
            )Engine = InnoDB;
            
/*Tabla de cliente*/

insert into Empresa (Empresa) values  ('Jack daniels');

 create table Cliente
			(IDCliente int primary key auto_increment not null,
			Nombre1 varchar(50) not null,
            Apellidos1 varchar(50) not null,
            Nombre2 varchar(50),
            Apellidos2 varchar(50),
            Calle varchar(50) ,
            Ciudad varchar(50),
            Estado varchar(50),
            CP int not null,
            Colonia varchar(50),
            Telefono  int not null,
            Fax int,
            Celular1 int,
            Celular2 int,
            Email1 varchar(50),
            Email2 varchar(50),
            FechaAlta date,
            IDAgente int not null,
            foreign key (IDAgente) references Agente (IDAgente),
            IDEmpresa int not null,
            foreign key (IDEmpresa) references Empresa (IDEmpresa),
            EstatusCompra varchar (50),
            Comentarios  varchar (50),
            TipoEvento  varchar (50),
            TipoCliente varchar (50),
            Expo varchar (50),
            FechaExpo date
            )Engine = InnoDB;
            
            insert into cliente (Nombre1,Apellidos1,CP,Telefono,IDAgente,IDEmpresa) values ('Nuevo','Ccgfcnte',5846,654645,1,1);
            select*from cliente

load data local infile "C:/xampp/htdocs/Historias/ele.csv" into table catalogoelemento
fields terminated by ','
LINES TERMINATED BY '\n'




select*from cliente;

/*Tabla de admo*/

create table Admo(
			IDAdmo int primary key auto_increment not null,
			Nombre varchar (200) not null,
			Dirección varchar (200) not null,
			Telefono int (50),
            IDCuenta int not null,
            foreign key (IDCuenta) references cuenta (IDCuenta),
            IDPerfiles int not null,
            foreign key (IDPerfiles) references perfiles (IDPerfiles)
			)Engine = InnoDB;
            
            
/*Procedimiento almacenado para el registro de clientes*/


use historias;

create table cotizacion(IDCotizacion int not null auto_increment primary key,
					FechaEvento date,
                    Nombre varchar (50),
                    Descripcion varchar (50),
                    IDCliente int not null,
                    foreign key (IDCliente) references cliente (IDCliente),
                    IDAgente int not null,
                    foreign key (IDAgente) references agente (IDAgente),
                    CostoMod decimal (11,2) DEFAULT '0.00',
                    CostoFinal decimal (11,2) DEFAULT '0.00');

create table descuento(IDDescuento int not null auto_increment primary key,
					Nombre varchar (50),
                    Tipo varchar (50),
                    Descuento int,
                    Dias int,
                    FormaPago varchar (50),
                    Vigencia int,
                    Unico tinyint (1),
                    Activo tinyint (1),
                    Accesorios tinyint (1),
                    Inicio date,
                    Final date);

create table producto(IDProducto int not null auto_increment primary key,
					IDCotizacion int not null,
                    foreign key (IDCotizacion) references cotizacion (IDCotizacion),
                    IDDescuento int not null,
                    foreign key (IDDescuento) references descuento (IDDescuento),
                    Modelo varchar (50),
                    Categoria varchar (50),
                    Cantidad int,
                    CostoEl decimal (11,2) DEFAULT '0.00',
                    Descuento int,
                    CostoFinal decimal (11,2) DEFAULT '0.00');

create table catalogoelemento (IDCatElem int not null auto_increment primary key,
								Nombre varchar (50),
								Categoria varchar (50));

create table elemento (IDElemento int not null auto_increment primary key,
						IDProducto int not null,
                        foreign key (IDProducto) references producto (IDProducto),
                        IDCatElem int not null,
                        foreign key (IDCatElem) references catalogoelemento (IDCatElem),
                        Cantidad int,
                        Ancho decimal (11,2) DEFAULT '0.00',
                        Alto decimal (11,2) DEFAULT '0.00',
                        Profundidad decimal (11,2) DEFAULT '0.00',
                        CostoMod decimal (11,2) DEFAULT '0.00',
						CostoFinal decimal (11,2) DEFAULT '0.00');

use historias
                        
create table catalogomaterial (IDCatMat int not null auto_increment primary key,
								Nombre varchar (50),
                                NombreProveedor varchar(50),
                                Gramaje decimal(11,2),
                                Color varchar(50),
                                Ancho decimal(11,2),
                                Largo decimal(11,2),
                                Proveedor varchar(50),
                                PrecioCompra decimal(11,2));

create table material (IDMaterial int not null auto_increment primary key,
						IDElemento int not null,
                        foreign key (IDElemento) references elemento (IDElemento),
                        IDCatMat int not null,
                        foreign key (IDCatMat) references catalogomaterial (IDCatMat),
                        Alto decimal (11,2) DEFAULT '0.00',
                        Base decimal (11,2) DEFAULT '0.00',
                        Cantidad int,
                        CostoS decimal (11,2)  DEFAULT '0.00',
                        PrecioCompra decimal (11,2)  DEFAULT '0.00',
                        CostoFinal decimal (11,2) DEFAULT '0.00');
                        
/*------------------------------------------------------------------------------------*/
                        
create table maquina (IDMaquina int not null auto_increment primary key,
						Nombre varchar (50),
                        Proceso varchar (50));

create table catalogoproceso (IDCatPro int not null auto_increment primary key,
						IDMaquina int not null,
                        Nombre varchar (50),
                        CostoUnico decimal (11,2),
                        CostoUnitario decimal (11,2),
                        CostoCiento decimal (11,2),
                        CostoMillar decimal (11,2));

create table proceso (IDProceso int not null auto_increment primary key,
						IDMaterial int not null,
                        foreign key (IDMaterial) references material (IDMaterial),
                        IDCatPro int not null,
                        foreign key (IDCatPro) references catalogoproceso (IDCatPro),
                        Descripcion varchar (50),
                        Cantidad int,
                        CostoUnico decimal (11,2) DEFAULT '0.00',
                        CostoUnitario decimal (11,2) DEFAULT '0.00',
                        CostoCiento decimal (11,2) DEFAULT '0.00',
                        CostoMillar decimal (11,2) DEFAULT '0.00',
                        CostoFinal decimal (11,2) DEFAULT '0.00')




use historias

load data local infile "C:/xampp/htdocs/Historias/.csv" into table catalogomaterial
fields terminated by ','
LINES TERMINATED BY '\n'

