DROP DATABASE IF EXISTS ventas;
CREATE DATABASE IF NOT EXISTS ventas;
USE ventas;
CREATE TABLE productos(
	codigo BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
	descripcion VARCHAR(255) NOT NULL,
	precioVenta DECIMAL(5, 2) NOT NULL,
	precioCompra DECIMAL(5, 2) NOT NULL,
	existencia integer NOT NULL,
	PRIMARY KEY(codigo)
) ENGINE = InnoDB DEFAULT CHARACTER SET = utf8;

CREATE TABLE ventas(
	codigo BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
	fecha DATETIME NOT NULL,
	total DECIMAL(7,2),
	PRIMARY KEY(codigo)
) ENGINE = InnoDB DEFAULT CHARACTER SET = utf8;

CREATE TABLE productos_vendidos(
	id BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
	id_producto BIGINT UNSIGNED NOT NULL,
	cantidad BIGINT UNSIGNED NOT NULL,
	id_venta BIGINT UNSIGNED NOT NULL,
	PRIMARY KEY(id),
	FOREIGN KEY(id_producto) REFERENCES productos(codigo) ON DELETE CASCADE,
	FOREIGN KEY(id_venta) REFERENCES ventas(codigo) ON DELETE CASCADE
) ENGINE = InnoDB DEFAULT CHARACTER SET = utf8;


# Correcto