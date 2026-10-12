<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Contact Us - Elite Journey Rides</title>
  <style>
    body {
      margin: 0;
      padding: 0;
      font-family: Arial, sans-serif;
      background: linear-gradient(rgba(0,0,0,0.6), rgba(0,0,0,0.6)), 
                  url("C:/Users/HP/OneDrive/Pictures/Saved Pictures/project images/pexels-photo-627678.jpeg") no-repeat center center/cover;
      color: white;
      min-height: 100vh;
    }

    header {
      background-color: black;
      padding: 20px 0;
      text-align: center;
    }

    header h1 {
      margin: 0;
      font-size: 36px;
    }

    nav a {
      color: #ff6600;
      text-decoration: none;
      margin: 0 15px;
      font-weight: bold;
    }

    .container {
      max-width: 700px;
      margin: 40px auto;
      background-color: rgba(255, 255, 255, 0.1);
      padding: 30px;
      border-radius: 10px;
      box-shadow: 0 0 10px rgba(0,0,0,0.5);
      padding-left: 10px;
    }

    .container h2 {
      text-align: center;
      margin-bottom: 20px;
      color: black;
      padding-left: 20px;
    }

    .form-group {
      margin-bottom: 15px;
    }

    .form-group label {
      display: block;
      margin-bottom: 6px;
      font-weight: bold;
    }

    .form-group input,
    .form-group textarea {
      width: 100%;
      padding: 10px;
      border: none;
      border-radius: 6px;
      font-size: 14px;
    }

    .form-group textarea {
      resize: vertical;
      min-height: 100px;
    }

    button {
      background-color: #ff6600;
      border: none;
      padding: 12px 20px;
      font-size: 16px;
      border-radius: 6px;
      color: white;
      cursor: pointer;
      width: 102.5%;
    }

    button:hover {
      background-color: #e65c00;
    }

    footer {
      background-color: black;
      text-align: center;
      padding: 10px;
      color: white;
      position: fixed;
      bottom: 0;
      width: 100%;
    }
  </style>
</head>
<body>

  <header>
    <h1>Elite Journey Rides</h1>
    <nav>
      <a href="Homepage.html">← Back to Home</a>
    </nav>
  </header>

  <div class="container">
    <h2>Contact Us</h2>
    <form>
      <div class="form-group">
        <label for="name">Full Name:</label>
        <input type="text" id="name" placeholder="Enter your name" required />
      </div>

      <div class="form-group">
        <label for="email">Email Address:</label>
        <input type="email" id="email" placeholder="Enter your email" required />
      </div>

      <div class="form-group">
        <label for="message">Message:</label>
        <textarea id="message" placeholder="Write your message here..." required></textarea>
      </div>

      <button type="submit">Send Message</button>
    </form>
  </div>

  <footer>
    &copy; 2025 Elite Journey Rides. All rights reserved.
  </footer>

</body>
</html>