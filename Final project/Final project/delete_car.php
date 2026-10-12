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
    
    if (empty($id) || !is_numeric($id)) {
        throw new Exception("Valid car ID is required");
    }

    $stmt = $conn->prepare("DELETE FROM cars WHERE id = ?");
    if (!$stmt) {
        throw new Exception("Prepare failed: " . $conn->error);
    }

    $stmt->bind_param("i", $id);
    
    if (!$stmt->execute()) {
        throw new Exception("Error deleting car: " . $stmt->error);
    }

    if ($stmt->affected_rows === 0) {
        throw new Exception("No car found with ID: " . $id);
    }

    echo json_encode([
        'success' => true,
        'message' => 'Car deleted successfully'
    ]);

} catch (Exception $e) {
    http_response_code(500);
    echo json_encode(['error' => $e->getMessage()]);
} finally {
    if (isset($stmt)) $stmt->close();
    $conn->close();
}
?>
