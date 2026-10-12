<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Manage Bookings</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      background: #f9f9f9;
      padding: 20px;
    }

    .container {
      max-width: 900px;
      margin: auto;
    }

    h2 {
      text-align: center;
      margin-bottom: 30px;
    }

    table {
      width: 100%;
      border-collapse: collapse;
      background: #fff;
      box-shadow: 0 2px 8px rgba(0,0,0,0.1);
      border-radius: 8px;
      overflow: hidden;
    }

    th, td {
      padding: 15px;
      text-align: left;
      border-bottom: 1px solid #ddd;
    }

    th {
      background: #007bff;
      color: white;
    }

    tr:last-child td {
      border-bottom: none;
    }

    .status {
      font-weight: bold;
    }

    .status.Approved {
      color: green;
    }

    .status.Cancelled {
      color: red;
    }

    .status.Pending {
      color: orange;
    }

    .btn {
      padding: 7px 12px;
      border: none;
      color: white;
      cursor: pointer;
      border-radius: 4px;
      margin-right: 5px;
    }

    .approve {
      background-color: #28a745;
    }

    .cancel {
      background-color: #dc3545;
    }

    .pending {
      background-color: orange;
    }

    .btn:hover {
      opacity: 0.9;
    }
  </style>
</head>
<body>

<div class="container">
  <h2>Manage Bookings</h2>
  <table>
    <thead>
      <tr>
        <th>#</th>
        <th>Customer Name</th>
        <th>Car</th>
        <th>Date</th>
        <th>Status</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody id="bookingTableBody">
      <!-- Bookings will be added here dynamically -->
    </tbody>
  </table>
</div>

<script>
  let bookings = [
    { id: 1, customer: "Ali Khan", car: "Toyota Corolla", date: "2025-05-20", status: "Pending" },
    { id: 2, customer: "Sara Ahmed", car: "Honda Civic", date: "2025-05-22", status: "Approved" },
    { id: 3, customer: "Usman Raza", car: "Ford Mustang", date: "2025-05-25", status: "Pending" }
  ];

  function renderBookings() {
    const tbody = document.getElementById("bookingTableBody");
    tbody.innerHTML = "";
    bookings.forEach((booking, index) => {
      const tr = document.createElement("tr");
      tr.innerHTML = `
        <td>${index + 1}</td>
        <td>${booking.customer}</td>
        <td>${booking.car}</td>
        <td>${booking.date}</td>
        <td class="status ${booking.status}">${booking.status}</td>
        <td>
          <button class="btn approve" onclick="updateStatus(${booking.id}, 'Approved')">Approve</button>
          <button class="btn cancel" onclick="updateStatus(${booking.id}, 'Cancelled')">Cancel</button>
          <button class="btn pending" onclick="updateStatus(${booking.id}, 'Pending')">Pending</button>
        </td>
      `;
      tbody.appendChild(tr);
    });
  }

  function updateStatus(id, newStatus) {
    const booking = bookings.find(b => b.id === id);
    if (booking) {
      booking.status = newStatus;
      renderBookings();
    }
  }

  renderBookings();
</script>

</body>
</html>