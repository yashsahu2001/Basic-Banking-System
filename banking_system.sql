CREATE DATABASE banking_system;

USE banking_system;

CREATE TABLE IF NOT EXISTS Customers (
    customer_id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50),
    email VARCHAR(100),
    current_balance DECIMAL(10, 2),
    previous_balance DECIMAL(10, 2)
);

INSERT INTO Customers (name, email, current_balance, previous_balance)
VALUES
    ('John Doe', 'john@example.com', 1000.00, 1000.00),
    ('Jane Smith', 'jane@example.com', 1500.00, 1500.00),
    ('Alice Johnson', 'alice@example.com', 2000.00, 2000.00),
    ('Bob Brown', 'bob@example.com', 1200.00, 1200.00),
    ('Emma Davis', 'emma@example.com', 1800.00, 1800.00),
    ('Michael Wilson', 'michael@example.com', 900.00, 900.00),
    ('Sophia Martinez', 'sophia@example.com', 2500.00, 2500.00),
    ('William Anderson', 'william@example.com', 1700.00, 1700.00),
    ('Olivia Taylor', 'olivia@example.com', 1300.00, 1300.00),
    ('James Lee', 'james@example.com', 1600.00, 1600.00);

CREATE TABLE Transfers (
    transfer_id INT AUTO_INCREMENT PRIMARY KEY,
    sender_id INT,
    receiver_id INT,
    amount DECIMAL(10, 2),
    transfer_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (sender_id) REFERENCES Customers(customer_id),
    FOREIGN KEY (receiver_id) REFERENCES Customers(customer_id)
);
