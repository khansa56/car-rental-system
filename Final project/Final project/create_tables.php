<?php
require_once 'db.php';

try {
    // Create cars table
    $pdo->exec("CREATE TABLE IF NOT EXISTS cars (
        id INT AUTO_INCREMENT PRIMARY KEY,
        name VARCHAR(100) NOT NULL,
        model VARCHAR(100) NOT NULL,
        available ENUM('Available', 'Unavailable') NOT NULL DEFAULT 'Available'
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;");

    // Create bookings table
    $pdo->exec("CREATE TABLE IF NOT EXISTS bookings (
        id INT AUTO_INCREMENT PRIMARY KEY,
        customer_name VARCHAR(100) NOT NULL,
        email VARCHAR(100) NOT NULL,
        phone VARCHAR(20) NOT NULL,
        car_id INT NOT NULL,
        booking_date DATE NOT NULL,
        days INT NOT NULL,
        status ENUM('Pending', 'Confirmed', 'Cancelled') NOT NULL DEFAULT 'Pending',
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
        FOREIGN KEY (car_id) REFERENCES cars(id) ON DELETE RESTRICT
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;");

    // Insert some sample cars if the table is empty
    $stmt = $pdo->query("SELECT COUNT(*) FROM cars");
    if ($stmt->fetchColumn() == 0) {
        $sampleCars = [
            ['Toyota Corolla', '2020'],
            ['Honda Civic', '2021'],
            ['Toyota Fortuner', '2022'],
            ['Suzuki Cultus', '2021'],
            ['Kia Sportage', '2024']
        ];

        $stmt = $pdo->prepare("INSERT INTO cars (name, model) VALUES (?, ?)");
        
        foreach ($sampleCars as $car) {
            $stmt->execute($car);
        }
    }

    echo "Database tables created successfully!";
} catch (PDOException $e) {
    die("Error creating tables: " . $e->getMessage());
}
?> 