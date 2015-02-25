#  Creado con Kata Kuntur - Modelador de Datos
#  Versión: 2.5.2
#  Sitio Web: http://katakuntur.jeanmazuelos.com/
#  Si usted encuentra algún error le agradeceriamos lo reporte en:
#  http://pm.jeanmazuelos.com/katakuntur/issues/new

#  Administrador de Base de Datos: MySQL/MariaDB
#  Diagrama: VideoJuegos
#  Autor: PROSOFT2
#  Fecha y hora: 24/02/2015 22:27:54

# GENERANDO TABLAS
CREATE TABLE `FACTURA` (
	`id_factura` INTEGER AUTO_INCREMENT NOT NULL,
	`fecha` DATE NOT NULL,
	`cliente_cedula_c` INTEGER NOT NULL,
	KEY(`cliente_cedula_c`),
	`videojuego_id_vj` INTEGER NOT NULL,
	KEY(`videojuego_id_vj`),
	PRIMARY KEY(`id_factura`)
) ENGINE=INNODB;
CREATE TABLE `Videojuego` (
	`id_vj` INTEGER AUTO_INCREMENT NOT NULL,
	`nombre_vj` VARCHAR(50) NOT NULL,
	`descripcion_vj` VARCHAR(100) NOT NULL,
	`cantidad_vj` INTEGER NOT NULL,
	`precio_vj` INTEGER NOT NULL,
	`consola_vj` VARCHAR(50) NOT NULL,
	`factura_id_factura` INTEGER NULL,
	KEY(`factura_id_factura`),
	PRIMARY KEY(`id_vj`)
) ENGINE=INNODB;
CREATE TABLE `CLIENTE` (
	`cedula_c` INTEGER AUTO_INCREMENT NOT NULL,
	`nombre_c` VARCHAR(50) NOT NULL,
	`telefeno_c` VARCHAR(20) NOT NULL,
	PRIMARY KEY(`cedula_c`)
) ENGINE=INNODB;

# GENERANDO RELACIONES
ALTER TABLE `FACTURA` ADD CONSTRAINT `factura_cliente_cliente_cedula_c` FOREIGN KEY (`cliente_cedula_c`) REFERENCES `CLIENTE`(`cedula_c`) ON DELETE NO ACTION ON UPDATE CASCADE;
ALTER TABLE `FACTURA` ADD CONSTRAINT `factura_videojuego_videojuego_id_vj` FOREIGN KEY (`videojuego_id_vj`) REFERENCES `Videojuego`(`id_vj`) ON DELETE NO ACTION ON UPDATE CASCADE;
ALTER TABLE `Videojuego` ADD CONSTRAINT `videojuego_factura_factura_id_factura` FOREIGN KEY (`factura_id_factura`) REFERENCES `FACTURA`(`id_factura`) ON DELETE NO ACTION ON UPDATE CASCADE;