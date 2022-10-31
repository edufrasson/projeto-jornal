CREATE DATABASE db_jornal;
USE db_jornal;

create table categoria_noticia(
    id int auto_increment not null,
    nome text not null,
    primary key(id)
);

create table noticia(
    id int auto_increment not null,
    titulo text not null,
    conteudo text not null,
    id_categoria int not null,
    primary key(id),
    foreign key(id_categoria) references categoria_noticia(id)     
);

create table usuario(
    id int auto_increment not null,
    email varchar(100) not null,
    nome varchar(100) not null,
    senha varchar(100) not null, 
    primary key(id)
);

INSERT INTO usuario(nome, email, senha) VALUES("Administrador", "adm@email", sha1(123));