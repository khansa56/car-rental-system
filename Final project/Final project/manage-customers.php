<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Manage Customers - Car Rental System</title>
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <style>
    body {
      font-family: Arial, sans-serif;
      background: #f9f9f9;
      margin: 0; 
      padding: 0;
      display: flex;
      flex-direction: column;
      align-items: center; /* center everything horizontally */
      min-height: 100vh;
      padding-top: 30px;
    }

    header {
      background: #333;
      color: white;
      padding: 20px;
      text-align: center;
      font-size: 24px;
      width: 100%;
    }

    h2 {
      margin-bottom: 20px;
      color: #333;
      text-align: center;
      width: 900px; /* same as table width */
    }

    table {
      width: 900px;
      border-collapse: collapse;
      background: white;
      box-shadow: 0 3px 8px rgba(0,0,0,0.15);
      border-radius: 8px;
      overflow: hidden;
      margin-bottom: 30px;
    }

    th, td {
      padding: 12px;
      border: 1px solid #ddd;
      text-align: left;
    }

    th {
      background-color: #007BFF;
      color: white;
    }

    button {
      background-color: #007BFF;
      color: white;
      border: none;
      padding: 7px 14px;
      border-radius: 5px;
      cursor: pointer;
      font-size: 14px;
    }

    button:hover {
      background-color: #0056b3;
    }

    /* Modal styles */
    .modal {
      display: none; /* Hidden by default */
      position: fixed;
      z-index: 10;
      left: 0; top: 0;
      width: 100%; height: 100%;
      overflow: auto;
      background-color: rgba(0,0,0,0.5);
      justify-content: center;
      align-items: center;
    }

    .modal-content {
      background-color: #fff;
      margin: auto;
      padding: 20px;
      border-radius: 8px;
      max-width: 600px;
      width: 90%;
      box-shadow: 0 3px 10px rgba(0,0,0,0.3);
      animation: fadeIn 0.3s ease-in-out;
    }

    @keyframes fadeIn {
      from {opacity: 0; transform: translateY(-20px);}
      to {opacity: 1; transform: translateY(0);}
    }

    .close-btn {
      float: right;
      font-size: 24px;
      font-weight: bold;
      color: #333;
      cursor: pointer;
    }

    .close-btn:hover {
      color: #007BFF;
    }

    .history-table {
      width: 100%;
      border-collapse: collapse;
      margin-top: 15px;
    }

    .history-table th, .history-table td {
      border: 1px solid #ccc;
      padding: 10px;
      text-align: center;
    }

    .history-table th {
      background-color: #007BFF;
      color: white;
    }

  </style>
</head>
<body>

  <h2>Customer List</h2>

  <table id="customersTable">
    <thead>
      <tr>
        <th>Customer ID</th>
        <th>Name</th>
        <th>Email</th>
        <th>Phone</th>
        <th>Actions</th>
      </tr>
    </thead>
    <tbody>
      <!-- Customers will be dynamically inserted here -->
    </tbody>
  </table>

  <!-- Modal for Customer History -->
  <div id="historyModal" class="modal">
    <div class="modal-content">
      <span class="close-btn" id="closeModal">&times;</span>
      <h3>Booking History for <span id="customerName"></span></h3>
      <table class="history-table" id="historyTable">
        <thead>
          <tr>
            <th>Booking ID</th>
            <th>Car</th>
            <th>From</th>
            <th>To</th>
            <th>Status</th>
          </tr>
        </thead>
        <tbody>
          <!-- Booking history will go here -->
        </tbody>
      </table>
    </div>
  </div>

  <script>
    // Sample customer data
    const customers = [
      { id: 1, name: "Ali Khan", email: "ali.khan@example.com", phone: "03001234567" },
      { id: 2, name: "Sara Malik", email: "sara.malik@example.com", phone: "03111234567" },
      { id: 3, name: "Usman Tariq", email: "usman.tariq@example.com", phone: "03221234567" }
    ];

    // Sample booking history data keyed by customer ID
    const bookingHistory = {
      1: [
        { bookingId: 101, car: "Toyota Corolla", from: "2025-06-01", to: "2025-06-05", status: "Approved" },
        { bookingId: 102, car: "Honda Civic", from: "2025-07-10", to: "2025-07-12", status: "Cancelled" }
      ],
      2: [
        { bookingId: 103, car: "Suzuki Alto", from: "2025-06-10", to: "2025-06-12", status: "Approved" }
      ],
      3: [
        { bookingId: 104, car: "Honda City", from: "2025-05-15", to: "2025-05-18", status: "Pending" },
        { bookingId: 105, car: "Toyota Prius", from: "2025-05-20", to: "2025-05-22", status: "Approved" }
      ]
    };

    // Populate customers table
    function loadCustomers() {
      const tbody = document.querySelector("#customersTable tbody");
      tbody.innerHTML = "";

      customers.forEach(customer => {
        const tr = document.createElement("tr");
        tr.innerHTML = `
          <td>${customer.id}</td>
          <td>${customer.name}</td>
          <td>${customer.email}</td>
          <td>${customer.phone}</td>
          <td><button onclick="showHistory(${customer.id})">View History</button></td>
        `;
        tbody.appendChild(tr);
      });
    }

    // Show modal and display booking history for selected customer
    function showHistory(customerId) {
      const modal = document.getElementById("historyModal");
      const customer = customers.find(c => c.id === customerId);
      const history = bookingHistory[customerId] || [];

      document.getElementById("customerName").textContent = customer.name;

      const tbody = document.querySelector("#historyTable tbody");
      tbody.innerHTML = "";

      if(history.length === 0) {
        tbody.innerHTML = `<tr><td colspan="5">No booking history found.</td></tr>`;
      } else {
        history.forEach(booking => {
          const tr = document.createElement("tr");
          tr.innerHTML = `
            <td>${booking.bookingId}</td>
            <td>${booking.car}</td>
            <td>${booking.from}</td>
            <td>${booking.to}</td>
            <td>${booking.status}</td>
          `;
          tbody.appendChild(tr);
        });
      }

      modal.style.display = "flex";
    }

    // Close modal
    document.getElementById("closeModal").onclick = function() {
      document.getElementById("historyModal").style.display = "none";
    };

    // Close modal on outside click
    window.onclick = function(event) {
      const modal = document.getElementById("historyModal");
      if(event.target === modal) {
        modal.style.display = "none";
      }
    };

    loadCustomers();
  </script>

</body>
</html>