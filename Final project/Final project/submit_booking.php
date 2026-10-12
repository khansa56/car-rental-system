<?php
require_once 'db.php';

header('Content-Type: application/json');

try {
    if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
        throw new Exception('Invalid request method');
    }

    // Get and validate input
    $fullname = $_POST['fullname'] ?? '';
    $email = $_POST['email'] ?? '';
    $phone_number = $_POST['phone_number'] ?? '';
    $car_name = $_POST['car'] ?? '';
    $booking_date = $_POST['date'] ?? '';
    $days = (int)($_POST['days'] ?? 0);

    if (empty($fullname) || empty($email) || empty($phone_number) || empty($car_name) || empty($booking_date) || $days < 1) {
        throw new Exception('All fields are required and days must be at least 1');
    }

    // Start transaction
    $pdo->beginTransaction();

    // Check if car is available
    $stmt = $pdo->prepare("SELECT id FROM cars WHERE name = ? AND available = 'Available'");
    $stmt->execute([$car_name]);
    $car = $stmt->fetch();

    if (!$car) {
        throw new Exception('Selected car is not available');
    }

    // Insert booking
    $stmt = $pdo->prepare("INSERT INTO bookings (customer_name, email, phone, car_id, booking_date, days, status) 
                          VALUES (?, ?, ?, ?, ?, ?, 'Pending')");
    $stmt->execute([$fullname, $email, $phone_number, $car['id'], $booking_date, $days]);

    // Update car availability
    $stmt = $pdo->prepare("UPDATE cars SET available = 'Unavailable' WHERE id = ?");
    $stmt->execute([$car['id']]);

    // Commit transaction
    $pdo->commit();

    echo json_encode([
        'success' => true,
        'message' => 'Booking confirmed successfully!',
        'booking_id' => $pdo->lastInsertId()
    ]);

} catch (Exception $e) {
    // Rollback transaction on error
    if ($pdo->inTransaction()) {
        $pdo->rollBack();
    }

    http_response_code(400);
    echo json_encode([
        'success' => false,
        'message' => $e->getMessage()
    ]);
}
?>
