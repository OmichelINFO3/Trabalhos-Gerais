CREATE DATABASE bancoSD;
USE bancoSD;

create table categoria
(
id_categoria int primary key auto_increment,
nome varchar(30)
);

create table imagem
(
id_imagem int primary key auto_increment,
url varchar(120)
);

create table Produto(
id_produto int primary key auto_increment,
id_categoria_id int,
id_imagem_id int,
FOREIGN KEY (id_categoria_id) REFERENCES categoria(id_categoria),
FOREIGN KEY (id_imagem_id) REFERENCES imagem(id_imagem),
valor dec(10,2),
descricao varchar(120),
nome_produto varchar(60),
avaliacao dec(10,2),
disponibilidade boolean
);

create table Cliente(
id_cliente int primary key auto_increment,
email varchar(60),
senha varchar(20),
nome_cliente varchar(60)
);


create table compra
(
id_compra int primary key auto_increment,
id_cliente_id int,
id_produto_id int,
met_pagamento int,
data_compra date,
CEP_cliente varchar(9),
FOREIGN KEY (id_cliente_id) REFERENCES Cliente(id_cliente),
FOREIGN KEY (id_produto_id) REFERENCES produto(id_produto)
);

insert into imagem values(1,'fotosearch1.png');
insert into imagem values(2,'fotosearch2.png');
insert into imagem values(3,'fotosearch3.png');

insert into categoria values(1,'Sapatos');
insert into categoria values(2,'Camiseta');
insert into categoria values(3,'Calca');

create table Produto(
id_produto int primary key auto_increment,
id_categoria_id int,
id_imagem_id int,
FOREIGN KEY (id_categoria_id) REFERENCES categoria(id_categoria),
FOREIGN KEY (id_imagem_id) REFERENCES imagem(id_imagem),
valor dec(10,2),
descricao varchar(120),
nome_produto varchar(60),
avaliacao dec(10,2),
disponibilidade boolean
);

insert into produto values(1,1,1,24.99,'descricao exemplo','Sapato Social',4.2,true);
insert into produto values(2,2,2,49.99,'descricao exemplo','Camiseta Polo',4.8,true);
insert into produto values(3,3,3,19.99,'descricao exemplo','Calca Jeans',4.0,true);

