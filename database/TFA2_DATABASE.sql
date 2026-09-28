-- TFA2 database setup for the POS application.
-- Run this script in phpMyAdmin while MySQL is running.

CREATE DATABASE IF NOT EXISTS pos_database;
USE pos_database;

CREATE TABLE IF NOT EXISTS customers (
    id INT AUTO_INCREMENT PRIMARY KEY,
    full_name VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL,
    phone VARCHAR(20),
    created_at DATETIME NOT NULL
);

CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    full_name VARCHAR(100) NOT NULL,
    created_at DATETIME NOT NULL
);

INSERT INTO customers (full_name, email, phone, created_at) VALUES
    ('Maria Santos', 'maria.santos@example.com', '09171234567', '2026-09-01 09:00:00'),
    ('Juan Dela Cruz', 'juan.delacruz@example.com', '09181234567', '2026-09-02 10:15:00'),
    ('Angela Reyes', 'angela.reyes@example.com', '09191234567', '2026-09-03 11:30:00'),
    ('Carlo Garcia', 'carlo.garcia@example.com', '09201234567', '2026-09-04 13:45:00'),
    ('Liza Bautista', 'liza.bautista@example.com', '09211234567', '2026-09-05 15:00:00');

INSERT INTO users (username, full_name, created_at) VALUES
    ('admin01', 'Ramon Admin', '2026-09-01 08:00:00'),
    ('cashier01', 'Nina Cruz', '2026-09-02 08:30:00'),
    ('cashier02', 'Paolo Lim', '2026-09-03 09:00:00'),
    ('manager01', 'Grace Tan', '2026-09-04 09:30:00'),
    ('cashier03', 'Owen Ramos', '2026-09-05 10:00:00');
