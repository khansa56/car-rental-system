<?php
require 'db.php';

$sql = "INSERT INTO car (name, model, available) VALUES ('Test Car', '2020', 'yes')";
if (mysqli_query($conn, $sql)) {
    echo "Insert successful!";
} else {
    echo "Error: " . mysqli_error($conn);
}
?>
