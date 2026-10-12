<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8" />
<title>Reports</title>
<style>
  body {
    font-family: Arial, sans-serif;
    background: #f5f7fa;
    padding: 20px;
  }
  .container {
    max-width: 900px;
    margin: auto;
  }
  h2 {
    text-align: center;
    margin-bottom: 20px;
  }
  /* Tabs style */
  .tabs {
    display: flex;
    justify-content: center;
    margin-bottom: 20px;
  }
  .tab {
    padding: 10px 20px;
    cursor: pointer;
    background: #007bff;
    color: white;
    margin: 0 5px;
    border-radius: 5px 5px 0 0;
    font-weight: bold;
  }
  .tab.active {
    background: #0056b3;
  }
  /* Tables style */
  table {
    width: 100%;
    background: white;
    border-collapse: collapse;
    border-radius: 8px;
    box-shadow: 0 2px 10px rgba(0,0,0,0.1);
    overflow: hidden;
  }
  th, td {
    padding: 12px 15px;
    border-bottom: 1px solid #ddd;
    text-align: left;
  }
  th {
    background: #007bff;
    color: white;
  }
  tr:hover {
    background: #f1f1f1;
  }
  /* Hide non-active report */
  .report {
    display: none;
  }
  .report.active {
    display: block;
  }
</style>
</head>
<body>

<div class="container">
  <h2>Reports</h2>

  <div class="tabs">
    <div class="tab active" onclick="showReport('booking')">Booking Reports</div>
    <div class="tab" onclick="showReport('earning')">Earnings Reports</div>
  </div>

  <!-- Booking Report -->
  <div id="booking" class="report active">
    <table>
      <thead>
        <tr>
          <th>#</th>
          <th>Booking ID</th>
          <th>Customer</th>
          <th>Car</th>
          <th>Date</th>
          <th>Status</th>
        </tr>
      </thead>
      <tbody id="bookingReportBody">
        <!-- Booking rows inserted dynamically -->
      </tbody>
    </table>
  </div>

  <!-- Earnings Report -->
  <div id="earning" class="report">
    <table>
      <thead>
        <tr>
          <th>#</th>
          <th>Car</th>
          <th>Month</th>
          <th>Total Bookings</th>
          <th>Total Earnings (Rs.)</th>
        </tr>
      </thead>
      <tbody id="earningReportBody">
        <!-- Earnings rows inserted dynamically -->
      </tbody>
    </table>
  </div>
</div>

<script>
  // Sample data for bookings
  const bookings = [
    { id: 'B001', customer: 'Ali Khan', car: 'Toyota Corolla', date: '2025-04-10', status: 'Approved' },
    { id: 'B002', customer: 'Sara Ahmed', car: 'Honda Civic', date: '2025-04-15', status: 'Cancelled' },
    { id: 'B003', customer: 'Usman Malik', car: 'Ford Mustang', date: '2025-05-05', status: 'Approved' },
    { id: 'B004', customer: 'Hina Riaz', car: 'Honda City', date: '2025-05-18', status: 'Pending' },
    { id: 'B005', customer: 'Ali Khan', car: 'Toyota Corolla', date: '2025-05-20', status: 'Approved' },
  ];

  // Sample data for earnings (aggregated)
  const earnings = [
    { car: 'Toyota Corolla', month: 'April 2025', totalBookings: 1, totalEarnings: 5000 },
    { car: 'Honda Civic', month: 'April 2025', totalBookings: 1, totalEarnings: 6000 },
    { car: 'Ford Mustang', month: 'May 2025', totalBookings: 1, totalEarnings: 12000 },
    { car: 'Honda City', month: 'May 2025', totalBookings: 1, totalEarnings: 4500 },
    { car: 'Toyota Corolla', month: 'May 2025', totalBookings: 1, totalEarnings: 5000 },
  ];

  // Show active report tab and hide others
  function showReport(reportId) {
    // Tabs
    document.querySelectorAll('.tab').forEach(tab => {
      tab.classList.remove('active');
    });
    event.target.classList.add('active');

    // Reports
    document.querySelectorAll('.report').forEach(report => {
      report.classList.remove('active');
    });
    document.getElementById(reportId).classList.add('active');
  }

  // Render booking report rows
  function renderBookingReport() {
    const tbody = document.getElementById('bookingReportBody');
    tbody.innerHTML = '';
    bookings.forEach((b, i) => {
      const tr = document.createElement('tr');
      tr.innerHTML = `
        <td>${i + 1}</td>
        <td>${b.id}</td>
        <td>${b.customer}</td>
        <td>${b.car}</td>
        <td>${b.date}</td>
        <td>${b.status}</td>
      `;
      tbody.appendChild(tr);
    });
  }

  // Render earning report rows
  function renderEarningReport() {
    const tbody = document.getElementById('earningReportBody');
    tbody.innerHTML = '';
    earnings.forEach((e, i) => {
      const tr = document.createElement('tr');
      tr.innerHTML = `
        <td>${i + 1}</td>
        <td>${e.car}</td>
        <td>${e.month}</td>
        <td>${e.totalBookings}</td>
        <td>${e.totalEarnings}</td>
      `;
      tbody.appendChild(tr);
    });
  }

  // Initial render
  renderBookingReport();
  renderEarningReport();
</script>

</body>
</html>
