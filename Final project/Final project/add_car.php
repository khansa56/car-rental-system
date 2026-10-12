<?php
require_once 'db.php';

header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(['error' => 'Method not allowed']);
    exit;
}

try {
    $name = $_POST['name'] ?? '';
    $model = $_POST['model'] ?? '';
    $available = $_POST['available'] ?? 'Available';

    if (empty($name) || empty($model)) {
        throw new Exception("Name and model are required");
    }

    $stmt = $conn->prepare("INSERT INTO cars (name, model, available) VALUES (?, ?, ?)");
    if (!$stmt) {
        throw new Exception("Prepare failed: " . $conn->error);
    }

    $stmt->bind_param("sss", $name, $model, $available);
    
    if (!$stmt->execute()) {
        throw new Exception("Error adding car: " . $stmt->error);
    }

    echo json_encode([
        'success' => true,
        'message' => 'Car added successfully',
        'id' => $conn->insert_id
    ]);

} catch (Exception $e) {
    http_response_code(500);
    echo json_encode(['error' => $e->getMessage()]);
} finally {
    if (isset($stmt)) $stmt->close();
    $conn->close();
}
?>
