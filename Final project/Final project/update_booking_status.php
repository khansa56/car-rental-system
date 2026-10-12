<?php
$conn = new mysqli("localhost", "root", "", "elite_journey");

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$id = intval($_POST['id']);
$status = $conn->real_escape_string($_POST['status']);

$sql = "UPDATE booking SET status='$status' WHERE id=$id";

if ($conn->query($sql) === TRUE) {
  echo "Status updated successfully";
} else {
  echo "Error updating status: " . $conn->error;
}

$conn->close();
?>
