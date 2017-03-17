create table tipo (
id int(8) primary key auto_increment,
nome varchar(50)
);
insert into tipo values (0,'Apartamento');
insert into tipo values (1,'Área Industrial');
insert into tipo values (2,'Casa');
insert into tipo values (3,'Cobertura');
insert into tipo values (4,'Galpão');
insert into tipo values (5,'Kitnet');
insert into tipo values (6,'Ponto Comercial');
insert into tipo values (7,'Prédio Comercial');
insert into tipo values (8,'Sala Comercial');
insert into tipo values (9,'Sítio');
insert into tipo values (10,'Sobrado');
insert into tipo values (11,'Terreno');

create table finalidade (
id int(8) primary key auto_increment,
nome varchar(50)
);
insert into finalidade values (0,'Venda');
insert into finalidade values (1,'Aluguel');
