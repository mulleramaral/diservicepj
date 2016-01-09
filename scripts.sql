CREATE DATABASE diservicepj;
USE diservicepj;
CREATE TABLE fornecedores(
id int auto_increment primary key,
nome varchar(100),
email varchar(255));

CREATE TABLE produtos(
id int auto_increment primary key,
id_fornecedores int not null,
nome varchar(200),
unidade varchar(3));

ALTER TABLE produtos ADD CONSTRAINT fornecedores_produtos FOREIGN KEY(id_fornecedores)
REFERENCES fornecedores(id);

INSERT INTO fornecedores(nome,email) VALUES('Muller','mulleramaral@gmail.com');
INSERT INTO produtos(id_fornecedores,nome,unidade) VALUES(1,'Caneta','PÇ');