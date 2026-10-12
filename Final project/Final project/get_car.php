<?php
require_once 'db.php';

header('Content-Type: application/json');

try {
    $result = $conn->query("SELECT * FROM cars ORDER BY id DESC");
    
    if (!$result) {
        throw new Exception("Error fetching cars: " . $conn->error);
    }
    
    $cars = [];
    while ($row = $result->fetch_assoc()) {
        $cars[] = $row;
    }
    
    echo json_encode($cars);
    
} catch (Exception $e) {
    http_response_code(500);
    echo json_encode(['error' => $e->getMessage()]);
} finally {
    $conn->close();
}
?>
