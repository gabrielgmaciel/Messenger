drop database gnove;

create database gnove charset = UTF8 COLLATE = utf8_general_ci;

use gnove;

create table usuario(
cod_usuario int NOT NULL AUTO_INCREMENT,
nome varchar(70) not null,
email varchar(60) not null,
senha varchar(255)not null,
telefone varchar (40) not null,
primary key(cod_usuario)
);

create table dados_veiculo(
cod_usuario INT NOT NULL,
tipo_veiculo int not null,
placa varchar(8) not null,
modelo varchar(60) not null,
primary key (placa),
foreign key (cod_usuario) references usuario (cod_usuario) on delete cascade on update cascade
);

create table mensagens(
id int not null auto_increment,
mensagem varchar(150),
primary key (id)
);

create table mensagem_usuario(
cod_usuario int NOT NULL,
placa varchar (60) not null,
id int not null auto_increment,
mensagens varchar (255)not null,
tempo timestamp default current_timestamp(),
status int not null,
foreign key (cod_usuario) references usuario (cod_usuario) on delete cascade on update cascade,
foreign key (placa) references dados_veiculo (placa) on delete cascade on update cascade,
primary key (id)
);

insert into usuario (cod_usuario, nome, email,senha, telefone)
values
(NULL, 'gabriel', 'gabriel@gmail.com', MD5('abc123'), '(61) 89324-4519'),
(NULL, 'teste01', 'teste01@teste.com', MD5('abc123'), '(61) 94757-2330'),
(NULL, 'Wanderson', 'emailwan@teste.com', MD5('abc123'), '(61) 93494-2555');


INSERT INTO dados_veiculo (cod_usuario, placa, modelo, tipo_veiculo)
VALUES
(1, upper('abc-1234'), 'Accord', 1),
(2, upper('cvc-2312'), 'CB1000', 2),
(3, upper('wsl-0001'), 'Mustang Gt 500 Shelby', 1);

select * from mensagem_usuario;

truncate table mensagem_usuario;

select * from usuario;

