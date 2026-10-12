<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Manage Payments</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background: #f0f2f5;
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
      background: white;
      border-collapse: collapse;
      box-shadow: 0 2px 10px rgba(0,0,0,0.1);
      border-radius: 8px;
      overflow: hidden;
    }
    th, td {
      padding: 14px 12px;
      text-align: left;
      border-bottom: 1px solid #ddd;
    }
    th {
      background-color: #007bff;
      color: white;
    }
    tr:hover {
      background-color: #f1f1f1;
    }
    select {
      padding: 5px;
      font-weight: bold;
      border-radius: 5px;
    }
    .paid {
      background: #28a745;
      color: white;
    }
    .pending {
      background: #ffc107;
      color: black;
    }
    .failed {
      background: #dc3545;
      color: white;
    }
  </style>
</head>
<body>

<div class="container">
  <h2>Manage Payments</h2>

  <table>
    <thead>
      <tr>
        <th>#</th>
        <th>Customer</th>
        <th>Car</th>
        <th>Amount</th>
        <th>Date</th>
        <th>Status</th>
      </tr>
    </thead>
    <tbody id="paymentTableBody">
      <!-- Payment rows will be rendered dynamically -->
    </tbody>
  </table>
</div>

<script>
  const payments = [
    { id: 1, customer: "Ali Khan", car: "Toyota Corolla", amount: "Rs. 5,000", date: "2025-05-10", status: "Paid" },
    { id: 2, customer: "Sara Ahmed", car: "Honda Civic", amount: "Rs. 6,000", date: "2025-05-12", status: "Pending" },
    { id: 3, customer: "Usman Malik", car: "Ford Mustang", amount: "Rs. 12,000", date: "2025-05-14", status: "Failed" },
    { id: 4, customer: "Hina Riaz", car: "Honda City", amount: "Rs. 4,500", date: "2025-05-18", status: "Paid" }
  ];

  function renderPayments() {
    const tbody = document.getElementById("paymentTableBody");
    tbody.innerHTML = "";

    payments.forEach((p, index) => {
      const tr = document.createElement("tr");

      tr.innerHTML = `
        <td>${index + 1}</td>
        <td>${p.customer}</td>
        <td>${p.car}</td>
        <td>${p.amount}</td>
        <td>${p.date}</td>
        <td>
          <select onchange="updateStatus(${p.id}, this.value)" class="${p.status.toLowerCase()}">
            <option value="Paid" ${p.status === 'Paid' ? 'selected' : ''}>Paid</option>
            <option value="Pending" ${p.status === 'Pending' ? 'selected' : ''}>Pending</option>
            <option value="Failed" ${p.status === 'Failed' ? 'selected' : ''}>Failed</option>
          </select>
        </td>
      `;

      tbody.appendChild(tr);
    });
  }

  function updateStatus(id, newStatus) {
    const payment = payments.find(p => p.id === id);
    if (payment) {
      payment.status = newStatus;
      renderPayments(); // re-render to apply styles again
    }
  }

  renderPayments();
</script>

</body>
</html>