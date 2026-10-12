<?php
require_once 'db.php';

try {
    $stmt = $pdo->query("SELECT name, model FROM cars WHERE available = 'Available' ORDER BY name");
    $availableCars = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (Exception $e) {
    $availableCars = [];
    error_log("Error fetching available cars: " . $e->getMessage());
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Car Booking - Car Rental</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />

  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: Arial, sans-serif;
    }

    body {
      
      color: white;
      min-height: 100vh;
      position: relative;
    }

    header {
      text-align: center;
      padding-top: 1px;
      padding-bottom: 20px;
      background: black;
    }

    header h1 {
      margin-top: 30px;
      font-size: 48px;
    }

    header nav {
      margin-top: 30px;
      display: flex;
      justify-content: center;
      gap: 20px;
    }

    header nav a {
      color: white;
      text-decoration: none;
      padding: 8px 16px;
      background-color: #ff6600;
      border-radius: 5px;
      font-weight: bold;
      transition: background-color 0.3s ease;
    }

    header nav a:hover {
      background-color: #e65500;
    }

    .booking-form {
      max-width: 600px;
      margin: 40px auto;
      padding-top: 10px;
      background-color: rgba(255, 255, 255, 0.92);
      padding: 25px;
      border-radius: 10px;
      color: #000;
      box-shadow: 0 0 15px rgba(0,0,0,0.4);
    }

    .booking-form h2 {
      text-align: center;
      margin-bottom: 15px;
      font-size: 26px;
    }

    .booking-form label {
      display: block;
      margin-bottom: 6px;
      font-weight: bold;
    }

    .booking-form input,
    .booking-form select {
      width: 100%;
      padding: 10px;
      margin-bottom: 14px;
      border: 1px solid #ccc;
      border-radius: 6px;
      font-size: 15px;
    }

    .booking-form button {
      width: 100%;
      background-color: #ff6600;
      color: white;
      padding: 12px;
      font-size: 17px;
      border: none;
      border-radius: 6px;
      cursor: pointer;
    }

    .booking-form button:hover {
      background-color: #e65500;
    }

    footer {
      background: black;
      color: white;
      text-align: center;
      padding: 12px;
      font-size: 14px;
      border-top: 1px solid #444;
      margin-top: 30px;
    }
  </style>
</head>
<body>

  <header>
    <h1>Elite Journey Rides</h1>
    <nav>
      <a href="Homepage.html">Home Page</a>
      <a href="car listing.html">Listing</a>
      <a href="car details.html">Detail</a>
      <a href="Booking.html">Booking</a>
      <a href="Payment.html">Payment</a>
      <a href="Dashboard.html">Admin</a>
    </nav>
  </header>

  <!-- Booking Form Over Background -->
  <div class="booking-form">
    <h2>Book Your Car</h2>
    <form action="#" method="post">
      <label for="fullname">Full Name</label>
      <input type="text" id="fullname" name="fullname" required>

      <label for="email">Email</label>
      <input type="email" id="email" name="email" required>

      <label for="phone number">Phone Number</label>
      <input type="number" id="number" name="Phone Number" required>

      <label for="car">Select a Car</label>
      <select id="car" name="car" required>
        <option value="">-- Select a Car --</option>
        <?php foreach ($availableCars as $car): ?>
        <option value="<?php echo htmlspecialchars($car['name']); ?>">
          <?php echo htmlspecialchars($car['name'] . ' (' . $car['model'] . ')'); ?>
        </option>
        <?php endforeach; ?>
      </select>

      <label for="date">Booking Date</label>
      <input type="date" id="date" name="date" required min="<?php echo date('Y-m-d'); ?>">

      <label for="days">Number of Days</label>
      <input type="number" id="days" name="days" min="1" required>

      <button type="submit">Confirm Booking</button>
    </form>
  </div>

  <script>
    // Pre-select car if provided in URL
    document.addEventListener('DOMContentLoaded', function() {
      const urlParams = new URLSearchParams(window.location.search);
      const selectedCar = urlParams.get('car');
      if (selectedCar) {
        const carSelect = document.getElementById('car');
        for (let option of carSelect.options) {
          if (option.value === selectedCar) {
            carSelect.value = selectedCar;
            break;
          }
        }
      }
    });
  </script>

  <footer>
    &copy; 2025 Elite Journey Rides Service. All rights reserved.
  </footer>

</body>
</html>