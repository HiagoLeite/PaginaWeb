create database bdTeste;
use bdTeste;

create table centroDeCusto( 
	idCentro int not null AUTO_INCREMENT,
	valor int not null,
	primary key(idCentro)
);
create table departamento( 
	idDepartamento int not null AUTO_INCREMENT,
	nomeDep varchar(45) not null,
	primary key (idDepartamento),
	idCentro int not null,
	foreign key(idCentro) references centroDeCusto(idCentro)
);
create table cargo( 
	idcargo int not null AUTO_INCREMENT,				
	nomecarg varchar(45) not null,
	primary key (idcargo), 
	idDepartamento int not null,
	foreign key(idDepartamento) references departamento(idDepartamento)
);
create table usuario( 
	idUsuario int not null AUTO_INCREMENT,				
	nomeUsu varchar(45) not null,
	primary key (idUsuario),
	idCargo int not null,
	foreign key(idCargo) references cargo(idCargo)
);