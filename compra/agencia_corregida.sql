
-- Base de datos: agencia_corregida

DROP DATABASE IF EXISTS agencia_corregida;
CREATE DATABASE agencia_corregida;
USE agencia_corregida;

-- ========================
-- TABLAS
-- ========================

CREATE TABLE pais (
  id_pais INT PRIMARY KEY AUTO_INCREMENT,
  nombre VARCHAR(100) NOT NULL
);

CREATE TABLE provincia (
  id_provincia INT PRIMARY KEY AUTO_INCREMENT,
  nombre VARCHAR(100) NOT NULL,
  id_pais INT NOT NULL,
  FOREIGN KEY (id_pais) REFERENCES pais(id_pais)
);

CREATE TABLE ciudad (
  id_ciudad INT PRIMARY KEY AUTO_INCREMENT,
  nombre VARCHAR(100) NOT NULL,
  id_provincia INT NOT NULL,
  FOREIGN KEY (id_provincia) REFERENCES provincia(id_provincia)
);

CREATE TABLE usuario (
  id_usuario INT PRIMARY KEY AUTO_INCREMENT,
  nombre VARCHAR(100) NOT NULL,
  apellido VARCHAR(100) NOT NULL,
  correo VARCHAR(150) NOT NULL,
  telefono INT NOT NULL,
  contrasena VARCHAR(100) NOT NULL
);

CREATE TABLE cliente (
  id_cliente INT PRIMARY KEY AUTO_INCREMENT,
  nombre VARCHAR(100) NOT NULL,
  apellido VARCHAR(100) NOT NULL,
  fecha_nacimiento DATE NOT NULL,
  dni INT NOT NULL,
  id_usuario INT NOT NULL,
  id_pais INT NOT NULL,
  FOREIGN KEY (id_usuario) REFERENCES usuario(id_usuario),
  FOREIGN KEY (id_pais) REFERENCES pais(id_pais)
);

CREATE TABLE empresa_transporte (
  id_empresa_transporte INT PRIMARY KEY AUTO_INCREMENT,
  nombre VARCHAR(100) NOT NULL,
  region VARCHAR(100) NOT NULL,
  telefono INT NOT NULL
);

CREATE TABLE transporte (
  id_transporte INT PRIMARY KEY AUTO_INCREMENT,
  id_tipo INT NOT NULL,
  ida DATE NOT NULL,
  vuelta DATE NOT NULL,
  destino_origen TEXT NOT NULL,
  id_empresa_transporte INT NOT NULL,
  FOREIGN KEY (id_empresa_transporte) REFERENCES empresa_transporte(id_empresa_transporte)
);

CREATE TABLE hotel (
  id_hotel INT PRIMARY KEY AUTO_INCREMENT,
  nombre VARCHAR(100) NOT NULL,
  direccion VARCHAR(200) NOT NULL,
  categoria VARCHAR(150) NOT NULL,
  precio DECIMAL(10,2) NOT NULL,
  id_ciudad INT NOT NULL,
  FOREIGN KEY (id_ciudad) REFERENCES ciudad(id_ciudad)
);

CREATE TABLE paquetes (
  id INT PRIMARY KEY AUTO_INCREMENT,
  nombre_paquete VARCHAR(255) NOT NULL,
  precio DECIMAL(10,2) NOT NULL,
  transporte_id INT NOT NULL,
  hotel_id INT NOT NULL,
  ciudad_id INT NOT NULL,
  FOREIGN KEY (transporte_id) REFERENCES transporte(id_transporte),
  FOREIGN KEY (hotel_id) REFERENCES hotel(id_hotel),
  FOREIGN KEY (ciudad_id) REFERENCES ciudad(id_ciudad)
);

CREATE TABLE productos (
  id_producto INT PRIMARY KEY AUTO_INCREMENT,
  nombre VARCHAR(255) NOT NULL,
  descripcion TEXT,
  precio DECIMAL(10,2),
  duracion INT,
  fecha_inicio DATE,
  fecha_fin DATE,
  id_provincia INT,
  id_ciudad INT,
  id_hotel INT,
  estado ENUM('activo','inactivo','eliminado'),
  FOREIGN KEY (id_provincia) REFERENCES provincia(id_provincia),
  FOREIGN KEY (id_ciudad) REFERENCES ciudad(id_ciudad),
  FOREIGN KEY (id_hotel) REFERENCES hotel(id_hotel)
);

CREATE TABLE compras (
  id INT PRIMARY KEY AUTO_INCREMENT,
  paquete_id INT NOT NULL,
  fecha_compra TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  FOREIGN KEY (paquete_id) REFERENCES paquetes(id)
);

CREATE TABLE carrito (
  id_carrito INT PRIMARY KEY AUTO_INCREMENT,
  id_cliente INT NOT NULL,
  FOREIGN KEY (id_cliente) REFERENCES cliente(id_cliente)
);

CREATE TABLE carrito_detalle (
  id_carrito_detalle INT PRIMARY KEY AUTO_INCREMENT,
  id_carrito INT NOT NULL,
  id_producto INT NOT NULL,
  cantidad INT NOT NULL,
  FOREIGN KEY (id_carrito) REFERENCES carrito(id_carrito),
  FOREIGN KEY (id_producto) REFERENCES productos(id_producto)
);

CREATE TABLE pago (
  id_pago INT PRIMARY KEY AUTO_INCREMENT,
  id_cliente INT NOT NULL,
  monto DECIMAL(10,2),
  fecha_pago DATE,
  metodo_pago VARCHAR(50),
  FOREIGN KEY (id_cliente) REFERENCES cliente(id_cliente)
);

CREATE TABLE pedido (
  id_pedido INT PRIMARY KEY AUTO_INCREMENT,
  id_cliente INT NOT NULL,
  fecha TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  total DECIMAL(10,2),
  FOREIGN KEY (id_cliente) REFERENCES cliente(id_cliente)
);

-- ========================
-- DATOS DE EJEMPLO
-- ========================

INSERT INTO pais (nombre) VALUES ('Indonesia'), ('España'), ('México');

INSERT INTO provincia (nombre, id_pais) VALUES
  ('Bali', 1),
  ('Madrid', 2),
  ('Quintana Roo', 3);

INSERT INTO ciudad (nombre, id_provincia) VALUES
  ('Denpasar', 1),
  ('Madrid', 2),
  ('Cancún', 3);

INSERT INTO usuario (nombre, apellido, correo, telefono, contrasena) VALUES
  ('Alejo', 'Perez', 'alejoperez@gmail.com', 1234, '12');

INSERT INTO cliente (nombre, apellido, fecha_nacimiento, dni, id_usuario, id_pais) VALUES
  ('Alejo', 'Perez', '1990-01-01', 12345678, 1, 1);

INSERT INTO empresa_transporte (nombre, region, telefono) VALUES
  ('Air Bali', 'Asia', 1111),
  ('Iberia', 'Europa', 2222),
  ('AeroMexico', 'Latinoamérica', 3333);

INSERT INTO transporte (id_tipo, ida, vuelta, destino_origen, id_empresa_transporte) VALUES
  (1, '2025-06-13', '2025-06-28', 'Buenos Aires - Denpasar', 1);

INSERT INTO hotel (nombre, direccion, categoria, precio, id_ciudad) VALUES
  ('Sunset Resort', 'Jl. Sunset No.1', '5 estrellas', 250, 1),
  ('Hotel Madrid', 'Calle Mayor 20', '4 estrellas', 150, 2),
  ('Cancún Beach', 'Av. Playa del Carmen', '5 estrellas', 300, 3);

INSERT INTO paquetes (nombre_paquete, precio, transporte_id, hotel_id, ciudad_id) VALUES
  ('Vacaciones Bali', 1500.00, 1, 1, 1);

INSERT INTO productos (nombre, descripcion, precio, duracion, fecha_inicio, fecha_fin, id_provincia, id_ciudad, id_hotel, estado) VALUES
  ('Vacaciones en Bali', 'Disfruta de Bali', 1500.00, 7, '2025-06-01', '2025-06-08', 1, 1, 1, 'activo');
