<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "elite_journey";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) die("Connection failed: " . $conn->connect_error);

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["add_customer"])) {
  $name = $_POST["name"];
  $email = $_POST["email"];
  $phone = $_POST["phone"];
  $stmt = $conn->prepare("INSERT INTO customer (name, email, phone) VALUES (?, ?, ?)");
  $stmt->bind_param("sss", $name, $email, $phone);
  $stmt->execute();
  $stmt->close();
  header("Location: manage_customers.php");
  exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["delete_customer_id"])) {
  $delete_id = intval($_POST["delete_customer_id"]);
  $stmt = $conn->prepare("DELETE FROM customer WHERE id = ?");
  $stmt->bind_param("i", $delete_id);
  $stmt->execute();
  $stmt->close();
  header("Location: manage_customers.php");
  exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["add_booking"])) {
  $customer_id = $_POST["customer_id"];
  $car = $_POST["car"];
  $from = $_POST["from_date"];
  $to = $_POST["to_date"];
  $status = $_POST["status"];
  $stmt = $conn->prepare("INSERT INTO booking (customer_id, car, from_date, to_date, status) VALUES (?, ?, ?, ?, ?)");
  $stmt->bind_param("issss", $customer_id, $car, $from, $to, $status);
  $stmt->execute();
  $stmt->close();
  header("Location: manage_customers.php");
  exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["delete_booking_id"])) {
  $delete_id = intval($_POST["delete_booking_id"]);
  $stmt = $conn->prepare("DELETE FROM booking WHERE id = ?");
  $stmt->bind_param("i", $delete_id);
  $stmt->execute();
  $stmt->close();
  header("Location: manage_customers.php");
  exit();
}

$customers = $conn->query("SELECT * FROM customer");
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Manage Customers</title>
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <style>
    /* Use your existing style */
    /* Add basic spacing */
    form { margin: 20px 0; }
    input, select { margin: 5px; padding: 6px; }
    .btn-delete { color: white; background-color: red; border: none; padding: 5px 10px; cursor: pointer; }
    .btn-add { background-color: green; color: white; padding: 5px 10px; border: none; }
  </style>
</head>
<body>

<h2>Customer List</h2>

<form method="POST">
  <h3>Add New Customer</h3>
  <input type="text" name="name" required placeholder="Name" />
  <input type="email" name="email" required placeholder="Email" />
  <input type="text" name="phone" required placeholder="Phone" />
  <button class="btn-add" name="add_customer">Add Customer</button>
</form>

<table border="1">
  <thead>
    <tr>
      <th>ID</th><th>Name</th><th>Email</th><th>Phone</th><th>Actions</th>
    </tr>
  </thead>
  <tbody>
    <?php while($row = $customers->fetch_assoc()): ?>
      <tr>
        <td><?= $row['id'] ?></td>
        <td><?= htmlspecialchars($row['name']) ?></td>
        <td><?= htmlspecialchars($row['email']) ?></td>
        <td><?= htmlspecialchars($row['phone']) ?></td>
        <td>
          <button onclick="showHistory(<?= $row['id'] ?>, '<?= htmlspecialchars($row['name']) ?>')">View History</button>
          <form method="POST" style="display:inline;" onsubmit="return confirm('Delete this customer?')">
            <input type="hidden" name="delete_customer_id" value="<?= $row['id'] ?>" />
            <button class="btn-delete" type="submit">Delete</button>
          </form>
        </td>
      </tr>
    <?php endwhile; ?>
  </tbody>
</table>

<!-- History Modal -->
<div id="historyModal" class="modal" style="display:none; position:fixed; top:0; left:0; width:100%; height:100%; background:#000000a0; align-items:center; justify-content:center;">
  <div class="modal-content" style="background:white; padding:20px; width:80%; max-height:90%; overflow:auto;">
    <span onclick="document.getElementById('historyModal').style.display='none'" style="float:right; cursor:pointer;">&times;</span>
    <h3>Booking History for <span id="customerName"></span></h3>

    <form method="POST">
      <h4>Add Booking</h4>
      <input type="hidden" name="customer_id" id="modalCustomerId" />
      <input type="text" name="car" placeholder="Car Name" required />
      <input type="date" name="from_date" required />
      <input type="date" name="to_date" required />
      <select name="status" required>
        <option>Pending</option><option>Approved</option><option>Cancelled</option>
      </select>
      <button class="btn-add" name="add_booking">Add Booking</button>
    </form>

    <table border="1" id="historyTable">
      <thead>
        <tr>
          <th>ID</th><th>Car</th><th>From</th><th>To</th><th>Status</th><th>Actions</th>
        </tr>
      </thead>
      <tbody></tbody>
    </table>
  </div>
</div>

<script>
function showHistory(customerId, name) {
  document.getElementById("customerName").textContent = name;
  document.getElementById("modalCustomerId").value = customerId;
  fetch('get_history.php?customer_id=' + customerId)
    .then(res => res.json())
    .then(data => {
      const tbody = document.querySelector("#historyTable tbody");
      tbody.innerHTML = '';
      if (data.length === 0) {
        tbody.innerHTML = '<tr><td colspan="6">No bookings.</td></tr>';
      } else {
        data.forEach(row => {
          tbody.innerHTML += `<tr>
            <td>${row.id}</td>
            <td>${row.car}</td>
            <td>${row.from_date}</td>
            <td>${row.to_date}</td>
            <td>${row.status}</td>
            <td>
              <form method="POST" onsubmit="return confirm('Delete this booking?')">
                <input type="hidden" name="delete_booking_id" value="${row.id}" />
                <button class="btn-delete" type="submit">Delete</button>
              </form>
            </td>
          </tr>`;
        });
      }
      document.getElementById("historyModal").style.display = "flex";
    });
}
</script>

</body>
</html>

<?php $conn->close(); ?>
