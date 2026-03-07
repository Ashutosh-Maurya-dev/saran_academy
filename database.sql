CREATE DATABASE IF NOT EXISTS saran_academy;
USE saran_academy;

CREATE TABLE IF NOT EXISTS admission_queries (
    id INT AUTO_INCREMENT PRIMARY KEY,
    student_name VARCHAR(120) NOT NULL,
    parent_name VARCHAR(120) NOT NULL,
    phone VARCHAR(20) NOT NULL,
    email VARCHAR(150) NULL,
    class_applied VARCHAR(50) NOT NULL,
    message TEXT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
