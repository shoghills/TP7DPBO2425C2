CREATE DATABASE db_apartment;
USE db_apartment;

CREATE TABLE rooms (
    id INT AUTO_INCREMENT PRIMARY KEY,
    available BOOLEAN NOT NULL DEFAULT TRUE,
    room_number VARCHAR(10) NOT NULL UNIQUE,
    floor INT NOT NULL,
    price DECIMAL(10, 2) NOT NULL,
    type VARCHAR(50) NOT NULL
);

CREATE TABLE tenant (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(100) UNIQUE,
    phone VARCHAR(15)
);

CREATE TABLE payment (
    id INT AUTO_INCREMENT PRIMARY KEY,
    tenant_id INT NOT NULL,
    room_id INT NOT NULL,
    amount DECIMAL(10, 2) NOT NULL,
    payment_date DATE NOT NULL,
    FOREIGN KEY (tenant_id) REFERENCES tenant(id),
    FOREIGN KEY (room_id) REFERENCES rooms(id)
);

INSERT INTO rooms (available, room_number, floor, price, type) VALUES
(FALSE, 'A-101', 1, 3500000.00, 'Studio'),
(TRUE, 'B-205', 2, 4500000.00, '1 Bedroom'),
(FALSE, 'C-310', 3, 6000000.00, '2 Bedroom'),
(TRUE, 'A-102', 1, 3500000.00, 'Studio'),
(FALSE, 'B-206', 2, 4500000.00, '1 Bedroom');

INSERT INTO tenant (name, email, phone) VALUES
('Siti Komala', 'siti.komala@example.com', '08112233445'),
('Bambang Pamungkas', 'bambang.p@example.com', '08765432109');