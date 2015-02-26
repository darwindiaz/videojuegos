#  Creado con Kata Kuntur - Modelador de Datos
#  Versión: 2.5.2
#  Sitio Web: http://katakuntur.jeanmazuelos.com/
#  Si usted encuentra algún error le agradeceriamos lo reporte en:
#  http://pm.jeanmazuelos.com/katakuntur/issues/new

#  Administrador de Base de Datos: MySQL/MariaDB
#  Diagrama: videojuegos2
#  Autor: USUARIO
#  Fecha y hora: 26/02/2015 11:14:47

# GENERANDO TABLAS
CREATE TABLE `CLIENTE` (
	`cedula_c` INTEGER NOT NULL,
	`nombre_c` VARCHAR(100) NULL,
	`telefono_c` VARCHAR(20) NULL,
	PRIMARY KEY(`cedula_c`)
) ENGINE=INNODB;
CREATE TABLE `ALQUILER` (
	`id_r` INTEGER NOT NULL,
	`id_v` INTEGER NOT NULL,
	KEY(`id_v`),
	`cedula_c` INTEGER NOT NULL,
	KEY(`cedula_c`),
	PRIMARY KEY(`id_r`)
) ENGINE=INNODB;
CREATE TABLE `VIDEOJUEGO` (
	`id_v` INTEGER AUTO_INCREMENT NOT NULL,
	`nombre_v` VARCHAR(100) NOT NULL,
	`descripcion_v` VARCHAR(500) NOT NULL,
	`cantidad_v` INTEGER NOT NULL,
	`precio_v` INTEGER NOT NULL,
	`consola_v` VARCHAR(20) NOT NULL,
	PRIMARY KEY(`id_v`)
) ENGINE=INNODB;

# GENERANDO RELACIONES
ALTER TABLE `ALQUILER` ADD CONSTRAINT `alquiler_videojuego_id_v` FOREIGN KEY (`id_v`) REFERENCES `VIDEOJUEGO`(`id_v`) ON DELETE NO ACTION ON UPDATE CASCADE;
ALTER TABLE `ALQUILER` ADD CONSTRAINT `alquiler_cliente_cedula_c` FOREIGN KEY (`cedula_c`) REFERENCES `CLIENTE`(`cedula_c`) ON DELETE NO ACTION ON UPDATE CASCADE;