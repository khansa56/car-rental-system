<?php
session_start();
// Add any authentication check here if needed
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Manage Cars</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            background: #f9f9f9;
            padding: 40px 0;
        }

        .container {
            width: 95%;
            max-width: 1200px;
            margin: auto;
            display: flex;
            justify-content: space-between;
            gap: 20px;
        }

        .box {
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
            flex: 1;
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-top: 10px;
        }

        input[type=text], select {
            width: 100%;
            padding: 8px;
            margin-top: 5px;
            box-sizing: border-box;
            border: 1px solid #ddd;
            border-radius: 4px;
        }

        button {
            margin-top: 15px;
            padding: 10px 15px;
            background: #007bff;
            border: none;
            color: white;
            cursor: pointer;
            border-radius: 5px;
        }

        button:hover {
            background: #0056b3;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }

        th, td {
            padding: 12px 10px;
            border-bottom: 1px solid #ddd;
            text-align: left;
        }

        .actions button {
            padding: 6px 12px;
            margin-right: 8px;
        }

        .actions button.update {
            background: #28a745;
        }

        .actions button.delete {
            background: #dc3545;
        }

        .actions button:hover {
            opacity: 0.8;
        }

        .error {
            color: #dc3545;
            margin-top: 5px;
            font-size: 0.9em;
        }

        .success {
            color: #28a745;
            margin-top: 5px;
            font-size: 0.9em;
        }
    </style>
</head>
<body>
    <h2>Manage Cars</h2>
    <div class="container">
        <!-- Add Car Form -->
        <div class="box">
            <form id="carForm">
                <input type="hidden" id="carId">
                
                <label for="carName">Car Name:</label>
                <input type="text" id="carName" required>
                
                <label for="carModel">Car Model:</label>
                <input type="text" id="carModel" required>
                
                <label for="carAvailability">Availability:</label>
                <select id="carAvailability" required>
                    <option value="Available">Available</option>
                    <option value="Unavailable">Unavailable</option>
                </select>
                
                <button type="submit" id="submitBtn">Add Car</button>
                <button type="button" id="cancelBtn" style="display:none; margin-left:10px; background:#6c757d;">Cancel</button>
            </form>
            <div id="formMessage"></div>
        </div>

        <!-- Car List -->
        <div class="box">
            <table>
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Car Name</th>
                        <th>Model</th>
                        <th>Availability</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody id="carTableBody">
                    <!-- Dynamic rows here -->
                </tbody>
            </table>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const carForm = document.getElementById('carForm');
            const submitBtn = document.getElementById('submitBtn');
            const cancelBtn = document.getElementById('cancelBtn');
            const formMessage = document.getElementById('formMessage');
            
            // Load cars on page load
            loadCars();
            
            // Handle form submission
            carForm.addEventListener('submit', async (e) => {
                e.preventDefault();
                const carId = document.getElementById('carId').value;
                const formData = new FormData();
                
                formData.append('name', document.getElementById('carName').value);
                formData.append('model', document.getElementById('carModel').value);
                formData.append('available', document.getElementById('carAvailability').value);
                
                try {
                    const response = await fetch(carId ? 'update_car.php' : 'add_car.php', {
                        method: 'POST',
                        body: formData
                    });
                    
                    const result = await response.json();
                    
                    if (result.success) {
                        showMessage(result.message, 'success');
                        resetForm();
                        loadCars();
                    } else {
                        showMessage(result.error || 'Operation failed', 'error');
                    }
                } catch (error) {
                    showMessage('An error occurred', 'error');
                }
            });
            
            // Handle cancel button
            cancelBtn.addEventListener('click', resetForm);
            
            // Load cars from database
            async function loadCars() {
                try {
                    const response = await fetch('get_car.php');
                    const cars = await response.json();
                    
                    const tbody = document.getElementById('carTableBody');
                    tbody.innerHTML = '';
                    
                    cars.forEach(car => {
                        tbody.innerHTML += `
                            <tr>
                                <td>${car.id}</td>
                                <td>${car.name}</td>
                                <td>${car.model}</td>
                                <td>${car.available}</td>
                                <td class="actions">
                                    <button class="update" onclick="editCar(${car.id}, '${car.name}', '${car.model}', '${car.available}')">Edit</button>
                                    <button class="delete" onclick="deleteCar(${car.id})">Delete</button>
                                </td>
                            </tr>
                        `;
                    });
                } catch (error) {
                    showMessage('Error loading cars', 'error');
                }
            }
            
            // Edit car
            window.editCar = function(id, name, model, available) {
                document.getElementById('carId').value = id;
                document.getElementById('carName').value = name;
                document.getElementById('carModel').value = model;
                document.getElementById('carAvailability').value = available;
                submitBtn.textContent = 'Update Car';
                cancelBtn.style.display = 'inline-block';
            };
            
            // Delete car
            window.deleteCar = async function(id) {
                if (!confirm('Are you sure you want to delete this car?')) {
                    return;
                }
                
                try {
                    const formData = new FormData();
                    formData.append('id', id);
                    
                    const response = await fetch('delete_car.php', {
                        method: 'POST',
                        body: formData
                    });
                    
                    const result = await response.json();
                    
                    if (result.success) {
                        showMessage(result.message, 'success');
                        loadCars();
                    } else {
                        showMessage(result.error || 'Failed to delete car', 'error');
                    }
                } catch (error) {
                    showMessage('Error deleting car', 'error');
                }
            };
            
            // Reset form
            function resetForm() {
                carForm.reset();
                document.getElementById('carId').value = '';
                submitBtn.textContent = 'Add Car';
                cancelBtn.style.display = 'none';
                formMessage.innerHTML = '';
            }
            
            // Show message
            function showMessage(message, type) {
                formMessage.innerHTML = `<div class="${type}">${message}</div>`;
                setTimeout(() => {
                    formMessage.innerHTML = '';
                }, 3000);
            }
        });
    </script>
</body>
</html>