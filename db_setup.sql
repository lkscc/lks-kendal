-- Skrip inisialisasi Database LKS
CREATE DATABASE lks_db;
USE lks_db;

CREATE TABLE visitors (
    id INT AUTO_INCREMENT PRIMARY KEY,
    visit_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    ip_address VARCHAR(45)
);

-- Insert data awal untuk testing
INSERT INTO visitors (ip_address) VALUES ('127.0.0.1');
