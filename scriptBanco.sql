create database bdTeste;
use bdTeste;

create table centroDeCusto( 
		idCentro int not null primary key,
		valor int);

create table departamento( 
		idDepartamento int not null primary key,
		nomeDep varchar(45),
		idCentro int,
		foreign key(idCentro) references centroDeCusto(idCentro));

create table cargo( 
	idcargo int not null primary key,				
	nomecarg varchar(45),
	idDepartamento int,
	foreign key(idDepartamento) references departamento(idDepartamento));


create table usuario( 
	idUsuario int not null primary key,				
	nomeUsu varchar(45),
	idCargo int ,
	foreign key(idCargo) references cargo(idCargo));