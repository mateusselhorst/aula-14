CREATE DATABASE farmacia_db;
USE farmacia_db;

CREATE TABLE medicamentos (
    id INT PRIMARY KEY AUTO_INCREMENT,
    nome VARCHAR(100) NOT NULL,
    tipo ENUM('Comprimido', 'Xarope', 'Pomada', 'Injeção') NOT NULL,
    preco DECIMAL(10,2) NOT NULL,
    validade DATE NOT NULL,
    quantidade INT NOT NULL
);

CREATE TABLE usuarios (
    id INT PRIMARY KEY AUTO_INCREMENT,
    nome VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    senha VARCHAR(255) NOT NULL
);