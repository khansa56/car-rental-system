<?php
// Enable errors
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "elite_journey";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if POST request
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $cardName = $conn->real_escape_string($_POST['cardName']);
    $cardNumber = $conn->real_escape_string($_POST['cardNumber']);
    $expiry = $conn->real_escape_string($_POST['expiry']);
    $cvv = $conn->real_escape_string($_POST['cvv']);
    $amount = $conn->real_escape_string($_POST['amount']);

    $sql = "INSERT INTO payment_details (card_name, card_number, expiry, cvv, amount) 
            VALUES ('$cardName', '$cardNumber', '$expiry', '$cvv', '$amount')";

    if ($conn->query($sql) === TRUE) {
        echo "<h2 style='color:green;'>Thank you! Payment of PKR $amount has been received.</h2>";
        echo "<a href='Payment.html'>Back to Payment Page</a>";
    } else {
        echo "Error: " . $conn->error;
    }

    $conn->close();
} else {
    echo "Invalid submission.";
}
?>
