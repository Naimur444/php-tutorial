CREATE DATABASE donations;
USE donations;

CREATE TABLE donations (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    amount DECIMAL(10,2) NOT NULL,
    payment_method ENUM('bKash', 'Nagad', 'Card', 'Bank') NOT NULL,
    transaction_id VARCHAR(100) NOT NULL,
    donation_date DATE NOT NULL,
    donation_time TIME NOT NULL,
    phone VARCHAR(20),
    address TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

ALTER TABLE donations ADD COLUMN anonymous ENUM('YES', 'NO') DEFAULT 'NO';