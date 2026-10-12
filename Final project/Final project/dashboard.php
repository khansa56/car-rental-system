<?php
session_start();

// Check if user is logged in
if (!isset($_SESSION['admin_logged_in']) && basename($_SERVER['PHP_SELF']) !== 'dashboard.php') {
    header('Location: dashboard.php');
    exit();
}

// Get the current page from URL parameter
$current_page = isset($_GET['page']) ? $_GET['page'] : 'manage-cars.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Admin Dashboard with Sidebar, Header, and Footer</title>
  <style>
    * {
      box-sizing: border-box;
    }

    body, html {
      margin: 0; padding: 0;
      height: 100%;
      font-family: Arial, sans-serif;
      background: #f4f4f4;
      overflow: hidden;
    }

    /* Login Overlay with background image using your full Windows path */
    #loginOverlay {
      position: fixed;
      top: 0; left: 0;
      width: 100%; height: 100%;
      background:
        linear-gradient(rgba(0,0,0,0.5), rgba(0,0,0,0.5)),
        url("file:///C:/Users/HP/OneDrive/Pictures/Saved%20Pictures/project%20images/pexels-photo-12061174.jpeg") center/cover no-repeat;
      display: flex;
      justify-content: center;
                   
      align-items: flex-start;
      padding-top: 80px;
      z-index: 999;
    }

    .login-box {
      background: rgba(255, 255, 255, 0.85);
      padding: 30px;
      border-radius: 10px;
      box-shadow: 0 8px 30px rgba(0,0,0,0.3);
      width: 280px;
      text-align: center;
    }

    .login-box h2 {
      margin-bottom: 20px;
      color: #333;
    }

    .login-box input {
      width: 100%;
      padding: 10px;
      margin: 10px 0;
      border: 1px solid #ccc;
      border-radius: 6px;
      font-size: 15px;
    }

    .login-box button {
      width: 100%;
      padding: 10px;
      background: #007bff;
      color: white;
      border: none;
      border-radius: 6px;
      font-size: 16px;
      cursor: pointer;
      transition: 0.3s;
    }

    .login-box button:hover {
      background: #0056b3;
    }

    /* Dashboard layout */
    #dashboard {
      display: flex;
      height: 100vh;
      width: 100vw;
    }

    /* Sidebar */
    .sidebar {
      width: 220px;
      background-color: #666666;
      color: white;
      display: flex;
      flex-direction: column;
      padding-top: 30px;
      position: relative;
    }

    .sidebar h2 {
      text-align: center;
      margin-bottom: 30px;
      font-weight: normal;
      padding: 15px 0;
      cursor: default;
      user-select: none;
    }

    .sidebar button {
      background: none;
      border: none;
      color: white;
      padding: 15px 20px;
      text-align: left;
      width: 100%;
      cursor: pointer;
      font-size: 16px;
      transition: background 0.3s, border-left-color 0.3s;
      border-left: 4px solid transparent;
    }

    .sidebar button:hover {
      background-color: #a3a3a3;
      border-left-color: orange;
    }

    .sidebar button.active {
      background-color: #333333;
      border-left: 4px solid orange;
    }

    .logout-btn {
      margin-top: auto;
      background-color: black !important;
      padding: 15px 20px;
      font-weight: bold;
      border-radius: 0 4px 4px 0;
      border-left: 4px solid transparent;
      transition: background-color 0.3s;
      color: white;
    }

    .logout-btn:hover {
      background-color: black !important;
    }

    .content-area {
      flex-grow: 1;
      background: white;
      display: flex;
      flex-direction: column;
      height: 100vh;
    }

    .header {
      background-color: #666666;
      color: white;
      padding: 53px 30px;
      font-size: 24px;
      font-weight: normal;
      display: flex;
      justify-content: center;
      align-items: center;
      position: relative;
      flex-shrink: 0;
      user-select: none;
    }

    .header h1 {
      margin: 0;
      position: absolute;
      left: 50%;
      transform: translateX(-50%);
      user-select: none;
    }

    .header button.logout-top {
      position: absolute;
      right: 30px;
      background-color: #cc0000;
      color: white;
      border: none;
      padding: 8px 20px;
      border-radius: 5px;
      cursor: pointer;
      font-size: 16px;
      transition: background-color 0.3s;
      user-select: none;
    }

    .header button.logout-top:hover {
      background-color: #990000;
    }

    iframe {
      border: none;
      flex-grow: 1;
      width: 100%;
      height: calc(100vh - 90px);
    }

    .footer {
      background-color: #666666;
      color: white;
      text-align: center;
      padding: 15px 30px;
      font-size: 14px;
      flex-shrink: 0;
      user-select: none;
    }
  </style>
</head>
<body>

  <!-- Login Overlay -->
  <div id="loginOverlay" <?php echo isset($_SESSION['admin_logged_in']) ? 'style="display:none;"' : ''; ?>>
    <div class="login-box">
      <h2>Admin Login</h2>
      <input type="text" id="username" placeholder="Username" />
      <input type="password" id="password" placeholder="Password" />
      <button onclick="login()">Login</button>
    </div>
  </div>

  <!-- Dashboard -->
  <div id="dashboard" <?php echo isset($_SESSION['admin_logged_in']) ? 'style="display:flex;"' : 'style="display:none;"'; ?>>
    <div class="sidebar">
      <h2>Admin Panel</h2>
      <button class="nav-btn <?php echo $current_page === 'manage-cars.php' ? 'active' : ''; ?>" 
              onclick="loadPage('manage-cars.php', this)">Manage Cars</button>
      <button class="nav-btn <?php echo $current_page === 'manage-booking.php' ? 'active' : ''; ?>" 
              onclick="loadPage('manage-booking.php', this)">Manage Bookings</button>
      <button class="nav-btn <?php echo $current_page === 'manage-customers.php' ? 'active' : ''; ?>" 
              onclick="loadPage('manage-customers.php', this)">Manage Customers</button>
      <button class="nav-btn <?php echo $current_page === 'manage-payment.php' ? 'active' : ''; ?>" 
              onclick="loadPage('manage-payment.php', this)">Manage Payments</button>
      <button class="nav-btn <?php echo $current_page === 'report.php' ? 'active' : ''; ?>" 
              onclick="loadPage('report.php', this)">Reports</button>
      <button class="logout-btn" onclick="logout()">Logout</button>
    </div>

    <div class="content-area">
      <div class="header">
        <h1>Dashboard</h1>
        <button class="logout-top" onclick="logout()">Logout</button>
      </div>

      <iframe id="mainFrame" src="<?php echo htmlspecialchars($current_page); ?>" 
              style="width: 100%; height: calc(100vh - 90px); border: none;"></iframe>

      <div class="footer">
        &copy; 2025 Elite Journey Rides. All rights reserved.
      </div>
    </div>
  </div>

  <script>
    function login() {
      const username = document.getElementById("username").value.trim();
      const password = document.getElementById("password").value.trim();

      fetch('admin_login.php', {
        method: 'POST',
        headers: {
          'Content-Type': 'application/x-www-form-urlencoded',
        },
        body: `username=${encodeURIComponent(username)}&password=${encodeURIComponent(password)}`
      })
      .then(response => response.json())
      .then(data => {
        if (data.success) {
          document.getElementById("loginOverlay").style.display = "none";
          document.getElementById("dashboard").style.display = "flex";
          // Reload the current page to update session state
          window.location.reload();
        } else {
          alert("Invalid username or password");
        }
      })
      .catch(error => {
        console.error('Error:', error);
        alert("Login failed. Please try again.");
      });
    }

    function loadPage(page, btn) {
      // Update URL without reloading the page
      const url = new URL(window.location.href);
      url.searchParams.set('page', page);
      window.history.pushState({}, '', url);
      
      // Update iframe source
      document.getElementById("mainFrame").src = page;
      
      // Update active button
      document.querySelectorAll(".nav-btn").forEach(b => b.classList.remove("active"));
      btn.classList.add("active");
    }

    function logout() {
      fetch('admin_logout.php')
      .then(() => {
        window.location.href = 'index.php';
      })
      .catch(error => {
        console.error('Error:', error);
        window.location.href = 'index.php';
      });
    }

    // Handle browser back/forward buttons
    window.addEventListener('popstate', function() {
      const url = new URL(window.location.href);
      const page = url.searchParams.get('page') || 'manage-cars.php';
      document.getElementById("mainFrame").src = page;
      
      // Update active button
      document.querySelectorAll(".nav-btn").forEach(btn => {
        btn.classList.toggle("active", btn.getAttribute("onclick").includes(page));
      });
    });
  </script>

</body>
</html>