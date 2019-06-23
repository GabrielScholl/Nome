<?php

// setup
$servidor = 'localhost';
$username = 'root';
$password = '';

$link=mysqli_connect($servidor,$username,$password);

if(!$link) {
    die("Falha de conexao: " . mysqli_connect_error());
}

$criaBD = 'CREATE DATABASE luna
            CHARACTER SET utf8
            COLLATE utf8_general_ci;';
mysqli_query($link, $criaBD);

$usa = 'USE luna;';
mysqli_query($link, $usa);


// fim do setup

// tabelas
$usuarios = 'CREATE TABLE usuarios ( 
            login varchar(10), 
            email varchar(50),
            senha varchar(255),
            perguntaS varchar(255),
            respostaS varchar(255), 
            PRIMARY KEY (login));';
mysqli_query($link, $usuarios);
//IDunidade int(4) NOT NULL AUTO_INCREMENT, 
$unidades = 'CREATE TABLE unidades (
            login varchar(10),
            nome varchar(50),
            tipo varchar(20), 
            descricao varchar(255), 
            PRIMARY KEY (nome,login),
            FOREIGN KEY(login) REFERENCES usuarios (login));';
mysqli_query($link, $unidades);
          
$custos = 'CREATE TABLE custos (
            IDregistro int(10) NOT NULL AUTO_INCREMENT, 
            nome varchar(50), 
            login varchar(50),
            dataCusto varchar(4), 
            valor decimal(10, 2), 
            nomeCusto varchar(255),
            PRIMARY KEY (IDregistro), 
            FOREIGN KEY (nome,login) REFERENCES unidades (nome,login));'; 
mysqli_query($link, $custos);

$ganhos = 'CREATE TABLE ganhos (
            IDregistro int(10) NOT NULL AUTO_INCREMENT, 
            nome varchar(50),
            login varchar(50), 
            dataGanho varchar(4), 
            valor decimal(10, 2), 
            nomeGanho varchar(255),
            PRIMARY KEY (IDregistro), 
            FOREIGN KEY (nome,login) REFERENCES unidades (nome,login));'; 
//            FOREIGN KEY (item) REFERENCES itensdeganho (IDganho))
mysqli_query($link, $ganhos);
// fim das tabelas

echo '<html><h1>SEU BANCO DE DADOS ESTÁ INSTALADO</h1></html>';
?>