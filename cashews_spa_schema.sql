-- cashews_spa_schema.sql
-- MySQL 8+ recommended. Create database and tables.
CREATE DATABASE IF NOT EXISTS cashews_spa CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE cashews_spa;

-- Users (only admin for now)
CREATE TABLE IF NOT EXISTS users (
  id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(100) NOT NULL,
  email VARCHAR(120) NOT NULL UNIQUE,
  password_hash VARCHAR(255) NOT NULL,
  role ENUM('admin','customer') NOT NULL DEFAULT 'customer',
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB;

-- Products
CREATE TABLE IF NOT EXISTS products (
  id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(150) NOT NULL,
  description TEXT,
  price DECIMAL(10,2) NOT NULL,
  image_url VARCHAR(255),
  is_active TINYINT(1) DEFAULT 1,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  updated_at TIMESTAMP NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB;

-- Orders
CREATE TABLE IF NOT EXISTS orders (
  id INT AUTO_INCREMENT PRIMARY KEY,
  customer_name VARCHAR(120) NOT NULL,
  phone VARCHAR(20) NOT NULL,
  email VARCHAR(120),
  address TEXT NOT NULL,
  total DECIMAL(10,2) NOT NULL,
  status ENUM('pending','confirmed','shipped','delivered','cancelled') DEFAULT 'pending',
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB;

-- Order Items
CREATE TABLE IF NOT EXISTS order_items (
  id INT AUTO_INCREMENT PRIMARY KEY,
  order_id INT NOT NULL,
  product_id INT NOT NULL,
  quantity INT NOT NULL,
  price DECIMAL(10,2) NOT NULL, -- price at time of order
  FOREIGN KEY (order_id) REFERENCES orders(id) ON DELETE CASCADE,
  FOREIGN KEY (product_id) REFERENCES products(id)
) ENGINE=InnoDB;

-- Seed: admin user (email: admin@akcashews.com / password: Admin@123)
-- Change the hash after first login.
INSERT INTO users (name, email, password_hash, role) VALUES
('Admin', 'admin@akcashews.com', '$2y$10$4Qp0x6/g5xqM9zjQBywHcOQ5s1mP6xFJr9wXr4o0dM3GdQZ3f8Yd2', 'admin')
ON DUPLICATE KEY UPDATE email=email;

-- Seed: sample products
INSERT INTO products (name, description, price, image_url) VALUES
('W320 Cashews - 500g', 'Crisp and premium W320 grade cashews. Perfect for snacking.', 499.00, 'assets/img/w320_500.jpg'),
('W240 Cashews - 1Kg', 'Large and buttery W240 cashews for gifting and festivities.', 1099.00, 'assets/img/w240_1kg.jpg'),
('Roasted & Salted - 250g', 'Lightly roasted, perfectly salted cashews.', 299.00, 'assets/img/roasted_250.jpg');
