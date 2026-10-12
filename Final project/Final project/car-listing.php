<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Car Slideshow - Elite Journey Rides</title>
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: Arial, sans-serif;
    }

    body {
      height: 125vh;
      background-color: white;
      color: black;
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
      background-color: #e65500;
    }

    .slideshow {
      height: calc(120vh - 160px);
      position: relative;
      display: flex;
      justify-content: center;
      align-items: center;
      overflow: hidden;
    }

    .car-slide {
      position: absolute;
      width: 100%;
      height: 100%;
      opacity: 0;
      transform: scale(0.85);
      transition: opacity 1s ease, transform 1s ease;
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
    }

    .car-slide.active {
      opacity: 1;
      transform: scale(1);
      z-index: 1;
    }

    .car-slide img {
      width: 1000px;
      height: 550px;
      object-fit: cover;
      border-radius: 20px;
      box-shadow: 0 0 50px black; /* portal glow */
      background-color: #eee;
      transition: transform 1s ease;
    }

    .car-slide::before {
      content: "";
      position: absolute;
      width: 1060px;
      height: 610px;
      border-radius: 50%;
      background: radial-gradient(circle, rgba(255,102,0,0.25) 0%, transparent 70%);
      z-index: 0;
      animation: pulse 2s infinite ease-in-out;
    }

    @keyframes pulse {
      0%, 100% {
        transform: scale(0.95);
        opacity: 0.7;
      }
      50% {
        transform: scale(1.05);
        opacity: 1;
      }
    }

    .car-name {
      font-size: 36px;
      font-weight: bold;
      margin-top: 20px;
    }

    .car-model {
      font-size: 24px;
      color: #555;
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
      <a href="admin-dashboard.html">Admin</a>
    </nav>
  </header>

  <div class="slideshow" id="slideshow">
    <!-- Slides will be created via JavaScript -->
  </div>

  <footer>
    &copy; 2025 Elite Journey Rides Service. All rights reserved.
  </footer>

  <script>
    const cars = [
      { name: "Honda Civic", model: "2021", image: "D:/Final project/project pictures11/2023-Honda-Civic-Type-R-debut-21-1200x628-1.jpg" },
  { name: "Toyota Corolla", model: "2020", image: "D:/Final project/project pictures11/WhatsApp Image 2025-06-01 at 18.33.47_23580f3e.jpg" },
  { name: "Toyota Fortuner", model: "2022", image: "D:/Final project/project pictures11/WhatsApp Image 2025-06-01 at 18.35.14_31a45127.jpg" }, 
  { name: "Suzuki Cultus", model: "2021", image: "D:/Users/HP/OneDrive/문서/Final project/project pictures11/WhatsApp Image 2025-06-01 at 18.36.47_7133940a.jpg" },
  { name: "Kia Sportage", model: "2022", image: "C:/Users/HP/OneDrive/문서/Final project/project pictures11/WhatsApp Image 2025-06-01 at 18.49.10_2570df3d.jpg" },
  { name: "BMW 7 Series", model: "2021", image: "C:/Users/HP/OneDrive/문서/Final project/project pictures11/WhatsApp Image 2025-06-01 at 18.55.39_6fa01a00.jpg" },
  { name: "Audi R8 GT", model: "2021", image: "C:/Users/HP/OneDrive/문서/Final project/project pictures11/WhatsApp Image 2025-06-01 at 18.55.39_72192642.jpg" },
  { name: "Ford F-150 Raptor", model: "2021", image: "C:/Users/HP/OneDrive/문서/Final project/project pictures11/WhatsApp Image 2025-06-02 at 16.29.44_feb09ed2.jpg" },
  { name: "G Wagon", model: "2021", image: "C:/Users/HP/OneDrive/문서/Final project/project pictures11/WhatsApp Image 2025-06-01 at 19.05.16_df23bfee.jpg" },
  { name: "Rang Rover", model: "2022", image: "C:/Users/HP/OneDrive/문서/Final project/project pictures11/WhatsApp Image 2025-06-01 at 19.05.17_be3b9f4e.jpg" },
  { name: "Hyundai Tucson", model: "2022", image: "C:/Users/HP/OneDrive/문서/Final project/project pictures11/WhatsApp Image 2025-06-01 at 18.49.10_7eb67fe0.jpg" },
  { name: "MG HS", model: "2022", image: "C:/Users/HP/OneDrive/문서/Final project/project pictures11/WhatsApp Image 2025-06-01 at 18.55.38_d4dca5f3.jpg" }
];
    const slideshow = document.getElementById("slideshow");

    // Create slides
    cars.forEach((car) => {
      const slide = document.createElement("div");
      slide.className = "car-slide";
      slide.innerHTML = `
        <img src="${car.image}" alt="${car.name}">
        <div class="car-name">${car.name}</div>
        <div class="car-model">Model: ${car.model}</div>
      `;
      slideshow.appendChild(slide);
    });

    const slides = document.querySelectorAll(".car-slide");
    let currentSlide = 0;

    function showSlide(index) {
      slides.forEach((slide, i) => {
        slide.classList.remove("active");
        if (i === index) {
          slide.classList.add("active");
        }
      });
    }

    showSlide(currentSlide);

    setInterval(() => {
      currentSlide = (currentSlide + 1) % slides.length;
      showSlide(currentSlide);
    }, 2500);
  </script>

</body>
</html>