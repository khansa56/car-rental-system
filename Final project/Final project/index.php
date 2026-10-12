<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Car Rental System</title>
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: Arial, sans-serif;
    }

    body {
      height: 150vh;
      position: relative;
      color: white;
    }

    header {
      position: relative;
      text-align: center;
      padding-top: 1px;
      padding-bottom: 20px;
      background: black;
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
      background-color: #e65500;
      border-radius: 5px;
      font-weight: bold;
      transition: background-color 0.3s ease;
    }

    header nav a:hover {
      background-color: #e65500;
    }

    .login-btn {
      position: absolute;
      top: 80%;
      right: 30px;
      transform: translateY(-50%);
      padding: 12px 24px;
      background-color: #ff6600;
      color: white;
      border: none;
      border-radius: 5px;
      cursor: pointer;
      font-size: 16px;
    }

    .homepage-image {
      width: 100%;
      text-align: center;
      margin-top: 10px;
      position: relative;
    }

    .homepage-image video {
      width: 97%;
      height: 750px;
      border-radius: 10px;
      box-shadow: 0 0 15px rgba(0,0,0,0.4);
      object-fit: cover;
    }

    .intro-text {
      position: absolute;
      top: 200px;
      left: 50%;
      transform: translateX(-50%);
      color: white;
      padding: 10px 15px;
      border-radius: 6px;
      font-size: 22px;
      font-weight: 600;
      pointer-events: none;
      max-width: 80%;
      text-align: center;
    }

    .info-links {
      display: flex;
      justify-content: center;
      gap: 30px;
      margin-top: 30px;
      margin-bottom: 20px;
    }

    .info-links a {
      color: #ff6600;
      font-weight: bold;
      text-decoration: none;
      font-size: 16px;
      border: 1px solid #ff6600;
      padding: 10px 20px;
      border-radius: 6px;
      transition: background-color 0.3s, color 0.3s;
    }

    .info-links a:hover {
      background-color: #ff6600;
      color: white;
    }

    .login-form {
      display: none;
      position: absolute;
      top: 160px;
      right: 30px;
      background-color: rgba(255, 255, 255, 0.95);
      color: black;
      padding: 20px;
      border-radius: 8px;
      width: 300px;
      box-shadow: 0 0 10px rgba(0,0,0,0.4);
    }

    .login-form h3 {
      margin-bottom: 10px;
    }

    .login-form input {
      width: 100%;
      padding: 10px;
      margin-bottom: 10px;
      border: 1px solid #ccc;
      border-radius: 4px;
      font-size: 14px;
    }

    .login-form button {
      width: 100%;
      background-color: #ff6600;
      color: white;
      padding: 10px;
      border: none;
      cursor: pointer;
      font-size: 16px;
      border-radius: 5px;
    }

    .login-form button:hover {
      background-color: #e65500;
    }

    .error {
      color: red;
      font-size: 14px;
      display: none;
      margin-top: 10px;
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

    .hero-container {
  position: relative;
  width: 100%;
  height: 100vh;
  overflow: hidden;
}

.hero-video {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  object-fit: cover;
  z-index: 1;
}

.hero-content {
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  z-index: 2;
}

.display-4{
  font-size: 4rem;
  font-weight: bold;
  margin-bottom: 1rem;
  text-shadow: 2px 2px 4px rgba(0,0,0,0.7);
}

.lead{
  font-size: 2rem;
  margin-bottom: 2rem;
  text-shadow: 1px 1px 3px rgba(0,0,0,0.6);
}
.hero-content h1,
.hero-content p {
  text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.7);
}

.hero-btn {
  background-color: yellow;
  color: black;
  padding: 15px 30px;
  font-size: 1.2rem;
  text-decoration: none;
  border-radius: 8px;
  font-weight: bold;
  transition: background-color 0.3s ease;
  box-shadow: 2px 2px 5px rgba(0,0,0,0.5);
}

.hero-btn:hover {
  background-color: #ffcc00;
}

.find-section {
  background-color: #fff;
  color: #111;
  padding: 60px 0;
  text-align: center;
}

.find-section h2 {
  font-size: 42px;
  font-weight: 600;
  margin-bottom: 60px;
}

/* Force horizontal layout */
.find-boxes {
  display: flex;
  justify-content: center;
  align-items: flex-start;
  gap: 30px;
  flex-wrap: nowrap; /* No wrapping */
  max-width: 1400px;
  margin: 0 auto;
  overflow-x: auto; /* Optional for smaller screens */
}

/* Individual box */
.find-box {
  width: 280px; /* Fixed width for each */
  background-color: #fff;
  border: 1px solid #ddd;
  border-radius: 12px;
  padding: 30px 20px;
  text-align: center;
  transition: 0.3s ease;
  flex-shrink: 0;
}

.find-box:hover {
  box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
  transform: translateY(-5px);
}

/* Icon */
.icon-lg {
  font-size: 50px;
  color: #000;
}

/* Box title */
.find-box h5 {
  margin-top: 20px;
  font-size: 22px;
  font-weight: 500;
}

/* Button */
.find-btn {
  display: inline-block;
  margin-top: 20px;
  padding: 12px 25px;
  border: 1px solid #111;
  background-color: #fff;
  color: #000;
  font-weight: 500;
  border-radius: 8px;
  text-decoration: none;
  transition: 0.3s ease;
}

.find-btn:hover {
  background-color: #FFD700;
  color: #000;
  border-color: #FFD700;
}


body {
  font-family: 'Segoe UI', sans-serif;
  background-color: #fff;
  color: #333;
  line-height: 1.7;
}

.diagonal-section {
  border-bottom: 1px solid #eee;
}

h2 {
  font-size: 2rem;
  margin-bottom: 20px;
  color: #000;
}

p {
  font-size: 1.1rem;
  text-align: justify;
}

/* Fade effect for images */
.scroll-image {
  opacity: 0;
  transform: scale(0.9);
  transition: opacity 1s ease, transform 1s ease;
}

.scroll-image.visible {
  opacity: 1;
  transform: scale(1);
}


.social-media-section {
  margin-top: 30px;
  text-align: center;
}

.social-icon {
  margin: 0 15px;
  font-size: 36px; /* Increased icon size */
  transition: color 0.3s ease;
  display: inline-block;
  color: #555;
  text-decoration: none;
}

.social-icon:hover {
  color: #f0c419;
}

.social-icon.facebook {
  color: #3b5998;
}

.social-icon.facebook:hover {
  color: #2d4373;
}

.social-icon.twitter {
  color: #1da1f2;
}

.social-icon.twitter:hover {
  color: #0d95e8;
}

.social-icon.instagram {
  color: #e1306c;
}

.social-icon.instagram:hover {
  color: #b62a57;
}

.social-icon.linkedin {
  color: #0077b5;
}

.social-icon.linkedin:hover {
  color: #005983;
}



.footer {
  background-color: #111;
  color: #fff;
}

.footer a:hover {
  text-decoration: underline;
  color: #f0c419;
}


/* Footer styling */
.site-footer {
  background-color: #111;
  color: #fff;
  text-align: center;
  padding: 15px 0;
  font-size: 14px;
 margin-bottom: 0%;
}
  </style>
</head>
<body>

  <header>
    <meta charset="UTF-8">
  <title>Elite Journey Rides - Intro</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <link
  href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"
  rel="stylesheet"
/>



    <h1>Elite Journey Rides</h1>
    <button class="login-btn" onclick="toggleLogin()">Login</button>
    <nav>
        <a href="/car-rental/index.php">Home Page</a>
        <a href="/car-rental/car-listing.php">Listing</a>
        <a href="/car-rental/car-details.php">Detail</a>
        <a href="/car-rental/booking.php">Booking</a>
        <a href="/car-rental/payment.php">Payment</a>
        <a href="/car-rental/dashboard.php">Admin</a>
        <a href="/car-rental/about.php">About</a>
        <a href="/car-rental/contact.php">Contact</a>
    </nav>
  </header>
  
 
<!-- Hero Section -->
<section class="hero-container">
  <!-- Background video -->
  <video autoplay muted loop class="hero-video">
    <source src="project pictures11/video 6.mp4" type="video/mp4">
    Your browser does not support HTML5 video.
  </video>

  <!-- Overlay and text content -->
  <div class="hero-content text-center text-white">
    <h1 class="display-4 fw-bold">Elite Journey Rides</h1>
    <p class="lead">Drive Your Dream Car Today</p>
    <a href="Car details.html" class="hero-btn">Book Now</a>
  </div>
</section>


<section class="find-section">
  <h2>Find Your BMW.</h2>
  <div class="find-boxes">
    <div class="find-box">
      <i class="bi bi-car-front icon-lg"></i>
      <h5>Find a new car.</h5>
      <a href="newcar.html" class="find-btn">Search now</a>
    </div>
    <div class="find-box">
      <i class="bi bi-search icon-lg"></i>
      <h5>Find a used car.</h5>
      <a href="usedcar.html" class="find-btn">Search now</a>
    </div>
    <div class="find-box">
      <i class="bi bi-plus-square icon-lg"></i>
      <h5>Book a test drive.</h5>
      <a href="testdrive.html" class="find-btn">Book a test drive</a>
    </div>
    <div class="find-box">
      <i class="bi bi-chat-dots icon-lg"></i>
      <h5>Get a brochure.</h5>
      <a href="brochure.html" class="find-btn">Get a Brochure</a>
    </div>
  </div>
</section>


<!-- Section 1: Text left, image right -->
<section class="container py-5 diagonal-section">
  <div class="row align-items-center">
    <div class="col-md-6">
      <h2 class="fw-bold">Drive in Ultimate Comfort</h2>
      <p>
        Welcome to Elite Journey Rides, your premier destination for luxury and reliable car rental services. We are committed to delivering an unparalleled driving experience tailored to meet the diverse needs of our valued customers. Whether you're embarking on a business trip, planning a family vacation, or attending a special event, our extensive fleet of meticulously maintained vehicles offers something for everyone—from sleek sports cars to spacious SUVs and elegant sedans. At Elite Journey Rides, we prioritize your comfort, safety, and satisfaction by providing seamless booking processes, competitive pricing, and exceptional customer support. 
      </p>
    </div>
    <div class="col-md-6 scroll-image fade-on-scroll">
      <img src="D:\Final project\project pictures11\WhatsApp Image 2025-06-01 at 18.55.39_6fa01a00.jpg" class="img-fluid rounded shadow" alt="Luxury Car 1">
    </div>
  </div>
</section>

<!-- Section 2: Image left, text right -->
<section class="container py-5 diagonal-section">
  <div class="row align-items-center flex-md-row-reverse">
    <div class="col-md-6">
      <h2 class="fw-bold">Reliable & Stylish Journeys</h2>
      <p>
        Trust and elegance go hand in hand at Elite Journey Rides, where we believe that every journey should be as exceptional as the destination itself. Our commitment to quality is reflected in the rigorous maintenance and safety checks every vehicle in our fleet undergoes before it reaches your hands. We carefully select and maintain each car to ensure peak performance, reliability, and comfort, so you can drive with confidence no matter where the road takes you. From sophisticated executive sedans designed to impress and provide a smooth, luxurious ride, to sporty SUVs built for both style and versatility, our diverse range of vehicles is tailored to suit every lifestyle and occasion.
      </p>
    </div>
    <div class="col-md-6 scroll-image fade-on-scroll">
      <img src="D:\Final project\project pictures11\WhatsApp Image 2025-06-01 at 19.05.17_be3b9f4e.jpg" class="img-fluid rounded shadow" alt="Luxury Car 2">
    </div>
  </div>
</section>


<div class="social-media-section">
  <a href="https://www.facebook.com/YourPage" target="_blank" aria-label="Facebook" class="social-icon facebook">
    <i class="fab fa-facebook-f"></i>
  </a>
  <a href="https://twitter.com/YourProfile" target="_blank" aria-label="Twitter" class="social-icon twitter">
    <i class="fab fa-twitter"></i>
  </a>
  <a href="https://www.instagram.com/YourProfile" target="_blank" aria-label="Instagram" class="social-icon instagram">
    <i class="fab fa-instagram"></i>
  </a>
  <a href="https://www.linkedin.com/in/YourProfile" target="_blank" aria-label="LinkedIn" class="social-icon linkedin">
    <i class="fab fa-linkedin-in"></i>
  </a>
</div>


  <!-- Info Links -->
  <div class="info-links">
    <a href="terms.html" target="_blank">Terms & Conditions</a>
    <a href="about.html" target="_blank">About Us</a>
    <a href="contact.html" target="_blank">Contact Us</a>
  </div>

  <!-- Login Form -->
  <div class="login-form" id="loginForm">
    <h3>Login</h3>
    <input type="text" id="username" placeholder="Username" />
    <input type="password" id="password" placeholder="Password" />
    <button onclick="login()">Submit</button>
    <p class="error" id="error-msg">Invalid username or password</p>
  </div>

  <footer class="site-footer">
    &copy; 2025 Elite Journey Rides Service. All rights reserved.
  </footer>


  <script>
    function toggleLogin() {
      var form = document.getElementById("loginForm");
      form.style.display = form.style.display === "block" ? "none" : "block";
    }

    function login() {
      var username = document.getElementById("username").value.trim();
      var password = document.getElementById("password").value.trim();
      var errorMsg = document.getElementById("error-msg");

      if (username === "admin" && password === "1234") {
        alert("Login successful!");
        errorMsg.style.display = "none";
      } else {
        errorMsg.style.display = "block";
      }
    }
  </script>


<!-- JavaScript: Bootstrap + Scroll Logic -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script>
  // Fade in/out images when they enter or leave viewport
  const observer = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
      if (entry.isIntersecting) {
        entry.target.classList.add('visible');
      } else {
        entry.target.classList.remove('visible');
      }
    });
  }, {
    threshold: 0.4,
  });

  document.querySelectorAll('.fade-on-scroll').forEach(el => {
    observer.observe(el);
  });
</script>


</body>
</html>
