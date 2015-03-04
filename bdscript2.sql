#  Creado con Kata Kuntur - Modelador de Datos
#  Versión: 2.5.2
#  Sitio Web: http://katakuntur.jeanmazuelos.com/
#  Si usted encuentra algún error le agradeceriamos lo reporte en:
#  http://pm.jeanmazuelos.com/katakuntur/issues/new

#  Administrador de Base de Datos: MySQL/MariaDB
#  Diagrama: videojuegos2
#  Autor: USUARIO
#  Fecha y hora: 03/03/2015 15:28:57

# GENERANDO TABLAS
CREATE TABLE `CLIENTE` (
	`id_c` INTEGER NOT NULL,
	`nombre_c` VARCHAR(100) NOT NULL,
	`telefono_c` VARCHAR(20) NOT NULL,
	`correo_c` VARCHAR(50) NOT NULL,
	PRIMARY KEY(`id_c`)
) ENGINE=INNODB;
CREATE TABLE `ALQUILER` (
	`id_r` INTEGER NOT NULL,
	`fecha_act` DATE NOT NULL,
	`fecha_ven` DATE NOT NULL,
	`id_v` INTEGER NOT NULL,
	KEY(`id_v`),
	`id_c` INTEGER NOT NULL,
	KEY(`id_c`),
	PRIMARY KEY(`id_r`)
) ENGINE=INNODB;
CREATE TABLE `VIDEOJUEGO` (
	`id_v` INTEGER AUTO_INCREMENT NOT NULL,
	`nombre_v` VARCHAR(100) NOT NULL,
	`descripcion_v` VARCHAR(500) NOT NULL,
	`cantidad_v` INTEGER NOT NULL,
	`precio_v` INTEGER NOT NULL,
	`consola_v` VARCHAR(20) NOT NULL,
	`id_cat` INTEGER NOT NULL,
	KEY(`id_cat`),
	`id_adm` INTEGER NOT NULL,
	KEY(`id_adm`),
	PRIMARY KEY(`id_v`)
) ENGINE=INNODB;
CREATE TABLE `CATEGORIAS` (
	`id_cat` INTEGER AUTO_INCREMENT NOT NULL,
	`nombre` VARCHAR(50) NOT NULL,
	PRIMARY KEY(`id_cat`)
) ENGINE=INNODB;
CREATE TABLE `ADMINISTRADOR` (
	`id_adm` INTEGER AUTO_INCREMENT NOT NULL,
	`nombre_adm` VARCHAR(100) NOT NULL,
	`correo_adm` VARCHAR(50) NOT NULL,
	`codigo_adm` VARCHAR(20) NOT NULL,
	PRIMARY KEY(`id_adm`)
) ENGINE=INNODB;

# GENERANDO RELACIONES
ALTER TABLE `ALQUILER` ADD CONSTRAINT `alquiler_videojuego_id_v` FOREIGN KEY (`id_v`) REFERENCES `VIDEOJUEGO`(`id_v`) ON DELETE NO ACTION ON UPDATE CASCADE;
ALTER TABLE `ALQUILER` ADD CONSTRAINT `alquiler_cliente_id_c` FOREIGN KEY (`id_c`) REFERENCES `CLIENTE`(`id_c`) ON DELETE NO ACTION ON UPDATE CASCADE;
ALTER TABLE `VIDEOJUEGO` ADD CONSTRAINT `videojuego_categorias_id_cat` FOREIGN KEY (`id_cat`) REFERENCES `CATEGORIAS`(`id_cat`) ON DELETE NO ACTION ON UPDATE CASCADE;
ALTER TABLE `VIDEOJUEGO` ADD CONSTRAINT `videojuego_administrador_id_adm` FOREIGN KEY (`id_adm`) REFERENCES `ADMINISTRADOR`(`id_adm`) ON DELETE NO ACTION ON UPDATE CASCADE;