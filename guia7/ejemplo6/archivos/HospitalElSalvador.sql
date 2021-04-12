create database HospitalElSalvador
use HospitalElSalvador
create table usuarios(
	ID int identity(1,1) primary key,
	NombreUsuario varchar(50) not null,
	Contra varchar(20) not null,
	idTipoUsuario int not null
);
create table Tipousuario(
	ID int identity(1,1) primary key,
	Nombre varchar(50) not null
);
create table consultaMedica(
	ID int identity(1,1) primary key,
	Fecha date not null,
	Hora time not null,
	DuracionMin int not null,
	TipoPaciente varchar(20) not null,
	idDoctor int not null,
	idPaciente int not null,
	idBitacora int
);
create table bitacora(
	ID int identity(1,1) primary key,
	Diagnostico varchar(200),
	Estado varchar(50),
	InfoEspecifica varchar(100)
);
create table visita(
	ID int identity(1,1) primary key,
	Fecha date not null,
	Hora time not null,
	DuracionMin int not null,
	Nombre varchar(70) not null,
	DocumentoID varchar(20) not null,
	idPaciente int not null
);
create table paciente(
	ID int identity(1,1) primary key,
	DocumentoID varchar(20) not null,
	Nombres varchar(50) not null,
	Apellidos varchar(50) not null,
	fechaNac Date not null
);
insert into Tipousuario values('Doctor');
insert into Tipousuario values('Enfermera');
insert into Tipousuario values('Administrativo');
insert into usuarios values('Kevin','Kevin123',1);
insert into usuarios values('Rene','Rene123',2);
insert into usuarios values('Alex','Alex123',3);
insert into bitacora values('Paciente sufre de migraña','estable','muy dificil de controlar');
insert into paciente values('12345678-9','Jose Miguel','Ramirez Gomez','1995/07/27');
insert into visita values('2021/03/25','09:51:30',50,'Carlos David','12345678-0',2);
insert into consultaMedica values('2021/03/25','15:37:50',30,'Interno',1,2,null);
select * from consultaMedica