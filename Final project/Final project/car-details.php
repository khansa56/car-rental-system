<?php
require_once 'db.php';

try {
    $stmt = $pdo->query("SELECT * FROM cars WHERE available = 'Available' ORDER BY name");
    $cars = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (Exception $e) {
    $cars = [];
    error_log("Error fetching cars: " . $e->getMessage());
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Car Details - Car Rental</title>
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: Arial, sans-serif;
    }

    body {
     
      height: 100vh;
    }

    header {
      position: relative;
      text-align: center;
      padding-top: 30px;
      padding-bottom: 20px;
      background: black;
      color: white;
    }

    header h1 {
      font-size: 30px;
      margin-bottom: 0px;
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

    .car-grid {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
      gap: 20px;
      padding: 40px;
    }

    .car-card {
      background-color: white;
      border-radius: 10px;
      border: 2px solid black;
      padding: 20px;
      box-shadow: 0 4px 8px rgba(0,0,0,0.1);
      display: flex;
      flex-direction: column;
      align-items: center;
    }

    .car-card img {
      width: 100%;
      height: 200px;
      object-fit: cover;
      border-radius: 8px;
      border: 1px solid black;
      margin-bottom: 10px;
    }

    .car-name {
      font-size: 22px;
      font-weight: bold;
      margin-bottom: 5px;
      color: #222;
      text-align: center;
    }

    .car-model,
    .car-detail,
    .car-description {
      text-align: center;
      font-size: 14px;
      color: #444;
      margin-bottom: 6px;
    }

    .car-description {
      font-size: 13px;
      color: #555;
      line-height: 1.4;
    }

    .book-btn {
      margin-top: 15px;
      padding: 10px 20px;
      background-color: #ff6600;
      color: white;
      border: none;
      border-radius: 5px;
      cursor: pointer;
      font-size: 16px;
      transition: background 0.3s;
    }

    .book-btn:hover {
      background-color: #e65c00;
    }

    footer {
      background:black;
      color: white;
      text-align: center;
      padding: 10px;
      
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

  <main>
    <div class="car-grid">
      <?php foreach ($cars as $car): ?>
      <div class="car-card">
        <img src="images/cars/default-car.jpg" alt="<?php echo htmlspecialchars($car['name']); ?>">
        <div class="car-name"><?php echo htmlspecialchars($car['name']); ?></div>
        <div class="car-model">Model: <?php echo htmlspecialchars($car['model']); ?></div>
        <div class="car-detail">Status: <?php echo htmlspecialchars($car['available']); ?></div>
        <button class="book-btn" onclick="goToBooking('<?php echo htmlspecialchars($car['name']); ?>')">Book Now</button>
      </div>
      <?php endforeach; ?>
    </div>
  </main>

  <footer>
    &copy; 2025 Elite Journey Rides Service. All rights reserved.
  </footer>

  <script>
    function goToBooking(carName) {
      window.location.href = 'booking.php?car=' + encodeURIComponent(carName);
    }
  </script>

</body>
</html>