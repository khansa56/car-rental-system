<?php
require 'db.php';

$sql = "SELECT * FROM payment";
$result = mysqli_query($conn, $sql);
$payments = [];

while ($row = mysqli_fetch_assoc($result)) {
    $payments[] = $row;
}

header('Content-Type: application/json');
echo json_encode($payments);
?>
