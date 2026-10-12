<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "elite_journey";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM contact_messages ORDER BY submitted_at DESC";
$result = $conn->query($sql);

echo "<h2 style='text-align:center;'>Submitted Contact Messages</h2>";
echo "<table border='1' cellspacing='0' cellpadding='10' style='margin:auto;'>";
echo "<tr><th>ID</th><th>Name</th><th>Email</th><th>Message</th><th>Submitted At</th></tr>";

if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
    echo "<tr>
            <td>" . $row["id"] . "</td>
            <td>" . htmlspecialchars($row["name"]) . "</td>
            <td>" . htmlspecialchars($row["email"]) . "</td>
            <td>" . nl2br(htmlspecialchars($row["message"])) . "</td>
            <td>" . $row["submitted_at"] . "</td>
          </tr>";
  }
} else {
  echo "<tr><td colspan='5'>No messages found.</td></tr>";
}

echo "</table>";

$conn->close();
?>
