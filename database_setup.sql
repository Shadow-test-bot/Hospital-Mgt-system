-- Hospital Management System Database Setup
-- Create database with proper charset and collation

CREATE DATABASE IF NOT EXISTS `test`
CHARACTER SET utf8mb4
COLLATE utf8mb4_unicode_ci;

-- Use the database
USE `test`;

-- Grant privileges to root user (if needed)
GRANT ALL PRIVILEGES ON `test`.* TO 'root'@'localhost';
FLUSH PRIVILEGES;