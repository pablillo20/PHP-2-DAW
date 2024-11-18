DROP DATABASE IF EXISTS empresa;
SET NAMES UTF8;
CREATE DATABASE empresa DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;

USE empresa;

DROP TABLE IF EXISTS usuarios;
CREATE TABLE usuarios(
                         codigo int(10) auto_increment not null,
                         nombre varchar(100) not null,
                         clave varchar(50) not null,
                         rol int(20) not null,
                         CONSTRAINT pk_usuarios PRIMARY KEY(codigo),
                         CONSTRAINT UC_nombre UNIQUE (nombre)
)ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_bin;

INSERT INTO usuarios VALUES(null,'Maria','maria123',1);
INSERT INTO usuarios VALUES (null,'Pablo','pablo123',1);
INSERT INTO usuarios VALUES (null,'Jacinto','jacinto123',2);
INSERT INTO usuarios VALUES (null,'Luna','Luna123',2);