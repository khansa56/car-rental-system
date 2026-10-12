<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "elite_journey";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$customer_id = isset($_GET['customer_id']) ? intval($_GET['customer_id']) : 0;
$data = [];

if ($customer_id > 0) {
  $sql = "SELECT id, car, from_date, to_date, status FROM booking WHERE customer_id = ?";
  $stmt = $conn->prepare($sql);
  $stmt->bind_param("i", $customer_id);
  $stmt->execute();
  $result = $stmt->get_result();

  while ($row = $result->fetch_assoc()) {
    $data[] = $row;
  }
  $stmt->close();
}

$conn->close();
header('Content-Type: application/json');
echo json_encode($data);
?>
