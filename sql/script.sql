create database imobi;

create table tipo (
id int(8) primary key auto_increment,
descricao varchar(50)
);
insert into tipo values (1,'Apartamento');
insert into tipo values (2,'Área Industrial');
insert into tipo values (3,'Casa');
insert into tipo values (4,'Cobertura');
insert into tipo values (5,'Galpão');
insert into tipo values (6,'Kitnet');
insert into tipo values (7,'Ponto Comercial');
insert into tipo values (8,'Prédio Comercial');
insert into tipo values (9,'Sala Comercial');
insert into tipo values (10,'Sítio');
insert into tipo values (11,'Sobrado');
insert into tipo values (12,'Terreno');

create table finalidade (
id int(8) primary key auto_increment,
descricao varchar(50)
);
insert into finalidade values (1,'Venda');
insert into finalidade values (2,'Aluguel');

drop table imovel;
create table imovel (
id int(8) primary key auto_increment,
idUsuario int(8),
titulo varchar(50),
descricao varchar(200),
idCidade int(8),
endereco varchar(200),
referencia varchar(50),
valor double(15,2),
emailContato varchar(50),
telefone1 varchar(50),
telefone2 varchar(50),
site varchar(50),
idFinalidade int(8),
idTipo int(8),
dormitorios int(2),
suites int(2),
banheiros int(2),
garagem int(2),
imgDir varchar(50),
dataCadastro date,
dataEdicao date,
ativo int(1)
);
SELECT c.nome FROM cidades c inner join estados e on (c.estados_id = e.id) where e.id = 1