<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Payment - Car Rental</title>
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: Arial, sans-serif;
    }

    body {
      
      height: 110vh;
      position: relative;
    }

    header {
  position: relative;  
  text-align: center;  
  padding-top: 1px;   
  padding-bottom: 20px;
  background: black;
  color: white;
}

header h1 {
  margin-top: 30px; 
  margin-bottom: 0;
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
      background-color: #e65500; /* hover pe thoda dark orange */
    }


    footer {
      position: absolute;
      bottom: 0;
      width: 100%;
      background: black;
      color: white;
      text-align: center;
      padding: 10px;
      font-size: 14px;
    }

    main {
      flex: 1;
      display: flex;
      justify-content: center;
      align-items: center;
      padding: 40px 20px;
    }

    .payment-form {
      background-color: white;
      padding: 30px;
      border-radius: 10px;
      box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
      width: 300%;
      max-width: 600px;
    }

    .payment-form h2 {
      text-align: center;
      margin-bottom: 20px;
      color: #333;
    }

    .form-group {
      margin-bottom: 15px;
    }

    .form-group label {
      display: block;
      margin-bottom: 6px;
      font-weight: bold;
      color: #444;
    }

    .form-group input {
      width: 100%;
      padding: 10px;
      border: 1px solid #ccc;
      border-radius: 5px;
      outline: none;
    }

    .form-group input[type="submit"] {
      background-color: #ff6600;
      color: white;
      border: none;
      font-size: 16px;
      cursor: pointer;
      transition: background 0.3s;
    }

    .form-group input[type="submit"]:hover {
      background-color: #218838;
    }

    @media (max-width: 600px) {
      .payment-form {
        padding: 20px;
      }
    }
  </style>
</head>
<body>

  <header>
    <h1> Elite Journey Rides</h1>
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
    <form class="payment-form" action="submit_payment.php" method="POST">
      <h2>Payment Details</h2>
  
      <div class="form-group">
        <label for="cardName">Name on Card</label>
        <input type="text" id="cardName" name="cardName" required>
      </div>
  
      <div class="form-group">
        <label for="cardNumber">Card Number</label>
        <input type="text" id="cardNumber" name="cardNumber" required maxlength="19">
      </div>
  
      <div class="form-group">
        <label for="expiry">Expiry Date</label>
        <input type="text" id="expiry" name="expiry" required maxlength="5">
      </div>
  
      <div class="form-group">
        <label for="cvv">CVV Code</label>
        <input type="password" id="cvv" name="cvv" required maxlength="4">
      </div>
  
      <div class="form-group">
        <label for="amount">Amount (PKR)</label>
        <input type="number" id="amount" name="amount" required>
      </div>
  
      <div class="form-group">
        <input type="submit" value="Pay Now">
      </div>
    </form>
  </main>
  

  <footer>
    &copy; 2025 Elite Journey Rides. All rights reserved.
  </footer>

</body>
</html>