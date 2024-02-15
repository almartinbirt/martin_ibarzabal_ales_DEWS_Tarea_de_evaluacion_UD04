-- Crear la base de datos tienda
CREATE DATABASE IF NOT EXISTS martin_ibarzabal_dwes04;
USE martin_ibarzabal_dwes04;

-- Crear la tabla usuarios
CREATE TABLE IF NOT EXISTS usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(255),
    correo VARCHAR(255),
    telefono VARCHAR(15)
);

-- Insertar datos ficticios en la tabla usuarios
INSERT INTO usuarios (nombre, correo, telefono) VALUES
('Juan Perez', 'juan@example.com', '123-456-7890'),
('Maria Lopez', 'maria@example.com', '943-654-3210'),
('Pedro Garcia', 'pedro@example.com', '555-555-5555');

-- Crear la tabla productos
CREATE TABLE IF NOT EXISTS productos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(255),
    precio DECIMAL(10, 2),
    cantidad INT
);

-- Insertar datos ficticios en la tabla productos
INSERT INTO productos (nombre, precio, cantidad) VALUES
('Camiseta', 19.99, 100),
('Pantalon', 29.99, 50),
('Zapatos', 49.99, 30);

-- Crear la tabla de relación entre usuarios y productos
CREATE TABLE IF NOT EXISTS compras (
    id INT AUTO_INCREMENT PRIMARY KEY,
    usuario_id INT,
    producto_id INT,
    cantidad INT,
    fecha_compra DATE,
    FOREIGN KEY (usuario_id) REFERENCES usuarios(id),
    FOREIGN KEY (producto_id) REFERENCES productos(id)
);

-- Insertar datos ficticios en la tabla de relación compras
INSERT INTO compras (usuario_id, producto_id, cantidad, fecha_compra) VALUES
(1, 1, 2, '2024-02-12'),
(2, 2, 1, '2024-02-11'),
(3, 3, 3, '2024-02-10');
