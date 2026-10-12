<?php
header('Content-Type: application/json');
$conn = new mysqli("localhost", "root", "", "elite_journey");

if ($conn->connect_error) {
  die(json_encode(["error" => "Database connection failed."]));
}

$result = $conn->query("SELECT * FROM booking ORDER BY id DESC");
$bookings = [];

while ($row = $result->fetch_assoc()) {
  $bookings[] = $row;
}

echo json_encode($bookings);
$conn->close();
?>
