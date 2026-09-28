-- Initial database plan for the POS application.
-- This file is a planning/sample script only. It is not connected to the app yet.

CREATE DATABASE IF NOT EXISTS pos_database;
USE pos_database;

-- Customer Accounts
CREATE TABLE pos_customer_accounts (
    customer_account_id INT AUTO_INCREMENT PRIMARY KEY,
    customer_code VARCHAR(20) NOT NULL UNIQUE,
    first_name VARCHAR(50) NOT NULL,
    last_name VARCHAR(50) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    phone VARCHAR(20) NOT NULL,
    address VARCHAR(255) NOT NULL,
    status VARCHAR(20) NOT NULL DEFAULT 'active',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO pos_customer_accounts
    (customer_code, first_name, last_name, email, phone, address, status)
VALUES
    ('CUST-0001', 'Maria', 'Santos', 'maria.santos@example.com', '09171234567', 'Quezon City', 'active'),
    ('CUST-0002', 'Juan', 'Dela Cruz', 'juan.delacruz@example.com', '09181234567', 'Manila', 'active'),
    ('CUST-0003', 'Angela', 'Reyes', 'angela.reyes@example.com', '09191234567', 'Pasig City', 'active'),
    ('CUST-0004', 'Carlo', 'Garcia', 'carlo.garcia@example.com', '09201234567', 'Makati City', 'active'),
    ('CUST-0005', 'Liza', 'Bautista', 'liza.bautista@example.com', '09211234567', 'Caloocan City', 'inactive');

-- User Accounts
-- Store password hashes in password_hash, never plain-text passwords.
CREATE TABLE pos_user_accounts (
    user_account_id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    email VARCHAR(100) NOT NULL UNIQUE,
    password_hash VARCHAR(255) NOT NULL,
    first_name VARCHAR(50) NOT NULL,
    last_name VARCHAR(50) NOT NULL,
    role VARCHAR(30) NOT NULL DEFAULT 'cashier',
    status VARCHAR(20) NOT NULL DEFAULT 'active',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO pos_user_accounts
    (username, email, password_hash, first_name, last_name, role, status)
VALUES
    ('admin01', 'admin01@example.com', 'replace_with_password_hash_01', 'Ramon', 'Admin', 'admin', 'active'),
    ('cashier01', 'cashier01@example.com', 'replace_with_password_hash_02', 'Nina', 'Cruz', 'cashier', 'active'),
    ('cashier02', 'cashier02@example.com', 'replace_with_password_hash_03', 'Paolo', 'Lim', 'cashier', 'active'),
    ('manager01', 'manager01@example.com', 'replace_with_password_hash_04', 'Grace', 'Tan', 'manager', 'active'),
    ('cashier03', 'cashier03@example.com', 'replace_with_password_hash_05', 'Owen', 'Ramos', 'cashier', 'inactive');
