<?php
$host = 'localhost';
$user = 'root';
$password = '';

try {
    // Create connection without database
    $conn = new mysqli($host, $user, $password);
    
    // Create database if not exists
    $sql = "CREATE DATABASE IF NOT EXISTS elite_journey";
    if ($conn->query($sql) === TRUE) {
        echo "Database created successfully or already exists<br>";
    } else {
        throw new Exception("Error creating database: " . $conn->error);
    }
    
    // Select the database
    $conn->select_db("elite_journey");
    
    // Create cars table
    $sql = "CREATE TABLE IF NOT EXISTS cars (
        id INT AUTO_INCREMENT PRIMARY KEY,
        name VARCHAR(100) NOT NULL,
        model VARCHAR(100) NOT NULL,
        available ENUM('Available', 'Unavailable') DEFAULT 'Available',
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    )";
    
    if ($conn->query($sql) === TRUE) {
        echo "Table 'cars' created successfully or already exists<br>";
    } else {
        throw new Exception("Error creating table: " . $conn->error);
    }
    
    echo "Database setup completed successfully!";
    
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
} finally {
    $conn->close();
}
?> 