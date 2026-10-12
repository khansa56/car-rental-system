<?php
require_once 'db.php';

header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(['error' => 'Method not allowed']);
    exit;
}

try {
    $id = $_POST['id'] ?? '';
    $name = $_POST['name'] ?? '';
    $model = $_POST['model'] ?? '';
    $available = $_POST['available'] ?? 'Available';

    if (empty($id) || !is_numeric($id)) {
        throw new Exception("Valid car ID is required");
    }

    if (empty($name) || empty($model)) {
        throw new Exception("Name and model are required");
    }

    $stmt = $conn->prepare("UPDATE cars SET name = ?, model = ?, available = ? WHERE id = ?");
    if (!$stmt) {
        throw new Exception("Prepare failed: " . $conn->error);
    }

    $stmt->bind_param("sssi", $name, $model, $available, $id);
    
    if (!$stmt->execute()) {
        throw new Exception("Error updating car: " . $stmt->error);
    }

    if ($stmt->affected_rows === 0) {
        throw new Exception("No car found with ID: " . $id);
    }

    echo json_encode([
        'success' => true,
        'message' => 'Car updated successfully'
    ]);

} catch (Exception $e) {
    http_response_code(500);
    echo json_encode(['error' => $e->getMessage()]);
} finally {
    if (isset($stmt)) $stmt->close();
    $conn->close();
}
?>
